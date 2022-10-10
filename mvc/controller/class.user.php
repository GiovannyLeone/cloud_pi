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

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setUsername(string $username)
    {
        return $this->username = $username;
    }

    public function getUsername()
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

    public function getHash()
    {
        return $this->hash;
    }

    public function setUpdateHash(string $updateHash)
    {
        return $this->updateHash = $updateHash;
    }

    public function getUpdateHash()
    {
        return $this->updateHash;
    }

    public function setAccessToken(string $userPassword, string $userEmail)
    {
        $userPassword   = md5($userPassword);
        $md5Hash        = md5($userEmail . $userPassword);
        $userPassword   = $md5Hash;
        // Gerando um Token de Acesso, baseado em bcrypt
        $custoPassword      = '12';
        $saltPassword       = $userPassword;
        $accessToken        = crypt($userPassword, '$2b$' . $custoPassword . '$' . $saltPassword . '$');
        return $this->accessToken = $accessToken;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setIdStatus(string $idStatus)
    {
        return $this->idStatus = $idStatus;
    }

    public function getIdStatus()
    {
        return $this->idStatus;
    }

    public function registerUsers()
    {
        require '../db/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray   = (object) [];
            $username   = $this->username;
            $userEmail  = strtolower($this->userEmail);

            // Verificando se user existe
            $consultSql = $conn->prepare("SELECT username FROM tb_user WHERE username = :username OR user_email = :userEmail  LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
            $consultSql->execute();

            if ($consultSql->rowCount() == 1) {
                // User já cadastradado
                $resArray->error = "Email ou Nome de Usuário em uso";
                $resArray->is_login = FALSE;
            } else {
                // User não existe

                #Setando Status
                $criptUserPassword  = (string) $this->userPassword;
                $newHash            = (string) $this->hash;
                $accessToken        = (string) $this->accessToken;
                $idStatus           = (int) 2;

                $newUser = $conn->prepare("INSERT INTO tb_user (username, user_email, user_password, hash, access_token, id_status) VALUES(:username, :userEmail, :userPassword, :hash, :accessToken, :idStatus)");
                $newUser->bindParam(':username', $username, PDO::PARAM_STR);
                $newUser->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
                $newUser->bindParam(':userPassword', $criptUserPassword, PDO::PARAM_STR);
                $newUser->bindParam(':hash', $newHash, PDO::PARAM_STR);
                $newUser->bindParam(':accessToken', $accessToken, PDO::PARAM_STR);
                $newUser->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
                $newUser->execute();

                // Iniciando Sessão
                session_start();
                $_SESSION['identityUser'] = (string) $accessToken;
                // Mandado resposta para página de cadastrado, redirecionamento e bool
                $resArray->redirect     = 'mvc/view/profile-create/';
                $resArray->identityUser = $_SESSION['identityUser'];
                $resArray->is_login     = TRUE;
            }

            echo json_encode($resArray);
        } else {
            exit("Fora!");
        }
    }

    public function loginUsers()
    {
        require('../db/connect.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $resArray   = (object) [];
            $username   = (string) $this->username;
            $userEmail  = (string) strtolower($this->userEmail);
            $idStatus   = (int) 2;




            // Verificando se user existe
            $consultSql = $conn->prepare("SELECT * FROM tb_user WHERE (username = :username OR user_email = :userEmail) AND id_status = :idStatus LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
            $consultSql->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $consultSql->execute();

            if ($consultSql->rowCount() == 1) {
                // User já cadastradado
                $existUser = $consultSql->fetch(PDO::FETCH_OBJ);
                $userEmail = (string) $existUser->user_email;


                // Var de sessão
                $idUserDB           = (int) $existUser->id_user;
                $loginUserDB        = (string) $existUser->username;
                $loginUserEmail     = (string) $existUser->user_email;
                $loginPassword      = (string) $existUser->user_password;
                $identityUser       = (string) $existUser->access_token;
                $criptUserPassword  = $this->setUserPassoword($this->userJustPassword, $loginUserEmail);

                // Encripty Pass
                # if her
                if ($criptUserPassword == $existUser->user_password) {
                    setcookie("idUser", $idUserDB);
                    setcookie("loginUser", $loginUserDB);
                    setcookie("loginPassword", $loginPassword);

                    session_start();

                    $_SESSION['idUserSe']           = $idUserDB;
                    $_SESSION['loginUserSe']        = $loginUserDB;
                    $_SESSION['loginPasswordSe']    = $loginPassword;
                    $_SESSION['identityUser']       = $identityUser;

                    $resArray->redirect     = 'public/feed';
                    $resArray->identityUser = $_SESSION['identityUser'];
                } else {
                    $resArray->error = "Os dados não são validos!";
                }
            } else {
                $resArray->error = "Conta não encontrada :(";
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
            $resArray   = (object) [];
            $username   = $this->username;
            $userEmail  = strtolower($this->userEmail);
            $idStatus   = 2;

            // Verificando se User Existe
            $consultSql = $conn->prepare("SELECT username, user_email, hash, id_status FROM tb_user WHERE username = :username AND user_email = :userEmail AND id_status = :idStatus LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
            $consultSql->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $consultSql->execute();


            if ($consultSql->rowCount() == 1) {
                // User Existe

                $baseURL = "http://";
                $baseURL .= "localhost/cloud_pi";

                $existUser = $consultSql->fetch(PDO::FETCH_OBJ);
                $hash = (string) $existUser->hash; //Pegando a hash da consulta do DB

                $urlRecovery = $baseURL . "/recovery-password?idRec=" . $hash;

                $resArray->username     = (string) $username;
                $resArray->userEmail    = (string) $userEmail;
                $resArray->urlHash      = (string) $urlRecovery;
                $resArray->redirect     = (string) 'http://localhost/cloud_pi/mvc/view/recovery-pass';
                $resArray->date         = date('d/m/Y');
                $resArray->time         = date('H:i');
            } else {
                $resArray->error = (string) "Conta não encontrada :(";
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
            $resArray       = (object) [];
            $username       = $this->username;
            $userEmail      = strtolower($this->userEmail);
            $userPassword   = $this->userPassword;
            $userHash       = $this->updateHash;
            $accessToken    = $this->accessToken;
            $idStatus       = (int) 2;

            // Verificando se User Existe
            $consultSql = $conn->prepare("SELECT username, user_email, hash, id_status FROM tb_user WHERE username = :username AND user_email = :userEmail AND hash = :hash AND id_status = :idStatus LIMIT 1");
            $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
            $consultSql->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
            $consultSql->bindParam(':hash', $userHash, PDO::PARAM_STR);
            $consultSql->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $consultSql->execute();


            if ($consultSql->rowCount() == 1) {
                // User Existe

                $baseURL = "http://";
                $baseURL .= "localhost/cloud_pi";

                $userEmail          = (string) strtolower($this->userEmail);
                $criptUserPassword  = (string) $this->userPassword;
                $newHash            = (string) $this->hash;
                $accessToken        = (string) $this->accessToken;

                $updatePasswordUser = $conn->prepare("UPDATE tb_user SET
                user_password   = :criptUserPassword,
                hash            = :newHash,
                access_token    = :accessToken
                WHERE username = :username AND user_email = :user_email");
                $updatePasswordUser->bindParam(':username', $username, PDO::PARAM_STR);
                $updatePasswordUser->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
                $updatePasswordUser->bindParam(':criptUserPassword', $criptUserPassword, PDO::PARAM_STR);
                $updatePasswordUser->bindParam(':newHash', $newHash, PDO::PARAM_STR);
                $updatePasswordUser->bindParam(':accessToken', $accessToken, PDO::PARAM_STR);
                $updatePasswordUser->execute();

                $resArray->redirect = 'http://localhost/cloud_pi/public/';
            }
            echo json_encode($resArray);
        } else {
        }
    }

    public function deleteUser(string $getKeyDelete)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            require('../db/connect.php');
            header("Content-Type: application/json");

            $resArray = (object) [];
            $idStatus = (int) 2;
            
            $consultUser = $conn->prepare("SELECT `id_user`, `hash`, `id_status` FROM tb_user WHERE `access_token` = :getKeyDelete AND  `id_status` = :idStatus");
            $consultUser->bindParam(':getKeyDelete', $getKeyDelete, PDO::PARAM_STR);
            $consultUser->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $consultUser->execute();

            if ($consultUser->rowCount() == 1) {

            $getIdUser = $consultUser->fetch(PDO::FETCH_OBJ);
            $idUser    = (int) $getIdUser->id_user;
            $idStatus  = (int) 1;

            $deleteUser = $conn->prepare("UPDATE `tb_user` SET `id_status` = :idStatus WHERE `id_user` = :idUser AND `access_token` = :getKeyDelete");
            $deleteUser->bindParam(':idStatus', $idStatus, PDO::PARAM_INT);
            $deleteUser->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $deleteUser->bindParam(':getKeyDelete', $getKeyDelete, PDO::PARAM_STR);
            $deleteUser->execute();

            $resArray->deleteData = TRUE;
            $resArray->redirect = 'public/';
            } else {
            $resArray->error = 'Erro Interno, tente novamente mais tarde!';
            }

            echo json_encode($resArray);
        } else {
            exit("Acesso Negado!");
        }
        
    }
}
