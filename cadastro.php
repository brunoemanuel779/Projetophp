<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Tela de Acesso</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type="text/javascript" src="javascript.js"></script>
    <meta charset="utf-8">
  </head>
  <body>
   
    <div class="principal">
	
	<div class="logo">
	
     	<img src="img/logo.png" class="logo"/>
	    <form method="post" action="gravacad.php" name="form" onSubmit="return validacao();">
	      <span id="label">Nome:</span>
	       <input type="text" name="nome" class="campo" maxlength="10">	<br><br>
		   
	      <span id="label">Sobrenome:</span>
	       <input type="text" name="sobrenome" class="campo" maxlength="10"><br><br>
		   
	      <span id="label">Email:</span>
	       <input type="text" name="email" class="campo" maxlength="50"><br><br>
		   
	      <span id="label">Login:</span>
	       <input type="text" name="login" class="campo" maxlength="10">	<br><br>
		   
	      <span id="label">Senha:</span>
	       <input type="password" name="senha" class="campo" maxlength="15">
		   
	       <br><br>
	       <input type="submit" name="enviar" value="Cadastra-se" class="enviar">
	        
            <a  class="cadastrar" href="index.php">Logar-se</a>			
	       
	   </form>
	   </div >
	</div>
  </body>
</html>