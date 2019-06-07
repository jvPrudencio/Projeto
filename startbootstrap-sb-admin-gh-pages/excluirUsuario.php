    
<?php

session_start();

include 'conexaoBanco.php';

$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE * FROM projeto WHERE id = '$id'";
$resultado_usuario= mysqli_query($conecta, $result_usuario);
if(mysqli_affected_rows($conecta)){
    echo"<script>
        alert('USUARIO EXCLUIDO COM SUCESSO!!');
        window.location.href='UsuariosCadastrados.php';
        </script>";
}else{
    echo 'USUARIO NAO FOI EXCLUIDO !!';
    
}
?>