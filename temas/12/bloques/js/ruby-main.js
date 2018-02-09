/* ########################################################### */
/* #################### RUBY MEGA MENU   ##################### */
/* ######################## V 1.0 ############################ */

/* #################### MAIN JAVASCRIPT ###################### */

jQuery(document).ready(function(){
  /*jQuery('.ruby-wrapper').mouseover(function(){
      if (jQuery( window ).width() > 768)
        jQuery('.ruby-wrapper').css('height','105px');
  });

  jQuery('.ruby-wrapper').mouseleave(function(){
      jQuery('.ruby-wrapper').css('height','50px');
  });*/

  jQuery('.animate-input').mouseover(function(){
      jQuery('#busc').css('width','190px');
      jQuery('.animate-input').css('background','#19ad86');
  });

  jQuery('.animate-input').focusout(function(){
      jQuery('#busc').css('width','0px');
      jQuery('.animate-input').css('background','#333333');
  });
});

rubyMenu = function()
{
  // Strict Mode
  "use strict";

  var rubyMenuMegaBlog = "ul.ruby-menu > li.ruby-menu-mega-blog";
  var tabMaxHeight = -1;
  var $rubyMenuMainToggle = jQuery(".c-hamburger");

  var rubyMenuMegaShopListHeight = jQuery("ul.ruby-menu > li.ruby-menu-mega-shop > div").height();
  var rubyMenuMegaShopActiveContentHeight = jQuery("ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li.ruby-active-menu-item > div").height();
  var rubyMenuMegaShopHeight = rubyMenuMegaShopListHeight + rubyMenuMegaShopActiveContentHeight;

  // Ruby Mobile Main Level Toggle
  $rubyMenuMainToggle.on("click", function(e) {
    e.preventDefault;
    $rubyMenuMainToggle.toggleClass("is-active");
    jQuery("ul.ruby-menu").toggleClass("ruby-mobile-sublevel-show")
    // Do something else, like open/close menu
  });

  // PAGE LOAD FUNCTION
  jQuery(window).bind("load resize", function() {

    var rubyWindowWidth = jQuery(window).width();

    if ( rubyWindowWidth <= 768 ) {

      // Reset Ruby Menu Mega Blog height to auto for mobile view
      jQuery(rubyMenuMegaBlog).find(">div").css("height","auto");
      jQuery(rubyMenuMegaBlog).find(">div > ul > li > div").css("height","100%");

      // Reset Ruby Menu Mega Shop height to auto for mobile view
      jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div" ).css("height","auto");

      jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li" ).mouseover(function() {
        jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div" ).css("height","auto");
      });
      jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li" ).mouseout(function() {
        jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div" ).css("height","auto");
      });

      var rubyMenuDropdownToggle       = "span.ruby-dropdown-toggle";
      var $rubyDropdownToggleHtml      = jQuery( "<span class='ruby-dropdown-toggle'></span>" );
      var rubyMenuDropdownToggleRotate = "ruby-dropdown-toggle-rotate";
      var rubyMenuSubLevelVisible      = "ruby-mobile-sublevel-show";

      // Append Dropdown Toggle Arrows and Bind Click Events
      if (  !jQuery( rubyMenuDropdownToggle ).length  ) {
        jQuery("ul.ruby-menu > li:has(> ul), ul.ruby-menu > li > ul > li:has(> ul), ul.ruby-menu > li > ul > li > ul > li:has(> ul), ul.ruby-menu > li.ruby-menu-mega, ul.ruby-menu > li.ruby-menu-mega-blog, ul.ruby-menu > li.ruby-menu-mega-shop, ul.ruby-menu > li.ruby-menu-mega-blog > div > ul.ruby-menu-mega-blog-nav > li, ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li").append($rubyDropdownToggleHtml);
      }

      // Open&Close Any Sublevel Menu when Dropdown Toggle Arrows are clicked
      jQuery( rubyMenuDropdownToggle ).on('click', function() {
        // Rotate the Arrow
        jQuery(this).toggleClass( rubyMenuDropdownToggleRotate );
        // Define Any SubLevel as Variable
        var $rubyMenuToggler1stAncestor = jQuery(this).parents().eq(0);
        var $rubyMenuAnySubLevel = $rubyMenuToggler1stAncestor.find(" > ul ");
        var $rubyMenuAnyMegaSubLevel = $rubyMenuToggler1stAncestor.find(" > div ");
        // Hide & Show SubLevel
        if($rubyMenuAnySubLevel.hasClass(rubyMenuSubLevelVisible)) {
          $rubyMenuAnySubLevel.removeClass(rubyMenuSubLevelVisible);
        } else {
          $rubyMenuAnySubLevel.addClass(rubyMenuSubLevelVisible);
        }
        if($rubyMenuAnyMegaSubLevel.hasClass(rubyMenuSubLevelVisible)) {
          $rubyMenuAnyMegaSubLevel.removeClass(rubyMenuSubLevelVisible);
        } else {
          $rubyMenuAnyMegaSubLevel.addClass(rubyMenuSubLevelVisible);
        }
      });
    }
    else {
      // RUBY MEGA MENU - BLOG --> RETURN TO ACTIVE TAB ALWAYS WHEN MOUSEOUT
    	jQuery( "ul.ruby-menu > li.ruby-menu-mega-blog > div > ul.ruby-menu-mega-blog-nav > li" ).mouseover(function() {
    	  if ( !jQuery(this).is(":first-child") ) {
    			jQuery( "ul.ruby-menu > li.ruby-menu-mega-blog > div > ul.ruby-menu-mega-blog-nav > li:first-child" ).removeClass( "ruby-active-menu-item" );
    		}
    	});

    	jQuery( "ul.ruby-menu > li.ruby-menu-mega-blog > div > ul.ruby-menu-mega-blog-nav > li" ).mouseleave(function() {
    		jQuery( "ul.ruby-menu > li.ruby-menu-mega-blog > div > ul.ruby-menu-mega-blog-nav > li:first-child" ).addClass( "ruby-active-menu-item" );
    	});

      // RUBY MEGA MENU - BLOG --> SET HEIGHT OF THE CONTAINER EQUALS TO THE HEIGHT OF THE MAXIMUM CONTENT HEIGHT
      jQuery(rubyMenuMegaBlog).each(function() {
        var m = jQuery(this).find("> div > ul > li");
        jQuery(m).each(function() {
          var h = jQuery(this).find("> div").height();
          tabMaxHeight = h > tabMaxHeight ? h : tabMaxHeight;
        });
        jQuery(rubyMenuMegaBlog).find(">div").css("height",tabMaxHeight+5);
        jQuery(rubyMenuMegaBlog).find(">div > ul > li > div").css("height",tabMaxHeight);
      });

      // RUBY MEGA MENU - SHOP --> SET HEIGHT OF THE CONTAINER EQUALS TO THE HEIGHT OF THE MAXIMUM CONTENT HEIGHT
      jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div" ).css("height",rubyMenuMegaShopHeight);

      jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li" ).mouseover(function() {
        var updatedHeight = $ ( this ).find( "> div" ).height() + rubyMenuMegaShopListHeight;
        jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div" ).css("height",updatedHeight);
      });

      jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li" ).mouseout(function() {
        jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div" ).css("height",rubyMenuMegaShopHeight);
      });

      // RUBY MEGA MENU - SHOP --> RETURN TO ACTIVE TAB ALWAYS WHEN MOUSEOUT
    	jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li" ).mouseover(function() {
        if ( !jQuery(this).is(":first-child") ) {
      		jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li:first-child" ).removeClass( "ruby-active-menu-item" );
      	}
    	});

      jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li" ).mouseleave(function() {
      	jQuery( "ul.ruby-menu > li.ruby-menu-mega-shop > div > ul > li:first-child" ).addClass( "ruby-active-menu-item" );
    	});

    }
  });

}

rubyMenu();
