<?php
// Blog yazıları veritabanı
// Gerçek bir projede bu veriler veritabanından gelecek

$blogPosts = [
    [
        'id' => 1,
        'title' => 'Yazılıma Nasıl Başladım?',
        'slug' => 'yazilima-nasil-basladim',
        'date' => '2025-01-15',
        'category' => 'Kişisel Yolculuk',
        'tags' => ['geçmişim', 'yazilim', 'kariyer'],
        'excerpt' => 'İlk satır koddan, kurumsal web projelerine uzanan yolculuğumun kısa hikayesi.',
        'content' => '<p>Yazılıma merakım, çocukluk dönemimde bilgisayarlarla tanışmamla başladı. Önce basit masaüstü programlar
        ve web siteleri ile denemeler yaparken, zamanla bu merak profesyonel bir uğraşa dönüştü.</p>
        <p>İlk yıllarda hazır sistemlerle (WordPress, Blogger vb.) oynayarak başladım, daha sonra HTML, CSS ve JavaScript
        öğrenerek kendi arayüzlerimi geliştirmeye başladım. Ardından PHP ve veritabanı tarafına geçerek dinamik projeler
        üretmeye başladım.</p>
        <p>Bugün geldiğim noktada; kurumsal web siteleri, mobil dostu arayüzler ve performans odaklı projeler geliştiriyorum.
        Bu blogda hem teknik deneyimlerimi hem de kariyer yolculuğumda öğrendiklerimi paylaşmayı hedefliyorum.</p>'
    ],
    [
        'id' => 2,
        'title' => 'Croffle Projesinde Neler Yaptım?',
        'slug' => 'croffle-projesi-detaylari',
        'date' => '2025-02-01',
        'category' => 'Projeler',
        'tags' => ['croffle', 'frontend', 'kurumsal-site'],
        'excerpt' => 'Croffle Waffle & Coffee için geliştirdiğim web sitesinin tasarım ve teknik detayları.',
        'content' => '<p><strong>Croffle Waffle &amp; Coffee</strong>, Kore sokaklarından gelen lezzet Croffleı Türkiye\'ye taşıyan
        modern bir marka. Projenin amacı; hem markayı tanıtmak hem de franchise başvurularını teşvik eden güçlü bir vitrin
        oluşturmaktı.</p>
        <p>Site tasarımında; <em>mobil uyumluluk</em>, <em>ürün görsellerinin öne çıkması</em> ve <em>franchise başvuru çağrıları</em>
        ön planda tutuldu. Menüler, öne çıkan ürünler ve iletişim alanları kullanıcıyı yormayacak şekilde sade ama dikkat çekici
        bir düzenle yerleştirildi.</p>
        <p>Teknik tarafta performans, SEO uyumluluğu ve hızlı açılış süreleri için kod yapısını sade tuttum. CSS animasyonlar ve
        yumuşak geçişlerle markanın enerjisini hissettiren bir deneyim hedefledim.</p>'
    ],
    [
        'id' => 3,
        'title' => 'Psikoloji Merkezi Projesi: Güven Veren Bir Arayüz',
        'slug' => 'psikoloji-merkezi-projesi',
        'date' => '2025-02-10',
        'category' => 'Projeler',
        'tags' => ['psikoloji', 'kurumsal-site', 'ui-ux'],
        'excerpt' => 'Psikoloji alanında hizmet veren bir merkez için, güven ve sakinlik hissi veren bir web arayüzü tasarladım.',
        'content' => '<p><strong>Psikoloji Merkezi</strong> projesinde odak noktam; kullanıcıya ilk anda güven veren, sade ve
        okunabilir bir arayüz tasarlamaktı. Özellikle terapi türleri, uzmanlar ve randevu süreçlerinin net bir şekilde anlatılması
        gerekiyordu.</p>
        <p>Ana sayfada; ziyaretçiyi karşılayan güçlü bir başlık, kısa bir açıklama ve hemen altında randevu butonları yer alıyor.
        Ardından terapi çeşitleri, süreç adımları ve sık sorulan sorular bölümüyle kullanıcı, aradığı tüm bilgileri adım adım
        bulabiliyor.</p>
        <p>Tasarım dilinde; yumuşak renkler, okunaklı tipografi ve boşluk kullanımıyla yoğun bilgi içeren bir sayfayı,
        kullanıcıyı yormadan gezilebilir hale getirdim. Teknik olarak da responsive grid yapısı ve performans odaklı kodlama
        tercih ettim.</p>'
    ],
    [
        'id' => 4,
        'title' => 'Yapay Zeka ile Kod Yazmak: Geleceğin Geliştiricisi',
        'slug' => 'yapay-zeka-ile-kod-yazmak',
        'date' => '2025-02-20',
        'category' => 'Teknoloji',
        'tags' => ['yapay-zeka', 'ai', 'gelecek', 'geliştirme'],
        'excerpt' => 'Yapay zeka destekli kod yazma araçlarının geliştiricilerin iş akışını nasıl dönüştürdüğünü ve bu teknolojinin geleceğini keşfedin.',
        'content' => '<p>Yapay zeka teknolojileri, yazılım geliştirme dünyasında devrim yaratıyor. <strong>AI destekli kod editörleri</strong> ve <strong>otomatik kod üretim araçları</strong>, geliştiricilerin üretkenliğini önemli ölçüde artırıyor.</p>
        <p>Bu araçlar sayesinde; rutin kod tekrarlarından kurtuluyor, daha karmaşık problemlere odaklanabiliyor ve proje sürelerini kısaltabiliyoruz. Ancak burada önemli olan, AI\'nın bir yardımcı olarak kullanılması ve geliştiricinin yaratıcılığının ön planda tutulması.</p>
        <p>Deneyimlerime göre; yapay zeka araçları en çok <em>prototipleme</em>, <em>test yazma</em> ve <em>dokümantasyon</em> konularında etkili. Ancak mimari kararlar ve kullanıcı deneyimi tasarımı gibi alanlarda hala insan zekası ve yaratıcılığı gerekiyor.</p>
        <p>Gelecekte, AI destekli geliştirme araçlarının daha da gelişeceğini ve yazılım geliştirme süreçlerinin daha verimli hale geleceğini düşünüyorum. Bu teknolojiyi doğru kullanmak, geliştiriciler için büyük bir avantaj sağlayacak.</p>'
    ],
    [
        'id' => 5,
        'title' => 'Cursor: AI Destekli Kod Editörü Deneyimim',
        'slug' => 'cursor-ai-kod-editoru',
        'date' => '2025-02-25',
        'category' => 'Araçlar',
        'tags' => ['cursor', 'ai', 'editor', 'verimlilik'],
        'excerpt' => 'Cursor editörünü kullanarak kod yazma deneyimim ve bu AI destekli aracın geliştirme sürecime katkıları.',
        'content' => '<p><strong>Cursor</strong>, yapay zeka destekli bir kod editörü olarak geliştirme sürecimde büyük bir fark yarattı. Bu araç, kod yazarken <em>anlık öneriler</em> sunuyor ve <em>bağlam odaklı yardım</em> sağlıyor.</p>
        <p>Cursor\'ın en sevdiğim özellikleri arasında; <strong>doğal dil ile kod yazma</strong>, <strong>otomatik kod tamamlama</strong> ve <strong>hata düzeltme önerileri</strong> var. Özellikle yeni bir teknoloji öğrenirken veya karmaşık bir fonksiyon yazarken çok yardımcı oluyor.</p>
        <p>Ancak dikkat etmem gereken bir nokta var: Cursor\'ın önerilerini körü körüne kabul etmek yerine, her zaman <em>kod kalitesini</em> ve <em>güvenliği</em> kontrol etmek gerekiyor. AI araçları mükemmel değil ve bazen hatalı öneriler sunabiliyor.</p>
        <p>Genel olarak, Cursor gibi AI destekli editörler, geliştiricilerin <strong>daha hızlı</strong> ve <strong>daha verimli</strong> çalışmasına yardımcı oluyor. Özellikle tekrarlayan görevlerde ve prototipleme aşamalarında büyük zaman tasarrufu sağlıyor.</p>'
    ],
    [
        'id' => 6,
        'title' => 'PHP ile Modern Web Geliştirme: 2025 Trendleri',
        'slug' => 'php-modern-web-gelistirme-2025',
        'date' => '2025-03-01',
        'category' => 'Teknoloji',
        'tags' => ['php', 'web-geliştirme', 'backend', 'trendler'],
        'excerpt' => 'PHP\'nin 2025 yılındaki güncel kullanım alanları, modern framework\'ler ve en iyi uygulamalar hakkında bilgiler.',
        'content' => '<p><strong>PHP</strong>, web geliştirme dünyasında hala güçlü bir konumda. 2025 yılında PHP 8.x sürümleri ile birlikte <em>performans</em> ve <em>güvenlik</em> açısından önemli iyileştirmeler getirdi.</p>
        <p>Modern PHP geliştirmede; <strong>Composer</strong> paket yöneticisi, <strong>PSR standartları</strong> ve <strong>type declarations</strong> gibi özellikler artık standart hale geldi. Bu özellikler, kod kalitesini ve bakım kolaylığını önemli ölçüde artırıyor.</p>
        <p>Framework seçiminde; <em>Laravel</em> hala en popüler seçeneklerden biri. Ancak <em>Slim</em> gibi mikro framework\'ler de küçük projeler için harika alternatifler sunuyor. Projenin ihtiyacına göre doğru framework\'ü seçmek önemli.</p>
        <p>PHP\'nin geleceği için; <strong>async/await</strong> desteği, <strong>JIT compiler</strong> optimizasyonları ve <strong>daha iyi type system</strong> gibi özellikler geliştiriliyor. Bu gelişmeler, PHP\'yi modern web geliştirme için daha da güçlü bir seçenek haline getiriyor.</p>'
    ],
    [
        'id' => 7,
        'title' => 'Cursor ve PHP: AI Destekli Backend Geliştirme',
        'slug' => 'cursor-php-ai-backend',
        'date' => '2025-03-05',
        'category' => 'Araçlar',
        'tags' => ['cursor', 'php', 'ai', 'backend', 'verimlilik'],
        'excerpt' => 'Cursor editörünü PHP projelerinde kullanarak backend geliştirme sürecini nasıl hızlandırdığımı ve pratik ipuçlarını paylaşıyorum.',
        'content' => '<p><strong>Cursor</strong> ile PHP geliştirme yapmak, özellikle <em>CRUD işlemleri</em>, <em>API endpoint\'leri</em> ve <em>veritabanı sorguları</em> yazarken büyük zaman tasarrufu sağlıyor.</p>
        <p>Cursor\'ın PHP için en faydalı özellikleri; <strong>otomatik class oluşturma</strong>, <strong>PDO sorgu önerileri</strong> ve <strong>hata yakalama blokları</strong> yazma konusunda. Bu özellikler, tekrarlayan kod yazma işini önemli ölçüde azaltıyor.</p>
        <p>Ancak dikkat etmem gereken noktalar var: Cursor bazen <em>güvenlik açıkları</em> içeren kod önerileri sunabiliyor. Bu yüzden her zaman <strong>SQL injection</strong>, <strong>XSS</strong> ve <strong>CSRF</strong> gibi güvenlik konularını kontrol etmek gerekiyor.</p>
        <p>Pratik bir örnek: Bir REST API endpoint\'i yazarken, Cursor\'a "Create a user registration endpoint with validation" yazdığımda, neredeyse tam bir fonksiyon önerisi alıyorum. Sonrasında sadece <em>güvenlik kontrolleri</em> ve <em>özel iş mantığı</em> eklemem yeterli oluyor.</p>
        <p>Sonuç olarak, Cursor PHP geliştirmede <strong>verimliliği artıran</strong> bir araç, ancak <em>kritik düşünme</em> ve <em>güvenlik kontrolü</em> hala geliştiricinin sorumluluğunda.</p>'
    ],
    [
        'id' => 8,
        'title' => 'Yapay Zeka ve Yazılım Geliştirme: Dengeyi Bulmak',
        'slug' => 'yapay-zeka-yazilim-gelistirme-denge',
        'date' => '2025-03-10',
        'category' => 'Kişisel Yolculuk',
        'tags' => ['yapay-zeka', 'gelecek', 'kariyer', 'düşünceler'],
        'excerpt' => 'AI araçlarının yazılım geliştirme sürecine entegrasyonu ve geliştiricilerin bu teknolojiyle nasıl bir denge kurması gerektiği üzerine düşüncelerim.',
        'content' => '<p>Yapay zeka araçları, yazılım geliştirme dünyasını hızla dönüştürüyor. <strong>GitHub Copilot</strong>, <strong>Cursor</strong>, <strong>ChatGPT</strong> gibi araçlar, geliştiricilerin günlük iş akışının bir parçası haline geldi.</p>
        <p>Bu araçların <em>avantajları</em> açık: Daha hızlı kod yazma, daha az hata ve daha iyi dokümantasyon. Ancak <strong>dezavantajları</strong> da var: Bağımlılık riski, kod kalitesi endişeleri ve öğrenme sürecinin yavaşlaması.</p>
        <p>Bence önemli olan, AI araçlarını <em>akıllıca kullanmak</em>. Bu araçlar, geliştiricinin yerini almak yerine, <strong>güçlendirmek</strong> için tasarlandı. Temel programlama kavramlarını anlamak ve problem çözme yeteneklerini geliştirmek hala kritik.</p>
        <p>Gelecekte, AI destekli geliştirme araçlarının daha da gelişeceğini ve <em>daha akıllı</em> hale geleceğini düşünüyorum. Ancak bu, geliştiricilerin değerini azaltmayacak; sadece <strong>farklı becerilere</strong> odaklanmalarına neden olacak.</p>
        <p>Sonuç olarak, AI araçları ile çalışırken <em>dengeyi bulmak</em> önemli. Bu araçları kullanarak verimliliği artırmalı, ancak <strong>temel becerileri</strong> ve <strong>kritik düşünmeyi</strong> asla ihmal etmemeliyiz.</p>'
    ]
];

// Slug'a göre yazı bulma fonksiyonu
function getPostBySlug($slug) {
    global $blogPosts;
    foreach ($blogPosts as $post) {
        if ($post['slug'] === $slug) {
            return $post;
        }
    }
    return null;
}

// ID'ye göre yazı bulma fonksiyonu
function getPostById($id) {
    global $blogPosts;
    foreach ($blogPosts as $post) {
        if ($post['id'] === (int)$id) {
            return $post;
        }
    }
    return null;
}
?>

