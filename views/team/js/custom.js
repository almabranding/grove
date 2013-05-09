$(document).ready(function() {
    $('#descMenu').html($('#replace').html());
    $('#replace').html('');
    $('#descMenu').addClass('navBoxShow');
    $(window).on('resize',function(){
        $('#container').css('height',$(window).height()-85).change();
    });
    $('#container').css('height',$(window).height()-85).change();
  
});
    
