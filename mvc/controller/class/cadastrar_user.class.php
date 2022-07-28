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

    public function setUsers()
    {
        require '../db/connect.php';

        $consultQuerySQL = "SELECT username, user_email FROM tb_user WHERE username = ? OR user_email = ?";
        
        $insertSql = "INSERT INTO tb_user (
            username, user_email, user_password, hash, id_status
       )VALUES(
           ?,?,?,?,?
       )";

        
        $stmt = $conn->prepare($consultQuerySQL);
        $stmt->execute(["$this->username", "$this->userEmail"]);

        if ($stmt->execute(["$this->username", "$this->userEmail"]) === FALSE) {
            return FALSE;
        } else {
            $stmt = $conn->prepare($insertSql);
            $stmt->execute([
            $this->username,
            $this->userEmail,
            $this->userPassword,
            $this->hash,
            $this->idStatus,
        ]);
        return TRUE;
        }
    }

    public function getUsers()
    {
        require '../db/connect.php';

        $consultQuerySQL = "SELECT username, user_email, id_status FROM tb_user WHERE username = ? OR user_email = ? AND user_password = ? AND id_status = ?";
        
        
        $stmt = $conn->prepare($consultQuerySQL);
        $stmt->execute(["$this->username", "$this->userEmail", "$this->userPasword", 2]);

        if ($stmt->execute(["$this->username", "$this->userEmail", "$this->userPasword", 2]) === TRUE) {
            header("Location:../public/feed.html");
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
