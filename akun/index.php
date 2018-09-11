<?php
require_once('..'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR.'base.php');
session_start();
$_SESSION['id'] = 6;
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
<body onload="getUserProfile(<?php echo $_SESSION['id']; ?>)">
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
                <div class=" updateDataUser col-12 row">
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
<script src="../js/CRUDuser.js"></script>
</html>