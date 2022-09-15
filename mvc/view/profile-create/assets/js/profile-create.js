let identityUser = sessionStorage.getItem('keyIdUser');
console.log(identityUser);

    setTimeout(() => {
        swal.fire({
        title: 'Qual será seu código de identificação "@"',
        icon: 'question',
        confirmButtonText:"Confirmar",
        html:`<input type="text" id="codeCloud" placeholder="@">`,
        focusConfirm: false,
        preConfirm: () => {
            const codeCloud = Swal.getPopup().querySelector('#codeCloud').value
            if (!codeCloud) {
            Swal.showValidationMessage(`Código Cloud invalido 😓`)
            }
            return { codeCloud: codeCloud}
        }        
    }).then((res) => {
        var codeCloud = res.value.codeCloud
        swal.fire({
            title: 'Qual será seu nome de exibição em seu perfil?',
            icon: 'question',
            confirmButtonText:"Confirmar",
            html:`<input type="text" id="profileName" placeholder="Seu nome">`,
            focusConfirm: false,
            preConfirm: () => {
                const profileName = Swal.getPopup().querySelector('#profileName').value
                if (!profileName) {
                Swal.showValidationMessage(`Nome invalido 😓`)
                }
                return { profileName: profileName}
            }        
        }).then((res) => {
        var profileName = res.value.profileName
        Swal.fire({
            title: 'Qual é sua idade?',
            icon: 'question',
            confirmButtonText:"Confirmar",
            html:`<input type="range" id="ageProfile" min="18" max="100" value="21"> <br>
`,
            preConfirm: () => {
                const ageProfile = Swal.getPopup().querySelector('#ageProfile').value

                return { ageProfile: ageProfile}
            }        
          }).then((res) => {
            Swal.fire(`
                   codeCloud: ${codeCloud}
                   Name: ${profileName}
                   Idade: ${res.value.ageProfile}
           `.trim()) 
          })
          })
    })

}, "100")



// Fim do codigo
// Swal.fire(`
//         codeCloud: ${codeCloud}
//         Name: ${res.value.name}
// `.trim())
