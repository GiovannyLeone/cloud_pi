<?php
    $userHash = $_GET['idRec'];
    $userEmail = $_GET['idEmail'];
    $baseURL = 'http://' . $_SERVER['SERVER_NAME'];
    $baseURL .= '/cloud_pi/mvc/view';
    $arrayHashExplode = explode("=", $userHash );
    $urlRecovery = $baseURL . "/recovery-pass-update?idRec=" . $arrayHashExplode[1];
        /* Criando variavel, onde iremos recuperar senha, a hash é extremamente
         importante pois o link deve ser de uso único */

         // Montar o Email para ser enviado este padrão segue o requisito da locaweb

         $assunto = "=UTF-8?B?".base64_encode(
            'Recuperar senha - Cloud - '. date('d/m/Y') . '-' . date('H:i')
         ) . "?=";

         $destinatario = $userEmail;

         $mensagem = "
         <table style 'width:100%;margin:0px;padding:0px'>
            <tr>
                <td colspan='2'>
                    <h1>Recuperar senha - Titos Burgers<h1>
                </td>
            <tr>
            <tr>
                <td>URL de Recuperação de Senha:</td>
                <td><a href='$urlRecovery' target='_blank'>$urlRecovery</a></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>$userEmail</td>
            </tr>
        </table>
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