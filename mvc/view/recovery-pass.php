<?php
    $userHash = $_GET['idRec'];
    $username = $_GET['idUsername'];
    $userEmail = $_GET['idEmail'];
    $dateRecovery = $_GET['idDate'];
    $timeRecovery = $_GET['idTime'];
    $baseURL = 'http://' . $_SERVER['SERVER_NAME'];
    $baseURL .= '/cloud_pi/mvc/view';
    $arrayHashExplode = explode("=", $userHash );
    $urlRecovery = $baseURL . "/recovery-pass-update?idRec=" . $arrayHashExplode[1];
    $urlRecoveryShow = "Link para recuperação de senha";
        /* Criando variavel, onde iremos recuperar senha, a hash é extremamente
         importante pois o link deve ser de uso único */

         // Montar o Email para ser enviado este padrão segue o requisito da locaweb

         $assunto = "=UTF-8?B?".base64_encode(
            'Recuperar senha - Cloud - '. date('d/m/Y') . '-' . date('H:i')
         ) . "?=";

         $destinatario = $userEmail;

         $mensagem = "
         <style>
         @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');
         *{
        
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Raleway', sans-serif;
            font-weight:500;
         }

         .top{
            height:100%;  
            background-color:#fff;
            background-size: cover;
         }

         .texth2{
            font-size: 20px;
            font-weight: 500;
        }
         </style>

         <div class='top'>
         <div>
            <div>
            
                <div style='display:flex; align-items: center; height: 100px;'>
                    <img style='padding-left: 25px; margin-top: -25px; height: 100px;' src='http://localhost/cloud_pi/public/assets/img/logo-cloud_1@600x.png'>
                </div>
                <h1 style='white-space: nowrap; padding: 0 20px; color: #767be4;'>Recuperar senha</h1>
                <div>
                    <h2 class='texth2' style='width:60%;  background-color: #FFFFFFCC; box-shadow: 0px 0px 40px 5px #767be4;   text-align:justify; margin: 50px auto; padding: 50px;'>
                        Olá, " . $username . ", Recebemos uma solicitação para restaurar sua senha de acesso. Ela ocorreu em <br /> " . $dateRecovery . ' - ' . $timeRecovery . 
                        "<br>
                        Para alterarar a senha basta clicar no link abaixo de recuperação de senha, caso não foi você sugerimos melhorar a segurança da sua conta trocando sua senha
                        e verificar se apenas você está com acesso ao seu Email
                        <br><br>
                        Para demais problemas estamos a disposição 
                        <br>
                        <span style='display:flex; color: #767be4; font-style: italic; justify-content: flex-end;'>Equipe Cloud</span>
                        <img style='padding-left: 25px; margin-top: -25px; height: 100px;' src='http://localhost/cloud_pi/public/assets/img/logo-cloud_1@600x.png'>
                        
                        <a href='$urlRecovery' target='_blank'>$urlRecoveryShow</a>
                        <br>
                        <br>
                        <span style='display:flex; color: #767be4; justify-content: flex-end;'> Email cadastrado:  $userEmail </span>


                    </h2>
                </div>

            </div>
        </div>
         ";

         //Entra o código da locaweb para do email.
echo $mensagem;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha Cloud</title>
</head>
</html>