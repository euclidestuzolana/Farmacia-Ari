<!DOCTYPE html>
<html lang="en">
<head>
    <!--===============================================
    FARMÁCIA ARI 1.

    ====================================================-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farmacia Ari: Contactos</title>

    <?php

    include_once('include/links.php');



    ?>
</head>
<body>

<!-- BEGAIN PRELOADER -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- END PRELOADER -->

<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-heartbeat"></i></a>
<!-- END SCROLL TOP BUTTON -->

<!--=========== Inicio do cabeçalho ================-->
<?php

include_once('include/cabecalho.php');



?>
<!--=========== Fim do Cabeçalho ================-->
<!--=========== END HEADER SECTION ================-->
<br>
<br>
<br>
<section id="blogArchive">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-breadcrumbs-area">
                <div class="container">
                    <div class="blog-breadcrumbs-left">
                        <h2>Contactos</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>Tu estás aqui</li>
                            <li><a href="#">Ínicio</a></li>
                            <li class="active">Contactos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========== BEGIN Google Map SECTION ================-->
<section id="googleMap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.297314036103!2d-86.74954699999999!3d34.672444999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88626565a94cdb25%3A0x74c206053b6a97c9!2s305+Intergraph+Way%2C+Madison%2C+AL+35758%2C+USA!5e0!3m2!1sen!2sbd!4v1431591462160" width="100%" height="500" frameborder="0" style="border:0"></iframe>

</section>
<!--=========== END Google Map SECTION ================-->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6">
                <div class="contact-form">
                    <div class="section-heading">
                        <h2>Contacte-nos</h2>
                        <div class="line"></div>
                    </div>
                    <p>Preencha todo o campo necessário para enviar uma mensagem. Por favor, não envie spam, obrigado!</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        Nome: <input type="text" name="nome" required class="wp-form-control wpcf7-text"><br>
                        Email: <input type="email" name="email" required class="wp-form-control wpcf7-text"><br>
                        Mensagem: <textarea name="comentario" cols="25" rows="8"class="wp-form-control wpcf7-textarea"></textarea><br>
                        <input type="submit" value="Enviar"class="btn btn-success">
                    </form>

                    <?php
                    include_once('conexao.php');
                    if(isset($_POST['nome'])){
                        $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $recado = $_POST['comentario'];
                        $result_recado = "INSERT INTO comentario (nome, email,comentario, created,estadoComent,area) VALUES ('$nome', '$email', '$recado', NOW(),'1','2')";
                        $resultado_recados= mysqli_query($conn, $result_recado);

                        echo "<span style='color: green'align='center'>"."Mensagem recebida espera pela nossa resposta obrigado!"."</span>";
                    }



                    ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6">
                <div class="contact-address">
                    <div class="section-heading">
                        <h2>Informações de Contacto</h2>
                        <div class="line"></div>
                    </div>
                    <p>Localizar a Farmácia é muito simples.</p>
                    <address class="contact-info">
                        <p><span class="fa fa-home"></span>Angola/Luanda Bairro Camama1 em frente ao Edficio Laramel</p>
                        <p><span class="fa fa-phone"></span>933381232/913381232</p>
                        <p><span class="fa fa-envelope"></span>farmaciaari@gmail.com</p>
                    </address>
                    <h3>Midia Social</h3>
                    <div class="social-share">
                        <ul>
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=========== Start Footer SECTION ================-->
<?php

include_once('include/rodape.php');



?>
</body>
</html>