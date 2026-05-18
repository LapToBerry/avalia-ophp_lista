<?php
include '../verificar_login.php';
include '../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tarefas WHERE id=$id";
$result = mysqli_query($conn,$sql);
$tarefa = mysqli_fetch_assoc($result);

if($tarefa['usuario_id'] != $_SESSION['usuario_id']){
    die("Acesso negado");
}

$delete = "DELETE FROM tarefas WHERE id=$id";

mysqli_query($conn,$delete);

header("Location: ../index.php");
?>
