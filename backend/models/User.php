<?php
require_once __DIR__ . '/../core/Database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function findByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM utilizatori WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO utilizatori (username, parola) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
        return $stmt->execute();
    }
}
?>
