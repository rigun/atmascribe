function getCatatanById(id){
    var penting = "";
    var lainnya = "";

        $.getJSON("https://atmascribe.thekingcorp.org/api/catatan/readByUser.php?id="+id, function(catatans){
           
            $.each(catatans.records, function(key, catatan){
                if(catatan.prioritas === 1){
                    penting += '<tr>'+
                                '<td> <span id="cNama"'+catatan.id+'>'+catatan.catatan+'</span> <span id="cRank"'+catatan.id+' style="display:none">1</span></td>'+
                                '<td> <a  data-toggle="modal" data-target="#EditCatatan" onclick="editModalCatatan("2018-09-06",'+catatan.id+')" ><img src="../img/icon/edit.svg" /></a>'+
                                    '<a  data-toggle="modal" data-target="#doneCatatan" onclick="doneCatatan('+catatan.id+')" ><img src="../img/icon/cekMini.svg" /></a></td>'+
                                '</tr>'
                }else if(catatan.prioritas === 0){
                    lainnya += '<tr>'+
                                '<td> <span id="cNama"'+catatan.id+'>'+catatan.catatan+'</span> <span id="cRank"'+catatan.id+' style="display:none">0</span></td>'+
                                '<td> <a  data-toggle="modal" data-target="#EditCatatan" onclick="editModalCatatan("2018-09-06",'+catatan.id+')" ><img src="../img/icon/edit.svg" /></a>'+
                                    '<a  data-toggle="modal" data-target="#doneCatatan" onclick="doneCatatan('+catatan.id+')" ><img src="../img/icon/cekMini.svg" /></a></td>'+
                                '</tr>'
                }else{
                    penting += "kesalahan pada server";
                }
                
            });               
        $('#catatanPenting').html(penting);     
        $('#catatanLainnya').html(lainnya);     
        });

}
function createCatatan(e, id){
    e.preventDefault();
    var data ={
        catatan: $('#catatanName').val(),
        prioritas: $('input[name="rank"]:checked').val(),
        user_id : id,
    }
    
    var form_data=JSON.stringify(data);
    console.log(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/catatan/create.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        $('#Catatan').modal('toggle');
        getCatatanById(id);
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}