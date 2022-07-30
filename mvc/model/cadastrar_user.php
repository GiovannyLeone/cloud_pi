<?php
require('../db/connect.php');
// include_once('../controller/class/user.class.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Content-Type: application/json");
    $resArray = [];
    $username = strtolower($_POST['setFormUsername']);
    echo $username;
    $userEmail = strtolower($_POST['setFormEmail']);

    // Verificando se user existe
    $consultSql = $conn->prepare("SELECT username FROM tb_user WHERE username = :username  LIMIT 1");
    $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
    $consultSql->execute();

    if ($consultSql->rowCount() == 1) {
        // User já cadastradado
        $resArray['error'] = "Email em uso";
        $resArray['is_login'] = FALSE;
    } else {
        // User não existe
        # Colocar Hash para password

        $userPassword = $_POST['setFormPassword'];
        $hash = "06giovannydev";
        $idStatus = 2;

        $newUser = $conn->prepare("INSERT INTO tb_user (username, user_email, user_password, hash, id_status) VALUES(:username, :user_email, :user_password, :hash, :id_status)");
        $newUser->bindParam(':username', $username, PDO::PARAM_STR);
        $newUser->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $newUser->bindParam(':user_password', $userPassword, PDO::PARAM_STR);
        $newUser->bindParam(':hash', $hash, PDO::PARAM_STR);
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


} else{
    exit("Fora!");
}

// $username = $_POST['setFormUsername'];
// $userEmail = $_POST['setFormEmail'];
// $userPassword = $_POST['setFormPassword'];
// $hash = "06giovannydev";
// $idStatus = 2;




// $users = new User;
// $users->setUsername($username);
// $users->setUserEmail($userEmail);
// $users->setUserPassoword($userPassword);
// $users->setHash($hash);
// $users->setIdStatus($idStatus);
