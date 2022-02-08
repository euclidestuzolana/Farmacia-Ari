
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
                            <li class="active">Ver nossos Produtos</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <form class="form-inline navbar-search" method="post" action="pesquisarprodHomeSab.php" >
            <input id="srchFld" class="srchTxt" type="text" name="pesquisar"/>
            <div class="btn-group" > <input type="text" value="Sabonetes"disabled>



                <button data-toggle="dropdown" class=" btn-primary dropdown-toggle"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="listar.php">Todos</a></li>
                    <li><a href="listarCom.php">Comprimidos</a></li>
                    <li><a href="listarXar.php">Xaropes</a></li>
                    <li><a href="#">Ampolas</a></li>
                    <li><a href="listarUtenB.php">Utensilios para Bebe</a></li>
                    <li><a href="listarSer.php">Seringa</a></li>
                    <li><a href="listarAde.php">Adesivo</a></li>
                    <li><a href="listarReM.php">Relaxante Muscular</a></li>
                    <li><a href="listarPerf.php">Perfumes</a></li>
                    <li><a href="listarPres.php">Preservativos</a></li>
                    <li><a href="listarCur.php">Curitas</a></li>
                    <li><a href="listarSab.php">Sabonetes</a></li>
                    <li><a href="listarPom.php">Pomadas</a></li>
                    <li><a href="listarCosm.php">Cosmetico</a></li>
                    <li><a href="listarlen.php">Lenços</a></li>
                    <li><a href="listarleit.php">Leites</a></li>
                    <li><a href="listarAc.php">Aguá de Colónia</a></li>
                    <li><a href="listarAlc.php">Álcool Etilíco</a></li>
                    <li><a href="listarGel.php">Gel</a></li>
                    <li><a href="listarCre.php">Creme</a></li>
                    <li><a href="listarLub.php">Lubrificante</a></li>
                    <li><a href="listarBib.php">Biberões</a></li>
                    <li><a href="listarChu.php">Chupetas</a></li>




                </ul>
            </div>

            <button type="submit" id="submitButton" class=" btn-success">Pesquisar</button>
        </form>

        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg']."<br><br>";
            unset($_SESSION['msg']);
        }
        ?>
        <?php

        //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //Setar a quantidade de itens por pagina
        $qnt_result_pg = 10;

        //calcular o inicio visualização<<<<<
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $result_usuarios = "SELECT id,imagem,nome,farmacias,categoria,qnt_voto,preco FROM produtos,farmacia,categoriaprod WHERE farmaciaprod=idfarmacia and categoriaprod=idcategoria and  farmaciaprod='1' and categoriaprod='11' LIMIT  $inicio, $qnt_result_pg ";
        $resultado_usuarios = mysqli_query($conn, $result_usuarios);

        ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="">
                <thead>
                <tr>


                    <th  align="center"id="bt4"width="100">Imagem</th>
                    <th  width="150" align="center">Nome</th>
                    <th  width="150" align="center">Farmácia</th>
                    <th  width="150" align="center">Categoria</th>

                    <th  width="150" align="center">Votos</th>
                    <th  width="150" align="center">Preço</th>

                    <th width="300"  align="center"id="avv">Acções</th>


                </tr>
                </thead>


                <?php
                while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                ?>


                <tbody>
                <tr class="odd gradeX">

                    <td align="center"id="bt4"><?php   echo  '<img  src="themes/images/'.$row_usuario['imagem'].'"';?></td>
                    <td  width="150" align="center"><?php  echo "<b>"  .  $row_usuario['nome']."</b>"  ;?></td>
                    <td  width="150" align="center"><?php  echo "<b>" .$row_usuario['farmacias'] ;?></td>
                    <td  width="150" align="center"><?php  echo "<b>" .$row_usuario['categoria'] ;?></td>

                    <td  width="150" align="center"><?php  echo   "<b>"  .$row_usuario['qnt_voto']."</b>"  ;?></td>
                    <td width="150" align="center"><?php  echo  "<b>"  .$row_usuario['preco']. "Kz<b>"  ;?></td>

                    <td width="300"align="center"id="avv">

                        <?php echo "<button class='btn-danger'> <a href='votar.php?id=".$row_usuario['id']."'>Votar</a></button>";?>
                        <?php echo "<button class='btn-success'> <a href='logincliente.php'>Comprar</a></button>";?>
                        <?php echo "<button class='btn-primary'> <a href='verhome.php?id=".$row_usuario['id']."'>Detalhes</a></button>";?>
                    </td>
                </tr>
                <?php }//end if ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
//Paginção - Somar a quantidade de usuários
$result_pg = "SELECT COUNT(id) AS num_result FROM produtos WHERE farmaciaprod='1' and categoriaprod='11'";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
//echo $row_pg['num_result'];
//Quantidade de pagina
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os link antes depois
$max_links = 2;
echo "<a href='listarSab.php?pagina=1'><b class='btn btn-success'>Primeira</b></a>";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
    if($pag_ant >= 1){
        echo "<a href='listarSab.php?pagina=$pag_ant'>$pag_ant</a> ";
    }
}

echo "$pagina ";

for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
        echo "<a href='listarSab.php?pagina=$pag_dep'>$pag_dep</a> ";
    }
}

echo "<a href='listarSab.php?pagina=$quantidade_pg'><b class='btn btn-success'>Ultima</b></a>";

?>

<!--=========== Start Footer SECTION ================-->
<?php

include_once('include/rodape.php');



?>
</body>




</html>