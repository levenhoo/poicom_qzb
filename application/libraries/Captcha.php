<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Captcha
{    
    function Captcha()
    {
        $this->CI = & get_instance();
    }

    /**
     * 显示验证码
     *
     */
    function show()
    {
		mt_srand((double)microtime()*1000000);
		$seccode = mt_rand(10000, 99999);
		$this->CI->session->set_userdata('auth_code', $seccode);
		header("Content-Type: image/png");
		$im = imagecreate(60, 22) or die('Image create error!');
		$bgcolor = imagecolorallocate($im,  255, 255, 255);
		$fontcolor = imagecolorallocate($im, 150, 150, 150);
		$linecolor = imagecolorallocate($im,  255, 255, 255);
		$bordercolor = imagecolorallocate($im, 150, 150, 150);
		// Grid
		for($x=10; $x <= 100; $x+=10)
		imageline($im, $x, 0, $x, 50, $linecolor);
		// Middleline
		imageline($im, 0, 9, 100, 9, $linecolor);
		// Border
		imageline($im, 0, 0, 0, 50, $bordercolor);
		imageline($im, 0, 0, 100, 0, $bordercolor);
		imageline($im, 0, 21, 100, 21, $bordercolor);
		imageline($im, 59, 0, 59, 21, $bordercolor);
		imagestring($im, 5, 8, 1, $seccode, $fontcolor);
		imagepng($im);
		imagedestroy($im);
    }
    

    /**
     * 检查验证码是否正确
     *
     * @param string $auth_code
     * @return bool
     */
    function check($auth_code = null)
    {
		if($this->CI->session->userdata('auth_code')==$auth_code){
			return true;
		}else{
			return false;
		}
    }
}

