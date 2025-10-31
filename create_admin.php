<?php
/**
 * One-time helper to create an admin user.
 *
 * Usage: Place this file in the project root, open it in your browser (eg http://localhost/my-food-recipe/create_admin.php),
 * fill the form and submit. After creating the admin, DELETE this file for security.
 */
require_once(__DIR__ . '/conn/conn.php');
session_start();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = 'admin';

    if ($username === '' || $password === '') {
        $message = 'Please provide username and password.';
    } else {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare('INSERT INTO users (username, password, role) VALUES (:u, :p, :r)');
        try {
            $stmt->execute([':u' => $username, ':p' => $hash, ':r' => $role]);
            $message = 'Admin account created successfully. Please delete this file (create_admin.php) now.';
        } catch (Exception $e) {
            $message = 'Error creating admin: ' . $e->getMessage();
        }
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container" style="max-width:540px;margin-top:4rem;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Admin Account (one-time)</h4>
            <?php if ($message): ?>
                <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="password" type="password" required>
                </div>
                <button class="btn btn-primary">Create Admin</button>
            </form>
        </div>
    </div>
    <p class="small mt-2 text-muted">After creating the admin, delete this file for security: <code>create_admin.php</code></p>
</div>
</body>
</html>
