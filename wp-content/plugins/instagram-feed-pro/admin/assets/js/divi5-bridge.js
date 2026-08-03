/**
 * Divi 5 Visual Builder bridge script.
 *
 * In Divi 5, legacy D4 modules render via server-side AJAX — the module HTML
 * is injected into the VB iframe after document.ready. Since sbi_init() runs
 * at document.ready (before the HTML exists), the feed never initializes.
 *
 * This bridge uses a MutationObserver to detect when feed HTML is injected
 * or replaced in the DOM (initial render + setting changes) and calls
 * sbi_init() to initialize the feed.
 *
 * @since 6.x
 */
(function () {
	if ( typeof MutationObserver === 'undefined' ) {
		return;
	}

	var initTimer  = null;
	var retryCount = 0;
	var maxRetries = 20;

	/**
	 * Debounced feed initialization.
	 * Retries if sbi_init is not yet available (script still loading).
	 *
	 * @param {boolean} isRetry Internal flag — true when called recursively.
	 */
	function initFeeds( isRetry ) {
		if ( initTimer ) {
			clearTimeout( initTimer );
		}

		// Reset retry count on each new observer trigger so that a previous
		// exhausted retry cycle does not block subsequent initializations
		// (e.g. user changes settings after a slow initial load).
		if ( ! isRetry ) {
			retryCount = 0;
		}

		initTimer = setTimeout( function () {
			if ( typeof window.sbi_init === 'function' ) {
				window.sbi_init();
			} else if ( retryCount < maxRetries ) {
				retryCount++;
				initFeeds( true );
			}
		}, 300 );
	}

	/**
	 * Check if a DOM node is or contains a feed container.
	 */
	function isFeedNode( node ) {
		if ( node.nodeType !== 1 ) {
			return false;
		}

		if (
			node.id === 'sb_instagram' ||
			node.classList.contains( 'sb_instagram' ) ||
			node.classList.contains( 'sbi' )
		) {
			return true;
		}

		return node.querySelector && node.querySelector( '#sb_instagram, .sb_instagram, .sbi' );
	}

	var observer = new MutationObserver( function ( mutations ) {
		for ( var i = 0; i < mutations.length; i++ ) {
			var addedNodes = mutations[ i ].addedNodes;
			for ( var j = 0; j < addedNodes.length; j++ ) {
				if ( isFeedNode( addedNodes[ j ] ) ) {
					initFeeds();
					return;
				}
			}
		}
	} );

	function startObserving() {
		if ( document.body ) {
			observer.observe( document.body, { childList: true, subtree: true } );
		} else {
			document.addEventListener( 'DOMContentLoaded', function () {
				observer.observe( document.body, { childList: true, subtree: true } );
			} );
		}
	}

	startObserving();
})();
