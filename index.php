<?php
include 'verificar_login.php';
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>TaskSync</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <img src="assets/logo.png" class="logo">

    <nav>
        <a href="tarefas/cadastrar.php">
            Nova Tarefa
        </a>

        <a href="logout.php">
            Sair
        </a>
    </nav>
</header>

<main class="kanban">

<?php

$status = ['A Fazer', 'Fazendo', 'Concluído'];

foreach($status as $coluna){

?>

<div class="coluna">

    <h2>
        <?php echo $coluna; ?>
    </h2>

<?php

$sql = "SELECT tarefas.*, usuarios.nome
FROM tarefas
INNER JOIN usuarios
ON tarefas.usuario_id = usuarios.id
WHERE status='$coluna'";

$result = mysqli_query($conn, $sql);

while($dados = mysqli_fetch_assoc($result)){

?>

<div class="card">

    <h3>
        <?php echo $dados['descricao']; ?>
    </h3>

    <p>
        <strong>Responsável:</strong>
        <?php echo $dados['nome']; ?>
    </p>

    <p>
        <strong>Setor:</strong>
        <?php echo $dados['setor']; ?>
    </p>

    <p>
        <strong>Prioridade:</strong>
        <?php echo $dados['prioridade']; ?>
    </p>

    <p>
        <strong>Status Atual:</strong>
        <?php echo $dados['status']; ?>
    </p>

<?php if($_SESSION['usuario_id'] == $dados['usuario_id']){ ?>


<div class="acoes">

    <a href="tarefas/editar.php?id=<?php echo $dados['id']; ?>">
        Editar
    </a>

    <a href="tarefas/excluir.php?id=<?php echo $dados['id']; ?>">
        Excluir
    </a>

    <form action="tarefas/status.php?id=<?php echo $dados['id']; ?>" method="POST">

        <select name="status" required>

            <option value="A Fazer"
            <?php if($dados['status'] == 'A Fazer') echo 'selected'; ?>>
                A Fazer
            </option>

            <option value="Fazendo"
            <?php if($dados['status'] == 'Fazendo') echo 'selected'; ?>>
                Fazendo
            </option>

            <option value="Concluído"
            <?php if($dados['status'] == 'Concluído') echo 'selected'; ?>>
                Concluído
            </option>

        </select>

        <button type="submit">
            Salvar Status
        </button>

    </form>

</div>

<?php } ?>

</div>

<?php } ?>

</div>

<?php } ?>

</main>

</body>
</html>