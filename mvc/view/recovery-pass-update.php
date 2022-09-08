<?php

$hashRequest = $_GET['idRec'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="http://localhost/cloud_pi/public/assets/css/style.css">

    <title>Redefinir Senha | Titos Burger</title>
</head>

<body>

    
    
    <form action="#" method="POST">
        <h2>Recuperar senha</h2>
        
        <label for="email-user">Email</label>
        <input type="email" id="updateEmailUser" name="updateEmailUser" placeholder="Digite seu Email">
        <br>
        <label for="login-user">Usuário</label>
        <input type="text" id="updateLoginUser" name="updateLoginUser" placeholder="Digite seu usuário">
        
        <br>
        <label for="pass-user">Nova Senha</label>
        <input type="password" id="updatePassUser" name="updatePassUser" placeholder="Digite a nova Senha">
        <label for="pass-user">Confirme a Senha</label>
        <input type="password" id="updatePassUserConf" name="updatePassUserConf" placeholder="Confirme a Senha">
        
        <input type="hidden" id="idRec" name="idRec" value="<?=$hashRequest?>">
        <br>
        <button id="updatePass">Redefinir Senha</button>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/js/iziModal.js" integrity="sha512-1J0h9sFPFsywGN1ZMdHRX7n94nW1lvmX+yNAqcsSJSdayFsGE935ginqQ31R6rwxarOKG7j//Km5SB6cOT8aUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="http://localhost/cloud_pi/public/assets/js/ajax.js"></script>


</html>