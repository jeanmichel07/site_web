var slideTimeout;

$('#fullpage').fullpage({
    sectionsColor: ['#ccc', '#999', '#777'],
    anchors: ['home', 'about', 'contact'],
    animateAnchor: false,
    menu: '.nav',
    paddingTop: '50px',
    verticalCentered: false,
    slidesNavigation: true,
    slidesNavPosition: 'bottom',
    css3: true,
    afterRender: function () {
        //on page load, start the slideshow
         slideTimeout = setInterval(function () {
                $.fn.fullpage.moveSlideRight();
            }, 1000);
    },
  

    onLeave: function (index, direction) {
        //after leaving section 1 (home) and going anywhere else, whether scrolling down to next section or clicking a nav link, this SHOULD stop the slideshow and allow you to navigate the site...but it does not
        if (index == '1') {
            console.log('on leaving the slideshow/section1');
            clearInterval(slideTimeout);
        }
    }
});