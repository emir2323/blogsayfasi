<?php
// Debugging Session
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/admin_config.php';

echo "<h1>Session Debug</h1>";
echo "Session ID: " . session_id() . "<br>";
echo "Session Name: " . session_name() . "<br>";
echo "Session Save Path: " . session_save_path() . "<br>";
echo "Cookie Params: <pre>" . print_r(session_get_cookie_params(), true) . "</pre>";

if (!isset($_SESSION['test_counter'])) {
    $_SESSION['test_counter'] = 0;
}
$_SESSION['test_counter']++;

echo "Test Counter (Refresh page to increase): " . $_SESSION['test_counter'] . "<br>";

echo "<h2>Session Data</h2>";
echo "<pre>" . print_r($_SESSION, true) . "</pre>";

echo "<h2>Server Data</h2>";
echo "<pre>" . print_r($_SERVER, true) . "</pre>";
?>
