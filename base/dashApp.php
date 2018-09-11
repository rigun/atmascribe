<div id="dataUser" class="row">
 
</div>

<div class="row">
    <div class="col-12">
    <div class="box-data-user">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Email</th>
                    <th>Catatan</th>
                    <th>Jadwal</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                
                       
            </tbody>
        </table>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-12 ">
        <button id="submit" class="submit col-2 float-right" data-toggle="modal" data-target="#User">Tambah</button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="User" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p>User</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <div class="modal-body">
                        <form id="userAdd"  name="userAdd"  action='#' method='post' onsubmit="return submitDataUser(event,'<?php echo date('Y-m-d H:i:s');?>','<?php echo bin2hex(random_bytes(5))?>')">
                        <input type="hidden" name="id" value="" />
                                <div class="wrap-input100" >
                                        <input class="input100" type="text" id="nama" name="nama" placeholder="Nama" value="">
                                        <span class="focus-input100 icon-foo" data-placeholder="&#xe82a;"></span>
                                </div>
                                <div class="wrap-input100" >
                                        <input class="input100" type="email" id="email" name="email" placeholder="Email" value="">
                                        <span class="focus-input100 icon-foo" data-placeholder="&#xe818;"></span>
                                </div>
                                <div class="wrap-input100" >
                                        <input class="input100" type="password" id="password" placeholder="Password" name="password" value="">
                                        <span class="focus-input100 icon-foo" data-placeholder="&#xe80f;"></span>
                                </div>
                                <div class="wrap-input100" >
                                        <input class="input100" type="password" onkeyup="cekpass()" id="konfirmasi" placeholder="Konfirmasi" value="">
                                        <span class="focus-input100 icon-foo" data-placeholder="&#xe80f;"></span>
                                        <span class="alert-danger" style="margin-left: 65px; font-size: 16px; display: none"></span>
                                </div>
                                <button type="submit" id="submit" class="submit" >Tambah </button><br/>
                                <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                        </form>
                        
                        <div id="success"></div>
                </div>
                
            </div>
            </div>
    </div>
    <!-- End Modal -->