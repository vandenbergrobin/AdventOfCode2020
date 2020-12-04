<?php 

include('source.php');

$exploded_source = explode('

', $source);

$passports = [];

foreach($exploded_source as $key => $item) {
	$item = str_replace("
", " ", $item);
	$item = str_replace("  ", " ", $item);
	$things = explode(" ", $item);
	
	$parsed_passports = [];
	foreach($things as $thing) {
		$pre = substr($thing, 0, 3);
		$thing = str_replace(":", "", $thing);
		$parsed_passports[$pre] = $thing;
	}
	$passports[] = $parsed_passports;
}


$count = 0;
foreach($passports as $key => $passport) {
	if( count($passport) === 8) {
		$count++;
	}
	if( count($passport) === 7) {
		if( !array_key_exists('cid', $passport) ){ 
			$count++;
		}
	}
}

echo "Number of valid passports: ". $count;