<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultation extends CI_Controller{
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
		if($result == FALSE) redirect(base_url());
	}
	function index(){
		redirect(base_url('memberarea/consultation/view_all'));
	}
	function view_all(){
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Konsultasi - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Konsultasi',base_url('memberarea/history/view_all'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		
		// Ngeload list transaksi
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'memberarea/consultation/view_all'; // configurate link pagination
		$config['total_rows'] = $this->Model_transaction->count_consultation();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$config['full_tag_open'] = '<div class=\'pagination\'>';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['results'] = $this->Model_transaction->fetch_consultation($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->Model_transaction->count_consultation(); // Make a variable (array) link so the view can call the variable
		
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/consultation",$data);
	}
	function add_new(){
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Kirim Konsultasi - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Konsultasi',base_url('memberarea/consultation/view_all'));
        $this->breadcrumb->append_crumb('Kirim Konsultasi',base_url('memberarea/consultation/add_new'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('subject','Consultation\'s Subject','required|xss_clean');
		$this->form_validation->set_rules('isi','Consultation\'s Contain','required|xss_clean');
		if($this->form_validation->run() == FALSE)
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/send_consultation",$data);
		else{
			$this->Model_transaction->add_consultation();	// save data
			redirect(base_url('memberarea/consultation/view_all'));
		}
	}
	function read(){
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Baca Konsultasi - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
        //  menambahkan breadcrumbs
        $this->breadcrumb->append_crumb("Home", base_url());
        $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
        $this->breadcrumb->append_crumb('Konsultasi',base_url('memberarea/consultation/view_all'));
        $this->breadcrumb->append_crumb('Baca Konsultasi',base_url('memberarea/consultation/add_new'));
        $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		$id = $this->uri->segment(4);
		$data['result'] = $this->Model_transaction->get_transaction($id);
		$data['result2'] = $this->Model_transaction->get_transaction_reply($id);
		if($id == "" || $data['result'] == FALSE) redirect(base_url('memberarea/consultation/view_all'));
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/transaction/read_consultation",$data);
	}
}