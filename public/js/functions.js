(function($){
    $(document).ready(function () {

        var container = $('.container');
        container.isotope({
            // options
            itemSelector: 'article',
            layoutMode: 'masonry'
        });

        container.infinitescroll({
                navSelector  : '.pagination',
                nextSelector : '.pagination li:last-child a',
                itemSelector : 'article',
                loading: {
                    finishedMsg: 'No more pages to load.',
                    img: 'http://i.imgur.com/qkKy8.gif'
                }
            },
            // call Isotope as a callback
            function( newElements ) {
                container.isotope( 'appended', $( newElements ) );
                $("img.lazy").lazyload();
            }
        );

//        $.ias({
//            container: '.container',
//            item: '.item',
//            pagination: '.pagination',
//            next: '.pagination li:last-child a',
//            loader: '<div class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Meer nieuws aan het laden</div>',
//            trigger: 'Meer huizen laden',
//            triggerPageThreshold: 20,
//            onLoadItems: function () {
//                $(".container").isotope("reloadItems").isotope();
//                $("img.lazy").lazyload();
//            }
//        });

        $(window).bind("load", function () {
            $('#loader').fadeOut(100);
        });

        var wow = new WOW(
            {
                mobile: false       // trigger animations on mobile devices (true is default)
            }
        );
        wow.init();

        $("img.lazy").lazyload();


    });
})(jQuery);