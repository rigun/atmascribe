function getUserProfile(id){
    var userContent = "";
    var number = 1;
    $.getJSON("https://atmascribe.thekingcorp.org/api/user/userDatabyId.php?id="+id, function(dataUser){
        userContent +=  '<div class="col-md-2">'+
                        '<form method="post" action="#" id="akunForm"  name="updateAkunPengguna" enctype="multipart/form-data" onsubmit="updateAllProfile(event,'+id+')">'+
                        '<div class="avatar-preview">'+
                                        '<div id="imagePreview" style="background-image: url('+"../upload/"+id+'.png);">'+
                                        '</div>'+
                                    '</div>'+
                                '<div class="avatar-edit simpan" style="display: none" >'+
                                        '<input type="file" name="imageUpload" id="imageUpload" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />'+
                                        '<label for="imageUpload"><img src="../img/icon/camera.png"></label>'+
                                '</div>'+
                            '<input id="updateAkun" type="submit" class="submit simpan" style="display:none" value="SIMPAN" />'+
                            '<a class="submit ubah" onclick="change()" style="width: 100%; display: block" >UBAH</a>'+
                            '<a class="cancel" onclick="cancel()" style="width: 100%; display: block" >BATAL</a>'+
                            
                          
                        '</div>'+
                        

                    '<div class="col-md-6">'+
                        '<div class="data data-custom" style="max-height: 450px;">'+
                                '<div class="header-box-data">'+
                                    'Tentang Anda'+
                                '</div>'+
                                '<div id="box-data" class="content-box-data listDataAkun">'+
                                    
                                    '<ul >'+
                                        '<li>Nama : <ul>'+
                                                    '<li  class="textList">'+dataUser.nama+'</li>'+
                                                    '<li   class="inputList">'+
                                                        '<div class="wrap-input100" >'+
                                                                '<input id="nama" class="input100" type="text" name="name" placeholder="Nama" value="'+dataUser.nama+'">'+
                                                                '<span class="focus-input100 icon-foo" data-placeholder="&#xe82a;"></span>'+
                                                            '</div>'+
                                                    '</li>'+
                                                   '</ul>'+
                                       ' </li>'+
                                        '<li>Email : <ul>'+
                                                    '<li class="textList">'+dataUser.email+'</li>'+
                                                    '<li class="inputList">'+
                                                        '<div class="wrap-input100" >'+
                                                                '<input id="email" class="input100" type="email" name="email" placeholder="Email" value="'+dataUser.email+'">'+
                                                                '<span class="focus-input100 icon-foo" data-placeholder="&#xe818;"></span>'+
                                                            '</div>'+
                                                    '</li>'+
                                                   '</ul>'+
                                        '</li>'+
                                        '<li>Tanggal Lahir : <ul>'+
                                                    '<li class="textList">'+dataUser.ttl+'</li>'+
                                                    '<li class="inputList">'+
                                                        '<div class="wrap-input100" >'+
                                                                '<input id="ttl" class="input100" type="date" name="ttl" placeholder="Tanggal Lahir" value="'+dataUser.ttl+'">'+
                                                                '<span class="focus-input100 icon-foo" data-placeholder="&#xe822;"></span>'+
                                                            '</div>'+
                                                    '</li>'+
                                                   '</ul>'+
                                        '</li>'+
                                        '<li>Kutipan Favorit : <ul>'+
                                                    '<li class="textList">'+dataUser.kutipan+'</li>'+
                                                    '<li class="inputList">'+
                                                    '<div class="wrap-input100" >'+
                                                                '<textarea id="kutipan" class="input100" style="border:none" type="text" name="kutipan" placeholder="Kutipan Favorit" >'+dataUser.kutipan+'</textarea>'+
                                                                '<span class="focus-input100 icon-foo" data-placeholder="&#xe814;"></span>'+
                                                            '</div>'+
                                                    '</li>'+
                                                   '</ul>'+
                                        '</li>'+
                                    '</ul>'+
                            '</div>'+
                        '</div>'+
                   ' </div>'
        
        userContent += '<div class="col-md-4">'+
                   '<div class="header-widget" style="font-size: 25px;">'+
                                              'Password'+
                                          '</div>'+
                       '<div class="box-widget">'+
                                                 ' <h2 class="ubah" style="color: green; text-align: center;">Tersedia</h2>'+
                           '<div class="password" style="display: none">'+
                                                          '<div class="wrap-input100" >'+
                                                                  '<input id="passwordL" class="input100" type="password" name="kataSandiLama" placeholder="Password Lama" value="">'+
                                                                  '<span class="focus-input100 icon-foo" data-placeholder="&#xe80f;"></span>'+
                               '</div>'+
                               '<div class="wrap-input100" >'+
                                                                      '<input id="passwordB" class="input100" type="password" name="kataSandiBaru" placeholder="Password Baru" onchange="cekpassB()" value="">'+
                                                                      '<span class="focus-input100 icon-foo" data-placeholder="&#xe80f;"></span>'+
                               '</div>'+
                               '<div class="wrap-input100" >'+
                                                                      '<input id="passwordKB" class="input100" type="password" name="kataSandiBaruKonfirmasi" placeholder="Konfirmasi password baru" onchange="cekpassB()" value="">'+
                                                                      '<span class="focus-input100 icon-foo" data-placeholder="&#xe80f;" ></span>'+
                                                                      '<span class="alertPass" style="display:none"></span>'+
                               '</div>'+
                           '</div>'+
                           '<a class="submit simpan ubahPassword" onclick="chPassword()" style="width: 100%; display: none; color: white;" >UBAH</a>'+
                           '<a class="cancel simpan" onclick="closePassword()" style="width: 100%; display: none; color: white;" >BATAL</a>'+
                           '</form>'+
                       '</div>'+
               '</div>'
            
    $('.updateDataUser').html(userContent);     
    });

}
$("#uploadimage").on('submit',(function(e) {
    console.log("test");
    e.preventDefault();
        $.ajax({
        url: "https://atmascribe.thekingcorp.org/api/user/uploadPicture.php?id="+$('#user_id').text(), // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       
        cache: false,             
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
            console.log(data);
        }
    });
}));
function updateAllProfile(e,id){
    e.preventDefault();
    console.log(this);
    if($('#ttl').val() == ""){
        var ttl = null;
    }else{
        var ttl = $('#ttl').val();
    }

    if($('#kutipan').val() == ""){
        var kutipan = null;
    }else{
        var kutipan = $('#kutipan').val();
    }
    if($('#passwordB').val() == ""){
        var passwordB = null;
    }else{
        var passwordB = $('#passwordB').val();
    }
    if($('#passwordL').val() == ""){
        var passwordL = null;
    }else{
        var passwordL = $('#passwordL').val();
    }

    var data ={
        id: id,
        nama: $('#nama').val(),
        email: $('#email').val(),
        password: passwordB,
        passwordL: passwordL,
        ttl : ttl,
        kutipan: kutipan,
        foto: null,
    }
    var form_data=JSON.stringify(data);
    console.log(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/user/update.php",
    type : "POST",
    data: form_data,
    contentType : 'application/json',
    success : function(result) {
        // product was created, go back to products list
        alert(result.message);
        cancel();
        getUserProfile(id);
    },
        error: function(xhr, resp, text) {
            // show error to console
            alert("Gagal");
            console.log(xhr, resp, text);
        }
    });
}
function updatePassword(e,token, newToken){
    e.preventDefault();
   

    var data ={
        token: token,
        newToken: newToken,
        password: $('#password').val()
    }
    var form_data=JSON.stringify(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/user/updatePassword.php",
    type : "POST",
    data: form_data,
    contentType : 'application/json',
    success : function(result) {
        // product was created, go back to products list
        alert(result.message);
        if(result.code == 200){
            window.location = "../index.php"
        }
    },
        error: function(xhr, resp, text) {
            // show error to console
            alert("Gagal");
            console.log(xhr, resp, text);
        }
    });
}

function registration(e){
    
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
        if(result.code == 403){
            alert(result.message);
        }else{
            window.location = "./daftar/pendaftaran-berhasil.php"
        }
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}

function sendMailPassword(e){
    e.preventDefault();

    $.ajax({
        url: "https://atmascribe.thekingcorp.org/api/mail/renewMail.php",
        type: "POST",
        contentType : 'application/x-www-form-urlencoded',
        data: {
          email: $('#email').val(),
        },
        cache: false,
        success: function(result) {
          alert(result);
          window.location = "./success-renew.php"
        },
        error: function(xhr, resp, text) {
        console.log(xhr, resp, text);
        alert("gagal");
        },
      });
}
function login(e){
    e.preventDefault();
    var data ={
        email: $('#email').val(),
        password: $('#password').val(),
    }
    
    var form_data=JSON.stringify(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/user/login.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        if(result.code == 200){
            window.location = "../dashboard/";
        }else{
            alert(result.message);
            window.location = "../logout.php";
        }
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}

