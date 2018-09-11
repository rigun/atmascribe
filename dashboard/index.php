<?php
require_once('..'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR.'base.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
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
                        <a class="nav-link js-scroll-trigger" href="../akun">Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#">Keluar</a>
                    </li>
                </ul>
            </div>
            </nav>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-8">

                        <div class="data">
                          
                        </div>
                        
                        <div class="buttonApps">

                            <div class="row">
                                <div class="col-6">
                                    <div class="buttonApp jadwal" onclick="updateContent('Jadwal')">
                                        <h2>JadwalKu</h2>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="buttonApp catatan" onclick="updateContent('Catatan')">
                                        <h2>CatatanKu</h2>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="buttonApp kalender" onclick="updateContent('Kalender')">
                                        <h2>KalenderKu</h2>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="buttonApp prioritas" onclick="updateContent('Prioritas')">
                                        <h2>PrioritasKu</h2>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-4">
                        <div class="header-widget">
                            Hari ini
                        </div>
                        <div class="box-widget">
                            <h2>Catatan</h2>
                            <?php
                                $i=0;
                                while($i != 3){
                                    $i++;
                            ?>
                            <div class="row">
                                <div class="col-8">
                                    <span id="<?php echo 'cNama'.$i.'';?>">Bayar Kos</span>
                                    <span id="<?php echo 'cRank'.$i.'';?>" style="display: none">1</span>
                                </div>
                                <div class="col-4">
                                <a  data-toggle="modal" data-target="#EditCatatan" onclick="editModalCatatan('2018-09-06','<?php echo $i;?>')" ><img src="../img/icon/edit.svg" /></a>
                                    <a  data-toggle="modal" data-target="#doneCatatan" onclick="doneCatatan('<?php echo $i;?>')" ><img src="../img/icon/cekMini.svg" /></a>
                                </div>
                            </div>
                            <hr/>
                            <?php
                                }
                            ?>
                            <h2>Jadwal</h2>
                            <?php
                                $i=0;
                                while($i != 3){
                                    $i++;
                                    ?>
                            <div class="row">
                                <div class="col-8">
                                    <span id="<?php echo 'jNama'.$i.'';?>" >Japok <?php echo $i; ?> </span><br/>
                                    <span id="<?php echo 'jWaktu'.$i.'';?>" >18:00</span>, <span id="<?php echo 'jTempat'.$i.'';?>" >Kampus UAJY</span>
                                    <span id="<?php echo 'jRank'.$i.'';?>" style="display: none">1</span> 
                                </div>
                                <div class="col-4">
                                    <a  data-toggle="modal" data-target="#EditJadwal" onclick="editModal('2018-09-06','<?php echo $i;?>')" ><img src="../img/icon/edit.svg" /></a>
                                    <a  data-toggle="modal" data-target="#DeleteJadwal" onclick="deleteModal('<?php echo $i;?>')" ><img src="../img/icon/cancel.svg" /></a>
                                </div>
                            </div>
                            <hr/>
                            <?php
                                }
                             ?>
                            <button id="submit" class="submit" data-toggle="modal" data-target="#Jadwal">Tambah</button>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="Jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>JADWALKU</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                            <form id="myForm"  name="myForm" method="post" action="" onsubmit="return cekform()">
                            <input type="hidden" name="id" value="" />
                                    <div class="wrap-input100" >
                                            <input class="input100" type="text" name="name" placeholder="Nama Kegiatan" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe829;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                            <input class="input100" type="text" name="waktu" placeholder="Mulai Pukul" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe864;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                            <input class="input100" type="date" name="tanggal" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe836;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                            <input class="input100" type="text" name="tempat" placeholder="Tempat" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe833;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                        <div class="radio">
                                            <input type="radio" name="prioritas" value="1"><label>Prioritas</label>
                                            <input type="radio" name="prioritas" value="0"><label>Bukan Prioritas</label>
                                        </div>
                                    </div>
                                        
                                     
                                      
                                    <input type="submit" value="TAMBAH" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->
        <!-- Modal -->
        <div class="modal fade" id="EditJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>JADWALKU</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                            <form id="myForm"  name="myFormEditJadwal" method="post" action="" onsubmit="return cekform()">
                            <input type="hidden" name="id" value="" />
                                    <div class="wrap-input100" >
                                            <input class="input100" type="text" name="name" placeholder="Nama Kegiatan" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe829;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                            <input class="input100" type="text" name="waktu" placeholder="Mulai Pukul" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe864;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                            <input class="input100" type="date" name="tanggal" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe836;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                            <input class="input100" type="text" name="tempat" placeholder="Tempat" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe833;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                        <div class="radio">
                                            <input id="prioritas" type="radio" name="prioritas" value="1"><label>Prioritas</label>
                                            <input id="bukanPrioritas" type="radio" name="prioritas" value="0"><label>Bukan Prioritas</label>
                                        </div>
                                    </div>
                                        
                                     
                                      
                                    <input type="submit" value="UBAH" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->

        <!-- Modal -->
        <div class="modal fade" id="DeleteJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>JADWALKU</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                        <p style="width: 100%;font-size: 40px; text-align: center;">Apakah anda yakin ingin menghapusnya ? </a>
                            <form id="myForm"  name="myForm" method="post" action="" onsubmit="return cekform()">
                            <input type="hidden" name="id" value="" />
                                        
                                     
                                      
                                    <input type="submit" value="Hapus" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->

        <!-- Modal -->
        <div class="modal fade" id="doneCatatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>CATATANKU</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                        <p style="width: 100%;font-size: 40px; text-align: center;">Sudah selesai ?</a>
                            <form id="myForm"  name="myForm" method="post" action="" onsubmit="return cekform()">
                            <input type="hidden" name="id" value="" />
                                        
                                     
                                      
                                    <input type="submit" value="Sudah" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->
        
        <!-- Modal -->
        <div class="modal fade" id="Catatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>CATATANKU</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                            <form id="myForm"  name="myFormCatatan" method="post" action="" onsubmit="return cekform()">
                                    <div class="wrap-input100" >
                                            <input class="input100" type="text" name="name" placeholder="Catatanku" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe828;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                        <div class="radio">
                                            <input  type="radio" name="rank" value="1"><label>Penting</label>
                                            <input type="radio" name="rank" value="0"><label>Lainnya</label>
                                        </div>
                                    </div>
                                    <input type="submit" value="TAMBAH" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->
        <!-- Modal -->
        <div class="modal fade" id="EditCatatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>CATATANKU</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                            <form id="myForm"  name="editCatatan" method="post" action="" onsubmit="return cekform()">
                                    <div class="wrap-input100" >
                                            <input class="input100" type="text" name="name" placeholder="Catatanku" value="">
                                            <span class="focus-input100 icon-foo" data-placeholder="&#xe828;"></span>
                                        </div>
                                    <div class="wrap-input100" >
                                        <div class="radio">
                                            <input id="penting" type="radio" name="rank" value="1"><label>Penting</label>
                                            <input id="lainnya" type="radio" name="rank" value="0"><label>Lainnya</label>
                                        </div>
                                    </div>
                                    <input type="submit" value="UBAH" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->
</body>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/boostrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script src="../js/style.js"></script>
<script>
        function editModal(date,index){
            var jNama = document.getElementById("jNama"+index);
            var jWaktu = document.getElementById("jWaktu"+index);
            var jTempat = document.getElementById("jTempat"+index);
            var jRank = document.getElementById("jRank"+index);

            document.forms["myFormEditJadwal"]["name"].value = jNama.innerHTML;
            document.forms["myFormEditJadwal"]["waktu"].value = jWaktu.innerHTML;
            document.forms["myFormEditJadwal"]["tempat"].value = jTempat.innerHTML;
            document.forms["myFormEditJadwal"]["id"].value = index;
            document.forms["myFormEditJadwal"]["tanggal"].value = date;
            if(jRank.innerHTML == "1"){
                document.getElementById("prioritas").checked = true;
            }else{
                document.getElementById("bukanPrioritas").checked = true;
            }

        }
        function editModalCatatan(date,index){
            var cNama = document.getElementById("cNama"+index);
            var cRank = document.getElementById("cRank"+index);

            document.forms["editCatatan"]["name"].value = cNama.innerHTML;
            document.forms["editCatatan"]["id"].value = index;
            if(cRank.innerHTML == "1"){
                document.getElementById("penting").checked = true;
            }else{
                document.getElementById("lainnya").checked = true;
            }
        }
        
</script>
</html>