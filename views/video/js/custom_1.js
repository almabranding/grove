var carousel;
var carouselPos=0;
$(window).load(function(){  
    carousel=$( '#carousel' ).elastislide({
        minItems: 1
    });
    $('#gallerys').masonry({
        itemSelector: '.gallerysBox',
        columnWidth: 130,
        isAnimated: true,
        isFitWidth: true
    });
    $('#gallerys').masonry('reload');
    if(checkCookie('fitScreen'))fitScreen();
});
$('.fitScreen').on('click',function(){
   fitScreen();
});
$(window).on('resize',function(){
  resampleBG();    
});

$('.gallerysBoxImg img').on('click',function(){
    changeBG(this);
});
function control(btn){
    if(btn==='next') carouselPos++;
    if(btn==='prev') carouselPos--;
}
$('.bgControl').on('click',function(){
    var max=$('.gallerysBox').length-1;
    if($(this).hasClass('bgPrev')){
        carouselPos--;
        if(carouselPos<0)carouselPos=max;
    }
    if($(this).hasClass('bgNext')){
        carouselPos++;
        if(carouselPos>max)carouselPos=0;
    }
    var img=$('img[ref="'+carouselPos+'"]');
    changeBG(img);
});
function fitScreen(){
     if(!$("#container").hasClass('fullScreen')){
         jQuery('html,body').animate({scrollTop: $("#carousel").offset().top}, 1000);
         $('#wrapper').toggleClass("fullScreen");
         $('#container').toggleClass("fullScreen");
         $('#gallerys').masonry('reload');
        var URLBG=$('img[ref="'+carouselPos+'"]').attr('title');
        $('#imgFull').append('<iframe src="'+URLBG+'" width="100%" height="100%"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
        $("#imgFull").fadeIn();
        $('.preload').hide();
        $('.elastislide-wrapper').css(
            {
                opacity:'0',
                position:'absolute',
                width:0
            }
        );
        $('#gallerys').masonry('reload');
        resampleBG();    
    }else{
        $('#gallerys').masonry('reload');
        $("#imgFull").delay(1000).fadeOut(function(){
            $('.elastislide-wrapper').css(
                {
                  opacity:'1',
                  position:'relative',
                  width:'auto'
                }
            );  
            $('#wrapper').toggleClass("fullScreen");
            $('#container').toggleClass("fullScreen");
            $('#gallerys').masonry('reload');
            carousel._slideTo(carouselPos);
        });
    }
    $('#gallerys').masonry('reload');

}
function changeBG(img){
    jQuery('html,body').animate({scrollTop: $("#carousel").offset().top}, 1000);
    carouselPos=$(img).attr('ref');
    var URLBG=$(img).attr('title');
    carousel._slideTo(carouselPos);
    $('.preload').show();
    $('#imgFull iframe').fadeOut(function(){
        $(this).remove();
        $('#imgFull').append('<iframe src="'+URLBG+'" width="100%" height="100%"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
        $("#imgFull").fadeIn();
        $('.preload').hide();
    });
    
}
function resampleBG(){
    var Wh=$(window).height()-180;
    $('#imgFull').css('height',Wh);
}