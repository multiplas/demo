   //<![CDATA[
 jQuery(function($) {
            var owl2 = $('#pie00-brands_foot');
            owl2.owlCarousel({
                lazyLoad: true,
		autoPlay: true,
                itemsCustom: [ [0, 1], [320, 2], [480, 3], [960, 4], [1280, 8] ],
                responsiveRefreshRate: 50,
                slideSpeed: 200,
                paginationSpeed: 500,
                scrollPerPage: true,
                stopOnHover: true,
                rewindNav: true,
                rewindSpeed: 600,
		pagination: false,
                navigation: false,
                navigationText: false
            }); //end: owl
        });
    
    //]]>