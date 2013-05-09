var sly;
var time = 1500;
var item = 0;
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
    $('#descPrev').on('click', function() {
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
    });
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
            $('#descNav').show();
            $(this).change();
            sly.reload();
            $('.selected').not(li).removeClass('selected', function() {

            }).animate(
                    {
                        width: 400
                    },
            {
                duration: 0,
                step: function(now, fx) {
                    $(this).change();
                    sly.reload();
                    sly.toStart(item, true);
                },
                complete: function() {
                    sly.reload();
                    $(this).change();
                    sly.toStart(item, true);
                    
                }
            });
            li.addClass('selected');
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