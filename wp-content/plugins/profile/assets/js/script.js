jQuery(document).ready(function($) {
    $('#expiry-msg').hide();

    if ($("#after_expire option:selected").val() == "message") {
        $('#expiry-msg').show();
    }
    
    $("#after_expire").on('change',function() {
    if ($(this).val() == "message") {
        $('#expiry-msg').show();
    } else {
        $('#expiry-msg').hide();
    }
    });
    // Submitting form through ajax
 
    // $("#submit-btn").click(function(e) {
    //     e.preventDefault();
    //     formData = {
    //         submit          : "submit" ,
    //         title           : $("#title").val(),
    //         date            : $("#date").val(),
    //         after_expire    : $("#after_expire").val(),
    //         expiry_msg      : $("#expiry-msg").val()
    //     };
    //     $.ajax({
    //       type:'POST',
    //       data:formData,
    //       url:frontend_ajax_object.ajaxurl,
    //       success:function(response) {
    //         $("#new_timmer").trigger("reset");
    //       }
    //     });
    //   });
})