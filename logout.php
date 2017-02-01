<?php
session_start();
unset($_SESSION['gebruiker']);
session_destroy();

header("Location: index.php");
exit;
?>