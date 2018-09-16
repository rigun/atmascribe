<?php
require_once('base'.DIRECTORY_SEPARATOR.'base.php');

// $user = __cekAuth();

// setPageTitle("Halaman Utama");

?>

<?php require_once('layouts/header.php'); ?>
<img src="<?php echo BASE_URL.'/img/icon/Logo.png'; ?>" alt="logo">
            </div>
                <div class="paragraf">
                    Email anda berhasil diverifikasi<br/>
                    Terima kasih sudah mendaftar <br/>
                </div>
                <script>
                     setTimeout(function(){window.location = 'index.php';}, 2000)
        
                    </script>
<?php require_once('layouts/footer.php'); ?>
                            
                