  // get values from FORM
  var name = $("input#name").val();
  var email = $("input#email").val();
  var ttl = $("input#ttl").val();
  var sandiLama = $("input#kataSandiLama").val();
  var sandiBaru = $("input#kataSandiBaru").val();
  var sandiBaruKonfirmasi = $("input#kataSandiBaruKonfirmasi").val();
  var kutipan = $("textarea#kutipan").val();
  var firstName = name; // For Success/Failure Message
  // Check for white space in name for Success/Fail message
  if (firstName.indexOf(' ') >= 0) {
    firstName = name.split(' ').slice(0, -1).join(' ');
  }
  $this = $("#updateAkun");
  $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
  $.ajax({
    url: "http://localhost:808/paw/Tubes/akun/updateAkun.php",
    type: "POST",
    data: {
      name: name,
      email: email,
      ttl: ttl,
      sandiLama: sandiLama,
      sandiBaru : sandiBaru,
      sandiBaruKonfirmasi : sandiBaruKonfirmasi,
      kutipan : kutipan,
    },
    cache: false,
    success: function() {
      // Success message
      console.log(name);
      $('#success').html("<div class='alert alert-success'>");
      $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
        .append("</button>");
      $('#success > .alert-success')
        .append("<strong  style='font-size: 18px;'>Your message has been sent. </strong>");
      $('#success > .alert-success')
        .append('</div>');
      //clear all fields
      $('#akunForm').trigger("reset");
    },
    error: function() {
      // Fail message
      $('#success').html("<div class='alert alert-danger'>");
      $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
        .append("</button>");
      $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!"));
      $('#success > .alert-danger').append('</div>');
      //clear all fields
      $('#akunForm').trigger("reset");
    },
    complete: function() {
      setTimeout(function() {
        $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
      }, 1000);
    }
  });