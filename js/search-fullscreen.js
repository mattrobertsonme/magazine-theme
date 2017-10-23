
        $(function () {
    $('a[href="#search-fs"]').on('click', function(event) {
        
        $('#search-fs').addClass('open');
        $('#search-fs > form > input[type="search"]').focus();
    });
    
    $('#search-fs, #search-fs button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
    
    $('form').submit(function(event) {
        
    })
});