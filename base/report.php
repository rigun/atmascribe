
<div class="row">
<div class="col-12">
        <div class="box-data-user">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Ttl</th>
                        <th>Kutipan</th>
                        <th>Pengaturan</th>
                    </tr>
                </thead>
                <tbody id="dataReportTable">
                </tbody>
            </table>
        </div>
        </div>
</div>

<div class="row">
    <div class="col-12 ">
        <button id="cmd" class="submit col-4 float-right" data-toggle="modal" data-target="#User">Download pdf</button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="DeleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>User</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="width: 100%;font-size: 40px; text-align: center;">Apakah anda yakin ingin menghapusnya ? </a>
                            <form id="myUserFormDelete"  name="myUserFormDelete" action='#' method='Delete' onsubmit="return deleteDataUser(event)">
                                    <input id="id" type="hidden" name="id" value="" />
                                    <input type="submit" value="Hapus" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="AktifUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>User</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="width: 100%;font-size: 40px; text-align: center;">Aktifkan User ini ?  </a>
                            <form id="myAktifUser"  name="myAktifUser" action='#' method='POST' onsubmit="return updateDataUser(event,'1','AktifUser')">
                                    <input id="idAktifUser" type="hidden" name="idAktifUser" value="" />
                                    <input type="submit" value="Aktifkan" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->
<!-- Modal -->
<div class="modal fade" id="deAktifUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>User</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="width: 100%;font-size: 40px; text-align: center;">Non Aktifkan User ini ?  </a>
                            <form id="mydeAktifUser"  name="mydeAktifUser" action='#' method='POST' onsubmit="return updateDataUser(event,'0','deAktifUser')">
                                    <input id="iddeAktifUser" type="hidden" name="iddeAktifUser" value="" />
                                    <input type="submit" value="Non Aktifkan" class="submit" /><br/>
                                    <button class="cancel" data-dismiss="modal" aria-label="Close">BATAL</button>
                            </form>
                    </div>
                    
                </div>
                </div>
        </div>
        <!-- End Modal -->

<script>
function deleteModalUser(id){
    document.forms["myUserFormDelete"]["id"].value = id;
}
function updateUserStat(status,id){
    if(status == 1){
        document.forms["myAktifUser"]["idAktifUser"].value = id;
    }else if(status == 2){
        document.forms["mydeAktifUser"]["iddeAktifUser"].value = id;

    }else{
        alert(status);
    }
}
</script>
<script src="../bower_components/jspdf/dist/jspdf.min.js"></script>
<script>
var doc = new jsPDF();

$('#cmd').click(function () {   
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('report-file.pdf');
});
</script>