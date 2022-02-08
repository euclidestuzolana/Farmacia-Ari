<!DOCTYPE html>
<html>
<head>
    <title>Farmácia</title>
    <meta charset="utf-8">

    <?php
session_start();
include_once ('conexao.php');
if(isset($_SESSION['funcao'])){
    $usuarios = $_SESSION['funcao'];
    $result_usuario ="INSERT INTO login (iniciosessao,usuario,terminosessao) VALUES('','$usuarios',Now())";
    $resultado_usuario = mysqli_query($conn,$result_usuario);

}

session_destroy();
//header("Location:login.php");



    echo "<script>confirm('Deseja terminar a sua Sessão?');</script>";
    echo "<script>alert('Sessão terminada com sucesso');</script>";
echo "<script>window.location='login.php';</script>";
?>
