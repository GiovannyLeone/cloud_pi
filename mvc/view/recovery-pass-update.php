<?php

$hashRequest = $_GET['idRec'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha | Titos Burger</title>
</head>

<body>

</body>

</html>


<form action="#" method="POST">
    <h2>Recuperar senha</h2>

    <label for="email-user">Email</label>
    <input type="email" name="email-user" placeholder="Digite seu Email">
    <br>
    <label for="login-user">Usuário</label>
    <input type="text" name="login-user" placeholder="Digite seu usuário">

    <br>
    <label for="pass-user">Nova Senha</label>
    <input type="password" name="pass-user" placeholder="Digite a nova Senha">
    <label for="pass-user">Confirme a Senha</label>
    <input type="password" name="pass-user-conf" placeholder="Confirme a Senha">

    <input type="hidden" name="idRec" value="<?=$hashRequest?>">
    <br>
    <button>Redefinir Senha</button>
</form>