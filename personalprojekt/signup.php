<?php
include 'db.php';
session_start();

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);
        if ($stmt->rowCount() > 0) {
            $msg = "<div class='alert alert-danger'>Username already exists!</div>";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hash]);
            $msg = "<div class='alert alert-success'>Account created! <a href='login.php'>Login now</a>.</div>";
        }
    } else {
        $msg = "<div class='alert alert-warning'>Please fill in all fields.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Food Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container col-md-4">
    <h3 class="text-center mb-4">Create Account</h3>
    <?= $msg ?>
    <form method="POST" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Sign Up</button>
        <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>
</body>
</html>
