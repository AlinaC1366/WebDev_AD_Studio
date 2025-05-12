<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'Autentificare necesară.']);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data || !isset($data['comenzi']) || !is_array($data['comenzi'])) {
        echo json_encode(['success' => false, 'message' => 'Date invalide.']);
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $conn = new mysqli('localhost', 'root', '', 'proiect_web'); 

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Eroare la conectare BD.']);
        exit;
    }

    foreach ($data['comenzi'] as $item) {
        $serviciu = $conn->real_escape_string($item['serviciu']);
        $optiune = $conn->real_escape_string($item['optiune']);
        $cantitate = (int)$item['cantitate'];
        $total = (int)$item['total'];

        $sql = "INSERT INTO comenzi (user_id, serviciu, optiune, cantitate, total) 
                VALUES ('$user_id', '$serviciu', '$optiune', '$cantitate', '$total')";
        $conn->query($sql);
    }

    $conn->close();
    echo json_encode(['success' => true, 'message' => 'Comandă salvată.']);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Metodă invalidă.']);
exit;
?>
