<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <meta charset="utf-8"
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "farmacia";
$conn = mysqli_connect($host, $user, $pass,$banco ) or die("erro na conexão");
mysqli_select_db($conn,$banco)or die("erro na conexão");

$usuarios = $_POST['usuarios'];
$senhas =mysqli_real_escape_string($conn,md5($_POST['senhas']));


$get= mysqli_query($conn,"SELECT * FROM usuario WHERE usuarios='$usuarios'AND senhas='$senhas'");
$num = mysqli_num_rows($get);

if($num == 1){
    while ($percorrer1 = mysqli_fetch_array($get)) {
        $adm1 = $percorrer1['funcao'];
        $nome2 = $percorrer1['usuarios'];
        $estados = $percorrer1['estadofunc'];
        session_start();
        if ($adm1 == 1 and $estados==1) {

            $_SESSION['funcao'] = $nome2;
            header("location=index.php");

            echo '<script type="text/javascript">window.location="administrador global/indexadmin.php"</script>';
        } else {
            $nor1 = $percorrer1['funcao'];
            $nome1 = $percorrer1['usuarios'];


            $_SESSION['normal'] = $nome1;
            if ($nor1 == 2 and $estados==1) {

                $_SESSION['funcao'] = $nome1;
                header("location=index.php");
                echo '<script type="text/javascript">window.location="administrador global/Farmaceuticos/indexadmin.php"</script>';
            }
            if ($nor1 == 4 and $estados==1) {

                $_SESSION['funcao'] = $nome1;
                header("location=index.php");
                echo '<script type="text/javascript">window.location="administrador global/Admin I/indexadmin.php"</script>';
            } if ($nor1 == 5 and $estados==1) {

                $_SESSION['funcao'] = $nome1;
                header("location=index.php");
                echo '<script type="text/javascript">window.location="administrador global/Admin II/indexadmin.php"</script>';
            }if ( $estados==0) {

                $_SESSION['funcao'] = $nome1;
                echo "EX-Funcionário ".$nome1;
                echo '<script type="text/javascript">alert("Vocé não tem acesso a está Página!");</script>';
                echo '<script type="text/javascript">window.location="login.php"</script>'; }

        }

    }

}

else{

    echo '<script type="text/javascript">alert("Dados Errados, Tente Novamente!");</script>';
    echo '<script type="text/javascript">window.location="login.php"</script>';
}


$usuarios = $_POST['usuarios'];
$result_usuario ="INSERT INTO login (iniciosessao,usuario,terminosessao) VALUES(Now(),'$usuarios','000-00-00')";
$resultado_usuario = mysqli_query($conn,$result_usuario);



?>



</body>
</html>
 