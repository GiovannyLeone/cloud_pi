<!DOCTYPE html>
<html lang="pt-br">

<?php include_once("assets/includes/head.inc.php") ?>

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
                <input type="text" placeholder="Password" name="setFormPassword" id="setFormPassword" />
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
                <input type="text" placeholder="Password" name="getFormPassword" id="getFormPassword" />
              </div>
              <a id="goRight" class="off">Cadastre-se</a>
              <button id="btnGetUsers" type="submit">Entrar</button>
              <a data-izimodal-open="#modalRecoveryPass" data-izimodal-transitionin="fadeInDown">Esqueci a senha</a>
              <p class="msgError" style="display: none;">Erro</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal structure -->
  <?php include_once("assets/includes/modal.inc/modal.inc.php") ?>


  <!-- Trigger to open Modal -->
  <?php include_once("assets/includes/footer.inc.php") ?>
  
</body>


</html>