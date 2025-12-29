<?php
require_once '../config/admin_config.php';
requireAdmin();

$message = '';
$messageType = '';

// Proje silme
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $projects = readDataFile(PROJECTS_DATA_FILE);
    $id = (int)$_GET['delete'];
    if (isset($projects[$id])) {
        unset($projects[$id]);
        $projects = array_values($projects); // Yeniden indeksle
        writeDataFile(PROJECTS_DATA_FILE, $projects);
        $message = 'Proje başarıyla silindi!';
        $messageType = 'success';
    }
}

// Proje kaydetme
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projects = readDataFile(PROJECTS_DATA_FILE);
    
    // Resim yükleme işlemi
    $imagePath = $_POST['existing_image'] ?? '';
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../assets/img/projects/';
        
        // Klasör yoksa oluştur
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Dosya uzantısını kontrol et
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = $_FILES['image']['type'];
        
        if (in_array($fileType, $allowedTypes)) {
            // Benzersiz dosya adı oluştur
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('project_') . '.' . $extension;
            $targetPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imagePath = 'assets/img/projects/' . $fileName;
            } else {
                $message = 'Resim yüklenirken hata oluştu!';
                $messageType = 'error';
            }
        } else {
            $message = 'Sadece JPG, PNG, GIF ve WebP formatları desteklenmektedir!';
            $messageType = 'error';
        }
    }
    
    $project = [
        'title' => $_POST['title'] ?? '',
        'description' => $_POST['description'] ?? '',
        'url' => $_POST['url'] ?? '',
        'image' => $imagePath,
        'badge' => $_POST['badge'] ?? '',
        'role' => $_POST['role'] ?? '',
        'highlights' => $_POST['highlights'] ?? '',
        'tech' => array_map('trim', explode(',', $_POST['tech'] ?? ''))
    ];
    
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        // Güncelleme
        $id = (int)$_POST['id'];
        $projects[$id] = $project;
    } else {
        // Yeni ekleme
        $projects[] = $project;
    }
    
    writeDataFile(PROJECTS_DATA_FILE, $projects);
    
    if (!isset($message)) {
        $message = 'Proje başarıyla kaydedildi!';
        $messageType = 'success';
    }
}

