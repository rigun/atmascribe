<?php
require_once('..'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR.'base.php');

// $user = __cekAuth();
// setPageTitle("Kriteria");

// $listKriteria = listKriteria();

layout('layouts/header.php');
?>
            <img src="<?php echo BASE_URL.'/img/icon/cekLarge.svg'; ?>" alt="logo">
            </div>
                <div class="tilteSuccess">
                    Pendaftaran Berhasil
                </div>
                <div class="paragraf">
                    Silahkan lakukan verifikasi email anda untuk mengaktifkan akun anda
                </div>
                <a href="<?php echo BASE_URL.'masuk'; ?>">Kembali</a>
<?php
    layout('layouts/footer.php');
?>