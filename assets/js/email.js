(function( $ ) {
    let email = $('#custom_email')[0].innerHTML;
    console.log(email);
    $('#bt1').click(function() {
        $('#fr1').attr('action',
                       'mailto:'+ email +'?' 
                       );
        $('#fr1').submit();
    });


})( jQuery );