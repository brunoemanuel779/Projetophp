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
	   
       <?php
	   
	     $nomeprod=$_POST['nomeProd'];
		 $preco=$_POST['precoProd'];
		 $quant=$_POST['quantProd'];
		 $catprod=$_POST['catprod'];
		 
		 //upload de imagem
		 
        if ( isset( $_FILES[ 'imgprod' ][ 'name' ] ) && $_FILES[ 'imgprod' ][ 'error' ] == 0 ) {
        echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'imgprod' ][ 'name' ] . '</strong><br />';
        echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'imgprod' ][ 'type' ] . ' </strong ><br />';
        echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'imgprod' ][ 'tmp_name' ] . '</strong><br />';
        echo 'Seu tamanho é: <strong>' . $_FILES[ 'imgprod' ][ 'size' ] . '</strong> Bytes<br /><br />';
 
        $arquivo_tmp = $_FILES[ 'imgprod' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imgprod' ][ 'name' ];
 
        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
       // Converte a extensão para minúsculo
       $extensao = strtolower ( $extensao );
 
       // Somente imagens, .jpg;.jpeg;.gif;.png
       // Aqui eu enfileiro as extensões permitidas e separo por ';'
       // Isso serve apenas para eu poder pesquisar dentro desta String
       if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . '.' . $extensao;
 
        // Concatena a pasta com o nome
        $destino = 'img/produtos/' . $novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            echo ' < img src = "' . $destino . '" />';
        }
        else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum arquivo!';
		 
		 
//fim do upload de imagem

    $selecat=mysqli_query($conn,"SELECT * FROM produto WHERE nome_prod='$nomeprod'");
	
	$rows=mysqli_num_rows($selecat);
	
	if($rows >=1){
		echo"<br><span style=\"color:red; font-size:25px;\">Produto ja cadastrado</span>";
	}else{

    $insertprod=mysqli_query($conn,"INSERT INTO produto(nome_prod,valor_prod,quant_prod,img_prod,cat_prod)VALUES('$nomeprod',$preco,$quant,'$novoNome','$catprod')");
	}
	   ?>
	    
		
		
		</div>
		
   </div>
  
   <!--Rodapé -->
  <div class="rodape">
  <span class="mensrod"> © Copyright 2001-2017 Gogolak Joias - All Rights Reserved -
 </span>
    
  </div>
</body>
</html>
