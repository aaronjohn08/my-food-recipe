<?php
session_start();
require_once(__DIR__ . '/../conn/conn.php');

// Basic input validation
if (!isset($_POST['username'], $_POST['password'])) {
    header('Location: ../login.php?error=' . urlencode('Missing credentials'));
    exit;
}

$username = trim($_POST['username']);
$password = $_POST['password'];

try {
    $stmt = $conn->prepare('SELECT id, username, password, role FROM users WHERE username = :u LIMIT 1');
    $stmt->execute([':u' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Authentication success
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role']
        ];
        header('Location: ../index.php');
        exit;
    } else {
        // failure
        header('Location: ../login.php?error=' . urlencode('Invalid username or password'));
        exit;
    }

} catch (Exception $e) {
    header('Location: ../login.php?error=' . urlencode('Server error'));
    exit;
}
