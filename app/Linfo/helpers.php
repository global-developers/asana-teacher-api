<?php

/**
 * This file is part of Linfo (c) 2010 Joseph Gillotti.
 * 
 * Linfo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Linfo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Linfo.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!function_exists('locate_actual_path'))
{
	/**
	 * Certain files, specifcally the pci/usb ids files, vary in location from
	 * linux distro to linux distro. This function, when passed an array of
	 * possible file location, picks the first it finds and returns it. When
	 * none are found, it returns false
	 *
	 * @param string $path
	 * @return boolean|string
	 */
	function locate_actual_path($paths) {
		
		// Make absolutely sure that's an array
		$paths = (array) $paths;

		$num_paths = count($paths);
		for ($i = 0; $i < $num_paths; $i++)
			if (is_file($paths[$i]))
				return $paths[$i];

		return false;
	}
}

if (!function_exists('array_append_string'))
{
	/**
	 * Append a string to the end of each element in a 2d array
	 *
	 * @param array $array
	 * @param string $string
	 * @param string $format 
	 * @return array $array
	 */
	function array_append_string($array, $string = '', $format = '%1s%2s') {

		// Get to it
		foreach ($array as $k => $v)
			$array[$k] = is_string($v) ? sprintf($format, $v, $string) : $v;
		
		// Give
		return $array;
	}
}

if (!function_exists('get_int_from_file'))
{
	/**
	 * Get a file who's contents should just be an int. Returns zero on failure.
	 *
	 * @param string $file 
	 * @return boolean|int
	 */
	function get_int_from_file($file) {
		if (!file_exists($file))
			return 0;

		if (!($contents = @file_get_contents($file)))
			return 0;

		$int = trim($contents);

		return $int;
	}
}

if (!function_exists('byte_convert'))
{
	/**
	 * Convert bytes to stuff like KB MB GB TB etc
	 *
	 * @param int $size
	 * @param int $precision
	 * @return string
	 */
	function byte_convert($size, $precision = 2) {
		
		// Grab these
		global $settings;

		// Sanity check
		if (!is_numeric($size))
			return '?';
		
		// Get the notation
		$notation = $settings['byte_notation'] == 1000 ? 1000: 1024;

		// Fixes large disk size overflow issue
		// Found at http://www.php.net/manual/en/function.disk-free-space.php#81207
		$types = array('B', 'KB', 'MB', 'GB', 'TB');
		$types_i = array('B', 'KiB', 'MiB', 'GiB', 'TiB');
		for($i = 0; $size >= $notation && $i < (count($types) -1 ); $size /= $notation, $i++);
		return(round($size, $precision) . ' ' . ($notation == 1000 ? $types[$i] : $types_i[$i]));
	}
}

if (!function_exists('seconds_convert'))
{
	/**
	 * Like above, but for seconds
	 *
	 * @param int $uptime
	 * @return string
	 */
	function seconds_convert($uptime) {
		
		// Method here heavily based on freebsd's uptime source
		$uptime += $uptime > 60 ? 30 : 0;
		$years = floor($uptime / 31556926);
		$uptime %= 31556926;
		$days = floor($uptime / 86400);
		$uptime %= 86400;
		$hours = floor($uptime / 3600);
		$uptime %= 3600;
		$minutes = floor($uptime / 60);
		$seconds = floor($uptime % 60);

		// Send out formatted string
		$return = array();

		if ($years > 0)
			$return['years'] = $years;

		if ($days > 0)
			$return['days'] = $days;
		
		if ($hours > 0)
			$return['hours'] = $hours;

		if ($minutes > 0)
			$return['minutes'] = $minutes;

		if ($seconds > 0)
			$return['seconds'] = $seconds;

		return $return;
	}
}

if (!function_exists('getContents'))
{
	/**
	 * Get a file's contents, or default to second param
	 *
	 * @param string $file
	 * @param string $default
	 * @return string
	 */
	function getContents($file, $default = '') {
		return !is_file($file) || !is_readable($file) || !($contents = @file_get_contents($file)) ? $default : trim($contents);
	}
}

if (!function_exists('getLines'))
{
	/**
	 * Like above, but in lines instead of a big string
	 *
	 * @param string $file
	 * @return string
	 */
	function getLines($file) {
		return !is_file($file) || !is_readable($file) || !($lines = @file($file, FILE_SKIP_EMPTY_LINES)) ? array() : $lines;
	}
}

if (!function_exists('string_xml_tag_unfuck'))
{
	/**
	 * Make a string safe for being in an xml tag name
	 *
	 * @param string $string
	 * @return string
	 */
	function string_xml_tag_unfuck($string) {
		return strtolower(preg_replace('/([^a-zA-Z]+)/', '_', $string));
	}
}

if (!function_exists('get_var_from_file')) {
	/**
	 * Get a variable from a file. Include it so it doesn't pollute 
	 * the global namespace, and return what we want out of it, if it
	 * actually exists.
	 *
	 * @param $file
	 * @param $variable
	 * @return boolean|string
	 */ 
	function get_var_from_file($file, $variable) {

		// Let's not waste our time, now
		if (!is_file($file))
			return false;

		// Snag that mother fucker!	
		require_once $file;

		// Double dollar sign means treat variable contents 
		// as the name of a variable. 
		if (isset($$variable))
			return $$variable;

		// We fucked up	
		return false;	
	}
}
