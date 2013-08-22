/*
------------------------------------------------------------------
    
    - Document: router.js
    - Version:  1.0.0
    - Client:   
    - Author:   http://yojam.es
    - Started:  

------------------------------------------------------------------

[ Table of Contents ]

    - Global Namespace
    - router

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


/*------------------------------------------------------------------
[ Router ]
-------------------------------------------------------------------*/

    // app router
    APP.Router = Backbone.Router.extend({

        /*
        data store
        */
        data : {
            _routerHistory : [],
        },


        /*
        define routes
        */
        routes: {
            ""  : "getIndex",
        },


        /*
        store all routes in history array
        */
        storeRoute : function (){
            this.data._routerHistory.push(Backbone.history.fragment);
        },

        /*
        move back silenty - useful for closing overlays / modals etc 
        */
        previousRouter : function (){

            if(this.data._routerHistory.length>1)
            {
                this.navigate(this.data._routerHistory[_routerHistory.length-2], true);
            }
        },

        /*
        initialise router
        */
        initialize : function () {

            var
            _self = this;

            /*
            push routes
            */
            this.bind('route', function(event){
                this.storeRoute();
            });
        },


        /*
        get index
        */
        getIndex : function (){

            console.log('get index');

            /*
            create new view
            */
            this.routeView = new APP.Views.indexView();

            /*
            render to dom
            */
            $('#app-layout-main').html(this.routeView.el); 
        },
        
    });

