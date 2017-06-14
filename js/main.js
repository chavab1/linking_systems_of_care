/* ------ Establish Namespace ------- */

var lsof = {};

// Window Width
lsof.viewport = window.innerWidth;




    // Reveal text over hero image
    if (document.getElementsByClassName('hero-text').length) {
        var heroText = document.getElementsByClassName('hero-text');
        var step = 0;
        var revealText = function() {
            for (var i = 0; i < heroText.length; i++) {
                heroText[i].className = heroText[i].className.replace(/(?:^|\s)reveal(?!\S)/g, '');
            }
            heroText[step].className += ' reveal';

            if (step < 2) {
                step++;
            } else {
                step = 0;
            }

        };
        setInterval(revealText, 5000);
    }






// Add .pngs for IE8
if (!Modernizr.svgasimg){
    var partners = document.querySelectorAll('.partner-logos img');
    for (var i = 0; i < partners.length; i++) {
        var svgSrc = partners[i].getAttribute('src');
        var src = svgSrc.slice(0, svgSrc.indexOf("."));
    }
}


// Main Nav Sub-Menu Reveal
jQuery('.deeper.parent').hoverIntent({
    over: open,
    out: close,
    interval: 100,
    timeout: 200
});

// For Mobile Navigation
var hashLinks = document.querySelectorAll('a[href="#"]');

for(var i = 0; i < hashLinks.length; i++) {
    hashLinks[i].addEventListener('click', function(e){
    e.preventDefault ? e.preventDefault() : e.returnValue = false; 
    });
}


function open(){
    jQuery(this).addClass('open').children('a').attr('aria-expanded', true);
    jQuery(this).children('ul').attr('aria-hidden', false).attr('aria-expanded', true);
}
function close(){
    jQuery(this).removeClass('open').children('a').attr('aria-expanded', false);
    jQuery(this).children('ul').attr('aria-hidden', true).attr('aria-expanded', false);
}






// Hero Image Animation

var lastScrollTop = 0;

$('.hero-home picture').on('inview', function(event, isInView) {
    if (isInView) {    
        $(window).on('scroll.hero', panHero);
    } else {
        $(window).off('scroll.hero');
    }
});


function panHero() {
    var st = $(this).scrollTop();
    if (st > lastScrollTop) {
        $('.hero-home picture').velocity({left: '-=1px'}, 40, [0.41,0.14,0.5,0.94]);
    }
    else {
        $('.hero-home picture').velocity({left: '+=1px'}, 40, [0.41,0.14,0.5,0.94]);
    }
    lastScrollTop = st;  
}



// Staff Page Modal

$('.staff article > button').on('click', function(){
    $modal = $(this).next('.staff-body');    
    $($modal).velocity('transition.expandIn', 1000, [0.31,0.3,0.54,1.05]);
    $modal.attr('aria-hidden', false);
    $('<div class="staff-overlay"></div>').insertAfter($modal);
    window.setTimeout(function(){
        $('.staff-overlay').addClass('opacity');
    }, 100);
});


$('.staff-body-close').on('click', function(){
    $modal = $(this).parent('.staff-body');  
    $($modal).velocity('transition.expandOut', 1000, [0.31,0.3,0.54,1.05]).next('.staff-overlay').removeClass('opacity');
    $modal.attr('aria-hidden', true);
    window.setTimeout(function(){
        $($modal).removeClass('open').next('.staff-overlay').remove();
    }, 300);    
});

function collageSmall() {
    $('.collage').removeWhitespace().collagePlus({
        'targetHeight': 90,
        'fadeSpeed': 'fast',
    });
}
function collageMed() {
    $('.collage').removeWhitespace().collagePlus({
        'targetHeight': 140,
        'fadeSpeed': 'fast',
    });
}
function collageLarge() {
    $('.collage').removeWhitespace().collagePlus({
        'targetHeight': 200,
        'fadeSpeed': 'fast',
    });
}

$(window).load(function(){
    if(lsof.viewport > 1337) {
        collageLarge();
    }
    else if(lsof.viewport > 991 && lsof.viewport < 1338){
        collageMed();
    }
    else {
        collageSmall();
    }
});

var resizeTimer = null;
$(window).bind('resize', function() {
    lsof.viewport = window.innerWidth;
    // hide all the images until we resize them
    $('.collage img').css("opacity", 0);
    // set a timer to re-apply the plugin    
    if (resizeTimer) clearTimeout(resizeTimer);
    if(lsof.viewport > 1337) {
        resizeTimer = setTimeout(collageLarge, 200);
    }
    else if(lsof.viewport > 991 && lsof.viewport < 1338){
        resizeTimer = setTimeout(collageMed, 200);
    }
    else {
        resizeTimer = setTimeout(collageSmall, 200);
    }        
});