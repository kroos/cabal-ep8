<?php
	function portc($ip, $port)
		{
			return @fsockopen($ip, $port, $errnum, $errtext, 5);
			fclose();
		}
?>