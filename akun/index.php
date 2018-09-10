<?php
require_once('..'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR.'base.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../bower_components/boostrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../bower_components/fullcalendar/dist/fullcalendar.css" />
</head>
<body>
    <nav id="mainNav" class="navbar navbar-expand-lg">
        <div class="logoNavbar">
            <div class="row">
                <ul >
                    <li><img src="../img/icon/Logo.png" /></li>
                    <li><p>Atma Scribe</p></li>
                </ul>
   
            </div>
        </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li >
                        <a class="nav-link js-scroll-trigger" href="#">Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#">Keluar</a>
                    </li>
                </ul>
            </div>
            </nav>
        <section id="content">
            <div class="container">
                    <h1 style="color: black;">Akun</h1>

                <div class="row">
                        <div class="col-md-2">
                            <form method="post" action="updateAkun.php" id="akunForm"  name="updateAkunPengguna" enctype="multipart/form-data">
                                <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('../img/LW-603-p28-partner-profile.jpg');">
                                        </div>
                                    </div>
                                <div class="avatar-edit simpan" style="display: none" >
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"><img src="../img/icon/camera.png"></label>
                                </div>
                            <input id="updateAkun" type="submit" class="submit simpan" style="display:none" value="SIMPAN" />
                            <a class="submit ubah" onclick="change()" style="width: 100%; display: block" >UBAH</a>
                            <a class="cancel" onclick="cancel()" style="width: 100%; display: block" >BATAL</a>
                            
                          
                        </div>
                        

                    <div class="col-md-6">
                        <div class="data data-custom" style="max-height: 450px;">
                                <div class="header-box-data">
                                    Tentang Anda
                                </div>
                                <div id="box-data" class="content-box-data listDataAkun">
                                    
                                    <ul >
                                        <li>Nama : <ul>
                                                    <li  class="textList">Barbar</li>
                                                    <li   class="inputList">
                                                        <div class="wrap-input100" >
                                                                <input class="input100" type="text" name="name" placeholder="Nama" value="Barbar">
                                                                <span class="focus-input100 icon-foo" data-placeholder="&#xe82a;"></span>
                                                            </div>
                                                    </li>
                                                   </ul>
                                        </li>
                                        <li>Email : <ul>
                                                    <li class="textList">barbar@barbar.com</li>
                                                    <li class="inputList">
                                                        <div class="wrap-input100" >
                                                                <input class="input100" type="email" name="email" placeholder="Email" value="barbar@barbar.com">
                                                                <span class="focus-input100 icon-foo" data-placeholder="&#xe818;"></span>
                                                            </div>
                                                    </li>
                                                   </ul>
                                        </li>
                                        <li>Tempat, Tanggal Lahir : <ul>
                                                    <li class="textList">Jogja, 06 September 1998</li>
                                                    <li class="inputList">
                                                        <div class="wrap-input100" >
                                                                <input class="input100" type="text" name="ttl" placeholder="Tempat, Tanggal Lahir" value="Jogja, 06 September 1998">
                                                                <span class="focus-input100 icon-foo" data-placeholder="&#xe822;"></span>
                                                            </div>
                                                    </li>
                                                   </ul>
                                        </li>
                                        <li>Kutipan Favorit : <ul>
                                                    <li class="textList">Belajar dan berubah</li>
                                                    <li class="inputList">
                                                    <div class="wrap-input100" >
                                                                <textarea class="input100" style="border:none" type="text" name="kutipan" placeholder="Kutipan Favorit" > Belajar dan berubah </textarea>
                                                                <span class="focus-input100 icon-foo" data-placeholder="&#xe814;"></span>
                                                            </div>
                                                    </li>
                                                   </ul>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-4">

                            <div class="header-widget" style="font-size: 25px;">
                                    Password
                                </div>
                                <div class="box-widget">
                                    <h2 class="ubah" style="color: green; text-align: center;">Tersedia</h2>
                                    <div class="password" style="display: none">
                                        <div class="wrap-input100" >
                                                <input class="input100" type="password" name="kataSandiLama" placeholder="Password Lama" value="">
                                                <span class="focus-input100 icon-foo" data-placeholder="&#xe80f;"></span>
                                        </div>
                                        <div class="wrap-input100" >
                                                <input class="input100" type="password" name="kataSandiBaru" placeholder="Password Baru" value="">
                                                <span class="focus-input100 icon-foo" data-placeholder="&#xe80f;"></span>
                                        </div>
                                        <div class="wrap-input100" >
                                                <input class="input100" type="password" name="kataSandiBaruKonfirmasi" placeholder="Konfirmasi password baru" value="">
                                                <span class="focus-input100 icon-foo" data-placeholder="&#xe80f;"></span>
                                        </div>
                                    </div>
                                    <a class="submit simpan ubahPassword" onclick="chPassword()" style="width: 100%; display: none; color: white;" >UBAH</a>
                                    <a class="cancel simpan" onclick="closePassword()" style="width: 100%; display: none; color: white;" >BATAL</a>
                                    </form>
                                </div>
                        </div>

                </div>
            </div>
        </section>
       
</body>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/boostrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script src="../js/style.js"></script>
</html>