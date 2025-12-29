<?php
require_once '../config/admin_config.php';

session_destroy();
header('Location: login.php');
exit;
?>

