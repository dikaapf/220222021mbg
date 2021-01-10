<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	     $CI =& get_instance();
		 $CI->load->database();
		 
		 $results = $CI->config->item('email_settings')->mandrill_api_key;
			
		 
$config['mandrill_api_key'] = 'b684bf308e1dde93f5483330fac49074-us7';
 