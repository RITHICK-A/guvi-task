$(document).ready(function() {
    $('#login-form').submit(function(event) {
      if(validateForm()){
      event.preventDefault(); 
  

      var formData = $(this).serialize();
  
      $.ajax({
        type: 'POST',
        url: '/php/login.php', 
        data: formData,
        success: function(response) {
          if (response == 'success') {
            
            window.location.href = 'profile.html'; 
          } else {
            
            $('#error-message').html('Invalid username or password');
          }
        },
        error: function() {
          
          $('#error-message').html('Something went wrong. Please try again later.');
        }
      });
    }
   });
  });
  function validateForm(){
    var username = document.forms[0].username.value;
    var password = document.forms[0].password.value;
    
    if(username == "" || password == ""){
      alert("Please enter a username and password.");
      return false;
    }
  }