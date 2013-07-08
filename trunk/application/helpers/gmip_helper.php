<?php
function gmip($int) {
	$z = fmod($int, 16777216);
	$a = ($int - $z) / 16777216;
	//return $a;

	$y = fmod($z, 65536);
	$b = ($z - $y) / 65536;
	//return $a.'.'.$b;

	$x = fmod($y, 256);
	$c = ($y - $x) / 256;

	$w = fmod($x, 1);
	$d = ($x - $w);
	return $a.'.'.$b.'.'.$c.'.'.$d;
}
?>