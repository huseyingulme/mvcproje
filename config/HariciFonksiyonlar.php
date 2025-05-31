<?php

/*

BURADA SİTENİN TÜM AYARLARINI VE DİĞER FONKSİYONLARIMI BARINDIRIYOR

*/

class HariciFonksiyonlar extends Model {
    
    public $sonuc, $title, $sayfaAciklama, $anahtarKelime, $sloganUst1, $sloganAlt1, $sloganUst2, $sloganAlt2, $sloganUst3, $sloganAlt3;
    
    public $linkler = array(), $encoksatan = array(), $stoguazalan = array(), $populerkategori = array();
    
    function __construct() {
        parent::__construct();

        // Fetch settings from the 'ayarlar' table
        $this->sonuc = $this->db->listele("ayarlar");

        

        $this->encoksatan = $this->db->listele("urunler", "ORDER BY satisadet DESC LIMIT 8");
        $this->stoguazalan = $this->db->listele("urunler", "WHERE stok < 200 ORDER BY stok ASC LIMIT 8");
        $this->populerkategori = $this->db->listele("alt_kategori", "ORDER BY RAND() LIMIT 8");
    }

    public function bulten() {
        // Burada metod içeriğini tanımla
        return "Bülten içeriği";
    }

    function seo($s) {
        $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
        $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
        $s = str_replace($tr, $eng, $s);
        $s = strtolower($s);
        $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = preg_replace('/#/', '', $s);
        $s = str_replace('.', '', $s);
        $s = trim($s, '-');
        return $s;
    }

    function LinkleriGetir() {
        $son = $this->db->prepare("SELECT * FROM ana_kategori");
        $son->execute();

        while ($aktar = $son->fetch(PDO::FETCH_ASSOC)) :
            echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $aktar["ad"] . ' <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-column columns-3">
                        <div class="row">';

            $son2 = $this->db->prepare("SELECT * FROM cocuk_kategori WHERE ana_kat_id = " . $aktar["id"]);
            $son2->execute();

            while ($aktar2 = $son2->fetch(PDO::FETCH_ASSOC)) :
                echo '<div class="col-sm-4">
                        <ul class="multi-column-dropdown">
                            <h6>' . $aktar2["ad"] . '</h6>';

                $son3 = $this->db->prepare("SELECT * FROM alt_kategori WHERE cocuk_kat_id = " . $aktar2["id"]);
                $son3->execute();

                while ($aktar3 = $son3->fetch(PDO::FETCH_ASSOC)) :
                    echo '<li><a href="' . URL . '/urunler/kategori/' . $aktar3["id"] . '/' . $this->seo($aktar3["ad"]) . '">' . $aktar3["ad"] . '</a></li>';
                endwhile;

                echo '</ul></div>';
            endwhile;

            echo '<div class="clearfix"></div>
                    </div>
                    </ul>
                  </li>';
        endwhile;
    }

    

    function UrunCek($id) {
        return $this->db->listele("urunler", "WHERE id = " . $id);
    }

