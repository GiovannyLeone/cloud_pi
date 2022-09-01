<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("assets/includes/head.inc.php") ?>
<body>
<div style="height: 90vh;">
            <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">X CLOSE MODAL |||||||</a>
            <!--  The attr 'data-iziModal-preventClose' will allow the already open modal is not closed.-->

            <a href="#" data-izimodal-open="#another-modal" data-izimodal-zindex="20000" data-izimodal-preventclose="">Another Modal</a>

            <!-- You can also use: data-iziModal-transitionOut="fadeOutDown" without data-iziModal-preventClose -->

            <div>
                <form action="#" method="POST" class="recovery-pass-form">
                    <h2>Recuperar Senha</h2>

                    <input class="recovery-pass-email" type="email" name="forgetEmail" id="forgetEmail" placeholder="Digite seu Email">
                    <br>
                    <input class="recovery-pass-user" type="text" name="forgetUsername" id="forgetUsername" placeholder="Digite seu usuário">
                    <br>
                    <br>
                    <button id="forgetPass">Recuperar Senha</button>
                    <p class="msgRecoveryError" style="display: none;"></p>
                </form>
            </div>
</div>
    

<?php include_once("assets/includes/footer.inc.php") ?>

</body>
</html>
