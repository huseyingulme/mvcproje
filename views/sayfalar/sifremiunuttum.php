<?php require 'views/header.php'; ?>
<div class="content">
  <div class="container">
    <div class="row justify-content-center" style="margin-top:40px;">
      <div class="col-md-6">
        <div class="card shadow" style="padding:30px 25px;">
          <h3 class="text-center mb-3" style="font-weight:bold;">Şifremi Unuttum</h3>
          <p class="text-center mb-4" style="color:#666;">Kullanıcı adınızı ve mail adresinizi girin. Yeni şifreniz ekranda gösterilecektir.</p>
          <?php if (isset($veri["bilgi"])) echo $veri["bilgi"]; ?>
          <form action="<?php echo URL; ?>/uye/sifremiunuttumkontrol" method="POST">
            <div class="form-group mb-3">
              <label for="ad">Kullanıcı Adı</label>
              <input type="text" class="form-control" id="ad" name="ad" required>
            </div>
            <div class="form-group mb-4">
              <label for="mail">Mail</label>
              <input type="email" class="form-control" id="mail" name="mail" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-success btn-block">Yeni Şifre Al</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require 'views/footer.php'; ?> 