<div class="row">
    <div class="col-8">
        <h1>JADWALKU</h1>
    </div>
    <div class="col-4">
        <button class="submit" data-toggle="modal" data-target="#Jadwal"> Tambah </button>
    </div>
</div>
<?php 
    $j = 0;
    while($j != 3){
        $j++;
?>
    
<div class="header-box-data">
    Jumat, 31 Agt 2018
</div>
<div class="content-box-data">
    <table class="table table-hover">
        <thead>
            <tr>
            <th>Kegiatan</th>
            <th>Mulai</th>
            <th>Tempat</th>
            <th>Pengaturan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=4;
                while($i!=6){
                    $i++;
            ?>
            <span id="<?php echo 'jRank'.$i.'';?>" style="display: none" >1</span>
            <tr>
            <td id="<?php echo 'jNama'.$i.'';?>">Japok <?php echo $i; ?></td>
            <td id="<?php echo 'jWaktu'.$i.'';?>">18.00</td>
            <td id="<?php echo 'jTempat'.$i.'';?>">Kampus UAJY</td>
            <td><a  data-toggle="modal" data-target="#EditJadwal" onclick="editModal('2018-09-06','<?php echo $i;?>')" ><img src="../img/icon/edit.svg"></a>
            <a  data-toggle="modal" data-target="#DeleteJadwal" onclick="deleteModal('<?php echo $i;?>')" ><img src="../img/icon/cancel.svg" /></a></td>
            </tr>
            <?php
                }
            ?>
            
        </tbody>
    </table>
    
</div>
<?php
    }
?>
