<?php
//the name of the file is indicated to the extend of the native date helper
#############################################################################################################################
//cabal time
///*
		function cabal_time($time)
			{
				$z = fmod($time, 60);
				$x = $time - $z;
				$l = $x / 60;
				return $l.' hours and '.$z.' minutes';
			}

//*/
#############################################################################################################################

?>