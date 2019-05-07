<?php
 function conectar(){
 $servidor="localhost";
 $usuario="root";
 $senha="";
 $banco="gogolakjoias";
 $conn= mysqli_connect($servidor,$usuario,$senha,$banco);
 
  if(!$conn){
	  die("Erro ao conectar ao Banco de Dados");
  }else{
	  return $conn;
  }
 }
  
?>