<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Charging loctions around you</title>

    <!-- LOADING THE LIBRARIES -->
    <!-- loading the leaflet maps css library -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""
    />
    <!-- including the leaflet javascript after wards -->
    <script
      src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""
    ></script>

    <!-- map box cdn -->

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css"
      rel="stylesheet"
    />
    <!-- css -->
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <div class="water-services">
      <img src="https://png.pngtree.com/png-clipart/20190924/original/pngtree-battery-charging-icon-for-your-project-png-image_4813067.jpg" width="100px" height="100px" />
      <p>Some charging locations around you are at :</p>
    </div>
    <div
      id="map"
      style="width: 50%; height: 600px; background-position: center"
    ></div>
    <script>
      mapboxgl.accessToken =
        "pk.eyJ1IjoibXVhc2EiLCJhIjoiY2tueWRzZG8yMWZoczJub2Fmcjc5cWR1cSJ9.h4MQx4FEPij_LAS18uQhNQ";
      var map = new mapboxgl.Map({
        container: "map", // container ID
        style: "mapbox://styles/mapbox/streets-v11", // style URL
        center: [36.817223, -1.286389], // starting position [lng, lat]
        zoom: 11, // starting zoom
      });
      map.addControl(new mapboxgl.NavigationControl());

      const waterProviders = {
        Dundori_Rd_41762_00100: [36.831157995210596, -1.3045752698873865],
        River_Road_Building_64_near_Tea_Room_opposite_KWFT: [
          36.82673641275723,
          -1.2809249904502094,
        ],
        Sharja_Plaza_Eastleigh_Nairobi: [
          36.85091494305421,
          -1.2812857738293117,
        ],
        westlands_Woodvale_Cl: [36.802925129922684, -1.25862459582471],
      };

      var Dundori_Rd = new mapboxgl.LngLat(
        36.831029249179586,
        1.3043071185011603
      );
      var Dundori_Rd_41762_00100 = new mapboxgl.LngLat(
        36.831157995210596,
        -1.3045752698873865
      );
      var River_Road_Building_64_near_Tea_Room_opposite_KWFT = new mapboxgl.LngLat(
        36.82673641275723,
        -1.2809249904502094
      );
      var Sharja_Plaza_Eastleigh_Nairobi = new mapboxgl.LngLat(
        36.85091494305421,
        -1.2812857738293117
      );
      var llb = new mapboxgl.LngLatBounds(
        Dundori_Rd,
        Dundori_Rd_41762_00100,
        River_Road_Building_64_near_Tea_Room_opposite_KWFT,
        Sharja_Plaza_Eastleigh_Nairobi
      );

      var marker1 = new mapboxgl.Marker()
        .setLngLat([36.831157995210596, -1.3045752698873865])
        .addTo(map);
      var marker2 = new mapboxgl.Marker()
        .setLngLat([36.82673641275723, -1.2809249904502094])
        .addTo(map);
      var marker3 = new mapboxgl.Marker()
        .setLngLat([36.85091494305421, -1.2812857738293117])
        .addTo(map);
      var marker4 = new mapboxgl.Marker()
        .setLngLat([36.802925129922684, -1.25862459582471])
        .addTo(map);

      //navigator.geolocation.getCurrentPosition(console.log, console.log);

      const succesfulLookup = (position) => {
        const { latitude, longitude } = position.coords;
        fetch(
          "https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=96679648bf354e168c5f2f46d578a4ef"
        )
          .then((response) => response.json())
          .then(console.log);
      };

      navigator.geolocation.getCurrentPosition(succesfulLookup, console.log);
    </script>
  </body>
</html>
