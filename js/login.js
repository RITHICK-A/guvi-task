$(document).ready(function() {
    $('#login-form').submit(function(event) {
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
    });
  });
  