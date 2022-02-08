<!DOCTYPE HTML>
<html>
<head>
    <title></title>
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "farmacia";
$conn = mysqli_connect($host, $user, $pass,$banco ) or die("erro na conexão");
mysqli_select_db($conn,$banco)or die("erro na conexão");

?>
</body>
</html>
 