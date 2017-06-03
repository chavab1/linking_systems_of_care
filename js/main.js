/* ------ Establish Namespace ------- */

var lsof = {};

// Window Width
lsof.viewport = window.innerWidth;


// Fire only on Tablet and higher
if (lsof.viewport > 767) {

    // Reveal text over hero image
    if (document.getElementsByClassName('hero-text').length) {
        var heroText = document.getElementsByClassName('hero-text');
        var step = 0;
        function revealText() {
            for (var i = 0; i < heroText.length; i++) {
                heroText[i].className = heroText[i].className.replace(/(?:^|\s)reveal(?!\S)/g, '');
            }
            heroText[step].className += ' reveal'

            if (step < 2) {
                step++;
            } else {
                step = 0;
            }

        }
        setInterval(revealText, 4000);
    }



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

$('.hero picture').on('inview', function(event, isInView) {
    if (isInView) {    
        $(window).on('scroll.hero', panHero);
    } else {
        $(window).off('scroll.hero');
    }
});


function panHero() {
    var st = $(this).scrollTop();
    if (st > lastScrollTop) {
        $('.hero picture').velocity({left: '-=1px'}, 20, '[.41,.14,.5,.94]');
    }
    else {
        $('.hero picture').velocity({left: '+=1px'}, 20, [.41,.14,.5,.94]);
    }
    lastScrollTop = st;  
};



// Staff Page Modal

$('.staff article > button').on('click', function(){
    $modal = $(this).next('.staff-body');
    $($modal).addClass('open');
    $('<div class="staff-overlay"></div>').insertAfter($modal);
    window.setTimeout(function(){
        $('.staff-overlay').addClass('opacity');
    }, 100);
})


$('.staff-body-close').on('click', function(){
    $modal = $(this).parent('.staff-body');  
    $($modal).removeClass('open').next('.staff-overlay').removeClass('opacity');
    window.setTimeout(function(){
        $($modal).removeClass('open').next('.staff-overlay').remove();
    }, 300);    
})