<?php
require_once('base'.DIRECTORY_SEPARATOR.'base.php');

// $user = __cekAuth();

// setPageTitle("Halaman Utama");

?>

<?php require_once('layouts/header.php'); ?>
<img src="<?php echo BASE_URL.'/img/icon/Logo.png'; ?>" alt="logo">
</div>
    <form id="myForm"  name="myForm" method="post" action="" onsubmit="return cekform()">
            <div class="wrap-input100" >
                    <input class="input100" type="text" name="name" placeholder="Nama" value="">
                    <span class="focus-input100 icon-foo" data-placeholder="&#xe82a;"></span>
                </div>
                
            <div class="wrap-input100" >
                    <input class="input100" type="email" name="email" placeholder="Email" value="">
                    <span class="focus-input100" data-placeholder="&#xe818;"></span>
                </div>
                <div class="wrap-input100" >
                    <input class="input100" type="password" name="kataSandi" placeholder="Kata Sandi" value="">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>
                <div class="wrap-input100" >
                    <input class="input100" type="password" name="konfirmasiKataSandi" placeholder="Konfirmasi Kata Sandi" value="">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>
            <input type="submit" value="DAFTAR" class="submit" /><br/>
            <span>Sudah punya akun ? </span><a href="<?php echo BASE_URL.'masuk'; ?>">Masuk</a>
    </form>
<?php require_once('layouts/footer.php'); ?>
                            
                