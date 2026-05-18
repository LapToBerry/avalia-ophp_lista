<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastro</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<form action="registrar.php" method="POST" class="formulario">

<h1>Criar Conta</h1>

<input type="text" name="nome" placeholder="Nome" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="senha" placeholder="Senha" required>

<button type="submit">Cadastrar</button>

<a href="login.php">Já tenho conta</a>

</form>

</body>
</html>
