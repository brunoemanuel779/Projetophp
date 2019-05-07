<?php
require_once("config.php");
$conn=conectar();
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Gogolak Joias</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<!-- Conteúdo -->
<?php
session_start();
//Verifica se existe login
if(!isset ($_SESSION['login']) || !isset ($_SESSION['senha'])){
	header("location:index.php");
}
	

?>
 <div class="header">
 
  <div class="logo">
     <img src="img/logo.png" class="logoprinc"/>
   </div>
   
   <div class="user">
   
     <!--Faz a consulta do usuario -->
     <?php
	 $login=$_SESSION['login'];
	 
	 $consuluser=mysqli_query($conn,"SELECT * FROM usuarios WHERE login='$login'") or die ("Erro na consulta");
	 
	 $rs=mysqli_fetch_array($consuluser);
	 ?>
	 
	  <img src="img/usuario.png" class="iconuser"/>
	  
      <span class="mensuser">
	  Ola <?php echo $rs['nome']." ".$rs['sobrenome'];?> Seja Bem Vindo
          <a href="logout.php" class="linkm">Sair</a>
	  </span>
	  
   </div>
 </div>
 
  <hr></hr>
  
  <!--Menu do site-->
   <div class="menu">
    <ul>
    <li><a href="principal.php"  class="linkm">Inicio</a> </li>
	<li><a href="produto.php"  class="linkm">Produtos</a> </li>
	<li><a href="categoria.php"  class="linkm">Categorias</a> </li>
	<li><a href="compra.php"  class="linkm">Vendas</a> </li>
	</ul>
   </div>
 
 <!--Menu de Categorias -->
 
  <div class="menucategorias">
       <img src="img/menu.png" class="iconmenu"/>
	   <span class="titlemenucat">Categorias</span>
        <?php
    $consucat=  mysqli_query($conn,"SELECT * FROM categoria");

    while($ls=mysqli_fetch_array($consucat)){
        
    ?>
           <a href="listaprod.php?id=<?php echo $ls['id_categoria'];?>" class="link"><?php echo $ls['nome_categoria'];?></a><br>
    <?php
    }
    ?>
  </div>
 
  <!--Conteudo da pagina -->
  <div class="conteudo">
  
	  
	  
	  
	  
	   
	
  </div>

   
  <!--Rodapé -->
    </div>
  <div class="rodape">
  <span class="mensrod"> © Copyright 2001-2017 Gogolak Joias - All Rights Reserved -
 </span>
    
  </div>
</body>
</html>
