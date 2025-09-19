<?php require_once 'classloader.php'; ?>
<?php 
if (!$userObj->isLoggedIn()) {
  header("Location: login.php");
}

if ($userObj->getRole() === 'admin') {
  header("Location: manage_categories.php");
} else {
    header("Location: login.php");
}
?>