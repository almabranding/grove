$(document).ready(function() {
    $('.menuDepl').on('click', function() {
        var id=$(this).attr('id');
        $('.'+id).queue(function() {
            $(this).clearQueue();
            if(!$(this).hasClass('despOpen') && !$('#'+id).hasClass('group')) $('.despOpen').removeClass('despOpen');
            if($('#'+id).hasClass('group')){
                if($('.'+id).hasClass('despOpen')){
                    $('#'+id).find('.plusM').html('+');
                }else{
                    $('#'+id).find('.plusM').html('-');
                }
            }
            $(this).toggleClass('despOpen', 500);
        });
    });
    $('.mobileSubMenu').on('click',function(){
        $('.accessFrame').toggle();
        if($('.accessFrame').is(':visible')){
            $(this).find('.plusM').html('-');
        }else{
            $(this).find('.plusM').html('+');
        }
    }); 
    $('.backgroundContainer').each(function(){
        if(isMobile.iOS() || isMobile.Android())
            var src=$(this).find('#phoneImg').html();
        else
            var src=$(this).find('#bigImg').html();
        $(this).css('background-image','url("'+src+'")');
    });
    $('#xpandInfo').on('click', function() {
        $('#descInfoRight').queue(function() {
            $(this).clearQueue();
            $(this).toggle('slow');
            jQuery('html,body,#container').animate({scrollTop: $("#descInfoRight").offset().top}, 1000);
        });
    });
    
});