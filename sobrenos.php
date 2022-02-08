<!DOCTYPE html>
<html lang="en">
<head>
    <!--===============================================
    FARMÁCIA ARI 1.

    ====================================================-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farmacia Ari: Sobre nós</title>

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
                <h2>Sobre Nós</h2>
              </div>
              <div class="blog-breadcrumbs-right">
                <ol class="breadcrumb">
                  <li>Tu estás aqui</li>
                  <li><a href="#">Ínicio</a></li>
                  <li class="active">Sobre Nós</li>
                </ol>
              </div>
            </div>
          </div>
        </div>        
      </div>      
    </section>
    <!--=========== BEGAIN Doctors SECTION ================-->
    <section id="meetDoctors">
      <div class="container">
          <div class="section-heading">
              <h2>Sobre Nós</h2>
              <div class="line"></div>
          </div>
          <p><h5><b>Disponibilizamos nas nossas farmácias serviços farmacêuticos e cuidados de saúde com elevado profissionalismo e dedicação, de forma a promover a saúde e a prevenir a doença.
              Nas nossas Farmácias irá encontrar sempre mais do que um Farmacêutico para aconselhamento sobre medicação, forma de utilização e cuidados a ter, assim como outros assuntos da área da saúde e bem-estar, sobre os quais tenha dúvidas ou lhe suscitem interesse.</h5> </p>
           <div class="section-heading">
              <h2>Nossos Produtos</h2>
              <div class="line"></div>
          </div>
          <ul class="footer-service">
              <li><a href="listarCom.php"><span class="fa fa-check"></span>Comprimidos</a></li>
              <li><a href="listarXar.php"><span class="fa fa-check"></span>Xaropes</a></li>
              <li><a href="listarBib.php"><span class="fa fa-check"></span>Para Bebés</a></li>
              <li><a href="listarCosm.php"><span class="fa fa-check"></span>Cosméticos</a></li>
             </ul>
      </div>
      </div>
    </section>
    <!--=========== End Doctors SECTION ================-->



    <!--=========== Start Footer SECTION ================-->
<?php

include_once('include/rodape.php');



?>
</body>
</html>