/*
------------------------------------------------------------------
    
    - Document: app.main.js
    - Version:  1.0.0
    - Client:   
    - Author:   http://yojam.es
    - Started:  

------------------------------------------------------------------

[ Table of Contents ]

    - Global Namespace
    - Config
    - doc ready

-------------------------------------------------------------------*/


/*------------------------------------------------------------------
[ Global namespace ]
-------------------------------------------------------------------*/
    
    /*
    * Namespace
    * All objects & methods are attached to this global object SF.
    * Any JS files for this theme should start by scoping this object.
    */
    var
    APP = window.APP || (window.APP = {});


/*------------------------------------------------------------------
[ Global config and booleans ]
-------------------------------------------------------------------*/
    
    /*
    * Config
    */
    APP.config = {

        paths :{,
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
[ doc ready ]
-------------------------------------------------------------------*/
    
    /*
    * Doc Ready
    */
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

