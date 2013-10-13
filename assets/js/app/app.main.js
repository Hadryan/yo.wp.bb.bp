/*
------------------------------------------------------------------
    
    - Document: app.main.js
    - Version:  1.0.0
    - Author:   http://yojam.es

/*------------------------------------------------------------------
[ namespace ]
-------------------------------------------------------------------*/    

    var
    APP = window.APP || (window.APP = {});

/*------------------------------------------------------------------
[ config ]
-------------------------------------------------------------------*/
    
    APP.config = {

        paths :{
            templates : ''
        },

        environment: {
            isTouch : (Modernizr.touch) ? true : false
        },

        animation : {
            speed : 200,
            ease  : 'easeInOutCirc'
        }
    };
    
/*------------------------------------------------------------------
[ start ]
-------------------------------------------------------------------*/
    
    $(function(){

        /*
        pre load templates 
        start backbone as callback
        */
        APP.utils.loadTemplate(['indexView'], function() {
            
            // prep
            router = new APP.Router();
            
            // start backbone with pushstate
            Backbone.history.start({pushState:true, root: "/"});

            // still need to prevent clicks being followed with pushstate
            
            $(document).on('click', 'a:not(.noHistory)', function (event) {

                var
                href = $(this).attr('href'),
                protocol = this.protocol + '//';

                if (href.slice(protocol.length) !== protocol) {
                    event.preventDefault();
                    router.navigate(href, true);
                }
            });
        });
    });

