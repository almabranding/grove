
var std = ({
    fontFamily: 'Din',
    color: '#555555',
    fontWeight: '500',
    letterSpacing: '0.3em',
    fontSize: '14px',
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
var yellow = ({
    fontFamily: 'Din',
    color: '#999999',
    letterSpacing: '0.3em',
    fontSize: '10px'
});

$(window).load(function() {
    $('.barLeft').on('mouseenter', function() {
        $('#menuprimary').queue(function() {
            $(this).clearQueue();
            $(this).addClass('navBoxShow', 500);
        });
    });
    $('#menuprimary').on('mouseleave', function() {
        $('#menuprimary').queue(function() {
            $(this).clearQueue();
            $(this).removeClass('navBoxShow', 500);
        });
    });
    $('#langChage').on('mouseenter', function() {
        $('.langMenu').queue(function() {
            $(this).clearQueue();
            $(this).addClass('navBoxShow', 500);
        });
    });
    $('.langMenu').on('mouseleave', function() {
        $('.langMenu').queue(function() {
            $(this).clearQueue();
            $(this).removeClass('navBoxShow', 500);
        });
    });
    loadCufon();
});
function loadCufon() {
    if (!isMobile.iOS() && !isMobile.Android()) {
        Cufon.replace('p,span,label', std);
        Cufon.replace('h2', h2);
        Cufon.replace('h3', h3);
        Cufon.replace('.menuLink', menuLink);
        Cufon.replace('.menu', menu);
        Cufon.replace('.link', link);
        Cufon.replace('.yellow', yellow);
    }
}
$('#lemonCredits').on('mouseleave', function() {
    $('#lemon').queue(function() {
        $(this).clearQueue();
        $(this).animate({'opacity': '0'});
    });
    $('#credits').queue(function() {
        $(this).clearQueue();
        $(this).animate({'opacity': '1'});
    });
});
$('#lemonCredits').on('mouseenter', function() {
    $('#credits').queue(function() {
        $(this).clearQueue();
        $(this).animate({'opacity': '0'});
    });
    $('#lemon').queue(function() {
        $(this).clearQueue();
        $(this).animate({'opacity': '1'});
    });
});
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone/i);
    },
    iPad: function() {
        return navigator.userAgent.match(/iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};