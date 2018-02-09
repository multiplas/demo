    jQuery(function($) {

        var ddOpenTimeout;
        var dMenuPosTimeout;
        var DD_DELAY_IN = 200;
        var DD_DELAY_OUT = 0;
        var DD_ANIMATION_IN = 0;
        var DD_ANIMATION_OUT = 0;

        $('.clickable-dropdown > .dropdown-heading').click(function() {
            $(this).parent().addClass('open');
            $(this).parent().trigger('mouseenter');
        });

        //$('.dropdown-heading').on('click', function(e) {
        $(document).on('click', '.dropdown-heading', function(e) {
            e.preventDefault();
        });

        $(document).on('mouseenter', '.dropdown', function() {

            var ddToggle = $(this).children('.dropdown-heading');
            var ddMenu = $(this).children('.dropdown-content');
            var ddWrapper = ddMenu.parent();
            ddMenu.css("left", "");
            ddMenu.css("right", "");

            if ($(this).hasClass('clickable-dropdown'))
            {
                if ($(this).hasClass('open'))
                {
                    $(this).children('.dropdown-content').stop(true, true).delay(DD_DELAY_IN).fadeIn(DD_ANIMATION_IN, "easeOutCubic");
                }
            }
            else
            {
                clearTimeout(ddOpenTimeout);
                ddOpenTimeout = setTimeout(function() {

                    ddWrapper.addClass('open');

                }, DD_DELAY_IN);

                //$(this).addClass('open');
                $(this).children('.dropdown-content').stop(true, true).delay(DD_DELAY_IN).fadeIn(DD_ANIMATION_IN, "easeOutCubic");
            }

            clearTimeout(dMenuPosTimeout);
            dMenuPosTimeout = setTimeout(function() {

                if (ddMenu.offset().left < 0)
                {
                    var space = ddWrapper.offset().left; 					ddMenu.css("left", (-1)*space);
                    ddMenu.css("right", "auto");
                }

            }, DD_DELAY_IN);

        }).on('mouseleave', '.dropdown', function() {

            var ddMenu = $(this).children('.dropdown-content');
            clearTimeout(ddOpenTimeout); 			ddMenu.stop(true, true).delay(DD_DELAY_OUT).fadeOut(DD_ANIMATION_OUT, "easeInCubic");
            if (ddMenu.is(":hidden"))
            {
                ddMenu.hide();
            }
            $(this).removeClass('open');
        });

        var windowScroll_t;
        $(window).scroll(function(){

            clearTimeout(windowScroll_t);
            windowScroll_t = setTimeout(function() {

                if ($(this).scrollTop() > 100)
                {
                    $('#scroll-to-top').fadeIn();
                }
                else
                {
                    $('#scroll-to-top').fadeOut();
                }

            }, 500);

        });

    });