<?php

function append($filename,$stringToWrite){
	$handle = fopen($filename, "a");
	fwrite($handle,$stringToWrite);
	fclose($handle);
}

function safe($string){
	return htmlspecialchars(strip_tags($string));
}

function inputHas($key){
	return isset($_REQUEST[$key]);
}

//value at key
function inputGet($key, $default = 0){
	if (inputHas($key)){
		return $_REQUEST[$key];
	} else {
		return $default;
	}
}

//escape hacker input
function escape($input){
	if(!is_string($input)){
		return false;
	} else {
		return safe($string);
	}
}