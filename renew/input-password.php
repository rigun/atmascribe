
<?php
require_once('..'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR.'base.php');

// $user = __cekAuth();
// setPageTitle("Kriteria");

// $listKriteria = listKriteria();

layout('layouts/header.php');
if(isset($_GET['token']))
{
?>
<img src="<?php echo BASE_URL.'/img/icon/Logo.png'; ?>" alt="logo">
            </div>
                <form id="myForm"  name="myForm" method="post" action="" onsubmit="return updatePassword(event,'<?php echo $_GET['token'];?>','<?php echo bin2hex(random_bytes(5))?>')">
                        
                            
                <div class="wrap-input100" >
                    <input class="input100" type="password" id="password" name="kataSandi" placeholder="Kata Sandi" value="" required  onchange="cekpass()">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                    <div class="wrap-input100" >
                        <input class="input100" type="password" id="konfirmasi" name="konfirmasiKataSandi" placeholder="Konfirmasi Kata Sandi" value="" required onchange="cekpass()">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        <span class="alertPass" style="display:none"></span>
                </div>
                            
                        <input type="submit" value="ATUR ULANG KATA SANDI" class="submit" /><br/>
                </form>
<?php
    layout('layouts/footer.php');
}else{
    header("location: index.php");
}
?>