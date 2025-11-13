<?php
include 'db.php';
session_start();

// Only logged-in users can buy
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

// Check if product ID is valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: shop.php");
    exit;
}

$id = (int)$_GET['id'];

// Get the product
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "<div class='alert alert-danger text-center mt-5'>Product not found. <a href='shop.php'>Go back</a></div>";
    exit;
}

// Check stock
if ($product['quantity'] <= 0) {
    echo "<div class='alert alert-warning text-center mt-5'>Sorry, this product is out of stock. <a href='shop.php'>Go back</a></div>";
    exit;
}

// Subtract 1 item
$newQty = $product['quantity'] - 1;
$update = $pdo->prepare("UPDATE products SET quantity = ? WHERE id = ?");
$update->execute([$newQty, $id]);

// Show confirmation
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container text-center mt-5">
    <div class="alert alert-success">
        <h4>✅ Purchase Successful!</h4>
        <p>You bought <strong><?= htmlspecialchars($product['name']); ?></strong> for 
           <strong>$<?= number_format($product['price'], 2); ?></strong>.</p>
        <a href="shop.php" class="btn btn-success mt-3"><i class="bi bi-arrow-left-circle"></i> Continue Shopping</a>
    </div>
</div>
</body>
</html>
