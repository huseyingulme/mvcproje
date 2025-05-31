<?php

class GenelGorev extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	$this->Modelyukle('GenelGorev');
	
	Session::init();	
	}	
	
	function iletisim() {
		if ($_POST) :		
	$ad=$this->form->get("ad")->bosmu();
	$mail=$this->form->get("mail")->bosmu();
	$konu=$this->form->get("konu")->bosmu();
	$mesaj=$this->form->get("mesaj")->bosmu();
	
	
	@$this->form->GercektenMailmi($mail);	
	$tarih=date("d-m-Y");
		
	if (!empty($this->form->error)) :
	
	echo $this->bilgi->uyari("danger","LÜTFEN TÜM BİLGİLERİ UYGUN GİRİNİZ");

	else:
	

	
		$sonuc=$this->model->iletisimForm("iletisim",
		array("ad","mail","konu","mesaj","tarih"),
		array($ad,$mail,$konu,$mesaj,$tarih));
	
		if ($sonuc==1):
	

		
		echo $this->bilgi->uyari("success","Mesajınız Alındı. En kısa sürede Dönüş yapılacaktır. Teşekkür ederiz",'id="formok"');
		
		else:
		
		
	
		echo $this->bilgi->uyari("danger","HATA OLUŞTU. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ");
		
		endif;
	
	endif;
	
	
	else:	
	
		$this->bilgi->direktYonlen("/");
	
	endif;

		
	} // iletisim formu
	
	
	function SepeteEkle() {
		// form buraya gelecek buradan id ve adet eklenecek

		
Cookie::SepeteEkle($this->form->get("id")->bosmu(),$this->form->get("adet")->bosmu());
		
	}
	
	function UrunSil() {
		if ($_POST) :		
		Cookie::UrunUcur($_POST["urunid"]);
		
		else:		
		$this->bilgi->direktYonlen("/");	
	    endif;	
	}
	
	function UrunGuncelle () {
		if ($_POST) :		
		Cookie::Guncelle($_POST["urunid"],$_POST["adet"]);
		else:		
		$this->bilgi->direktYonlen("/");	
	    endif;	
	}
	
	function SepetiBosalt () {
		
		$this->bilgi->direktYonlen("/sayfalar/sepet");
		
		Cookie::SepetiBosalt();
		
	}
	
	
	function SepetKontrol() {
		
		echo '<a href="'.URL.'/sayfalar/sepet">
		<h3> <img src="'.URL.'/views/design/images/bag.png" alt=""> </h3>
							
                            
		<p>';
		
		
		
		if (isset($_COOKIE["urun"])) :
		
			echo count($_COOKIE["urun"]);
			
			
			else:
			
			echo "Sepetiniz Boş";
		endif;
		
		
	
		
		echo'</p></a>';
	
	
		
	}
	
	function teslimatgetir() {
    if ($_POST) {
        $sipno = $this->form->get("sipno")->bosmu();
        $adresid = $this->form->get("adresid")->bosmu();

        $teslimatbilgileriGetir = $this->model->Verial("teslimatbilgileri", "where siparis_no=" . $sipno);
        $AdresGetir = $this->model->Verial("adresler", "where id=" . $adresid);

        echo '<div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-dark">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 text-left">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-bottom border-secondary mb-2">
                                <h5>KİŞİSEL BİLGİLER</h5>
                            </div>';

        // Check if teslimatbilgileriGetir has data
        if (!empty($teslimatbilgileriGetir) && isset($teslimatbilgileriGetir[0])) {
            echo '<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <span class="font-weight-bold">Ad : </span>' . htmlspecialchars($teslimatbilgileriGetir[0]["ad"]) . '<br>';
            echo '</div>
                  <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <span class="font-weight-bold">Soyad : </span>' . (isset($teslimatbilgileriGetir[0]["soyad"]) ? htmlspecialchars($teslimatbilgileriGetir[0]["soyad"]) : "Belirtilmemiş") . '<br>';
            echo '</div>
                  <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <span class="font-weight-bold">Mail : </span>' . (isset($teslimatbilgileriGetir[0]["mail"]) ? htmlspecialchars($teslimatbilgileriGetir[0]["mail"]) : "Belirtilmemiş") . '<br>';
            echo '</div>
                  <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <span class="font-weight-bold">Telefon : </span>' . (isset($teslimatbilgileriGetir[0]["telefon"]) ? htmlspecialchars($teslimatbilgileriGetir[0]["telefon"]) : "Belirtilmemiş") . '<br>';
            echo '</div>';
        } else {
            echo '<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    Kişisel bilgi bulunamadı.
                  </div>';
        }

        echo '</div>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 text-left">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-bottom border-secondary mb-2">
                        <h5>ADRES BİLGİSİ</h5>
                    </div>';

        // Check if AdresGetir has data
        if (!empty($AdresGetir) && isset($AdresGetir[0])) {
            echo '<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <span class="font-weight-bold">Adres : </span>' . htmlspecialchars($AdresGetir[0]["adres"]) . '<br>';
            echo '</div>';
        } else {
            echo '<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    Adres bilgisi bulunamadı.
                  </div>';
        }

        echo '</div>
            </div>
        </div>
    </div>
</div>';
    } else {
        $this->bilgi->direktYonlen("/");
    }
}
	
}

?>