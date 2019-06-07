<?php
$id = filter_input(INPUT_GET, 'id');
$nome = filter_input(INPUT_GET, 'nome');
$email = filter_input(INPUT_GET, 'email');
$cep = filter_input(INPUT_GET, 'cep');
$endereco = filter_input(INPUT_GET, 'endereco');
$bairro = filter_input(INPUT_GET, 'bairro');
$localidade = filter_input(INPUT_GET, 'localidade');

header('location:atualizaCadastro.php');
 
?>

