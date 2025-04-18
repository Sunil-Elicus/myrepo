jQuery( window ).on( "elementor/frontend/init", function () {    
    var e = elementorModules.frontend.handlers.Base.extend( {
        bindEvents: function () {
            this.change();
        },     
        change: function () {
            jQuery( document ).ready( function ( $ ) {  
              
                var dynamicVariables = {};  
                            
                document.querySelectorAll( ".wpmozo-image-hotspot-wrapper" ).forEach( function ( element ) {
                    var singleId            = element.getAttribute( "data-tooltip-id" ).replace( 'elementor-','' );
                    var dataTrigger         = element.getAttribute( "data-trigger" );
                    var speechBubble        = element.getAttribute( "data-speech-bubble" );
                    var dataInteractive     = element.getAttribute( "data-interactive" );
                    var dataAnimationName   = element.getAttribute( 'data-animation-name' );  
                    var animationDuration   = element.getAttribute( 'data-animation-duration' );  
                    
                    dynamicVariables[ 'tippyOptions_'+singleId ] = {
                        allowHTML: true,
                        placement: 'top',
                        theme: 'light',                                                 
                        content: function ( reference ) {                            
                            var id = reference.getAttribute( 'data-template' );                           
                            var template = document.getElementById( id );
                            return '<div class="wpmozo-floating-container wpmozo-wrapper-'+singleId+'">'+template.innerHTML+'</div>';
                        },
                    };
                    if ( dataTrigger === 'click' ) {
                        dynamicVariables[ 'tippyOptions_'+singleId ].trigger = 'click';
                    }
                    if ( '' === speechBubble ) {
                        dynamicVariables[ 'tippyOptions_'+singleId ].arrow = false;
                    }
                    if ( '' === animationDuration ) {
                        dynamicVariables[ 'tippyOptions_'+singleId ].duration = animationDuration;
                    }
                    
                    if ( 'yes' === dataInteractive ) {
                        dynamicVariables[ 'tippyOptions_'+singleId ].interactive = true;
                    }
                    if ( '' !== dataAnimationName ) {
                        dynamicVariables[ 'tippyOptions_'+singleId ].animation = dataAnimationName;
                    }
                    tippy( '.elementor-' + singleId + ' .wpmozo-image-hotspot-single-item', dynamicVariables[ 'tippyOptions_'+singleId ] );
                } );  
                           
            } );
        },
    } );    
    elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_image_hotspot", e );
} );
