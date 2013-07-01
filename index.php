<?php
	include 'Vector.php';
	$coords = array(1, 2);
	$u = new Vector($coords);

	$v = new Vector($coords);

	$w = new Vector($coords);

	$s = $u->add($v->add($w));

	echo $s->toString();