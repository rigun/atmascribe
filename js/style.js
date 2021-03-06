(function($) {
    "use strict"; // Start of use strict
  
  
  
    $('.js-scroll-trigger').click(function() {
		$('.navbar-collapse').collapse('hide');
  });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
      target: '#mainNav',
      offset: 70
    });
  
    // Collapse Navbar
    var navbarCollapse = function() {
      if ($("#mainNav").offset().top > 100) {		
              $("#mainNav").addClass("navbar-custom");
      } else {			
              $("#mainNav").removeClass("navbar-custom");		
      }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
    
  })(jQuery); // End of use strict

    function updateContent(data){
        $(".data").addClass("data-custom");
        if(data == 'Jadwal'){
            $('.data').load('https://atmascribe.thekingcorp.org/dashboard/jadwal.php');
        }else if(data == 'Catatan'){
            $('.data').load('https://atmascribe.thekingcorp.org/dashboard/catatan.php');
        }else if(data == 'Prioritas'){
            $('.data').load('https://atmascribe.thekingcorp.org/dashboard/prioritas.php');
        }else{
            $('.data').load('https://atmascribe.thekingcorp.org/dashboard/kalender.php');
        }
    }

    function updateAppDash(data){
        if(data == 'dashApp'){
            $('.dashAppsData').load('https://atmascribe.thekingcorp.org/base/dashApp.php');
            $('#navDashboard').addClass('nav-active');
            $('#navReport').removeClass('nav-active');

            getSumData();
            getDatauser();
        }else if(data == 'report'){
            $('.dashAppsData').load('https://atmascribe.thekingcorp.org/base/report.php');
            $('#navDashboard').removeClass('nav-active');
            $('#navReport').addClass('nav-active');
            getReport();
        }else {
            $('.dashAppsData').html("failed");
        }
    }
function change(){
    $(".textList").css("display", "none");
    $(".inputList").css("display", "block");
    $(".simpan").css("display", "block");
    $(".ubah").css("display", "none");
}
function cancel(){
    $(".textList").css("display", "block");
        $(".inputList").css("display", "none");
        $(".simpan").css("display", "none");
        $(".ubah").css("display", "block");
    $(".password").css("display", "none");


}
function chPassword(){
    $(".password").css("display", "block");
    $(".ubahPassword").css("display", "none");
}
function closePassword(){
    $(".password").css("display", "none");
    $(".ubahPassword").css("display", "block");

}
function readURL(e, input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var formData = new FormData();
        formData.append('imageUpload', input.files[0], input.files[0].name);
  
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
        
        e.preventDefault();
            $.ajax({
            url: "https://atmascribe.thekingcorp.org/api/user/uploadPicture.php?id="+id, // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       
            cache: false,             
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                console.log(data);
            }
        });
    }
}


$("#imageUpload").change(function() {
    readURL(this);
});

function showdetail(id){
    if(document.getElementById('detail'+id).style.display == "none"){
        $("#detail"+id).css("display", "table-row");
    }else{
        $("#detail"+id).css("display", "none");
    }
}

function cekpass(){
        
    var password = $("input#password").val();
    var konfirm = $("input#konfirmasi").val();
    if(konfirm != password){
        $('.alertPass').css("display","block");
        $('.alertPass').html("password tidak cocok");
        $('#registrationSubmit').attr("disabled","disabled");
    }else{
        $('.alertPass').css("display","none");
        $('#registrationSubmit').prop("disabled", false);
    }
}

function cekpassB(){
        
    var password = $("input#passwordB").val();
    var konfirm = $("input#passwordKB").val();
    if(konfirm != password){
        $('.alertPass').css("display","block");
        $('.alertPass').html("password tidak cocok");
        $('#updateAkun').attr("disabled","disabled");
    }else{
        $('.alertPass').css("display","none");
        $('#updateAkun').prop("disabled", false);
    }
}
function detectEmail(e){
    e.preventDefault();
    var data ={
        email: $('#email').val(),
    }
    
    var form_data=JSON.stringify(data);
    $.ajax({
    url: "https://atmascribe.thekingcorp.org/api/user/search.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        // product was created, go back to products list
       
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        if(result.code == 403){
            $('#registrationSubmit').attr("disabled","disabled");
            $('.alert').html(result.message);
            $('.alert').css("display","block");
            return true;
        }else if(result.code == 200 && re.test(String($('#email').val()).toLowerCase())){
            $('#registrationSubmit').prop("disabled", false);
            $('.alert').css("display","none");
            return false;
        }else{
            $('.alert').html("Format email belum sesuai");
            $('.alert').css("display","block");
            $('#registrationSubmit').attr("disabled","disabled");
            return false;
        }
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}