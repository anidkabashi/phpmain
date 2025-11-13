<?php
include 'db.php';
session_start();


if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM products ORDER BY name ASC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Store - Browse Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #111111;">

  <div class="container">
    <a class="navbar-brand" href="shop.php"><i class="bi bi-basket"></i> Food Store</a>
    <div>
      <span class="text-white me-3">👋 Hi, <?= htmlspecialchars($_SESSION['user']); ?></span>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>



<div class="container mt-5">
    <h2 class="text-center mb-4">Available Products</h2>
    <div class="row g-4">
        <?php foreach ($products as $p): ?>
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($p['name']); ?></h5>
                        <p class="card-text text-muted"><?= htmlspecialchars($p['category']); ?></p>
                        <p class="fw-bold text-success">$<?= number_format($p['price'], 2); ?></p>
                        <p>Available: <?= $p['quantity']; ?></p>

                        <?php if ($p['quantity'] > 0): ?>
                            <a href="buy.php?id=<?= $p['id']; ?>" class="btn btn-success w-100">
                                <i class="bi bi-bag-check"></i> Buy Now
                            </a>
                        <?php else: ?>
                            <button class="btn btn-secondary w-100" disabled>Out of Stock</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer class="text-center mt-5 p-3 bg-dark text-white">
    &copy; <?= date('Y') ?> Food Store | All rights reserved.
</footer>
</body>
</html>
