<?php
include 'conexaoBanco.php';
$email = $_POST["email_cad"];
$senha = $_POST["senha_cad"];
$cep = $_POST["cep_cad"];
$endereco = $_POST["endereco_cad"];
$bairro = $_POST["bairro_cad"];
$localidade = $_POST["localidade_cad"];

$sql = "UPDATE projeto SET email, senha, cep, endereco, bairro, localidade  WHERE email, senha, cep
    VALUES ('$email', '$senha', '$cep', '$endereco', '$bairro', '$localidade');";

if ($conecta->multi_query($sql) === TRUE) {
    echo "cadastro realizado com sucesso";
    header('location:fomularioLogin.php');

} else {
    echo "Erro:" . $sql . "<br>" . $conecta->error . "<br>";
}
$conecta->close();
?>