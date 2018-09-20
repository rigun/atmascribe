function getJadwalById(id){
    const jadwalUser = "";
    var dataJadwal = "";
    var lainnya = "";

        $.getJSON("https://atmascribe.thekingcorp.org/api/jadwal/getTanggalJadwal.php", function(jadwals){
           
            $.each(jadwals.jadwal, function(key, jdwl){
                jadwalUser+="<div class='header-box-data'>"+jdwl.tanggal+
                                    "</div>"+
                                "<div class='content-box-data'>"+
                                    "<table class='table table-hover'>"+
                                        "<thead>"+
                                           "<tr>"+
                                            "<th>Kegiatan</th>"+
                                            "<th>Mulai</th>"+
                                            "<th>Tempat</th>"+
                                            "<th>Pengaturan</th>"+
                                            "</tr>"+
                                        "</thead>"+
                                        "<tbody>";
                    $.getJSON("https://atmascribe.thekingcorp.org/api/jadwal/getJadwalByUser.php?id="+id+"&tanggal="+jdwl.tanggal, function(datajadwals){
                        $.each(datajadwals.jadwal, function(key, dtjdwl){
                            
                            jadwalUser+="<span id='jRank"+dtjdwl.id+"' style='display: none' >"+dtjdwl.id+"</span>"+
                                            "<tr>"+
                                            "<td id='jNama"+dtjdwl.id+"'>"+dtjdwl.jadwal+"</td>"+
                                            "<td id='jWaktu"+dtjdwl.id+"'>"+dtjdwl.waktu+"</td>"+
                                            "<td id='jTempat"+dtjdwl.id+"'>"+dtjdwl.tempat+"</td>"+
                                            "<td><a  data-toggle='modal' data-target='#EditJadwal' onclick='editModal("+dtjdwl.id+")'><img src='../img/icon/edit.svg'></a>"+
                                            "<a  data-toggle='modal' data-target='#DeleteJadwal' onclick='deleteModal("+dtjdwl.id+")'><img src='../img/icon/cancel.svg' /></a></td>"+
                                            "</tr>";
                        });
                    });
                    jadwalUser+="</tbody></table></div>";
            });
            console.log(jadwalUser);
            $('#jadwalContent').html(jadwalUser);  
        });

}
function createJadwal(e, id){
    e.preventDefault();
    var data ={
        jadwal : $('#jadwalJ').val(),
        waktu : $('#waktuJ').val(),
        tanggal : $('#tanggalJ').val(),
        tempat : $('#tempatJ').val(),
        prioritas : $('input[name="prioritasJ"]:checked').val(),
        user_id : id
    }
    
    var form_data=JSON.stringify(data);
    console.log(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/jadwal/create.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        $('#Jadwal').modal('toggle');
        getJadwalById(id);
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}

function editJadwalData(e, userId){
    e.preventDefault();
    var data ={
        jadwal: $('#jadwalNameE').val(),
        prioritas: $('input[name="rankE"]:checked').val(),
        id : $('#cIdE').val(),
    }
    
    var form_data=JSON.stringify(data);
    console.log(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/jadwal/update.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        $('#EditJadwal').modal('toggle');
        getJadwalById(userId);
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });


}
function doneJadwalData(e, userId){

    e.preventDefault();
        var data ={
            id : $('#cIdD').val(),
        }
        
        var form_data=JSON.stringify(data);
        $.ajax({
        url: "https://atmascribe.thekingcorp.org/api/jadwal/delete.php",
        type : "DELETE",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            $('#doneJadwal').modal('toggle');
            getJadwalById(userId);
        },
            error: function(xhr, resp, text) {
                // show error to console
                console.log(xhr, resp, text);
            }
        });

}