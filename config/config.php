<?php
// Site genel ayarları
define('SITE_NAME', 'Emir Yıldırım');
define('SITE_EMAIL', 'emir76931@gmail.com');
define('SITE_PHONE', '+905444948651');
// Base URL detection
$isHttps = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
           || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
$protocol = $isHttps ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
// If running on localhost/blogsayfasi, keep it. If on domain, use root.
if (strpos($host, 'localhost') !== false) {
    define('SITE_URL', $protocol . "://" . $host . "/blogsayfasi/");
} else {
    define('SITE_URL', $protocol . "://" . $host . "/");
}

// İletişim formu ayarları
define('CONTACT_EMAIL', 'emir76931@gmail.com');

// Blog ayarları
define('BLOG_POSTS_PER_PAGE', 10);

// Sosyal medya ve CV linkleri
$settings = [];
$settingsPath = __DIR__ . '/../data/settings.json';
if (file_exists($settingsPath)) {
    $settings = json_decode(file_get_contents($settingsPath), true);
}

define('LINKEDIN_URL', $settings['linkedin_url'] ?? 'https://www.linkedin.com/in/emir-y%C4%B1ld%C4%B1r%C4%B1m-7a5585269/');
define('GITHUB_URL', $settings['github_url'] ?? 'https://github.com/emir2323');
define('CV_FILE', $settings['cv_file'] ?? 'assets/files/cv.pdf'); // CV dosyanızın yolu
?>

