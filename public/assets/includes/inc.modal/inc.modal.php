    <!-- Modal Chat -->
    <div id="modalChat">
        <div style="height: 90vh;">
            <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">X</a>
            <!--  The attr 'data-iziModal-preventClose' will allow the already open modal is not closed.-->

            <a href="#" data-izimodal-open="#another-modal" data-izimodal-zindex="20000" data-izimodal-preventclose="">Another Modal</a>

            <!-- You can also use: data-iziModal-transitionOut="fadeOutDown" without data-iziModal-preventClose -->

            <h1>Hello World!</h1>

        </div>
        <!-- data-iziModal-fullscreen="true"  data-iziModal-title="Welcome"  data-iziModal-subtitle="Subtitle"  data-iziModal-icon="icon-home" -->
        <!-- Modal content -->
    </div>



    <div id="modalCreatePost">
        <div style="height: 90vh;">
            <div class="close-btn">
                <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Close Modal (X) | </a>
                <!--  The attr 'data-iziModal-preventClose' will allow the already open modal is not closed.-->
                <a href="#" data-izimodal-open="#modalSharePost" data-izimodal-zindex="20000" data-izimodal-preventclose="">| Add Modal (A)</a>
            </div>
            <!-- You can also use: data-iziModal-transitionOut="fadeOutDown" without data-iziModal-preventClose -->
            <div class="myFlex">
                <div class="statusChat">
                    <div class="profileChat">
                        <img src="assets/img/img-profile.png" alt="">
                        <h2>Giovanny Leone</h2>
                    </div>
                    <div class="statusProfileChat">
                        <div class="bioChat">
                            "That a simple Biography"
                        </div>
                        <div class="yourStatusChat">
                            <div class="setChat">
                                <h3>What you fell?</h3>
                                <img src="assets/img/medal-gold.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="logoChat">
                        <img src="assets/img/marca-d-agua-cloud_600x.png" alt="logo">
                        <h2>Chat</h2>
                    </div class="chatPart">
                    <div class="receiverChat">
                        <img src="assets/img/img-profile.png" alt="">
                        <h2>Gustavo Leone</h2>
                    </div>
                    <div class="chatBox">
                        <div class="chatResponse">
                            <div class="chatInfoProfile">
                                <h2>Gustavo Leone</h2>
                                <img src="assets/img/img-profile.png" alt="">
                            </div>
                            <p class="receiverResponse">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit reprehenderit atque unde perferendis,</p>
                            <p class="receiverResponse">AAAAAAAAAAAAAAALorem ipsum, dolor sit amet consectetur adipisicing elit. Odit reprehenderit atque unde perferendis,</p>
                        </div>

                        <div class="chatYourMessage">
                            <p class="yourMessage">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit reprehenderit atque unde perferendis,</p>
                            <p class="yourMessage">AAAAAAAAAAAAAALorem ipsum, dolor sit amet consectetur adipisicing elit. Odit reprehenderit atque unde perferendis,</p>
                        </div>

                    </div>
                    <div class="typingChat">
                        <textarea type="textarea" id="yourTyping" name="yourTyping" placeholder="Typing Something"></textarea>
                        <div id="btnChat">
                            <button style="background-color: #0D0D0D;">C</button>
                            <button style="background-color: #0D0D0D;">S</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- data-iziModal-fullscreen="true"  data-iziModal-title="Welcome"  data-iziModal-subtitle="Subtitle"  data-iziModal-icon="icon-home" -->
        <!-- Modal content -->
    </div>


    <!-- Share Posts -->


    <div id="modalSharePost">
        <div style="height: 90vh;">
            <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">X</a>
            <!--  The attr 'data-iziModal-preventClose' will allow the already open modal is not closed.-->

            <a href="#" data-izimodal-open="#another-modal" data-izimodal-zindex="20000" data-izimodal-preventclose="">Another Modal</a>

            <!-- You can also use: data-iziModal-transitionOut="fadeOutDown" without data-iziModal-preventClose -->

            <h1>Modal for POSTS!!!!????????</h1>

        </div>
        <!-- data-iziModal-fullscreen="true"  data-iziModal-title="Welcome"  data-iziModal-subtitle="Subtitle"  data-iziModal-icon="icon-home" -->
        <!-- Modal content -->
    </div>


    <!-- Modal recovery Pass  -->

    <div id="modalRecoveryPass">
        <div class="modalRecoveryPass">

            <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown"></a>
            <!--  The attr 'data-iziModal-preventClose' will allow the already open modal is not closed.-->

            <a href="#" data-izimodal-open="#another-modal" data-izimodal-zindex="20000" data-izimodal-preventclose=""></a>

            <!-- You can also use: data-iziModal-transitionOut="fadeOutDown" without data-iziModal-preventClose -->

            <div>
                <form method="POST" class="recovery-pass-form">
                    <div class="modalRecoveryConta">
                    <h2>Recuperar Senha</h2>
                    
                    <input class="recovery-pass-email" type="email" name="forgetEmail" id="forgetEmail" placeholder="Digite seu Email">
                    <br>
                    <input class="recovery-pass-user" type="text" name="forgetUsername" id="forgetUsername" placeholder="Digite seu usuário">
                    <br>
                    <br>
                    <button id="forgetPass">Recuperar Senha</button>
                    <p class="msgRecoveryError" style="display: none;"></p>
                    </div>


                </form>
            </div>
        </div>
        <!-- data-iziModal-fullscreen="true"  data-iziModal-title="Welcome"  data-iziModal-subtitle="Subtitle"  data-iziModal-icon="icon-home" -->
        <!-- Modal content -->
        <script src="assets/js/ajax.js"></script>
    </div>