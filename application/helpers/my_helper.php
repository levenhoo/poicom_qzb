<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('loadScript'))
{
	function loadScript()
	{	
		$script = '
		<script type="text/javascript" src="/js/jquery.min.js"></script> 
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>';	 
		echo $script;
	} 
}

if ( ! function_exists('loadStyle'))
{
	function loadStyle()
	{
		$css ='<link rel="stylesheet" type="text/css" media="all" href="/css/bootstrap.min.css" />';

		echo $css;
	}
}







