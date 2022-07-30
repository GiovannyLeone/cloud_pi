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
    $('.msgError').html("Nome de Usuário invalido!").show()
    return false
  } else if (dataForm.setFormEmail.length < 6) {
    $('.msgError').html("Email invalido!").show()
    return false
  } else if (dataForm.setFormPassword.length < 2) {
    $('.msgError').html("Sua Senha deve ter 6 caracteres no minímo!").show()
    return false
  }
  $(".msgError").hide()
  let url_php = 'http://localhost/cloud_project/mvc/model/cadastrar_user.php'

  // let username = $('#setFormUsername').val()
  // let email = $('#setFormEmail').val()
  // let password = $('#setFormPassword').val()

  // console.log(username + " | " + email + " | " + password);

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
      if (res.erro !== undefined) {
        $(".msgError").html(res.error).show()
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
    $('.msgError').html("Nome de Usuário invalido!").show()
    return false
  } else if (dataForm.getFormUsername.length < 2) {
    $('.msgError').html("Sua Senha deve ter 6 caracteres no minímo!").show()
    return false
  }
  $(".msgError").hide()
  let url_php = 'http://localhost/cloud_project/mvc/model/login_user.php'

  // let getFormUsername = $('#getFormUsername').val()
  // let getFormPassword = $('#getFormPassword').val()

  // console.log(getFormUsername  + " | " + getFormPassword);
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
      if (res.erro !== undefined) {
        $(".msgError").html(res.error).show()
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


