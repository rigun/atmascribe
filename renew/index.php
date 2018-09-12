
<?php
require_once('..'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR.'base.php');

// $user = __cekAuth();
// setPageTitle("Kriteria");

// $listKriteria = listKriteria();

layout('layouts/header.php');
?>
<img src="<?php echo BASE_URL.'/img/icon/Logo.png'; ?>" alt="logo">
            </div>
                <form id="myForm"  name="myForm" method="post" action="" onsubmit="return sendMailPassword(event)">
                        
                            
                        <div class="wrap-input100" >
                                <input id="email" class="input100" type="email" name="email" placeholder="Email" value="">
                                <span class="focus-input100" data-placeholder="&#xe818;"></span>
                            </div>
                            
                        <input type="submit" value="KIRIM LINK" class="submit" /><br/>
                        <span>Sudah punya akun ? </span><a href="<?php echo BASE_URL.'masuk'; ?>">Masuk</a>
                </form>
<?php
    layout('layouts/footer.php');
?>