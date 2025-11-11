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

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];

    if (!empty($name) && $quantity > 0 && $price > 0) {
        $stmt = $pdo->prepare("INSERT INTO products (name, category, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $category, $quantity, $price]);
        $msg = "<div class='alert alert-success'>✅ Product added successfully! <a href='index.php'>Go back</a>.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>⚠️ Please fill all fields correctly.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product - Food Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container col-md-6">
    <h2 class="text-center mt-4 mb-4">Add New Product</h2>
    <?= $msg ?>
    <form method="POST" class="card p-4 shadow-sm bg-light">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="e.g. Apples" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" placeholder="e.g. Fruits">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price per Item ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" min="0.01" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success w-100">Add Product</button>
        </div>
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-outline-secondary w-100">Back to Dashboard</a>
        </div>
    </form>
</div>
</body>
</html>
