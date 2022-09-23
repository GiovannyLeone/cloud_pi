const requestUser = {
    identityUser: sessionStorage.getItem('keyIdentityUser')
}
var baseURL = "http://localhost/cloud_pi/"


$.ajax({
        url: baseURL + "mvc/model/profile-login.php",
        type: 'POST',
        data: requestUser,
        dataType: 'json',
        async: true
    })
    // Sucess
    .done(function ajaxDone(res) {
        console.log(res);
        if (res.error !== undefined) {
            alert("Deu Ruim!")
            return false
        }
        if (res.redirect !== undefined) {
            alert("Deu Bão!")

        }

    })


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
                    class: "ageProfile"
                },
                inputValue: 21,
                preConfirm: () => {
                    const ageProfile = Swal.getPopup().querySelector('.ageProfile').value

                    return { ageProfile: ageProfile }

                }
            }).then((res) => {
                var ageProfile = res.value.ageProfile
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
                              <option valeu="default" selected>País</option>
                              <option valeu="BR">Brasil</option>
                              <option valeu="AR">Argentina</option>
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
                            <option valeu="default" selected>Selecione o estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
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
                            swal.fire({
                                title: 'sua cidade?...',
                                icon: 'question',
                                confirmButtonText: "Confirmar",
                                html: `<input type="text" id="userCity" placeholder="Sua cidade?">`,
                                focusConfirm: false,
                                preConfirm: () => {
                                    const userCity = Swal.getPopup().querySelector('#userCity').value
                                    return { userCity: userCity }
                                }
                            }).then((res) => {
                                var userCity = res.value.userCity
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
                                    Swal.fire(`
                                    codeCloud: ${ codeCloud }
                                    Name: ${ profileName }
                                    Idade: ${ ageProfile }
                                    Sua Biografia: ${ biographyProfile }
                                    Seu País: ${ CountryProfile }
                                    Seu Estado: ${ StateProfile }
                                    Sua Cidade: ${ userCity }
                                    Caminho Image: ${ pathImage }
                                    `.trim())
                                })

                            })
                        })
                    })
                })
            })
        })
    })

}, "100")