<?php
include 'header.php';
include 'db.php';

$msg = "";

// Get product by ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "<div class='container mt-5 alert alert-danger'>Product not found. <a href='index.php'>Go back</a>.</div>";
    exit;
}

// Update logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];

    if (!empty($name) && $quantity > 0 && $price > 0) {
        $update = $pdo->prepare("UPDATE products SET name=?, category=?, quantity=?, price=? WHERE id=?");
        $update->execute([$name, $category, $quantity, $price, $id]);
        $msg = "<div class='alert alert-success'>✅ Product updated successfully! <a href='index.php'>Go back</a>.</div>";
        // refresh data after update
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $msg = "<div class='alert alert-danger'>⚠️ Please fill in all fields correctly.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product - Food Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container col-md-6">
    <h2 class="text-center mt-4 mb-4">Edit Product</h2>
    <?= $msg ?>
    <form method="POST" class="card p-4 shadow-sm bg-light">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="<?= htmlspecialchars($product['category']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="<?= htmlspecialchars($product['quantity']); ?>" min="1" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price per Item ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($product['price']); ?>" min="0.01" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">Update Product</button>
        </div>
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-outline-secondary w-100">Back to Dashboard</a>
        </div>
    </form>
</div>
</body>
</html>
