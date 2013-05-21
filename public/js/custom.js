
var std = ({
    fontFamily: 'Din',
    color: '#7f7e82',
    fontWeight: '500',
    letterSpacing: '0.3em',
    fontSize: '13px',
});
var h2 = ({
    fontFamily: 'Din',
    color: '#333333',
    letterSpacing: '0.3em',
    fontSize: '13px',
});
var h3 = ({
    fontFamily: 'Din',
    color: '#333333',
    letterSpacing: '0.3em',
    fontSize: '13px',
});
var link = ({
    fontFamily: 'Din',
    color: '#807f83',
    letterSpacing: '0.3em',
    fontSize: '11px',
    hover: {
        color: '#2d2427',
        fontSize: '11px'
    }
});
var menuLink = ({
    fontFamily: 'Din',
    color: '#7f7e82',
    letterSpacing: '0.3em',
    fontSize: '13px',
    fontWeight: '500',
    hover: {
        color: '#2d2427',
        fontSize: '13px'
    }
});
var menu = ({
    fontFamily: 'Din',
    color: '#ffffff',
    fontWeight: '400',
    letterSpacing: '0.3em',
    fontSize: '13px',
    hover: {
        color: '#2d2427',
        fontSize: '13px'
    }
});

$(window).load(function() {
    $('#selectMenu').on('mouseenter', function() {
        $('#menuprimary').queue(function() {
            $(this).clearQueue();
            $(this).addClass('navBoxShow', 500);
        });
    }).on('mouseleave', function() {
        $('#menuprimary').queue(function() {
            $(this).clearQueue();
            $(this).removeClass('navBoxShow', 500);
        });
    });
    loadCufon();
});
function loadCufon() {
    Cufon.replace('p,span,label', std);
    Cufon.replace('h2', h2);
    Cufon.replace('h3', h3);
    Cufon.replace('.menuLink', menuLink);
    Cufon.replace('.menu', menu);
    Cufon.replace('.link', link);
}
function changeFoot(texto) {
    $('#lemon').queue(function() {
        $(this).clearQueue();
        $(this).animate({'color': '#000000'}, {
            complete: function() {
                $(this).text(texto);
                $(this).animate({'color': '#ffffff'});
            }});
    });
}