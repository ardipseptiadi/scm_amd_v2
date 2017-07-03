<?php
function peramalan()
{
	$alpha = 0.1;
	$xt = 37100;
	$ft = 37100;
	
	$hasil = ( $alpha * $xt )+( 1 - $alpha ) * $ft;
}
?>