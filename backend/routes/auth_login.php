<?php
require_once __DIR__ . '/../controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        header("Location: ../admin/login.html?error=Completați toate câmpurile.");
        exit;
    }

    $auth = new AuthController();
    $auth->login($username, $password);
}
?>
