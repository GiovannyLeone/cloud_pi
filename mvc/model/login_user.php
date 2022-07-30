<?php
require('../db/connect.php');
// include_once('../controller/class/user.class.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Content-Type: application/json");
    $resArray = [];
    $username = strtolower($_POST['getFormUsername']);
    $userPassword = $_POST['getFormPassword'];

    // Verificando se user existe
    $consultSql = $conn->prepare("SELECT * FROM tb_user WHERE username = :username  LIMIT 1");
    $consultSql->bindParam(':username', $username, PDO::PARAM_STR);
    $consultSql->execute();

    if ($consultSql->rowCount() == 1) {
        // User já cadastradado
        $existUser = $consultSql->fetch(PDO::FETCH_ASSOC);
        $idUser = (int) $existUser['id_user'];
        // Encripty Pass
        # if her
        if ($userPassword == $existUser['user_password']) {
            $_SESSION["id_user"] = $idUser;
            $resArray['redirect'] = 'http://localhost/cloud_project/public/feed.html';
        } else{
            $resArray['error'] = "Os dados não são validos!";

        }
        
    } else {
        $resArray['error'] = "Conta não encontrada :(";

    }

    echo json_encode($resArray);

} else{
    exit("Fora!");
}









// $username = $_POST['getFormUsername'];
// $userPassword = $_POST['getFormPassword'];
// $idStatus = 2;

// echo $username;
// echo $userPassword;




// $users = new User;
// $users->setUsername($username);
// $users->setUserEmail($username);
// $users->setUserPassoword($userPassword);
// $users->setIdStatus($idStatus);
// $users->getUsers();

// if ($users->getUsers() === TRUE) {
//     return  header("Location: ../../public/feed.html");
// }
