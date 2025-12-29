<!DOCTYPE html>
<html lang="tr" data-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Kurumsal Web Geliştirme'; ?></title>
    <meta
      name="description"
      content="<?php echo isset($pageDescription) ? $pageDescription : 'Modern kurumsal web siteleri ve web geliştirme hizmetleri.'; ?>"
    />
    <link rel="icon" href="favicon.ico" />

    <!-- Open Graph -->
    <meta
      property="og:title"
      content="<?php echo isset($pageTitle) ? $pageTitle : 'Kurumsal Web Geliştirme'; ?>"
    />
    <meta
      property="og:description"
      content="<?php echo isset($pageDescription) ? $pageDescription : 'Kurumsal web siteleri ve web geliştirme hizmetleri.'; ?>"
    />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo isset($pageUrl) ? $pageUrl : '/'; ?>" />
    <meta property="og:image" content="<?php echo isset($pageUrl) ? $pageUrl : 'http://localhost/'; ?>assets/img/og-placeholder.png" />
    <meta name="theme-color" content="#0b0d12" />
    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="<?php echo isset($pageUrl) ? $pageUrl : 'http://localhost/'; ?>" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="preload" href="assets/css/styles.css" as="style" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <?php if (isset($pageSchema)): ?>
    <script type="application/ld+json">
      <?php echo json_encode($pageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
    </script>
    <?php else: ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Emir Yıldırım",
        "url": "http://localhost/",
        "logo": "<?php echo isset($pageUrl) ? $pageUrl : 'http://localhost/'; ?>assets/img/logo.png"
      }
    </script>
    <?php endif; ?>
  </head>
  <body>
    <!-- Top Bar -->
    <div class="top-bar">
      <div class="container top-bar-inner">
        <div class="top-bar-left">
          <a href="mailto:<?php echo SITE_EMAIL; ?>" class="top-bar-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <span><?php echo SITE_EMAIL; ?></span>
          </a>
          <a href="https://www.instagram.com/yldirim.2634/" target="_blank" rel="noopener" class="top-bar-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
            <span>@yldirim.2634</span>
          </a>
          <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>" class="top-bar-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <span><?php echo SITE_PHONE; ?></span>
          </a>
        </div>
        <div class="top-bar-right">
          <button class="lang-toggle-top" aria-label="Dili Değiştir" data-lang="tr">
            <span class="flag-icon">🇹🇷</span>
            <span>Türkçe</span>
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Main Navigation -->
    <header class="site-header">
      <div class="container header-inner">
        <div class="brand-logo">
          <a href="<?php echo SITE_URL; ?>" class="logo-link">
            <span class="brand-text"><?php echo isset($siteName) ? $siteName : 'Emir Yıldırım'; ?></span>
          </a>
        </div>
        <nav class="nav">
          <a href="<?php echo SITE_URL; ?>Anasayfa">Ana Sayfa</a>
          <a href="<?php echo SITE_URL; ?>Projelerim">Projelerim</a>
          <?php if (isset($showBlogLink) && $showBlogLink): ?>
          <a href="<?php echo SITE_URL; ?>Blog">Blog</a>
          <?php endif; ?>
        </nav>
        <div class="header-actions">
          <button class="menu-toggle" aria-label="Menüyü Aç/Kapat">☰</button>
        </div>
      </div>
    </header>

