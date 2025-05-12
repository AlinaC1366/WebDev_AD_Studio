<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
        session_start();
    }

    public function login($username, $password) {
        $user = $this->userModel->findByUsername($username);
        if ($user && password_verify($password, $user['parola'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['success_message'] = "Te-ai autentificat cu succes.";
            header("Location: ../../index.php");
            exit;
        } else {
            header("Location: ../admin/login.html?error=Date incorecte.");
            exit;
        }
    }

    public function register($username, $password) {
        $existingUser = $this->userModel->findByUsername($username);
        if ($existingUser) {
            header("Location: ../admin/register.html?error=Utilizator deja există.");
            exit;
        }

        if ($this->userModel->createUser($username, $password)) {
            $_SESSION['success_message'] = "Înregistrare reușită. Te poți autentifica.";
            header("Location: ../../index.php");
            exit;
        } else {
            header("Location: ../admin/register.html?error=Eroare la înregistrare.");
            exit;
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['logout_msg'] = "Te-ai deconectat cu succes.";
        header("Location: ../../index.php");
        exit;
    }
}
?>
