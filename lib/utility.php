<?php

/**
 * This file is part of Turbine
 * http://github.com/SirPepe/Turbine
 * 
 * Copyright Peter Kröner
 * Licensed under GNU LGPL 3, see license.txt or http://www.gnu.org/licenses/
 */


/**
 * Utility
 * Shared functionality for plugins and core
 */
class Utility {


/* Color patterns */
public static $hexpattern = '/(#((?:[A-Fa-f0-9]{3})(?:[A-Fa-f0-9]{3})?))/i';
public static $rgbapattern = '/(rgb(?:a)?)\([\s]*([0-9]+%?)[\s]*,[\s]*([0-9]+%?)[\s]*,[\s]*([0-9]+%?)[\s]*(?:,[\s]*([0-1]\.[0-9]*)[\s]*)?\)/i';
public static $hslapattern = '/(hsl(?:a)?)\([\s]*([0-9]+)[\s]*,[\s]*([0-9]+%)[\s]*,[\s]*([0-9]+%)[\s]*(?:,[\s]*([0-1]\.[0-9]*)[\s]*)?\)/i';


/*
 * any2rgba
 * Convert any color declaration to RGBA
 * @param string $input Color input
 * @return array
 */
public static function any2rgba($input){
	if(preg_match(self::$hexpattern, $input, $matches)){
		return self::hex2rgba($input, $matches);
	}
	elseif(preg_match(self::$hslapattern, $input, $matches)){
		return self::hsla2rgba($input, $matches);
	}
	elseif(preg_match(self::$rgbapattern, $input, $matches)){
		return self::rgba2rgba($input, $matches);
	}
	else{
		return false;
	}
}


/*
 * hex2rgba
 * Convert a hex color declaration to RGBA
 * @param string $input Color input
 * @param string $matches [optional] Regex matches for the color pattern
 * @return array $rgba The RGBA array
 */
public static function hex2rgba($input, $matches = array()){
	$rgba = array();
	if(empty($matches)){
		preg_match(self::$hexpattern, $input, $matches);
	}
	return 'Hallo!';
}


/*
 * hsla2rgba
 * Convert a HSL(A) color declaration to RGBA
 * @param string $input Color input
 * @param string $matches [optional] Regex matches for the color pattern
 * @return array $rgba The RGBA array
 */
public static function hsla2rgba($input, $matches = array()){
	$rgba = array();
	if(empty($matches)){
		preg_match(self::$hslapattern, $input, $matches);
	}
	return 'Hallo!';
}


/*
 * hsla2rgba
 * Convert a RGB(A) color declaration to RGBA
 * @param string $input Color input
 * @param string $matches [optional] Regex matches for the color pattern
 * @return array $rgba The RGBA array
 */
public static function rgba2rgba($input, $matches = array()){
	$rgba = array();
	if(empty($matches)){
		preg_match(self::$rgbapattern, $input, $matches);
	}
	$rgba['r'] = (substr($matches[2], -1) == '%') ? round(255 / 100 * $matches[2]) : $matches[2];
	$rgba['g'] = (substr($matches[3], -1) == '%') ? round(255 / 100 * $matches[3]) : $matches[3];
	$rgba['b'] = (substr($matches[4], -1) == '%') ? round(255 / 100 * $matches[4]) : $matches[4];
	$rgba['a'] = (isset($matches[5])) ? $matches[5] : 1;
	return $rgba;
}


}


?>
