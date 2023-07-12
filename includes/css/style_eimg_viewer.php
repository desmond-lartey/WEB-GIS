<style>
  /* ### CSS for some elements of the document */
  html,body {
    /* background-color: #f6d8ac; */
    background: url("<?php  echo $root_directory?>resources/images/eimg_logo_1.png");
    background-size: auto 30%;
    background-repeat: no-repeat;
      background-position: center;
    height: 100%;
    margin: 0px;
    padding: 0px
  }

  #header {
    /* height: 75px; */
    height:4vh;
    background-color: #2a6592;
    color: white;
  }
  /* NEEDTO: There will be no header and footer all the information will be added to the map */
  #mapdiv {
    /* height: 650px; */
    height:100vh;
  }


  /* ****************** CSS for the LeafletToolTip of eimg_viewer ****************** */
  .tooltipstyle-green {
    font-size:14px;
    font-weight: 700;
    background: #ccffcc;
    border-color: #ccffcc;
    /* ffcccc */
    /* ccccff */
    /* fillColor: none;
    fillOpacity: 0;
    background-color: none;
    border-color: none;
    background: none;
    border: none;
    box-shadow: none; */
    margin: 0px;
    padding: 0px;
  }
  .tooltipstyle-blue {
    font-size:14px;
    font-weight: 700;
    background: #ccccff;
    border-color: #ccccff;
    margin: 0px;
    padding: 0px;
  }
  .tooltipstyle-red {
    font-size:14px;
    font-weight: 700;
    background: #ffcccc;
    border-color: #ffcccc;
    margin: 0px;
    padding: 0px;
  }

  .fa-thumbs-up {
    color: green;
  }

  .fa-thumbs-down {
    color: red;
  }


  .leaflet-sidebar-content{
    background-color: rgba(256, 256, 256, 0.7);
  }
  .leaflet-sidebar{
    /* width: 20%; */
  }
  .leaflet-sidebar-tabs{
    /* background-color: rgba(0, 172, 237, 0.8); */
  }
  .sidebar_tab_icon_liked{
    background-color: rgba(0, 256, 0, 0.2);
  }
  .sidebar_tab_icon_disliked{
    background-color: rgba(256, 0, 0, 0.2);
  }
  .tab_separator{
    background-color: rgba(0,0,0,0.6);
  }


  .col-xs-12, .col-xs-6, .col-xs-4 {
    padding: 3px;
  }

  /* ****************** CSS for the Modal DIV ****************** */
  /* The Modal (background) */
  .modal {
    /* This is what makes everything greyed out when the modal content is displayed */
    /* Makes the modal on top of the sidebar */
    z-index: 2001; /* Sit on top */
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    display: none; /* Hidden by default */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  /* Modal Content */
  .modal-content {
    color: saddlebrown;
    padding: 20px;
    margin-top: 5%;
    background-color:antiquewhite;
    height:80%;
    /* When the text displayed in the modal content is greater than 80% of the height it will add a scroll bar in the y position */
    overflow-y:auto;
  }
</style>
