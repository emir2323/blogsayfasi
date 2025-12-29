<?php
require_once 'config/config.php';
require_once 'config/admin_config.php';

// Projeleri yükle
$projects = readDataFile(PROJECTS_DATA_FILE);
if (empty($projects)) {
    // Varsayılan projeler - ilk yüklemede JSON'a kaydet
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

$pageTitle = 'Projelerim - Referans Çalışmalar';
$pageDescription = 'Geliştirdiğim web projeleri: Croffle Waffle & Coffee ve Psikoloji Merkezi.';
$pageUrl = SITE_URL . 'Projelerim';
$siteName = SITE_NAME;
$isBlogPage = false;
$showBlogLink = true;

include 'includes/header.php';
?>

    <main class="container section projects-page">
      <header class="projects-hero reveal">
        <div class="hero-badge">Portfolio</div>
        <h1>Projelerim</h1>
        <p class="subtitle">
          Son dönemde üzerinde çalıştığım, tasarım ve yazılımına katkı sağladığım
          sektörlerden seçilmiş projeler. Her biri farklı bir hikaye ve deneyim.
        </p>
      </header>

      <section class="projects-grid">
        <?php foreach ($projects as $project): ?>
        <article class="project-card reveal">
          <div class="project-image-wrapper">
            <div class="project-image-placeholder">
              <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" />
              <div class="project-image-label"><?php echo htmlspecialchars($project['title']); ?></div>
            </div>
            <div class="project-badge"><?php echo htmlspecialchars($project['badge']); ?></div>
          </div>
          
          <div class="project-content">
            <div class="project-header">
              <h2><?php echo htmlspecialchars($project['title']); ?></h2>
              <div class="project-links">
                <?php 
                $projectUrl = htmlspecialchars($project['url']);
                $isDisabled = ($projectUrl === '#' || empty($projectUrl));
                if (!$isDisabled): 
                ?>
                <a href="<?php echo $projectUrl; ?>" target="_blank" rel="noopener noreferrer" class="project-link" title="Siteyi Gör">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                  </svg>
                </a>
                <?php else: ?>
                <span class="project-link disabled" title="Site henüz yayında değil">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                  </svg>
                </span>
                <?php endif; ?>
              </div>
            </div>
            
            <p class="project-description">
              <?php echo htmlspecialchars($project['description']); ?>
            </p>
            
            <div class="project-details">
              <div class="project-detail-item">
                <div class="detail-icon">🎯</div>
                <div>
                  <strong>Rolüm</strong>
                  <span><?php echo htmlspecialchars($project['role']); ?></span>
                </div>
              </div>
              
              <div class="project-detail-item">
                <div class="detail-icon">✨</div>
                <div>
                  <strong>Öne Çıkanlar</strong>
                  <span><?php echo htmlspecialchars($project['highlights']); ?></span>
                </div>
              </div>
            </div>
            
            <div class="project-tech">
              <?php foreach ($project['tech'] as $tech): ?>
                <span class="tech-badge"><?php echo htmlspecialchars($tech); ?></span>
              <?php endforeach; ?>
            </div>
            
            <div class="project-actions">
              <?php 
              $projectUrl = htmlspecialchars($project['url']);
              $isDisabled = ($projectUrl === '#' || empty($projectUrl));
              if (!$isDisabled): 
              ?>
              <a href="<?php echo $projectUrl; ?>" target="_blank" rel="noopener noreferrer" class="btn primary project-btn">
                <span>Siteyi Gör</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                  <polyline points="15 3 21 3 21 9"></polyline>
                  <line x1="10" y1="14" x2="21" y2="3"></line>
                </svg>
              </a>
              <?php else: ?>
              <span class="btn primary project-btn disabled" style="opacity: 0.6; cursor: not-allowed; pointer-events: none;">
                <span>Yakında Yayında</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="10"></circle>
                  <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
              </span>
              <?php endif; ?>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      </section>

      <section class="section reveal projects-note">
        <div class="note-card">
          <div class="note-icon">🚀</div>
          <h2>Yeni Projeler Yolda</h2>
          <p>
            Üzerinde çalıştığım diğer web ve mobil projeleri de tamamlandıkça buraya ekliyor olacağım.
            Siz de markanız için benzer bir çözüm istiyorsanız iletişim bölümünden bana ulaşabilirsiniz.
          </p>
        </div>
      </section>
    </main>

<?php include 'includes/footer.php'; ?>


