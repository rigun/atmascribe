function getJadwalById(id){
    var jadwalUser = "";
    var todayJadwal = "";
    var prioritas = "";
    var headerPrioritas = "";
    var cekPrioritas = 0;
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    today = yyyy + '-' + mm + "-" + dd;

        $.getJSON("https://atmascribe.thekingcorp.org/api/jadwal/getTanggalJadwal.php", function(jadwals){
           
            $.each(jadwals.jadwal, function(key, jdwl){
                    $.getJSON("https://atmascribe.thekingcorp.org/api/jadwal/getJadwalByUser.php?id="+id+"&tanggal="+jdwl.tanggal, function(datajadwals){
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
                        headerPrioritas +="<div class='header-box-data'>"+jdwl.tanggal+
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
                        $.each(datajadwals.jadwal, function(key, dtjdwl){
                            
                            jadwalUser+="<span id='jRank"+dtjdwl.id+"' style='display: none' >"+dtjdwl.prioritas+"</span>"+
                                            "<tr>"+
                                            "<td id='jNama"+dtjdwl.id+"'>"+dtjdwl.jadwal+"</td>"+
                                            "<td id='jWaktu"+dtjdwl.id+"'>"+dtjdwl.waktu+"</td>"+
                                            "<td id='jTempat"+dtjdwl.id+"'>"+dtjdwl.tempat+"</td>"+
                                            "<td><a  data-toggle='modal' data-target='#EditJadwal' onclick='editModal(\""+jdwl.tanggal+"\","+dtjdwl.id+")'><img src='../img/icon/edit.svg'></a>"+
                                            "<a  data-toggle='modal' data-target='#DeleteJadwal' onclick='deleteModal("+dtjdwl.id+")'><img src='../img/icon/cancel.svg' /></a></td>"+
                                            "</tr>";
                            if(jdwl.tanggal == today){
                                todayJadwal+="<div class='row'>"+
                                                "<div class='col-8'>"+
                                                    "<span id='jNama"+dtjdwl.id+"' >"+dtjdwl.jadwal+"</span><br/>"+
                                                    "<span id='jWaktu"+dtjdwl.id+"' >"+dtjdwl.waktu+"</span>, <span id='jTempat"+dtjdwl.id+"' >"+dtjdwl.tempat+"</span>"+
                                                    "<span id='jRank"+dtjdwl.id+"' style='display: none' >"+dtjdwl.prioritas+"</span>"+
                                                "</div>"+
                                                "<div class='col-4'>"+
                                                    "<a  data-toggle='modal' data-target='#EditJadwal' onclick='editModal(\""+jdwl.tanggal+"\","+dtjdwl.id+")'><img src='../img/icon/edit.svg'></a>"+
                                                    "<a  data-toggle='modal' data-target='#DeleteJadwal' onclick='deleteModal("+dtjdwl.id+")'><img src='../img/icon/cancel.svg' /></a>"+
                                                "</div>"+
                                            "</div>"+
                                            "<hr/>";
                            }
                            if(dtjdwl.prioritas == 1){
                                prioritas+="<span id='jRank"+dtjdwl.id+"' style='display: none' >"+dtjdwl.prioritas+"</span>"+
                                            "<tr>"+
                                            "<td id='jNama"+dtjdwl.id+"'>"+dtjdwl.jadwal+"</td>"+
                                            "<td id='jWaktu"+dtjdwl.id+"'>"+dtjdwl.waktu+"</td>"+
                                            "<td id='jTempat"+dtjdwl.id+"'>"+dtjdwl.tempat+"</td>"+
                                            "<td><a  data-toggle='modal' data-target='#EditJadwal' onclick='editModal(\""+jdwl.tanggal+"\","+dtjdwl.id+")'><img src='../img/icon/edit.svg'></a>"+
                                            "<a  data-toggle='modal' data-target='#DeleteJadwal' onclick='deleteModal("+dtjdwl.id+")'><img src='../img/icon/cancel.svg' /></a></td>"+
                                            "</tr>";
                                cekPrioritas = 1;
                            }

                        });
                    if(cekPrioritas != 0){
                        prioritas+="</tbody></table></div>";
                        headerPrioritas += prioritas;
                        cekPrioritas = 0 ;
                    }else{
                        prioritas="";
                        headerPrioritas= "";
                    }
                    jadwalUser+="</tbody></table></div>";
                    $('#jadwalContent').html(jadwalUser);  
                    $('#dashboardJadwalHariini').html(todayJadwal);  
                    $('#prioritasContentData').html(headerPrioritas);  
                    });

            });
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
        jadwal : $('#jadwalJe').val(),
        waktu : $('#waktuJe').val(),
        tanggal : $('#tanggalJe').val(),
        tempat : $('#tempatJe').val(),
        prioritas : $('input[name="prioritasJe"]:checked').val(),
        id : $('#jIdE').val(),
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
function deleteJadwalData(e, userId){

    e.preventDefault();
        var data ={
            id : $('#jIdD').val(),
        }
        
        var form_data=JSON.stringify(data);
        $.ajax({
        url: "https://atmascribe.thekingcorp.org/api/jadwal/delete.php",
        type : "DELETE",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            $('#DeleteJadwal').modal('toggle');
            getJadwalById(userId);
        },
            error: function(xhr, resp, text) {
                // show error to console
                console.log(xhr, resp, text);
            }
        });

}