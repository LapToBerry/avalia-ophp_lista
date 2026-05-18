<?php
include '../verificar_login.php';
include '../conexao.php';

$usuario_id = $_SESSION['usuario_id'];
$descricao = $_POST['descricao'];
$setor = $_POST['setor'];
$prioridade = $_POST['prioridade'];

$sql = "INSERT INTO tarefas(usuario_id,descricao,setor,prioridade)
VALUES('$usuario_id','$descricao','$setor','$prioridade')";

mysqli_query($conn,$sql);

header("Location: ../index.php");
?>