<!DOCTYPE html>
<html lang="pt-br">
 <head>
    <title>Tela de Acesso</title>
	 <link rel="stylesheet" type="text/css" href="style.css"/>
	 <script type="text/javascript" src="javascript.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <meta charset="utf-8">
 </head>
 <body>
   
    <div class="principal">
	<div class="logo">
	<img src="img/logo.png" class="logo"/>
	
	  <form method="post" action="grava.php" name="form" >
	  
	  
	   <span id="label">Login:</span>
	    <input type="text" name="login" class="campo">	<br><br>
		
	    <span id="label">Senha:</span>
	     <input type="password" name="senha" class="campo">
		 
	    <br><br>
	     <input type="submit" name="enviar" value="Entrar" class="enviar">
	    <a href="cadastro.php" class="cadastrar">Cadastra-se</a>	 
	    
		
	  </form>
	</div >
	</div>
  </body>
</html>