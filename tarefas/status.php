<?php

include '../verificar_login.php';
include '../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tarefas WHERE id=$id";

$result = mysqli_query($conn, $sql);

$tarefa = mysqli_fetch_assoc($result);

if($tarefa['usuario_id'] != $_SESSION['usuario_id']){
    die("Acesso negado");
}

$novoStatus = $_POST['status'];

$update = "UPDATE tarefas
SET status='$novoStatus'
WHERE id=$id";

mysqli_query($conn, $update);

header("Location: ../index.php");

?>