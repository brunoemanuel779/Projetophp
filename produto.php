<?php
require_once("config.php");
$conn=conectar();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Gogolak Joias</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="javascript.js"></script>
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
	   
	   <!--Lista todas categiruas di banco -->
    <?php
    $consucat=  mysqli_query($conn,"SELECT * FROM categoria");
    
    while($ls=mysqli_fetch_array($consucat)){
        
    ?>
           <a href="listaprod.php?id=<?php echo $ls['id_categoria'];  ?>" class="link"><?php echo $ls['nome_categoria'];?></a><br>
    <?php
    }
    ?>
  </div>
  
  <!--Conteudo da pagina -->
  <div class="conteudo">
  
       <img src="img/produto.png" class="iconmenu"/>
       <span class="titlecat">Cadastrar Produtos</span>
  
       <div class="cadcat">
	   
       
	    
		<form action="gravaprod.php" method="post" onSubmit="return validaProd();" name="formprod" enctype="multipart/form-data">
		
	      <span class="label">Nome:</span>
	       <input type="text" name="nomeProd" class="campocat" maxlength="30">	<br><br>
		   
	      <span class="label">Preço:</span>
		  <input type="text" name="precoProd" class="campocat" maxlength="10"  style="width:150px;">
		  
		  <span class="label" style="position:relative; left:10px;">  Quantidade:</span>
		  <input type="text" name="quantProd" class="campocat" maxlength="10"  style="width:150px; position:relative; left:8px;"><br>
		  <br><br>
		  <!-- Campo de select de categoria -->
		  <span class="label" style="position:relative; ">Categoria:</span>
		  <select name="catprod" class="campocat" style="font-size:20px; width:150px; height:32px;">
		  <?php
		  $selecat=mysqli_query($conn,"SELECT * FROM categoria");
		  ?>
		  
		  <?php
		  while($ls=mysqli_fetch_array($selecat)){
	      ?>
		  <option value="<?php echo $ls['id_categoria']; ?>">
		    <?php echo $ls['nome_categoria']; ?>
		  </option>
		  
		  <?php } ?>
		  
		  </select>
		  <br><br>
		  <input type="file" class="enviar" style="width:470px;" name="imgprod">
	       <br><br>
		   
	      
	       <input type="submit" name="enviar" value="Cadastra-se" class="enviar alinha">
		</form>
		
		</div>
		
   </div>
  
   <!--Rodapé -->
  <div class="rodape">
  <span class="mensrod"> © Copyright 2001-2017 Gogolak Joias - All Rights Reserved -
 </span>
    
  </div>
</body>
</html>
