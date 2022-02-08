<?php
include_once 'conexao.php';
session_start();
ob_start();
$btnCadfunc=filter_input(INPUT_POST,'Cadastrar',FILTER_SANITIZE_STRING);

if($btnCadfunc){

    $registo1=filter_input_array(INPUT_POST,FILTER_DEFAULT);
     $dta=date('Y-M-D');

    $sql5 = mysqli_query($conn,"select * from bairro") or die
    ("Erro");
    $linhas5 = mysqli_num_rows($sql5);

    if ($linhas5 > 0) {


        while ($dados5 = mysqli_fetch_assoc($sql5)) {

            $dados5["nome_bairro"];
            $dados5["idbairro"];
            if ( $registo1['bairro']== $dados5["nome_bairro"]) {
                $registo1['bairro'] = $dados5["idbairro"];
            }


        }


    }
    $sql6 = mysqli_query($conn,"select * from genero") or die
    ("Erro");
    $linhas6 = mysqli_num_rows($sql6);

    if ($linhas6 > 0) {


        while ($dados6 = mysqli_fetch_assoc($sql6)) {

            $dados6["designacao"];
            $dados6["idgenero"];
            if ( $registo1['genero']== $dados6["designacao"]) {
                $registo1['genero'] = $dados6["idgenero"];
            }


        }


    }  $sql7 = mysqli_query($conn,"select * from estadocivil") or die
    ("Erro");
    $linhas7 = mysqli_num_rows($sql7);

    if ($linhas6 > 0) {


        while ($dados7 = mysqli_fetch_assoc($sql7)) {

            $dados7["estado_civil"];
            $dados7["idestado"];
            if ( $registo1['estadocivil']== $dados7["estado_civil"]) {
                $registo1['estadocivil'] = $dados7["idestado"];
            }


        }


    }  $sql8 = mysqli_query($conn,"select * from departamento") or die
    ("Erro");
    $linhas8 = mysqli_num_rows($sql8);

    if ($linhas8 > 0) {


        while ($dados8 = mysqli_fetch_assoc($sql8)) {

            $dados8["areadepto"];
            $dados8["iddepartamento"];
            if ( $registo1['departamento']== $dados8["areadepto"]) {
                $registo1['departamento'] = $dados8["iddepartamento"];
            }


        }


    } $sql9 = mysqli_query($conn,"select * from funcao") or die
    ("Erro");
    $linhas9 = mysqli_num_rows($sql9);

    if ($linhas8 > 0) {


        while ($dados9 = mysqli_fetch_assoc($sql9)) {

            $dados9["tipo_funcao"];
            $dados9["idfuncao"];
            if ( $registo1['funcaofunc']== $dados9["tipo_funcao"]) {
                $registo1['funcaofunc'] = $dados9["idfuncao"];
            }


        }


    }
    $sql3 = mysqli_query($conn,"select * from farmacia") or die
    ("Erro");
    $linhas3 = mysqli_num_rows($sql3);

    if ($linhas3 > 0) {


        while ($dados3 = mysqli_fetch_assoc($sql3)) {

            $dados3["farmacias"];
            $dados3["idfarmacia"];
            if ( $registo1['farmacia']== $dados3["farmacias"]) {
                $registo1['farmacia'] = $dados3["idfarmacia"];
            }


        }


    }




    try{
        $usuario=$conn->query("INSERT INTO funcionarios (nome,dtaRegisto,estadofuncionario,dataNascimento,foto,telefone,sugestao,bairro,genero,estadocivil,email,departamento,funcaofunc,farmacia,data_eliminacao,data_restauro) VALUES (

'" .$registo1['nome']. "',
Now(),
'" .'1'. "',
'" .$registo1['dataNascimento']. "',
'" .$registo1['foto']. "',
'" .$registo1['telefone']. "',
'" .$registo1['sugestao']. "',
'" .$registo1['bairro']. "',
'" .$registo1['genero']. "',
'" .$registo1['estadocivil']. "',
'" .$registo1['email']. "',
'" .$registo1['departamento']. "',
'" .$registo1['funcaofunc']. "',
'" .$registo1['farmacia']. "',
'0000-00-00',
'0000-00-00'




					)");

        if( $usuario===FALSE) {
            throw new Exception('Problemas: ' . $conn->error . ' --- ' . $conn->error . '<br />');
        }else{

            $_SESSION['msg'] = "<span style='color: green'align='center'><script>confirm('Funcionário Cadastrado com Sucesso na Farmácia Desejada,A sua conta será autenticada dentro de 24horas...Obrigado!');</script> </span>";
            echo '<script type="text/javascript">window.location="email/pop_up.php"</script>';


        }}catch(Exception $e){
        //caso haja uma exceção a mensagem é capturada e atribuida a $msg
        echo $e->getMessage( );
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
                    <h4 class="header-line">Cadastro Para Funcionários</h4>
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
                            <form method="POST" name="formulario"action=""role="form">
                        <div class="row">
                            <fieldset>
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Nome <span class="required">*</span>
                                </label>
                                <input type="text" class="wp-form-control wpcf7-text" placeholder="teu nome"name="nome">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Email<span class="required">*</span>
                                </label>
                                <input type="email" class="wp-form-control wpcf7-text" placeholder="Digite o seu Email"name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Data de Nascimento<span class="required">*</span>
                                </label>
                                <input type="date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy"name="dataNascimento">
                            </div>
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

                                <label>Estado Civil:</label>
                                <select name="estadocivil">
                                    <option>Selecione</option>
                                    <?php
                                    include('conexao.php');
                                    $trazer_bairro="select * from estadocivil";
                                    $receber_bairro=mysqli_query($conn,$trazer_bairro);
                                    while($row1=mysqli_fetch_assoc( $receber_bairro)){
                                        ?>
                                        <option value="<?php echo $row1['idestado'];?>"><?php echo $row1['estado_civil'];?>
                                        </option><?php }?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Fotográfia<span class="required">*</span>
                                </label>
                                <input type="file" class="wp-form-control wpcf7-text" placeholder="Enviar Curriculum Vitae" name="foto">  </div>
                            <div class="col-md-6 col-sm-6">

                                <label>Departamento:</label>
                                <select name="departamento">
                                    <option>Selecione</option>
                                    <?php
                                    include('conexao.php');
                                    $trazer_departamento="select * from departamento";
                                    $receber_departamento=mysqli_query($conn,$trazer_departamento);
                                    while($row1=mysqli_fetch_assoc( $receber_departamento)){
                                        ?>
                                        <option value="<?php echo $row1['iddepartamento'];?>"><?php echo $row1['areadepto'];?>
                                        </option><?php }?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6">

                                <label class="control-label">Telefone<span class="required">*</span>
                                </label>
                                <input type="number" class="wp-form-control wpcf7-text" placeholder="Digite o teu Telefone"name="telefone">
                            </div

                            <div class="col-md-6 col-sm-6">

                                <label>Função:</label>
                                <select name="funcaofunc">
                                    <option>Selecione</option>
                                    <?php
                                    include('conexao.php');
                                    $trazer_funcao="select * from funcao";
                                    $receber_funcao=mysqli_query($conn,$trazer_funcao);
                                    while($row1=mysqli_fetch_assoc( $receber_funcao)){
                                        ?>
                                        <option value="<?php echo $row1['idfuncao'];?>"><?php echo $row1['tipo_funcao'];?>
                                        </option><?php }?>
                                </select>
                                <label>Farmácia:</label>
                                <select name="farmacia">
                                    <option>Selecione</option>
                                    <?php

                                    $trazer_farmacia="select * from farmacia WHERE estadofarmacia='1'";
                                    $receber_farmacia=mysqli_query($conn,$trazer_farmacia);
                                    while($row=mysqli_fetch_assoc( $receber_farmacia)){
                                        ?>
                                        <option value="<?php echo $row['idfarmacia'];?>"><?php echo $row['farmacias'];?>
                                        </option><?php }?>
                                </select><br>

                            </div>
                            <textarea class="wp-form-control wpcf7-textarea" cols="20" rows="5" placeholder="Porque entrou em contacto connosco?"name="sugestao"></textarea>

                                <span class="btn btn-primary"> <input  type="submit"name="Cadastrar"value="Enviar dados"onclick="return validar()"></span>



                        </div>



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
<script src="assets/js/validar.js" type="text/javascript"></script>

</html>