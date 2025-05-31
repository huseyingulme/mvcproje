<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');
?>

<?php require 'views/header.php'; ?>


  <div class="content">
	<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?php echo URL; ?>" title="Anasayfa">Anasayfa</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Giriş
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?php echo URL; ?>">Geri Dön</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
               
			  	 <h2>HEMEN ÜYE OL</h2>
				 <p>Yeni üye olarak, avantajları yakalayabilirisin.</p>
				 <a class="acount-btn" href="<?php echo URL; ?>/uye/hesapOlustur">ÜYE OL</a>
			   </div>
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<h3>ÜYE GİRİŞİ</h3>
				<p>Üye girişi yaparak, siparişlerinizi hızlı ve kolay bir şekilde verebilirsiniz.</p>
                <form action="<?php echo URL; ?>/uye/giriskontrol" method="POST">
                  <div>
                    <span>Kullanıcı Adı<label>*</label></span>
                    <input type="text" name="ad" required value="<?php echo isset($_COOKIE['uyead']) ? htmlspecialchars($_COOKIE['uyead']) : ''; ?>">
                  </div>
                  <div>
                    <span>Şifre<label>*</label></span>
                    <input type="password" name="sifre" required value="<?php echo isset($_COOKIE['uyesifre']) ? htmlspecialchars($_COOKIE['uyesifre']) : ''; ?>">
                  </div>
                  <div class="form-group" style="margin-bottom: 15px;">
                    <label style="font-weight: normal;">
                      <input type="checkbox" name="benihatirla" value="1" style="vertical-align: middle; margin-right: 5px;" <?php if(isset($_COOKIE['uyead'])) echo 'checked'; ?>>
                      Beni Hatırla
                    </label>
                  </div>
                  <div style="margin:10px 0 10px 0;">
                    <?php if (isset($veri["bilgi"])) echo $veri["bilgi"]; ?>
                  </div>
                  <a class="forgot" href="<?php echo URL; ?>/uye/sifremiunuttum">Şifremi Unuttum?</a>
                  <input type="hidden" name="giristipi" value="uye">
                  <input type="submit" value="GİRİŞ">
                </form>
                  
            
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>

<script>
if (window.performance && window.performance.navigation.type === 2) {
    // Eğer geri tuşuyla gelindiyse, panel giriş sayfasına yönlendir
    window.location.href = "<?php echo URL; ?>/panel/giris";
}
</script>

<?php require 'views/footer.php'; ?> 		
        
        
        
       