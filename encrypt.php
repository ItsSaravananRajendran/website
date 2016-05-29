<?php
$from_signup_Password="abdc21";
$enc='';
$temp=str_split($from_signup_Password);
	foreach ($temp as $newtemp)
	{
		$enc=$enc.(ord($newtemp)+20);
	}
	echo $enc;
	?>