(function( $ ) {
    let email;
    if($('#custom_email')){
        email = $('#custom_email');
    }
   
    console.log(email);
    $('#bt1').click(function() {
        $('#fr1').attr('action',
                       'mailto:'+ email +'?' 
                       );
        $('#fr1').submit();
    });


})( jQuery );