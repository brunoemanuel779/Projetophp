   <?php
//Inclui o arquivo de conexao com banco de dados
   
 require_once('config.php');
 $conn=conectar();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <script type="text/javascript" src="javascript.js"></script>
  
    <title>Título da página</title>
    <meta charset="utf-8">
  </head>
  <body>
  
  
  
 <?php 

$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$email=$_POST['email'];
$login=$_POST['login'];
$senha=md5($_POST['senha']);

//Validação de login e email existente

$slogin=mysqli_query($conn,"SELECT * FROM usuarios WHERE login='$login'");

$semail=mysqli_query($conn,"SELECT * FROM usuarios WHERE email='$email'");

$consulta=mysqli_num_rows($slogin);

$conemail=mysqli_num_rows($semail);

if($consulta >=1 ){
	echo "Usuario ja cadastro por favor escolha outro usuario";
}
else{
	if($conemail >=1){
		echo "Email ja cadastrado por favor escolha outro email";
	}
	else{
		$insert=mysqli_query($conn,"INSERT INTO usuarios(nome,sobrenome,email,login,senha)VALUES('$nome','$sobrenome','$email','$login','$senha')");
		echo"Cadastro realizado com sucesso";
	}
}



?>
   <br><br>
   <a href="cadastro.php" >Voltar</a>
  </body>
</html>
