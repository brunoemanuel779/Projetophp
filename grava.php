<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Título da página</title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
require_once('config.php');
$conn=conectar();


$login=$_POST['login'];
$senha=md5($_POST['senha']);
//Validação de login consulta conta no banco de dados
$slogar=mysqli_query($conn,"SELECT * FROM usuarios WHERE login='$login' and senha='$senha'");
$numlogar=mysqli_num_rows($slogar);

//Verifica se existe essa conta no banco de dados
if($numlogar >0){
	session_start();
	$_SESSION['login']=$_POST['login'];
	$_SESSION['senha']=$_POST['senha'];
	echo "Voce esta logado";
	header("location:principal.php");
	
}
//Retorno se não existir
if($numlogar ==0){
	
	echo"Usuario ou senha invalida";
}


?>
<br><br>
   <a href="index.php" >Voltar</a>
   
  </body>
</html>
