# Portfölyo Web Sitesi - PHP Versiyonu

Bu proje, portfölyo web sitesinin PHP versiyonudur. HTML dosyaları PHP'ye dönüştürülmüş ve dinamik içerik yönetimi eklenmiştir.

## Özellikler

- ✅ PHP ile dinamik içerik yönetimi
- ✅ Ortak header ve footer yapısı (DRY prensibi)
- ✅ Blog sistemi (yazı listeleme ve detay sayfaları)
- ✅ İletişim formu (PHP ile işleme)
- ✅ Yapılandırılabilir site ayarları
- ✅ SEO dostu yapı

## Dosya Yapısı

```
/
├── index.php              # Ana sayfa
├── blog.php               # Blog listesi
├── blog-post.php          # Blog yazısı detay sayfası
├── contact.php            # İletişim formu işleme
├── .htaccess              # Apache yapılandırması
├── config/
│   ├── config.php        # Site genel ayarları
│   └── posts.php         # Blog yazıları veritabanı
├── includes/
│   ├── header.php        # Ortak header
│   └── footer.php        # Ortak footer
└── assets/                # CSS, JS, görseller (değişmedi)
```

## Nasıl Çalıştırılır

### Yöntem 1: PHP Built-in Sunucusu (En Kolay - Geliştirme İçin)

1. Terminal/Command Prompt'u açın
2. Proje klasörüne gidin:
   ```bash
   cd C:\Users\emir7\OneDrive\Masaüstü\blogsayfasi
   ```
3. PHP sunucusunu başlatın:
   ```bash
   php -S localhost:8000
   ```
4. Tarayıcınızda şu adresi açın:
   ```
   http://localhost:8000
   ```

### Yöntem 2: XAMPP (Önerilen - Windows İçin)

1. **XAMPP İndirin ve Kurun:**
   - https://www.apachefriends.org/ adresinden XAMPP'ı indirin
   - Kurulumu tamamlayın

2. **Projeyi Kopyalayın:**
   - Proje klasörünüzü `C:\xampp\htdocs\blogsayfasi` klasörüne kopyalayın
   - Veya mevcut klasörü `htdocs` içine taşıyın

3. **XAMPP'ı Başlatın:**
   - XAMPP Control Panel'i açın
   - Apache'yi başlatın (Start butonuna tıklayın)

4. **Tarayıcıda Açın:**
   ```
   http://localhost/blogsayfasi
   ```

### Yöntem 3: WAMP Server (Windows İçin Alternatif)

1. WAMP Server'ı indirip kurun: https://www.wampserver.com/
2. Projeyi `C:\wamp64\www\blogsayfasi` klasörüne kopyalayın
3. WAMP'ı başlatın
4. Tarayıcıda `http://localhost/blogsayfasi` adresini açın

### Yöntem 4: Canlı Sunucu (Hosting)

1. Dosyaları FTP ile hosting sunucunuza yükleyin
2. PHP 7.0+ destekleyen bir hosting kullanın
3. Domain adresinizden erişin

## Kurulum

1. Dosyaları web sunucunuza yükleyin (PHP 7.0+ gerekli)
2. `config/config.php` dosyasındaki ayarları düzenleyin:
   - `SITE_NAME`: Site adı
   - `SITE_EMAIL`: E-posta adresi
   - `SITE_PHONE`: Telefon numarası
   - `SITE_URL`: Site URL'i
   - `CONTACT_EMAIL`: İletişim formu alıcı e-posta

3. Blog yazılarını `config/posts.php` dosyasından ekleyebilir/düzenleyebilirsiniz.

## Kullanım

### Yeni Blog Yazısı Ekleme

`config/posts.php` dosyasındaki `$blogPosts` dizisine yeni bir eleman ekleyin:

```php
[
    'id' => 3,
    'title' => 'Yazı Başlığı',
    'slug' => 'yazi-basligi',
    'date' => '2025-02-08',
    'category' => 'Kategori',
    'tags' => ['etiket1', 'etiket2'],
    'excerpt' => 'Kısa açıklama',
    'content' => '<p>Yazı içeriği HTML formatında</p>'
]
```

### Site Ayarlarını Değiştirme

`config/config.php` dosyasından tüm site ayarlarını düzenleyebilirsiniz.

## Notlar

- İletişim formu için sunucunuzda `mail()` fonksiyonunun çalışması gerekir.
- Daha gelişmiş e-posta gönderimi için PHPMailer gibi kütüphaneler kullanılabilir.
- Blog yazıları şu anda dosya tabanlıdır. Gerçek bir projede veritabanı kullanılması önerilir.

## Gelecek Geliştirmeler

- [ ] Veritabanı entegrasyonu (MySQL/PostgreSQL)
- [ ] Admin paneli
- [ ] Yorum sistemi
- [ ] Arama özelliği
- [ ] Kategori ve etiket filtreleme
- [ ] RSS feed

