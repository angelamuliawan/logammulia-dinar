<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('frontpage/Model_product');
		$this->load->model('frontpage/Model_article');
		$this->load->model('frontpage/Model_member');
	}
	
	function index()
	{
		// Load Default Setting Website
        $var = $this->Model_setting->setting();
		$this->template->set('title','Search Results - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Search',base_url());
	$this->breadcrumb->append_crumb('Search Result',base_url());
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['regis'] = $this->Model_member->getRegData();
		
		//get post
		$word = $this->input->post('txtSearch');
		$data['word'] = $word;
		$data['result'] = $this->Model_article->normal_search_result($word);
		
        $this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/common/search_news",$data);

	}
}