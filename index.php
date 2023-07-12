<?php include "includes/init.php"?>
<?php
if (isset($_GET['f2f'])) {
  // $type_interview = $_GET['f2f'];
  // echo $type_interview;
  $type_interview = "'face-to-face'";
  //$type_interview = "1";
}else if (isset($_GET['test'])) {
  // echo "nothing";
  $type_interview = "'test'";
  //$type_interview = "2";
}else{
  $type_interview = "'online'";
  //$type_interview = "3";
}
?>

<!DOCTYPE html>
<html lang="en-US">
<!-- Adding the HEADER file -->
<?php include "includes/header.php" ?>
<?php include "includes/css/style_eimg_draw.php" ?>
<?php include "includes/css/style_eimg_index.php" ?>


<body>
<!-- Modal_1 -->
<div class="modal fade" id="modal_1_intro" tabindex="-1" role="dialog" aria-labelledby="modal_1_intro" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-removeclose" style="padding:5px">
        <h5 class="modal-title" id="exampleModalLabel">
          <span class="language-en">Welcome to eImage-LX</span>
          <span class="language-pt">Bem vindo ao eImage-LX</span>
        </h5>
        <!-- <div class="pull-right">
          <label class="radio-inline" >
            <input type="radio" name="language_switch" value="pt">
            <img src="<?php  echo $root_directory?>resources/images/flags/portugal.png" style="margin-left: 5px">
          </label>
          <label class="radio-inline">
            <input type="radio" name="language_switch" value="en">
            <img src="<?php  echo $root_directory?>resources/images/flags/united_kingdom.png" style="margin-left: 5px">
          </label>
        </div> -->
      </div>

      <div class="modal-body">
        <div class="col" style="text-align:center;">
          <img src="<?php  echo $root_directory?>resources/images/eimg_logo_1.png" id="logo_munster" style="margin-left: 5px">
        </div>
        <!--  Project's explanation  -->
        <label class="" >
          <input type="radio" name="language_switch" value="pt">
          <img src="<?php  echo $root_directory?>resources/images/flags/portugal.png" style="margin-left: 5px">
        </label><br />
        <label class="">
          <input type="radio" name="language_switch" value="en">
          <img src="<?php  echo $root_directory?>resources/images/flags/united_kingdom.png" style="margin-left: 5px">
        </label>

        <p>
          <span class="language-en">
            eImage is part of a research project involving 3 European universities: <b>NOVA IMS</b> (Lisbon, Portugal), <b>UJI</b> (Castellón, Spain) and <b>WWU</b> (Münster, Germany).
            The core idea is to ask citizens and visitors of Lisbon about places they like and places they dislike within the city
            in order to produce an evaluative image of the Lisbon.
          </span>
          <span class="language-pt">
            eImage é parte integrante de um projeto de investigação que envolve 3 universidades européias: <b>NOVA IMS</b> (Lisboa, Portugal), <b>UJI</b> (Castellón, Espanha) e <b>WWU</b> (Münster, Alemanha).
            A ideia principal é perguntar aos residentes e visitantes de Lisboa, área que eles gostam e áreas que eles não gostam dentro da cidade,
            para assim produzir uma imagem avaliativa da cidade.
          </span>
        </p>
        <p>
          <span class="language-en">
            The activity takes an average of 7 minutes to complete, and your contribution will be important for future actions related to the topic.
          </span>
          <span class="language-pt">
            A atividade leva em média 7 minutos para ser concluída, e sua contribuição será importante pra ações futuras relacionadas ao tema.
          </span>
        </p>
        <p><b><h4 id="message_mobile">
          <span class="language-en">
            Please, change the orientation of your device to have a better experience with this application.
          </span>
          <span class="language-pt">
            Por favor, mude a orientação do seu telemóvel para ter uma melhor experiência com essa aplicação.
          </span>
        </h4></b></p>

        <p><b><h4 id="message_ie">
          <span class="language-en">
            Please use another browser to access this application, ex: Chrome, Firefox, Safari, Opera.
          </span>
          <span class="language-pt">
            Por favor use outro browser para acessar essa aplicação, ex: Chrome, Firefox, Safari, Opera.
          </span>
        </h4></b></p>

        <div class="col text-center">
          <span class="language-en">
            <iframe width="450" height="290" src="https://www.youtube.com/embed/z8dtaum_Xu0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </span>
          <span class="language-pt">
            <iframe width="450" height="290" src="https://www.youtube.com/embed/WbmyZV07IRs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </span>
        </div>

        <p style="font-size: 12px; margin-top: 30px">
          <span class="language-en">
            Notes:
          </span>
          <span class="language-pt">
            Notas:
          </span>
          <br>
          <span class="language-en">
            1. All data collected in this questionnaire will be treated anonymously and confidentially, not being used for commercial purposes or assigned to third parties.
          </span>
          <span class="language-pt">
            1. Todos os dados recolhidos neste questionário serão tratados de forma anónima e confidencial, não sendo utilizados para fins comerciais ou cedidos a terceiros.
          </span>
          <br>
          <span class="language-en">
            2. For more information or questions about this study, please contact us using the following email address: msbarros.gis@gmail.com (Matheus Barros).
          </span>
          <span class="language-pt">
            2. Se pretender esclarecer alguma dúvida ou pedir informações extras sobre este estudo poderá contactar-nos através do email: msbarros.gis@gmail.com (Matheus Barros).
          </span>
            <br>
          </p>

        </div> <!--/.modal-body -->
        <div class="modal-footer" style="border:none;">
          <div class="container-fluid">
            <div class="row">
              <div class="col" style="text-align:center;padding-top: 8px; font-size: 13px;">
                <label style="cursor:pointer;">
                  <input type="checkbox" name="cbxAgreement" style="cursor:pointer;">
                  <span class="language-en">I agree to take part in the above study.</span>
                  <span class="language-pt">Eu aceito a participar do estudo mencionado acima.</span>
                </label>
              </div>
              <div class="col-4">
              <div style="text-align:right;">
                <button type="button" id="btn_close_modal_intro" class="btn btn-primary btn-next" style="height:auto;width:auto;font-size:12px;">
                  <span class="language-en">Start</span>
                  <span class="language-pt">Começar</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  Logos  -->
      <div class="container-fluid">
        <div class="row" style="text-align:left;margin-top:-10px;">
          <div class="col">
            <hr />
            <span class="language-en">Partner Universities:</span>
            <span class="language-pt">Universidades Parceiras:</span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div style="padding-top: 18px;"><img src="<?php  echo $root_directory?>resources/images/uni/mundus.png" id="logo_mundus" alt="Nova IMS"></div>
          </div>
          <div class="col">
            <div><img src="<?php  echo $root_directory?>resources/images/uni/novaims.png" id="logo_nova" alt="Nova IMS"></div>
          </div>
          <div class="col">
            <div><img src="<?php  echo $root_directory?>resources/images/uni/wwu.png" id="logo_munster" alt="Münster"></div>
          </div>
          <div class="col">
            <div><img src="<?php  echo $root_directory?>resources/images/uni/uji.png" id="logo_uji" alt="UJI"></div>
          </div>
        </div>
      </div>
    </div> <!--/.modal-content -->
  </div> <!--/.modal-dialog -->
