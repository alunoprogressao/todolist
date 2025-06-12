<?php
require 'includes/db.php';
require 'includes/auth.php';

$usuario_id = $_SESSION['usuario_id'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $stmt = $pdo->prepare("SELECT * FROM tarefas WHERE usuario_id = ?");
    $stmt->execute([$usuario_id]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

if ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $pdo->prepare("INSERT INTO tarefas (usuario_id, titulo, descricao, data) VALUES (?, ?, ?, ?)");
    $stmt->execute([$usuario_id, $data['titulo'], $data['descricao'], $data['data']]);
}

if ($method === 'PATCH') {
    parse_str($_SERVER['QUERY_STRING'], $params);
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $pdo->prepare("UPDATE tarefas SET concluida = ? WHERE id = ? AND usuario_id = ?");
    $stmt->execute([$data['concluida'], $params['id'], $usuario_id]);
}

if ($method === 'DELETE') {
    parse_str($_SERVER['QUERY_STRING'], $params);
    $stmt = $pdo->prepare("DELETE FROM tarefas WHERE id = ? AND usuario_id = ?");
    $stmt->execute([$params['id'], $usuario_id]);
}
