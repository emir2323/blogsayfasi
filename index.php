<?php
require_once 'config/config.php';
require_once 'config/admin_config.php';

// Fiyatları yükle
$pricing = readDataFile(PRICING_DATA_FILE);
if (empty($pricing)) {
    $pricing = [
        'starter' => ['old_price' => '4900', 'new_price' => '3500', 'discount' => '29'],
        'professional' => ['old_price' => '9900', 'new_price' => '8000', 'discount' => '19'],
        'custom' => ['text' => 'Teklif']
    ];
}

$pageTitle = 'Kurumsal Web Geliştirme';
$pageDescription = 'Modern kurumsal web siteleri ve web geliştirme hizmetleri.';
$pageUrl = SITE_URL;
$siteName = SITE_NAME;
$isBlogPage = false;
$showBlogLink = true;

include 'includes/header.php';
?>

    <main id="anasayfa" class="home-page">
      <section class="hero container">
        <div class="hero-content">
          <div class="home-hero-badge">Freelance Web &amp; Mobil Geliştirici</div>
          <h1 id="hero-title">
            Merhaba, ben
            <span class="accent" id="role-rotator"
              >Dijital Çözüm Ortağınız</span
            >
            <?php echo SITE_NAME; ?>
          </h1>
          <p class="subtitle" id="hero-subtitle">
            <strong>Web Tasarım</strong> • <strong>Frontend Geliştirme</strong> • <strong>SEO</strong> • <strong>WordPress</strong>
          </p>
          <div class="expertise-tags">
            <span class="expertise-tag">Web Tasarım</span>
            <span class="expertise-tag">Frontend Geliştirme</span>
            <span class="expertise-tag">SEO</span>
            <span class="expertise-tag">WordPress</span>
          </div>
          <div class="intro-text">
            <p>Hoş geldiniz!</p>
            <p>
              Burada sizlere, modern ve kullanıcı dostu kurumsal web siteleri
              projelerimi sunuyorum.
            </p>
            <p>
              Her projemde; estetik, güvenilirlik ve performansı ön planda
              tutarak işletmenize değer katmayı hedefliyorum.
            </p>
            <p>
              Geliştirdiğim çözümler; markanızı dijital dünyada güçlü bir
              şekilde temsil etmeniz için tasarlandı.
            </p>
            <p>
              Ayrıca, sunduğum hizmetlerin fiyat detaylarını şeffaf bir şekilde
              inceleyebilirsiniz.
            </p>
            <p>Siz hayal edin, ben teknolojiyi sizin için şekillendireyim.</p>
            <p>Dijital yolculuğunuza birlikte güç katmak için buradayım.</p>
          </div>
          <div class="cta-group">
            <a
              class="btn primary btn-whatsapp"
              id="cta-whatsapp"
              data-phone="<?php echo str_replace(' ', '', SITE_PHONE); ?>"
              href="#"
              >
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="currentColor"/>
              </svg>
              Whatsapp'tan Yaz
            </a>
            <a
              class="btn outline btn-quote"
              href="mailto:<?php echo SITE_EMAIL; ?>?subject=Teklif%20Talebi"
              id="cta-quote"
              >
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
              </svg>
              Teklif Al
            </a>
          </div>
          <a href="<?php echo SITE_URL; ?>Projelerim" class="hero-link">Projelerimi gör</a>
          
          <div class="social-links-section">
            <div class="social-links">
              <a href="<?php echo LINKEDIN_URL; ?>" target="_blank" rel="noopener noreferrer" class="social-link linkedin" title="LinkedIn Profilim">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
                <span>LinkedIn</span>
              </a>
              
              <a href="<?php echo GITHUB_URL; ?>" target="_blank" rel="noopener noreferrer" class="social-link github" title="GitHub Profilim">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
                <span>GitHub</span>
              </a>
              
              <a href="<?php echo CV_FILE; ?>" download class="social-link cv" title="CV İndir">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                  <polyline points="7 10 12 15 17 10"></polyline>
                  <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                <span>CV İndir</span>
              </a>
            </div>
          </div>
        </div>
        <div class="hero-aside">
          <div class="hero-photo">
            <img
              src="assets/img/profile.jpg"
              alt="<?php echo SITE_NAME; ?>"
              loading="lazy"
            />
          </div>
        </div>
      </section>

      <section id="fiyatlar" class="section container home-section reveal">
        <h2 id="pricing-title">Fiyatlar</h2>
        <div class="pricing">
          <article class="price-card">
            <h3>Başlangıç</h3>
            <div class="price-wrapper">
              <p class="price-old">₺<?php echo number_format($pricing['starter']['old_price'], 0, ',', '.'); ?></p>
              <p class="price">₺<?php echo number_format($pricing['starter']['new_price'], 0, ',', '.'); ?></p>
              <span class="discount-badge">%<?php echo htmlspecialchars($pricing['starter']['discount']); ?> İndirim</span>
            </div>
            <ul>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                Tek sayfa site
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                Mobil uyumlu
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                Temel SEO
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                Hızlı teslim (1 hafta)
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                Standart güvenlik ayarları
              </li>
            </ul>
            <a class="btn primary" href="#iletisim">Başla</a>
          </article>
          <article class="price-card highlight">
            <h3>Profesyonel</h3>
            <div class="price-wrapper">
              <p class="price-old">₺<?php echo number_format($pricing['professional']['old_price'], 0, ',', '.'); ?></p>
              <p class="price">₺<?php echo number_format($pricing['professional']['new_price'], 0, ',', '.'); ?></p>
              <span class="discount-badge">%<?php echo htmlspecialchars($pricing['professional']['discount']); ?> İndirim</span>
            </div>
            <ul>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                Çok sayfalı site
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                Hız optimizasyonu (Core Web Vitals)
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                Gelişmiş SEO ve şema işaretlemeleri
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                Blog/İçerik altyapısı
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                İletişim formu ve WhatsApp entegrasyonu
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                Temel yönetim paneli
              </li>
            </ul>
            <a class="btn primary" href="#iletisim">Seç</a>
          </article>
          <article class="price-card">
            <h3>Özel</h3>
            <p class="price"><?php echo htmlspecialchars($pricing['custom']['text']); ?></p>
            <ul>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                Özel tasarım ve marka kiti
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22v-5"></path><path d="M9 8V2"></path><path d="M15 8V2"></path><path d="M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"></path></svg>
                3. parti entegrasyonlar (Ödeme, CRM vb.)
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                Ölçeklenebilir altyapı ve CDN
              </li>
              <li>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line></svg>
                Öncelikli destek ve bakım
              </li>
            </ul>
            <a class="btn primary" href="#iletisim">Teklif Al</a>
          </article>
        </div>
      </section>

      <section id="sss" class="section container home-section reveal">
        <h2 id="faq-title">Sık Sorulan Sorular</h2>
        <div class="accordion">
          <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false">
              Teslim süresi nedir?
            </button>
            <div class="accordion-panel">
              <p>Proje kapsamına göre 1-4 hafta arasında değişir.</p>
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false">
              Ödeme nasıl yapılır?
            </button>
            <div class="accordion-panel">
              <p>Başlangıçta %50, teslimde kalan tutar alınır.</p>
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false">
              Destek veriyor musunuz?
            </button>
            <div class="accordion-panel">
              <p>Yayın sonrası belirlenen süre boyunca destek sağlanır.</p>
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false">
              Bakım ve güncelleme hizmeti sunuyor musunuz?
            </button>
            <div class="accordion-panel">
              <p>
                Evet, düzenli bakım, güvenlik güncellemeleri ve yeni özellik
                geliştirmeleri sunuyoruz.
              </p>
            </div>
          </div>
        </div>
      </section>
      <section id="hizmetler" class="section container home-section reveal">
        <div class="section-header">
          <h2 id="services-title">Profesyonel Hizmetlerim</h2>
          <p class="section-subtitle">Modern teknolojilerle işletmenizin dijital dünyada güçlü bir şekilde varlık göstermesine yardımcı oluyorum.</p>
        </div>
        <div class="cards service-cards">
          <article class="card service-card reveal">
            <div class="service-icon">🌐</div>
            <h3>Kurumsal Web Sitesi Geliştirme</h3>
            <p>Hızlı, güvenilir ve SEO dostu kurumsal web çözümleri. Modern tasarım ve kullanıcı deneyimi odaklı yaklaşım.</p>
            <div class="service-features">
              <span class="feature-tag">Responsive</span>
              <span class="feature-tag">SEO</span>
              <span class="feature-tag">Hızlı</span>
            </div>
          </article>
          <article class="card service-card reveal">
            <div class="service-icon">⚡</div>
            <h3>Frontend Geliştirme</h3>
            <p>
              Performans odaklı, animasyonlu ve kullanıcı dostu arayüzler. React, Vue ve vanilla JavaScript ile.
            </p>
            <div class="service-features">
              <span class="feature-tag">React</span>
              <span class="feature-tag">Vue</span>
              <span class="feature-tag">JavaScript</span>
            </div>
          </article>
          <article class="card service-card reveal">
            <div class="service-icon">🔧</div>
            <h3>WordPress Geliştirme</h3>
            <p>
              Özel temalar, eklentiler ve WordPress tabanlı web siteleri. Kolay yönetim paneli ve güçlü içerik yönetimi.
            </p>
            <div class="service-features">
              <span class="feature-tag">WordPress</span>
              <span class="feature-tag">Özel Tema</span>
              <span class="feature-tag">Eklenti</span>
            </div>
          </article>
        </div>
      </section>

      <section id="surec" class="section container home-section reveal">
        <div class="section-header">
          <h2>Çalışma Sürecim</h2>
          <p class="section-subtitle">Projenizi adım adım birlikte ilerletiyoruz. Şeffaf süreç, zamanında teslimat.</p>
        </div>
        <div class="process-steps">
          <div class="process-step reveal">
            <div class="step-number">01</div>
            <div class="step-icon">💬</div>
            <h3>Ön Görüşme</h3>
            <p>Projenizi ve neler yapmak istediğinizi detaylı şekilde anlatın. İhtiyaçlarınızı dinler, hedefleri netleştiririz.</p>
          </div>
          <div class="process-step reveal">
            <div class="step-number">02</div>
            <div class="step-icon">📋</div>
            <h3>Planlama</h3>
            <p>Projenizi beraber değerlendirelim, beraber tartışalım. Yol haritasını ve takvimi belirleriz.</p>
          </div>
          <div class="process-step reveal">
            <div class="step-number">03</div>
            <div class="step-icon">💳</div>
            <h3>Ödeme & Başlangıç</h3>
            <p>Seçiminizi yaptığınıza göre artık ödeme aşamasında gelebiliriz. İş öncesi %50 ödeme alınır.</p>
          </div>
          <div class="process-step reveal">
            <div class="step-number">04</div>
            <div class="step-icon">✅</div>
            <h3>Bitiş Noktası</h3>
            <p>Revizelerinizi alırım, tamamladıktan sonra kalan ödemeyi talep ederim, ardından teslim ederim.</p>
          </div>
        </div>
      </section>

      <section id="iletisim" class="section container contact home-section reveal">
        <h2 id="contact-title">İletişim</h2>
        <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
        <div class="alert alert-success">
          <strong>Başarılı!</strong> 
          <?php 
          $isLocalhost = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || 
                          strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);
          if ($isLocalhost): 
          ?>
            Mesajınız alındı ve contact_log.txt dosyasına kaydedildi. (Localhost'ta e-posta gönderimi çalışmaz, canlı sunucuda e-posta gönderilecektir.)
          <?php else: ?>
            Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-error">
          <strong>Hata!</strong> <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
        <?php endif; ?>
        <div class="contact-grid">
          <div class="contact-cta">
            <div class="contact-cta-header">
              <h3>Hızlı İletişim</h3>
              <p>Size en uygun yöntemle bana ulaşabilirsiniz</p>
            </div>
            <div class="contact-buttons">
              <a
                class="btn contact-whatsapp-btn"
                id="contact-whatsapp"
                data-phone="<?php echo str_replace(' ', '', SITE_PHONE); ?>"
                href="#"
                >
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="currentColor"/>
                </svg>
                WhatsApp ile Yaz
              </a>
              <a class="btn contact-email-btn" href="mailto:<?php echo SITE_EMAIL; ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                E-posta Gönder
              </a>
            </div>
          </div>
          <form
            class="contact-form"
            action="contact.php"
            method="POST"
          >
            <label
              ><span id="contact-name-label">Ad Soyad</span>
              <input type="text" name="ad" required />
            </label>
            <label
              ><span id="contact-email-label">E-posta</span>
              <input type="email" name="eposta" required />
            </label>
            <label
              ><span id="contact-message-label">Mesajınız</span>
              <textarea name="mesaj" rows="4" required></textarea>
            </label>
            <button type="submit" class="btn primary" id="contact-send">
              Gönder
            </button>
          </form>
        </div>
      </section>
    </main>

<?php include 'includes/footer.php'; ?>

