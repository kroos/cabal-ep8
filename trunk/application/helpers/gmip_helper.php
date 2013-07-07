<?php
function gmip($int) {
	$a = ($int - (fmod($int, 16777216))) / 16777216;
	//return $a;

	$b = ($z - (fmod($z, 65536))) / 65536;
	//return $a.'.'.$b;

	$c = ($y - (fmod($y, 256))) / 256;

	$d = ($x - (fmod($x, 1)));
	return $a.'.'.$b.'.'.$c.'.'.$d;
}
?>