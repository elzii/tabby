!(function ($){

    "use strict";

    window.TABBY = {};
    var tabby    = window.TABBY;
    var iOS      = ( navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false );


    /* INITIATE FUNCTIONS
    ================================================== */
    tabby.init = function(){
        tabby.setElements();
        tabby.setVars();
        tabby.basics();
        tabby.scroll();
        tabby.readJSON();

    };

    /* SET ELEMENTS
    ================================================== */
    tabby.setElements = function(){
        tabby.el          = {};
        tabby.el.page_wrap         = $('.page-wrap'),
        tabby.el.notification      = $('#notification'),
        tabby.el.notification_msg  = tabby.el.notification.find('span.message');

    };

    /* SET VARIABLES
    ================================================== */
    tabby.setVars = function() {
        // jquery easing plugin init
        jQuery.easing.def = "string";
    }
    
    /* BASICS
    ================================================== */
    tabby.basics = function(){

    };

    /* SCROLL
    ================================================== */
    tabby.scroll = function(){

        var duration        = 500,
            easing          = 'swing',
            scroll_offset   = 15;

        $('a[href^="#"].scroll').click(function(e){
            var $self = $(this);
            var destination = $($self.attr('href'));
            e.preventDefault();
            // if destination is valid, scroll to
            if(destination && destination.offset()){
                if(/(iPhone|iPod)\sOS\s6/.test(navigator.userAgent)){
                    $('html, body').animate({
                        scrollTop: $(destination).offset().top
                    }, duration, easing);
                } else {
                    $('html, body').animate({
                        scrollTop: $(destination).offset().top - (scroll_offset)
                    }, duration, easing);
                }
            }
        });

        $('a#find-a-campaign').click(function(){
            $('#find-a-campaign #searchform .inline-field-text').focus();
        })

    };


    /* readJSON
    ================================================== */
    tabby.readJSON = function(){

      var list = $('ul#app_list');

      $.getJSON('appmarks.json', function(data) {
        var items     = [];
        var children  = data['appmarks'];
       
        $.each(children, function(key, val) {
          
          list.append(' \
            <li class="appmark"> \
              <a href="'+children[key].url+'"> \
                <img src="assets/images/'+children[key].img_url+'"> \
                <span class="appmark-name">'+children[key].name+'</span> \
              </a> \
            </li>'
          );
        });
      });
    }
    

    /* APPMARK INTERACTIONS
    ================================================== */
    tabby.appMarks = function() {

      var appmark       = $('li.appmark');

      appmark.hover(function(){
        var appmark_name  = $(this).find('span.appmark-name').text();

        tabby.el.notification_msg.empty().append(appmark_name);

      }, function() {
        tabby.el.notification_msg.empty();
      });
    }


    /* ACE 
    ================================================== */
    tabby.aceEditor = function() {
      var e = ace.edit("e");

      e.setTheme("ace/theme/monokai");
      e.getSession().setMode("ace/mode/javascript");
    }
     


    /* ================================================================ */
    /*                                                                  */
    /*                     DOCUMENT / WINDOW CALLS                      */
    /*                                                                  */
    /* ================================================================ */



    /* DOCUMENT READY
    ================================================== */
    $(document).ready(function(){
        
        tabby.init();
        
    });

    /* WINDOW LOAD
    ================================================== */
    $(window).load(function(){
        
        tabby.el.page_wrap.stop().fadeIn();
        tabby.appMarks();

    });

    /* SIAF
    ================================================== */
    (function(){ 

        tabby.setVars();

    })();


})(jQuery);
