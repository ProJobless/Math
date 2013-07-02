<?php
	echo '<pre>';
	include 'Vector.php';
	$u = new Vector(1, 2, 3);

	$v = new Vector($u->coordinates);

	$s = $u->add($v)->add($v);
	$dot = $u->dot($s);

	echo $s->toString() . '<br />';
	echo $dot;