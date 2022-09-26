const requestUser = {
    identityUser: localStorage.getItem('keyIdentityUser')
}
var baseURL = "http://localhost/cloud_pi/"
console.log(requestUser.identityUser);

// console.log(identityUser);

setTimeout(() => {
    swal.fire({
        title: 'Qual será seu código de identificação "@"',
        icon: 'question',
        confirmButtonText: "Confirmar",
        html: `<input type="text" id="codeCloud" placeholder="@">`,
        focusConfirm: false,
        preConfirm: () => {
            const codeCloud = Swal.getPopup().querySelector('#codeCloud').value
            if (!codeCloud) {
                Swal.showValidationMessage(`Código Cloud invalido 😓`)
            }
            return { codeCloud: codeCloud }
        }
    }).then((res) => {
        var codeCloud = res.value.codeCloud
        swal.fire({
            title: 'Qual será seu nome de exibição em seu perfil?',
            icon: 'question',
            confirmButtonText: "Confirmar",
            html: `<input type="text" id="profileName" placeholder="Seu nome">`,
            focusConfirm: false,
            preConfirm: () => {
                const profileName = Swal.getPopup().querySelector('#profileName').value
                if (!profileName) {
                    Swal.showValidationMessage(`Nome invalido 😓`)
                }
                return { profileName: profileName }
            }
        }).then((res) => {
            var profileName = res.value.profileName
            Swal.fire({
                title: 'How old are you?',
                icon: 'question',
                input: 'range',
                inputLabel: 'Your age',
                inputAttributes: {
                    min: 8,
                    max: 120,
                    step: 1,
                    class: "profileAge"
                },
                inputValue: 21,
                preConfirm: () => {
                    const profileAge = Swal.getPopup().querySelector('.profileAge').value

                    return { profileAge: profileAge }

                }
            }).then((res) => {
                var profileAge = res.value.profileAge
                swal.fire({
                    title: 'Gostaria de contar um pouco da sua história...',
                    icon: 'question',
                    confirmButtonText: "Confirmar",
                    html: `<textarea rows="10" cols="50" id="biographyProfile" placeholder="Escreva sobre você..."></textarea>`,
                    focusConfirm: false,
                    showCancelButton: true,
                    preConfirm: () => {
                        const biographyProfile = Swal.getPopup().querySelector('#biographyProfile').value
                        return { biographyProfile: biographyProfile }
                    }

                }).then((res) => {
                    var biographyProfile = res.value.biographyProfile

                    swal.fire({
                        title: 'Seu país?...',
                        icon: 'question',
                        confirmButtonText: "Confirmar",
                        html: `
                           <select id="country" name="country">
                              <option value="default" selected>País</option>
                              <option value="1">Brasil</option>
                              <option value="2">Argentina</option>
                           </select>

                              `,
                        focusConfirm: false,
                        preConfirm: () => {
                            var selectCountry = $('#country option:selected');
                            const CountryProfile = ""
                            return { CountryProfile: selectCountry.val() }

                        }
                    }).then((res) => {
                        var CountryProfile = res.value.CountryProfile
                        swal.fire({
                            title: 'seu estado?...',
                            icon: 'question',
                            confirmButtonText: "Confirmar",
                            html: ` 

                            <select id="state" name="state">
                            <option value="default" selected>Selecione o estado</option>
                            <option value="1">Acre</option>
                            <option value="2">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                         </select>
                                  `,
                            focusConfirm: false,
                            preConfirm: () => {
                                var selectState = $('#state option:selected');
                                const StateProfile = ""
                                return { StateProfile: selectState.val() }

                            }

                        }).then((res) => {
                            var StateProfile = res.value.StateProfile

                            Swal.fire({
                                title: 'Queremos te ver! Adicione uma foto',
                                icon: 'question',
                                confirmButtonText: "Confirmar",
                                html: `<input type='file' id='imageProfile'>`,
                                focusConfirm: false,

                                preConfirm: () => {
                                    let imageProfile = $('#imageProfile').val()
                                    const pathImage = imageProfile.split('\\')[2]
                                    if (pathImage.split('.')[1] === "png") {
                                        console.log(pathImage);
                                        return { pathImage: pathImage }
                                    }

                                }
                            }).then((res) => {
                                var pathImage = res.value.pathImage
                                let urlResgister = baseURL + 'mvc/model/profile-login.php'

                                const dataProfile = {
                                    codeCloud: `${ codeCloud }`,
                                    profileName: `${ profileName }`,
                                    profileAge: profileAge,
                                    biographyProfile: `${ biographyProfile }`,
                                    idCountry: CountryProfile,
                                    idState: StateProfile,
                                    pathImage: `profile/${ pathImage }`,
                                    keyIdentityUser: `${ requestUser.identityUser }`
                                }
                                $.ajax({
                                    url: urlResgister,
                                    type: 'POST',
                                    data: dataProfile,
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
                                                text: 'Algo deu errado',
                                                confirmButtonColor: '#767be4',
                                                confirmButtonText: 'Confirmar',
                                            })
                                            return false
                                        }
                                        if (res.redirect !== undefined) {
                                            // window.location = res.redirect
                                            // window.location.href = urlResgister
                                            console.log(res.idLocation)
                                            console.log(res.idCloudCode)
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


                                Swal.fire(`
                                    codeCloud: ${ codeCloud }
                                    Name: ${ profileName }
                                    Idade: ${ profileAge }
                                    Sua Biografia: ${ biographyProfile }
                                    Seu País: ${ CountryProfile }
                                    Seu Estado: ${ StateProfile }
                                    Caminho Image: ${ pathImage }
                                    `.trim())
                            })

                        })
                    })
                })
            })
        })
    })

}, "100")