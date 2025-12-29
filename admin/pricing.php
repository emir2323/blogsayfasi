<?php
require_once '../config/admin_config.php';
requireAdmin();

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pricing = [
        'starter' => [
            'old_price' => $_POST['starter_old'] ?? '',
            'new_price' => $_POST['starter_new'] ?? '',
            'discount' => $_POST['starter_discount'] ?? ''
        ],
        'professional' => [
            'old_price' => $_POST['professional_old'] ?? '',
            'new_price' => $_POST['professional_new'] ?? '',
            'discount' => $_POST['professional_discount'] ?? ''
        ],
        'custom' => [
            'text' => $_POST['custom_text'] ?? 'Teklif'
        ]
    ];
    
    writeDataFile(PRICING_DATA_FILE, $pricing);
    $message = 'Fiyatlar başarıyla güncellendi!';
    $messageType = 'success';
}

$pricing = readDataFile(PRICING_DATA_FILE);
if (empty($pricing)) {
    $pricing = [
        'starter' => ['old_price' => '4900', 'new_price' => '3500', 'discount' => '29'],
        'professional' => ['old_price' => '9900', 'new_price' => '8000', 'discount' => '19'],
        'custom' => ['text' => 'Teklif']
    ];
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiyat Yönetimi</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        .admin-container {
            max-width: 900px;
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
        
        .form-section h2 {
            margin: 0 0 20px;
            font-size: 20px;
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
        
        input {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
        }
        
        input:focus {
            outline: none;
            border-color: var(--accent);
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
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Fiyat Yönetimi</h1>
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
        
        <form method="POST">
            <div class="form-section">
                <h2>Başlangıç Paketi</h2>
                <div class="form-group">
                    <label>Eski Fiyat (₺)</label>
                    <input type="number" name="starter_old" value="<?php echo htmlspecialchars($pricing['starter']['old_price'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Yeni Fiyat (₺)</label>
                    <input type="number" name="starter_new" value="<?php echo htmlspecialchars($pricing['starter']['new_price'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>İndirim Oranı (%)</label>
                    <input type="number" name="starter_discount" value="<?php echo htmlspecialchars($pricing['starter']['discount'] ?? ''); ?>" required>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Profesyonel Paket</h2>
                <div class="form-group">
                    <label>Eski Fiyat (₺)</label>
                    <input type="number" name="professional_old" value="<?php echo htmlspecialchars($pricing['professional']['old_price'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Yeni Fiyat (₺)</label>
                    <input type="number" name="professional_new" value="<?php echo htmlspecialchars($pricing['professional']['new_price'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>İndirim Oranı (%)</label>
                    <input type="number" name="professional_discount" value="<?php echo htmlspecialchars($pricing['professional']['discount'] ?? ''); ?>" required>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Özel Paket</h2>
                <div class="form-group">
                    <label>Fiyat Metni</label>
                    <input type="text" name="custom_text" value="<?php echo htmlspecialchars($pricing['custom']['text'] ?? 'Teklif'); ?>" required>
                </div>
            </div>
            
            <button type="submit" class="btn">Değişiklikleri Kaydet</button>
        </form>
    </div>
</body>
</html>

