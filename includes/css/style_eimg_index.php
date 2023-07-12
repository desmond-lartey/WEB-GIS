<style>

/* input {
  position: absolute;
  left: -9999px;
} */

.demographics {
  /* display: inline-block;
  position: relative; */
  width: 100%;
  /* margin: 5px; */
  padding: 10px 10px 10px 0px;
  background-color: #505050
  color: white;
  /* font-size: 18px; */
  white-space: nowrap;
  cursor: pointer;
}

/*
label:hover, label:active {
   background: #303030;
}

label::before {
  content: '';
  display: none;
  position: absolute;
  top: 10px;
  left: 10px;
  width: 18px;
  height: 18px;
  border: 2px solid #fff;
  background-color: #505050
}

input:focus + label {
  outline: 1px solid #00f;
  background-color: #505050
}

input:checked + label::before {
  background-color: #c00;
} */

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
p{
  font-size: 14px;
}

#header {
  /* height: 75px; */
  height:4vh;
  background-color: #2a6592;
  color: white;
}
input[type="checkbox"].cbxsidebar{
  cursor: pointer;
  width: 18px;
  height: 18px;
  padding: 0;
  margin:0;
  vertical-align: bottom;
  position: relative;
  top: -5px;
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
#logo_mundus{
	width: 60px;
	margin-bottom: 15px;
	margin-right: 15px;
	margin-left: 15px;
}
#logo_nova{
	height: 50px;
  width: auto;
	margin-bottom: 15px;
	margin-right: 15px;
	margin-left: 15px;
}
#logo_munster{
	width: 100px;
	margin-bottom: 15px;
	margin-right: 15px;
	margin-left: 15px;
}
#logo_uji{
	width: 50px;
	margin-bottom: 15px;
	margin-right: 15px;
	margin-left: 15px;
}

.survey_sus{

}


</style>