</div>  <!--/.modal -->


<!-- ###############  Div that contains the sidebar ############### -->
<div id="sidebar_div" class="leaflet-sidebar collapsed">
  <!-- Nav tabs -->
  <div id="sidebarTab_div" class="leaflet-sidebar-tabs">
    <ul id="sidebarTab_top" class="sidebarTab_ul" role="tablist">
      <li><a href="#home" role="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#foo0" role="tab"><i class="fa fa-thumbs-up"></i></a></li>
      <li><a href="#foo1" role="tab"><i class="fa fa-thumbs-down"></i></a></li>
      <!-- <li><a href="#foo2" role="tab"><i class="fa fa-thumbs-down"></i></a></li>
      <li><a href="#foo3" role="tab"><i class="fa fa-thumbs-up"></i></a></li>
      <li><a href="#foo4" role="tab"><i class="fa fa-thumbs-down"></i></a></li>
      <li><a href="#foo5" role="tab"><i class="fa fa-thumbs-down"></i></a></li> -->
    </ul>
    <ul id="sidebarTab_bottom" class="sidebarTab_ul" role="tablist">
      <li><a href="#info" role="tab"><i class="fa fa-info-circle"></i></a></li>
    </ul>
  </div>
  <!-- Tab panes -->
  <div class="leaflet-sidebar-content">
    <div class="leaflet-sidebar-pane" id="home"> </div>
    <div class="leaflet-sidebar-pane" id="info"> </div>
    <div class="leaflet-sidebar-pane" id="foo0"> </div>
    <div class="leaflet-sidebar-pane" id="foo1"> </div>
    <!-- <div class="leaflet-sidebar-pane" id="foo2"> </div>
    <div class="leaflet-sidebar-pane" id="foo3"> </div>
    <div class="leaflet-sidebar-pane" id="foo4"> </div>
    <div class="leaflet-sidebar-pane" id="foo5"> </div> -->
  </div>
