<?php
require_once('..'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR.'base.php');

// $user = __cekAuth();
// setPageTitle("Kriteria");

// $listKriteria = listKriteria();

layout('layouts/header.php');
?>
            <img src="<?php echo BASE_URL.'/img/icon/Logo.png'; ?>" alt="logo">
            </div>
                <div class="paragraf">
                    Silahkan cek email anda untuk melakukan
                    pengaturan ulang kata sandi.
                </div>
                <a href="<?php echo BASE_URL.'masuk'; ?>">Kembali</a>
<?php
    layout('layouts/footer.php');
?>