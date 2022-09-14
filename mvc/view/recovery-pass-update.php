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

    <title>Redefinir Senha | cloud </title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            padding: 50px;
            font-family: 'Roboto', sans-serif;
            background-color: #F5F5F5;
        }

        /*Sign In Form*/
        .signin {
            position: relative;
            height: 100%;
            width: 50vw;
            margin: auto;
            box-shadow: 0px 0px 40px 5px #767be4;
        }

        /*Background Img*/
        .back-img {
            position: relative;
            width: 100%;
            height: 250px;
            background: url('http://localhost/cloud_pi/public/assets/img/pass.jpg')no-repeat center center;
            background-size: cover;
        }

        .sign-in-text {
            top: 175px;
            position: absolute;
            z-index: 1;
        }

        h2 {
           color: #767be4;
           font-weight: 500;
           font-size: 30px;
        }
        img {
            padding-left: 25px;
            margin-top: -25px;
            height: 150px;
            
        }


        /*form-section*/
        .form-section {
            padding: 70px 90px 70px 90px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .formCenter div label{
            display: block;
            margin: 30px 0 0 0;
        }

        /*sign-in-btn*/
        .sign-in-btn {
            position: absolute;
            bottom: 0;
            right: 0;
        }
    </style>

</head>

<body>



    <body>
        <div class="signin">
            <div class="back-img">
                <div class="sign-in-text">
                    <h2 class="top"><img src="http://localhost/cloud_pi/public/assets/img/logo-cloud_1@600x.png"></h2>
                </div>
                <!--/.sign-in-text-->
          
            </div>
            <!--/.back-img-->
            <div class="form-section">
                <form class="formCenter" action="#" method="POST">
                    <h2>Recuperar senha</h2>
                    <!--Email-->
                    <div class="">
                        <label for="email-user">Email</label>
                        <input type="email" id="updateEmailUser" name="updateEmailUser" placeholder="Digite seu Email">
                    </div>
                    <!--Usuário-->
                    <div class="">
                        <label for="login-user">Usuário</label>
                        <input type="text" id="updateLoginUser" name="updateLoginUser" placeholder="Digite seu usuário">
                    </div>
                    <!--password-->
                    <div class="">
                        <label for="pass-user">Nova Senha</label>
                        <input type="password" id="updatePassUser" name="updatePassUser" placeholder="Digite a nova Senha">
                       
                    <div>
                    <!--password 2 -->
                    <div>   
                        <label for="pass-user">Confirme a Senha</label>
                        <input type="password" id="updatePassUserConf" name="updatePassUserConf" placeholder="Confirme a Senha">
                    </div>
                </form>
            </div>
            <!--/.form-section-->

            <input type="hidden" id="idRec" name="idRec" value="<?= $hashRequest ?>">
            <br>
            <button class="sign-in-btn" id="updatePass">Redefinir Senha</button>
        </div>
        <!--/.signin-->
    </body>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/js/iziModal.js" integrity="sha512-1J0h9sFPFsywGN1ZMdHRX7n94nW1lvmX+yNAqcsSJSdayFsGE935ginqQ31R6rwxarOKG7j//Km5SB6cOT8aUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://localhost/cloud_pi/public/assets/js/ajax.js"></script>


</html>