<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="superM.png" height="70px" width="70px">
    </a>
    <div>
      <span class="navbar-text text-white me-3">
        <?php
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user'; // fallback
?>
Logged in as: <strong><?= $_SESSION['user'] ?></strong> (<?= htmlspecialchars($role) ?>)

      </span>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>
