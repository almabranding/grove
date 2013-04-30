
var std = ({
    fontFamily: 'Akkurat',
    color: '#7f7e82',
    letterSpacing: '0.3em',
    fontSize: '11px',
});
var link = ({
    fontFamily: 'Akkurat',
    color: '#807f83',
    letterSpacing: '0.3em',
    fontSize: '11px',
    hover: {
        color: '#2d2427',
        fontSize: '11px'
    }
});
var menuLink = ({
    fontFamily: 'Akkurat',
    color: '#7f7e82',
    letterSpacing: '0.3em',
    fontSize: '11px',
    hover: {
        color: '#2d2427',
        fontSize: '11px'
    }
});
var menu = ({
    fontFamily: 'Akkurat',
    color: '#2d2427',
    letterSpacing: '0.3em',
    fontSize: '13px',
});
var frameContent = ({
    fontFamily: 'Akkurat_bold',
    color: '#2d2427',
    letterSpacing: '0.8em',
    fontSize: '13px',
});
$(window).load(function() {
    $('#selectMenu').on('mouseenter', function() {
        $('#selectMenu #menu').queue(function() {
            $(this).clearQueue();
            $(this).addClass('navBoxShow', 500);
        });
    }).on('mouseleave', function() {
        $('#selectMenu #menu').queue(function() {
            $(this).clearQueue();
            $(this).removeClass('navBoxShow', 500);
        });
    });
    loadCufon();

});
function loadCufon() {
    Cufon.replace('p,span,label', std);
    Cufon.replace('.menuOpt', menuLink);
    Cufon.replace('.menuTitlespan', menu);
    Cufon.replace('.frameContent', frameContent);
    Cufon.replace('.link', link);
    Cufon.replace('.bold', frameContent);
}