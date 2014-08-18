<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller{
	function __construct(){
		parent::__construct();
        // Load Model
		$this->load->model('frontpage/Model_member');
		$this->load->model('frontpage/Model_product');
		$this->load->model('frontpage/Model_article');
		$this->load->model('frontpage/Model_transaction');
		// Load Profile Function
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		if($result == FALSE or !isset($result) or $result == 0){?>
        	<meta http-equiv="refresh" content="0; url=<?php echo base_url('')?>">
        <?php
		}
	}
	function index(){
		redirect(base_url('memberare/history/view_all'));
	}
	function view_all(){
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Transaction\'s History - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('View Transactions',base_url('memberarea/history/view_all'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/history/view_all'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_transaction_member();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_transaction_member($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->Model_transaction->count_transaction_member(); // Make a variable (array) link so the view can call the variable
		
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/history",$data);
	}
	function cicilan(){
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','History Cicilan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Transactions',base_url('memberarea/history/view_all'));
        $this->breadcrumb->append_crumb('Cicilan',base_url('memberarea/history/cicilan'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/history/cicilan'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_cicilan();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 5; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 5; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_cicilan($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/cicilan",$data);
	}
	function view_cicilan(){
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','History Cicilan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Cicilan',base_url('memberarea/history/cicilan'));
        $this->breadcrumb->append_crumb('View',base_url('memberarea/history/view_cicilan'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		
		// Ngeload list transaksi
		$id = $this->uri->segment(4);
		$data['results'] = $this->Model_transaction->fetch_cicilan_detail(); // fetch data using limit and pagination
		$detail = $this->Model_transaction->fetch_cicilan_detail(); // fetch data using limit and pagination
		$data['total_rows'] = $this->Model_transaction->count_cicilan_detail(); // Make a variable (array) link so the view can call the variable
		$results = $this->Model_transaction->get_cicilan($id);
		$data['harga_beli'] = $results['harga_pas_beli'];
		$data['gram'] = $results['gram'];
		$data['name'] = $results['name'];
		$data['produk'] = $results['name_product'];
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/view_cicilan",$data);
	}
	function celengan(){
		$var = $this->Model_setting->setting();
		$data['count'] = $this->Model_transaction->count_celengan();
		// Menentukan Variable
		$this->template->set('title','History Celengan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Celengan Emas',base_url('memberarea/history/view_cicilan'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$count = $this->Model_transaction->count_celengan();
		if($count == 0) redirect(base_url('module/intro_celengan_emas'));
		$data['results_saldo'] = $this->Model_transaction->get_celengan();
		$data['results_celengan'] = $this->Model_transaction->fetch_celengan_detail(5,0); // fetch data using limit and pagination
		$data['results_emas'] = $this->Model_transaction->fetch_celengan_emas(5,0); // fetch data using limit and pagination
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/celengan",$data);
	}
	function celengan_detail(){
		$var = $this->Model_setting->setting();
		$data['count'] = $this->Model_transaction->count_celengan();
		// Menentukan Variable
		$this->template->set('title','History Celengan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Celengan Emas',base_url('memberarea/history/view_cicilan'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$count = $this->Model_transaction->count_celengan();
		if($count == 0) redirect(base_url('module/intro_celengan_emas'));
		$data['results_saldo'] = $this->Model_transaction->get_celengan();
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/history/celengan_detail'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_celengan_detail();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_celengan_detail($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/celengan_detail",$data);
	}
	function celengan_emas(){
		$var = $this->Model_setting->setting();
		$data['count'] = $this->Model_transaction->count_celengan();
		// Menentukan Variable
		$this->template->set('title','History Celengan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Celengan Emas',base_url('memberarea/history/view_cicilan'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['harga_beli'] = $this->Model_transaction->get_lm_beli();
		$data['results_saldo'] = $this->Model_transaction->get_celengan();
		$count = $this->Model_transaction->count_celengan();
		if($count == 0) redirect(base_url('module/intro_celengan_emas'));
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/history/celengan_emas'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_celengan_emas();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_celengan_emas($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/celengan_emas",$data);
	}
	// Simpan
	function simpan(){
		$var = $this->Model_setting->setting();
		$data['count'] = $this->Model_transaction->count_simpan();
		// Menentukan Variable
		$this->template->set('title','History Program Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Program Simpan',base_url('memberarea/history/simpan'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['harga_beli'] = $this->Model_transaction->get_lm_beli();
		$data['results_saldo'] = $this->Model_transaction->get_simpan();
		
		$count = $this->Model_transaction->count_simpan();
		if($count == 0) redirect(base_url('module/intro_simpan_pinjam'));
		$data['simpan'] = $this->Model_transaction->get_simpan();
		
		$data['simpan_detail'] = $this->Model_transaction->fetch_simpan_detail(5,0);
		$data['simpan_emas'] = $this->Model_transaction->fetch_simpan_emas(5,0);
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/simpan",$data);
	}
	function simpan_emas(){
		$var = $this->Model_setting->setting();
		$data['count'] = $this->Model_transaction->count_simpan();
		// Menentukan Variable
		$this->template->set('title','History Program Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Program Simpan',base_url('memberarea/history/simpan'));
        $this->breadcrumb->append_crumb('Simpan Emas',base_url('memberarea/history/simpan_emas'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['harga_beli'] = $this->Model_transaction->get_lm_beli();
		$data['results_saldo'] = $this->Model_transaction->get_simpan();
		
		$count = $this->Model_transaction->count_simpan();
		if($count == 0) redirect(base_url('module/intro_simpan_pinjam'));
		$data['simpan'] = $this->Model_transaction->get_simpan();
		
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/history/simpan_emas'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_simpan_emas();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_simpan_emas($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/simpan_emas",$data);
	}
	function simpan_detail(){
		$var = $this->Model_setting->setting();
		$data['count'] = $this->Model_transaction->count_simpan();
		// Menentukan Variable
		$this->template->set('title','History Program Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Program Simpan',base_url('memberarea/history/simpan'));
        $this->breadcrumb->append_crumb('Simpan Detail',base_url('memberarea/history/simpan_detail'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['harga_beli'] = $this->Model_transaction->get_lm_beli();
		$data['results_saldo'] = $this->Model_transaction->get_simpan();
		
		$count = $this->Model_transaction->count_simpan();
		if($count == 0) redirect(base_url('module/intro_simpan_pinjam'));
		$data['simpan'] = $this->Model_transaction->get_simpan();
		
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/history/simpan_detail'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_simpan_detail();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_simpan_detail($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/simpan_detail",$data);
	}
	function sell(){
		$var = $this->Model_setting->setting();
		// Menentukan Variable
		$this->template->set('title','History Jual Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Program Simpan',base_url('memberarea/history/simpan'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['harga_beli'] = $this->Model_transaction->get_lm_beli();
		$data['results_saldo'] = $this->Model_transaction->get_celengan();
		
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/history/sell'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_jual();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_jual($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/view_jual",$data);
	}
	function gadai(){
		$var = $this->Model_setting->setting();
		// Menentukan Variable
		$this->template->set('title','History Gadai - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('History Gadai',base_url('memberarea/history/gadai'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['harga_beli'] = $this->Model_transaction->get_lm_beli();
		$data['results_saldo'] = $this->Model_transaction->get_celengan();
		
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/history/celengan_emas'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_gadai();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_gadai($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/gadai",$data);
	}
	function print_cash(){
		$id = $this->uri->segment(4);
		$this->Model_transaction->print_cash($id);
	}
}