<?php
session_start();

include '../conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='$email'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

    $usuario = mysqli_fetch_assoc($result);

    if(password_verify($senha, $usuario['senha'])){

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

        header("Location: ../index.php");

    } else {
        echo "Senha incorreta";
    }

} else {
    echo "Usuário não encontrado";
}
?>
