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
    let url_php = 'http://localhost/cloud_pi/mvc/model/cadastrar-user.php'


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
    let url_php = 'http://localhost/cloud_pi/mvc/model/login-user.php'

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


    let dataForgetForm = {
        getForgetFormEmail: $('#forgetEmail').val(),
        getForgetFormUsername: $('#forgetUsername').val()
    }

    // Validando Campos do Form
    if (dataForgetForm.getForgetFormEmail.length < 2 || dataForgetForm.getForgetFormUsername.length < 2) {
        $('.msgRecoveryError').text("Email ou nome de usuario Invalido").show()
        Swal.fire({
            icon: 'error',
            title: 'Oops...😥',
            text: 'Email ou nome de usuário Invalido!',
            confirmButtonColor: '#767be4',
            confirmButtonText: 'Tentar novamente',
            footer: '<a href="">Por que precisamos dessas informações?</a>'
        })
        return false
    }
    $(".msgRecoveryError").hide()
    let url_php = 'http://localhost/cloud_pi/mvc/model/verify-recovery-pass-user.php'


    $.ajax({
            url: url_php,
            type: 'POST',
            data: dataForgetForm,
            dataType: 'json',
            async: true
        })
        // Success
        .done(function ajaxDone(res) {
            console.log(res);
            if (res.error !== undefined) {
                $(".msgError").text(res.error).show()
                $('.msgRecoveryError').text("Email ou nome de usuario Invalido").show()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...😥',
                    text: 'Email ou nome de usuário Invalido!',
                    confirmButtonColor: '#767be4',
                    confirmButtonText: 'Tentar novamente',
                    footer: '<a href="">Por que precisamos dessas informações?</a>'
                })
                return false
            }
            if (res.redirect !== undefined) {

                let hashUser = {
                    redirectURL: res.redirect,
                    username: res.username,
                    userEmail: res.userEmail,
                    hash: res.urlHash,
                    date: res.date,
                    time: res.time
                }
                console.log(res.hashUser);
                Swal.fire(
                    'Muito bem! 🥳',
                    'Cheque sua caixa de email para redefinir sua senha!',
                    'success'
                )
                setTimeout(() => {
                    window.location.href = res.redirect + "?idRec=" + hashUser.hash + "&idEmail=" + hashUser.userEmail + "&idUsername=" + hashUser.username + "&idDate=" + hashUser.date + "&idTime=" + hashUser.time
                }, "5000")
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


$("#updatePass").click((e) => {
    e.preventDefault()


    let dataUpdateForm = {
        updateEmailUser: $('#updateEmailUser').val(),
        updateLoginUser: $('#updateLoginUser').val(),
        updatePassUser: $('#updatePassUser').val(),
        updatePassUserConf: $('#updatePassUserConf').val(),
        updateHashUser: $('#idRec').val()
    }

    // Validando Campos do Form
    if (dataUpdateForm.updateEmailUser.length < 2 || dataUpdateForm.updateLoginUser.length < 2) {
        $('.msgRecoveryError').text("Email ou nome de usuario Invalido").show()
        Swal.fire({
            icon: 'error',
            title: 'Oops...😥',
            text: 'Email ou nome de usuario Invalido!',
            footer: '<a href="">Por que precisamos dessas informações?</a>'
        })
        return false
    }
    $(".msgRecoveryError").hide()
    let url_php = 'http://localhost/cloud_pi/mvc/model/update-pass-user.php'


    $.ajax({
            url: url_php,
            type: 'POST',
            data: dataUpdateForm,
            dataType: 'json',
            async: true
        })
        // Success
        .done(function ajaxDone(res) {
            console.log(res);
            if (res.error !== undefined) {
                $(".msgError").text(res.error).show()
                return false
            }
            if (res.redirect !== undefined) {
                Swal.fire({
                    title: 'Senha alterada! 😁',
                    html: 'Sua senha foi redefinida com sucesso! <br> Redirecionamento em: <b></b> ',
                    icon: 'success',
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: () => {
                      Swal.showLoading()
                      const b = Swal.getHtmlContainer().querySelector('b')
                      timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                      }, 100)
                    },
                    willClose: () => {
                      clearInterval(timerInterval)
                    }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                  console.log('I was closed by the timer')
                }
              })
                setTimeout(() => {
                    window.location.href = res.redirect
                }, "5000")

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