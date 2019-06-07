<?php

$servidor = "localhost";
$nome = "root";
$senha = "";
$banco = "projeto";
$conecta = new mysqli($servidor, $nome, $senha, $banco);
 if($conecta->connect_error){
  die("Conexão falhou: " .$conecta->connect_error."<br>");
  }
  
  
