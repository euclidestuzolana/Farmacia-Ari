
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
<style>
    table
    {
        width: 300px;
        font: 20px Calibri;
    }
    table, th, td
    {
        border: solid 1px #DDD;
        border-collapse: collapse;
        padding: 2px 3px;
        text-align: center;
    }
</style>
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
                            <li class="active">Ver Produto</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
}
?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "farmacia";
$conn = mysqli_connect($host, $user, $pass,$banco ) or die("erro na conexão");
mysqli_select_db($conn,$banco)or die("erro na conexão");

$id=$_GET['id'];


$mostrar=mysqli_query($conn,"SELECT * FROM produtos WHERE  id='$id'");

?>

<body>

<div id="tabela">
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Visualizar Produtos</h4>

            </div>
        </div>


        <marquee  behavior="alternate"scrollDelay=10>
            <img src="cliente/themes/images/banheiras/banheira-c-suporte-jane-squid.gif">
            <img src="cliente/themes/images/aguacolonia/colonia-1+1.gif">
            <img src="cliente/themes/images/alcool/alcool-etilico-AGA.gif">
            <img src="cliente/themes/images/bercos/berco-americano.gif">
            <img src="cliente/themes/images/biberon/biberon-azul-da-chicco.gif">
            <img src="cliente/themes/images/chupetas/chupeta-avent-ortodontica.gif">
            <img src="cliente/themes/images/cremes/creme-corpo-nivea-reafirmante.gif">
            <img src="cliente/themes/images/leites/leite-aptamil.gif">
            <img src="cliente/themes/images/comprimidos/aspirina_10comp.gif">
            <img src="cliente/themes/images/curitaseSeringas/curad.gif">
            <img src="cliente/themes/images/lubrificantes/love-lube.gif">
            <img src="cliente/themes/images/pomadas/pomada-cicatrizante.gif">
            <img src="cliente/themes/images/preservativos/durex.gif">

        </marquee>

        <div class="panel panel-default">


                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="">
                            <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Código de Barras</th>
                                <th>Preço Final</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd gradeX">
                                <?php while($row=mysqli_fetch_array($mostrar)){ ?>


                                <td> <?php echo '<img src="themes/images/'.$row['imagem'].'"';  ?> </td>
                                <td> <b> <?php echo $row['nome']?></b></td>
                                <td> <b><?php echo $row['preco'] ?>kz</b></td>
                                <td> <b><?php echo $row['descricao'] ?></b></td>
                                <td> <b><?php echo $row['Qtde'] ?></b></td>
                                <td> <?php echo '<img src="themes/images/'.$row['Codbarras'].'"';  ?> </td>
                                <td> <b><?php echo $row['precoFinal'] ?></b></td>
                            </tr>















                            <?php }//end if ?>
                            <!--End Advanced Tables -->


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <p>
            <a href="listar.php" ><button type="button" class="btn btn-xs btn-warning" href="#"align="right"id="bt6">Voltar
                </button></a>
            <button class="btn-primary"onclick="CriaPDF()"id="btnImprimir"><b class="fa fa-print">Imprimir Relatório</b></button>
        </p>
    </div>

</div>

<!--=========== Start Footer SECTION ================-->
<?php

include_once('include/rodape.php');



?>
</body>





<script>
    function CriaPDF() {
        var minhaTabela = document.getElementById('tabela').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 20px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CRIA UM OBJETO WINDOW
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Farmácia Ari I</title>');   // <title> CABEÇALHO DO PDF.
        win.document.write(style);                       // INCLUI UM ESTILO NA TAB HEAD
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(minhaTabela);                   // O CONTEUDO DA TABELA DENTRO DA TAG BODY
        win.document.write('</body></html>');

        win.document.close(); 	                            // FECHA A JANELA

        win.print();                                        // IMPRIME O CONTEUDO
    }
</script>
</html>
