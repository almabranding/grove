$(document).ready(function() {
    $(window).on('resize',function(){
        $('#container').css('height',$(window).height()-85).change();
    });
    $('#container').css('height',$(window).height()-85).change();
    $("#body-background").ezBgResize({
        img     : BGImageArray[0]
    });
  
});
    
