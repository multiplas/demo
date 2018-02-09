/* ########################################################### */
/* #################### RUBY MEGA MENU   ##################### */
/* ######################## V 1.0 ############################ */

/* ############## DEMO SHOWCASE JAVASCRIPT ################### */
/* THESE JS FOR DEMO SHOWCASE ONLY. ANY PROBLEM/QUESTION       */
/* REGARDING DEMO JS WILL NOT BE SUPPORTED.                    */

rubyMenuDemo = function()
{
  // Strict Mode
  "use strict";

  // Theme Switcher
  jQuery( "#rubyTheme1" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-1.css') );
  });
  jQuery( "#rubyTheme2" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-2.css') );
  });
  jQuery( "#rubyTheme3" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-3.css') );
  });
  jQuery( "#rubyTheme4" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-4.css') );
  });
  jQuery( "#rubyTheme5" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-5.css') );
  });
  jQuery( "#rubyTheme6" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-6.css') );
  });
  jQuery( "#rubyTheme7" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-7.css') );
  });
  jQuery( "#rubyTheme8" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-8.css') );
  });
  jQuery( "#rubyTheme9" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-9.css') );
  });
  jQuery( "#rubyTheme10" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-10.css') );
  });
  jQuery( "#rubyTheme11" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-11.css') );
  });
  jQuery( "#rubyTheme12" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-12.css') );
  });
  jQuery( "#rubyTheme13" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-13.css') );
  });
  jQuery( "#rubyTheme14" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-14.css') );
  });
  jQuery( "#rubyTheme15" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-15.css') );
  });
  jQuery( "#rubyTheme16" ).on('click', function() {
    jQuery('head').append( jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'temas/12/bloques/css/ruby-theme-16.css') );
  });
  jQuery( "#cmn-toggle-1" ).on('click', function() {
    jQuery("div.ruby-wrapper:not(.ruby-vertical)").toggleClass("ruby-menu-full-width");
  });
  jQuery( "#cmn-toggle-2" ).on('click', function() {
    jQuery("div.ruby-menu-demo-header").toggleClass("ruby-menu-demo-header-bg");
    jQuery("div.ruby-wrapper").toggleClass("ruby-menu-transparent");
  });
  jQuery( "#cmn-toggle-3" ).on('click', function() {
    var attr = jQuery("#ruby-transitions").attr('disabled');
    if (typeof attr !== typeof undefined && attr !== false) {
      // Element has this attribute
      jQuery("#ruby-transitions").removeAttr("disabled");
    } else {
      jQuery("#ruby-transitions").attr("disabled", "disabled");
    }
  });
  jQuery( "#cmn-toggle-4" ).on('click', function() {
    jQuery("ul.ruby-menu").toggleClass("ruby-menu-dividers");
  });
}

rubyMenuDemo();
