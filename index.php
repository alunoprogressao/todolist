<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo ao Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Gerenciador de Tarefas</h1>
        <p>Organize suas tarefas de forma simples e eficiente.</p>
        <?php if (isset($_SESSION['id'])): ?>
            <a href="dashboard.php" class="btn">Ir para Dashboard</a>
        <?php else: ?>
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Cadastrar</a>
        <?php endif; ?>
    </div>
</body>
</html>
