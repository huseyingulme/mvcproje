<?php

class uye extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	$this->Modelyukle('uye');
	Session::init();
	
	
	}	
	

	
	function giris() {
		
	
		$this->view->goster("sayfalar/giris");
		
	} // GİRİŞ SAYFASI
	
	function hesapOlustur() {
		
	
		$this->view->goster("sayfalar/uyeol");
		
	} // HESAP OLUŞTUR SAYFASI
	
	
	
	function kayitkontrol() {
	
		if ($_POST) :		
		$ad=$this->form->get("ad")->bosmu();
		$soyad=$this->form->get("soyad")->bosmu();
		$mail=$this->form->get("mail")->bosmu();
		$sifre=$this->form->get("sifre")->bosmu();
		$sifretekrar=$this->form->get("sifretekrar")->bosmu();
		$telefon=$this->form->get("telefon")->bosmu();	
		$this->form->GercektenMailmi($mail);	
		$sifre=$this->form->SifreTekrar($sifre,$sifretekrar);
		

		
		if (!empty($this->form->error)) :
		

		$this->view->goster("sayfalar/uyeol",
		array("hata" => $this->form->error));
		
		
		else:
		

		
		$sonuc=$this->model->Ekleİslemi("uye_panel",
		array("ad","soyad","mail","sifre","telefon"),
		array($ad,$soyad,$mail,$sifre,$telefon));
	
		if ($sonuc):
	

		$this->view->goster("sayfalar/uyeol",
		array("bilgi" =>$this->bilgi->uyari("success","KAYIT BAŞARILI")));
		
		
		
		else:
		
		$this->view->goster("sayfalar/uyeol",
		array("bilgi" => 
		$this->bilgi->uyari("danger","Kayıt esnasında hata oluştu")));
		
		
		
		
		endif;
	
		endif;
		
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
	
	
		
	} 	// KAYIT KONTROL		
	
	function cikis() {
			
			Session::destroy();			
			$this->bilgi->direktYonlen("/magaza");
		
	} // ÇIKIŞ	
	
	function giriskontrol() {
    if ($_POST) {
        if ($_POST["giristipi"] == "uye") {
            $ad = $this->form->get("ad")->bosmu();
            $sifre = $this->form->get("sifre")->bosmu();

            if (!empty($this->form->error)) {
                $this->view->goster("sayfalar/giris", [
                    "bilgi" => $this->bilgi->uyari("danger", "Ad ve şifre boş olamaz")
                ]);
            } else {
                $sifre = $this->form->sifrele($sifre);
                $sonuc = $this->model->GirisKontrol("uye_panel", "ad='$ad' and sifre='$sifre'");

                if ($sonuc) {
                    Session::init();
                    Session::set("kulad", $sonuc[0]["ad"]);
                    Session::set("uye", $sonuc[0]["id"]);
                    Session::set('uye_timeout', time());
                    if (isset($_POST['benihatirla'])) {
                        setcookie('uyead', $ad, time()+60*60*24*30, '/');
                        setcookie('uyesifre', $this->form->get("sifre")->bosmu(), time()+60*60*24*30, '/');
                    } else {
                        setcookie('uyead', '', time()-3600, '/');
                        setcookie('uyesifre', '', time()-3600, '/');
                    }
                    $this->bilgi->direktYonlen("/uye/panel");
                } else {
                    $this->view->goster("sayfalar/giris", [
                        "bilgi" => $this->bilgi->uyari("danger", "Kullanıcı adı veya şifresi hatalıdır")
                    ]);
                }
            }
        }

        // ADMİN GİRİŞ KISMI
        elseif ($_POST["giristipi"] == "yon") {
            $AdminAd = $this->form->get("AdminAd")->bosmu();
            $Adminsifre = $this->form->get("Adminsifre")->bosmu();

            if (!empty($this->form->error)) {
                $this->view->goster("YonPanel/sayfalar/index", [
                    "bilgi" => $this->bilgi->uyari("danger", "Ad ve şifre boş olamaz")
                ]);
            } else {
                $Adminsifre = $this->form->sifrele($Adminsifre); // Eğer şifreleme varsa

                // TABLODAKİ DOĞRU ALAN ADLARI: ad, sifre
                $sonuc = $this->model->GirisKontrol("yonetim", "ad='$AdminAd' and sifre='$Adminsifre'");

                if ($sonuc) {
                    Session::init();
                    Session::set("AdminAd", $sonuc[0]["ad"]);
                    Session::set("Adminid", $sonuc[0]["id"]);
                    if (isset($_POST['benihatirla'])) {
                        setcookie('adminad', $AdminAd, time()+60*60*24*30, '/');
                        setcookie('adminsifre', $this->form->get("Adminsifre")->bosmu(), time()+60*60*24*30, '/');
                    } else {
                        setcookie('adminad', '', time()-3600, '/');
                        setcookie('adminsifre', '', time()-3600, '/');
                    }
                    $this->bilgi->direktYonlen("/panel/siparisler");
                } else {
                    $this->view->goster("YonPanel/sayfalar/index", [
                        "bilgi" => $this->bilgi->uyari("danger", "Kullanıcı adı veya şifresi hatalıdır")
                    ]);
                }
            }
        }
    } else {
        $this->bilgi->direktYonlen("/");
    }
}
 // GİRİŞ KONTROL	
	
	
	//*********** ÜYENİN PANELİNİ SAĞLAYAN FONKSİYONLAR
	
	function Yorumsil () {
		
		if ($_POST) :	
		
		echo $this->model->yorumSil("yorumlar", "id=".$_POST["yorumid"]);
		
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
		
	} // YORUM SİL
	
	function adresSil () {
		
		if ($_POST) :	
		
		echo $this->model->adresSil("adresler", "id=".$_POST["adresid"]);
		
		endif;
		
	} // ADRES SİL
	
	function YorumGuncelle()  {
		
		if ($_POST) :
		/*$_POST["yorum"];
		$_POST["yorumid"];	*/	
		
		// function yorumGuncelle($tabloisim,$sutunlar,$veriler,$kosul) {
		
		echo $this->model->yorumGuncelle("yorumlar",
		array("icerik","durum"),
		array($_POST["yorum"],"0"),"id=".$_POST["yorumid"]);
		
		
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
		
		
	} // YORUM GÜNCELLE

	function AdresEkle()  {
		
		if ($_POST) :
		
		$adres=$this->form->get("adres")->bosmu();
		$uyeid=Session::get("uye");
		
		if (!empty($this->form->error)) :
		
			echo $this->bilgi->uyari("danger","Adres boş olamaz.");
			
		else:
		
			echo $this->model->Ekleİslemi("adresler",
			array("adres","uyeid"),
			array($adres,$uyeid));
			
		endif;
		
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
		
		
	} // ADRES EKLE bu fonksiyonu controllers/uye.php ye ekle
	
	function AdresGuncelle()  {
		
		if ($_POST) :
		
		echo $this->model->yorumGuncelle("adresler",
		array("adres"),
		array($_POST["adres"]),"id=".$_POST["adresid"]);
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
		
		
	} // ADRES GÜNCELLE	
	
	
	function Panel() {
		if (!Session::get('uye') || !Session::get('uye_timeout') || (time() - Session::get('uye_timeout') > 300)) {
			Session::destroy();
			header('Location: ' . URL . '/uye/giris');
			exit;
		}
		Session::set('uye_timeout', time());
		$this->view->goster("sayfalar/panel",array(
		"siparisler" => $this->model->yorumlarial("siparisler","where uyeid=".Session::get("uye"))));		
	} // ANA PANEL
	
	function yorumlarim() {	
	
	
		$this->view->goster("sayfalar/panel",array(
		"yorumlar" => $this->model->yorumlarial("yorumlar","where uyeid=".Session::get("uye"))
	
	
	));		
	
		
	} // YORUMLAR
	
	function adreslerim() {	
	
	
		$this->view->goster("sayfalar/panel",array(
		"adres" => $this->model->yorumlarial("adresler","where uyeid=".Session::get("uye"))
	
	
	));		
	
		
	} // ADRESLER
	
	function hesapayarlarim() {	
	
	
		$this->view->goster("sayfalar/panel",array(
		"ayarlar" => $this->model->yorumlarial("uye_panel","where id=".Session::get("uye"))));		
	
		
	} // HESAP AYARLARI
	
	function sifredegistir() {	
	
	
		$this->view->goster("sayfalar/panel",array(
		"sifredegistir" => Session::get("uye")));	
	
		
	} // ŞİFRE DEĞİŞTİR
	
	function siparislerim() {	
	
		$this->view->goster("sayfalar/panel",array(
		"siparisler" => $this->model->yorumlarial("siparisler","where uyeid=".Session::get("uye"))));		
	
		
	} // SİPARİŞLER
	
	function ayarGuncelle() {		
		if ($_POST) :	
		
		$ad=$this->form->get("ad")->bosmu();
		$soyad=$this->form->get("soyad")->bosmu();
		$mail=$this->form->get("mail")->bosmu();
		$telefon=$this->form->get("telefon")->bosmu();
		$uyeid=$this->form->get("uyeid")->bosmu();
		
		
		
		if (!empty($this->form->error)) :
		$this->view->goster("sayfalar/panel",
		array(
		"ayarlar" => $this->model->yorumlarial("uye_panel","where id=".Session::get("uye")),
		"bilgi" => $this->bilgi->uyari("danger","Girilen bilgiler hatalıdır.")
		));
			
		else:	
		
	
	
		$sonuc=$this->model->AyarlarGuncelle("uye_panel",
		array("ad","soyad","mail","telefon"),
		array($ad,$soyad,$mail,$telefon),"id=".$uyeid);
	
		if ($sonuc): 
	
			$this->view->goster("sayfalar/panel",
			array(
			"ayarlar" => "ok",
			"bilgi" => $this->bilgi->basarili("GÜNCELLEME BAŞARILI","/uye/panel")
			 ));
				
		else:
		
			$this->view->goster("sayfalar/panel",
			array(
			"ayarlar" => $this->model->yorumlarial("uye_panel","where id=".Session::get("uye")),
			"bilgi" => $this->bilgi->uyari("danger","Güncelleme sırasında hata oluştu.")
			 ));	
		
		endif;
	
		endif;
		
		
			else:	
		
		$this->bilgi->direktYonlen("/");
		endif;
	
		
		
	} // ÜYE KENDİ AYARLARINI GÜNCELLİYOR.
	
	function sifreguncelle() {		

		if ($_POST) :		
			
		$msifre=$this->form->get("msifre")->bosmu();
		$yen1=$this->form->get("yen1")->bosmu();
		$yen2=$this->form->get("yen2")->bosmu();
		$uyeid=$this->form->get("uyeid")->bosmu();
		$sifre=$this->form->SifreTekrar($yen1,$yen2); // ŞİFRELİ YENİ HALİ ALIYORUM
		/*
		ÖNCE GELEN ŞFİREYİ SORGULAMAM LAZIM DOĞRUMU DİYE, EĞER MEVCUT ŞİFRE DOĞRU İSE	
		DEVAM EDECEK HATALI İSE İŞLEM BİTECEK
		
		*/
		
		$msifre=$this->form->sifrele($msifre);
		
		if (!empty($this->form->error)) :
		$this->view->goster("sayfalar/panel",
		array(
		"sifredegistir" => Session::get("uye"),
		"bilgi" => $this->bilgi->uyari("danger","Girilen bilgiler hatalıdır.")
		));
		
		else:	
	
	
		
		$sonuc2=$this->model->GirisKontrol("uye_panel","ad='".Session::get("kulad")."' and sifre='$msifre'");
	
		if ($sonuc2): 
		
				$sonuc=$this->model->sifreGuncelle("uye_panel",
				array("sifre"),
				array($sifre),"id=".$uyeid);
			
				if ($sonuc): 
				
			
				$this->view->goster("sayfalar/panel",
				array(
				"sifredegistir" => "ok",
				"bilgi" => $this->bilgi->basarili("ŞİFRE DEĞİŞTİRME BAŞARILI","/uye/panel")
			 	));
					
						
				else:
				
				$this->view->goster("sayfalar/panel",
				array(
				"sifredegistir" => Session::get("uye"),
				"bilgi" => $this->bilgi->uyari("danger","Şifre değiştirme sırasında hata oluştu.")
				));	
				
				endif;
			
		else:
		
		
		
		
		
			$this->view->goster("sayfalar/panel",
		array(
		"sifredegistir" => Session::get("uye"),
		"bilgi" => $this->bilgi->uyari("danger","Mevcut şifre hatalıdır.")
		));
			
				
			
			endif;
		
		endif;
		
		
		else:	
	
		$this->bilgi->direktYonlen("/");
		endif;
		
	
		
	} // ÜYE ŞİFRESİNİ GÜNCELLİYOR.
	
	
	//***********  ÜYENİN PANELİNİ SAĞLAYAN FONKSİYONLAR
	
	function siparisTamamlandi() {
		
		if ($_POST) :		
		
		
		$ad=$this->form->get("ad")->bosmu();
		$soyad=$this->form->get("soyad")->bosmu();
		$mail=$this->form->get("mail")->bosmu();
		$telefon=$this->form->get("telefon")->bosmu();
		$toplam=$this->form->get("toplam")->bosmu();
		
			
		$odeme=$this->form->get("odeme")->bosmu();	
		$adrestercih=$this->form->get("adrestercih")->bosmu();
		$odemeturu=($odeme==1) ? "Nakit" : "Hata";
		$tarih=date("d.m.Y");
		
		
		if (!empty($this->form->error)) :
		$this->view->goster("sayfalar/siparisitamamla",
		array("bilgi" => $this->bilgi->uyari("danger","Bilgiler eksiksiz doldurulmalıdır")));
		
		
		else:
	
		$siparisNo=mt_rand(0,99999999);
		$uyeid=Session::get("uye");
	
		$this->model->TopluislemBaslat();
	
	
			if (isset($_COOKIE["urun"])) :
			
		
			foreach ($_COOKIE["urun"] as $id => $adet) :
			
		$GelenUrun=$this->model->SiparisTamamlamaUrunCek("urunler","where id=".$id);


		$birimfiyat=$GelenUrun[0]["fiyat"]*$adet;
		
		$this->model->SiparisTamamlama(
		array(
		$siparisNo,
		$adrestercih,
		$uyeid,
		$GelenUrun[0]["urunad"],
		$adet,
		$GelenUrun[0]["fiyat"],
		$birimfiyat,
		$odemeturu,
		$tarih
		
		));
	
	
		
		endforeach;
	
	
		else:
	 // cookie  tanımlı değilse diye bir knotrol
		$this->bilgi->direktYonlen("/");
	
		endif;
	
	
		$this->model->TopluislemTamamla();
	
		
		Cookie::SepetiBosalt(); // sepeti boşalttık
		
		
		$TeslimatBilgileri=$this->model->Ekleİslemi("teslimatbilgileri",
		array("siparis_no","ad","soyad","mail","telefon"),
		array(
		$siparisNo,
		$ad,
		$soyad,
		$mail,
		$telefon	
		));
	
	
	
		if ($TeslimatBilgileri): 
		
		$this->view->goster("sayfalar/siparistamamlandi",
		array(
		"siparisno" => $siparisNo,
		"toplamtutar" => $toplam		
		));	
		
		
			
		else:
		
		$this->view->goster("sayfalar/siparisitamamla",
		array("bilgi" => $this->bilgi->uyari("danger","Sipariş oluşturulurken hata oluştu")));
		
		endif;
	
		endif;
	
	
	
		else:	
	
			$this->bilgi->direktYonlen("/");
		endif;
	

	} // SİPARİŞ TAMAMLANDI
	
	function sifremiunuttum() {
		$this->view->goster("sayfalar/sifremiunuttum");
	}

	function sifremiunuttumkontrol() {
		if ($_POST) {
			$ad = $this->form->get("ad")->bosmu();
			$mail = $this->form->get("mail")->bosmu();
			if (!empty($this->form->error)) {
				$this->view->goster("sayfalar/sifremiunuttum", [
					"bilgi" => $this->bilgi->uyari("danger", "Tüm alanları doldurunuz.")
				]);
			} else {
				$sonuc = $this->model->GirisKontrol("uye_panel", "ad='$ad' and mail='$mail'");
				if ($sonuc) {
					// Yeni şifre üret
					$yenisifre = substr(md5(uniqid()),0,8);
					$sifreli = $this->form->sifrele($yenisifre);
					$this->model->sifreGuncelle("uye_panel", ["sifre"], [$sifreli], "id=".$sonuc[0]["id"]);
					// Mail fonksiyonu yoksa ekrana göster
					$this->view->goster("sayfalar/sifremiunuttum", [
						"bilgi" => $this->bilgi->uyari("success", "Yeni şifreniz: <b>$yenisifre</b> (Lütfen giriş yaptıktan sonra değiştirin.)")
					]);
				} else {
					$this->view->goster("sayfalar/sifremiunuttum", [
						"bilgi" => $this->bilgi->uyari("danger", "Bilgiler uyuşmuyor.")
					]);
				}
			}
		} else {
			$this->bilgi->direktYonlen("/");
		}
	}
	
}




?>

<script>
if (window.performance && window.performance.navigation.type === 2) {
    window.location.href = "<?php echo URL; ?>/uye/giris";
}
</script>


