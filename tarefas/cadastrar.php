<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Nova Tarefa</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<form action="salvar.php" method="POST" class="formulario">

<h1>Nova Tarefa</h1>

<textarea name="descricao" placeholder="Descrição" required></textarea>

<input type="text" name="setor" placeholder="Setor" required>

<select name="prioridade" required>
<option>Baixa</option>
<option>Média</option>
<option>Alta</option>
</select>

<button type="submit">Cadastrar</button>

</form>

</body>
</html>
