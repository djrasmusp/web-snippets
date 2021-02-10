<?php
function multiply($weight, $number) {
	return $weight * $number;
}

function Check_CVR ($CVR)
{
	if ($CVR == False) return;
	$cvrarray = str_split((string) $CVR);
	$controlNumber = array_pop($cvrarray);
	$weights = array(2, 7, 6, 5, 4, 3, 2);
	$Sum = array_sum(array_map('multiply', $weights, $cvrarray));

	$Remainder = $Sum % 11;
	$Last_Digit = (11 - $Remainder) % 11;

	$CVR_Correct = ($Last_Digit == $controlNumber);
	return $CVR_Correct;
}
