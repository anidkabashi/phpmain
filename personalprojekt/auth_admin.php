<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$loggedInUser = $_SESSION['user'] ?? 'Guest';
$role = $_SESSION['role'] ?? 'user';


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Access Denied</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .container { margin-top: 100px; max-width: 600px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    </style>
</head>
<body>
<div class="container text-center">
    <div class="header">
        <div>Logged in as: <strong>{$loggedInUser} ({$role})</strong></div>
        <div><a href="logout.php" class="btn btn-sm btn-outline-secondary">Logout</a></div>
    </div>
    <div class="alert alert-danger shadow-sm">
        🚫 You do not have permission to access this page. <a href="index.php" class="alert-link">Go back</a>
    </div>
</div>
</body>
</html>
HTML;
    exit;
}
?>
