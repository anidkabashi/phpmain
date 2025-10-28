<?php
// Include database connection
include 'db.php';

// Redirect if no ID
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];

// Fetch product
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "<div class='alert alert-danger'>Product not found.</div>";
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sellQty = (int)$_POST['sell_quantity'];
    if ($sellQty <= 0) {
        $error = "Please enter a positive quantity.";
    } elseif ($sellQty > $product['quantity']) {
        $error = "Cannot sell more than current stock ({$product['quantity']}).";
    } else {
        $newQty = $product['quantity'] - $sellQty;
        $updateStmt = $pdo->prepare("UPDATE products SET quantity = ? WHERE id = ?");
        $updateStmt->execute([$newQty, $id]);
        header('Location: index.php?message=Sold successfully');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sell Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-cart"></i> Sell Product: <?= htmlspecialchars($product['name']); ?>
                    </h4>
                </div>
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="sell_quantity" class="form-label fw-semibold">Quantity to Sell</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="sell_quantity" 
                                name="sell_quantity" 
                                min="1" 
                                max="<?= $product['quantity'] ?>" 
                                placeholder="Max <?= $product['quantity'] ?>" 
                                required
                            >
                            <div class="form-text">Available stock: <?= $product['quantity'] ?></div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning flex-grow-1">
                                <i class="bi bi-check-circle"></i> Sell
                            </button>
                            <a href="index.php" class="btn btn-secondary flex-grow-1">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
