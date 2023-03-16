function update()
{
$(document).ready(function(){
    $("#submit_btn").click(function(){
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../php/profile.php',
            data: formData,
            success: function(response){
                if (response == 'success') {
                alert("Profile Updated Successfully");
                }
            }
        });
    });
});
}