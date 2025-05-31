# MVC E-Ticaret Projesi

Bu proje, alışveriş sepeti sistemi, kullanıcı kimlik doğrulama ve kapsamlı bir yönetici paneli işlevselliği ile web uygulamaları geliştirmek için tasarlanmış, PHP tabanlı bir MVC (Model-View-Controller) framework’tür. Çerez tabanlı sepet yönetimi, veritabanı işlemleri, form oluşturma ve doğrulama, URL yönlendirme ve duyarlı kullanıcı arayüzü gibi özellikler sunar.

## Proje Genel Yapısı

### Proje Mimarisi

E-ticaret platformu, MVC mimarisi kullanılarak geliştirilmiştir. Bu modüler yapı, kod yönetimini kolaylaştırır, bakım ve ölçeklenebilirlik sağlar. Mimari, uygulamayı şu bileşenlere ayırır:

- **Model**: Veritabanı işlemleri ve iş mantığını yönetir (örn. CRUD işlemleri, kimlik doğrulama).
- **View**: Kullanıcı arayüzünü oluşturur (HTML ve PHP şablonları).
- **Controller**: Kullanıcı isteklerini işler, model ve view arasında koordinasyonu sağlar.

**Dizin Yapısı**:

- `controllers/`: Kullanıcı isteklerini işleyen PHP dosyaları.
- `models/`: Veritabanı işlemleri ve iş mantığı için sınıflar.
- `views/`: Kullanıcı arayüzü için HTML ve PHP şablonları.
- `libs/`: Yeniden kullanılabilir kütüphaneler ve yardımcı fonksiyonlar.
- `config/`: Veritabanı bağlantıları ve uygulama ayarları.

## Özellikler

- **Dinamik Model Yükleme**: Model sınıflarını dinamik olarak yükler.
- **Alışveriş Sepeti**: Çerez tabanlı ürün ekleme, güncelleme, görüntüleme ve sepeti boşaltma.
- **Yönetici Paneli**: Ürün, sipariş, kategori ve üye yönetimi için kapsamlı veritabanı işlemleri.
- **Form Yönetimi**: Boş alan kontrolü, e-posta doğrulama, şifre eşleştirme ile form oluşturma.
- **Bildirimler**: Başarı/hata mesajları ve otomatik yönlendirmeler.
- **Veritabanı Entegrasyonu**: MySQL için optimize edilmiş yapılandırma ve sorgular.
- **URL Yönlendirme**: `.htaccess` ile temiz URL’ler.
- **Kullanıcı Arayüzü**: Öne çıkan ürünler, kategori navigasyonu, sayfalama, duyarlı tasarım.

## Gereksinimler

- **PHP**: Sürüm 5.2 veya üzeri.
- **Web Sunucusu**: `mod_rewrite` etkin Apache (XAMPP ile sağlanır).
- **MySQL**: Veritabanı işlemleri için.
- **XAMPP**: Proje `C:\xampp\htdocs\PROJELER\mvcproje` dizininde çalışacak şekilde yapılandırılmıştır.
- **Bootstrap Framework**: Duyarlı tasarım için.

## Kurulum

1. **Projeyi Kopyala**:
   - Projeyi `C:\xampp\htdocs\PROJELER\mvcproje` dizinine yerleştirin veya web sunucusu yapılandırmasını ayarlayın.
2. **Veritabanı Yapılandırması**:
   - `config/database.php` dosyasını MySQL kimlik bilgilerinizle güncelleyin:
     ```php
     define("DB_HOST", "localhost");
     define("DB_NAME", "mvcproje");
     define("DB_USER", "root");
     define("DB_PASS", "");
     ```
   - MySQL’de `mvcproje` adında bir veritabanı oluşturun ve gerekli şemayı içe aktarın.
3. **XAMPP Kurulumu**:
   - XAMPP kontrol panelinden Apache ve MySQL modüllerini başlatın.
   - `.htaccess` dosyasının çalıştığından ve `mod_rewrite` modülünün etkin olduğundan emin olun.
4. **URL Sabitini Güncelle**:
   - `config/Bilgi.php` dosyasındaki `URL` sabitini ayarlayın:
     ```php
     define('URL', 'http://localhost/PROJELER/mvcproje/');
     ```
5. **Dosya İzinleri**:
   - Web sunucusunun proje dizinine okuma/yazma izinleri olduğundan emin olun.
6. **Uygulamaya Eriş**:
   - Tarayıcıda `http://localhost/PROJELER/mvcproje/` adresine gidin.
   - `.htaccess` tüm istekleri `index.php` üzerinden yönlendirir.

## Kullanım

