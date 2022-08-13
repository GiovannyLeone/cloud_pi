<!DOCTYPE html>
<html lang="pt-br">


<?php include_once("assets/includes/head.inc.php") ?>

<body>

    <!-- Modal structure -->
    <?php include_once("assets/includes/modal.inc.php") ?>


    <!-- Trigger to open Modal -->



    <main id="content-feed">
        <!-- First Col -->
        <div id="news" class="news">
            <div class="content_logo">
                <img src="assets/img/marca-d-agua-cloud_600x.png" alt="Logo da Cloud" class="logo">
                <h2>Cloud</h2>
            </div>
            <div class="contenct_news">
                <h2>News About the Cloud</h2>
                <div class="arrowed">
                    <div class="arrow-3"></div>
                    <div class="arrow-3"></div>
                    <div class="arrow-3"></div>
                </div>
            </div>
        </div>
        <!-- Fim News -->
        <!-- Second Col -->
        <div id="feed">
            <div class="search">
                <input type="search" name="" id="" placeholder="Search">
                <span></span>
            </div>
            <!-- Left POST Parts -->
            <div id="post">
                <div class="line-profile">
                    <!-- profile -->
                    <img src="assets/img/logo-cloud@600x.png" alt="Img_profile" class="img-profile">
                    <div class="div-profile-name-id">
                        <p class="name-profile">Giovanny Leone</p>
                        <p class="code_profile">@GvannyLB</p>
                    </div>
                    <img src="assets/img/marca-d-agua-cloud-branco@600x.png" alt="Cloud IMG" class="cloud-img">
                </div>
                <!-- POST -->
                <div class="text-img-post">
                    <p class="text-post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum commodi eligendi officia unde voluptates at minus repellendus eveniet? Reprehenderit consequuntur id odit dignissimos ipsum odio facilis delectus voluptates dolor magnam.</p>
                    <img src="assets/img/cloudbg-black.png" alt="img_POST" class="img-post">
                    <p class="data-post">saved in 03/07/2022 at 22:50</p>
                </div>
                <!-- interaction -->
                <div class="interaction">
                    <img src="#" alt="reação">
                    <img src="#" alt="reação">
                    <img src="#" alt="reação">
                </div>


                <!-- Parts Post -->
            </div>

            <!-- Right POST Parts -->
            <div id="post-right">
                <div class="line-profile-right">
                    <!-- profile -->
                    <img src="assets/img/logo-cloud@600x.png" alt="Img_profile" class="img-profile-right">
                    <div class="div-profile-name-id-right">
                        <p class="name-profile">Giovanny Leone</p>
                        <p class="code_profile">@GvannyLB</p>
                    </div>
                    <img src="assets/img/marca-d-agua-cloud-branco@600x.png" alt="Cloud IMG" class="cloud-img-right">
                </div>
                <!-- POST -->
                <div class="text-img-post-right">
                    <p class="text-post-right">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum commodi eligendi officia unde voluptates at minus repellendus eveniet? Reprehenderit consequuntur id odit dignissimos ipsum odio facilis delectus voluptates dolor magnam.</p>
                    <img src="assets/img/cloudbg-black.png" alt="img_POST" class="img-post-right">
                    <p class="data-post-right">saved in 03/07/2022 at 22:50</p>
                </div>
                <!-- interaction -->
                <div class="interaction-right">
                    <img src="#" alt="reação">
                    <img src="#" alt="reação">
                    <img src="#" alt="reação">
                </div>


                <!-- Parts Post -->
            </div>

            <!-- Parts Fedd -->
        </div>

        <!-- Third col -->
        <div id="menu">
            <div id="menu-navegation">
                <a href="feed.html">
                    <h3>Home <span class="circo-exemple1"></span></h3>
                </a>
                <a href="profile.html">
                    <h3>Profile <span class="circo-exemple1"></span></h3>
                </a>
                <a href="settings.html">
                    <h3>Settings <span class="circo-exemple1"></span></h3>
                </a>
            </div>
            <div id="menu-chat">
                <div id="text-chat">
                    <h3>Chat</h3>
                </div>
                <div class="list-chat">
                    <div>
                        <a href="#" data-izimodal-open="#modalChat" data-izimodal-transitionin="fadeInDown">
                            <span class="circo-exemple2"></span>
                            <p>Nome</p>
                        </a>
                    </div>
                    <div>
                        <a href="#" data-izimodal-open="#modalCreatePost" data-izimodal-transitionin="fadeInDown">
                            <span class="circo-exemple2"></span>
                            <p>Nome</p>
                        </a>
                    </div>
                    <div>
                        <span class="circo-exemple2"></span>
                        <p>Nome</p>
                    </div>
                    <div>
                        <span class="circo-exemple2"></span>
                        <p>Nome</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php include_once("assets/includes/footer.inc.php") ?>
    
</body>

</html>