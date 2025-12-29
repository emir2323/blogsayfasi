<?php
require_once 'config/config.php';
require_once 'config/admin_config.php';

// Blog yazılarını yükle
$blogPosts = readDataFile(BLOG_DATA_FILE);
if (empty($blogPosts)) {
    // Varsayılan blog yazıları - ilk yüklemede JSON'a kaydet
    require_once 'config/posts.php';
    // config/posts.php'den gelen $blogPosts değişkenini kullan
    if (!empty($blogPosts)) {
        writeDataFile(BLOG_DATA_FILE, $blogPosts);
    }
}

// Slug parametresini al
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Yazıyı bul
$post = null;
foreach ($blogPosts as $p) {
    if ($p['slug'] === $slug) {
        $post = $p;
        break;
    }
}

// Eğer yazı bulunamazsa 404 sayfasına yönlendir veya hata göster
if (!$post) {
    header('HTTP/1.0 404 Not Found');
    $pageTitle = 'Yazı Bulunamadı';
    $pageDescription = 'Aradığınız blog yazısı bulunamadı.';
    include 'includes/header.php';
    echo '<main class="container section blog-page"><h1>Yazı Bulunamadı</h1><p>Aradığınız blog yazısı mevcut değil.</p><a href="' . SITE_URL . 'Blog" class="btn outline">Blog\'a Dön</a></main>';
    include 'includes/footer.php';
    exit;
}

$pageTitle = $post['title'];
$pageDescription = $post['excerpt'];
$pageUrl = SITE_URL . 'blog/' . $post['slug'];
$siteName = SITE_NAME;
$isBlogPage = true;
$showBlogLink = true;

include 'includes/header.php';
?>

    <main class="container section post-page">
      <article class="post-hero reveal">
        <a href="<?php echo SITE_URL; ?>Blog" class="post-back-link">← Blog'a Dön</a>
        <div class="hero-badge">Blog Yazısı</div>
        <h1><?php echo htmlspecialchars($post['title']); ?></h1>
        <div class="post-meta">
          <span class="post-category"><?php echo htmlspecialchars($post['category']); ?></span>
          <span class="post-dot">•</span>
          <span class="post-date"><?php echo date('d F Y', strtotime($post['date'])); ?></span>
        </div>
        <div class="post-tags">
          <?php
          $tags = array_map(function($tag) {
              return '<span class="tag-pill">' . htmlspecialchars($tag) . '</span>';
          }, $post['tags']);
          echo implode('', $tags);
          ?>
        </div>
      </article>

      <article class="post-body card reveal">
        <div class="post-content">
          <?php echo $post['content']; ?>
        </div>
      </article>
    </main>

<?php include 'includes/footer.php'; ?>

