var sly;
var time = 1500;
var item = 0;
var carouselPos = 0;
var $frame = $('#centered');
var $wrap = $frame.parent();
var $options = {
    horizontal: 1,
    itemNav: 'basic',
    smart: 1,
    mouseDragging: 1,
    touchDragging: 0,
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
var $optionsNull = {
    mouseDragging: 0,
    touchDragging: 0,
    dragHandle: 0,
    dynamicHandle: 0,
    clickBar: 0,
};

$(window).load(function() {
    $('#descMenu').append($('#replace').html());
    $('#replace').html(''); 
    loadCufon();
    sly = new Sly($frame, $options).init();
    resizeContainer();
    $('#descDown').on('click', function() {
        $('.scrollbar').show();
        $('#descMenu').removeClass('navBoxShow', 500);
        sly.set($options);
        sly.toCenter(carouselPos, false);
        $('.bgContainer.selected').find(".backgroundContainer").animate(
        {
            left: 0,
            width: 400,
        },
        {
            duration: time,
            step: function(now, fx) {
                sly.reload();
            },
            complete: function() {
                $('.bgContainer.selected').removeClass('selected').removeAttr('style');
                sly.reload();
                sly.toCenter(carouselPos, false);

            }
        });

    });
    $('.bgControl').on('click', function() {
        var max = $('.bgContainer').index();
        $('.preload').show();
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
        $('#fadeWhite').fadeIn(function() {
            $('.selected').removeClass('selected').removeAttr('style').find(".backgroundContainer").css({
                left: 0,
                width: 400
            });
            selectImage($('.bgContainer').eq(carouselPos));
        });
    });
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
    $('#container').css('height', $(window).height() - 60);
    $('.bgContainer.selected .backgroundContainer').css('width', $(window).width() - 40);
    sly.reload();
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
    li.addClass('selected');
    var offset = li.offset();
    li.find(".backgroundContainer").animate(
    {
        left: "-" + (offset.left),
        width: $(window).width() - 40,
    },
    {
        duration: time,
        step: function(now, fx) {
            sly.reload();
        },
        complete: function() {
            sly.reload();
            $('.scrollbar').hide();
            $('#descMenu').addClass('navBoxShow', 500);
            $('.preload').hide();
            $('#fadeWhite').fadeOut();
            sly.set($optionsNull);
        }
    });
}