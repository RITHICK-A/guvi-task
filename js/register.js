$(document).ready(function() {
  $('#register-form').on('submit',function(event) {
    // Prevent the form from submitting normally
    event.preventDefault();
T
    // Serialize the form data
    if (validateForm()) {
    var formData = $(this).serialize();

    // Send the form data to the server
    $.ajax({
      url: '/php/register.php',
      type: 'POST',
      data: formData,
      success: function(response) {
        if (response == 'success') {
            
          window.location.href = 'login.html'; 
        }
        alert(response);
      }
    });
  }
});
});
function validateForm() {
    var username = $('#register-form input[name="username"]').val();
    var email = $('#register-form input[name="email"]').val();
    var password = $('#register-form input[name="password"]').val();
    var confirmPassword = $('#register-form input[name="confirm-password"]').val();
    var errorMessage = '';
  
    if (username == '') {
      errorMessage += 'Username is required.<br>';
    }
  
    if (email == '') {
      errorMessage += 'Email is required.<br>';
    }
  
    if (password == '') {
      errorMessage += 'Password is required.<br>';
    } else if (password.length < 8) {
      errorMessage += 'Password must be at least 8 characters long.<br>';
    }
  
    if (confirmPassword == '') {
      errorMessage += 'Confirm Password is required.<br>';
    } else if (password != confirmPassword) {
      errorMessage += 'Password and Confirm Password do not match.<br>';
    }
  
    if (errorMessage != '') {
      $('#message').html(errorMessage);
      return false;
    }
  
    return true;
  }

  
  
  
  
  
  