$projects = readDataFile(PROJECTS_DATA_FILE);
if (empty($projects)) {
    // Varsayılan projeleri yükle
    $defaultProjects = [
        [
            'title' => 'Croffle Waffle & Coffee',
            'description' => 'Kore sokak lezzeti Croffle\'ı Türkiye ile buluşturan, franchise odaklı modern bir marka web sitesi. Mobil öncelikli yaklaşımla kullanıcı deneyimini ön planda tutan bir proje.',
            'url' => 'https://croffle.com.tr/',
            'image' => 'assets/img/croffle-preview.jpg',
            'badge' => 'Marka · Yiyecek & İçecek',
            'role' => 'Frontend geliştirici, performans ve UX iyileştirmeleri',
            'highlights' => 'Mobil öncelikli tasarım, menü vurgusu, franchise odaklı akış',
            'tech' => ['HTML', 'CSS', 'JavaScript', 'SEO']
        ],
        [
            'title' => 'Psikoloji Merkezi',
            'description' => 'Güven ve sakinlik hissi veren, kullanıcı dostu bir psikoloji merkezi web sitesi. Randevu süreçleri ve terapi türlerinin net bir şekilde anlatıldığı profesyonel bir platform.',
            'url' => 'http://psikologmerkezim.com.tr/',
            'image' => 'assets/img/psikoloji-preview.jpg',
            'badge' => 'Sağlık · Psikoloji',
            'role' => 'Tasarım ve geliştirme',
            'highlights' => 'Güven veren arayüz, randevu sistemi, sade tasarım',
            'tech' => ['HTML', 'CSS', 'JavaScript', 'Responsive']
        ]
    ];
    writeDataFile(PROJECTS_DATA_FILE, $defaultProjects);
    $projects = $defaultProjects;
}
$editingId = isset($_GET['edit']) ? (int)$_GET['edit'] : null;
$editingProject = $editingId !== null && isset($projects[$editingId]) ? $projects[$editingId] : null;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proje Yönetimi</title>
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
        
        .projects-list {
            display: grid;
            gap: 16px;
            margin-bottom: 30px;
        }
        
        .project-item {
            background: var(--card);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .project-item h3 {
            margin: 0 0 4px;
        }
        
        .project-item p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }
        
        .project-actions {
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
            min-height: 100px;
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
        
        .upload-area {
            border: 2px dashed var(--border);
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: var(--card);
        }
        
        .upload-area:hover {
            border-color: var(--accent);
            background: rgba(59, 130, 246, 0.05);
        }
        
        .upload-area.dragover {
            border-color: var(--accent);
            background: rgba(59, 130, 246, 0.1);
        }
        
        .upload-content svg {
            color: var(--accent);
            margin-bottom: 12px;
        }
        
        .upload-text {
            font-size: 16px;
            color: var(--text);
            margin-bottom: 8px;
        }
        
        .upload-browse {
            color: var(--accent);
            font-weight: 600;
            cursor: pointer;
        }
        
        .upload-hint {
            font-size: 13px;
            color: var(--muted);
        }
        
        .image-preview {
            margin-top: 16px;
            position: relative;
            display: inline-block;
        }
        
        .image-preview img {
            max-width: 300px;
            border-radius: 12px;
            border: 2px solid var(--border);
        }
        
        .remove-image {
            position: absolute;
            top: 8px;
            right: 8px;
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .remove-image:hover {
            background: #dc2626;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Proje Yönetimi</h1>
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
        
        <?php if (!$editingProject): ?>
            <a href="?add=1" class="btn-add">+ Yeni Proje Ekle</a>
            
            <div class="projects-list">
                <?php if (empty($projects)): ?>
                    <p>Henüz proje eklenmemiş.</p>
                <?php else: ?>
                    <?php foreach ($projects as $id => $project): ?>
                        <div class="project-item">
                            <div>
                                <h3><?php echo htmlspecialchars($project['title'] ?? 'Başlıksız'); ?></h3>
                                <p><?php echo htmlspecialchars($project['description'] ?? ''); ?></p>
                            </div>
                            <div class="project-actions">
                                <a href="?edit=<?php echo $id; ?>" class="btn-small btn-edit">Düzenle</a>
                                <a href="?delete=<?php echo $id; ?>" class="btn-small btn-delete" onclick="return confirm('Bu projeyi silmek istediğinizden emin misiniz?')">Sil</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($editingProject || isset($_GET['add'])): ?>
            <div class="form-section">
                <h2><?php echo $editingProject ? 'Proje Düzenle' : 'Yeni Proje Ekle'; ?></h2>
                <form method="POST" enctype="multipart/form-data">
                    <?php if ($editingProject): ?>
                        <input type="hidden" name="id" value="<?php echo $editingId; ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>Proje Başlığı</label>
                        <input type="text" name="title" value="<?php echo htmlspecialchars($editingProject['title'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" required><?php echo htmlspecialchars($editingProject['description'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Proje URL</label>
                        <input type="url" name="url" value="<?php echo htmlspecialchars($editingProject['url'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Proje Görseli</label>
                        <?php if ($editingProject && !empty($editingProject['image'])): ?>
                            <div class="current-image">
                                <img src="../<?php echo htmlspecialchars($editingProject['image']); ?>" alt="Mevcut görsel" style="max-width: 200px; border-radius: 8px; margin-bottom: 12px;">
                                <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($editingProject['image']); ?>">
                                <p style="font-size: 13px; color: var(--muted); margin-bottom: 8px;">Mevcut görsel. Yeni bir resim yüklerseniz değiştirilecek.</p>
                            </div>
                        <?php endif; ?>
                        <div class="upload-area" id="uploadArea">
                            <div class="upload-content">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <p class="upload-text">Resmi sürükleyip bırakın veya <span class="upload-browse">seçin</span></p>
                                <p class="upload-hint">JPG, PNG, GIF veya WebP (Max 5MB)</p>
                            </div>
                            <input type="file" name="image" id="imageInput" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp" style="display: none;">
                        </div>
                        <div id="imagePreview" class="image-preview" style="display: none;">
                            <img id="previewImg" src="" alt="Önizleme">
                            <button type="button" class="remove-image" onclick="removeImage()">✕ Kaldır</button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Badge (örn: Marka · Yiyecek & İçecek)</label>
                        <input type="text" name="badge" value="<?php echo htmlspecialchars($editingProject['badge'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Rolüm</label>
                        <input type="text" name="role" value="<?php echo htmlspecialchars($editingProject['role'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Öne Çıkanlar</label>
                        <textarea name="highlights" required><?php echo htmlspecialchars($editingProject['highlights'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Teknolojiler (virgülle ayırın, örn: HTML, CSS, JavaScript)</label>
                        <input type="text" name="tech" value="<?php echo htmlspecialchars(implode(', ', $editingProject['tech'] ?? [])); ?>" required>
                    </div>
                    
                    <button type="submit" class="btn">Kaydet</button>
                    <a href="projects.php" style="margin-left: 12px; color: var(--accent); text-decoration: none;">İptal</a>
                </form>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
        const uploadArea = document.getElementById('uploadArea');
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        // Click to select file
        uploadArea.addEventListener('click', () => {
            imageInput.click();
        });
        
        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        // Highlight drop area when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => {
                uploadArea.classList.add('dragover');
            }, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => {
                uploadArea.classList.remove('dragover');
            }, false);
        });
        
        // Handle dropped files
        uploadArea.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                imageInput.files = files;
                handleFiles(files);
            }
        }, false);
        
        // Handle selected files
        imageInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });
        
        function handleFiles(files) {
            if (files.length === 0) return;
            
            const file = files[0];
            
            // Validate file type
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                alert('Sadece JPG, PNG, GIF ve WebP formatları desteklenmektedir!');
                return;
            }
            
            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('Dosya boyutu 5MB\'dan küçük olmalıdır!');
                return;
            }
            
            // Show preview
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
                uploadArea.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
        
        function removeImage() {
            imageInput.value = '';
            imagePreview.style.display = 'none';
            uploadArea.style.display = 'block';
        }
    </script>
</body>
</html>

