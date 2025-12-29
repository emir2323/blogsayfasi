<?php
require_once 'config/config.php';

$pageTitle = 'KVKK Aydınlatma Metni';
$pageDescription = 'Kişisel Verilerin Korunması Kanunu kapsamında aydınlatma metni.';
$pageUrl = SITE_URL . 'KVKK-Aydinlatma-Metni';
$siteName = SITE_NAME;
$isBlogPage = false;
$showBlogLink = true;

include 'includes/header.php';
?>

    <main class="container section post-page">
      <article class="post-hero reveal">
        <a href="<?php echo SITE_URL; ?>Anasayfa" class="post-back-link">← Ana Sayfaya Dön</a>
        <div class="hero-badge">Yasal Bilgilendirme</div>
        <h1>KVKK Aydınlatma Metni</h1>
        <div class="post-meta">
          <span class="post-category">Yasal</span>
          <span>Son Güncelleme: <?php echo date('d F Y'); ?></span>
        </div>
      </article>

      <article class="card post-body">
        <div class="post-content">
          <p><strong>6698 sayılı Kişisel Verilerin Korunması Kanunu ("KVKK")</strong> uyarınca, kişisel verilerinizin işlenmesi hakkında sizleri bilgilendirmek isteriz.</p>

          <h2>1. Veri Sorumlusu</h2>
          <p>
            Kişisel verileriniz, <strong><?php echo SITE_NAME; ?></strong> tarafından veri sorumlusu sıfatıyla işlenmektedir.
          </p>
          <p>
            <strong>İletişim Bilgileri:</strong><br>
            E-posta: <?php echo SITE_EMAIL; ?><br>
            Telefon: <?php echo SITE_PHONE; ?>
          </p>

          <h2>2. İşlenen Kişisel Veriler</h2>
          <p>Aşağıdaki kişisel verileriniz işlenmektedir:</p>
          <ul>
            <li><strong>Kimlik Bilgileri:</strong> Ad, soyad</li>
            <li><strong>İletişim Bilgileri:</strong> E-posta adresi, telefon numarası</li>
            <li><strong>İşlem Güvenliği Bilgileri:</strong> IP adresi, çerez bilgileri</li>
            <li><strong>Müşteri İşlem Bilgileri:</strong> Talep ve mesaj içerikleri</li>
          </ul>

          <h2>3. Kişisel Verilerin İşlenme Amaçları</h2>
          <p>Kişisel verileriniz aşağıdaki amaçlarla işlenmektedir:</p>
          <ul>
            <li>Web sitesi hizmetlerinin sunulması ve yönetilmesi</li>
            <li>İletişim taleplerinizin karşılanması</li>
            <li>Teklif ve proje süreçlerinin yürütülmesi</li>
            <li>Yasal yükümlülüklerin yerine getirilmesi</li>
            <li>Web sitesi güvenliğinin sağlanması</li>
            <li>İstatistiksel analizlerin yapılması</li>
          </ul>

          <h2>4. Kişisel Verilerin İşlenme Hukuki Sebepleri</h2>
          <p>Kişisel verileriniz aşağıdaki hukuki sebeplere dayanarak işlenmektedir:</p>
          <ul>
            <li>KVKK madde 5/2-c: "Veri sorumlusunun hukuki yükümlülüğünü yerine getirebilmesi için zorunlu olması"</li>
            <li>KVKK madde 5/2-e: "İlgili kişinin temel hak ve özgürlüklerine zarar vermemek kaydıyla, veri sorumlusunun meşru menfaatleri için veri işlemenin zorunlu olması"</li>
            <li>KVKK madde 5/2-f: "Açık rıza"</li>
          </ul>

          <h2>5. Kişisel Verilerin Aktarılması</h2>
          <p>
            Kişisel verileriniz, yukarıda belirtilen amaçların gerçekleştirilmesi için yurt içinde ve yurt dışında aşağıdaki taraflara aktarılabilir:
          </p>
          <ul>
            <li>Web sitesi hosting ve sunucu hizmeti sağlayıcıları</li>
            <li>E-posta servis sağlayıcıları</li>
            <li>Analitik ve istatistik hizmeti sağlayıcıları</li>
            <li>Yasal yükümlülüklerin yerine getirilmesi için ilgili kamu kurum ve kuruluşları</li>
          </ul>

          <h2>6. Kişisel Verilerin Toplanma Yöntemi</h2>
          <p>
            Kişisel verileriniz, web sitesi üzerinden doldurduğunuz iletişim formları, e-posta gönderimleri ve otomatik olarak toplanan teknik veriler (çerezler, IP adresi vb.) aracılığıyla toplanmaktadır.
          </p>

          <h2>7. Kişisel Verilerin Saklama Süresi</h2>
          <p>
            Kişisel verileriniz, işlenme amaçlarının gerektirdiği süre boyunca ve yasal saklama sürelerine uygun olarak saklanmaktadır. Bu süre sona erdiğinde, kişisel verileriniz silinir, yok edilir veya anonim hale getirilir.
          </p>

          <h2>8. İlgili Kişinin Hakları</h2>
          <p>KVKK madde 11 uyarınca, aşağıdaki haklara sahipsiniz:</p>
          <ul>
            <li>Kişisel veri işlenip işlenmediğini öğrenme</li>
            <li>İşlenmişse buna ilişkin bilgi talep etme</li>
            <li>İşlenme amacını ve amacına uygun kullanılıp kullanılmadığını öğrenme</li>
            <li>Yurt içinde veya yurt dışında aktarıldığı üçüncü kişileri bilme</li>
            <li>Eksik veya yanlış işlenmişse düzeltilmesini isteme</li>
            <li>KVKK'da öngörülen şartlar çerçevesinde silinmesini veya yok edilmesini isteme</li>
            <li>Düzeltme, silme, yok edilme işlemlerinin, kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini isteme</li>
            <li>Münhasıran otomatik sistemler ile analiz edilmesi nedeniyle aleyhinize bir sonucun ortaya çıkmasına itiraz etme</li>
            <li>Kanuna aykırı olarak işlenmesi sebebiyle zarara uğramanız hâlinde zararın giderilmesini talep etme</li>
          </ul>

          <h2>9. Başvuru Hakkı</h2>
          <p>
            Kişisel verilerinizle ilgili haklarınızı kullanmak için yukarıda belirtilen iletişim bilgileri üzerinden başvuruda bulunabilirsiniz. Başvurunuz en geç 30 gün içinde sonuçlandırılacaktır.
          </p>
          <p>
            Başvurunuzun reddedilmesi, verilen cevabı yetersiz bulmanız veya süresinde başvurulara cevap verilmemesi hâlinde, KVKK madde 14 uyarınca Kişisel Verileri Koruma Kurulu'na şikayette bulunabilirsiniz.
          </p>

          <h2>10. Değişiklikler</h2>
          <p>
            Bu aydınlatma metni, yasal düzenlemelerdeki değişiklikler ve hizmetlerimizdeki güncellemeler nedeniyle güncellenebilir. Güncel versiyon her zaman bu sayfada yayınlanacaktır.
          </p>

          <p style="margin-top: 32px; padding-top: 24px; border-top: 2px solid var(--border);">
            <strong>Son Güncelleme:</strong> <?php echo date('d F Y'); ?>
          </p>
        </div>
      </article>
    </main>

<?php include 'includes/footer.php'; ?>

