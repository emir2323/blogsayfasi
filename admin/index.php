<?php
require_once '../config/admin_config.php';
requireAdmin();

$pageTitle = 'Admin Dashboard';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--border);
        }
        
        .admin-header h1 {
            margin: 0;
            font-size: 32px;
        }
        
        .logout-btn {
            padding: 10px 20px;
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
        
        .logout-btn:hover {
            background: #dc2626;
        }
        
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }
        
        .admin-card {
            background: var(--card);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            transition: all 0.3s;
        }
        
        .admin-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px var(--shadow);
            border-color: var(--accent);
        }
        
        .admin-card h2 {
            margin: 0 0 12px;
            font-size: 20px;
            color: var(--text);
        }
        
        .admin-card p {
            color: var(--muted);
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .admin-card a {
            display: inline-block;
            padding: 10px 20px;
            background: var(--gradient-1);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: transform 0.2s;
        }
        
        .admin-card a:hover {
            transform: translateY(-2px);
        }
        
        .icon {
            font-size: 48px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Admin Dashboard</h1>
            <div style="display: flex; gap: 12px; align-items: center;">
                <a href="<?php echo SITE_URL; ?>" target="_blank" style="padding: 10px 20px; background: var(--gradient-1); color: white; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">🌐 Siteye Dön</a>
                <a href="logout.php" class="logout-btn">Çıkış Yap</a>
            </div>
        </div>
        
        <div class="admin-grid">
            <div class="admin-card">
                <div class="icon">💰</div>
                <h2>Fiyat Yönetimi</h2>
                <p>Anasayfadaki fiyat paketlerini düzenleyin, indirim oranlarını güncelleyin.</p>
                <a href="pricing.php">Fiyatları Düzenle</a>
            </div>
            
            <div class="admin-card">
                <div class="icon">📸</div>
                <h2>Fotoğraf Yönetimi</h2>
                <p>Anasayfadaki profil fotoğrafını değiştirin.</p>
                <a href="photo.php">Fotoğrafı Düzenle</a>
            </div>
            
            <div class="admin-card">
                <div class="icon">🚀</div>
                <h2>Proje Yönetimi</h2>
                <p>Projelerim sayfasındaki projeleri ekleyin, düzenleyin veya silin.</p>
                <a href="projects.php">Projeleri Yönet</a>
            </div>
            
            <div class="admin-card">
                <div class="icon">📝</div>
                <h2>Blog Yönetimi</h2>
                <p>Blog yazılarını ekleyin, düzenleyin veya silin.</p>
                <a href="blog.php">Blogları Yönet</a>
            </div>
            
            <div class="admin-card">
                <div class="icon">⚙️</div>
                <h2>Ayarlar</h2>
                <p>CV dosyasını yükleyin, GitHub ve LinkedIn linklerini düzenleyin.</p>
                <a href="settings.php">Ayarları Düzenle</a>
            </div>
        </div>
    </div>
</body>
</html>

