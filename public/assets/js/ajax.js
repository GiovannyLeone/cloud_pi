var baseURL = "http://localhost/cloud_pi/"

$("#btnSetUsers").click((e) => {
    e.preventDefault()
    $("#btnSetUsers").prop('disabled', true);


    //Criando Obj com dados do form
    let dataForm = {
        setFormUsername: $('#setFormUsername').val(),
        setFormEmail: $('#setFormEmail').val(),
        setFormPassword: $('#setFormPassword').val()
    }

    // Validando Campos do Form
    if (dataForm.setFormUsername.length < 2) {
        $('.msgError').text("Nome de Usuário invalido!").show()
        $("#btnSetUsers").prop('disabled', false);
        return false
    } else if (dataForm.setFormEmail.length < 6) {
        $('.msgError').text("Email invalido!").show()
        $("#btnSetUsers").prop('disabled', false);
        return false
    } else if (dataForm.setFormPassword.length < 5) {
        $('.msgError').text("Sua Senha deve ter 6 caracteres no minímo!").show()
        $("#btnSetUsers").prop('disabled', false);
        return false
    }
    $(".msgError").hide()
    let urlResgister =  baseURL + 'mvc/model/user-register.php'


    $.ajax({
            url: urlResgister,
            type: 'POST',
            data: dataForm,
            dataType: 'json',
            async: true
        })
        // Success
        .done(function ajaxDone(res) {
            console.log(res);
            if (res.error !== undefined) {
                $(".msgError").text(res.error).show()
                $("#btnSetUsers").prop('disabled', false);

                return false
            }
            if (res.redirect !== undefined) {
                const identityUser = res.identityUser
                localStorage.removeItem('keyIdentityUser');
                localStorage.setItem('keyIdentityUser', identityUser);
                window.location = baseURL + res.redirect

            }

        })
        // falha
        .fail(function ajaxError(e) {
            console.log(e);

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
    if (dataForm.getFormUsername.length < 2 && dataForm.getFormUsername.length < 2) {
        $('.msgError').text("Nome de Usuário ou senha invalidos!").show()
        Swal.fire({
            icon: 'error',
            title: 'Oops...😥',
            text: 'Nome de Usuário ou senha invalidos!',
            confirmButtonColor: '#767be4',
            confirmButtonText: 'Tentar novamente',
            footer: '<a href="">Por que precisamos dessas informações?</a>'
        })
        return false
    }
    $(".msgError").hide()
    let urlLogin =  baseURL + 'mvc/model/user-login.php'

    $.ajax({
            url: urlLogin,
            type: 'POST',
            data: dataForm,
            dataType: 'json',
            async: true
        })
        // Success
        .done(function ajaxDone(res) {
            console.log(res);
            if (res.error !== undefined) {
                $('.msgError').text("Nome de Usuário ou senha invalidos!").show()
                $(".msgError").text(res.error).show()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...😥',
                    text: 'Nome de Usuário ou senha invalidos!',
                    confirmButtonColor: '#767be4',
                    confirmButtonText: 'Tentar novamente',
                    footer: '<a href="">Por que precisamos dessas informações?</a>'
                })
                return false
            }
            if (res.redirect !== undefined) {
                // window.location = res.redirect
                const identityUser = res.identityUser
                localStorage.removeItem('keyIdentityUser');
                localStorage.setItem('keyIdentityUser', identityUser);
                window.location = baseURL + res.redirect
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
    let url_php = 'http://localhost/cloud_pi/mvc/model/user-verify-recovery-pass.php'


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

                const imgURL = "public/assets/img/marca-d-agua-cloud-branco@600x.png"

                let requestURL = baseURL + imgURL

                let hashUser = {
                    redirectURL: res.redirect,
                    username: res.username,
                    userEmail: res.userEmail,
                    hash: res.urlHash,
                    date: res.date,
                    time: res.time
                }
                console.log(res.hashUser);
                Swal.fire({
                    html: 'Cheque sua caixa de email para redefinir sua senha! ',
                    imageUrl: requestURL,
                    imageHeight: 60,
                    icon: 'success',
                })
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
    if (dataUpdateForm.updateEmailUser.length < 2 || dataUpdateForm.updateLoginUser.length < 2 ||
        dataUpdateForm.updatePassUser.length < 5 || dataUpdateForm.updatePassUserConf.length < 5) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...😥',
            text: 'Credenciais invalidas ou senha muito curta!',
        })
    } else if (dataUpdateForm.updatePassUser !== dataUpdateForm.updatePassUserConf) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...😥',
            text: 'Credenciais invalidas ou senha muito curta!',
        })
    } else {

        $(".msgRecoveryError").hide()
        let url_php = 'http://localhost/cloud_pi/mvc/model/user-update-pass.php'


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
    }
})

// Ajax Profile

$("#teste").click((e) => {
    e.preventDefault()

    let url_php = 'http://localhost/cloud_pi/mvc/model/profile-login.php'


    $.ajax({
        url: url_php,
        type: 'POST',
        dataType: 'json',
        async: true
    })

    .done(function ajaxDone(res) {
        console.log(res);
        if (res.error !== undefined) {

        }
        if (res.idUser !== undefined) {
            console.log(res.idUser);

        }

    })


})