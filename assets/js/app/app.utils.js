/*
------------------------------------------------------------------
    
    - Document: app.utils.js
    - Version:  1.0.0
    - Client:   
    - Author:   http://yojam.es
    - Started:  

------------------------------------------------------------------

[ Table of Contents ]

    - Global Namespace
    - utils Object
        - load templates
        - check ua
    - avoid console errors
    - modernizr ios tests
    - easings

-------------------------------------------------------------------*



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
[ utils object ]
-------------------------------------------------------------------*/
    
    APP.utils = {

        /*
        Asynchronously load templates located in separate .html files
        be aware that template file names must match view declaration names
        */
        loadTemplate: function(views, callback) {

            var deferreds = [];

            $.each(views, function(index, view) {

                if (APP.Views[view]) {
                    deferreds.push($.get('/wp-content/themes/yo.wp.bb.bp/assets/templates/' + view + '.html', function(data) {
                        APP.Views[view].prototype.template = _.template(data);
                    }));
                } else {
                    alert(view + " not found");
                }
            });

            $.when.apply(null, deferreds).done(callback);
        },

        /*
        check UA
        */
        checkUa : function() {
                
            this.os = {
                Win         : new RegExp( /win/i ).test( navigator.userAgent ),
                Mac         : new RegExp( /mac/i ).test( navigator.userAgent ),
                Ios         : new RegExp( /iphone|ipad|ipod/i ).test( navigator.userAgent ),
                Android : new RegExp( /android/i ).test( navigator.userAgent )
            };

            this.browser = {
                lteIE6  : typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined",
                lteIE7  : typeof window.addEventListener == "undefined" && typeof document.querySelectorAll == "undefined",
                lteIE8  : typeof window.addEventListener == "undefined" && typeof document.getElementsByClassName == "undefined",
                IE      : Boolean( document.uniqueID ),
                Firefox : Boolean( window.sidebar ),
                Opera   : Boolean( window.opera ),
                Webkit  : !document.uniqueID && !window.opera && !window.sidebar && window.localStorage && typeof window.orientation == "undefined",
                sp      : typeof window.orientation !== "undefined"
            };
        }
    };


/*------------------------------------------------------------------
[ Avoid console errors ]
-------------------------------------------------------------------*/
    
    (function() {
        var method;
        var noop = function () {};
        var methods = [
            'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
            'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
            'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
            'timeStamp', 'trace', 'warn'
        ];

        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
            method = methods[length];

            // Only stub undefined methods.
            if (!console[method]) {
                console[method] = noop;
            }
        }
    }());


/*------------------------------------------------------------------
[ Modernizr IOS tests]
-------------------------------------------------------------------*/

    Modernizr.addTest('ipad', function () {
        return !!navigator.userAgent.match(/iPad/i);
    });

    Modernizr.addTest('iphone', function () {
        return !!navigator.userAgent.match(/iPhone/i);
    });

    Modernizr.addTest('ipod', function () {
        return !!navigator.userAgent.match(/iPod/i);
    });

    Modernizr.addTest('appleios', function () {
        return (Modernizr.ipad || Modernizr.ipod || Modernizr.iphone);
    });


/*------------------------------------------------------------------
[ Easings ]
-------------------------------------------------------------------*/

    jQuery.extend(jQuery.easing, {

        easeOutQuart: function(e, f, a, h, g) {
            return -h * ((f = f / g - 1) * f * f * f - 1) + a
        },
        easeOutCirc: function (x, t, b, c, d) {
            return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
        },
        easeOutExpo: function (x, t, b, c, d) {
            return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
        },
        easeInOutExpo: function (x, t, b, c, d) {
            if (t==0) return b;
            if (t==d) return b+c;
            if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
            return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
        },
        easeInOutCirc: function (x, t, b, c, d) {
            if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
            return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
        }
    });

