<div class="rectify-manual-map-wrapper">
  <div id="rectifyManualMap"></div>

  <div class="rectify-map-message" id="rectifyMapMessage">
    Maximum zoom reached
  </div>
</div>

<style>
  .rectify-manual-map-wrapper {
    position: relative;
    width: 100%;
    max-width: 1200px;
    height: 520px;
    margin: 0 auto;
    overflow: hidden;
    border-radius: 16px;
    background: #ffffff;
  }

  #rectifyManualMap {
    width: 100%;
    height: 520px;
    background: #ffffff;
  }

  .rectify-map-message {
    position: absolute;
    left: 50%;
    bottom: 22px;
    transform: translateX(-50%);
    z-index: 10;
    background: rgba(0, 0, 0, 0.78);
    color: #ffffff;
    padding: 10px 18px;
    border-radius: 24px;
    font-size: 14px;
    display: none;
    pointer-events: none;
  }

  .rectify-map-message.show {
    display: block;
  }

  /* Custom popup */
  .rectify-popup {
    position: absolute;
    width: 280px;
    background: #ffffff;
    border-radius: 18px;
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.22);
    overflow: hidden;
    transform: translate(-50%, calc(-100% - 22px));
    font-family: Helvetica;
    z-index: 9999;
  }

  .rectify-popup::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: -10px;
    width: 20px;
    height: 20px;
    background: #ffffff;
    transform: translateX(-50%) rotate(45deg);
    box-shadow: 8px 8px 18px rgba(0, 0, 0, 0.08);
  }

  .rectify-popup-image {
    width: 100%;
    height: 145px;
    background-size: cover;
    background-position: center;
    background-color: #eeeeee;
  }

  .rectify-popup-content {
    padding: 16px 18px 18px;
  }

  .rectify-popup-title {
    margin: 0 0 6px;
    font-size: 18px;
    line-height: 1.25;
    font-weight: 700;
    color: #111111;
  }

  .rectify-popup-location {
    margin: 0 0 10px;
    font-size: 13px;
    line-height: 1.4;
    color: #666666;
  }

  .rectify-popup-description {
    margin: 0 0 14px;
    font-size: 14px;
    line-height: 1.45;
    color: #333333;
  }

  .rectify-popup-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 9px 14px;
    border-radius: 999px;
    background: #111111;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
  }

  .rectify-popup-close {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 28px;
    height: 28px;
    border: none;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.65);
    color: #ffffff;
    font-size: 18px;
    line-height: 28px;
    cursor: pointer;
    z-index: 2;
  }

  .rectify-popup-close:hover {
    background: rgba(0, 0, 0, 0.85);
  }

  @media (max-width: 600px) {
    .rectify-popup {
      width: 245px;
    }

    .rectify-popup-image {
      height: 120px;
    }

    .rectify-popup-title {
      font-size: 16px;
    }
  }
</style>

<script>
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
        title: "Melbourne",
        location: "Victoria, Australia",
        description: "Ground improvement works completed across the Melbourne region.",
        image: "https://via.placeholder.com/600x350?text=Melbourne",
        buttonText: "View Project",
        buttonUrl: "#",
        lat: -37.8136,
        lng: 144.9631
      },
      {
        title: "Geelong",
        location: "Victoria, Australia",
        description: "Chemical underpinning and ground stabilisation works in the Geelong area.",
        image: "https://via.placeholder.com/600x350?text=Geelong",
        buttonText: "View Project",
        buttonUrl: "#",
        lat: -38.1499,
        lng: 144.3617
      },
      {
        title: "Ballarat",
        location: "Victoria, Australia",
        description: "Regional Rectify project location shown at suburb/city level for privacy.",
        image: "https://via.placeholder.com/600x350?text=Ballarat",
        buttonText: "View Project",
        buttonUrl: "#",
        lat: -37.5622,
        lng: 143.8503
      },
      {
        title: "Bendigo",
        location: "Victoria, Australia",
        description: "Approximate service area marker for Bendigo and surrounding suburbs.",
        image: "https://via.placeholder.com/600x350?text=Bendigo",
        buttonText: "View Project",
        buttonUrl: "#",
        lat: -36.7570,
        lng: 144.2794
      },
      {
        title: "Shepparton",
        location: "Victoria, Australia",
        description: "Approximate marker only. Exact job addresses are not shown.",
        image: "https://via.placeholder.com/600x350?text=Shepparton",
        buttonText: "View Project",
        buttonUrl: "#",
        lat: -36.3805,
        lng: 145.3987
      },
      {
        title: "Adelaide",
        location: "South Australia, Australia",
        description: "South Australian project/service area marker.",
        image: "https://via.placeholder.com/600x350?text=Adelaide",
        buttonText: "View Project",
        buttonUrl: "#",
        lat: -34.9285,
        lng: 138.6007
      }
    ];

    const mapSettings = {
      centerLat: -25.2744,
      centerLng: 133.7751,
      startZoom: 4,
      minZoom: 4,

      /*
        Privacy limit.
        7 = stricter privacy.
        8 = city/suburb level.
      */
      maxZoom: 8
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
          '<div class="rectify-popup-image" style="background-image:url(' + safeImage + ');"></div>' +
          '<div class="rectify-popup-content">' +
            '<h3 class="rectify-popup-title">' + safeTitle + '</h3>' +
            '<p class="rectify-popup-location">' + safeLocation + '</p>' +
            '<p class="rectify-popup-description">' + safeDescription + '</p>' +
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

      marker.addListener("click", function () {
        if (activePopup) {
          activePopup.setMap(null);
          activePopup = null;
        }

        activePopup = new RectifyPopupOverlay(
          new google.maps.LatLng(location.lat, location.lng),
          location
        );

        activePopup.setMap(rectifyManualMap);
      });

      bounds.extend(markerPosition);
    });

    /*
      Show all manual pins on load.
    */
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
</script>

<script
  async
  defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhu_75UbalvbIiuIWocy8-LHVuGgItnU&callback=initRectifyManualMap">
</script>