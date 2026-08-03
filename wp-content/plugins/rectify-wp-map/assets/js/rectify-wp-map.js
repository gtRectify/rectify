// window.initRectifyWpMap = function() {
//   var mapElement = document.getElementById('rectifyWpMap');
//   var messageBox = document.getElementById('rectifyWpMapMessage');

//   if (!mapElement) {
//     return;
//   }

//   var mapSettings = {
//     centerLat: -37.68929201705307,
//     centerLng: 145.00638668428132,
//     startZoom: 7,
//     minZoom: 4,
//     maxZoom: 10
//   };

//   var cleanMapStyle = [
//     {
//       featureType: 'poi',
//       elementType: 'all',
//       stylers: [{ visibility: 'off' }]
//     },
//     {
//       featureType: 'transit',
//       elementType: 'all',
//       stylers: [{ visibility: 'off' }]
//     },
//     {
//       featureType: 'road',
//       elementType: 'labels',
//       stylers: [{ visibility: 'off' }]
//     },
//     {
//       featureType: 'administrative.land_parcel',
//       elementType: 'all',
//       stylers: [{ visibility: 'off' }]
//     }
//   ];

//   var rectifyWpMap = new google.maps.Map(mapElement, {
//     center: {
//       lat: mapSettings.centerLat,
//       lng: mapSettings.centerLng
//     },
//     zoom: mapSettings.startZoom,
//     minZoom: mapSettings.minZoom,
//     maxZoom: mapSettings.maxZoom,
//     styles: cleanMapStyle,
//     mapTypeId: 'roadmap',
//     zoomControl: false,
//     streetViewControl: false,
//     fullscreenControl: false,
//     mapTypeControl: false,
//     scaleControl: false,
//     rotateControl: false,
//     scrollwheel: false,
//     gestureHandling: 'greedy',
//     draggable: true,
//     disableDoubleClickZoom: true
//   });

//   new google.maps.KmlLayer({
//     url: 'https://www.google.com/maps/d/kml?mid=1SD1MUkQRymPNPIy5qUywWaLRfmmArAQ&ehbc=2E312F',
//     map: rectifyWpMap,
//     preserveViewport: true,
//     suppressInfoWindows: true
//   });

//   function showMessage(text) {
//     if (!messageBox) {
//       return;
//     }
//     messageBox.textContent = text;
//     messageBox.classList.add('show');
//     setTimeout(function() {
//       messageBox.classList.remove('show');
//     }, 1200);
//   }

//   var wheelLocked = false;
//   var wheelDelay = 450;

//   mapElement.addEventListener(
//     'wheel',
//     function(event) {
//       event.preventDefault();
//       event.stopPropagation();

//       if (wheelLocked) {
//         return;
//       }

//       wheelLocked = true;
//       setTimeout(function() {
//         wheelLocked = false;
//       }, wheelDelay);

//       var currentZoom = rectifyWpMap.getZoom();
//       var scrollingUp = event.deltaY < 0;
//       var scrollingDown = event.deltaY > 0;

//       if (scrollingUp) {
//         if (currentZoom >= mapSettings.maxZoom) {
//           showMessage('Maximum zoom reached');
//           return;
//         }
//         rectifyWpMap.setZoom(currentZoom + 1);
//       }

//       if (scrollingDown) {
//         if (currentZoom <= mapSettings.minZoom) {
//           return;
//         }
//         rectifyWpMap.setZoom(currentZoom - 1);
//       }
//     },
//     { passive: false, capture: true }
//   );
// };




