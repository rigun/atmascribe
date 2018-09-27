function submitDataUser(e){
    e.preventDefault();
    var data ={
        nama: $('#nama').val(),
        email: $('#email').val(),
        password: $('#password').val(),
    }
    
    var form_data=JSON.stringify(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/user/create.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        // product was created, go back to products list
        alert(result.message);
        getDatauser();
        getSumData();

    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}
function getSumData(){
    var contentHtml = "";
    

    $.getJSON("https://atmascribe.thekingcorp.org/api/user/sumData.php", function(data){
        $.each(data.records, function(key, val){
            if(val.catatan == null){
                val.catatan = 0;
            }
            if(val.jadwal == null){
                val.jadwal = 0;
            }
            if(val.user == null){
                val.user = 0;
            }
            contentHtml += "<div class='col-4'>"+
                                "<div class='box-count blue'>"+
                                   " <h2>Jumlah Pengguna</h2>"+
                                    "<h1>"+val.user+"</h1>"+
                                "</div>  "+
                            "</div>"+
                            "<div class='col-4'>"+
                                "<div class='box-count red'>"+
                                   " <h2>Jumlah Catatan</h2>"+
                                    "<h1>"+val.catatan+"</h1>"+
                                "</div>  "+
                            "</div>"+
                            "<div class='col-4'>"+
                                "<div class='box-count green'>"+
                                   " <h2>Jumlah Jadwal</h2>"+
                                    "<h1>"+val.jadwal+"</h1>"+
                                "</div>  "+
                            "</div>";

        });
        $('#dataUser').html(contentHtml);
    });
}
function getDatauser(){
    var contentHtml = "";
    var number = 1;
    $.getJSON("https://atmascribe.thekingcorp.org/api/user/countData.php", function(data){
        $.each(data.records, function(key, val){
            if(val.catatan == null){
                val.catatan = 0;
            }
            if(val.jadwal == null){
                val.jadwal = 0;
            }
            if(val.total == null){
                val.total = 0;
            }
            contentHtml += "<tr>"+
                            "<span id='' style='display: none' >"+val.id+"</span>"+
                            "<td id=''>"+number+"</td>"+
                            "<td id=''>"+val.email+"</td>"+
                            "<td id=''>"+val.catatan+"</td>"+
                            "<td id=''>"+val.jadwal+"</td>"+
                            "<td id=''>"+val.total+"</td>";
            if(val.status == 0){
                contentHtml +=  "<td id=''><span style='color: red'>Tidak Aktif</a></td>";
            }else if(val.status == 1){
                contentHtml +=  "<td id=''><span style='color: green'>Aktif</a></td>";
            }else{
                contentHtml +=  "<td id=''>Kesalahan Pada server</td>";
            }
                    contentHtml +="</tr> " ;
            number++;
        });
        $('#dataTable').html(contentHtml);
    });
    
}
function deleteDataUser(e){
    e.preventDefault();
    var id = $('#id').attr('value');
    alert(id);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/user/delete.php",
    type : "DELETE",
    data: JSON.stringify({ id: id }),
    contentType : 'application/json',
    success : function(result) {
        // product was created, go back to products list
        alert(result.message);
        $('#DeleteUser').modal('toggle');
        $('tbody#dataReportTable tr#'+id).remove();
        $('tbody#dataReportTable tr#detail'+id).remove();
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}
function updateDataUser(e,status,detail){
    e.preventDefault();
    var id = $('#id'+detail).attr('value');
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/user/updateStatus.php",
    type : "POST",
    data: JSON.stringify({ id: id, status: status}),
    contentType : 'application/json',
    success : function(result) {
        // product was created, go back to products list
        alert(result.message);
        $('#'+detail).modal('toggle');
        alert('berhasil');
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}
function getReport(){
    var reportContent = "";
    var number = 1;
    $.getJSON("https://atmascribe.thekingcorp.org/api/user/read.php", function(data){
        $.each(data.records, function(key, val){
            $.getJSON("https://atmascribe.thekingcorp.org/api/user/readOne.php?id="+val.id, function(dataOne){
             
        
                reportContent +=    "<tr id="+val.id+">"+
                "<span id='' style='display: none' >"+val.id+"</span>"+
                    "<td >"+number+"</td>"+
                    "<td id='uNama"+val.id+"'>"+dataOne.nama+"</td>"+
                    "<td id='uEmail"+val.id+"'>"+dataOne.email+"</td>"+
                    "<td id='uTtl"+val.id+"'>"+dataOne.ttl+"</td>"+
                    "<td id='uKutipan"+val.id+"'>"+dataOne.kutipan+"</td>"+
                    "<td class='row'>"+
                    "<img onclick='showdetail("+val.id+")' src='../img/icon/info.png' />";
                if(val.status == 0){
                    reportContent += "<a data-toggle='modal' data-target='#AktifUser' onclick='updateUserStat(1,"+val.id+")' ><img src='../img/icon/tidak aktif.png' /></a>";
                }else if(val.status == 1){
                    reportContent += "<a data-toggle='modal' data-target='#deAktifUser' onclick='updateUserStat(2,"+val.id+")' ><img src='../img/icon/aktif.png' /></a>";
                }else{
                    reportContent += "Kesalahan Pada Server";
                }
                    reportContent += "<a data-toggle='modal' data-target='#DeleteUser' onclick='deleteModalUser("+val.id+")' ><img src='../img/icon/cancel.svg' /></a>"+
                    "</td>"+
                "</tr>"+
                "<tr id='detail"+val.id+"' style='display: none'>"+
                    "<td id='' colspan='6'>"+
                    "<img src='https://atmascribe.thekingcorp.org/upload/"+val.foto+"' style='width: 150px'>"+
                    "<h1>Jadwal</h1>"+
                    "<table class='table table-custom'>"+
                        "<thead>"+
                            "<tr>"+
                                "<th class='col-1'></th>"+
                                "<th class='col-3'>Jadwal</th>"+
                                "<th class='col-2'>Waktu</th>"+
                                "<th class='col-2'>Tanggal</th>"+
                                "<th class='col-2'>Tempat</th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                        $.each(dataOne.jadwals, function(key, valJadwal){
                            key+=1;
                            reportContent+="<tr>"+
                                "<td class='col-1'>"+key+"</td>"+
                                "<td class='col-5'>"+valJadwal.jadwal+"</td>"+
                                "<td class='col-2'>"+valJadwal.waktu+"</td>"+
                                "<td class='col-2'>"+valJadwal.tanggal+"</td>"+
                                "<td class='col-2'>"+valJadwal.tempat+"</td>"+
                            "</tr>";
                        });
                        reportContent += "</tbody>"+
                    "</table>"+
                    "<h1>Catatan</h1>"+"<table class='table table-custom'>"+
                        "<thead>"+
                            "<tr>"+
                                "<th class='col-1'>No.</th>"+
                                "<th class='col-11'>Catatan</th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>" ;
                        $.each(dataOne.catatans, function(key, valCatatan){
                            key+=1;
                            reportContent +=  "<tr>"+
                                "<td id=''>"+key+"</td>"+
                                "<td id=''>"+valCatatan.catatan+"</td>"+
                                "</tr>";
                        });
                        reportContent += "</tbody>"+
                    "</table>"+
                    "</td>"+
                "</tr>";
                
            number++;
        $('#dataReportTable').html(reportContent);  
            });
        });   
    });
}
function downloadPDF(){
    var doc = new jsPDF("p","px","letter");
    var specialElementHandlers = {
          'DIV to be rendered out': function(element, renderer){
           return true;
        }
    };
    var reportContent = "";
    $.getJSON("https://atmascribe.thekingcorp.org/api/user/read.php", function(data){
        $.each(data.records, function(key, val){
           
            $.getJSON("https://atmascribe.thekingcorp.org/api/user/readOne.php?id="+val.id, function(dataOne){
                reportContent +="<div id='pdf"+key+"'><p>ID : "+val.id+"</p>"+
                "<p>Nama : "+dataOne.nama+"</p>"+
                "<p>Email : "+dataOne.email+"</p>"+
                "<p>Tanggal Lahir : "+dataOne.ttl+"</p>"+
                "<p>Kutipan : "+dataOne.kutipan+"</p>"+
                "<p>Dibuat Pada : "+val.dibuat_pada+"</p>"+
                "<p>Status : "; 
                if(val.status == 0){reportContent+="Tidak Aktif";}else{reportContent+="Aktif";};
    
            reportContent+="</p>"+
                "<h1>Catatan</h1>"+
                "<table>"+
                    "<tr height='80px' >"+
                        "<th>No</th>"+
                        "<th>Catatan</th>"+
                   "</tr>";
                $.each(dataOne.catatans, function(key, valCatatan){
                    key+=1;
                    reportContent+="<tr height='80px'>"+
                        "<td>"+key+"</td>"+
                        "<td>"+valCatatan.catatan+"</td>"+
                        "</tr>";
                });
                reportContent +="</table>"+
                "<h1>Jadwal</h1>"+
                "<table>"+
                "<tr height='80px'>"+
                    "<th>No</th>"+
                    "<th>Jadwal</th>"+
                    "<th>Waktu</th>"+
                    "<th>Tanggal</th>"+
                    "<th>Tempat</th>"+
               "</tr>";
               $.each(dataOne.jadwals, function(key, valJadwal){
                key+=1;
                reportContent+="<tr height='80px'>"+
                    "<td>"+key+"</td>"+
                    "<td>"+valJadwal.jadwal+"</td>"+
                    "<td>"+valJadwal.waktu+"</td>"+
                    "<td>"+valJadwal.tanggal+"</td>"+
                    "<td>"+valJadwal.tempat+"</td>"+
                "</tr>";
            });
            reportContent+="</table></div>";
            $('#reportPDF').html(reportContent);  
            });
               
        });   
    });
    $.getJSON("https://atmascribe.thekingcorp.org/api/user/read.php", function(data){
        $.each(data.records, function(key, val){
            doc.fromHTML($('#pdf'+key).html(), 15, 15, {
                'width': 170,
                    'elementHandlers': specialElementHandlers
            });
            doc.addPage();
        });
        doc.save('reportPDF.pdf');
    });

}

function loginAdmin(e){
    e.preventDefault();
    var data ={
        username: $('#username').val(),
        password: $('#password').val(),
    }
    
    var form_data=JSON.stringify(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/config/login.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        // product was created, go back to products list
        alert(result.message);
        if(result.code == 200){
            window.location = "./index.php";
        }else{
            window.location = "./logout.php";
        }
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}