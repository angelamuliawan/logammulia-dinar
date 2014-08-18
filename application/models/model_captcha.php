<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_captcha extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function getCaptchaCode()
	{
		return $this->session->userdata('kode_captcha');
	}
	
	function setCaptchaCode($word)
	{
		$this->session->unset_userdata('kode_captcha');
		$this->session->set_userdata('kode_captcha', $word);
	}
	
	function checkCaptcha($input)
	{
		if($input == $this->getCaptchaCode()){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	 function createCaptcha()
	{
		$vals = array(
		'img_path' => './captcha/',
		'img_url' => base_url().'captcha/',
		'font_path' => './font/timesbd.ttf',
		'img_width' => '150',
		'img_height' => 30,
		'expiration' => 1
		);
		$cap = create_captcha($vals);
		return $cap;
	}
}