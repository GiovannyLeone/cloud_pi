<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Cloud | Login</title>
</head>

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
            <h2>Cadastre-se</h2>
            <form method="POST">
              <div class="form-group myGrid">
                <input type="text" placeholder="Username" name="setFormUsername" id="setFormUsername" />
                <input type="text" placeholder="Password" name="setFormPassword" id="setFormPassword" />
                <input type="email" placeholder="Email" name="setFormEmail" id="setFormEmail"/>
              </div>
              <a id="goLeft" class="off">Entrar</a>
              <button id="btnSetUsers">Cadastre-se</button>
            </form>
            <p class="msgError" style="display: none;">Erro</p>
          </div>
        </div>
        <div class="right">
          <div class="content2">
            <h2>Entrar</h2>
            <form method="POST">
              <div class="form-group">
                <input type="text" placeholder="Username" name="getFormUsername" id="getFormUsername" />
                <input type="text" placeholder="Password" name="getFormPassword" id="getFormPassword" />
              </div>
              <a id="goRight" class="off">Cadastre-se</a>
              <button id="btnGetUsers" type="submit">Entrar</button>
              <p class="msgError" style="display: none;">Erro</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>