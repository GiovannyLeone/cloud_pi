<!DOCTYPE html>
<html lang="pt-br">

<?php include_once("assets/includes/inc.head-footer/head.inc.php") ?>

<body>
  <div id="form-login-sign-up">
    <div id="back">
      <div class="backRight"></div>
      <div class="backLeft"></div>
    </div>

    <div id="slideBox">
      <div class="topLayer">
        <div class="left">
          <div class="content">
            <h2 class="alignCenter">Cadastre-se <img src="assets/img/marca-d-agua-cloud_600x.png" alt=""></h2>
            <form method="POST">
              <div class="form-group myGrid">
                <input type="text" placeholder="Username" name="setFormUsername" id="setFormUsername" />
                <input type="password" placeholder="Password" name="setFormPassword" id="setFormPassword" />
                <input type="email" placeholder="Email" name="setFormEmail" id="setFormEmail" />
              </div>
              <a id="goLeft" class="off">Entrar</a>
              <button id="btnSetUsers">Cadastre-se</button>
            </form>
            <p class="msgError" style="display: none;">Erro</p>
          </div>
        </div>
        <div class="right">
          <div class="content2">
            <h2 class="alignCenter">Entrar <img src="assets/img/marca-d-agua-cloud-branco@600x.png" alt=""></h2>
            <form method="POST">
              <div class="form-group">
                <input type="text" placeholder="Username" name="getFormUsername" id="getFormUsername" />
                <input type="password" placeholder="Password" name="getFormPassword" id="getFormPassword" />
              </div>
              <a id="goRight" class="off">Cadastre-se</a>
              <button id="btnGetUsers" type="submit">Entrar</button>
              <p class="msgError" style="display: none;">Erro</p>              
              
              <section class="links-container">
                <div class="password-info">
                <a class="modalRecoveryPass" data-izimodal-open="#modalRecoveryPass" data-izimodal-transitionin="fadeInDown">Esqueceu sua senha?</a>
                </div>

                <div class="link-login">
                  <span>Ou entre com:</span>
                  <span>
                    <a href="#"><i class="fab fa-google-plus-square google"></i></a>
                    <a href="#"><i class="fab fa-facebook-square facebook"></i></a>
                    <a href="#"><i class="fab fa-brands fa-twitter"></i></a>
                  </span>
                </div>
              </section>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- Modal structure -->
<?php include_once("assets/includes/inc.modal/inc.modal.php") ?>
<?php include_once("assets/includes/inc.head-footer/footer.inc.php") ?>


</html>