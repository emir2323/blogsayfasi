<?php
require_once '../config/admin_config.php';
requireAdmin();

$pageTitle = 'Ayarlar';
$message = '';
$messageType = '';

// Ayarları kaydet
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentSettings = readDataFile(SETTINGS_DATA_FILE);
    
    // URL'leri güncelle
    $newSettings = [
        'linkedin_url' => $_POST['linkedin_url'] ?? '',
        'github_url' => $_POST['github_url'] ?? '',
        'cv_file' => $currentSettings['cv_file'] ?? 'assets/files/cv.pdf'
    ];
    
    // CV dosyasını yükle
    if (isset($_FILES['cv_file']) && $_FILES['cv_file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['cv_file']['tmp_name'];
        $fileName = $_FILES['cv_file']['name'];
        $fileSize = $_FILES['cv_file']['size'];
        $fileType = $_FILES['cv_file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $allowedfileExtensions = array('pdf');
        
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = '../assets/files/';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }
            // Sabit bir isim kullanalım ki link config'de değişmek zorunda kalmasın
            // Veya timestamp ekleyip config'i güncelleyebiliriz ama şimdilik üzerine yazalım.
            $dest_path = $uploadFileDir . 'cv.pdf';
            
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $newSettings['cv_file'] = 'assets/files/cv.pdf';
                $message = 'Ayarlar güncellendi ve CV başarıyla yüklendi!';
                $messageType = 'success';
            } else {
                $message = 'CV yüklenirken bir hata oluştu.';
                $messageType = 'error';
            }
        } else {
            $message = 'Sadece PDF formatında CV yükleyebilirsiniz.';
            $messageType = 'error';
        }
    } else {
        $message = 'Ayarlar güncellendi!';
        $messageType = 'success';
    }
    
    writeDataFile(SETTINGS_DATA_FILE, $newSettings);
}

$settings = readDataFile(SETTINGS_DATA_FILE);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayarlar - Admin Paneli</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        .admin-container {
            max-width: 800px;
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
        
        .back-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-section {
            background: var(--card);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
        }
        
        input[type="text"], input[type="url"], input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            background: var(--bg);
            color: var(--text);
        }
        
        .current-file {
            margin-top: 8px;
            font-size: 14px;
            color: var(--muted);
        }
        
        .btn {
            background: var(--gradient-1);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 16px;
            transition: opacity 0.2s;
        }
        
        .btn:hover {
            opacity: 0.9;
        }
        
        .message {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .message.success {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border: 1px solid #10b981;
        }
        
        .message.error {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Profil ve Ayarlar</h1>
            <div style="display: flex; gap: 12px; align-items: center;">
                 <a href="<?php echo SITE_URL; ?>" target="_blank" style="color: var(--text); text-decoration: none; font-weight: 600; font-size: 14px;">🌐 Siteyi Görüntüle</a>
                <a href="index.php" class="back-link">← Dashboard'a Dön</a>
            </div>
        </div>
        
        <?php if ($message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        
        <div class="form-section">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>LinkedIn Profil URL</label>
                    <input type="url" name="linkedin_url" value="<?php echo htmlspecialchars($settings['linkedin_url'] ?? ''); ?>" placeholder="https://linkedin.com/in/..." required>
                </div>
                
                <div class="form-group">
                    <label>GitHub Profil URL</label>
                    <input type="url" name="github_url" value="<?php echo htmlspecialchars($settings['github_url'] ?? ''); ?>" placeholder="https://github.com/..." required>
                </div>
                
                <div class="form-group">
                    <label>CV Dosyası (PDF)</label>
                    <input type="file" name="cv_file" accept=".pdf">
                    <?php if (!empty($settings['cv_file'])): ?>
                        <div class="current-file">
                            Mevcut dosya: <a href="<?php echo SITE_URL . $settings['cv_file']; ?>" target="_blank" style="color: var(--accent);">Görüntüle</a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <button type="submit" class="btn">Ayarları Kaydet</button>
            </form>
        </div>
    </div>
</body>
</html>
