<?php
	include 'Vector.php';
	$coords = array(1, 2, 3);
	$u = new Vector($coords);

	$v = new Vector($coords);

	$w = new Vector($coords);

	$s = $u->add(array($v, $w));

	echo $s->toString();