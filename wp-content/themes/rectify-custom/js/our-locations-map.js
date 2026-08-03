/**
 * Interactive Google Map for the Our Locations page, showing pins for each
 * Rectify office.
 */
(function () {
	'use strict';

	function createInfoWindowContent( office ) {
		var wrapper = document.createElement( 'div' );
		wrapper.className = 'rx-loc-map-infowindow';

		var title = document.createElement( 'h3' );
		title.className = 'rx-loc-map-infowindow-title';
		title.textContent = office.title;
		wrapper.appendChild( title );

		var address = document.createElement( 'p' );
		address.className = 'rx-loc-map-infowindow-address';
		address.textContent = office.address;
		wrapper.appendChild( address );

		if ( office.phone ) {
			var phone = document.createElement( 'a' );
			phone.className = 'rx-loc-map-infowindow-phone';
			phone.href = 'tel:' + office.phone.replace( /\s+/g, '' );
			phone.textContent = office.phone;
			wrapper.appendChild( phone );
		}

		var link = document.createElement( 'a' );
		link.className = 'rx-loc-map-infowindow-link';
		link.href = 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent( office.address );
		link.target = '_blank';
		link.rel = 'noopener noreferrer';
		link.textContent = 'Get Directions →';
		wrapper.appendChild( link );

		return wrapper;
	}

	function initRectifyLocationsMap() {
		var mapElement = document.getElementById( 'rxLocMap' );

		if ( ! mapElement || ! window.google || ! window.google.maps ) {
			return;
		}

		var offices = [];

		try {
			offices = JSON.parse( mapElement.getAttribute( 'data-offices' ) || '[]' );
		} catch ( e ) {
			offices = [];
		}

		if ( ! offices.length ) {
			return;
		}

		var pinIcon = mapElement.getAttribute( 'data-pin-icon' ) || '';

		var map = new google.maps.Map( mapElement, {
			zoom: 5,
			center: { lat: offices[ 0 ].lat, lng: offices[ 0 ].lng },
			mapTypeId: 'roadmap',
			gestureHandling: 'cooperative',
			streetViewControl: false,
			mapTypeControl: false,
			fullscreenControl: false,
			zoomControl: true
		} );

		var bounds = new google.maps.LatLngBounds();
		var infoWindow = new google.maps.InfoWindow();

		offices.forEach( function ( office ) {
			var position = { lat: office.lat, lng: office.lng };

			var markerOptions = {
				position: position,
				map: map,
				title: office.title
			};

			if ( pinIcon ) {
				markerOptions.icon = {
					url: pinIcon,
					scaledSize: new google.maps.Size( 34, 47 ),
					anchor: new google.maps.Point( 17, 47 )
				};
			}

			var marker = new google.maps.Marker( markerOptions );

			marker.addListener( 'click', function () {
				infoWindow.setContent( createInfoWindowContent( office ) );
				infoWindow.open( map, marker );
			} );

			bounds.extend( position );
		} );

		if ( offices.length > 1 ) {
			map.fitBounds( bounds, 40 );
		}
	}

	window.initRectifyLocationsMap = initRectifyLocationsMap;
})();
