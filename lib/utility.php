<?php

/**
 * CSSP - CSS Preprocessor - http://github.com/SirPepe/CSSP
 * Constants and inheritance for CSS
 * 
 * Copyright (C) 2009 Peter Kröner, Christian Schaefer
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Library General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Library General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


/**
 * Plugin register function
 * @param string $hook The plugin hook
 * @param int $priority The execution priority. Higher number = earlier execution
 * @param $function The plugin's mail function
 * @return void
 */
function register_plugin($hook, $priority, $function){
	global $plugins_before_parse, $plugins_before_compile, $plugins_before_glue, $plugins_before_output;
	if($hook == 'before_parse'){
		$plugins_before_parse[$function] = $priority;
	}
	elseif($hook == 'before_compile'){
		$plugins_before_compile[$function] = $priority;
	}
	elseif($hook == 'before_glue'){
		$plugins_before_glue[$function] = $priority;
	}
	elseif($hook == 'before_output'){
		$plugins_before_output[$function] = $priority;
	}
}


/**
 * Stores an error for output if debug level is > 0
 * @param string $error The error message
 * @return void
 */
function add_error($error){
	global $config, $cssp_errors;
	if($config['debug_level'] > 0){
		$cssp_errors[] = $error;
	}
}

?>