var sly;
var time = 1500;
var item = 0;
var carouselPos = 0;
(function() {
    var $frame = $('#centered');
    var $wrap = $frame.parent();

    // Call Sly on frame

    var $options = {
        horizontal: 1,
        itemNav: 'basic',
        smart: 1,
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        startAt: 0,
        scrollBar: $wrap.find('.scrollbar'),
        speed: time / 2,
        elasticBounds: 1,
        easing: 'linear',
        dragHandle: 1,
        dynamicHandle: 1,
        clickBar: 1,
    };
    sly = new Sly($frame, $options).init();
}());
$(window).load(function() {

    var max = $('.bgContainer').size();
    $('#descDown').on('click', function() {
        $(this).addClass('descUp');
        $('#menuprimary').removeClass('navBoxShowPerm', 500);
        $('#descMenu').removeClass('navBoxShow', 500);
    });
    /*$('#descPrev').on('click', function() {
     if (item > 0)
     item--;
     var li = $('.bgContainer').eq(item);
     $('.selected').removeClass('selected').animate(
     {
     width: 400
     },
     {
     step: function(now, fx) {
     $(this).change();
     },
     complete: function() {
     $(this).change();
     selectImageByArrow(li);
     }
     });
     });
     $('#descNext').on('click', function() {
     if (item < max)
     item++;
     var li = $('.bgContainer').eq(item);
     $('.selected').removeClass('selected').animate(
     {
     width: 400
     },
     {
     step: function(now, fx) {
     $(this).change();
     },
     complete: function() {
     $(this).change();
     selectImageByArrow(li);
     }
     });
     });*/
    resizeContainer();
    $(window).on('resize', function() {
        resizeContainer();
    });
    $('.bgContainer').on('mouseenter', function() {
        var desc = $(this).find('.bgDesc');
        desc.queue(function() {
            $(this).clearQueue();
            $(this).addClass('bgDescShow', 500);
        });
    }).on('mouseleave', function() {
        var desc = $(this).find('.bgDesc');
        desc.queue(function() {
            $(this).clearQueue();
            $(this).removeClass('bgDescShow', 500);
        });
    });
    $('.bgContainer').on('click', function() {
        selectImage($(this));

    });

});

function resizeContainer() {
    $('#container').css('height', $(window).height() - 90).change();
}

function selectImage(li) {
    carouselPos = li.index();
    $('.bgList').css({
        position: 'absolute',
    });
    li.css({
        position: 'relative',
        margin: 0,
        'z-index': 1
    });
    li.find(".body-background").ezBgResize();

    var offset = li.offset();
    li.animate(
            {
                left: "-=" + (offset.left),
                width: $(window).width() - 20,
            },
            {
                duration: time,
                step: function(now, fx) {
                    sly.reload();
                    $(this).change();
                },
                complete: function() {
                    $(this).css({
                        position: 'absolute',
                        left: 0
                    });
                    $(this).change();
                    sly.destroy();
                    $('.scrollbar').hide();
                    $('#descNav').show();
                    $(this).addClass('selected');
                    $('#descDown').removeClass('descUp');
                    $('#menuprimary').addClass('navBoxShowPerm', 500);
                    $('#descMenu').addClass('navBoxShow', 500);

                }
            });
}
function selectImageByArrow(li) {
    item = li.index();
    sly.reload();
    sly.toStart(item, false);
    li.css({
        position: 'relative',
        margin: 0,
        'z-index': 1
    });
    setTimeout(function() {
        li.find(".body-background").ezBgResize();
    }, time / 2);
    li.delay(time / 2).animate(
            {
                width: $('#container').width() - 20,
            },
            {
                duration: time,
                step: function(now, fx) {
                    sly.reload();
                    sly.toStart(item, false);
                    $(this).change();
                },
                complete: function() {
                    $(this).change();
                    sly.reload();
                    li.addClass('selected');
                    $('#descDown').removeClass('descUp');
                    $('#descMenu').addClass('navBoxShow', 500);
                }
            });

}
$('.bgControl').on('click', function() {
    var max = $('.bgContainer').index();
    $('.preload').show();
    var nowPos = carouselPos;
    $('.bgList').fadeOut();
    if ($(this).is('#descPrev')) {
        carouselPos--;
        if (carouselPos < 0)
            carouselPos = max;
    }
    if ($(this).is('#descNext')) {
        carouselPos++;
        if (carouselPos > max)
            carouselPos = 0;
    }
    $('.bgList').fadeOut(function() {
        $('.bgContainer').eq(nowPos).removeClass('selected').removeAttr('style');
        $('.bgContainer').eq(carouselPos).addClass('selected').css('width',$(window).width() - 20);
        $('.bgContainer').eq(carouselPos).find(".body-background").ezBgResize();
        
        $('.preload').delay(500).hide('fast', function() {
            $('.bgList').fadeIn(function() {
                $('.bgContainer').eq(carouselPos).change();
            });
            $('.preload').hide();
        });
    });

    //changeBG(next);
});
function changeBG(link) {
    var img = link.find('img').attr('src');
    $('.imgBG').fadeOut(function() {
        $('.imgBG').attr('src', img);
        $('.preload').delay(500).hide('fast', function() {
            $('.imgBG').fadeIn(function() {
                $('#imgFull').css('height', $('.imgBG').height());
            });
            $('.preload').hide();
        });
    });
}