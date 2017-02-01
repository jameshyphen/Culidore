<?php
for($xrec=0;$xrec<6;$xrec++){
	
			echo "
			$(document).ready(function(){
				$('#rec".$xrec."').click(function(){</br>
					$('.logintje').slideUp('fast');</br>
					$('.registratie').slideUp('fast');</br>
					$('.venster').fadeOut('fast');</br>
					$('.recepttoevoegen').slideUp('fast');</br>
					$('.gelogged').fadeOut('fast');</br>
					$('#xrec".$xrec."').fadeToggle('fast');</br>
					});</br>
				});</br></br> ";
}





?>