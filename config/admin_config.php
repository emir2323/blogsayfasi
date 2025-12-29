<?php
// Ana config dosyasını dahil et (SITE_URL için gerekli)
require_once __DIR__ . '/config.php';

// Admin paneli ayarları
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'admin123'); // Şifreyi değiştirmeyi unutmayın!

// Veri dosyaları
define('PRICING_DATA_FILE', __DIR__ . '/../data/pricing.json');
define('PROJECTS_DATA_FILE', __DIR__ . '/../data/projects.json');
define('PHOTO_DATA_FILE', __DIR__ . '/../data/photo.json');
define('BLOG_DATA_FILE', __DIR__ . '/../data/blog.json');
define('SETTINGS_DATA_FILE', __DIR__ . '/../data/settings.json');

// Session yapılandırması - Production uyumluluğu için
if (session_status() === PHP_SESSION_NONE) {
    // Session cookie ayarları
    session_set_cookie_params([
        'lifetime' => 86400,
        'path' => '/',
        'domain' => '', // Otomatik
        'secure' => false, // SSL zorunluluğunu geçici olarak kaldır
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    
    session_start();
    
    // Session güvenliği için regenerate
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id(true);
        $_SESSION['initiated'] = true;
    }
}

// Admin giriş kontrolü
function isAdminLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Admin giriş sayfasına yönlendir
function redirectToLogin() {
    header('Location: ' . SITE_URL . 'admin/login.php');
    exit;
}

// Admin kontrolü - giriş yapılmamışsa login'e yönlendir
function requireAdmin() {
    if (!isAdminLoggedIn()) {
        redirectToLogin();
    }
}

// Veri dosyasını oku
function readDataFile($file) {
    if (!file_exists($file)) {
        return [];
    }
    $content = file_get_contents($file);
    return json_decode($content, true) ?: [];
}

// Veri dosyasına yaz
function writeDataFile($file, $data) {
    $dir = dirname($file);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
?>

