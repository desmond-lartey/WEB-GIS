<?php include "../includes/init.php"?>
<!DOCTYPE html>
<html lang="en-US">
<!-- Adding the HEADER file -->
<?php include "../includes/header.php" ?>
<?php include "../includes/css/style_eimg_draw.php" ?>
<body>

  <!-- ###############  Div that contains the sidebar ############### -->
  <div id="sidebar_div" class="leaflet-sidebar collapsed">
    <!-- Nav tabs -->
    <div id="sidebarTab_div" class="leaflet-sidebar-tabs">
      <ul id="sidebarTab_top" class="sidebarTab_ul" role="tablist">
        <li><a href="#home" role="tab"><i class="fa fa-home"></i></a></li>
      </ul>
      <ul id="sidebarTab_bottom" class="sidebarTab_ul" role="tablist">
        <li><a href="#settings" role="tab"><i class="fa fa-gear"></i></a></li>
      </ul>
    </div> <!-- close DIV class="sidebar-tabs"> -->

    <!-- Tab panes -->
    <div class="leaflet-sidebar-content">
      <!-- #### Start the content for each one of the tabs #### -->
      <!-- sidebar_tab: HOME -->
      <div class="leaflet-sidebar-pane" id="home">
        <h1 class="leaflet-sidebar-header"> <!-- Header of the tab -->
          <span class="language-en">Home</span>
          <span class="language-pt">Início</span>
          <span class="leaflet-sidebar-close"><i class="fa fa-chevron-circle-left"></i></span>
        </h1>

      </div> <!-- close DIV id="home"> -->

      <!-- sidebar_tab: settings -->
      <div class="leaflet-sidebar-pane" id="settings">
        <h1 class="leaflet-sidebar-header"> <!-- Header of the tab -->
          <span class="language-en">Settings</span>
          <span class="language-pt">Configurações</span>
          <span class="leaflet-sidebar-close"><i class="fa fa-chevron-circle-left"></i></span>
        </h1>
        <div>

        </div>
      </div> <!-- close DIV id="settings"> -->
    </div> <!-- close DIV class="sidebar-content"> -->
  </div><!-- close DIV id="sidebar"> -->

  <!-- ###############  Div that contains the map application ############### -->
  <div id="mapdiv" class="col-md-12"></div>

  <script>
  //  ********* Global Variables Viewer *********
  var lyrEIMG;
  var eimg_stats;
  var number_classes;
  var feat_loaded;
  var quantile_class;
  var array_cnt_feat_class;
  var symbology_type = "quantile";

  //  ********* Global Variables Definition *********
  var mymap;
  var basemap_osm, basemap_mapbox, basemap_Gterrain, basemap_Gimagery,
  basemap_GimageHybrid, basemap_WorldImagery, Hydda_RoadsAndLabels;
  var LyrAOI, LyrAOI_coords;
  var ctlLayers, ctlCreationToolbar, ctlSidebar, ctlZoom, ctlMapOverview,
  ctlScale, ctlMouseposition, ctlAttribute;
  var statusAddLikeButton = "", statusAddDislikeButton = "";
  var siteLang;
  var temp_tab_content;
  var color_line_area, color_fill_area;
  var fgpDrawnItems;
  var area_id;
  var previousTab, activeTab;
  var sidebarOpened;
  var clickedLayerId=null;
  var editMode = false, createMode = false;
  var newTabCreated = false;
  var setStyle_normal = {"weight": 2, "fillOpacity": 0.20 };
  var setStyle_edit = {"weight": 5, "fillOpacity": 0.1};
  var setStyle_clicked = {"weight": 3.5, "fillOpacity": 0.20};
  var cntCheckedCbx;
  var firstVertex, pntClicked;
  var minimumZoom = 11;
  var closeAlertPopUpWhenDrawIsFinished;

  // # Logging variables
  var log_functions = false;
  var IsMobileDevice = false;
  var cnt_SidebarOpens = 0;
  var cnt_SidebarChangeTab = 0;
  var cnt_LikedAreas = 0;
  var cnt_DislikedAreas = 0;
  var cnt_zoomInExceeded = 0;
  var cnt_zoomOutExceeded = 0, cnt_doNotPan = 0;
  var cnt_numVertices = 0;
  var cnt_movechange = 0;
  var cnt_CtrlZPressed = 0;
  var cnt_enterKeyPressed = 0;
  var cnt_escapeKeyPressed = 0;
  var time_start_draw, time_end_draw;

  //  ********* Mobile Device parameters and Function *********
  loadMobileFunction();
  //  ********* Create Map *********
  $(document).ready(function(){
    // set the language of the application. It must be the first line of the $(document).ready()
    cbxLangChange(getCookie("app_language"));

    //  ********* Map Initialization *********
    loadBasemaps();
    minimumZoom = IsMobileDevice ? 9 : 10;
    //Create the Leaflet map elemetn
    mymap = L.map('mapdiv', {
      center: L.latLng(38.716, -9.150),
      layers: basemap_mapbox,
      zoom:14,
      maxZoom: 18,
      minZoom: minimumZoom,
      attributionControl:false,
      zoomControl:false,
      // maxBounds: mybounds,
      maxBoundsViscosity: 1.0
    });

    loadStudyArea();
    loadControls(); //Load leaflet controls

    // Add Events
    addMapEvents();

    //************************  DATA FOR VIEWER ******
    refreshPlaces();

  }); //END $(document).ready()

  function refreshPlaces(){
    //stats for the data
    $.ajax({
      url:'eimg_get_dbtable.php',
      data: {
        type_op: "info",
        tbl: "eimg_raw_polys",
        select:"max(area_sqm), min(area_sqm), count(*)"
      },
      type:'POST',
      success:function(response){
        //console.log(response);
        eimg_stats = JSON.parse(response);
      },
      error: function(xhr, status, error){ alert("ERROR: "+error); }
    }); // End ajax

    var table_options = {
      type_op: "data",
      tbl: "eimg_raw_polys",
      select: "*,ST_AsGeoJSON(centroid, 5) AS geojson"
    }
    $.ajax({
      url:'eimg_get_dbtable.php',
      data: table_options,
      type:'POST',
      success:function(response){
        if (lyrEIMG) {
          mymap.removeLayer(lyrEIMG);
        };
        //reseting global variables in each call of refreshPlaces()
        feat_loaded = 0;
        quantile_class = 1;
        array_cnt_feat_class=[0,0,0,0,0];
        console.log( JSON.parse(response) );
        lyrEIMG=L.geoJSON(JSON.parse(response),{
          pointToLayer: createCircles,
          onEachFeature: aggAttributes
          // , filter:filterPlaces
        });
        lyrEIMG.addTo(mymap);
      },//end success
      error: function(xhr, status, error){
        alert("ERROR: "+error);
      }
    }); // End ajax
  }//End refreshPlaces

  function aggAttributes(feature, lyr) {
    var att = feature.properties;
    strToolTip = "ID: "+att.id;
    // strToolTip = "<i class='fa fa-thumbs-up' ></i> "+att.ct_liked;
    // strToolTip += "   ";
    // strToolTip += "<i class='fa fa-thumbs-down'></i> "+att.ct_disliked;

    lyr.bindTooltip(strToolTip, {direction: "center"});

    // //bind events
    // lyr.on('mouseover', function(e){
    //   lyr.setStyle({ weight: 2});
    // });
    // lyr.on('mouseout', function(e){
    //   lyr.setStyle({ weight: 0});
    // });

  }

  function createCircles(feature, latlng) {
    var att = feature.properties;
    var min_value = 30;
    var max_value = 200;
    var min_max_norm = min_value+((((parseInt(att.area_sqm))-parseInt(eimg_stats.min))*(max_value-min_value))/(parseInt(eimg_stats.max)-parseInt(eimg_stats.min)));
    var radius = min_max_norm;
    // return new L.circleMarker(latlng, {
    return new L.circle(latlng, {
      radius: radius,
      fillOpacity: 0.2,
      fillColor: 'red',
      weight: 1,
      color: 'black'
    });
  }

  //  ********* eimg_DRAW Functions *********
  function loadMobileFunction() {
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
      /*### DESCRIPTION: Check if the web application is being seen in a mobile device   */
      IsMobileDevice = true;
    };
  }
  function loadStudyArea(){
    /* DESCRIPTION: Adds the Study area, comprises of 12 freguesias:
    * Estrela, Misericórdia, Santa Maria Maior, São Vicente, Penha de França, Beato,
    * Arroios, Santo António, Campo de Ourique, Campolide, Avenidas Novas, Areeiro  */
    $.ajax({
      url:'eimg_get_dbtable.php',
      data: {
        type_op: "data",
        tbl: "study_area_4326",
        select:"*,ST_AsGeoJSON(geom, 5) AS geojson"

      },
      type:'POST',
      success:function(response){
        // console.log(response);
        var layer = JSON.parse(response);
        // console.log(layer);
        LyrAOI_coords = layer.features[0].geometry.coordinates;
        LyrAOI=L.geoJSON(layer);
        var lyr_bounds = LyrAOI.getBounds();
        var value = 0.12;
        LyrAOI.addTo(mymap);
        //Creating a boundary for the map based on the bounds of the layer added
        //Increasing lat and long in the same proportion
        var slt = (lyr_bounds._southWest.lat)-value; //south latitude
        var sln = (lyr_bounds._southWest.lng)-value*2; //south longitude
        var nlt = (lyr_bounds._northEast.lat)+value; //north latitude
        var nln = (lyr_bounds._northEast.lng)+value*2; //north longitude
        // defining the max bounds for panning around the map
        var southWest = L.latLng(slt,sln);
        var northEast = L.latLng(nlt,nln);
        var mybounds =  L.latLngBounds(southWest, northEast);
        //Zoom the map to the bounds of the added layer
        mymap.fitBounds(LyrAOI.getBounds());
        //Set the maximum boundaries in which the map can be panned
        mymap.setMaxBounds(mybounds);
        //Create a test polygon to see the area of the maxBounds
        // var polygon1 = L.polygon([[slt, sln],[slt, nln],[nlt, nln],[nlt, sln]]).addTo(mymap);
      },
      error: function(xhr, status, error){ alert("ERROR: "+error); }
    }); // End ajax
  }
  function loadBasemaps() {
    /* DESCRIPTION: Add basemaps to the map*/
    basemap_osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy;<a href="http://osm.org/copyright">OSM</a>'
    });
    basemap_mapbox = L.tileLayer("https://api.mapbox.com/styles/v1/mapbox/streets-v9/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZ2lzMm1hdGhldXMiLCJhIjoiY2lsYXRkcTQ2MGJudXVia25ueXZyMzJkcCJ9.sc74TfXfIWKE2Xw3aVcNvw", {
      attribution: '&copy;<a href="https://www.mapbox.com/feedback/">Mapbox</a>'
    });
    basemap_Gterrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
      subdomains:['mt0','mt1','mt2','mt3']
    });
    basemap_Gimagery = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
      subdomains:['mt0','mt1','mt2','mt3']
    });
    basemap_GimageHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
      subdomains:['mt0','mt1','mt2','mt3']
    });
    basemap_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: '&copy;<a href="https://www.esri.com/en-us/home">Esri</a>'
    });
    Hydda_RoadsAndLabels = L.tileLayer('https://{s}.tile.openstreetmap.se/hydda/roads_and_labels/{z}/{x}/{y}.png', {
      name: 'overlay',
    });
  }
  function loadControls() {
    /* Add leaflet controls to the map */
    //Plugin leaflet-sidebar-v2: https://github.com/nickpeihl/leaflet-sidebar-v2
    ctlSidebar = L.control.sidebar({
      container:'sidebar_div',
      autopan: false,
      closeButton: false,
    }).addTo(mymap);


    //Add attribution to the map
    ctlAttribute = L.control.attribution({position:'bottomright'}).addTo(mymap);
    ctlAttribute.addAttribution('OSM');
    ctlAttribute.addAttribution('&copy;<a href="http://mastergeotech.info">Master GeoTech</a>');
    ctlAttribute.addAttribution('&copy;<a href="https://github.com/codeofsumit/leaflet.pm">LeafletPM</a>');

    //Control scale
    ctlScale = L.control.scale({position:'bottomright', metric:true, imperial:false, maxWidth:200, }).addTo(mymap);

    //Control Latitude and Longitude
    if (!IsMobileDevice){
      ctlMouseposition = L.control.mousePosition({position:'bottomright'}).addTo(mymap);
    }

    // Add the overview control to the map
    ctlMapOverview = L.control.overview({
      position: 'bottomright',
      onAfterInitLayout: function (overview) {
      }
    }).addTo(mymap);

    ctlLayers = L.control.layers(
      {
        '<i class="fas fa-map-marked"></i>': basemap_osm,
        '<i class="fas fa-mountain"></i>': basemap_Gterrain,
        '<i class="fas fa-globe-americas"></i>': basemap_GimageHybrid,
        // '<i class="fas fa-image"></i>': basemap_WorldImagery
      }, null, {collapsed: false}
    ).addTo(mymap);


    mymap.addLayer(basemap_osm);

    // Adds a control using the easy button plugin
    var ctlFinishArea = L.easyButton('fa-project-diagram', function(){finishCreation();}, 'Click to complete the drawing');
    var ctlRemoveLastVertex = L.easyButton('fa-undo-alt', function(){removeLastVertex();}, 'Click to remove the last vertex');
    var ctlCancelArea = L.easyButton('fa-times-circle', function(){removeArea(area_id, true);}, 'Click to cancel the drawing');
    ctlCreationToolbar = L.easyBar([ ctlFinishArea, ctlRemoveLastVertex, ctlCancelArea],{position:'topright'});

    var container = L.DomUtil.create('div', 'infobox_for_toolbar leaflet-bar leaflet-control', ctlCreationToolbar.getContainer());
    container.title="Toolbar Instructions";

    if(siteLang=='en'){
      container.innerHTML = '<p>Finish drawing (Enter)</p><p style="padding-top:0;">Remove vertex (Ctrl+z)</p><p style="padding-top:0;">Cancel Drawing (Esc)</p>';
      container.style.marginLeft= '-145px';
      container.style.width= '140px';
    }
    if(siteLang=='pt'){
      container.innerHTML = '<p>Finalizar (Enter)</p><p style="padding-top:0;">Remover vértice (Ctrl+z)</p><p style="padding-top:0;">Cancelar (Esc)</p>';
      container.style.marginLeft= '-149px';
      container.style.width= '145px';
    }
    // styles: .infobox_for_toolbar
    // events
    container.onmouseover = function(){ container.style.visibility = 'hidden';}

    // Add Zoom if not in the
    if (!IsMobileDevice){
      ctlZoom = L.control.zoom({position:'topright'}).addTo(mymap);
    }
  }
  function addMapEvents() {
    /* DESCRIPTION: Add all the events related to the leaflet map element */
    mymap.on("zoomend", function () {
      // console.log(mymap.getCenter().toString());
      var zoomNotAllowed = minimumZoom;
      if(mymap.getZoom()==zoomNotAllowed){
        cnt_zoomOutExceeded++;
        if(siteLang=='en') var str_popup = "<h6>Minimum zoom exceeded!</h6>";
        if(siteLang=='pt') var str_popup = "<h6>Zoom mínimo ultrapassado!</h6>";

        if( cnt_zoomOutExceeded<5)  openAlertPopup(mymap.getCenter(), str_popup,1000 );
        setTimeout(function(){
          mymap.setZoom(zoomNotAllowed+1);
        }, 400);
      }
    });
    mymap.on('contextmenu', function(e){
      /* DESCRIPTION: listener when a click is given on the map  */
      //CAN OPEN THE settings TOOLBAR
    });
    mymap.on('mousemove', function(e){
      /*### FUNCTION DESCRIPTION: listener when the mouse is moving on the map   */
      var str = "Latitude: "+e.latlng.lat.toFixed(5)+"  Longitude: "+e.latlng.lng.toFixed(5)+"  Zoom Level: "+mymap.getZoom();
      $("#map_coords").html(str);
    });
    mymap.on('click', function(e){
      /* DESCRIPTION: listener when a click is given on the map  */
      pntClicked = e.latlng; // FORMAT: {lat: 38.72452, lng: -9.11160}
    });
  }
  function openAlertPopup(popup_position, popup_content, duration_open=5000){
    /* DESCRIPTION: Shows the user a message in a Popup instead of using alert*/
    var popup_options = {
      // 'autoClose':	false,
      'closeOnClick':	false,
      'className' : 'popupInfo'
    }

    //close any popup if open
    mymap.closePopup();
    var infoPopUp = L.popup(popup_options)
    .setLatLng(popup_position) // FORMAT == {lat: 38.7345, lng: -9.1111}
    .setContent(popup_content)
    .openOn(mymap);
    setTimeout(function(){ mymap.closePopup(infoPopUp);}, duration_open);
  }
  function cbxLangChange(value){
    if (value == 'en') {
      siteLang='en';
      $('.language-pt').hide(); // hides
      $('.language-en').show(); // Shows
    }
    else if (value == 'pt') {
      siteLang='pt';
      $('.language-en').hide(); // hides
      $('.language-pt').show(); // Shows
    }
  }

  //  # Document Functions
  function KeyPress(e) {
    /* DESCRIPTION: call functions based on the combination of keys the users is pressing */
    var evtobj = window.event? event : e
    //Ctrl+z
    if (evtobj.keyCode == 90 && evtobj.ctrlKey) {
      console.log("ctrl+z pressed...");
    }
  }
  //  # Cookie Functions
  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

</script>
</body>
</html>
