function submitDataUser(e){
    e.preventDefault();
    var data ={
        nama: $('#nama').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        ttl : null,
        kutipan: null,
        foto: null,
        status: null,
    }
    
    var form_data=JSON.stringify(data);
    $.ajax({
    url: "http://localhost:808/paw/Tubes/api/user/create.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        // product was created, go back to products list
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
    

    $.getJSON("http://localhost:808/paw/Tubes/api/user/sumData.php", function(data){
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
                            "</div>"

        });
        $('#dataUser').html(contentHtml);
    });
}
function getDatauser(){
    var contentHtml = "";
    var number = 1;
    $.getJSON("http://localhost:808/paw/Tubes/api/user/countData.php", function(data){
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
                            "<td id=''>"+val.total+"</td>"+
                        "</tr> " 
            number++;
        });
        $('#dataTable').html(contentHtml);
    });
    
}
function getReport(){
    var reportContent = "";
    var number = 1;
    $.getJSON("http://localhost:808/paw/Tubes/api/user/read.php", function(data){
        $.each(data.records, function(key, val){
            $.getJSON("http://localhost:808/paw/Tubes/api/user/readOne.php?id="+val.id, function(dataOne){
             
                reportContent += "<span id='' style='display: none' >"+val.id+"</span>"+
                    "<tr>"+
                        "<td >"+number+"</td>"+
                        "<td id='uNama"+val.id+"'>"+dataOne.nama+"</td>"+
                        "<td id='uEmail"+val.id+"'>"+dataOne.email+"</td>"+
                        "<td id='uTtl"+val.id+"'>"+dataOne.ttl+"</td>"+
                        "<td id='uKutipan"+val.id+"'>"+dataOne.kutipan+"</td>"+
                        "<td class='row'>"+
                        "<img onclick='showdetail("+val.id+")' src='../img/icon/info.png' />"+
                        "<img src='../img/icon/edit.svg' />"+
                        "<img src='../img/icon/cancel.svg' />"+
                        "</td>"+
                    "</tr>"+
                    "<tr id='detail"+val.id+"' style='display: none'>"+
                        "<td id='' colspan='6'>"+
                        "<img src='"+val.foto+"' style='width: 150px'>"+
                        "<h1>Jadwal</h1>"+
                        "<table class='table table-custom'>"+
                            "<thead>"+
                                "<tr>"+
                                    "<th class='col-1'></th>"+
                                    "<th class='col-3'>Jadwal</th>"+
                                    "<th class='col-2'>Waktu</th>"+
                                    "<th class='col-2'>Tanggal</th>"+
                                    "<th class='col-2'>Tempat</th>"+
                                    "<th class='col-2'>Pengaturan</th>"+
                                "</tr>"+
                            "</thead>"+
                            "<tbody>"
                            $.each(dataOne.jadwals, function(key, valJadwal){
                                key+=1;
                                reportContent +=  "<tr>"+
                                    "<td class='col-1'>"+key+"</td>"+
                                    "<td class='col-3'>"+valJadwal.jadwal+"</td>"+
                                    "<td class='col-2'>"+valJadwal.waktu+"</td>"+
                                    "<td class='col-2'>"+valJadwal.tanggal+"</td>"+
                                    "<td class='col-2'>"+valJadwal.tempat+"</td>"+
                                    "<td id='' class='row'>"+
                                        "<img src='../img/icon/edit.svg' />"+
                                        "<img src='../img/icon/cancel.svg' />"+
                                    "</td>"+
                                "</tr>"
                            });
                            reportContent += "</tbody>"+
                        "</table>"+
                        "<h1>Catatan</h1>"+"<table class='table table-custom'>"+
                            "<thead>"+
                                "<tr>"+
                                    "<th class='col-1'>No.</th>"+
                                    "<th class='col-9'>Catatan</th>"+
                                    "<th class='col-2'>Pengaturan</th>"+
                                "</tr>"+
                            "</thead>"+
                            "<tbody>" 
                            $.each(dataOne.catatans, function(key, valCatatan){
                                reportContent +=  "<tr>"+
                                    "<td id=''>"+key+"</td>"+
                                    "<td id=''>"+valCatatan.catatan+"</td>"+
                                    "<td id='' class='row'>"+
                                        "<img src='../img/icon/edit.svg' />"+
                                        "<img src='../img/icon/cancel.svg' />"+
                                    "</td>"+
                                    "</tr>"
                            });
                            reportContent += "</tbody>"+
                        "</table>"+
                        "</td>"+
                    "</tr>"
                    
                number++;
            $('#dataReportTable').html(reportContent);     
            });
        });   
    });
}