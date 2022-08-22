function abreModal() {
  if (window.outerWidth >= 768) {

    $(document).ready(function () {
      $('#goRight').on('click', function () {
        $('#slideBox').animate({
          'marginLeft': '0'
        });
        $('.topLayer').animate({
          'marginLeft': '100%'
        });
      });
      $('#goLeft').on('click', function () {
        $('#slideBox').animate({
          'marginLeft': '50%'

        });
        $('.topLayer').animate({
          'marginLeft': '0'
        });
      });
    });
  } else {
    $(document).ready(function () {
      $('#goRight').on('click', function () {
        $('.right').addClass('hide-form')
        $('.left').removeClass('hide-form')

      })
      $('#goLeft').on('click', function () {
        $('.left').addClass('hide-form')
        $('.right').removeClass('hide-form')

      })
    })
  }
}

abreModal()


$("#btnSetUsers").click((e) => {
  e.preventDefault()

  //Criando Obj com dados do form
  let dataForm = {
    setFormUsername: $('#setFormUsername').val(),
    setFormEmail: $('#setFormEmail').val(),
    setFormPassword: $('#setFormPassword').val()
  }

  // Validando Campos do Form
  if (dataForm.setFormUsername.length < 2) {
    $('.msgError').text("Nome de Usuário invalido!").show()
    return false
  } else if (dataForm.setFormEmail.length < 6) {
    $('.msgError').text("Email invalido!").show()
    return false
  } else if (dataForm.setFormPassword.length < 2) {
    $('.msgError').text("Sua Senha deve ter 6 caracteres no minímo!").show()
    return false
  }
  $(".msgError").hide()
  let url_php = 'http://localhost/cloud_pi/mvc/model/cadastrar_user.php'


  $.ajax({
    url: url_php,
    type: 'POST',
    data: dataForm,
    dataType: 'json',
    async: true
  })
    // Sucess
    .done(function ajaxDone(res) {
      console.log(res);
      if (res.error !== undefined) {
        $(".msgError").text(res.error).show()
        return false
      }
      if (res.redirect !== undefined) {
        window.location = res.redirect
      }

    })
    // falha
    .fail(function ajaxError(e) {
      console.log(e);

    })
    // Sempre
    .always(function ajaxSempre() {
      console.log("sempre");
    })
  return false

})


$("#btnGetUsers").click((e) => {
  e.preventDefault()


  let dataForm = {
    getFormUsername: $('#getFormUsername').val(),
    getFormPassword: $('#getFormPassword').val()
  }

  // Validando Campos do Form
  if (dataForm.getFormUsername.length < 2) {
    $('.msgError').text("Nome de Usuário invalido!").show()
    return false
  } else if (dataForm.getFormUsername.length < 2) {
    $('.msgError').text("Sua Senha deve ter 6 caracteres no minímo!").show()
    return false
  }
  $(".msgError").hide()
  let url_php = 'http://localhost/cloud_pi/mvc/model/login_user.php'

  $.ajax({
    url: url_php,
    type: 'POST',
    data: dataForm,
    dataType: 'json',
    async: true
  })
    // Sucess
    .done(function ajaxDone(res) {
      console.log(res);
      if (res.error !== undefined) {
        $(".msgError").text(res.error).show()
        return false
      }
      if (res.redirect !== undefined) {
        window.location = res.redirect
      }

    })
    // falha
    .fail(function ajaxError(e) {
      console.log(e);

    })
    // Sempre
    .always(function ajaxSempre() {
      console.log("sempre");
    })
  return false

})

$("#forgetPass").click((e) => {
  e.preventDefault()


  let dataFogetForm = {
    getForgetFormUsername: $('#forgetEmail').val(),
    getForgetFormPassword: $('#forgetUsername').val()
  }

  // Validando Campos do Form
  // if (dataFogetForm.getForgetFormUsername.length < 2) {
  //   $('.msgRecoveryError').text("Email muito curto!").show()
  //   return false
  // } else if (dataFogetForm.getFormUsername.length < 2) {
  //   $('.msgRecoveryError').text("Nome de usuário muito curto").show()
  //   return false
  // }
  $(".msgRecoveryError").hide()
  let url_php = 'http://localhost/cloud_pi/mvc/model/recovery-pass-user.php'

  $.ajax({
    url: url_php,
    type: 'POST',
    data: dataFogetForm,
    dataType: 'json',
    async: true
  })
    // Sucess
    .done(function ajaxDone(res) {
      console.log(res);
      if (res.error !== undefined) {
        $(".msgError").text(res.error).show()
        return false
      }
      if (res.redirect !== undefined) {
        window.location = res.redirect
      }

    })
    // falha
    .fail(function ajaxError(e) {
      console.log(e);

    })
    // Sempre
    .always(function ajaxSempre() {
      console.log("sempre");
    })
  return false

})


