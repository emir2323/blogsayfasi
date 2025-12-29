<?php
require_once '../config/admin_config.php';
requireAdmin();

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $file = $_FILES['photo'];
    
    if ($file['error'] === UPLOAD_ERR_OK) {
        $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        $maxSize = 5 * 1024 * 1024; // 5MB
        
        if (in_array($file['type'], $allowed) && $file['size'] <= $maxSize) {
            $uploadDir = '../assets/img/';
            $fileName = 'profile.jpg';
            $targetPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $message = 'Fotoğraf başarıyla yüklendi!';
                $messageType = 'success';
            } else {
                $message = 'Fotoğraf yüklenirken bir hata oluştu.';
                $messageType = 'error';
            }
        } else {
            $message = 'Geçersiz dosya formatı veya dosya çok büyük. (Max: 5MB, Format: JPG/PNG/WEBP)';
            $messageType = 'error';
        }
    } else {
        $message = 'Dosya yüklenirken bir hata oluştu.';
        $messageType = 'error';
    }
}

$currentPhoto = '../assets/img/profile.jpg';
$photoExists = file_exists($currentPhoto);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotoğraf Yönetimi</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        .admin-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--border);
        }
        
        .admin-header h1 {
            margin: 0;
        }
        
        .back-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-section {
            background: var(--card);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
        }
        
        .current-photo {
            text-align: center;
            margin-bottom: 24px;
        }
        
        .current-photo img {
            max-width: 300px;
            width: 100%;
            border-radius: 12px;
            border: 2px solid var(--border);
        }
        
        .form-group {
            margin-bottom: 16px;
        }
        
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: var(--text);
        }
        
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 2px dashed var(--border);
            border-radius: 8px;
            background: var(--bg);
        }
        
        .btn {
            padding: 12px 24px;
            background: var(--gradient-1);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 15px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--shadow);
        }
        
        .message {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .message.success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }
        
        .message.error {
            background: #fee;
            color: #c33;
            border: 1px solid #fcc;
        }
        
        .info {
            background: #eff6ff;
            color: #1e40af;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Fotoğraf Yönetimi</h1>
            <div style="display: flex; gap: 12px; align-items: center;">
                <a href="/blogsayfasi/" target="_blank" style="color: var(--accent); text-decoration: none; font-weight: 600; font-size: 14px;">🌐 Siteye Dön</a>
                <a href="index.php" class="back-link">← Dashboard'a Dön</a>
            </div>
        </div>
        
        <?php if ($message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        
        <div class="form-section">
            <h2>Mevcut Fotoğraf</h2>
            <div class="current-photo">
                <?php if ($photoExists): ?>
                    <img src="<?php echo $currentPhoto; ?>?v=<?php echo time(); ?>" alt="Mevcut Profil Fotoğrafı">
                <?php else: ?>
                    <p>Henüz fotoğraf yüklenmemiş.</p>
                <?php endif; ?>
            </div>
            
            <div class="info">
                <strong>Bilgi:</strong> Yüklenen fotoğraf otomatik olarak "profile.jpg" olarak kaydedilir ve mevcut fotoğrafın üzerine yazılır. Önerilen boyut: 400x400px veya daha büyük kare format.
            </div>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="photo">Yeni Fotoğraf Seç</label>
                    <input type="file" id="photo" name="photo" accept="image/jpeg,image/jpg,image/png,image/webp" required>
                </div>
                
                <button type="submit" class="btn">Fotoğrafı Yükle</button>
            </form>
        </div>
    </div>
</body>
</html>

