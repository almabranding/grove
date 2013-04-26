(function () {
    var $frame = $('#centered');
    var $wrap  = $frame.parent();

    // Call Sly on frame
    $frame.sly({
            horizontal: 1,
            itemNav: 'basic',
            smart: 1,
            activateOn: 'click',
            mouseDragging: 1,
            touchDragging: 1,
            releaseSwing: 1,
            startAt: 0,
            scrollBar: $wrap.find('.scrollbar'),
            scrollBy: 1,
            speed: 300,
            elasticBounds: 1,
            easing: 'easeOutExpo',
            dragHandle: 1,
            dynamicHandle: 1,
            clickBar: 1,
            
    });
}());
$(document).ready(function() {
    var time=1000;
    resizeContainer();
    $(window).on('resize',function(){
        resizeContainer();
    });
    $('.bgContainer').on('mouseenter',function(){
        var desc=$(this).find('.bgDesc');
        desc.queue(function () {
            $(this).clearQueue();
            $(this).addClass('bgDescShow', 500);
          });
    }).on('mouseleave',function(){
        var desc=$(this).find('.bgDesc');
        desc.queue(function () {
            $(this).clearQueue();
            $(this).removeClass('bgDescShow', 500);
        });
    });
    $('.bgContainer').on('click',function(){
        
        var item=$(this).index();
        var $frame = $('#centered');
        $frame.sly('toStart', item);  
         $(this).find(".body-background").ezBgResize({
            img     : BGImageArray[0]
        });
        var matrix;
        matrix=$('.bgList').css('transform');matrix=$('.bgList').css('transform');
        if(!matrix) matrix=$('.bgList').css('-webkit-transform');
        if(!matrix) matrix=$('.bgList').css('-o-transform');
        if(!matrix) matrix=$('.bgList').css('-moz-transform');
        if(!matrix) matrix=$('.bgList').css('-ms-transform');
        
        var transform = matrix.match(/[0-9\.]+/g);
        var left=transform[4];
        $(this).css({
           position:'relative',
           margin:0,
           'z-index':1
        });
        
                
                
        $(this).animate(
        {
            width:$('#container').width()-1,
            //left:left
        },
        {
            duration:time,
            step: function(now, fx) {    
                $(this).change();  
                
            },
            complete: function (){
                $(this).change(); 
                $('#descMenu').addClass('navBoxShow',500);
            }
        });
        
        $('.bgContainer').not(this).animate(
        {
            //width:500
        },time);
    });
  
});

function resizeContainer(){
    $('#container').css('height',$(window).height()-90).change();
}
    