    function UyesiparisGetir($dizimiz) {
        ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <?php if (count($dizimiz) != 0) : ?>
                    <table class="table">
                        <tbody>
                            <tr id="baslik">
                                <td>SİPARİŞ NO</td>
                                <td>ÜRÜN AD</td>
                                <td>ÜRÜN ADET</td>
                                <td>ÜRÜN FİYAT</td>
                                <td>TOPLAM FİYAT</td>
                                <td>KARGO DURUM</td>
                                <td>TARİH</td>
                            </tr>
                            <?php foreach ($dizimiz as $deger) : ?>
                                <tr id="adresElemanlar">
                                    <td><?php echo $deger["siparis_no"]; ?></td>
                                    <td><?php echo $deger["urunad"]; ?></td>
                                    <td><?php echo $deger["urunadet"]; ?></td>
                                    <td><?php echo $deger["urunfiyat"]; ?></td>
                                    <td><?php echo $deger["toplamfiyat"]; ?></td>
                                    <td><?php echo $deger["kargodurum"]; ?></td>
                                    <td><?php echo $deger["tarih"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    function UyeyorumGetir($dizimiz) {
        echo '<div class="row"><div class="col-md-12 text-center">';
        echo count($dizimiz) > 0 ? '<div class="alert alert-info">' . count($dizimiz) . " adet yorumunuz var</div>" : '<div class="alert alert-info">Henüz hiçbir ürüne yorum yazmamışsınız.</div>';
        if (count($dizimiz) != 0) :
            echo '<table class="table">
                    <tbody>
                        <tr id="baslik">
                            <td>YORUMUNUZ</td>
                            <td>ÜRÜN</td>
                            <td>TARİH</td>
                            <td>DURUM</td>
                            <td>GÜNCELLE</td>
                            <td>SİL</td>
                        </tr>';
            foreach ($dizimiz as $deger) :
                $GelenUrun = $this->UrunCek($deger["urunid"]);
                echo '<tr id="adresElemanlar">
                        <td><span class="sp' . $deger["id"] . '">' . $deger["icerik"] . '</span></td>
                        <td>' . $GelenUrun[0]["urunad"] . '</td>
                        <td>' . $deger["tarih"] . '</td>
                        <td>' . (($deger["durum"] == 0) ? "<span class='onaysiz'>Onaysız</span>" : "<span class='onayli'>Onaylı</span>") . '</td>
                        <td id="GuncelButonlarinanasi">
                            <input type="button" class="btn btn-sm btn-success" data-value="' . $deger["id"] . '" value="Güncelle">
                        </td>
                        <td>
                            <a onclick="UrunSil(\'' . $deger["id"] . '\',\'yorumsil\')" class="btn btn-sm btn-danger">SİL</a>
                        </td>
                      </tr>';
            endforeach;
            echo '</tbody></table>';
        endif;
        echo '</div></div>';
    }

    function UyeadresGetir($dizimiz) {
        echo '<div class="row"><div class="col-md-12 text-center">';
        echo count($dizimiz) > 0 ? '<div class="alert alert-info">' . count($dizimiz) . " adet adresiniz kayıtlıdır</div>" : '<div class="alert alert-info">Kayıtlı adresiniz bulunmamaktadır.</div>';
        foreach ($dizimiz as $deger) :
            echo '<div class="col-md-2 text-center" id="adresiskelet">
                    <div class="row" id="adresElemanlar">
                        <div class="col-md-12" id="adresİd">
                            <span class="adresSp' . $deger["id"] . '">' . $deger["adres"] . '</span>
                        </div>
                        <div class="col-md-6" id="AdresGuncelButonlarinanasi">
                            <input type="button" class="btn btn-sm btn-success" data-value="' . $deger["id"] . '" id="AdresGuncelBtn" value="Güncelle">
                        </div>
                        <div class="col-md-6">
                            <a onclick="UrunSil(\'' . $deger["id"] . '\',\'adresSil\')" class="btn btn-sm btn-danger" id="AdresSilBtn">SİL</a>
                        </div>
                    </div>
                  </div>';
        endforeach;
        echo '</div>';
    }

    function UyeayarlarGetir($dizimiz) {
        if ($dizimiz != "ok") :
            ?>
            <div class="row text-center">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center" id="ortala">
                    <div class="row text-center" id="satirlar">
                        <div class="col-md-12" id="satirlarbaslik">HESAP AYARLARI</div>
                        <div class="col-md-5"><label>Ad</label></div>
                        <div class="col-md-7">
                            <?php Form::Olustur("1", array("action" => URL."/uye/ayarGuncelle", "method" => "POST")); ?>
                            <?php Form::Olustur("2", array("type" => "text", "name" => "ad", "value" => $dizimiz[0]["ad"], "class" => "form-control")); ?>
                        </div>
                        <div class="col-md-5"><label>Soyad</label></div>
                        <div class="col-md-7">
                            <?php Form::Olustur("2", array("type" => "text", "name" => "soyad", "value" => $dizimiz[0]["soyad"], "class" => "form-control")); ?>
                        </div>
                        <div class="col-md-5"><label>Mail adresiniz</label></div>
                        <div class="col-md-7">
                            <?php Form::Olustur("2", array("type" => "text", "name" => "mail", "value" => $dizimiz[0]["mail"], "class" => "form-control")); ?>
                        </div>
                        <div class="col-md-5"><label>Telefon</label></div>
                        <div class="col-md-7">
                            <?php Form::Olustur("2", array("type" => "text", "name" => "telefon", "value" => $dizimiz[0]["telefon"], "class" => "form-control")); ?>
                        </div>
                        <div class="col-md-12">
                            <?php
                            Form::Olustur("2", array("type" => "hidden", "name" => "uyeid", "value" => $dizimiz[0]["id"]));
                            Form::Olustur("2", array("type" => "submit", "class" => "btn", "value" => "GÜNCELLE"));
                            Form::Olustur("kapat");
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <?php
        endif;
    }

    function Uyesifredegistir($dizimiz) {
        if ($dizimiz != "ok") :
            ?>
            <div class="row text-center">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center" id="ortala">
                    <div class="row text-center" id="satirlar">
                        <div class="col-md-12" id="satirlarbaslik">ŞİFRE DEĞİŞTİR</div>
                        <div class="col-md-5">
                            <?php Form::Olustur("1", array("action" => URL."/uye/sifreguncelle", "method" => "POST")); ?>
                            <label>Mevcut Şifreniz</label>
                        </div>
                        <div class="col-md-7">
                            <?php Form::Olustur("2", array("type" => "password", "name" => "msifre", "class" => "form-control")); ?>
                        </div>
                        <div class="col-md-5"><label>Yeni Şifreniz</label></div>
                        <div class="col-md-7">
                            <?php Form::Olustur("2", array("type" => "password", "name" => "yen1", "class" => "form-control")); ?>
                        </div>
                        <div class="col-md-5"><label>Şifre (Tekrar)</label></div>
                        <div class="col-md-7">
                            <?php Form::Olustur("2", array("type" => "password", "name" => "yen2", "class" => "form-control")); ?>
                        </div>
                        <div class="col-md-12">
                            <?php
                            Form::Olustur("2", array("type" => "hidden", "name" => "uyeid", "value" => $dizimiz));
                            Form::Olustur("2", array("type" => "submit", "class" => "btn", "value" => "DEĞİŞTİR"));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <?php
        endif;
    }

    function UyeBilgileriniGetir() {
        return $this->db->listele("uye_panel", "WHERE id = " . Session::get("uye"));
    }

    function UyeAdresleriniGetir() {
        return $this->db->listele("adresler", "WHERE uyeid = " . Session::get("uye"));
    }
}

?>