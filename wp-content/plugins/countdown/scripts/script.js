jQuery(document).ready(function($) {
    $('#expiry-msg').hide();
    $("#after_expire").on('change',function() {
    if ($(this).val() == "message") {
        $('#expiry-msg').show();
    } else {
        $('#expiry-msg').hide();
    }
    });