<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Debug helper
 * 
 * Print clear and easy readable data only in development environment
 * 
 * @category	Helpers 
 * @author      Ahmad Samiei  <ahmad.samiei@gmail.com>
 * @version		1.0
 */

// ------------------------------------------------------------------------

/**
 * Easy to debug & trace with benchmark option
 * 
 * @uses	call debug_profile() where you want start benchmark in your code 
 * 			-then call debug($data, TRUE) to get result with benchmark.
 * 
 * @author	Ahmad Samiei <ahmad.samiei@gmail.com>
 * @access	public
 * @param	mixed		input data
 * @param	boolean		enable benchmark
 * @return	void		printed	data
 */
if ( ! function_exists('debug'))
{
	function debug($data = NULL, $benchmark = FALSE)
	{
	    if (ENVIRONMENT === 'production')
	    {
	        return null;
	    }
		
		if ( ! empty($benchmark))
		{
			$ci =& get_instance();
			$ci->benchmark->mark('debug_end');
			echo '<div style="background:#000;color:#fff;position:fixed;top:0px;left:0px;width:100%; padding:20px; font-size: 14px">Elapsed time (benchmark): '	. $ci->benchmark->elapsed_time('debug_start', 'debug_end') . '</div><div style="padding-top:50px;">';
		}
		
		echo '<pre>';
		if ((is_object($data) || is_array($data)) && ! function_exists('xdebug_call_function') )
		{
			// in default print_r is more clear for array/object
			print_r($data);
		}
		else
		{
			// if not array/object var_dump is better and is more detailed (for example in when data is boolean !)
			// or when xdebug installed it can style var_dump in output automatically
			$html_errors = (int) ini_get('html_errors');
            if (empty($html_errors))
            {
                ini_set('html_errors', 1);
            }
			var_dump($data);
            ini_set('html_errors', $html_errors);
		}	
		echo '</pre>';
		
		if ( ! empty($benchmark))
		{
			echo '</div>';
		}
		
		exit;	
	}
}

// ------------------------------------------------------------------------

/**
 * Start flag to make benchmark for debug function
 * 
 * You can use it before your function call ! and debug the function result with benchmark it.
 * 
 * @author	Ahmad Samiei <ahmad.samiei@gmail.com>
 * @access	public
 * @return	void
 */
if ( ! function_exists('debug_profile'))
{
	function debug_profile()
	{
	    if (ENVIRONMENT === 'production')
	    {
	        return null;
	    }
	    
		$ci =& get_instance();
		$ci->benchmark->mark('debug_start');
	}
}

// ------------------------------------------------------------------------

/**
 * Alternative for above debug() function
 * 
 * @author	Ahmad Samiei <ahmad.samiei@gmail.com>
 * @access	public
 * @param	mixed		input data
 * @param	boolean		enable benchmark
 * @return	void		printed	data
 */
if ( ! function_exists('print_d'))
{
	function print_d($data = NULL, $benchmark = FALSE)
	{
		debug($data, $benchmark);
	}
}

// ------------------------------------------------------------------------

/* End of file debug_helper.php */
/* Location: ./application/helpers/debug_helper.php */