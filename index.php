<?php
	echo '<pre>';
	include 'Vector.php';
	$u = new Vector(1, 2, 3);
	$v = new Vector(3, 2, 5);
	$w = new Vector($u->multiply(-2)->coordinates);

	$a = $u->add($w);
	$s = $u->subtract($v);
	$dot = $u->dot($a);
	$sm = $u->multiply(9);
	$l = $u->length();
	$unit = $u->unit();
	$angle1 = $u->angle($v, true);
	$angle2 = $u->angle($v);


	echo "{$u}\t+\t{$w} \t= {$a} \n\n";
	echo "{$u}\t-\t{$v} \t= {$s} \n\n";
	echo "{$u}\t&sdot;\t{$a} \t= {$dot} \n\n";
	echo "\t9\t\t*\t{$u} \t= {$sm} \n\n";
	echo "{$u}\t&ang;\t{$v} \t= {$angle1} deg \n";
	echo "{$u}\t&ang;\t{$v} \t= {$angle2} rad \n\n\n";
	echo "\t\tLength of {$u}\t\t= {$l}\n\n";
	echo "\t\tUnit of {$u}\t\t= {$unit}";