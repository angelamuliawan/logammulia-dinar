<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('frontpage/Model_product');
		$this->load->model('frontpage/Model_article');
		$this->load->model('frontpage/Model_member');
		$this->load->model('frontpage/Model_transaction');
    }
	// fungsi simpan
	function intro_simpan_pinjam(){
		// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Program Simpan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
    // menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Program Simpan',base_url('module/intro_simpan_pinjam'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_simpan'];
	
	if($data['loginstat'] == 1){
			$data['count'] = $this->Model_transaction->count_simpan();
			if($data['count'] == 1)
				redirect(base_url('memberarea/history/simpan/'));
		}
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/simpan_pinjam_intro",$data);
	}
	function activate_simpan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		// session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		if($result == FALSE) redirect(base_url('module/intro_celengan_emas'));
		
		// Load Default Setting Website
		$var = $this->Model_setting->setting();
		$this->template->set('title','Activate Program Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		// menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Program Simpan',base_url('memberarea/history/simpan'));
		$this->breadcrumb->append_crumb('Activate Program Simpan ',base_url('module/activate_simpan'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$data['count'] = $this->Model_transaction->count_simpan();
		//activate Celengan
		if($data['count'] == 0)
		$this->Model_transaction->activate_simpan($result['id_user']);
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/activate_simpan",$data);
	}
	function add_simpan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		// session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$count = $this->Model_transaction->count_simpan();
		if($result == FALSE || $count == 0) redirect(base_url('module/intro_simpan_pinjam'));
		
		// Load Default Setting Website
		$var = $this->Model_setting->setting();
		$this->template->set('title','Tambahkan Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		// menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Simpan',base_url('memberarea/history/simpan'));
		$this->breadcrumb->append_crumb('Add Simpan',base_url('module/add_simpan'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$count = $this->Model_transaction->count_simpan();
		$simpan = $this->Model_transaction->get_simpan();
		if($result == FALSE || $count == 0) redirect(base_url('module/intro_simpan_pinjam'));
		if($simpan['status_simpan'] == 2) redirect(base_url('memberarea/history/simpan'));
		if(strtotime("now") > strtotime($simpan['date_akhir'])){
			redirect(base_url('history/simpan'));						
		}
		$data['results_product'] = $this->Model_product->fetch_product_home(20,0);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product','Product Name','required');
		$this->form_validation->set_rules('qty','Qty','required|numeric');
		$data['simpan'] = $this->Model_transaction->get_simpan();
		$data['qty'] = 1;
		$data['product'] = 1;
		if($this->form_validation->run() == FALSE)
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/add_simpan",$data);
		else{
			$data['qty'] = $this->input->post('qty');
			$data['product'] = $this->input->post('product');
			$this->Model_transaction->save_simpan();
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/add_simpan",$data);
		}
	}
	function ambil_simpan(){
		// session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$count = $this->Model_transaction->count_simpan();
		if($data['loginstat'] == 0 || $count == 0) redirect(base_url('module/intro_simpan_pinjam'));
		
		// Load Default Setting Website
		$var = $this->Model_setting->setting();
		$this->template->set('title','Ambil Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		// menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Simpan',base_url('memberarea/history/simpan'));
		$this->breadcrumb->append_crumb('Ambil Simpan',base_url('module/ambil_simpan'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product','Product Name','required|xss_clean');
		$this->form_validation->set_rules('qty','Qty','required|numeric|xss_clean');
		$data['gold'] = $this->Model_transaction->get_gold_simpan();

		$simpan = $this->Model_transaction->get_simpan();
		if(strtotime("now") > strtotime($simpan['date_akhir'])){
			redirect(base_url('history/simpan'));						
		}
		if($this->form_validation->run()==FALSE)
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/ambil_simpan",$data);
		else{
			$data['ambil'] = $this->Model_transaction->ambil_simpan();
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/ambil_simpan",$data);
		}
	}
	// fungsi celengan
	function intro_celengan_emas(){
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Celengan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
    // menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Celengan Emas',base_url('module/intro_celengan_emas'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	$data['intro'] = $var['mou_akad_celengan'];
		if($data['loginstat'] == 1){
			$data['count'] = $this->Model_transaction->count_celengan();
			if($data['count'] > 0) // jika sudah mengaktifkan celengan
			redirect(base_url('memberarea/history/celengan'));
		}
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/celengan_emas_intro",$data);
	}
	function topup_celengan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		// session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$count = $this->Model_transaction->count_celengan();
		if($result == FALSE || $count == 0) redirect(base_url('module/intro_celengan_emas'));
		
		// Load Default Setting Website
		$var = $this->Model_setting->setting();
		$this->template->set('title','Top Up Saldo - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		// menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Celengan Emas',base_url('memberarea/history/celengan'));
		$this->breadcrumb->append_crumb('Top Up Saldo',base_url('module/topup_celengan'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nominal','Nominal','required|numeric');
		if($this->form_validation->run() == FALSE)
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/topup",$data);
		else{
			$result2 = $this->Model_transaction->get_celengan($result['id_user']);
			$id_celengan = $result2['id_celengan'];
			$this->Model_transaction->topup_celengan($id_celengan);
			$data['nominal'] = $this->input->post('nominal');
			$data['bank'] = $this->Model_product->rekening_bank();
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/success_topup",$data);
		}
	}
	function activate_celengan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		// session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		if($result == FALSE) redirect(base_url('module/intro_celengan_emas'));
		
		// Load Default Setting Website
		$var = $this->Model_setting->setting();
		$this->template->set('title','Activate Celengan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		// menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Celengan Emas',base_url('memberarea/history/celengan'));
		$this->breadcrumb->append_crumb('Activate Celengan Emas',base_url('module/activate_celengan'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$data['count'] = $this->Model_transaction->count_celengan();
		//activate Celengan
		if($data['count'] == 0)
		$this->Model_transaction->activate_celengan($result['id_user']);
		
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/activate_celengan",$data);
	}
	function buy_celengan(){
		// Load Default Setting Website
		$var = $this->Model_setting->setting();
		$this->template->set('title','Convert to Gold - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		
		// menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Celengan Emas',base_url('module/intro_celengan_emas'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$count = $this->Model_transaction->count_celengan();		
		if($data['loginstat'] == 0 || $count == 0) redirect(base_url('module/intro_celengan_emas'));
		
		$data['results_saldo'] = $this->Model_transaction->get_celengan();
		$data['results_product'] = $this->Model_product->fetch_product_home(20,0);
		$data['gold'] = $this->input->post('gold');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('gold','Gold','required');
		$this->form_validation->set_rules('qty','Qty','required|numeric');
		if($this->form_validation->run() == FALSE)
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/buy_celengan",$data);
		else{
			$this->Model_transaction->generate_gold();
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/buy_celengan",$data);
		}
	}
	function cairkan_celengan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		// session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$count = $this->Model_transaction->count_celengan();
		if($result == FALSE || $count == 0) redirect(base_url('module/intro_celengan_emas'));
		
		// Load Default Setting Website
		$var = $this->Model_setting->setting();
		$this->template->set('title','Cairkan Saldo - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		// menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Celengan Emas',base_url('memberarea/history/celengan'));
		$this->breadcrumb->append_crumb('Cairkan',base_url('module/topup_celengan'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$data['results_saldo'] = $this->Model_transaction->get_celengan();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nominal','Nominal','required|numeric');
		$data['nominal'] = 200000;
		if($this->form_validation->run() == FALSE)
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/cairkan",$data);
		else{
			$result2 = $this->Model_transaction->get_celengan($result['id_user']);
			$id_celengan = $result2['id_celengan'];
			$data['result'] = $this->Model_transaction->cairkan_celengan($id_celengan);
			$data['nominal'] = $this->input->post('nominal');
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/cairkan",$data);
		}
	}
	function lepas(){
		// Load Default Setting Website
		$var = $this->Model_setting->setting();
		$this->template->set('title','Convert to Rupiah- '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		
		// menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Memberarea',base_url('memberarea/'));
		$this->breadcrumb->append_crumb('Celengan Emas',base_url('memberarea/history/celengan'));
		$this->breadcrumb->append_crumb('Lepas',base_url('module/lepas'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$count = $this->Model_transaction->count_simpan();
		if($data['loginstat'] == 0 || $count == 0) redirect(base_url('module/intro_simpan_pinjam'));
		
		$data['gold'] = $this->Model_transaction->get_gold_celengan();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('qty','Qty','required|numeric|xss_clean');
		if($this->form_validation->run()==FALSE)
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/lepas_celengan",$data);
		else{
			$data['lepas'] = $this->Model_transaction->lepas();
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/module/lepas_celengan",$data);
		}
	}
}