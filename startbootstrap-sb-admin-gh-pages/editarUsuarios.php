<?php
    include 'conexaoBanco.php';
    $id = filter_input(INPUT_GET, "id");
    $nome = filter_input(INPUT_GET, "nome");
    $email = filter_input(INPUT_GET, "email");
    $cep = filter_input(INPUT_GET, "cep");
    $endereco = filter_input(INPUT_GET, "endereco");
    $bairro = filter_input(INPUT_GET, "bairro");
    $localidade = filter_input(INPUT_GET, "localidade");


    if($link){

       $query= mysqli_query($link, "UPDATE projeto SET nome='$nome', email='$email', cep='$cep', endereco='$endereco',bairro='$bairro', localidade='$localidade' where id='$id';" ); 
       if($query){

           header("Location: UsuariosCadastrados.php");
       }else{
           die("Erro:" .mysqli_error($link));
       }

    }else{
        die("erro:".mysqli_error($link));
    }
    $conecta->close();
?>