<?php

$baseURL = "http://localhost/cloud_pi/public/";

?><!DOCTYPE html>
<?php include_once("profile-head.php")?>
<body>

    
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=$baseURL?>assets/js/scripts.js"></script>
<script src="<?=$baseURL?>assets/js/ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/js/iziModal.js" integrity="sha512-1J0h9sFPFsywGN1ZMdHRX7n94nW1lvmX+yNAqcsSJSdayFsGE935ginqQ31R6rwxarOKG7j//Km5SB6cOT8aUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?=$baseURL?>assets/js/modal.js"></script>

<script>
    let identityUser = sessionStorage.getItem('keyIdUser');
    console.log(identityUser);

        setTimeout(() => {
            Swal.fire({
            title: 'Qual será seu código de identificação "@"',
            icon: 'question',
            input: 'text',
            inputLabel: 'Seu código Cloud',
            inputAttributes: {
                placeholder: "@",
                name: 'codeCloud'
            },
        })
        Swal.getInput()	
    }, "100")





    

       
</script>
</html>