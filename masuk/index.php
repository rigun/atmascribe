
<?php
require_once('..'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR.'base.php');

// $user = __cekAuth();
// setPageTitle("Kriteria");

// $listKriteria = listKriteria();

layout('layouts/header.php');
?>

<img src="<?php echo BASE_URL.'/img/icon/Logo.png'; ?>" alt="logo">
</div>
    <form id="myForm"  name="myForm" method="post" action="" onsubmit="return login(event)">
            
                
            <div class="wrap-input100" >
                    <input class="input100" type="email" id="email" name="email" placeholder="Email" value="">
                    <span class="focus-input100" data-placeholder="&#xe818;"></span>
                </div>
                <div class="wrap-input100" >
                    <input class="input100" type="password" id="password" name="kataSandi" placeholder="Kata Sandi" value="">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>
                
            <input type="submit" value="MASUK" class="submit" /><br/>
            <div class="row">
                <div class="text-left col-7">
                    <span>Belum punya akun ? </span><a href="<?php echo BASE_URL.''; ?>">Daftar</a>
                    
                </div>
                <div class="text-right col-5">
                    <a href="<?php echo BASE_URL.'renew'; ?>">Lupa Kata Sandi ?</a>

                </div>
            </div>
    </form>
<?php
layout('layouts/footer.php');
?>