let rectifyManualMap;
  let activePopup = null;

  function initRectifyManualMap() {
    const mapElement = document.getElementById("rectifyManualMap");
    const messageBox = document.getElementById("rectifyMapMessage");

    if (!mapElement) {
      return;
    }

    /*
      Add your APPROXIMATE pin locations here.
      Add popup content for each pin.
      Do not use exact client/job addresses if privacy is important.
    */
    const locations = [
       {
    title: "Warehouse floor settlement causing operational issues.",
    location: "105 The Fairway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 145.034
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Smith Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3863916,
    lng: 145.5659261
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Mountain Heath Walk",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.814,
    lng: 145.271
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Harding Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7767444,
    lng: 144.9110705
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "105 The Fairway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 145.034
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Tudor Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Boathaven Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9178086,
    lng: 144.7477259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "101 Kooyong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "42 Victoria St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.764269,
    lng: 144.2786
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "51 Millewa Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8773116,
    lng: 145.059272
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Montgomery Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.733333,
    lng: 144.3
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Rips Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9757588,
    lng: 145.1226002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "99 Hotham Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1 & 2",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "45 Kneen Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1725 Ferntree Gully Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8826855,
    lng: 145.2776105
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10-12 Lindsay Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "54 Rooney Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Sirius Crt Mill Park",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6649616,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Marigold Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6377485,
    lng: 145.082419
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "45 White Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7922797,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Comic Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4618532,
    lng: 144.620463
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Wingarra Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "60 Nordic Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6982783,
    lng: 144.7988921
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Crown Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Finchley Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7062465,
    lng: 144.9161373
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "179 Osborne Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "181 Osborne Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Prismatic Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1944438,
    lng: 144.4670924
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "210 Auburn Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8222114,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26-28 Gerald Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8978307,
    lng: 145.070895
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Lever Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8990236,
    lng: 145.0923305
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Fitzgibbon Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.761,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1-287 South Gippsland Highway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.105,
    lng: 145.279
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "59 Illawarra Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7833035,
    lng: 144.9277474
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Crook Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "70a Gray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.3396318,
    lng: 143.5524803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 3 26 Ralph Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "169 Beaconsfield Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7736132,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "62 Thomas Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.937,
    lng: 145.009
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Range Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "47 Kneen Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "128 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.769412,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "130 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.769412,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Tecoma Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9193474,
    lng: 145.0989646
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "56 Commercial Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "45 Errol Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7903679,
    lng: 144.8566207
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Leena Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.777,
    lng: 145.249
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14B Banff Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "69 Lansell Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8432402,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Enterprise Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9267579,
    lng: 145.1762197
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Leslie street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Peterleigh Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 East Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1021858,
    lng: 145.1431018
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "38 Murphy Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Evans Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10-98 Railway Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2-4 Little Oxford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Fordham Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1-10 Steel Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Fairholm Boulevard",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0309443,
    lng: 145.3437469
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20-22 Old Plenty Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6377485,
    lng: 145.082419
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Parkin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8577136,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Newry Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.788805,
    lng: 144.9719823
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Neptune St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Karingal Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.767,
    lng: 145.287
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Murphy Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Persica Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7392692,
    lng: 144.8864718
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Diaz Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Kings Domain",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.745,
    lng: 144.74
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Kilander Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.809722,
    lng: 147.2547219
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Springvale Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8743502,
    lng: 145.1668205
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 -29 Yarra Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8222114,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 Clauscen Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Byron Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.287039,
    lng: 145.016269
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "815 Wharparilla Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.1731205,
    lng: 144.6912948
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 3",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "70 Connors Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.777,
    lng: 145.461
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Penny Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.873,
    lng: 144.993
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "423 Dryburgh Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7983816,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Waltham Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Normanby Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8712631,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Parklands Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7901921,
    lng: 145.1872619
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Warra Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8432402,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Lagana Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "24 Canisby Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Grand Scenic Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1944438,
    lng: 144.4670924
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "551 Rae Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Keneally Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9178086,
    lng: 144.7477259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1-7 Stewart Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "155 Roslyn Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.173,
    lng: 144.341
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Claydon Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.4740327,
    lng: 145.9436663
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "127 Ashburn Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.866944,
    lng: 145.083056
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Magnus Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7442306,
    lng: 144.7999941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "146 Melville Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Skyline Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7695602,
    lng: 144.8820803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1c Saltley Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8300643,
    lng: 144.8703715
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Cornwall Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7695602,
    lng: 144.8820803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "30 Belinda Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9067871,
    lng: 145.1890123
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Grassypoint Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7578477,
    lng: 144.7913339
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Grassypoint Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7578477,
    lng: 144.7913339
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Hubble Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8715626,
    lng: 144.7775818
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "399 Royal Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7862363,
    lng: 144.9474178
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "420 Blackshaws Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8388686,
    lng: 144.8346241
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "52 Grant Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7877787,
    lng: 145.0002125
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Thompson Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8997995,
    lng: 144.6641401
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "43 Botanic Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.756998,
    lng: 146.1398413
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "547 Ballarat Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7755151,
    lng: 144.8154448
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Ramsay Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.762,
    lng: 144.901
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "128 Market Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "82 Keele Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Glenholme Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7791563,
    lng: 145.3917982
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Gloucester Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.68298,
    lng: 144.5500157
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12A North Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.744,
    lng: 145.047
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Skipton Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.660195,
    lng: 144.5913977
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3-11 Market Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783657,
    lng: 144.8375652
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Burdoo Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Cantwell Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.982,
    lng: 145.314
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "331 Dandelion Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9210442,
    lng: 145.2424941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Barloa Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.816111,
    lng: 145.11
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Morotai Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.744,
    lng: 145.047
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Delbridge St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "ON HOLD - 9 Allambee Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Kana Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Kinkora Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8222114,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "App. 67",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.803516,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "37 Central Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31A Gooch Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7600493,
    lng: 145.0080039
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "28-30 Isabella Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Mcgowans Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7901921,
    lng: 145.1872619
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "431 Hampton Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.937,
    lng: 145.009
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 7",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.037,
    lng: 145.113
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "224-256 Heidelberg Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7790074,
    lng: 145.0181267
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Middleton Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.05,
    lng: 144.166667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Klarica Cl",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.287039,
    lng: 145.016269
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Woods Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.7064354,
    lng: 142.0228094
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "77 Barwon Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1673819,
    lng: 144.3658474
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 2",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.333333,
    lng: 144.316667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Fletcher",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Addison Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Moyangul Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7343192,
    lng: 144.8566207
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "43 Romoly Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8347413,
    lng: 145.1727369
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Broughton Hall",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Moroney Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8819831,
    lng: 145.0989646
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4a Mayfield Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8572432,
    lng: 145.0341642
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23 Gwyther",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.171,
    lng: 144.318
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Units 21 23 258",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7988987,
    lng: 144.892357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Jayco Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9997254,
    lng: 145.2146502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "131 Bakers Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.726,
    lng: 144.96
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "72 Denbigh Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "118 Cole Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Sherwin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.513889,
    lng: 145.113889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "40 William Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.873,
    lng: 144.993
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Tamala Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2025,
    lng: 144.36
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Bungara Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2573292,
    lng: 144.5382417
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "28 Roxburgh Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8479567,
    lng: 145.2289289
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "52 burke Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.772,
    lng: 145.066
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Uplands Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6751571,
    lng: 144.9893458
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1-280 Wantirna Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8417778,
    lng: 145.2270621
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Millward Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Marshall Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7703,
    lng: 145.0457
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "65 Addison Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Eliza Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.842,
    lng: 144.884
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Carmichael Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.89,
    lng: 144.63
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Sissinghurst Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8282806,
    lng: 144.7082568
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Smith Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Goldfrey Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8626196,
    lng: 145.0007064
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Lucy Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "St Columba College",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7-174 Centre Dandenong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9757588,
    lng: 145.1226002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1-32 Stortford Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7703,
    lng: 145.0457
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "33 Paterson Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.05,
    lng: 145.252
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "109 Golf Link Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Newsom Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0309443,
    lng: 145.3437469
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Inverloch Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9178086,
    lng: 144.7477259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.306,
    lng: 145.189
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Sandgate Boulevard",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8826855,
    lng: 145.2776105
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "60 Tennyson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7941207,
    lng: 144.9276659
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Packham Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7347069,
    lng: 145.2590707
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Morgan Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8891994,
    lng: 145.0570577
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Clarke Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7736132,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.794384,
    lng: 145.2815432
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Lakes Sports Community Club",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8511185,
    lng: 147.995821
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Lewis Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8769518,
    lng: 145.2329617
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "55 Flannery Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.738,
    lng: 145.223
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "247 Montague Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8338889,
    lng: 144.963937
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "48 Montclair Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 McNeilagh Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 6",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Trinacria Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7702749,
    lng: 144.7747728
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "128 Market Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Tatura Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6860869,
    lng: 144.9269889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2061 Dandenong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9211962,
    lng: 145.1320653
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 St Andrews Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.843,
    lng: 145.268
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "41 McLean Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9224386,
    lng: 145.0410079
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "500 Burke Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "814 Brunswick Street North",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Sutherland Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7922797,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Carbine Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "246 McMahens Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0453436,
    lng: 145.1702424
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Effie Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9039829,
    lng: 145.3309395
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Herbert Crecent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7343192,
    lng: 144.8566207
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "224 Bailey Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Tramway Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.983,
    lng: 145.0434
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Pioneer Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Corporate Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9210442,
    lng: 145.2424941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "121 Reynards Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7412988,
    lng: 144.9666108
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Windsor Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7358112,
    lng: 144.9191456
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Turnberry Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9210442,
    lng: 145.2424941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "41 Toole Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.7360202,
    lng: 142.318772
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14a Ida Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7392692,
    lng: 144.8864718
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Macquarie Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 2",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8219905,
    lng: 145.1983055
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5-7 Ross Watt Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.49,
    lng: 144.588889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "335 Old Koonwarra-Meeniyan Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.5615123,
    lng: 145.9469958
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1-97 The Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7767444,
    lng: 144.9110705
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Napier St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8074554,
    lng: 144.978921
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "93 Ordish Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.024124,
    lng: 145.1929189
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "370 Hampshire Cres",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7780836,
    lng: 144.8335726
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Newcastle Ct",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6429963,
    lng: 144.8978154
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "198 Dryburgh St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8018623,
    lng: 144.9439489
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Navigation Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6874703,
    lng: 144.6069915
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "87 Lothian St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8012625,
    lng: 144.9445812
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Glenys Ct",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1877855,
    lng: 144.3358913
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "145 Clyde Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0412557,
    lng: 144.1744541
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Jarrah Ct",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.863094,
    lng: 144.7118382
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Collier Cres",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.772033,
    lng: 144.953812
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2/10 Winnington St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7608517,
    lng: 144.7706944
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Skipton St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.660195,
    lng: 144.5913977
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Andrew St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8088013,
    lng: 145.2226194
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 Mason St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8415247,
    lng: 144.8764527
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "49-53 Hazelwood Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2090605,
    lng: 146.5204408
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Balmoral Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3239152,
    lng: 144.9868498
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "168 Alma Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8628517,
    lng: 145.0042806
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Godfrey Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8626196,
    lng: 145.0007064
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17-19 Valdoris Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.36782,
    lng: 146.3217232
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23 Smith St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8124109,
    lng: 144.9946824
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "242 Rossmoyne St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7589954,
    lng: 145.0161614
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "230 Hiltons Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.657236,
    lng: 142.4559196
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "132A Wood St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7351551,
    lng: 145.0219194
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Ellesby Ct",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1960473,
    lng: 144.3503662
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Docker St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.886388,
    lng: 144.9873877
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "83 Keys Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0241775,
    lng: 145.1716911
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Austin St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8837396,
    lng: 145.2854747
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "179 New Town Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.856889,
    lng: 147.3042431
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "432 Churchill Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.9177765,
    lng: 147.3479072
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "526 Churchill Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.9177408,
    lng: 147.3558447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "871 Park St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7762118,
    lng: 144.947891
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Centennial St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8054744,
    lng: 144.8756361
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "397 North Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9027292,
    lng: 145.0325678
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "37 Albert St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8531417,
    lng: 144.8932157
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14B Bent St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7593094,
    lng: 144.9425789
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "91 Walter St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7754203,
    lng: 144.9087031
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "91A Walter St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7754532,
    lng: 144.9087461
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "32 Burnewang St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783231,
    lng: 144.8183238
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "95 Evans St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.770292,
    lng: 144.9707026
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "67 Burdoo Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2012964,
    lng: 144.33175
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Ramsay St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.762,
    lng: 144.901
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Abernethy Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "28 Moubray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8438609,
    lng: 144.9514536
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "32 Burnewang Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783231,
    lng: 144.8183238
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "547 Ballarat Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7755151,
    lng: 144.8154448
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "604 Griffith Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0737293,
    lng: 146.9135418
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Coonatta Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.555,
    lng: 143.8
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Elliotdale Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.555,
    lng: 143.8
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Medford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8631512,
    lng: 144.8120218
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2/53 Rayner St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8631512,
    lng: 144.8120218
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8631512,
    lng: 144.8120218
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Hubble Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8715626,
    lng: 144.7775818
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2-4 Duke Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8388686,
    lng: 144.8346241
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "420 Blackshaws Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8388686,
    lng: 144.8346241
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "145B Great Ocean Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3850062,
    lng: 144.1501922
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Barkly Street West",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.2846464,
    lng: 142.9316441
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Abbotsford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8023601,
    lng: 144.9983623
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Willis Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Willis Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "72 Denbigh Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "101 Kooyong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Harding Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7767444,
    lng: 144.9110705
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "91A Walter Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7754532,
    lng: 144.9087461
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/97 The Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7767444,
    lng: 144.9110705
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "91 Walter Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7754203,
    lng: 144.9087031
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "42 Ward Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.866944,
    lng: 145.083056
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "127 Ashburn Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.866944,
    lng: 145.083056
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Kanooka Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.867,
    lng: 145.103
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Oakley Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7628247,
    lng: 144.8648709
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2A Rosehill Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6763789,
    lng: 144.4463206
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "83 Ballantine Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.833333,
    lng: 147.616667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "40 William Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.873,
    lng: 144.993
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Penny Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.873,
    lng: 144.993
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Berry Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6146129,
    lng: 144.2415697
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "U3/23-25 Birdwood Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.808889,
    lng: 145.078889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Apsley Golf Club - Wimmera Highway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.9684704,
    lng: 141.0829427
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "246 McMahens Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0453436,
    lng: 145.1702424
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Duviney Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.05,
    lng: 144.166667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "145 Clyde Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0412557,
    lng: 144.1744541
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Middleton Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.05,
    lng: 144.166667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12-14 Murray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.6249666,
    lng: 144.1386071
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 St Andrews Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.843,
    lng: 145.268
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/1 Amsted Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8446425,
    lng: 145.284503
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Bell Bird Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.827,
    lng: 145.28
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "81 Saint Georges Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9982063,
    lng: 145.4237893
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Tramway Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.983,
    lng: 145.0434
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "69 Bruce Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.11,
    lng: 144.338
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "65A Woodacres Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.351523,
    lng: 144.2422531
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "35 Mernda Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.173,
    lng: 144.341
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Autumn St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.173,
    lng: 144.341
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "716 Sturt Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.5691087,
    lng: 143.8563224
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Glenys Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1877855,
    lng: 144.3358913
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "155 Roslyn Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.173,
    lng: 144.341
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "115 Faithful Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5821854,
    lng: 145.9717086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "349 Benalla-Warrenbayne Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5821854,
    lng: 145.9717086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Oak Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5821854,
    lng: 145.9717086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Noarana Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5805922,
    lng: 145.9643544
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Kurrajong Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5821854,
    lng: 145.9717086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2-6 Sailors Gully Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.764269,
    lng: 144.2786
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "42 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.764269,
    lng: 144.2786
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "41 McLean Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9224386,
    lng: 145.0410079
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 Robert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9224386,
    lng: 145.0410079
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Kilander Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.809722,
    lng: 147.2547219
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Fairholme Boulevard",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0309443,
    lng: 145.3437469
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "55 Bowman Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.049,
    lng: 145.371
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Newsom Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0309443,
    lng: 145.3437469
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "95 – 99 Railway Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8197129,
    lng: 145.1530529
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "145 Gravelly Beach Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -34.1166667,
    lng: 150.357889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "196 Cricks Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.434517,
    lng: 143.7911684
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "100 Godfrey St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.1169559,
    lng: 143.7250526
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "45 Errol Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7903679,
    lng: 144.8566207
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Wallace Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.6047192,
    lng: 143.9405609
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "46 Orchard Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Lindsay Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Cairnes Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "118 Cole Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "48a Montclair Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Louise Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9179439,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12b Beltane Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9179439,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Tatura Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6860869,
    lng: 144.9269889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "640-680 Geelong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8173492,
    lng: 144.8465361
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "203 Albion Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5/25 Mitchell Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "98 Edward Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Collier Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.772033,
    lng: 144.953812
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "208 Albert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "238 Albert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Crook Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "95 Evans Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.770292,
    lng: 144.9707026
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Methven Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.769412,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "128 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.769412,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "130 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.769412,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4/19 McLean Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.761,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "871 Park Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7762118,
    lng: 144.947891
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Fitzgibbon Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.761,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "35 Galileo Gateway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Pagebrook Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0309443,
    lng: 145.3437469
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Princeton Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Lucy Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Carbine Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "35 Parkes Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.76
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Dawayne Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8552869,
    lng: 145.1513801
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Sugarloaf Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8552869,
    lng: 145.1513801
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Braywood Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7578477,
    lng: 144.7913339
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Grassypoint Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7578477,
    lng: 144.7913339
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 BERWICK STREET",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Range Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "500 Burke Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Madden Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.517945,
    lng: 143.7084479
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/1044 Drummond Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.788805,
    lng: 144.9719823
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Morgan Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8891994,
    lng: 145.0570577
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Liriope Green",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.745,
    lng: 144.74
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Kings Domain",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.745,
    lng: 144.74
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Normanby Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8712631,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "397 North Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9027292,
    lng: 145.0325678
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Moroney Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8819831,
    lng: 145.0989646
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Kinarra Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.811111,
    lng: 147.242222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Barkly Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.15,
    lng: 146.6
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Reid Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.15,
    lng: 146.6
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Sugarloaf Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7373267,
    lng: 145.3088196
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1 24-26 Clarinda Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.941,
    lng: 145.103
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 3 19-21 Sarton Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9190111,
    lng: 145.144155
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2061 Dandenong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9211962,
    lng: 145.1320653
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "52 Grant Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7877787,
    lng: 145.0002125
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "150 Spensley Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7877787,
    lng: 145.0002125
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Mirrabooka Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1515545,
    lng: 144.5738608
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "136 High Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.966667,
    lng: 145.65
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "121 Reynard Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7412988,
    lng: 144.9666108
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "97 The Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7412988,
    lng: 144.9666108
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Lilian Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7660476,
    lng: 145.0879338
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "131 Bakers Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.726,
    lng: 144.96
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "294 Wellington Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2-4 Little Oxford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "99 Hotham Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "122 Keele Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7973711,
    lng: 144.9912802
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "82 Keele Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Yorkshire Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "32 Liverpool circuit",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "109 and 109A Golf View Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "24 Canisby Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/287 South Gippsland Highway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.105,
    lng: 145.279
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Tattle Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1163346,
    lng: 145.307612
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Raglan Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4241222,
    lng: 143.8912368
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Lily Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7412988,
    lng: 144.9666108
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1 61 Mount View Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.794384,
    lng: 145.2815432
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Karingal Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.767,
    lng: 145.287
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Mountain Heath Walk",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.814,
    lng: 145.271
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "30 Taylors Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.6737591,
    lng: 147.0386273
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "93 Ordish Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.024124,
    lng: 145.1929189
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "53/55 Robinson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9847811,
    lng: 145.2139907
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "53/55 Robinson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9847811,
    lng: 145.2139907
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "74-76 Nissan Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9997254,
    lng: 145.2146502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Jayco Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9997254,
    lng: 145.2146502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Trinacria Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7702749,
    lng: 144.7747728
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2/10 Winnington St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7608517,
    lng: 144.7706944
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Donne Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.719,
    lng: 144.777
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "50 Carew Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.5282408,
    lng: 144.9565781
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Metung court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9757588,
    lng: 145.1226002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7/174 Centre Dandenong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9757588,
    lng: 145.1226002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Rips Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9757588,
    lng: 145.1226002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "85-88",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.716667,
    lng: 144.25
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Mount Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7650717,
    lng: 145.059911
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "815 Wharparilla Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.1731205,
    lng: 144.6912948
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7/2-3 Gracie Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.037,
    lng: 145.113
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Docker Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.886388,
    lng: 144.9873877
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "72 Ruskin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "75 Spray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Addison Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Aldous Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6341341,
    lng: 145.016269
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Peterleigh Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Leslie Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Fletcher Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Carnarvon Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "128 Market Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 5 5 Weir Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.75,
    lng: 145.566667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "57 Rathmines St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7790074,
    lng: 145.0181267
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "224-256 Heidelberg Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7790074,
    lng: 145.0181267
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7/10 Derby Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6969273,
    lng: 144.9666905
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Sandgate Boulevard",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8826855,
    lng: 145.2776105
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1725 Ferntree Gully Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8826855,
    lng: 145.2776105
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Austin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8837396,
    lng: 145.2854747
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "273 Murray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.641995,
    lng: 145.5706233
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Napier Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8074554,
    lng: 144.978921
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Young Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7974551,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "814 Brunswick Street North",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "47 Kneen Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 St Georges Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "45 Kneen Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Delbridge St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "551 Rae Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 Clauscen Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Parklands Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7901921,
    lng: 145.1872619
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Abbotsford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8023601,
    lng: 144.9983623
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Ramsay Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.762,
    lng: 144.901
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Abernethy Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23/56 Norton Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.794384,
    lng: 145.2815432
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "28 Moubray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8438609,
    lng: 144.9514536
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "32 Burnewang Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783231,
    lng: 144.8183238
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "547 Ballarat Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7755151,
    lng: 144.8154448
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "604 Griffith Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0737293,
    lng: 146.9135418
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Coonatta Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.555,
    lng: 143.8
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Elliotdale Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.555,
    lng: 143.8
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Medford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8631512,
    lng: 144.8120218
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2/53 Rayner St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8631512,
    lng: 144.8120218
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8631512,
    lng: 144.8120218
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Hubble Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8715626,
    lng: 144.7775818
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2-4 Duke Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8388686,
    lng: 144.8346241
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "420 Blackshaws Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8388686,
    lng: 144.8346241
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "145B Great Ocean Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3850062,
    lng: 144.1501922
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Apsley Golf Club - Wimmera Highway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.9684704,
    lng: 141.0829427
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "133 Elizabeth Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.2846464,
    lng: 142.9316441
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Barkly Street West",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.2846464,
    lng: 142.9316441
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "37 Stanhope street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Willis Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Willis Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "101 Kooyong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.857253,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Harding Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7767444,
    lng: 144.9110705
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "91A Walter Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7754532,
    lng: 144.9087461
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/97 The Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7767444,
    lng: 144.9110705
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "91 Walter Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7754203,
    lng: 144.9087031
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "42 Ward Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.866944,
    lng: 145.083056
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "127 Ashburn Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.866944,
    lng: 145.083056
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Kanooka Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.867,
    lng: 145.103
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Oakley Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7628247,
    lng: 144.8648709
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2A Rosehill Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6763789,
    lng: 144.4463206
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "83 Ballantine Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.833333,
    lng: 147.616667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "40 William Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.873,
    lng: 144.993
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Penny Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.873,
    lng: 144.993
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "65 Addison Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Berry Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6146129,
    lng: 144.2415697
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "716 Sturt Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.5691087,
    lng: 143.8563224
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "177 Victoria St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.5632,
    lng: 143.869
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "U3/23-25 Birdwood Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.808889,
    lng: 145.078889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "246 McMahens Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0453436,
    lng: 145.1702424
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Duviney Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.05,
    lng: 144.166667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "145 Clyde Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0412557,
    lng: 144.1744541
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Middleton Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.05,
    lng: 144.166667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12-14 Murray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.6249666,
    lng: 144.1386071
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "813 Boundary Drain Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.182,
    lng: 145.575
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 St Andrews Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.843,
    lng: 145.268
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/1 Amsted Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8446425,
    lng: 145.284503
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Bell Bird Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.827,
    lng: 145.28
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "55 Bowman Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.049,
    lng: 145.371
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "81 Saint Georges Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9982063,
    lng: 145.4237893
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Tramway Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.983,
    lng: 145.0434
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "69 Bruce Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.11,
    lng: 144.338
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "65A Woodacres Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.351523,
    lng: 144.2422531
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "35 Mernda Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.173,
    lng: 144.341
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Autumn St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.173,
    lng: 144.341
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Glenys Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1877855,
    lng: 144.3358913
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "155 Roslyn Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.173,
    lng: 144.341
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "115 Faithful Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5821854,
    lng: 145.9717086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "349 Benalla-Warrenbayne Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5821854,
    lng: 145.9717086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Oak Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5821854,
    lng: 145.9717086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Noarana Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5805922,
    lng: 145.9643544
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Kurrajong Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5821854,
    lng: 145.9717086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2-6 Sailors Gully Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.764269,
    lng: 144.2786
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "42 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.764269,
    lng: 144.2786
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "41 McLean Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9224386,
    lng: 145.0410079
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 Robert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9224386,
    lng: 145.0410079
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Kilander Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.809722,
    lng: 147.2547219
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Pagebrook Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0309443,
    lng: 145.3437469
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Fairholme Boulevard",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0309443,
    lng: 145.3437469
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Newsom Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0309443,
    lng: 145.3437469
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "95 – 99 Railway Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8197129,
    lng: 145.1530529
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "145 Gravelly Beach Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -34.1166667,
    lng: 150.357889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "196 Cricks Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.434517,
    lng: 143.7911684
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "100 Godfrey St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.1169559,
    lng: 143.7250526
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "45 Errol Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7903679,
    lng: 144.8566207
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Wallace Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.6047192,
    lng: 143.9405609
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "46 Orchard Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Lindsay Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Cairnes Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "118 Cole Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "48a Montclair Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9044002,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Louise Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9179439,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12b Beltane Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9179439,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Tatura Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6860869,
    lng: 144.9269889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "640-680 Geelong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8173492,
    lng: 144.8465361
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "203 Albion Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5/25 Mitchell Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "98 Edward Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Collier Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.772033,
    lng: 144.953812
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "208 Albert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "95 Evans Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.770292,
    lng: 144.9707026
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Methven Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.769412,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "128 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.769412,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "130 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.769412,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4/19 Mclean Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.761,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "871 Park Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7762118,
    lng: 144.947891
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14b Bent Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7593094,
    lng: 144.9425789
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Fitzgibbon Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.761,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Lilian Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7660476,
    lng: 145.0879338
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "35 Galileo Gateway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Princeton Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Lucy Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Carbine Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6987006,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "35 Parkes Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.76
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Dawayne Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8552869,
    lng: 145.1513801
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Sugarloaf Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8552869,
    lng: 145.1513801
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Braywood Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7578477,
    lng: 144.7913339
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Grassypoint Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7578477,
    lng: 144.7913339
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 BERWICK STREET",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Range Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "500 Burke Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8334095,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Madden Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.517945,
    lng: 143.7084479
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/1044 Drummond Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.788805,
    lng: 144.9719823
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Morgan Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8891994,
    lng: 145.0570577
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Liriope Green",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.745,
    lng: 144.74
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Kings Domain",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.745,
    lng: 144.74
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Normanby Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8712631,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "397 North Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9027292,
    lng: 145.0325678
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Moroney Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8819831,
    lng: 145.0989646
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "28/140-148 Chesterville Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.964155,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Kinarra Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.811111,
    lng: 147.242222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Barkly Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.15,
    lng: 146.6
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Reid Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.15,
    lng: 146.6
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Sugarloaf Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7373267,
    lng: 145.3088196
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1 24-26 Clarinda Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.941,
    lng: 145.103
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 3 19-21 Sarton Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9190111,
    lng: 145.144155
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "238 Albert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7666099,
    lng: 144.9584302
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "52 Grant Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7877787,
    lng: 145.0002125
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "150 Spensley Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7877787,
    lng: 145.0002125
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Mirrabooka Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1515545,
    lng: 144.5738608
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "136 High Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.966667,
    lng: 145.65
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Lily Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7412988,
    lng: 144.9666108
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "121 Reynard Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7412988,
    lng: 144.9666108
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "97 The Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7412988,
    lng: 144.9666108
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "131 Bakers Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.726,
    lng: 144.96
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "294 Wellington Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2-4 Little Oxford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "99 Hotham Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "122 Keele Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7973711,
    lng: 144.9912802
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "82 Keele Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8009595,
    lng: 144.9873447
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Yorkshire Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "32 Liverpool circuit",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "109 and 109A Golf View Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "24 Canisby Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.594,
    lng: 144.934
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/287 South Gippsland Highway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.105,
    lng: 145.279
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Tattle Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1163346,
    lng: 145.307612
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Raglan Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4241222,
    lng: 143.8912368
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23/56 Norton Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.794384,
    lng: 145.2815432
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1 61 Mount View Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.794384,
    lng: 145.2815432
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Karingal Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.767,
    lng: 145.287
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Mountain Heath Walk",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.814,
    lng: 145.271
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "30 Taylors Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.6737591,
    lng: 147.0386273
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "93 Ordish Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.024124,
    lng: 145.1929189
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "53/55 Robinson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9847811,
    lng: 145.2139907
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "53/55 Robinson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9847811,
    lng: 145.2139907
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "74-76 Nissan Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9997254,
    lng: 145.2146502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Jayco Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9997254,
    lng: 145.2146502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Trinacria Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7702749,
    lng: 144.7747728
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2/10 Winnington St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7608517,
    lng: 144.7706944
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Banyule Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.589,
    lng: 143.814
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Loris crt",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.589,
    lng: 143.814
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Donne Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.719,
    lng: 144.777
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "50 Carew Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.5282408,
    lng: 144.9565781
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2061 Dandenong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9211962,
    lng: 145.1320653
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "30 Taylors Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.6737591,
    lng: 147.0386273
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Metung court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9757588,
    lng: 145.1226002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7/174 Centre Dandenong Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9757588,
    lng: 145.1226002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Rips Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9757588,
    lng: 145.1226002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "85-88",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.716667,
    lng: 144.25
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Mount Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7650717,
    lng: 145.059911
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "815 Wharparilla Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.1731205,
    lng: 144.6912948
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7/2-3 Gracie Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.037,
    lng: 145.113
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "72 Ruskin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Docker Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.886388,
    lng: 144.9873877
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "72 Ruskin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "75 Spray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "65 Addison Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Addison Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.878722,
    lng: 144.9859676
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Aldous Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6341341,
    lng: 145.016269
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Peterleigh Grove",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Leslie Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Fletcher Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Carnarvon Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "128 Market Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7504821,
    lng: 144.9143187
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 5 5 Weir Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.75,
    lng: 145.566667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "57 Rathmines St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7790074,
    lng: 145.0181267
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "224-256 Heidelberg Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7790074,
    lng: 145.0181267
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7/10 Derby Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6969273,
    lng: 144.9666905
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Sandgate Boulevard",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8826855,
    lng: 145.2776105
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1725 Ferntree Gully Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8826855,
    lng: 145.2776105
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Austin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8837396,
    lng: 145.2854747
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "273 Murray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.641995,
    lng: 145.5706233
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Napier Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8074554,
    lng: 144.978921
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Young Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7974551,
    lng: 144.9804594
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "814 Brunswick Street North",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "47 Kneen Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "50 Carew Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.5282408,
    lng: 144.9565781
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "551 Rae Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 Clauscen Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "120 Pin Oak Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7833035,
    lng: 144.9277474
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "59 Illawarra Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7833035,
    lng: 144.9277474
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "43 Paisley Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7988987,
    lng: 144.892357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "124-180 Ballarat Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7988987,
    lng: 144.892357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "43 Paisley Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7988987,
    lng: 144.892357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Beaurepaire Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7988987,
    lng: 144.892357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Beame Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7988987,
    lng: 144.892357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "258 Ballarat Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7988987,
    lng: 144.892357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/15 Moore Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7988987,
    lng: 144.892357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "43 Romoly Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8347413,
    lng: 145.1727369
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Nurla Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1466246,
    lng: 145.135722
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "24 Idon Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.188,
    lng: 145.153
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "108 Barwon Tce",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1499181,
    lng: 144.3617186
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "893 Glenellen Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.8589303,
    lng: 146.9545679
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "104 McCurdy Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0719517,
    lng: 144.2299712
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5-7 Ross Watt Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.49,
    lng: 144.588889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Adam Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6926696,
    lng: 144.8951801
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Vaucluse Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6926696,
    lng: 144.8951801
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Parking Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8577136,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Springvale Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8743502,
    lng: 145.1668205
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "52 Brynor Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8743502,
    lng: 145.1668205
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "54 Outlook Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7062465,
    lng: 144.9161373
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Augustine Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7062465,
    lng: 144.9161373
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/10 Leonard Avenue Glenroy",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7054021,
    lng: 144.9302008
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Finchley Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7062465,
    lng: 144.9161373
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Magpie Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.2442873,
    lng: 143.9687912
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "84 La Cote Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.566944,
    lng: 144.316944
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Simmington Circuit",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6454887,
    lng: 144.8841246
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Ellesby Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1960473,
    lng: 144.3503662
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "75 Burdoo Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Ellesby Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1960473,
    lng: 144.3503662
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "224 Bailey Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Ellesby Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1960473,
    lng: 144.3503662
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "67 Burdoo Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2012964,
    lng: 144.33175
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Wingarra Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Diaz Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Kana Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2,
    lng: 144.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "24 Walls Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7455702,
    lng: 142.0178976
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 George Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7455702,
    lng: 142.0178976
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "53 Moodies Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7455702,
    lng: 142.0178976
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3/46 Fewster Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.937,
    lng: 145.009
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "62 Thomas Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.937,
    lng: 145.009
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "431 Hampton Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.937,
    lng: 145.009
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 5 2 Skinner Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.306,
    lng: 145.189
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "29 Schier Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.75,
    lng: 142.183333
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3-29 Yarra Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8222114,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20a Liddiard Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8222114,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "210 Auburn Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8222114,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "210 Auburn Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8222114,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Morotai Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.744,
    lng: 145.047
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12A North Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.744,
    lng: 145.047
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 June Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9487497,
    lng: 145.0410692
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23 Gwyther Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.171,
    lng: 144.318
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "43 Botanic Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.756998,
    lng: 146.1398413
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Callaway Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.756998,
    lng: 146.1398413
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Tulip Crt",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.756998,
    lng: 146.1398413
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "120 Lascelles Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.7360202,
    lng: 142.318772
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "41 Toole Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.7360202,
    lng: 142.318772
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "230B Hiltons Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.7360202,
    lng: 142.318772
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "39 Delbridge St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7832944,
    lng: 144.9838466
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Jarrah Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.863094,
    lng: 144.7118382
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Smeaton Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8629027,
    lng: 144.6854533
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Gordon Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23 Citrus Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Ladlow Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Finlayson Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Natimuk Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "60 Dooen Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Begg Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Clara Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Wotonga Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/13 Bowden St Horsham",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7196363,
    lng: 142.1884222
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Alinta Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.888611,
    lng: 147.405556
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Pearsalls Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.6334,
    lng: 145.7278
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Club Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.5305636,
    lng: 143.8590384
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2821 Eleventh Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -34.2495272,
    lng: 142.159382
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/32 Stortford Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7703,
    lng: 145.0457
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Marshall Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7703,
    lng: 145.0457
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "52 Burke Road North",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.772,
    lng: 145.066
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/124 Langton Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.687232,
    lng: 144.9128564
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 John Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.134382,
    lng: 141.9791849
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Patterson Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.712,
    lng: 144.831
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Tumut Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.712,
    lng: 144.831
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Watson Rise",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.712,
    lng: 144.831
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "106 Burrowye Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.712,
    lng: 144.831
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Herbert Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7343192,
    lng: 144.8566207
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Moyangul Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7343192,
    lng: 144.8566207
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "60 Nordic Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6982783,
    lng: 144.7988921
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "83 Rankins Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7941207,
    lng: 144.9276659
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "32-34 McCracken Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7941207,
    lng: 144.9276659
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "60 Tennyson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7941207,
    lng: 144.9276659
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "74 Tennyson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7986736,
    lng: 144.9286032
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Sutherland Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7922797,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "45 White Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7922797,
    lng: 145.0548502
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Apt 67 1 Wiltshire Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.803516,
    lng: 145.0328017
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "83 Keys Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0241775,
    lng: 145.1716911
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 Laws Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.441,
    lng: 145.43
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Bennetts Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.4737441,
    lng: 145.3917982
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Martin Ct",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.5498,
    lng: 145.4761
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Geoffrey Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.802,
    lng: 145.316
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "89 Panubra Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -41.470556,
    lng: 147.163056
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "54 Braeswood Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.734,
    lng: 144.772
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "105 The Fairway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 145.034
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Apolline Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.366667,
    lng: 143.95
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "61 Kingsville Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.809,
    lng: 144.878
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "335 Old Koonwarra-Meeniyen Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.5615123,
    lng: 145.9469958
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Skipton Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.660195,
    lng: 144.5913977
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Skipton Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.660195,
    lng: 144.5913977
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1524 Sturt St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.549,
    lng: 143.847
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Alfred Street North",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.549,
    lng: 143.847
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 14 Middle Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8511185,
    lng: 147.995821
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "38 Church Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8511185,
    lng: 147.995821
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/281 Dalton Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6650543,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Springwater Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.0229202,
    lng: 144.3964232
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "89 Cimitiere Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -41.4332215,
    lng: 147.1440875
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Balfour Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -41.4332215,
    lng: 147.1440875
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Claydon Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.4740327,
    lng: 145.9436663
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Grand Scenic Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1944438,
    lng: 144.4670924
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Lochlan Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1944438,
    lng: 144.4670924
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Prismatic Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1944438,
    lng: 144.4670924
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "33 Paterson Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.05,
    lng: 145.252
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Oppy Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8629027,
    lng: 144.6854533
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Howard Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783,
    lng: 144.878
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "421 Tower Hill Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2901504,
    lng: 142.4625357
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4a Mayfield Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8572432,
    lng: 145.0341642
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Coppin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8773116,
    lng: 145.059272
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1993 Malvern Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8717394,
    lng: 145.0629321
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "51 Millewa Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8773116,
    lng: 145.059272
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Buloke Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8734,
    lng: 144.582
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Dueran Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.0625288,
    lng: 146.0821493
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Merlyn Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7695602,
    lng: 144.8820803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Skyline Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7695602,
    lng: 144.8820803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Cornwall Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7695602,
    lng: 144.8820803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Tamala Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2025,
    lng: 144.36
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "721 Walshs Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7816741,
    lng: 142.1638346
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Ofarrell St Yarraville",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.819811,
    lng: 144.8813738
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Kantiki Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.814979,
    lng: 144.9657582
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Navigation Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6874703,
    lng: 144.6069915
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Gloucester",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.68298,
    lng: 144.5500157
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "48 Staughton Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8459801,
    lng: 144.0766524
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Lot 1",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8600459,
    lng: 147.8367484
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 2 13 Rules Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6649616,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Malua Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6649616,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "46 Kellaway Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6649616,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Carbine Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6649616,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Jubilee Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6649616,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Sirius Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6649616,
    lng: 145.0658766
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "35 Main Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.4577308,
    lng: 142.5942441
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Venice Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8219905,
    lng: 145.1983055
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Vernal Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8219905,
    lng: 145.1983055
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 2 2 Cecil Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8219905,
    lng: 145.1983055
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Churchill Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8187902,
    lng: 145.1084708
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Barloa Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.816111,
    lng: 145.11
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Duval Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837782,
    lng: 144.4089115
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Sydenham st",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7675363,
    lng: 144.9198932
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Newhall Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7675363,
    lng: 144.9198932
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "45 Chaucer Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7675363,
    lng: 144.9198932
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Ngarveno Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7675363,
    lng: 144.9198932
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "91 Hall Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.35
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14-16 Station Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1952209,
    lng: 145.0879338
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Glenholme Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7791563,
    lng: 145.3917982
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Byron Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.287039,
    lng: 145.016269
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Klarica Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.287039,
    lng: 145.016269
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "750 Nepean Highway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.287039,
    lng: 145.016269
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/22 Rhonda Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8772869,
    lng: 145.1265477
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/22 Rhonda Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8772869,
    lng: 145.1265477
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2/21 Lebanon Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9267579,
    lng: 145.1762197
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Enterprise Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9267579,
    lng: 145.1762197
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26/28 Gerald Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8978307,
    lng: 145.070895
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Cantwell Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.982,
    lng: 145.314
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "181 Station Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4618532,
    lng: 144.620463
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Comic Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4618532,
    lng: 144.620463
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "80 Mason Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8415247,
    lng: 144.8764527
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "179 New Town Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.856889,
    lng: 147.3042431
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Blackshaws Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.842,
    lng: 144.884
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Davies Street rear lane way off Effingham Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.842,
    lng: 144.884
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Eliza Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.842,
    lng: 144.884
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14a Ida Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7392692,
    lng: 144.8864718
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Persica Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7392692,
    lng: 144.8864718
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Lot 2 Fourteenth Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -34.2151229,
    lng: 142.1169401
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "399 Flemington Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7983816,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "85 Lothian Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7983816,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "87 Lothian Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8012625,
    lng: 144.9445812
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "423 Dryburgh Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7983816,
    lng: 144.9419122
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Candy Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7736132,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "42 High St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7736132,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Bank Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7736132,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "169 Beaconsfield Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7736132,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Knowles Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7736132,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Clarke Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7736132,
    lng: 144.9997396
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "89 Sloleys Bridge Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0883415,
    lng: 145.442323
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23 Tweddle Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0883415,
    lng: 145.442323
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Madigan Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0883415,
    lng: 145.442323
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1 2 Russell St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0883415,
    lng: 145.442323
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Brooke Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0883415,
    lng: 145.442323
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Brooke Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0883415,
    lng: 145.442323
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Lever Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8990236,
    lng: 145.0923305
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Lever Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8990236,
    lng: 145.0923305
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Lever Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8990236,
    lng: 145.0923305
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Tecoma Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9193474,
    lng: 145.0989646
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Bungara Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2573292,
    lng: 144.5382417
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1-17 College Cres",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7862363,
    lng: 144.9474178
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "900 Park Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7770583,
    lng: 144.9456543
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "900 Park Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7770583,
    lng: 144.9456543
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1-5 Stewart Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "146 Melville Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Stewart Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 3 121-125 Northumberland Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6/19 West Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Stewart Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Stewart Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.727,
    lng: 144.942
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "55 Dalkeith Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9178086,
    lng: 144.7477259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Inverloch Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9178086,
    lng: 144.7477259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Boathaven Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9178086,
    lng: 144.7477259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Keneally Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9178086,
    lng: 144.7477259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6-10 Ingles Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8315264,
    lng: 144.9226452
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1064 Wingara St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.06,
    lng: 146.93
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "29A Cramer Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7399362,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "207 Pigdon Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.784,
    lng: 144.966
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Vectis Station Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7580965,
    lng: 142.0555986
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "37 Taverner Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.9008,
    lng: 141.997
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "unit 1/515 Talbot Street South",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.577,
    lng: 143.844
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "195 Broadhurst Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Moira Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Evans Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Hickford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Moira Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Evans Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3/26 Ralph Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14B Banff Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/10 Hickford Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Evans Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7118644,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Crown Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Moore Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Tudor Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "52 Stokes Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7399362,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "54 Rooney Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "38 Murphy Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "237 Punt Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "44 Waltham Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Smith Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Egan Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Neptune Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Egan St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Crown Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Neptune Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Vesper Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 The Crofts",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Fordham Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "42 Racecourse Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4525468,
    lng: 144.6753231
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Racecourse Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4525468,
    lng: 144.6753231
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Somerville Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4525468,
    lng: 144.6753231
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "160 New Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8106372,
    lng: 145.2307011
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Valkyrie Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8106372,
    lng: 145.2307011
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "62a Maroondah Highway",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8106372,
    lng: 145.2307011
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 3 34 Andrew Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8088013,
    lng: 145.2226194
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 2 34 Andrew Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8088013,
    lng: 145.2226194
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "98 Sycamore Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.8037216,
    lng: 147.366961
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "49 Vaggs Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.649799,
    lng: 143.7694626
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Corporate Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9210442,
    lng: 145.2424941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "331 Dandelion Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9210442,
    lng: 145.2424941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Turnberry Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9210442,
    lng: 145.2424941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "25 Balmoral Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3239152,
    lng: 144.9868498
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "168 Alma Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8628517,
    lng: 145.0042806
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "168 Alma Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8628517,
    lng: 145.0042806
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "432 Churchill Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.9177765,
    lng: 147.3479072
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "526 Churchhill Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.901,
    lng: 147.327
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 East Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1021858,
    lng: 145.1431018
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Tower Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.585278,
    lng: 143.839444
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2/47-49 Beverin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.585278,
    lng: 143.839444
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "50 Pentland Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8055831,
    lng: 144.891002
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "70 Connors Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.777,
    lng: 145.461
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "47 Club Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -41.1593475,
    lng: 146.5319346
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "28-30 Isabella Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Abernethy Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Lagana Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Morris Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Corvette Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.383333,
    lng: 145.4
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Vivi Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.119,
    lng: 145.2
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8124109,
    lng: 144.9946824
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "121 Whites Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6333464,
    lng: 143.6887979
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "791 Linton-Carngham Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.611944,
    lng: 143.584444
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "239 Lydiard Street North",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.55,
    lng: 143.858
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Murphy Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.823,
    lng: 144.998
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "77 Barwon Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1673819,
    lng: 144.3658474
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1c Saltley Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8300643,
    lng: 144.8703715
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3/51-55 Westbury Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -41.455278,
    lng: 147.151111
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "247 Montague Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8338889,
    lng: 144.963937
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20-22 Old Plenty Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6377485,
    lng: 145.082419
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "14 Marigold Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6377485,
    lng: 145.082419
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Cuckoo Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6282842,
    lng: 145.0920271
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 George Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 McNeilage Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/10 Steel Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23 Vernier Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "33 Lawson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7976791,
    lng: 144.2866151
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Magnus Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7442306,
    lng: 144.7999941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Godfrey Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8626196,
    lng: 145.0007064
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Windsor Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7358112,
    lng: 144.9191456
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Sassafras Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "150 Gap Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "242 Elizabeth Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Lalor Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "310 Elizabeth Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "194 Mitchells Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3/77 Barkly St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Dulverton Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Meldrum Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "87 Sorbonne",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Casey Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Thyra Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783657,
    lng: 144.8375652
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "370 Hampshire Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7780836,
    lng: 144.8335726
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3-11 Market Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783657,
    lng: 144.8375652
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "97 Ridgeway Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7836984,
    lng: 144.8042595
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Gregg Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.3396318,
    lng: 143.5524803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Cobham Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.3396318,
    lng: 143.5524803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "70a Gray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.3396318,
    lng: 143.5524803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Ralph St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7442306,
    lng: 144.7999941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "500 Upper Goulburn Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.1126329,
    lng: 145.1155133
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Meath Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.948056,
    lng: 147.348889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Lytham Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.4366557,
    lng: 145.2328259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "94 Atheldene Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7442306,
    lng: 144.7999941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Drummoyne Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 144.751
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Thomson Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 144.751
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Rubicon Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 144.751
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Goulburn Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6973477,
    lng: 144.7811982
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Dena Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7537669,
    lng: 145.1486206
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Smith Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3863916,
    lng: 145.5659261
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "37 Central Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Chappell Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Leslie Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Pioneer Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "56 Commercial Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6377485,
    lng: 145.082419
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Cuckoo Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6282842,
    lng: 145.0920271
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 George Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 McNeilage Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1/10 Steel Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "23 Vernier Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8292454,
    lng: 144.8813515
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "33 Lawson Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.7976791,
    lng: 144.2866151
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "94 Atheldene Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7442306,
    lng: 144.7999941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Magnus Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7442306,
    lng: 144.7999941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "21 Godfrey Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8626196,
    lng: 145.0007064
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Windsor Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7358112,
    lng: 144.9191456
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Sassafras Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "150 Gap Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "242 Elizabeth Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "36 Lalor Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "310 Elizabeth Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "194 Mitchells Lane",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3/77 Barkly St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Dulverton Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Meldrum Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "87 Sorbonne",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "7 Casey Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.581111,
    lng: 144.713889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Thyra Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783657,
    lng: 144.8375652
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "370 Hampshire Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7780836,
    lng: 144.8335726
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3-11 Market Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.783657,
    lng: 144.8375652
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "97 Ridgeway Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7836984,
    lng: 144.8042595
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Gregg Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.3396318,
    lng: 143.5524803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Cobham Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.3396318,
    lng: 143.5524803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1455 Murchison-Tatura Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.4366557,
    lng: 145.2328259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Ralph St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7442306,
    lng: 144.7999941
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "500 Upper Goulburn Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.1126329,
    lng: 145.1155133
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "12 Meath Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -42.948056,
    lng: 147.348889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Lytham Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.4366557,
    lng: 145.2328259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1455 Murchison-Tatura Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.4366557,
    lng: 145.2328259
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Drummoyne Terrace",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 144.751
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Thomson Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 144.751
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Rubicon Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.715,
    lng: 144.751
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Goulburn Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6973477,
    lng: 144.7811982
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Dena Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7537669,
    lng: 145.1486206
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Smith Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3863916,
    lng: 145.5659261
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "37 Central Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Leslie Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Pioneer Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6837819,
    lng: 145.0107588
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Uplands Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6751571,
    lng: 144.9893458
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "278 Rossmoyne Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7600493,
    lng: 145.0080039
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "242 Rossmoyne Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7589954,
    lng: 145.0161614
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31A Gooch Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7600493,
    lng: 145.0080039
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Toorak Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8432402,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "69 Lansell Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8432402,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "70a Gray Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.3396318,
    lng: 143.5524803
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Warra Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8432402,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Pacific Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3110818,
    lng: 144.3409294
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2/3 Elm Grove Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2033531,
    lng: 146.519786
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "26 Allen Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2033531,
    lng: 146.519786
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Dalkeith Age Care Home",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2033531,
    lng: 146.519786
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 55 49-53 Hazelwood Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2090605,
    lng: 146.5204408
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 15 49-53 Hazelwood Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2090605,
    lng: 146.5204408
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 30 49-53 Hazelwood Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2090605,
    lng: 146.5204408
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "3 Glencoe Ave Trauganina.",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8282806,
    lng: 144.7082568
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Sissinghurst Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8282806,
    lng: 144.7082568
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Amity Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8282806,
    lng: 144.7082568
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "632 Toorak Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8432402,
    lng: 145.0190242
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Effie Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9039829,
    lng: 145.3309395
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19/12 Short Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8353637,
    lng: 145.1899821
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17 Baird Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.6372041,
    lng: 145.7141065
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "211 Wattlevale Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.7595533,
    lng: 146.9021104
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Forbes Boulevard",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4066923,
    lng: 144.9798236
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 MacDonald Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4066923,
    lng: 144.9798236
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "40 Alexander Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4066923,
    lng: 144.9798236
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Franklin Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.4066923,
    lng: 144.9798236
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Floyd Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.3742363,
    lng: 146.3264849
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "17-19 Valdoris Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.36782,
    lng: 146.3217232
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "28 Roxburgh Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8479567,
    lng: 145.2289289
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1 280 Wantirna Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8417778,
    lng: 145.2270621
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Lewis Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8769518,
    lng: 145.2329617
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 14",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8769518,
    lng: 145.2329617
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Downshire Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8769518,
    lng: 145.2329617
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "41 Sylphide Way",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8769518,
    lng: 145.2329617
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "55 Flannery Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.738,
    lng: 145.223
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Leena Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.777,
    lng: 145.249
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "102 Boes Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2619416,
    lng: 145.1668173
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Prymslea Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3686779,
    lng: 142.4982086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "59 Meakin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7,
    lng: 145.081
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Essex St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.532,
    lng: 143.823
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Halbert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.532,
    lng: 143.823
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Carbon Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8997995,
    lng: 144.6641401
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Thompson Court",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8997995,
    lng: 144.6641401
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "153 Werribee Street North",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8997995,
    lng: 144.6641401
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Centennial Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8054744,
    lng: 144.8756361
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 LLoyd Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.1242129,
    lng: 146.8574235
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "43 Melrose Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.1242129,
    lng: 146.8574235
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "125 Dexter Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.1413053,
    lng: 146.2202946
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "58 Strickland Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9067871,
    lng: 145.1890123
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Sean Close",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9067871,
    lng: 145.1890123
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "9 Llex Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3686779,
    lng: 142.4982086
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "467 Napier Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.733333,
    lng: 144.3
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Montgomery Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.733333,
    lng: 144.3
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19 Sherwin Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.513889,
    lng: 145.113889
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 John Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "43 Railway Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "20 Tobruk Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "181 Osborne Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "179 Osborne Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "37 Albert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8531417,
    lng: 144.8932157
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Smith Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10/98 Railway Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "18 Macqurie Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10/98 Railway Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "56A Morris Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "34 Victoria Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.861,
    lng: 144.885
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "120 Kororoit Creek Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8517597,
    lng: 144.8689963
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 4 69 Park Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8559135,
    lng: 144.8794182
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "35 Lewisham Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.854,
    lng: 144.988
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "11 Prague Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.1240938,
    lng: 146.8817639
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "2 Corrimbla Avenue",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.5891893,
    lng: 144.9942305
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "30 Belinda Crescent",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9067871,
    lng: 145.1890123
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "15 Packham Place",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7347069,
    lng: 145.2590707
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Clitheroe Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.89,
    lng: 144.63
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "27 Carmichael Drive",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.89,
    lng: 144.63
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "5 Woods Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -35.7064354,
    lng: 142.0228094
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "329 Francis Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.819811,
    lng: 144.8813738
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "31 Woods Road",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.0271135,
    lng: 145.9990577
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "6 Albert Street",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.316667,
    lng: 146.316667
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "16 Bangalay Rise",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.5891893,
    lng: 144.9942305
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Uplands Pl",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6751571,
    lng: 144.9893458
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Unit 1/280 Wantirna Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8417778,
    lng: 145.2270621
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Flyers dropped 30 Jan",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8150153928,
    lng: 145.004522757
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19/12 Short St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8353637,
    lng: 145.1899821
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "Queens College",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7932401,
    lng: 144.9642401
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "13 Pacific Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.3110818,
    lng: 144.3409294
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "65A Woodacres Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.351523,
    lng: 144.2422531
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "900 Park St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7770583,
    lng: 144.9456543
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "74 Tennyson St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7986736,
    lng: 144.9286032
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1993 Malvern Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8717394,
    lng: 145.0629321
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "19-21 Sarton Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.9190111,
    lng: 145.144155
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Noarana Dr",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -36.5805922,
    lng: 145.9643544
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "8 Mount St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7650717,
    lng: 145.059911
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "102 Boes Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -38.2619416,
    lng: 145.1668173
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "122 Keele St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7973711,
    lng: 144.9912802
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "22 Churchill St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8187902,
    lng: 145.1084708
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "10 Leonard Ave",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7054021,
    lng: 144.9302008
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "1 Amsted Rd",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8446425,
    lng: 145.284503
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "4 Cuckoo St",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.6282842,
    lng: 145.0920271
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "69 Park Cres",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.8559135,
    lng: 144.8794182
  },
  {
    title: "Warehouse floor settlement causing operational issues.",
    location: "97 Ridgeway Parade",
    description: "",
    image: "https://via.placeholder.com/600x350?text=Melbourne",
    buttonText: "View Project",
    buttonUrl: "#",
    lat: -37.7836984,
    lng: 144.8042595
  }
    ];

    const mapSettings = {
      centerLat: -38.38649372227005,
      centerLng: 143.88020153606988,
      startZoom: 8,
      minZoom: 4,

      /*
        Privacy limit.
        7 = stricter privacy.
        8 = city/suburb level.
      */
      maxZoom: 11,

      /*
        Per-state center/zoom used when the visitor's Australian state
        can be determined from their IP address.
      */
      stateCenters: {
        NSW: { lat: -31.8759835, lng: 147.2869493, zoom: 6, name: "New South Wales" },
        VIC: { lat: -37.4713077, lng: 144.7851531, zoom: 7, name: "Victoria" },
        QLD: { lat: -20.9175738, lng: 142.7027956, zoom: 5, name: "Queensland" },
        SA: { lat: -30.0002315, lng: 136.2091547, zoom: 5, name: "South Australia" },
        WA: { lat: -25.0428028, lng: 121.9425861, zoom: 5, name: "Western Australia" },
        TAS: { lat: -41.4544927, lng: 145.9707456, zoom: 7, name: "Tasmania" },
        NT: { lat: -19.4914357, lng: 132.5509522, zoom: 5, name: "Northern Territory" },
        ACT: { lat: -35.4734679, lng: 149.0123679, zoom: 9, name: "Australian Capital Territory" }
      }
    };

    rectifyManualMap = new google.maps.Map(mapElement, {
      center: {
        lat: mapSettings.centerLat,
        lng: mapSettings.centerLng
      },
      zoom: mapSettings.startZoom,
      minZoom: mapSettings.minZoom,
      maxZoom: mapSettings.maxZoom,
      mapTypeId: "roadmap",

      zoomControl: false,
      streetViewControl: false,
      fullscreenControl: false,
      mapTypeControl: false,
      scaleControl: false,
      rotateControl: false,

      draggable: true,
      gestureHandling: "greedy",
      scrollwheel: false,
      disableDoubleClickZoom: true
    });

    /*
      Custom popup overlay class.
    */
    class RectifyPopupOverlay extends google.maps.OverlayView {
      constructor(position, data) {
        super();
        this.position = position;
        this.data = data;
        this.div = null;
      }

      onAdd() {
        this.div = document.createElement("div");
        this.div.className = "rectify-popup";

        const safeTitle = this.data.title || "";
        const safeLocation = this.data.location || "";
        const safeDescription = this.data.description || "";
        const safeImage = this.data.image || "";
        const safeButtonText = this.data.buttonText || "View More";
        const safeButtonUrl = this.data.buttonUrl || "#";

        this.div.innerHTML =
          '<button class="rectify-popup-close" type="button" aria-label="Close popup">&times;</button>' +
          '<div class="rectify-popup-content">' +
            '<h3 class="rectify-popup-title">ISSUE<br> <span class="c-red">' + safeTitle + '</span></h3>' +
            '<p class="rectify-popup-location">Solution:<br> <span>  ' + safeLocation + '</span></p>' +
            '<p class="rectify-popup-description">Result:<br> <span>  ' + safeDescription + '</span></p>' +
            '<a class="rectify-popup-button" href="' + safeButtonUrl + '"> ' + safeButtonText + ' </a>' +
          '</div>';

        const closeButton = this.div.querySelector(".rectify-popup-close");
        closeButton.addEventListener("click", () => {
          this.setMap(null);
          activePopup = null;
        });

        const panes = this.getPanes();
        panes.floatPane.appendChild(this.div);
      }

      draw() {
        const projection = this.getProjection();
        const pixelPosition = projection.fromLatLngToDivPixel(this.position);

        if (this.div && pixelPosition) {
          this.div.style.left = pixelPosition.x + "px";
          this.div.style.top = pixelPosition.y + "px";
        }
      }

      onRemove() {
        if (this.div) {
          this.div.parentNode.removeChild(this.div);
          this.div = null;
        }
      }
    }

    const bounds = new google.maps.LatLngBounds();

    locations.forEach(function (location) {
      const markerPosition = {
        lat: location.lat,
        lng: location.lng
      };

      const marker = new google.maps.Marker({
        position: markerPosition,
        map: rectifyManualMap,
        title: location.title
      });

      /*
        Pin click popup disabled.
      */
      // marker.addListener("click", function () {
      //   if (activePopup) {
      //     activePopup.setMap(null);
      //     activePopup = null;
      //   }
      //
      //   activePopup = new RectifyPopupOverlay(
      //     new google.maps.LatLng(location.lat, location.lng),
      //     location
      //   );
      //
      //   activePopup.setMap(rectifyManualMap);
      // });

      bounds.extend(markerPosition);
    });

    /*
      Show all manual pins on load.
      Used as the fallback view when the visitor's state can't be
      determined (geolocation fails, unsupported country, etc).
    */
    function rectifyApplyDefaultMapView() {
      if (locations.length > 1) {
        rectifyManualMap.fitBounds(bounds);

        google.maps.event.addListenerOnce(rectifyManualMap, "idle", function () {
          if (rectifyManualMap.getZoom() > mapSettings.maxZoom) {
            rectifyManualMap.setZoom(mapSettings.maxZoom);
          }

          if (rectifyManualMap.getZoom() < mapSettings.minZoom) {
            rectifyManualMap.setZoom(mapSettings.minZoom);
          }
        });
      }

      if (locations.length === 1) {
        rectifyManualMap.setCenter({
          lat: locations[0].lat,
          lng: locations[0].lng
        });
        rectifyManualMap.setZoom(mapSettings.maxZoom);
      }
    }

    /*
      Center/zoom the map on the visitor's Australian state, if known.
      Returns false (and leaves the map untouched) when the state code
      isn't in mapSettings.stateCenters.
    */
    function rectifyApplyStateView(stateCode) {
      const stateView = mapSettings.stateCenters[stateCode];

      if (!stateView) {
        return false;
      }

      rectifyManualMap.setCenter({ lat: stateView.lat, lng: stateView.lng });
      rectifyManualMap.setZoom(stateView.zoom);

      document.querySelectorAll(".rectify-map-region").forEach(function (el) {
        el.textContent = stateView.name + ", Australia";
      });

      return true;
    }

    /*
      Geolocate the visitor by IP (client-side, so the lookup sees their
      real public IP rather than the server's) and center the map on
      their Australian state. Falls back to the default pin-based view
      if geolocation fails, times out, or the visitor isn't in a
      recognised state.
    */
    let rectifyMapViewResolved = false;

    function rectifyResolveMapView(applyFn) {
      if (rectifyMapViewResolved) {
        return;
      }

      rectifyMapViewResolved = true;
      applyFn();
    }

    fetch("https://ipwho.is/")
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        rectifyResolveMapView(function () {
          if (!data || data.success === false || data.country_code !== "AU") {
            rectifyApplyDefaultMapView();
            return;
          }

          const stateCode = (data.region_code || "").toUpperCase();

          if (!rectifyApplyStateView(stateCode)) {
            rectifyApplyDefaultMapView();
          }
        });
      })
      .catch(function () {
        rectifyResolveMapView(rectifyApplyDefaultMapView);
      });

    /*
      Safety timeout in case the geolocation request hangs or is blocked
      (ad blockers, offline, slow network, etc).
    */
    setTimeout(function () {
      rectifyResolveMapView(rectifyApplyDefaultMapView);
    }, 3000);

    /*
      Close popup when dragging the map.
    */
    rectifyManualMap.addListener("dragstart", function () {
      if (activePopup) {
        activePopup.setMap(null);
        activePopup = null;
      }
    });

    /*
      Close popup when clicking elsewhere on the map.
    */
    rectifyManualMap.addListener("click", function () {
      if (activePopup) {
        activePopup.setMap(null);
        activePopup = null;
      }
    });

    function showMessage(text) {
      messageBox.textContent = text;
      messageBox.classList.add("show");

      setTimeout(function () {
        messageBox.classList.remove("show");
      }, 1200);
    }

    let wheelLocked = false;
    const wheelDelay = 450;

    mapElement.addEventListener(
      "wheel",
      function (event) {
        event.preventDefault();
        event.stopPropagation();

        if (wheelLocked) {
          return;
        }

        wheelLocked = true;

        setTimeout(function () {
          wheelLocked = false;
        }, wheelDelay);

        const currentZoom = rectifyManualMap.getZoom();
        const scrollingUp = event.deltaY < 0;
        const scrollingDown = event.deltaY > 0;

        if (scrollingUp) {
          if (currentZoom >= mapSettings.maxZoom) {
            showMessage("Maximum zoom reached");
            return;
          }

          rectifyManualMap.setZoom(currentZoom + 1);
        }

        if (scrollingDown) {
          if (currentZoom <= mapSettings.minZoom) {
            return;
          }

          rectifyManualMap.setZoom(currentZoom - 1);
        }
      },
      { passive: false, capture: true }
    );

    rectifyManualMap.addListener("zoom_changed", function () {
      const currentZoom = rectifyManualMap.getZoom();

      if (currentZoom > mapSettings.maxZoom) {
        rectifyManualMap.setZoom(mapSettings.maxZoom);
        showMessage("Maximum zoom reached");
      }
    });
  }