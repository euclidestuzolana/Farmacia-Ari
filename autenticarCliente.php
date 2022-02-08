<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$banco = "farmacia";
$conn = mysqli_connect($host, $user, $pass,$banco ) or die("erro na conexão");
mysqli_select_db($conn,$banco)or die("erro na conexão");

$usuarios = $_POST['usuarios'];
$senhas =mysqli_real_escape_string($conn,md5($_POST['senhas']));


$get= mysqli_query($conn,"SELECT * FROM cliente WHERE usuario='$usuarios'AND senha='$senhas'");
$num = mysqli_num_rows($get);

if($num == 1) {
    while ($percorrer1 = mysqli_fetch_array($get)) {

        $nome2 = $percorrer1['nomecliente'];
        $estados = $percorrer1['estadoCliente'];

        if ($estados == 1) {

            $_SESSION['funcao'] = $nome2;
            header("location=homepage.php");

            echo '<script type="text/javascript">window.location="cliente/products.php"</script>';
        }

    }
}
else {
    echo '<script type="text/javascript">alert("Dados Errados tente novamente!");</script>';
    echo '<script type="text/javascript">window.location="logincliente.php"</script>';
}




$usuarios = $_POST['usuarios'];
$result_usuario ="INSERT INTO login (iniciosessao,usuario,terminosessao) VALUES(Now(),'$usuarios','000-00-00')";
$resultado_usuario = mysqli_query($conn,$result_usuario);




?>



</body>
</html>
 