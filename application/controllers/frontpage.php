<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontpage extends CI_Controller {

	public function index()
	{
		$this->load->model('frontpage/Model_member');
		$this->load->model('frontpage/Model_product');
		$this->load->model('frontpage/Model_article');
		$this->load->model('Model_captcha');
		$var = $this->Model_setting->setting();
		
		$this->template->set('title','Homepage - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
		
		$data['regis'] = $this->Model_member->getRegData();
		$data['result_product'] = $this->Model_product->fetch_product_home(5,0);
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		$data['result_logam_mulia'] = $this->Model_product->fetch_logam_mulia();
		$data['slideshow'] = $this->Model_article->fetch_slideshow();
		
		// Ngambil data user
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/homepage",$data);
		
	}
	
	
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */