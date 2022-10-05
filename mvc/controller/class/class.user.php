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

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function setUserPassoword(string $userPassword, string $userEmail)
    {
        $userPassword = md5($userPassword);
        $md5Pass = md5($userEmail . $userPassword);
        $userPassword = $md5Pass;
        // Gera um Passowrod baseado em bcrypt
        $custoPassword = '09';
        $saltPassword = $userPassword;
        $criptUserPassword = crypt($userPassword, '$2b$' . $custoPassword . '$' . $saltPassword . '$');
        return $this->userPassword = $criptUserPassword;
    }
    public function setJustUserPassoword(string $userJustPassword)
    {

        return $this->userJustPassword = $userJustPassword;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function setHash(string $userPassword, string $userEmail)
    {
        $userPassword = md5($userPassword);
        $md5Pass = md5($userEmail . $userPassword);
        $userPassword = $md5Pass;
        // Gera um Passowrod baseado em bcrypt
        $custoPassword = '09';
        $saltPassword = $userPassword;
        $criptUserPassword = crypt($userPassword, '$2b$' . $custoPassword . '$' . $saltPassword . '$');
        // Gera um hash baseado em bcrypt
        $custoHash = '06';
        $saltHash = $md5Pass;
        $newHash = crypt($criptUserPassword, '$2b$' . $custoHash . '$' . $saltHash . '$');
        return $this->hash = $newHash;
    }

    public function getHash(string $hash)
    {
        return $this->hash;
    }

    public function setUpdateHash(string $updateHash)
    {
        return $this->updateHash = $updateHash;
    }

    public function getUpdateHash(string $updateHash)
    {
        return $this->updateHash;
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
            $username = $this->username;
            $userEmail = strtolower($this->userEmail);

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

                #Setando Status
                $criptUserPassword = $this->userPassword;
                $newHash = $this->hash;
                $idStatus = (int) 2;

                $newUser = $conn->prepare("INSERT INTO tb_user (username, user_email, user_password, hash, id_status) VALUES(:username, :user_email, :user_password, :hash, :id_status)");
                $newUser->bindParam(':username', $username, PDO::PARAM_STR);
                $newUser->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
                $newUser->bindParam(':user_password', $criptUserPassword, PDO::PARAM_STR);
                $newUser->bindParam(':hash', $newHash, PDO::PARAM_STR);
                $newUser->bindParam(':id_status', $idStatus, PDO::PARAM_INT);
                $newUser->execute();

                // Iniciando Sessão
                session_start();
                $_SESSION['identityUser'] = (string) $newHash;
                // Mandado resposta para página de cadastrado, redirecionamento e bool
                $resArray['redirect'] = 'mvc/view/profile-create/';
                $resArray['identityUser'] = $_SESSION['identityUser'];
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
            $username = $this->username;
            $userEmail = strtolower($this->userEmail);




            // Verificando se user existe
            $consultSql = $conn->prepare("SELECT * FROM tb_user WHERE username = :username OR user_email = :user_email LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
            $consultSql->execute();

            if ($consultSql->rowCount() == 1) {
                // User já cadastradado
                $existUser = $consultSql->fetch(PDO::FETCH_OBJ);
                $userEmail = (string) $existUser->user_email;


                // Var de sessão
                $idUserDB       = (int) $existUser->id_user;
                $loginUserDB    = (string) $existUser->username;
                $loginUserEmail = (string) $existUser->user_email;
                $loginPassword  = (string) $existUser->user_password;
                $identityUser   = (string) $existUser->hash;
                $criptUserPassword = $this->setUserPassoword($this->userJustPassword, $loginUserEmail);

                // Encripty Pass
                # if her
                if ($criptUserPassword == $existUser->user_password) {
                    setcookie("idUser", $idUserDB);
                    setcookie("loginUser", $loginUserDB);
                    setcookie("loginPassword", $loginPassword);

                    session_start();

                    $_SESSION['idUserSe'] = $idUserDB;
                    $_SESSION['loginUserSe'] = $loginUserDB;
                    $_SESSION['loginPasswordSe'] = $loginPassword;
                    $_SESSION['identityUser'] = $identityUser;

                    $resArray['redirect'] = 'public/feed';
                    $resArray['identityUser'] = $_SESSION['identityUser'];
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
    public function verifyRecoveryPassUser()
    {
        require('../db/connect.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];
            $username = $this->username;
            $userEmail = strtolower($this->userEmail);
            $idStatus = 2;

            // Verificando se User Existe
            $consultSql = $conn->prepare("SELECT username, user_email, hash, id_status FROM tb_user WHERE username = :username AND user_email = :user_email AND id_status = :id_status LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
            $consultSql->bindParam(':id_status', $idStatus, PDO::PARAM_INT);
            $consultSql->execute();


            if ($consultSql->rowCount() == 1) {
                // User Existe

                $baseURL = "http://";
                $baseURL .= "localhost/cloud_pi";

                $existUser = $consultSql->fetch(PDO::FETCH_OBJ);
                $hash = (string) $existUser->hash; //Pegando a hash da consulta do DB

                $urlRecovery = $baseURL . "/recovery-password?idRec=" . $hash;

                $resArray['username'] = $username;
                $resArray['userEmail'] = $userEmail;
                $resArray['urlHash'] = $urlRecovery;
                $resArray['redirect'] = 'http://localhost/cloud_pi/mvc/view/recovery-pass';
                $resArray['date'] = date('d/m/Y');
                $resArray['time'] = date('H:i');
            } else {
                $resArray['error'] = (string) "Conta não encontrada :(";
            }
            echo json_encode($resArray);
        } else {
            exit("Fora!");
        }
    }

    public function updatePasswordUser()
    {
        require('../db/connect.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray = [];
            $username = $this->username;
            $userEmail = strtolower($this->userEmail);
            $userPassword = $this->userPassword;
            $userHash = $this->updateHash;
            $idStatus = (int) 2;

            // Verificando se User Existe
            $consultSql = $conn->prepare("SELECT username, user_email, hash, id_status FROM tb_user WHERE username = :username AND user_email = :user_email AND hash = :hash AND id_status = :id_status LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
            $consultSql->bindParam(':hash', $userHash, PDO::PARAM_STR);
            $consultSql->bindParam(':id_status', $idStatus, PDO::PARAM_INT);
            $consultSql->execute();


            if ($consultSql->rowCount() == 1) {
                // User Existe

                $baseURL = "http://";
                $baseURL .= "localhost/cloud_pi";

                $existUser = $consultSql->fetch(PDO::FETCH_OBJ);
                $UsernameSession = (string) $existUser->username;
                $userEmailSession = (string) $existUser->user_email;

                $userPassword = $this->userPassword;
                $userEmail = strtolower($this->userEmail);
                $criptUserPassword = $this->userPassword;
                $newHash = $this->hash;

                $updatePasswordUser = $conn->prepare("UPDATE tb_user SET
                user_password = :criptUserPassword,
                hash = :newHash
                WHERE username = :username AND user_email = :user_email");
                $updatePasswordUser->bindParam(':username', $username, PDO::PARAM_STR);
                $updatePasswordUser->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
                $updatePasswordUser->bindParam(':criptUserPassword', $criptUserPassword, PDO::PARAM_STR);
                $updatePasswordUser->bindParam(':newHash', $newHash, PDO::PARAM_STR);
                $updatePasswordUser->execute();

                $resArray['redirect'] = 'http://localhost/cloud_pi/public/';
            }
            echo json_encode($resArray);
        } else {
        }
    }
}
