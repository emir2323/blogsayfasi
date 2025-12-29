<?php
require_once 'config/config.php';
require_once 'config/admin_config.php';

// Blog yazılarını yükle
require_once 'config/posts.php';
// config/posts.php'den gelen $blogPosts değişkeni (tüm yazılar - yeni yazılar dahil)

$jsonPosts = readDataFile(BLOG_DATA_FILE);

// Eğer JSON boşsa veya config'deki yazı sayısı JSON'dakinden fazlaysa, config'deki tüm yazıları kullan
if (empty($jsonPosts) || count($jsonPosts) < count($blogPosts)) {
    writeDataFile(BLOG_DATA_FILE, $blogPosts);
    // Config'deki tüm yazıları kullan (yeni yazılar dahil)
} else {
    // JSON'daki yazıları kullan, ama config'deki yeni yazıları da ekle
    $existingIds = array_column($jsonPosts, 'id');
    $newPostsAdded = false;
    
    foreach ($blogPosts as $configPost) {
        if (!in_array($configPost['id'], $existingIds)) {
            $jsonPosts[] = $configPost;
            $newPostsAdded = true;
        }
    }
    
    if ($newPostsAdded) {
        writeDataFile(BLOG_DATA_FILE, $jsonPosts);
        $blogPosts = $jsonPosts;
    } else {
        $blogPosts = $jsonPosts;
    }
}

$pageTitle = 'Blog - Yolculuğum ve Projelerim';
$pageDescription = 'Yazılım yolculuğum, projelerimin arka planı ve öğrendiklerimi paylaştığım blog.';
$pageUrl = SITE_URL . 'Blog';
$siteName = SITE_NAME;
$isBlogPage = true;
$showBlogLink = true;

include 'includes/header.php';
?>

    <main class="container section blog-page">
      <header class="blog-hero reveal">
        <div class="hero-badge">Blog</div>
        <h1>Yolculuğum ve Projelerim</h1>
        <p class="subtitle">
          Yazılıma nasıl başladığımdan, geliştirdiğim projelerin perde arkasına kadar; deneyimlerimi ve öğrendiklerimi
          burada paylaşıyorum.
        </p>
      </header>

      <section class="blog-section-header reveal">
        <h2 class="section-title">📝 Blog Yazılarım</h2>
        <p class="section-description">Teknoloji, projeler ve kişisel deneyimlerim hakkında yazılar</p>
      </section>

      <section class="blog-grid">
        <?php foreach ($blogPosts as $post): ?>
        <article class="blog-card card reveal">
          <div class="blog-card-header">
            <div class="blog-meta-top">
              <span class="blog-category"><?php echo htmlspecialchars($post['category']); ?></span>
              <span class="blog-date"><?php echo date('d F Y', strtotime($post['date'])); ?></span>
            </div>
            <h2>
              <a href="<?php echo SITE_URL; ?>blog/<?php echo $post['slug']; ?>">
                <?php echo htmlspecialchars($post['title']); ?>
              </a>
            </h2>
          </div>

          <p class="blog-excerpt">
            <?php echo htmlspecialchars($post['excerpt']); ?>
          </p>

          <div class="blog-tags">
            <?php
            $tags = array_map(function($tag) {
                return '<span class="tag-pill">' . htmlspecialchars($tag) . '</span>';
            }, $post['tags']);
            echo implode('', $tags);
            ?>
          </div>

          <div class="blog-card-footer">
            <a class="blog-read-more" href="blog-post.php?slug=<?php echo $post['slug']; ?>">
              <span>Yazıyı Oku</span>
              <span class="arrow">→</span>
            </a>
          </div>
        </article>
        <?php endforeach; ?>
      </section>
    </main>

<?php include 'includes/footer.php'; ?>