### Kullanıcı Arayüzü (Frontend)

- **Ana Sayfa**: Öne çıkan ürünler, yeni ürünler ve kategori navigasyonu.
- **Ürün Listesi**: Kategori, fiyat ve popülerlik filtresiyle sayfalama desteği.
- **Kategori Menüsü**: Hiyerarşik dinamik menü.
- **Kullanıcı İşlemleri**:
  - Giriş yapma, yeni üye kaydı, şifre güncelleme, profil düzenleme.
- **Alışveriş Sistemi**:
  - Ürün detay sayfası (resimler, açıklamalar, yorumlar).
  - Sepet yönetimi: `Cookie::SepeteEkle($id, $adet)`, `Cookie::SepeteBak()`, `Cookie::Guncelle($id, $adet)`, `Cookie::UrunUcur($id)`, `Cookie::SepetiBosalt()`.
  - Sipariş oluşturma ve ödeme simülasyonu.
- **Diğer Sayfalar**: İletişim formu, hakkımızda, gizlilik politikası, satış sözleşmesi.

### Yönetici Paneli

- **Ürün Yönetimi**:
  - Ekleme, düzenleme, silme, stok ve fiyat güncellemeleri.
  - Metodlar: `Ekleme($tablo, $sutunlar, $veriler)`, `Guncelle($tablo, $sutunlar, $veriler, $kosul)`, `Sil($tablo, $kosul)`.
- **Sipariş Yönetimi**:
  - Listeleme, detay görüntüleme, durum güncelleme, ödeme takibi.
  - Metodlar: `Verial($tablo, $kosul)`, `Arama($tablo, $kosul)`.
- **Kategori Yönetimi**:
  - Ekleme, düzenleme, silme, alt kategori desteği.
- **Üye Yönetimi**:
  - Listeleme, detay görüntüleme, durum güncelleme, silme.
  - Kimlik doğrulama: `GirisKontrol($tablo, $kosul)`.

### Form Yönetimi

- **Oluşturma**: `Form::Olustur($tip, $ozellikler, $metin)`, `Form::OlusturSelect($tip, $ozellikler)`, `Form::OlusturOption($ozellikler, $secili, $metin)`.
- **Doğrulama**: `$form->bosmu()`, `$form->GercektenMailmi($email)`, `$form->SifreTekrar($sifre1, $sifre2)`.

### Bildirimler

- Başarı: `Bilgi::basarili($mesaj, $yonlendirme_url, $gecikme)`.
- Hata: `Bilgi::hata($mesaj, $yonlendirme_url, $gecikme)`.
- Özel uyarı: `Bilgi::uyari($tip, $mesaj, $id)`.

## Teknik Detaylar ve Güvenlik

### Kullanılan Teknolojiler

- **PHP**: MVC tabanlı iş mantığı.
- **MySQL**: Optimize edilmiş veritabanı sorguları.
- **HTML5/CSS3**: Modern, duyarlı arayüz.
- **JavaScript**: Etkileşimli ön yüz.
- **Bootstrap**: Cihazlar arası tutarlılık.

### Güvenlik Önlemleri

- **SQL Injection Koruması**: Hazırlanmış ifadeler.
- **Oturum Yönetimi**: Güvenli oturumlar.
- **Şifre Hashleme**: Bcrypt ile şifre güvenliği.
- **Yetkilendirme**: Admin ve kullanıcı erişim kısıtlamaları.
- **Form Doğrulamaları**: İstemci ve sunucu tarafında doğrulama.
- **Giriş Temizleme**: `htmlspecialchars`, `strip_tags` kullanımı.

## Dosya Genel Bakışı

- `Controller.php`: Görünümler, formlar ve modelleri yükler.
- `.htaccess`: Temiz URL’ler için yönlendirme.
- `Cookie.php`: Çerez tabanlı sepet yönetimi.
- `adminpanel_model.php`: Yönetici paneli veritabanı işlemleri.
- `Bilgi.php`: Bildirim ve yönlendirme yardımcı sınıfı.
- `database.php`: Veritabanı yapılandırması.
- `Form.php`: Form oluşturma, doğrulama ve şifreleme.

## Notlar

- **Güvenlik**: Üretim ortamında CSRF koruması ve ek güvenlik katmanları önerilir.
- **Çerezler**: Sepet çerezleri 24 saat geçerlidir, `Cookie.php` ile süre ayarlanabilir.
- **Yerel Ortam**: XAMPP üzerinde `C:\xampp\htdocs\PROJELER\mvcproje` için yapılandırılmıştır.
- **Ölçeklenebilirlik**: Modüler yapı, yeni özellik eklemeyi kolaylaştırır.
