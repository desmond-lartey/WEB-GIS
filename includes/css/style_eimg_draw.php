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

	input.range_numberOfClasses, input.radio_typeSymbology, input.cbx_fltAttributes, input.cbx_fltPlaces, input.radio_dataset{
	 display: none;
	}

	#header {
	  /* height: 75px; */
	  height:1vh;
	  background-color: #2a6592;
	  color: white;
	}
	#mapdiv {
	  /* height: 650px; */
	  height:100vh;
	}
	#geocode_panel, #waitToLoad_panel{
    position: absolute;
    top: 10px;
    z-index: 999; /* After the map, before the sidebar*/
    background-color: rgba(255,255,255,0.7);
    padding: 5px;
    border: 1px solid rgba(0,0,0,0.3);
    text-align: center;
    /* font-family: 'Roboto','sans-serif'; */
    line-height: 30px;
    padding-left: 10px;

		left: 50%;
		transform: translate( -50%); /* Centrates the element in the middle of the screen */
  }

	::-webkit-input-placeholder {
	  font-size: 11px;
	}
	::-moz-placeholder {
	  font-size: 11px;
	}
	:-ms-input-placeholder {
	  font-size: 11px;
	}
	::placeholder {
	  font-size: 11px;
	}

	.sidebar_paragraph{
		font-size: 14px;
	}

	#modal_3_sus .modal-dialog {
	  /* width: 100% !important;
	  height: 100%;
	  margin: 0;
	  padding: 0; */
	}
	/* #modal_3_sus .modal-content {
	  height: auto;
	  min-height: 98%;
	} */

	input[type="checkbox"].cbxsidebar{
	  cursor: pointer;
	  width: 18px;
	  height: 18px;
	  padding: 0;
	  margin:0;
	  vertical-align: bottom;
	  position: relative;
	  top: -8px;
	}
	label.cbxsidebar {
	  cursor: pointer;
	  /* display: block; */
	  padding-left: 7px;
	  text-indent: 0px;
	}
	h4{
	  padding: 0;
	  margin-bottom: 3px;
	  font-size: 16px;
	}
	/* Adding some padding in the bootstrap classes  */
	.col-xs-12, .col-xs-6, .col-xs-4 {
	  padding: 3px;
	}

	/* custom Zoom layer leaflet easy button*/
	#mapdiv .easy-button-button{
	  transition-duration: .3s;
	  position: relative;
	  border-radius: 4px;
	  border: solid 0px transparent;
	}
	#mapdiv .easy-button-container{
	  background-color: white;
	}
	#mapdiv .zoom-btn{
	  position: absolute;
	  top: 0;
	  left: 0;
	}
	#mapdiv .easy-button-button.disabled {
	  height: 0;
	}


	/* Table SUS */

	@media screen and (min-width: 1200px) {
		.sus {
			font-size: 16px;
		}
	}
	@media screen and (max-width: 1200px) {
		.sus {
			font-size: 1.4vw;
		}
	}

	.sus input[type='radio']{
		transform: scale(1.7);
	}

	@media only screen and (max-width: 800px) {
		.sus input[type='radio']{
			 transform: scale(1);
		 }
	}

	.sus thead, .sus tbody, .sus tr, .sus td, .sus th { display: block; }
	.sus tr:after {
		content: ' ';
		display: block;
		visibility: hidden;
		clear: both;
	}
	.sus thead th {
		padding: 0;
		margin: 0;
		height: auto;
		border: 1px solid white;
		/*text-align: left;*/
	}
	.sus tbody {
		height: 55vh;
		overflow-y: auto;
	}
	.sus thead{
		/* fallback */
		padding: 0;
		margin: 0;
	}
	.sus_index {
		width: 3%;
		float: left;
	}
	.sus_question {
		padding: 0;
		margin: 0;
		width: 49%;
		float: left;
	}
	.sus_cbx {
		width: 9%;
		float: left;
		/* color:blue; */
		/* fallback */
		vertical-align: middle;
		text-align: center;
	}
	@media screen and (min-width: 1200px) {
		.sus_cbx {
		   font-size: 10px;
		}
	}
	@media screen and (max-width: 1200px) {
		.sus_cbx {
		   font-size: 1vw;
		}
	}

	.modal-footer{
		padding: 0;
		margin: 0;
		padding-bottom: 20px;
	}

	.language-pt{
		display: none;
	}

	.leaflet-control-layers-expanded {
	  padding: 0 5px 0 5px;
	  background-color: rgba(255,255,255,0.9);
	}
	/* custom Zoom layer leaflet easy button*/
	/* .infobox_for_toolbar * {margin: 0; padding: 0;} */
	.infobox_for_toolbar {
	  /* display: block; */
	  visibility: hidden;
	  color: white;
	  background-color: rgba(0, 0, 0, 0.5);
	  opacity: 1;
	  position: absolute;
	  vertical-align: middle;
	  text-align: right;
	  top:0px;
	  z-index: 2000;
	  padding: 1px 5px 1px 5px; /*Top right botton left*/
	  transition: visibility 0.5s linear;
	  margin-top: 0!important;
	  /*margin-left: -145px;
	  width: 140px;*/
	  height: 90px;
	}
	.leaflet-bar.easy-button-container.leaflet-control {
	  text-align: left !important;
	}

	/* ### CSS for the sidebar */
	/* Sidebar content, elements equally spaced. To see better what's going one, comment it out the part of "border: 1px solid gray;" */
	div.sidebarContentParent{
	  padding-top: 5px;
	}


	input[type="text"].sidebarTitle
	{
		color: white;
		padding-left: 5px;
		border-radius: 10px;
		/* border: none; */
		border: 1px solid white;
    background: rgba(255,255,255,0.2);
    height: 30px;
    width: 90%;
	}


	div.sidebarContentChild{
	  /*EXTRACTED FROM:  http://jsfiddle.net/kqHWM/ */
	  display:table;
	  width:100%;
	  table-layout: fixed;
	}
	div.sidebarContentChild span.contenChildSpan{
	  /*EXTRACTED FROM:  http://jsfiddle.net/kqHWM/ */
	  padding: 5px;
	  display:table-cell;
	  text-align:center;
	  /* border: 1px solid gray; */
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
	.sidebar_tab_liked_disliked_clicked{
	  background-color: rgba(0, 116, 217, 1);
	}
	.tab_separator{
	  background-color: rgba(0,0,0,0.6);
	}

	.popupInfo {
	  /* font-size:14px; */
	  /* font-weight: 700; */
	  /* background: #ccccff;
	  border-color: #ccccff; */

	  /* margin: 0px;
	  padding: 0px; */
	  /* padding: 0px;  */
	}
	.leaflet-popup-content-wrapper,
	.leaflet-popup-tip {
	  padding: 0px;
	  margin: -20px;
	  background: rgba(255, 255, 255, 0.85);
	  box-shadow: 0 3px 14px rgba(0,0,0,0.4);
	}
	.leaflet-popup-tip {
	  display: none;
	}

	.svg_legend{
		float:right;
		padding-left: 5px;
	}
	/* ### CSS for changing bootstrap classes  */

	.btn {
		border-radius: 24px;
	}


	.btn-group-sm {
		border-radius: 24px;
	}

	.btn-group-vertical > button{
	  margin:0px !important;
	  padding: 0px !important;
		border-radius: 0px !important;
	}

	label.btn{
		margin-bottom: 0px;
	}

	.btn.disabled {
	  cursor: not-allowed;
	}

	.btn-light{
	    border: 1px solid black !important;
	}

	.btn-light{
		background-color: white;
	}

	.modal {
		z-index: 10001;
	  background-color: rgba(0,0,0,0.4);
	}

	.modal-content {
		z-index: 10001;
	  /* color: saddlebrown; */
	  /* padding: 20px; */

	  /* margin-top: 5%; */
	  /* height:80vh !important; */
	  overflow-y:auto !important;
	}

	div.modal-header-removeclose .close {
	  display:none;
	}


	/* Images & logos */
#image_draw{
	width: auto;
	height: 200px;
}
#image_finish{
	width: auto;
	height: 70px;
}
#image_slider{
	width: auto;
	height: 100px;
}
#logo_place{
	width: 80px;
	margin-bottom: 20px;
	margin-right: 20px;
	margin-left: 20px;
}
#logo_camara{
	width: 70px;
	margin-bottom: 20px;
	margin-right: 20px;
	margin-left: 20px;
}

#logo_geoc{
	width: 100px;
	margin-bottom: 20px;
	margin-right: 20px;
	margin-left: 20px;
}
#logo_marie{
	width: 200px;
	margin-bottom: 20px;
	margin-right: 20px;
	margin-left: 20px;
}
#logo_nova{
	width: 60px;
	margin-bottom: 20px;
	margin-right: 20px;
	margin-left: 20px;
}
#logo_munster{
	width: 200px;
	margin-bottom: 20px;
	margin-right: 20px;
	margin-left: 20px;
}
#logo_uji{
	width: 60px;
	margin-bottom: 20px;
	margin-right: 20px;
	margin-left: 20px;
}

</style>
