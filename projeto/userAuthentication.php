<?php

$host ="localhost";
$user ="root";
$pass = "";
$banco ="cadastro";
$conexao = mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($banco)or die(mysql_error());
?>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript">
	function loginsuccessfully(){
		setTimeout("window.location=''",5000);
	}
	function loginfailed(){
		setTimeout("window.location='login.php'",5000);
	}
</script>
</body>
</html>
<?php
$user = $_POST['user'];
$password=$_POST['password'];
$sql = mysql_query("SELECT * FROM usarios WHERE user = '$user' nad password = '$password'");
$row  = mysql_num_rows($sql);
if($row>0){
	session_start();
	$_SESSION['user']= $_POST['email'];
	$_SESSION['password'] =$_POST['password'];
	echo "Login foi efetuado com sucesso";
	echo "<script>loginsuccessfully()</script>";
}else{
	echo "Usario ou senha invalida, tente novamente, 
	Caso não seja cadastrado clique em Registrar";
}

?>