<?php require 'includes/auth.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tarefas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Bem-vindo, <?= $_SESSION['nome'] ?></h1>
    <a href="logout.php">Sair</a>

    <h2>Nova Tarefa</h2>
    <form id="formTarefa">
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="descricao" placeholder="Descrição"></textarea>
        <input type="date" name="data" required>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Minhas Tarefas</h2>
    <ul id="listaTarefas"></ul>

    <script src="assets/js/scripts.js"></script>
</body>
</html>