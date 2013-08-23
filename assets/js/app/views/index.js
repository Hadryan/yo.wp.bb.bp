/*
------------------------------------------------------------------
    
    - Document: index.js
    - Version:  1.0.0
    - Client:   
    - Author:   http://yojam.es
    - Started:  

------------------------------------------------------------------

[ Table of Contents ]

    - Global Namespace
    - index

-------------------------------------------------------------------*/


/*------------------------------------------------------------------
[ Global namespace / object ]
-------------------------------------------------------------------*/

    /*
    * Namespace
    * All objects & methods are attached to this global object SF.
    * Any JS files for this theme should start by scoping this object.
    */
    var
    APP = window.APP || (window.APP = {});

    // view object
    var
    Views = APP.Views || (APP.Views = {});

/*------------------------------------------------------------------
[ Index ]
-------------------------------------------------------------------*/

    APP.Views.indexView = Backbone.View.extend({

        /*  
        initialise
        */
        initialize:function () {

            this.render(); 
        },

        /*
        render
        */
        render:function (response) {
            
            this.$el.html(this.template());

            return this;
        }

    });