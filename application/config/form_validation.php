<?php //if (!defined('BASEPATH')) exit('No direct script access allowed');
// class form_validation extends CI_Form_validation {
	function alpha_dash_space($str)
	{
	    return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}
// }
?>