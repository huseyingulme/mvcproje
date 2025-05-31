<?php require 'views/YonPanel/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12 text-center">
            <?php if (isset($veri["bilgi"])): ?>
                <?php echo $veri["bilgi"]; ?>
            <?php endif; ?>

            <?php if (isset($veri["Uyeguncelle"]) && !$_POST): ?>
                <!-- Member Update Form -->
                <div class="row text-left border-bottom-mvc mb-2">
                    <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> ÜYE GÜNCELLE</h1>
                    </div>
                </div>

                <div class="col-xl-12 col-md-12 text-center">
                    <div class="row text-center">
                        <div class="col-xl-4 col-md-6 mx-auto">
                            <div class="row bg-gradient-beyazimsi">
                                <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2">
                                    <h3>Üye Bilgileri Güncelle</h3>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Üye Adı</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                    <?php 
                                    Form::Olustur("1", array(
                                        "action" => URL . "/panel/uyeguncelleSon",
                                        "method" => "POST"
                                    ));
                                    Form::Olustur("2", array(
                                        "type" => "text",
                                        "value" => htmlspecialchars($veri["Uyeguncelle"][0]["ad"]),
                                        "class" => "form-control",
                                        "name" => "ad"
                                    ));
                                    ?>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Üye Soyadı</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                    <?php 
                                    Form::Olustur("2", array(
                                        "type" => "text",
                                        "value" => htmlspecialchars($veri["Uyeguncelle"][0]["soyad"]),
                                        "class" => "form-control",
                                        "name" => "soyad"
                                    ));
                                    ?>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Mail Adresi</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                    <?php 
                                    Form::Olustur("2", array(
                                        "type" => "text",
                                        "value" => htmlspecialchars($veri["Uyeguncelle"][0]["mail"]),
                                        "class" => "form-control",
                                        "name" => "mail"
                                    ));
                                    ?>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Telefon</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                    <?php 
                                    Form::Olustur("2", array(
                                        "type" => "text",
                                        "value" => htmlspecialchars($veri["Uyeguncelle"][0]["telefon"]),
                                        "class" => "form-control",
                                        "name" => "telefon"
                                    ));
                                    ?>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi">
                                    <?php 
                                    Form::Olustur("2", array("type" => "submit", "value" => "GÜNCELLE", "class" => "btn btn-success"));
                                    Form::Olustur("2", array("type" => "hidden", "name" => "uyeid", "value" => htmlspecialchars($veri["Uyeguncelle"][0]["id"])));
                                    Form::Olustur("kapat");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (isset($veri["UyeadresBak"])): ?>
                <!-- Member Address View -->
                <div class="row text-left border-bottom-mvc mb-2">
                    <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> ÜYE ADRESLERİ</h1>
                    </div>
                </div>

                <div class="col-xl-12 col-md-12 text-center">
                    <div class="row text-center">
                        <div class="col-xl-4 col-md-6 mx-auto">
                            <div class="row bg-gradient-beyazimsi">
                                <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2">
                                    <h3>Üye Adres Bilgileri</h3>
                                </div>
                                <?php if (!empty($veri["UyeadresBak"])): ?>
                                    <?php foreach ($veri["UyeadresBak"] as $index => $adres): ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Adres <?php echo ($index + 1); ?></div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                            <div class="form-control"><?php echo htmlspecialchars($adres["adres"]); ?></div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Şehir</div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                            <div class="form-control">
                                                <?php 
                                                // Check for alternative column names for city
                                                if (isset($adres["il"])) {
                                                    echo htmlspecialchars($adres["il"]);
                                                } elseif (isset($adres["sehir_adi"])) {
                                                    echo htmlspecialchars($adres["sehir_adi"]);
                                                } else {
                                                    // Parse city from adres (e.g., "istanbul" at the end)
                                                    $addressParts = explode(" ", trim($adres["adres"]));
                                                    $city = end($addressParts); // Last word (e.g., "istanbul")
                                                    echo htmlspecialchars($city);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Varsayılan</div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 formeleman">
                                            <div class="form-control">
                                                <?php 
                                                // Check for a "varsayilan" column to indicate default address
                                                if (isset($adres["varsayilan"])) {
                                                    echo $adres["varsayilan"] == 1 ? "Evet" : "Hayır";
                                                } elseif (isset($adres["is_default"])) {
                                                    echo $adres["is_default"] == 1 ? "Evet" : "Hayır";
                                                } else {
                                                    echo "Bilinmiyor"; // Placeholder if no default field exists
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Bu üye için adres bulunamadı.</div>
                                <?php endif; ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi">
                                    <a href="<?php echo URL; ?>/panel/uyeler" class="btn btn-primary">Geri Dön</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (isset($veri["data"])): ?>
                <!-- Member List -->
                <div class="row text-left border-bottom-mvc mb-2">
                    <div class="col-lg-2 col-xl-2 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> ÜYELER</h1>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-12 mb-12 p-2">
                        <h1 class="h3 mb-0 text-gray-800">Toplam Üye: <?php echo count($veri["data"]); ?></h1>
                    </div>
                    <div class="col-xl-7 col-md-12 mb-12 text-right">
                        <div class="row">
                            <div class="col-xl-4 pt-2">ÜYE ARA</div>
                            <div class="col-xl-4">
                                <?php 
                                Form::Olustur("1", array(
                                    "action" => URL . "/panel/uyearama",
                                    "method" => "POST"
                                ));
                                Form::Olustur("2", array(
                                    "type" => "text",
                                    "name" => "aramaverisi",
                                    "class" => "form-control",
                                    "placeholder" => "Herhangi bir kriter"
                                ));
                                ?>
                            </div>
                            <div class="col-xl-4">
                                <?php 
                                Form::Olustur("2", array(
                                    "type" => "submit",
                                    "value" => "ARA",
                                    "class" => "btn btn-sm btn-mvc btn-block mt-1"
                                ));
                                Form::Olustur("kapat");
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row arkaplan p-1 mt-2 pb-0">
                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Üye İd</span>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Üye Adı</span>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Üye Soyadı</span>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Mail Adresi</span>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Telefon</span>
                    </div>
                    
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>İşlemler</span>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>    </span>
                    </div>

                    <?php foreach ($veri["data"] as $value): ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 p-0">
                            <div class="row border-bottom">
                                <div class="col-lg-1 col-xl-1 col-md-12 col-sm-12 text-dark kalinyap p-2"><?php echo htmlspecialchars($value["id"]); ?></div>
                                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 text-dark kalinyap p-2"><?php echo htmlspecialchars($value["ad"]); ?></div>
                                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 text-dark kalinyap p-2"><?php echo htmlspecialchars($value["soyad"]); ?></div>
                                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 text-dark kalinyap p-2"><?php echo htmlspecialchars($value["mail"]); ?></div>
                                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 text-dark kalinyap p-2"><?php echo htmlspecialchars($value["telefon"]); ?></div>
                                
                                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 text-center kalinyap p-2">
                                    <a href="<?php echo URL; ?>/panel/uyeadresbak/<?php echo $value["id"]; ?>" class="fas fa-address-book adresbuton"></a>
                                    <a href="<?php echo URL; ?>/panel/uyeGuncelle/<?php echo $value["id"]; ?>" class="fas fa-sync guncelbuton mt-1"></a>
                                    <a href="<?php echo URL; ?>/panel/uyeSil/<?php echo $value["id"]; ?>" class="fas fa-times silbuton"></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require 'views/YonPanel/footer.php'; ?>