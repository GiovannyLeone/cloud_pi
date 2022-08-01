<?php
class User
{
    // Criando Variaveis
    private int $idUser;
    private string $username;
    private string $userEmail;
    private string $userPassword;
    private string $hash;
    private string $idStatus;

    // Dados Users

    public function setIdUser(int $idUser)
    {
        return $this->idUser = $idUser;
    }

    public function getIdUser(int $idUser)
    {
        return $this->idUser;
    }

    public function setUsername(string $username)
    {
        return $this->username = $username;
    }

    public function getUsername(string $username)
    {
        return $this->username;
    }

    public function setUserEmail(string $userEmail)
    {
        return $this->userEmail = $userEmail;
    }

    public function getUserEmail(string $userEmail)
    {
        return $this->userEmail;
    }

    public function setUserPassoword(string $userPassword)
    {
        return $this->userPassword = $userPassword;
    }

    public function getUserPassword(string $userPassword)
    {
        return $this->userPassword;
    }

    public function setHash(string $hash)
    {
        return $this->hash = $hash;
    }

    public function getHash(string $hash)
    {
        return $this->hash;
    }

    public function setIdStatus(string $idStatus)
    {
        return $this->idStatus = $idStatus;
    }

    public function getIdStatus(string $idStatus)
    {
        return $this->idStatus;
    }

    public function registerUsers()
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];
            $username = strtolower("$this->username");
            $userEmail = strtolower("$this->userEmail");

            // Verificando se user existe
            $consultSql = $conn->prepare("SELECT username FROM tb_user WHERE username = :username OR user_email = :user_email  LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
            $consultSql->execute();

            if ($consultSql->rowCount() == 1) {
                // User já cadastradado
                $resArray['error'] = "Email ou Nome de Usuário em uso";
                $resArray['is_login'] = FALSE;
            } else {
                // User não existe
                # Colocar Hash para password

                $userPassword = "$this->userPassword";
                // Gerando md5 para encriptar
                $userPassword = md5($userPassword);
                $hash = md5($userEmail . $userPassword);
                $userPassword = $hash;

                // Gera um Passowrod baseado em bcrypt
                $custoPassword = '09';
                $saltPassword = $hash;
                $criptUserPassword = crypt($userPassword, '$2b$' . $custoPassword . '$' . $saltPassword . '$');
                
                

                // Gera um hash baseado em bcrypt
                $custoHash = '06';
                $saltHash = $hash;
                $newHash = crypt($criptUserPassword, '$2b$' . $custoHash . '$' . $saltHash . '$');

                #Setando Status
                $idStatus = 2;

                

                

                $newUser = $conn->prepare("INSERT INTO tb_user (username, user_email, user_password, hash, id_status) VALUES(:username, :user_email, :user_password, :hash, :id_status)");
                $newUser->bindParam(':username', $username, PDO::PARAM_STR);
                $newUser->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
                $newUser->bindParam(':user_password', $criptUserPassword, PDO::PARAM_STR);
                $newUser->bindParam(':hash', $newHash, PDO::PARAM_STR);
                $newUser->bindParam(':id_status', $idStatus, PDO::PARAM_INT);
                $newUser->execute();

                // Salvando o último ID do usuário
                $idUser = $conn->lastInsertId();
                // Iniciando Sessão
                $_SESSION['id_user'] = (int) $idUser;
                // Mandado responda para página de cadastrado, redirecionamento e bool
                $resArray['redirect'] = 'http://localhost/cloud_project/public/feed.html';
                $resArray['is_login'] = TRUE;
            }

            echo json_encode($resArray);
        } else {
            exit("Fora!");
        }
    }

    public function loginUsers()
    // Class para logar Users
    {
        require('../db/connect.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];
            $username = strtolower("$this->username");
            $userEmail = strtolower("$this->userEmail");
            $userPassword = "$this->userPassword";
            $userPassword = md5($userPassword);




            // Verificando se user existe
            $consultSql = $conn->prepare("SELECT * FROM tb_user WHERE username = :username OR user_email = :user_email LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
            $consultSql->execute();

            if ($consultSql->rowCount() == 1) {
                // User já cadastradado
                $existUser = $consultSql->fetch(PDO::FETCH_ASSOC);
                $idUser = (int) $existUser['id_user'];
                $userEmail = (string) $existUser['user_email'];


                // Var de sessão
                $loginUserDB = (string) $existUser['username'];
                $loginPassword = (string) $existUser['user_password'];

                $hash = md5($userEmail . $userPassword);
                $userPassword = $hash;

                // Gera um Passowrod baseado em bcrypt para logar
                $custoPassword = '09';
                $saltPassword = $hash;
                $criptUserPassword = crypt($userPassword, '$2b$' . $custoPassword . '$' . $saltPassword . '$');

                // Encripty Pass
                # if her
                if ($criptUserPassword == $existUser['user_password']) {
                    $_SESSION["id_user"] = $idUser;
                    setcookie("loginUser", $loginUserDB);
                    setcookie("loginPassword", $loginPassword);

                    session_start();

                    $_SESSION['loginUserSe'] = $loginUserDB;
                    $_SESSION['loginPasswordSe'] = $loginPassword;

                    $resArray['redirect'] = 'http://localhost/cloud_project/public/feed.html';
                } else {
                    $resArray['error'] = "Os dados não são validos!";
                }
            } else {
                $resArray['error'] = "Conta não encontrada :(";
            }

            echo json_encode($resArray);
        } else {
            exit("Fora!");
        }
    }
}
