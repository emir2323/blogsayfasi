<?php
require_once '../config/admin_config.php';
requireAdmin();

$message = '';
$messageType = '';

// Blog yazısı silme
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $posts = readDataFile(BLOG_DATA_FILE);
    $id = (int)$_GET['delete'];
    foreach ($posts as $key => $post) {
        if ($post['id'] == $id) {
            unset($posts[$key]);
            break;
        }
    }
    $posts = array_values($posts);
    writeDataFile(BLOG_DATA_FILE, $posts);
    $message = 'Blog yazısı başarıyla silindi!';
    $messageType = 'success';
}

// Blog yazısı kaydetme
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $posts = readDataFile(BLOG_DATA_FILE);
    
    $newId = 1;
    if (!empty($posts)) {
        $ids = array_column($posts, 'id');
        $newId = max($ids) + 1;
    }
    
    $post = [
        'id' => isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : $newId,
        'title' => $_POST['title'] ?? '',
        'slug' => $_POST['slug'] ?? '',
        'date' => $_POST['date'] ?? date('Y-m-d'),
        'category' => $_POST['category'] ?? '',
        'tags' => array_map('trim', explode(',', $_POST['tags'] ?? '')),
        'excerpt' => $_POST['excerpt'] ?? '',
        'content' => $_POST['content'] ?? ''
    ];
    
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        // Güncelleme
        foreach ($posts as $key => $p) {
            if ($p['id'] == (int)$_POST['id']) {
                $posts[$key] = $post;
                break;
            }
        }
    } else {
        // Yeni ekleme
        $posts[] = $post;
    }
    
    writeDataFile(BLOG_DATA_FILE, $posts);
    $message = 'Blog yazısı başarıyla kaydedildi!';
    $messageType = 'success';
}

$posts = readDataFile(BLOG_DATA_FILE);
if (empty($posts)) {
    // Varsayılan blog yazılarını yükle
    require_once '../config/posts.php';
    // $blogPosts değişkeni config/posts.php'den geliyor
    if (!empty($blogPosts)) {
        writeDataFile(BLOG_DATA_FILE, $blogPosts);
        $posts = $blogPosts;
    }
}
$editingId = isset($_GET['edit']) ? (int)$_GET['edit'] : null;
$editingPost = null;
if ($editingId !== null) {
    foreach ($posts as $post) {
        if ($post['id'] == $editingId) {
            $editingPost = $post;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Yönetimi</title>
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
        
        .posts-list {
            display: grid;
            gap: 16px;
            margin-bottom: 30px;
        }
        
        .post-item {
            background: var(--card);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .post-item h3 {
            margin: 0 0 4px;
        }
        
        .post-item p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }
        
        .post-meta {
            font-size: 12px;
            color: var(--muted);
            margin-top: 4px;
        }
        
        .post-actions {
            display: flex;
            gap: 8px;
        }
        
        .btn-small {
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }
        
        .btn-edit {
            background: var(--gradient-1);
            color: white;
        }
        
        .btn-delete {
            background: #ef4444;
            color: white;
        }
        
        .btn-add {
            background: var(--gradient-1);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 24px;
            font-weight: 600;
        }
        
        .form-section {
            background: var(--card);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 24px;
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
        
        input, textarea {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
        }
        
        textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        input:focus, textarea:focus {
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
        
        .slug-help {
            font-size: 12px;
            color: var(--muted);
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Blog Yönetimi</h1>
            <div style="display: flex; gap: 12px; align-items: center;">
                <a href="<?php echo SITE_URL; ?>" target="_blank" style="color: var(--accent); text-decoration: none; font-weight: 600; font-size: 14px;">🌐 Siteye Dön</a>
                <a href="index.php" class="back-link">← Dashboard'a Dön</a>
            </div>
        </div>
        
        <?php if ($message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        
        <?php if (!$editingPost): ?>
            <a href="?add=1" class="btn-add">+ Yeni Blog Yazısı Ekle</a>
            
            <div class="posts-list">
                <?php if (empty($posts)): ?>
                    <p>Henüz blog yazısı eklenmemiş.</p>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="post-item">
                            <div>
                                <h3><?php echo htmlspecialchars($post['title'] ?? 'Başlıksız'); ?></h3>
                                <p><?php echo htmlspecialchars($post['excerpt'] ?? ''); ?></p>
                                <div class="post-meta">
                                    <?php echo htmlspecialchars($post['category'] ?? ''); ?> · 
                                    <?php echo date('d F Y', strtotime($post['date'] ?? 'now')); ?>
                                </div>
                            </div>
                            <div class="post-actions">
                                <a href="?edit=<?php echo $post['id']; ?>" class="btn-small btn-edit">Düzenle</a>
                                <a href="?delete=<?php echo $post['id']; ?>" class="btn-small btn-delete" onclick="return confirm('Bu blog yazısını silmek istediğinizden emin misiniz?')">Sil</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($editingPost || isset($_GET['add'])): ?>
            <div class="form-section">
                <h2><?php echo $editingPost ? 'Blog Yazısı Düzenle' : 'Yeni Blog Yazısı Ekle'; ?></h2>
                <form method="POST">
                    <?php if ($editingPost): ?>
                        <input type="hidden" name="id" value="<?php echo $editingPost['id']; ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>Başlık</label>
                        <input type="text" name="title" value="<?php echo htmlspecialchars($editingPost['title'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Slug (URL için, örn: yazilima-nasil-basladim)</label>
                        <input type="text" name="slug" value="<?php echo htmlspecialchars($editingPost['slug'] ?? ''); ?>" required>
                        <div class="slug-help">Boşluk yerine tire (-) kullanın, Türkçe karakter kullanmayın.</div>
                    </div>
                    
                    <div class="form-group">
                        <label>Tarih</label>
                        <input type="date" name="date" value="<?php echo htmlspecialchars($editingPost['date'] ?? date('Y-m-d')); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="category" value="<?php echo htmlspecialchars($editingPost['category'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Etiketler (virgülle ayırın)</label>
                        <input type="text" name="tags" value="<?php echo htmlspecialchars(implode(', ', $editingPost['tags'] ?? [])); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Özet</label>
                        <textarea name="excerpt" required><?php echo htmlspecialchars($editingPost['excerpt'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>İçerik (HTML kullanabilirsiniz)</label>
                        <textarea name="content" style="min-height: 300px;" required><?php echo htmlspecialchars($editingPost['content'] ?? ''); ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn">Kaydet</button>
                    <a href="blog.php" style="margin-left: 12px; color: var(--accent); text-decoration: none;">İptal</a>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

