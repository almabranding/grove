$(window).load(function(){
    $('#container').css('height',$(window).height()-55);
    $(window).resize(function(){
        $('#container').css('height',$(window).height()-55);
    });
     var map=$('.map').smoothZoom({
        zoom_MAX:800,
        button_SIZE:22,
        button_OPACITY:1,
        pan_BUTTONS_SHOW: 'NO',
        button_ALIGN:'top center',
        zoom_OUT_TO_FIT:'NO',
        initial_POSITION:'10 10'
    });
   
});     
