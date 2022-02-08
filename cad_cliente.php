


<?php
session_start();
include_once 'conexao.php';

ob_start();
$cadastrar = filter_input(INPUT_POST,'Cadastro', FILTER_SANITIZE_STRING);
if($cadastrar){

    $cliente = filter_input_array(INPUT_POST,FILTER_DEFAULT);


    $cliente['senha'] =md5($cliente['senha']);





    $sql6 = mysqli_query($conn,"select * from genero") or die
    ("Erro");
    $linhas6 = mysqli_num_rows($sql6);

    if ($linhas6 > 0) {


        while ($dados6 = mysqli_fetch_assoc($sql6)) {

            $dados6["designacao"];
            $dados6["idgenero"];
            if ( $cliente['genero']== $dados6["designacao"]) {
                $cliente['genero'] = $dados6["idgenero"];
            }


        }


    } $sql5 = mysqli_query($conn,"select * from bairro") or die
    ("Erro");
    $linhas5 = mysqli_num_rows($sql5);

    if ($linhas5 > 0) {


        while ($dados5 = mysqli_fetch_assoc($sql5)) {

            $dados5["nome_bairro"];
            $dados5["idbairro"];
            if ( $cliente['bairro']== $dados5["nome_bairro"]) {
                $cliente['bairro'] = $dados5["idbairro"];
            }


        }


    }
    $sql7 = mysqli_query($conn,"select * from farmacia") or die
    ("Erro");
    $linhas7 = mysqli_num_rows($sql7);

    if ($linhas7 > 0) {


        while ($dados7 = mysqli_fetch_assoc($sql7)) {

            $dados7["farmacias"];
            $dados7["idfarmacia"];
            if ( $cliente['farmaciacliente']== $dados7["farmacias"]) {
                $cliente['farmaciacliente'] = $dados7["idfarmacia"];
            }


        }


    }




    $inserir_cliente=$conn->query("INSERT INTO cliente (nomecliente,usuario,imagem,dtanascimento,numcasa,email,telefone_movicel,telefone_unitel,senha,genero,bairro,farmaciacliente,dtaregisto,estadoCliente,data_eliminacao) VALUES (


'" . $cliente['nomecliente']. "',
'" . $cliente['usuario']. "',
'" . $cliente['imagem']. "',
'" . $cliente['dtanascimento']. "',
'" . $cliente['numcasa']. "',
'" . $cliente['email']. "',
'" . $cliente['telefone_movicel']. "',
'" . $cliente['telefone_unitel']. "',
'" . $cliente['senha']. "',
'" . $cliente['genero']. "',
'" . $cliente['bairro']. "',
'" . $cliente['farmaciacliente']. "',
Now(),
'" .'1'. "',
'0000-00-00'




					)");
    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<span style='color: green'align='center'><script>alert('Cliente Cadastrado com sucesso!');</script></span>";

    }else{
        $_SESSION['msg'] = "<span style='color: red'align='center'>Erro ao Cadastrar Cliente!</span>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--===============================================
    FARMÁCIA ARI 1.

    ====================================================-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farmacia Ari: Cadastro</title>

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
                        <h2>Cadastro</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>Tu estás aqui</li>
                            <li><a href="#">Ínicio</a></li>
                            <li class="active">Cadastro</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="panel-body">
    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Cadastro Para Clientes</h4>
            <?php


            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Preencher os Campos
                </div>
                <div class="panel-body">
                    <form  method="post"action="" name="formulariocliente">

                        <div class="row">
                            <fieldset>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label">Nome <span class="required">*</span>
                                    </label>
                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="teu nome"name="nomecliente">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label">Nome de Usuario <span class="required">*</span>
                                    </label>
                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Digite o Nome de Usuario"name="usuario">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label">Fotográfia <span class="required">*</span>
                                    </label>
                                    <input type="file"class="wp-form-control wpcf7-text" placeholder="Digite o Nome de Usuario"name="imagem">
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Data de Nascimento<span class="required">*</span>
                                </label>
                                <input type="date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy"name="dtanascimento">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Número de Casa<span class="required">*</span>
                                </label>
                                <input type="number" class="wp-form-control wpcf7-text" placeholder="Digite o Número da Casa"name="numcasa">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">E-mail<span class="required">*</span>
                                </label>
                                <input type="email" class="wp-form-control wpcf7-text" placeholder="Digite o seu Email"name="email">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Telefone Movicel<span class="required">*</span>
                                </label>
                                <input type="number" class="wp-form-control wpcf7-text" placeholder="Digite o seu Número da Movicel"name="telefone_movicel">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Telefone Unitel<span class="required">*</span>
                                </label>
                                <input type="number" class="wp-form-control wpcf7-text" placeholder="Digite o seu Número da unitel"name="telefone_unitel">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Senha<span class="required">*</span>
                                </label>
                                <input type="password" class="wp-form-control wpcf7-text" placeholder="Digite a sua Senha"name="senha">
                             </div>    </div>
                            <div class="col-md-6 col-sm-6">
                                <label>Genero:</label>
                                <select name="genero">
                                    <option>Selecione</option>
                                    <?php
                                    include('conexao.php');
                                    $trazer_genero="select * from genero WHERE estadogenero='1'";
                                    $receber_genero=mysqli_query($conn,$trazer_genero);
                                    while($row=mysqli_fetch_assoc( $receber_genero)){
                                        ?>
                                        <option value="<?php echo $row['idgenero'];?>"><?php echo $row['designacao'];?>
                                        </option><?php }?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6">

                                <label>Bairro:</label>
                                <select name="bairro">
                                    <option>Selecione</option>
                                    <?php
                                    include('conexao.php');
                                    $trazer_bairro="select * from bairro";
                                    $receber_bairro=mysqli_query($conn,$trazer_bairro);
                                    while($row1=mysqli_fetch_assoc( $receber_bairro)){
                                        ?>
                                        <option value="<?php echo $row1['idbairro'];?>"><?php echo $row1['nome_bairro'];?>
                                        </option><?php }?>
                                </select>

                            </div>




                            <div class="col-md-6 col-sm-6">

                                <label>Farmácia:</label>
                                <select name="farmaciacliente">
                                    <option>Selecione</option>
                                    <?php

                                    $trazer_farmacia="select * from farmacia WHERE estadofarmacia='1'";
                                    $receber_farmacia=mysqli_query($conn,$trazer_farmacia);
                                    while($row=mysqli_fetch_assoc( $receber_farmacia)){
                                        ?>
                                        <option value="<?php echo $row['idfarmacia'];?>"><?php echo $row['farmacias'];?>
                                        </option><?php }?>
                                </select>

                            </div>


                        </div>


                        <span class="btn btn-primary"> <input  type="submit" onclick="return validarcliente()" name="Cadastro"value="Enviar dados"></span>

                        </fieldset>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
</div>


<!--=========== Start Footer SECTION ================-->
<?php

include_once('include/rodape.php');



?>
</body>
<script src="assets/js/validarcliente.js" type="text/javascript"></script>
</html>