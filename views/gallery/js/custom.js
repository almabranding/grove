var sly;
var time=1500;
var item=0;
(function () {
    var $frame = $('#centered');
    var $wrap  = $frame.parent();

    // Call Sly on frame
    
    var $options={
            horizontal: 1,
            itemNav: 'basic',
            smart: 1,
            mouseDragging: 1,
            touchDragging: 1,
            releaseSwing: 1,
            startAt: 0,
            scrollBar: $wrap.find('.scrollbar'),
            scrollBy: 1,
            speed: time,
            elasticBounds: 1,
            easing: 'linear',
            dragHandle: 1,
            dynamicHandle: 1,
            clickBar: 1,
            
    };
    sly = new Sly($frame, $options).init();
}());
$(window).load(function() {
    
    var max=$('.bgContainer').size();
    $('#descPrev').on('click',function(){
        if(item>0)item--;
        var li=$('.bgContainer').eq(item);
        selectImage(li);  
    });
    $('#descNext').on('click',function(){  
        if(item<max)item++;
        var li=$('.bgContainer').eq(item);
        $('.selected').removeClass('selected').animate(
        {
            width:400
        },
        {
            complete: function (){
                selectImage(li);
            }
        });   
    });
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
        selectImage($(this));
   
    });
  
});

function resizeContainer(){
    $('#container').css('height',$(window).height()-90).change();
}

function selectImage(li){
        item=li.index();
        sly.toStart(item,false);
        li.find(".body-background").ezBgResize({
            //img     : BGImageArray[0]
        });
        li.css({
           position:'relative',
           margin:0,
           'z-index':1
        });
        $('.selected').removeClass('selected').animate(
        {
            width:400
        },
        {
            duration:time,
            step: function(now, fx) {    
                $(this).change(); 
                
            },
            complete: function (){
                $(this).change();
                 sly.reload();
            }
        });   
        li.addClass('selected');
        sly.toStart(item,false);
        li.animate(
        {
            width:$('#container').width()-20,
        },
        {
            duration:time,
            step: function(now, fx) {    
                $(this).change();
                
            },
            complete: function (){
                $(this).change(); 
                sly.reload();
                $('#descMenu').addClass('navBoxShow',500);
                
               
            }
        });
}