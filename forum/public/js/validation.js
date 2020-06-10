$(document).ready( function() {
    $('#new-pass-confirm').on('input', function() {
        if($('#new-pass').val() === $('#new-pass-confirm').val()) {
            $('#new-pass-confirm').setCustomValidity('Password and confirmation password do not match.');
        } else {
            $('#new-pass-confirm').setCustomValidity('');
        }
    });
});
