<?php
require_once('base'.DIRECTORY_SEPARATOR.'base.php');

// $user = __cekAuth();

// setPageTitle("Halaman Utama");

?>

<?php require_once('layouts/header.php'); ?>
<img src="<?php echo BASE_URL.'/img/icon/Logo.png'; ?>" alt="logo">
</div>
    <form id="myForm"  name="myForm" method="post" action="" onsubmit="return registration(event,'<?php echo date('Y-m-d H:i:s');?>','<?php echo bin2hex(random_bytes(5))?>')">
            <div class="wrap-input100" >
                    <input class="input100" type="text" id="nama" pattern="[A-Za-z ]+" name="nama" placeholder="Nama" value="" required>
                    <span class="focus-input100 icon-foo" data-placeholder="&#xe82a;"></span>
                </div>
                
            <div class="wrap-input100" >
                    <input class="input100" type="email" id="email" name="email" placeholder="Email" value="" onchange="detectEmail(event)" required>
                    <span class="focus-input100" data-placeholder="&#xe818;"></span>
                    <span class="alert" style="display:none"></span>
                </div>
                <div class="wrap-input100" >
                    <input class="input100" type="password" id="password" name="kataSandi" placeholder="Kata Sandi" value="" required  onchange="cekpass()">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>
                <div class="wrap-input100" >
                    <input class="input100" type="password" id="konfirmasi" name="konfirmasiKataSandi" placeholder="Konfirmasi Kata Sandi" value="" required onchange="cekpass()">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    <span class="alertPass" style="display:none"></span>
            </div>
            <input id="registrationSubmit" type="submit" value="DAFTAR" class="submit" /><br/>
            <span>Sudah punya akun ? </span><a href="<?php echo BASE_URL.'masuk'; ?>">Masuk</a>
    </form>
<?php require_once('layouts/footer.php'); ?>
                            
                