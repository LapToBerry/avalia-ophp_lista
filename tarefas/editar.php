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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<form action="atualizar.php" method="POST" class="formulario">

<input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

<textarea name="descricao" required><?php echo $tarefa['descricao']; ?></textarea>

<input type="text" name="setor"
value="<?php echo $tarefa['setor']; ?>" required>

<button type="submit">Salvar</button>

</form>

</body>
</html>
