<?php require 'views/YonPanel/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid" style="padding: 30px;">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <?php if (isset($veri["bilgi"])): ?>
                <?php echo $veri["bilgi"]; ?>
            <?php endif; ?>

            <?php if (isset($veri["yoneticiekle"])): ?>
                <!-- BAŞLIK -->
                <div class="row text-left border-bottom-mvc mb-2">
                    <div class="col-xl-12 col-md-12 border-left-mvc text-left p-2 mb-2">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> YÖNETİCİ EKLE</h1>
                    </div>
                </div>
                <!-- BAŞLIK -->

                <!-- FORMUN İSKELETİ -->
                <div class="row text-center">
                    <div class="col-xl-4 col-md-6 mx-auto">
                        <div class="row bg-gradient-beyazimsi">
                            <div class="col-12 bg-gradient-mvc pt-2 basliktext2">
                                <h3>Yeni Yönetici Ekle</h3>
                            </div>
                            <div class="col-12 formeleman">Yönetici Adı</div>
                            <div class="col-12 formeleman">
                                <?php 
                                Form::Olustur("1", array(
                                    "action" => URL."/panel/yonekleson",
                                    "method" => "POST"
                                ));
                                Form::Olustur("2", array("type" => "yonad", "class" => "form-control", "name" => "yonadi"));
                                ?>
                            </div>
                            <div class="col-12 formeleman">Şifre</div>
                            <div class="col-12 formeleman">
                                <?php Form::Olustur("2", array("type" => "password", "class" => "form-control", "name" => "sif1")); ?>
                            </div>
                            <div class="col-12 formeleman">Şifre (Tekrar)</div>
                            <div class="col-12 formeleman">
                                <?php Form::Olustur("2", array("type" => "password", "class" => "form-control", "name" => "sif2")); ?>
                            </div>
                            <div class="col-12 formeleman nocizgi">
                                <?php 
                                Form::Olustur("2", array("type" => "submit", "value" => "YÖNETİCİ EKLE", "class" => "btn btn-success"));
                                Form::Olustur("kapat"); 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FORMUN İSKELETİ -->
            <?php endif; ?>

            <?php if (isset($veri["data"])): ?>
                <!-- BAŞLIK -->
                <div class="row text-left border-bottom-mvc mb-2">
                    <div class="col-lg-8 col-xl-8 col-md-12 border-left-mvc text-left p-2 mb-2">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> YÖNETİCİLER</h1>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-md-12 text-right p-2">
                        <a href="<?php echo URL."/panel/yonekle";?>" class="btn btn-sm btn-success">Yeni Yönetici Ekle</a>
                    </div>
                </div>
                <!-- BAŞLIK -->

                <!-- YÖNETİCİLER TABLOSU -->
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mx-auto text-center">
                    <div class="row arkaplan p-2 mt-2 text-center">
                        <div class="col-12 border-right p-2 pt-3 geneltext">
                            <span><h5 class="text-danger">Kayıtlı Yönetici Sayısı : <?php echo count($veri["data"]); ?></h5></span>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                            <span>Yönetici İd</span>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                            <span>Yönetici Adı</span>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 p-2 pt-3 geneltext bg-gradient-mvc">
                            <span>İşlemler</span>
                        </div>
                        <?php 
                        $oturumID = Session::get("Adminid");
                        foreach ($veri["data"] as $value) : ?>
                            <div class="col-12 mt-2 p-0">
                                <div class="row border border-light align-items-center">
                                    <div class="col-lg-5 col-xl-5 col-md-5 col-sm-5 text-dark kalinyap p-2">
                                        <?php echo $value["id"]; ?>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 text-dark kalinyap p-2">
                                        <?php echo $value["ad"]; ?>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 p-2 text-center">
                                        <?php if ($value["id"] != $oturumID): ?>
                                            <a href="<?php echo URL.'/panel/yonSil/'.$value["id"]; ?>" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Bu yöneticiyi silmek istediğinize emin misiniz?');"
                                               title="Yöneticiyi sil">
                                                Sil
                                            </a>
                                        <?php else: ?>
                                            <span class="badge badge-secondary" style="cursor: default;" title="Kendi hesabınızı silemezsiniz.">
                                                Kendi Hesabınız
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- YÖNETİCİLER TABLOSU -->
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php require 'views/YonPanel/footer.php'; ?>