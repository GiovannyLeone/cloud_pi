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


$( "#btnSetUsers" ).click(() => {

  let username = $('#setFormUsername').val()
  let email = $('#setFormEmail').val()
  let password = $('#setFormPassword').val()

  console.log(username + " | " + email + " | " + password);
  $.ajax({
    url: "../mvc/model/cadastrar_user.php",
    type: 'POST',
    data: {
      setFormUsername: username,
      setFormEmail: email,
      setFormPassword: password
    }
  })

  return false

})


$( "#btnGetUsers" ).click(() => {

  let username = $('#getFormUsername').val()
  let password = $('#getFormPassword').val()

  console.log(username  + " | " + password);
  $.ajax({
    url: "../mvc/model/login_user.php",
    type: 'POST',
    data: {
      getFormUsername: username,
      getFormPassword: password
    }
  })

  return false

})


