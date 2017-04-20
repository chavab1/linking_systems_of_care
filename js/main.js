﻿/* ------ Establish Namespace ------- */

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
        console.log(svgSrc + '.png');
    }
}