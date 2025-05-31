<?php require 'views/YonPanel/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12 text-center">
            <?php if (isset($veri["bilgi"])): ?>
                <div class="alert alert-info">
                    <?php echo $veri["bilgi"]; ?>
                </div>
            <?php endif; ?>

            <!-- Şifre Değiştirme Formu -->
            <?php if (isset($veri["sifredegistir"])): ?>
                <div class="row text-left border-bottom-mvc mb-2">
                    <div class="col-xl-12 col-md-12 mb-12 text-left p-2">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-key"></i> Şifre Değiştir</h1>
                    </div>
                </div>

                <div class="col-xl-12 col-md-12 text-center">
                    <div class="row text-center">
                        <div class="col-xl-4 col-md-6 mx-auto">
                            <div class="row bg-gradient-beyazimsi">
                                <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2">
                                    <h3>Yeni Şifre Belirleyin</h3>
                                </div>
                                
                                <!-- Eski Şifre -->
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Eski Şifre</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                    <?php 
                                    Form::Olustur("1", array(
                                        "action" => URL . "/panel/sifreguncelleson",
                                        "method" => "POST"
                                    ));
                                    Form::Olustur("2", array(
                                        "type" => "password",
                                        "class" => "form-control",
                                        "name" => "mevcutsifre",
                                        "placeholder" => "Eski şifrenizi girin"
                                    ));
                                    ?>
                                </div>

                                <!-- Yeni Şifre -->
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Yeni Şifre</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                    <?php 
                                    Form::Olustur("2", array(
                                        "type" => "password",
                                        "class" => "form-control",
                                        "name" => "yen1",
                                        "placeholder" => "Yeni şifrenizi girin"
                                    ));
                                    ?>
                                </div>

                                <!-- Yeni Şifre Tekrarı -->
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Yeni Şifre Tekrar</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                    <?php 
                                    Form::Olustur("2", array(
                                        "type" => "password",
                                        "class" => "form-control",
                                        "name" => "yen2",
                                        "placeholder" => "Yeni şifrenizi tekrar girin"
                                    ));
                                    ?>
                                </div>

                                <!-- Form Gönder -->
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi">
                                    <?php 
                                    Form::Olustur("2", array(
                                        "type" => "submit", 
                                        "value" => "ŞİFRE DEĞİŞTİR", 
                                        "class" => "btn btn-success"
                                    ));
                                    Form::Olustur("2", array(
                                        "type" => "hidden", 
                                        "name" => "yonid",
                                        "value" => $veri["sifredegistir"]
                                    )); 
                                    Form::Olustur("kapat");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require 'views/YonPanel/footer.php'; ?>
