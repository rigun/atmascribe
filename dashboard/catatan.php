<div class="row">
    <div class="col-8">
        <h1>CATATANKU</h1>
    </div>
    <div class="col-4">
        <button class="submit" data-toggle="modal" data-target="#Catatan"> Tambah </button>
    </div>
</div>
<div class="header-box-data">
    PENTING
</div>

<!-- box start -->
<div class="content-box-data">
    <table class="table table-hover">
        <thead>
            <tr>
            <th>Catatan</th>
            <th>Pengaturan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             $i=0;
             while($i!=4){
                 $i++;
            ?>
            <tr>
            <td> <span id="<?php echo 'cNama'.$i.''; ?>">Bayar Kos</span> <span id="<?php echo 'cRank'.$i.''; ?>" style="display:none">1</span></td>
            <td> <a  data-toggle="modal" data-target="#EditCatatan" onclick="editModalCatatan('2018-09-06','<?php echo $i;?>')" ><img src="../img/icon/edit.svg" /></a>
                 <a  data-toggle="modal" data-target="#doneCatatan" onclick="doneCatatan('<?php echo $i;?>')" ><img src="../img/icon/cekMini.svg" /></a></td>
            </tr>
            <?php
                }
            ?>

           
        </tbody>
    </table>
    
</div>
<!-- box End -->

<!-- box start -->
<div class="header-box-data">
    LAINNYA
</div>
<div class="content-box-data">
    <table class="table table-hover">
        <thead>
            <tr>
            <th>Catatan</th>
            <th>Pengaturan</th>
            </tr>
        </thead>
        <tbody>
        <?php 
             $i=5;
             while($i!=8){
                 $i++;
            ?>
            <tr>
            <td> <span id="<?php echo 'cNama'.$i.''; ?>">Beli Baju</span> <span id="<?php echo 'cRank'.$i.''; ?>" style="display:none">0</span></td>
            <td> <a  data-toggle="modal" data-target="#EditCatatan" onclick="editModalCatatan('2018-09-06','<?php echo $i;?>')" ><img src="../img/icon/edit.svg" /></a>
                 <a  data-toggle="modal" data-target="#doneCatatan" onclick="doneCatatan('<?php echo $i;?>')" ><img src="../img/icon/cekMini.svg" /></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    
</div>
<!-- box-end -->