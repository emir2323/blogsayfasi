<?php
require_once 'config/config.php';

// Form gönderildi mi kontrol et
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form verilerini al ve temizle
    $ad = isset($_POST['ad']) ? trim($_POST['ad']) : '';
    $eposta = isset($_POST['eposta']) ? trim($_POST['eposta']) : '';
    $mesaj = isset($_POST['mesaj']) ? trim($_POST['mesaj']) : '';
    
    // Basit validasyon
    $errors = [];
    
    if (empty($ad)) {
        $errors[] = 'Ad Soyad alanı zorunludur.';
    }
    
    if (empty($eposta)) {
        $errors[] = 'E-posta alanı zorunludur.';
    } elseif (!filter_var($eposta, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Geçerli bir e-posta adresi giriniz.';
    }
    
    if (empty($mesaj)) {
        $errors[] = 'Mesaj alanı zorunludur.';
    } elseif (strlen($mesaj) < 10) {
        $errors[] = 'Mesaj en az 10 karakter olmalıdır.';
    }
    
    // Eğer hata yoksa e-posta gönder
    if (empty($errors)) {
        $to = CONTACT_EMAIL;
        $subject = 'İletişim Formu: ' . $ad;
        $message = "Ad Soyad: $ad\n";
        $message .= "E-posta: $eposta\n\n";
        $message .= "Mesaj:\n$mesaj\n";
        $message .= "\n---\n";
        $message .= "Gönderim Tarihi: " . date('d.m.Y H:i:s') . "\n";
        $message .= "IP Adresi: " . ($_SERVER['REMOTE_ADDR'] ?? 'Bilinmiyor') . "\n";
        
        $headers = "From: " . SITE_EMAIL . "\r\n";
        $headers .= "Reply-To: $eposta\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        
        // E-posta göndermeyi dene
        $mailSent = false;
        $errorInfo = '';
        
        // Hata raporlamayı aç
        $oldErrorReporting = error_reporting(E_ALL);
        $oldDisplayErrors = ini_get('display_errors');
        ini_set('display_errors', 0);
        
        try {
            $mailSent = @mail($to, $subject, $message, $headers);
            
            // Eğer mail() false döndürdüyse, son hatayı kontrol et
            if (!$mailSent) {
                $error = error_get_last();
                if ($error && strpos($error['message'], 'mail') !== false) {
                    $errorInfo = $error['message'];
                }
            }
        } catch (Exception $e) {
            $errorInfo = $e->getMessage();
        }
        
        // Hata raporlamayı geri al
        error_reporting($oldErrorReporting);
        ini_set('display_errors', $oldDisplayErrors);
        
        // Localhost kontrolü
        $isLocalhost = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || 
                        strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false ||
                        strpos($_SERVER['HTTP_HOST'], '::1') !== false);
        
        // Localhost'ta test için dosyaya kaydet
        $logSaved = false;
        if ($isLocalhost) {
            $logFile = __DIR__ . '/contact_log.txt';
            $logEntry = date('Y-m-d H:i:s') . " - Gönderen: $ad ($eposta)\n";
            $logEntry .= "Mesaj: $mesaj\n";
            $logEntry .= "Mail Gönderimi: " . ($mailSent ? 'BAŞARILI' : 'BAŞARISIZ - Localhost') . "\n";
            if ($errorInfo) {
                $logEntry .= "Hata: $errorInfo\n";
            }
            $logEntry .= str_repeat('-', 50) . "\n\n";
            $logSaved = @file_put_contents($logFile, $logEntry, FILE_APPEND) !== false;
        }
        
        // Başarı kontrolü: Localhost'ta dosyaya kaydetme başarılıysa başarılı say
        if ($mailSent || ($isLocalhost && $logSaved)) {
            $success = true;
        } else {
            // Daha açıklayıcı hata mesajı
            if ($isLocalhost) {
                $errors[] = 'Mesaj kaydedilemedi. Lütfen tekrar deneyin.';
            } else {
                $errors[] = 'E-posta gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyin veya doğrudan ' . SITE_EMAIL . ' adresine e-posta gönderin.';
            }
        }
    }
}

// Başarılı veya hata durumuna göre yönlendir veya mesaj göster
if (isset($success) && $success) {
    header('Location: index.php#iletisim?success=1');
    exit;
} else {
    // Hata varsa geri dön
    $errorMessage = !empty($errors) ? implode('<br>', $errors) : 'Bir hata oluştu.';
    header('Location: index.php#iletisim?error=' . urlencode($errorMessage));
    exit;
}
?>

