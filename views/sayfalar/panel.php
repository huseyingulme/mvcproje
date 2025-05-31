<?php require 'views/header.php'; ?>

<?php
// Tarayıcı önbelleklemesini devre dışı bırak  bu koduda views/sayfalar/panel.php kodu bunu da değiştir 
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');
?>

<?php if (Session::get("kulad") && Session::get("uye")) : 
    Session::OturumKontrol("uye_panel", Session::get("kulad"), Session::get("uye"));
?>

<div class="container" id="UyeCont">
    <div class="row">
        <!-- SOL MENÜ -->
        <div class="col-md-2" id="menu">
            <div class="row" id="uyepanel">
                <div class="col-md-12" id="baslik">İŞLEMLER</div>
                <ul>
                    <li><a href="<?php echo URL; ?>/uye/siparislerim">Siparislerim</a></li>
                    <li><a href="<?php echo URL; ?>/uye/hesapayarlarim">Hesap Ayarları</a></li>
                    <li><a href="<?php echo URL; ?>/uye/sifredegistir">Şifre İşlemleri</a></li>
                    <li><a href="<?php echo URL; ?>/uye/adreslerim">Adreslerim</a></li>
                    <li><a href="<?php echo URL; ?>/uye/cikis">Oturumu Kapat</a></li>
                </ul>
            </div>
        </div>

        <!-- SAĞ İÇERİK -->
        <div class="col-md-10">
            <div class="alert alert-success text-center" id="Sonuc"></div>

            <?php
            foreach ($veri as $key => $deger) :
                switch ($key) :

                    case "yorumlar":
                        $Harici->UyeyorumGetir($veri["yorumlar"]);
                        break;

                    case "adres":
                        $Harici->UyeadresGetir($veri["adres"]);
                        ?>
                        <!-- Yalnızca "adres" sayfasında adres ekleme formu gösterilir -->
                        <div class="card p-3 mb-3">
                            <h5 class="card-title">Yeni Adres Ekle</h5>
                            <div class="form-group">
                                <textarea class="form-control" id="adresInput" rows="3" placeholder="Adresinizi girin..."></textarea>
                            </div>
                            <button class="btn btn-primary mt-2" onclick="adresEkle()">Adres Ekle</button>
                            <div id="adresEkleSonuc" class="mt-2"></div>
                        </div>
                        <?php
                        break;

                    case "ayarlar":
                        if (isset($veri["bilgi"])) :
                            echo $veri["bilgi"];
                        endif;
                        $Harici->UyeayarlarGetir($veri["ayarlar"]);
                        break;

                    case "sifredegistir":
                        if (isset($veri["bilgi"])) :
                            echo $veri["bilgi"];
                        endif;
                        $Harici->Uyesifredegistir($veri["sifredegistir"]);
                        break;

                    case "siparisler":
                        $Harici->UyesiparisGetir($veri["siparisler"]);
                        break;

                endswitch;
            endforeach;
            ?>
        </div>
    </div>
</div>

<?php else :
    header("Location:" . URL);
    exit;
endif;
?>

<?php require 'views/footer.php'; ?>

<!-- Sayfa yeniden yüklenmişse otomatik yenile -->
<script>
if (window.performance && window.performance.navigation.type === 2) {
    window.location.reload(true);
}
</script>

<!-- Adres Ekleme JavaScript -->
<script>
function adresEkle() {
    var adres = document.getElementById("adresInput").value;

    if (adres.trim() === "") {
        document.getElementById("adresEkleSonuc").innerHTML = '<div class="alert alert-danger">Adres boş olamaz.</div>';
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "<?php echo URL; ?>/uye/AdresEkle", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("adres=" + encodeURIComponent(adres));
}
</script>