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
            $('.data').load('http://localhost:808/paw/Tubes/dashboard/jadwal.php');
        }else if(data == 'Catatan'){
            $('.data').load('http://localhost:808/paw/Tubes/dashboard/catatan.php');
        }else if(data == 'Prioritas'){
            $('.data').load('http://localhost:808/paw/Tubes/dashboard/prioritas.php');
        }else{
            $('.data').load('http://localhost:808/paw/Tubes/dashboard/kalender.php');
        }
    }

    function updateAppDash(data){
        if(data == 'dashApp'){
            $('.dashAppsData').load('http://localhost:808/paw/Tubes/base/dashApp.php');
            getSumData();
            getDatauser();
        }else if(data == 'report'){
            $('.dashAppsData').load('http://localhost:808/paw/Tubes/base/report.php');
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
function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
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
    var nama = $("input#nama").val();
    var email = $("input#email").val();
    if(konfirm != password){
        $('.alert-danger').css("display","block");
        $('.alert-danger').html("password tidak cocok");
    }else{
        $('.alert-danger').css("display","none");

    }
}
function detectEmail(e){
    e.preventDefault();
    var data ={
        email: $('#email').val(),
    }
    
    var form_data=JSON.stringify(data);
    $.ajax({
    url: "http://localhost:808/paw/Tubes/api/user/search.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        // product was created, go back to products list
        $('.alert').html(result.code);
        $('.alert').css("display","block");
        if(result.code == 403){
            $('#registrationSubmit').attr("disabled","disabled");

        }else if(result.code == 200){
            $('#registrationSubmit').prop("disabled", false);
        }else{
            $('#registrationSubmit').attr("disabled","disabled");
        }
    },
        error: function(xhr, resp, text) {
            // show error to console
            console.log(xhr, resp, text);
        }
    });
}