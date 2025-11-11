<?php
include 'header.php';
include 'db.php';
include 'auth_admin.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<div class='alert alert-danger text-center mt-5'>
            🚫 You do not have permission to access this page.
            <a href='index.php'>Go back</a>
          </div>";
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
$stmt->execute([$id]);
header("Location: index.php");
?>
