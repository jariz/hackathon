  $(window).bind("load", function () {
        $('#loader').fadeOut(100);
    });

var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       false       // trigger animations on mobile devices (true is default)
  }
);
wow.init();

var container = document.querySelector('.container');
var msnry = new Masonry( container, {
  // options...
  itemSelector: 'article',
  columnWidth: 300,
});