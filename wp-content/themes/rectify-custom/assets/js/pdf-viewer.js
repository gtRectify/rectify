/**
 * Full-page, view-only PDF viewer for the Modern Slavery Statement page.
 *
 * Renders every page to a <canvas> via pdf.js instead of embedding a native
 * PDF plugin/iframe, so there is no built-in download or print control to
 * remove — the toolbar below only exposes zoom and a page indicator.
 */
( function () {
    'use strict';

    var config = window.rxPdfViewerConfig;

    if ( ! config || ! config.pdfjsUrl || ! config.workerUrl ) {
        return;
    }

    var DEVICE_SCALE = window.devicePixelRatio || 1;
    var BASE_SCALE   = 1.25;

    function initViewer( container ) {
        var pdfUrl       = container.getAttribute( 'data-pdf-url' );
        var pagesEl      = container.querySelector( '.rx-pdf-pages' );
        var currentPageEl = container.querySelector( '.rx-pdf-current-page' );
        var totalPagesEl  = container.querySelector( '.rx-pdf-total-pages' );
        var zoomLevelEl   = container.querySelector( '.rx-pdf-zoom-level' );
        var zoomInBtn     = container.querySelector( '.rx-pdf-zoom-in' );
        var zoomOutBtn    = container.querySelector( '.rx-pdf-zoom-out' );

        if ( ! pdfUrl || ! pagesEl ) {
            return;
        }

        var pdfDoc   = null;
        var scale    = BASE_SCALE;
        var canvases = [];

        function renderPage( pageNumber ) {
            return pdfDoc.getPage( pageNumber ).then( function ( page ) {
                var viewport = page.getViewport( { scale: scale * DEVICE_SCALE } );
                var canvas   = canvases[ pageNumber - 1 ];
                var ctx      = canvas.getContext( '2d' );

                canvas.width        = viewport.width;
                canvas.height       = viewport.height;
                canvas.style.width  = ( viewport.width / DEVICE_SCALE ) + 'px';
                canvas.style.height = ( viewport.height / DEVICE_SCALE ) + 'px';

                return page.render( { canvasContext: ctx, viewport: viewport } ).promise;
            } );
        }

        function renderAllPages() {
            var chain = Promise.resolve();

            canvases.forEach( function ( _canvas, index ) {
                chain = chain.then( function () {
                    return renderPage( index + 1 );
                } );
            } );

            return chain;
        }

        function setZoom( nextScale ) {
            scale = Math.min( 2.5, Math.max( 0.5, nextScale ) );

            if ( zoomLevelEl ) {
                zoomLevelEl.textContent = Math.round( ( scale / BASE_SCALE ) * 100 ) + '%';
            }

            renderAllPages();
        }

        function updateCurrentPageFromScroll() {
            if ( ! currentPageEl ) {
                return;
            }

            var scrollTop       = pagesEl.scrollTop;
            var closest          = 1;
            var closestDistance = Infinity;

            canvases.forEach( function ( canvas, index ) {
                var distance = Math.abs( canvas.offsetTop - scrollTop );

                if ( distance < closestDistance ) {
                    closestDistance = distance;
                    closest = index + 1;
                }
            } );

            currentPageEl.textContent = closest;
        }

        import( config.pdfjsUrl ).then( function ( pdfjsLib ) {
            pdfjsLib.GlobalWorkerOptions.workerSrc = config.workerUrl;

            return pdfjsLib.getDocument( pdfUrl ).promise;
        } ).then( function ( doc ) {
            pdfDoc = doc;

            if ( totalPagesEl ) {
                totalPagesEl.textContent = doc.numPages;
            }

            pagesEl.innerHTML = '';
            canvases = [];

            for ( var i = 1; i <= doc.numPages; i++ ) {
                var canvas = document.createElement( 'canvas' );
                canvas.setAttribute( 'aria-label', 'Page ' + i );
                pagesEl.appendChild( canvas );
                canvases.push( canvas );
            }

            return renderAllPages();
        } ).catch( function ( error ) {
            pagesEl.innerHTML = '<div class="rx-pdf-status">Unable to load the document right now.</div>';

            if ( window.console ) {
                window.console.error( 'rx-pdf-viewer:', error );
            }
        } );

        if ( zoomInBtn ) {
            zoomInBtn.addEventListener( 'click', function () {
                setZoom( scale + 0.25 );
            } );
        }

        if ( zoomOutBtn ) {
            zoomOutBtn.addEventListener( 'click', function () {
                setZoom( scale - 0.25 );
            } );
        }

        pagesEl.addEventListener( 'scroll', updateCurrentPageFromScroll, { passive: true } );

        // View-only deterrents: the toolbar above has no download/print
        // controls, and these block the common shortcuts/menus used to
        // grab the underlying file. Client-side rendering can never make a
        // browser-viewable document impossible to capture, but this removes
        // the easy paths.
        container.addEventListener( 'contextmenu', function ( event ) {
            event.preventDefault();
        } );

        container.addEventListener( 'dragstart', function ( event ) {
            event.preventDefault();
        } );
    }

    var viewers = document.querySelectorAll( '.rx-pdf-viewer' );

    Array.prototype.forEach.call( viewers, initViewer );

    if ( viewers.length ) {
        document.addEventListener( 'keydown', function ( event ) {
            var key            = ( event.key || '' ).toLowerCase();
            var isSaveOrPrint = ( event.ctrlKey || event.metaKey ) && ( 's' === key || 'p' === key );

            if ( isSaveOrPrint ) {
                event.preventDefault();
            }
        } );
    }
} )();
