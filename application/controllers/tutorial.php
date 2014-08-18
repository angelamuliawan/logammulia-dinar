<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tutorial extends CI_Controller
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
	$this->template->set('title','Cara Transaksi - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Cara Transaksi',base_url('tutorial'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_simpan'];
	
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/tutorial/index",$data);
	}
	
	function buy_gold()
	{
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Cara Transaksi - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Cara Transaksi',base_url('tutorial'));
	$this->breadcrumb->append_crumb('Buy Gold',base_url('tutorial/buy_gold'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_simpan'];
	
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/tutorial/buy_gold",$data);
	}
	function sell_gold(){
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Cara Transaksi - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Cara Transaksi',base_url('tutorial'));
	$this->breadcrumb->append_crumb('Sell Gold',base_url('tutorial/buy_gold'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_simpan'];
	
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/tutorial/sell_gold",$data);
	}
	function cicilan(){
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Cara Transaksi - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Cara Transaksi',base_url('tutorial'));
	$this->breadcrumb->append_crumb('Cicilan',base_url('tutorial/cicilan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_simpan'];
	
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/tutorial/cicilan",$data);
	}
	function simpan(){
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Cara Transaksi - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Cara Transaksi',base_url('tutorial'));
	$this->breadcrumb->append_crumb('Simpan',base_url('tutorial/simpan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_simpan'];
	
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/tutorial/simpan",$data);
	}
	
	function celengan(){
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Cara Transaksi - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Cara Transaksi',base_url('tutorial'));
	$this->breadcrumb->append_crumb('Celengan',base_url('tutorial/simpan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_simpan'];
	
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/tutorial/celengan",$data);
	}
	function gadai(){
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Cara Transaksi - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Cara Transaksi',base_url('tutorial'));
	$this->breadcrumb->append_crumb('Celengan',base_url('tutorial/simpan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_simpan'];
	
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/tutorial/gadai",$data);
	}
}