<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('frontpage/Model_product');
		$this->load->model('frontpage/Model_article');
		$this->load->model('frontpage/Model_member');
		$this->load->model('Model_captcha');
	}
	
	function member()
	{
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Register Member - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
                //  menambahkan breadcrumbs
                $this->breadcrumb->append_crumb("Home", base_url());
                $this->breadcrumb->append_crumb('Registrasi',base_url());
				$this->breadcrumb->append_crumb('Registrasi Member',base_url());
				
                $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		//$data['result_product'] = $this->Model_product->fetch_product_home(5,0);
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		//$data['result_logam_mulia'] = $this->Model_product->fetch_logam_mulia();		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		$data['username'] = $this->Model_member->getLogData();
		
		
		
		// Load Profile Function
		if($data['loginstat']==1){ redirect(base_url()); }
		
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/member/register",$data);
	}
	
	function index()
	{
		redirect(base_url('register/member'));
	}
}