<style>
.ratezelf {
	display:inline-block;
	opacity:0.3;
}
.ratezelf:hover{
	opacity:0.6;
}


</style>


<?php

echo '<div onclick="ster1opacity();" id="1ster" class="ratezelf"><img width="60px" height="60px"
src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>'; 
echo '<div onclick="ster2opacity();" id="2ster" class="ratezelf"><img width="60px" height="60px"
src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>'; 			
echo '<div onclick="ster3opacity();" id="3ster" class="ratezelf"><img width="60px" height="60px"
src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>'; 
echo '<div onclick="ster4opacity();" id="4ster" class="ratezelf"><img width="60px" height="60px"
src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>'; 
echo '<div onclick="ster5opacity();" id="5ster" class="ratezelf"><img width="60px" height="60px"
src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>'; 





?>

<script>
function ster1opacity(){
		document.getElementById("1ster").style.opacity = "1";
		document.getElementById("2ster").style.opacity = "0.3";
		document.getElementById("3ster").style.opacity = "0.3";
		document.getElementById("4ster").style.opacity = "0.3";
		document.getElementById("5ster").style.opacity = "0.3";
        
}
function ster2opacity(){
		document.getElementById("1ster").style.opacity = "1";
		document.getElementById("2ster").style.opacity = "1";
		document.getElementById("3ster").style.opacity = "0.3";
		document.getElementById("4ster").style.opacity = "0.3";
		document.getElementById("5ster").style.opacity = "0.3";
        
}
function ster3opacity(){
		document.getElementById("1ster").style.opacity = "1";
		document.getElementById("2ster").style.opacity = "1";
		document.getElementById("3ster").style.opacity = "1";
		document.getElementById("4ster").style.opacity = "0.3";
		document.getElementById("5ster").style.opacity = "0.3";
        
}
function ster4opacity(){
		document.getElementById("1ster").style.opacity = "1";
		document.getElementById("2ster").style.opacity = "1";
		document.getElementById("3ster").style.opacity = "1";
		document.getElementById("4ster").style.opacity = "1";
		document.getElementById("5ster").style.opacity = "0.3";
        
}
function ster5opacity(){
		document.getElementById("1ster").style.opacity = "1";
		document.getElementById("2ster").style.opacity = "1";
		document.getElementById("3ster").style.opacity = "1";
		document.getElementById("4ster").style.opacity = "1";
		document.getElementById("5ster").style.opacity = "1";
        
}







</script>