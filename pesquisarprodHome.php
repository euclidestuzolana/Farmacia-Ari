

<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <!--===============================================
    FARMÁCIA ARI 1.

    ====================================================-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farmacia Ari: Ínicio</title>

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
<br>
<br>
<br>
<section id="blogArchive">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-breadcrumbs-area">
                <div class="container">
                    <div class="blog-breadcrumbs-left">
                        <h2>Produtos</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>Tu estas aqui</li>
                            <li><a href="#">Ínicio</a></li>
                            <li class="active">Produtos</li>
                            <li class="active">Produto Pesquisado</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<div class="container">
    <div class="row">
        <form class="form-inline navbar-search" method="post" action="pesquisarprodHome.php" >
            <input id="srchFld" class="srchTxt" type="text" name="pesquisar"/>

            <button type="submit" id="submitButton" class="btn btn-success">Pesquisar</button>
        </form>
        <!-- Sidebar end=============================================== -->
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>  Resultados De </b><?php $pesquisar=$_POST['pesquisar'];
                        echo "'$pesquisar'";

                        ?>
                    </div>
                    <div class="panel-body">
                        <?php


                        include_once 'conexao.php';


                        $pesquisar = $_POST['pesquisar'];
                        if($pesquisar ==""){

                            echo "Nenhum Produto Encontrado";

                        }else {
                            $result_funcio="SELECT id,imagem,nome,preco,Qtde,Codbarras FROM produtos,farmacia WHERE id and nome  LIKE  '%$pesquisar%' and farmaciaprod=idfarmacia and estadoProd='1'  ";
                            $resultado_funcio = mysqli_query($conn, $result_funcio);
                            while ($row_funcio = mysqli_fetch_array($resultado_funcio)) {

                                if($row_funcio['nome'] != $pesquisar){

                                    echo"Produto Encontrado...";

                                }
                                $id=$row_funcio['id'];
                                $imagem=$row_funcio['imagem'];
                                $nome=$row_funcio['nome'];
                                $preco=$row_funcio['preco'];

                                $Qtde=$row_funcio['Qtde'];


                                $Codbarras=$row_funcio['Codbarras'];

                                echo"
 <div class='panel-body'>
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover' >
                                    <thead>
                                    <tr>
<th>Imagem</th>
<th>Nome</th>
<th>Preço</th>

<th>Quantidade</th>

<th>Código de Barras</th>
<th>Ações</th>
</tr>
</thead>


 <tbody>
                                    <tr class='odd gradeX'>


<td>    <img src='themes/images/" . $row_funcio['imagem'] . "';</td>
<td>$nome</td>
<td>$preco</td>

<td>$Qtde</td>

<td><img src='themes/images/" . $row_funcio['Codbarras'] . "';</td>


<td>   <a href='logincliente.php' ><button class='btn btn-danger'>Comprar Produto</button></a>
                             </td>





</tr>
</tbody>
</table>
</div>
</div>";

                            }

                        }

                        ?>


                    </div>

                </div>

            </div>

            <!--End Advanced Tables -->
        </div>

    </div>

</div>


<!--=========== Start Footer SECTION ================-->
<?php

include_once('include/rodape.php');



?>
</body>




</html>