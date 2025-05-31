<?php require 'views/header.php'; ?>


<div class="registration-form">
    <div class="container">
        <div class="dreamcrub">
            <ul class="breadcrumbs">
                <a href="<?php echo URL; ?>" title="Anasayfa">Anasayfa</a>&nbsp;<span>></span>
                <li class="women">Üye Ol</li>
            </ul>
            <ul class="previous">
                <li><a href="<?php echo URL; ?>">Geri Dön</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        
        <?php
        if (isset($veri["bilgi"])) : 
            echo $veri["bilgi"];
        else:
        ?>
            <h2>ÜYE KAYIT FORMU</h2>
            <div class="registration-grids">
                <?php
                if (isset($veri["hata"])) : 
                    echo '<div class="alert alert-danger mt-5">';                        
                    foreach ($veri["hata"] as $value) :
                        echo ucfirst($value)."<br>";                                   
                    endforeach; 
                    echo '</div>';                
                endif;
                ?>
                
                <div class="reg-form">
                    <div class="reg">
                        <p>Welcome, please enter the following details to continue.</p>
                        
                        <?php 
                        Form::Olustur("1", array(
                            "action" => URL."/uye/kayitkontrol",
                            "method" => "POST"
                        )); 
                        ?>
                        <ul>
                            <li class="text-info"><span class="text-danger">*</span>Adınız: </li>
                            <li><?php Form::Olustur("2", array("type"=>"text","name"=>"ad","required"=>"required")); ?></li>
                        </ul>
                        
                        <ul>
                            <li class="text-info"><span class="text-danger">*</span> Soyadınız: </li>
                            <li><?php Form::Olustur("2", array("type"=>"text","name"=>"soyad","required"=>"required")); ?></li>
                        </ul>
                        
                        <ul>
                            <li class="text-info"><span class="text-danger">*</span> Mail Adresi: </li>
                            <li><?php Form::Olustur("2", array("type"=>"text","name"=>"mail","required"=>"required")); ?></li>
                        </ul>
                        
                        <ul>
                            <li class="text-info"><span class="text-danger">*</span> Şifre: </li>
                            <li><?php Form::Olustur("2", array("type"=>"password","name"=>"sifre","required"=>"required")); ?></li>
                        </ul>
                        
                        <ul>
                            <li class="text-info"><span class="text-danger">*</span> Şifre Tekrar:</li>
                            <li><?php Form::Olustur("2", array("type"=>"password","name"=>"sifretekrar","required"=>"required")); ?></li>
                        </ul>
                        
                        <ul>
                            <li class="text-info"><span class="text-danger">*</span> Telefon:</li>
                            <li><?php Form::Olustur("2", array("type"=>"text","name"=>"telefon","required"=>"required")); ?></li>  
                        </ul>		
                        
                        <ul>
                            <li class="text-success"><span class="text-danger">* İşaretler zorunlu alandır</span></li>
                        </ul>	
                        
                        <?php Form::Olustur("2", array("type"=>"submit","value"=>"TAMAMLA")); ?>     
                        <p class="click">Üye olarak politikaları kabul etmiş olursunuz. <a href="#">Gizlilik politikası</a></p> 
                        <?php Form::Olustur("kapat"); ?>     
                    </div>
                </div>
                <div class="reg-right">
    <h3>Üyelik Tamamen Ücretsiz</h3>
    <div class="strip"></div>
    <p>Sitemize üye olmak tamamen ücretsizdir. Üyelik işlemi sadece birkaç dakikanızı alır. Üye olarak siparişlerinizi kolayca takip edebilir, özel kampanyalardan ve indirimlerden faydalanabilirsiniz. Ayrıca size özel teklifler ve fırsatlardan da ilk siz haberdar olursunuz.</p>

    <h3 class="lorem">Üyelik Avantajları</h3>
    <div class="strip"></div>
    <p>• Hızlı ve kolay sipariş takibi<br>
       • Size özel kampanya ve indirimler<br>
       • Sık alışverişlerinizde daha hızlı ödeme seçenekleri<br>
       • Ürün değerlendirme ve yorum yapabilme<br>
       • Müşteri hizmetlerinden öncelikli destek</p>
</div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php
        endif; // Close the inner if-else block
    //endif; // Close the outer if block
if (Session::get("kulad") && Session::get("uye")) :
    header("Location:".URL);
    exit; // Ensure the script stops after redirection
endif;

require 'views/footer.php'; 
?>