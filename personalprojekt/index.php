<?php
include 'header.php';
include 'db.php';

$stmt = $pdo->query("SELECT * FROM products ORDER BY date_added DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Food Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h2 class="mt-4 mb-3 text-center">Food Stock Dashboard</h2>
    <div class="text-end mb-3">
        <a href="add.php" class="btn btn-success">+ Add Product</a>
    </div>
    <table class="table table-striped table-bordered shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th><th>Name</th><th>Category</th><th>Qty</th><th>Price</th><th>Total</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $p): ?>
            <tr class="<?= ($p['quantity'] < 5) ? 'table-danger' : 'table-success' ?>">
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['name']) ?></td>
                <td><?= htmlspecialchars($p['category']) ?></td>
                <td><?= $p['quantity'] ?></td>
                <td>$<?= number_format($p['price'], 2) ?></td>
                <td>$<?= number_format($p['quantity'] * $p['price'], 2) ?></td>
                <td>
                    
                
                <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="sell.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Sell</a>
                <a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
