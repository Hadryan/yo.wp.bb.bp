/*
------------------------------------------------------------------
    
    - Document: index.js
    - Version:  1.0.0
    - Author:   http://yojam.es

/*------------------------------------------------------------------
[ namespace ]
-------------------------------------------------------------------*/

    var
    APP = window.APP || (window.APP = {});

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