<!DOCTYPE html>
<html lang="pt-br">

<?php include_once("assets/includes/inc.head-footer/head.inc.php") ?>
<style>
  #deleteUser{
    margin: 0 auto;
    cursor: pointer;
    background-color: #d33;
  }
</style>
<body>
  <main id="content">
    <!-- Settings -->
    <div id="settings">
      <img src="assets/img/marca-d-agua-cloud_600x.png" alt="" class="logo">
      <div class="options">
      <a href="#"><h3>Profile</h3></a>
      <a href="#"><h3>Account</h3></a>
      <a href="#"><h3>Settings</h3></a>
      <a href="#"><h3>Log out</h3></a>
      <button id="deleteUser">Deletar Conta</button>
      </div>
    </div>
  </main>
</body>
<!-- Modal structure -->
<?php include_once("assets/includes/inc.head-footer/footer.inc.php") ?>
<script src="assets/js/ajax.js"></script>
</html>