</div>

<div id="mapdiv" class="col-md-12"></div>

<script>
var mymap, IsMobileDevice, isPortrait, isIE, cookie_lang, checkedValue, map_original_center;
var LyrAOI, baselayers, basemap_osm, basemap_mapbox, basemap_Gterrain, basemap_Gimagery, basemap_GimageHybrid, basemap_WorldImagery, Hydda_RoadsAndLabels;
var access_number, siteLang, minimumZoom, ctlSidebar, ctlAttribute;
//  ********* Increment the column in the DB *********
incrementColumn("cnt_access_app");

setTimeout(function() {
  if(getCookie("user_id") != "") window.location.href = 'map/eimg_draw.php';
}, 2000);

$(document).ready(function(){
  //  ********* Map Initialization *********
  loadBasemaps();
  minimumZoom = IsMobileDevice ? 10 : 11;
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

  map_original_center = [mymap.getCenter().lat, mymap.getCenter().lng ]
  setTimeout(changeMap, 2000);
  setInterval(changeMap, 10000);

  if(getCookie("time_appinit") == "") setCookie("time_appinit",new Date().getTime(),1);

}); //END $(document).ready()

// Receive true if the application is being used in Mobile device, false otherwise
IsMobileDevice = (((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) ? true : false);
if(IsMobileDevice){
  if("orientation" in screen) {
    var orientation_str = screen.orientation.type;
    var orientation_array = orientation_str.split("-");
    // Receive true if the application is being used in portrait mode, false otherwise
    isPortrait = ((orientation_array[0] == "portrait") ? true : false);
  }
}
// Receive true if Internet Explorer, false otherwise
isIE = ((window.navigator.userAgent.indexOf("MSIE ") > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) ? true : false);
console.log(isIE);

cookie_lang = getCookie("app_language");
console.log(cookie_lang);
if(cookie_lang!=""){
  $("input[type=radio][name=language_switch][value='"+cookie_lang+"']").prop("checked",true);
}else{
  $("input[type=radio][name=language_switch][value='pt']").prop("checked",true);
}
// Needs to open before hiding the text
$('#modal_1_intro').modal('show');
checkedValue = $('input[type=radio][name=language_switch]:checked').val();
// Set cookie
setCookie("app_language", checkedValue, 1);
hideText(checkedValue);

if (!isPortrait){
  document.getElementById("message_mobile").style.display="none";
}
if (!isIE){
  document.getElementById("message_ie").style.display="none";
}

function changeMap() {
  var eft = existentFooTabs();
  for (var i = 0; i < eft.length; i++) {
    deleteTabByID(eft[i]);
  }
  foo0 = {
    id: 'foo0',
    tab: '<i class="fa fa-thumbs-down"></i>',
    button: function (event) { console.log(event); }
  }
  foo1 = {
    id: 'foo1',
    tab: '<i class="fa fa-thumbs-up"></i>',
    button: function (event) { console.log(event); }
  }
  foo2 = {
    id: 'foo2',
    tab: '<i class="fa fa-thumbs-down"></i>',
    button: function (event) { console.log(event); }
  }
  foo3 = {
    id: 'foo3',
    tab: '<i class="fa fa-thumbs-up"></i>',
    button: function (event) { console.log(event); }
  }
  foo4 = {
    id: 'foo4',
    tab: '<i class="fa fa-thumbs-down"></i>',
    button: function (event) { console.log(event); }
  }
  foo5 = {
    id: 'foo5',
    tab: '<i class="fa fa-thumbs-up"></i>',
    button: function (event) { console.log(event); }
  }

  var randomNumber = Math.floor(Math.random() * 6);
  var arrayTabs = [foo0,foo1,foo2,foo3,foo4,foo5];
  for (var i=0; i<=randomNumber; i++) {
    ctlSidebar.addPanel(arrayTabs[i]);
  }

  // console.log( map_original_center[0]+(Math.random() * 0.0001) );
  // console.log(Math.floor(Math.random() * 2)+14 );

  mymap.setView(new L.LatLng(map_original_center[0]+(Math.random() * 0.03), map_original_center[1]+(Math.random() * 0.03)), Math.floor(Math.random() * 2)+14 );
}

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
function resetCookies(cookieNames) {
  // Cookies for the whole session:
  var cookieNames = ["user_id", "demographics_finished", "app_finished", "type_interview", "app_language", "time_appinit"];
  for(var i=0; i<cookieNames.length;i++){
    setCookie(cookieNames[i], "", -10);
  }
  setCookie("time_appinit", new Date().getTime() , 1);
}

function cbxLangChange(value){
  resetCookies();
  setCookie("app_language", value, 1);
  hideText(value);
}

function hideText(value){
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

//  # Analytics
function incrementColumn(columnName) {
  $.ajax({
    url:'<?php  echo $root_directory?>general/increment_column_value.php',
    data: {
      column: columnName
    },
    type:'POST',
    success:function(response){
      var column_num_access = JSON.parse(response);
      access_number = column_num_access[columnName];
    },
    error: function(xhr, status, error){ console.log("ERROR: "+error); }
  }); // End ajax
}

$("#btn_close_modal_intro").on("click", function () {
  var statuscbx = $('input[type=checkbox][name=cbxAgreement]').prop('checked');
  if(statuscbx){
    setCookie("user_id", access_number, 1);

    setCookie("type_interview", <?php echo $type_interview; ?> , 1);


    $('#modal_1_intro').modal('hide');
    window.location.href = 'map/eimg_draw.php';
  }else{
    if(siteLang=="en") var str = "You need to agree with the terms and conditions before proceed";
    if(siteLang=="pt") var str = "Você precisa concordar com os termos e condições antes de prosseguir";
    alert(str);
  }

});
$('input[type=radio][name=language_switch]').change(function() {
  cbxLangChange(this.value);
});

function loadStudyArea(){
  /* DESCRIPTION: Adds the Study area, comprises of 12 freguesias:
   * Estrela, Misericórdia, Santa Maria Maior, São Vicente, Penha de França, Beato,
   * Arroios, Santo António, Campo de Ourique, Campolide, Avenidas Novas, Areeiro  */
  $.ajax({
    url:'map/eimg_get_dbtable.php',
    data: {
      type_op: "data",
      tbl: "study_area_4326",
      select:"*"
    },
    type:'POST',
    success:function(response){
      // console.log(response);
      var layer = JSON.parse(response);
      // console.log(layer);
      LyrAOI_coords = layer.features[0].geometry.coordinates;
      LyrAOI=L.geoJSON(layer);
      var lyr_bounds = LyrAOI.getBounds();
      var value = 0.03;
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
    error: function(xhr, status, error){ console.log("ERROR: "+error); }
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
  // basemap_Gimagery = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
  //   subdomains:['mt0','mt1','mt2','mt3']
  // });
  basemap_GimageHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    subdomains:['mt0','mt1','mt2','mt3']
  });
  // basemap_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
  //   attribution: '&copy;<a href="https://www.esri.com/en-us/home">Esri</a>'
  // });
  // Hydda_RoadsAndLabels = L.tileLayer('https://{s}.tile.openstreetmap.se/hydda/roads_and_labels/{z}/{x}/{y}.png', {
  //   name: 'overlay',
  // });

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
}

function deleteTabByID(id, close_sidebar){
  /* DESCRIPTION: Deletes the tab based on the href that was passed
  ### If no href was passed it means that  a 'Remove Area' button inside a 'liked' or 'disliked' tab was clicked.
  ### Therefore this tab will be deleted tab was clicked. Therefore, this tab will be removed*/
  var href = "#"+id

  //Search for all the "li" elements of the "sidebarTab_div" and remove the one which has
  var lis = document.querySelectorAll('#sidebarTab_div li');
  for(var i=0; li=lis[i]; i++) {
    //console.log( li.getElementsByTagName("a")[0].getAttribute("href") );
    if( li.getElementsByTagName("a")[0].getAttribute("href") == href ){
      li.parentNode.removeChild(li);
    }
  }
  //Remove the "div" element whose id == href.
  $( "div" ).remove( href );
};//END deleteTabByHref()
function existentFooTabs(){
  /* DESCRIPTION: returns all existentTabs
  ### Data entry example: href = "#temp_tab"  */
  var array_tabs = [];
  var lis = document.querySelectorAll('#sidebarTab_div li');
  for(var i=0; li=lis[i]; i++) {
    //console.log( li.getElementsByTagName("a")[0].getAttribute("href") );
    var tab = li.getElementsByTagName("a")[0].getAttribute("href")
    tab = tab.substring(1, tab.length); //returns ex: "temp_tab"
    if (tab.substring(0, 3) == 'foo') array_tabs.push(tab);
  }
  return array_tabs
};//END existentTabs()
</script>

</body>
</html>
