$(window).load(function(){
    var initial_ZOOM=0;
    if(typeof mapa !== 'undefined') initial_ZOOM=200;
    $('#container').css('height','inherit');
    $('.map').each(function(){
        var map=$(this).smoothZoom({
            initial_ZOOM : initial_ZOOM,
            zoom_MAX:800,
            button_SIZE:22,
            button_OPACITY:1,
            pan_BUTTONS_SHOW: 'NO',
            button_ALIGN:'bottom center',
            zoom_OUT_TO_FIT:'NO'
        });
    });
});
window.addEventListener("orientationchange", function() {
	location.reload();
}, false);

