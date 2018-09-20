function getJadwalById(id){
    var penting = "";
    var dashboard = "";
    var lainnya = "";

        $.getJSON("https://atmascribe.thekingcorp.org/api/jadwal/readByUser.php?id="+id, function(jadwals){
           
            $.each(jadwals.jadwal, function(key, cttn){
                         
            });
            $('#jadwalPenting').html(penting);     
            $('#dashboardJadwalPenting').html(dashboard);     
            $('#jadwalLainnya').html(lainnya);                 
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