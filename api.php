<?php
include_once("includes/conn.php");
header('Content-Type: application/json;charset=utf-8');

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT `id`, `category_id`,`name`,`description`,`price` FROM `products`");
$stmt->execute();

$array = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($array, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
echo $json;
?>