<?php
include '../verificar_login.php';
include '../conexao.php';

$id = $_POST['id'];

$sql = "SELECT * FROM tarefas WHERE id=$id";
$result = mysqli_query($conn,$sql);
$tarefa = mysqli_fetch_assoc($result);

if($tarefa['usuario_id'] != $_SESSION['usuario_id']){
    die("Acesso negado");
}

$descricao = $_POST['descricao'];
$setor = $_POST['setor'];

$update = "UPDATE tarefas
SET descricao='$descricao', setor='$setor'
WHERE id=$id";

mysqli_query($conn,$update);

header("Location: ../index.php");
?>
