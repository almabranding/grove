var sly;
var time = 1500;
var item = 0;
var isShow=1;
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
        isShow=0;
        $('.descUpDown').toggle();
        $('#descMenu').removeClass('navBoxShow', 500);
    });
    $('#descUp').on('click', function() {
        isShow=1;
        $('.descUpDown').toggle();
        $('#descMenu').addClass('navBoxShow', 500);
    });
    $('#descMenu').on('click', function() {
        isShow=0;
        $('.descUpDown').toggle();
        $('#descMenu').removeClass('navBoxShow', 500);
    });
    $('#descClose').on('click', function() {
        returnGallery();
    });
    $('.backgroundContainer').on('click', function() {
        returnGallery();
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
                width: 400,
                'z-index':10
            });
            selectImage($('.bgContainer').eq(carouselPos));
        });
    });
    $(window).on('resize', function() {
        resizeContainer();
    });
    $('.bgContainer').not('.selected').on('mouseenter', function() {
        $('.bgDesc').removeClass('bgDescShow', 500);
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
    $('.bgContainer').not('.selected').on('click', function() {
        selectImage($(this));

    });

});

function resizeContainer() {
    $('#container').css('height', $(window).height() - 60);
    $('.bgContainer.selected .backgroundContainer').css('width', $(window).width() - 40);
    sly.reload();
}

function selectImage(li) {
    if(li.hasClass('selected')) return false;
    carouselPos = li.index();
    $('.bgList').css({
        position: 'absolute',
    });
    li.css({
        position: 'relative',
        margin: 0,
        'z-index': 1
    });
    li.addClass('selected');
    var offset = li.offset();
    $('#descTitle').html(li.find('.caption').text());
    loadCufon();
    li.find(".backgroundContainer").css('z-index',14);
    li.find(".backgroundContainer").animate(
    {
        left: "-" + (offset.left),
        width: $(window).width() - 40
    },
    {
        duration: time,
        step: function(now, fx) {
            sly.reload();
        },
        complete: function() {
            sly.reload();
            $('#descNav').addClass('navBoxShow', 500);
            $('.scrollbar').hide();
            if(isShow) $('#descMenu').addClass('navBoxShow', 500);
            $('.preload').hide();
            $('#fadeWhite').fadeOut();
            sly.set($optionsNull);
        }
    });
}
function returnGallery(){
    
        $('.scrollbar').show();
        $('#descNav').removeClass('navBoxShow');
        $('#descMenu').removeClass('navBoxShow', 500);
        sly.set($options);
        sly.toCenter(carouselPos, false);
        $('.bgContainer.selected').find(".backgroundContainer").animate(
        {
            left: 0,
            width: 400,
            'z-index':10
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

}