<?php
require_once 'config/config.php';

$pageTitle = 'Çerez Politikası';
$pageDescription = 'Web sitemizde kullanılan çerezler ve çerez politikası hakkında bilgilendirme.';
$pageUrl = SITE_URL . 'Cerez-Politikasi';
$siteName = SITE_NAME;
$isBlogPage = false;
$showBlogLink = true;

include 'includes/header.php';
?>

    <main class="container section post-page">
      <article class="post-hero reveal">
        <a href="<?php echo SITE_URL; ?>Anasayfa" class="post-back-link">← Ana Sayfaya Dön</a>
        <div class="hero-badge">Yasal Bilgilendirme</div>
        <h1>Çerez Politikası</h1>
        <div class="post-meta">
          <span class="post-category">Yasal</span>
          <span>Son Güncelleme: <?php echo date('d F Y'); ?></span>
        </div>
      </article>

      <article class="card post-body">
        <div class="post-content">
          <p>
            Bu Çerez Politikası, <strong><?php echo SITE_NAME; ?></strong> web sitesi tarafından kullanılan çerezler hakkında bilgi vermek amacıyla hazırlanmıştır. Web sitemizi kullanarak, bu politikada belirtilen çerezlerin kullanımını kabul etmiş sayılırsınız.
          </p>

          <h2>1. Çerez Nedir?</h2>
          <p>
            Çerezler (cookies), web sitelerini ziyaret ettiğinizde tarayıcınız tarafından cihazınıza kaydedilen küçük metin dosyalarıdır. Çerezler, web sitesinin daha iyi çalışmasını sağlar ve kullanıcı deneyimini iyileştirir.
          </p>

          <h2>2. Çerezlerin Kullanım Amacı</h2>
          <p>Web sitemizde çerezler aşağıdaki amaçlarla kullanılmaktadır:</p>
          <ul>
            <li><strong>Zorunlu Çerezler:</strong> Web sitesinin temel işlevlerinin çalışması için gerekli çerezler</li>
            <li><strong>Performans Çerezleri:</strong> Web sitesinin performansını analiz etmek ve iyileştirmek için kullanılan çerezler</li>
            <li><strong>İşlevsellik Çerezleri:</strong> Kullanıcı tercihlerini hatırlamak ve kişiselleştirilmiş deneyim sunmak için kullanılan çerezler</li>
            <li><strong>Analitik Çerezler:</strong> Web sitesi kullanım istatistiklerini toplamak için kullanılan çerezler</li>
          </ul>

          <h2>3. Kullanılan Çerez Türleri</h2>
          
          <h3>3.1. Zorunlu Çerezler</h3>
          <p>
            Bu çerezler, web sitesinin temel işlevlerinin çalışması için zorunludur ve devre dışı bırakılamaz. Bu çerezler genellikle yalnızca sizin yaptığınız işlemlere yanıt olarak ayarlanır.
          </p>
          <ul>
            <li><strong>Oturum Çerezleri:</strong> Web sitesi oturumunuzu yönetmek için kullanılır</li>
            <li><strong>Güvenlik Çerezleri:</strong> Web sitesinin güvenliğini sağlamak için kullanılır</li>
          </ul>

          <h3>3.2. Performans ve Analitik Çerezler</h3>
          <p>
            Bu çerezler, web sitesinin nasıl kullanıldığını anlamamıza yardımcı olur. Bu bilgiler, web sitesini iyileştirmek ve kullanıcı deneyimini geliştirmek için kullanılır.
          </p>
          <ul>
            <li><strong>Google Analytics:</strong> Web sitesi trafiğini ve kullanıcı davranışlarını analiz etmek için kullanılır (eğer kullanılıyorsa)</li>
            <li><strong>Performans Metrikleri:</strong> Sayfa yükleme süreleri ve hata oranlarını ölçmek için kullanılır</li>
          </ul>

          <h3>3.3. İşlevsellik Çerezleri</h3>
          <p>
            Bu çerezler, web sitesinin gelişmiş işlevsellik ve kişiselleştirme özelliklerini sağlar. Tercihlerinizi hatırlamak ve size daha iyi bir deneyim sunmak için kullanılır.
          </p>
          <ul>
            <li><strong>Dil Tercihi:</strong> Seçtiğiniz dil tercihini hatırlar</li>
            <li><strong>Kullanıcı Tercihleri:</strong> Tema, görünüm ve diğer kullanıcı ayarlarını saklar</li>
          </ul>

          <h2>4. Çerezlerin Saklama Süresi</h2>
          <p>Çerezler, kullanım amaçlarına göre farklı sürelerde saklanır:</p>
          <ul>
            <li><strong>Oturum Çerezleri:</strong> Tarayıcı kapatıldığında otomatik olarak silinir</li>
            <li><strong>Kalıcı Çerezler:</strong> Belirli bir süre boyunca (genellikle 1 yıl) cihazınızda kalır</li>
          </ul>

          <h2>5. Üçüncü Taraf Çerezler</h2>
          <p>
            Web sitemizde, bazı hizmetleri sağlamak için üçüncü taraf çerezler kullanılabilir. Bu çerezler, ilgili üçüncü tarafın gizlilik politikasına tabidir.
          </p>
          <p><strong>Kullanılan Üçüncü Taraf Hizmetler:</strong></p>
          <ul>
            <li>Google Analytics (eğer kullanılıyorsa)</li>
            <li>Hosting ve sunucu hizmet sağlayıcıları</li>
          </ul>

          <h2>6. Çerezleri Yönetme</h2>
          <p>
            Çerezleri yönetmek ve kontrol etmek için tarayıcı ayarlarınızı kullanabilirsiniz. Çoğu tarayıcı, çerezleri otomatik olarak kabul eder, ancak isterseniz çerezleri reddetme veya sadece belirli çerezleri kabul etme seçeneğiniz vardır.
          </p>
          <p><strong>Popüler Tarayıcılar için Çerez Ayarları:</strong></p>
          <ul>
            <li><strong>Google Chrome:</strong> Ayarlar > Gizlilik ve Güvenlik > Çerezler ve diğer site verileri</li>
            <li><strong>Mozilla Firefox:</strong> Seçenekler > Gizlilik ve Güvenlik > Çerezler ve Site Verileri</li>
            <li><strong>Safari:</strong> Tercihler > Gizlilik > Çerezler ve Web Sitesi Verileri</li>
            <li><strong>Microsoft Edge:</strong> Ayarlar > Gizlilik, arama ve hizmetler > Çerezler ve site izinleri</li>
          </ul>
          <p>
            <strong>Not:</strong> Çerezleri devre dışı bırakmanız durumunda, web sitesinin bazı özellikleri düzgün çalışmayabilir.
          </p>

          <h2>7. Çerez Onayı</h2>
          <p>
            Web sitemizi ilk ziyaret ettiğinizde, çerez kullanımı hakkında bir bildirim görürsünüz. Bu bildirimi kabul ederek, çerezlerin kullanımını onaylamış olursunuz. Çerez tercihlerinizi istediğiniz zaman değiştirebilirsiniz.
          </p>

          <h2>8. Güncellemeler</h2>
          <p>
            Bu Çerez Politikası, yasal düzenlemelerdeki değişiklikler ve web sitesindeki güncellemeler nedeniyle zaman zaman güncellenebilir. Güncel versiyon her zaman bu sayfada yayınlanacaktır.
          </p>

          <h2>9. İletişim</h2>
          <p>
            Çerezler hakkında sorularınız veya endişeleriniz varsa, lütfen bizimle iletişime geçin:
          </p>
          <p>
            <strong>E-posta:</strong> <?php echo SITE_EMAIL; ?><br>
            <strong>Telefon:</strong> <?php echo SITE_PHONE; ?>
          </p>

          <p style="margin-top: 32px; padding-top: 24px; border-top: 2px solid var(--border);">
            <strong>Son Güncelleme:</strong> <?php echo date('d F Y'); ?>
          </p>
        </div>
      </article>
    </main>

<?php include 'includes/footer.php'; ?>

