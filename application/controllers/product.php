<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('frontpage/Model_product');
		$this->load->model('frontpage/Model_article');
		$this->load->model('frontpage/Model_member');
    }
	
	//simulasi produk
	function simulation(){
		// Load Default Setting Website
        $var = $this->Model_setting->setting();
		$this->template->set('title','Simulasi Cicilan - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
		$this->breadcrumb->append_crumb('Simulation',base_url(''));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['regis'] = $this->Model_member->getRegData();
		
		//Ambil data dari inputan
		$data['id_produk'] = $this->input->post('produk');
		$data['jangka_waktu'] = $this->input->post('waktu');
		$data['produk'] = $this->Model_product->get_product($data['id_produk']);
		$data['cicilan_pokok'] = $this->Model_product->count_cicilan($data['produk']['sell_price'], $data['jangka_waktu']);
		$data['margin'] = $var['margin_default'];
		if($data['id_produk']=="" || $data['jangka_waktu']==""){redirect(base_url());}
		
        $this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/simulation",$data);
		
	}
    function index(){
        redirect(base_url('product/view_all'));
    }
	// lihat daftar harga jual
    function view_all(){
        // Load Default Setting Website
        $var = $this->Model_setting->setting();
	$this->template->set('title','Buy Gold - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
	$this->breadcrumb->append_crumb('Buy Gold',base_url('product/view_all'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        // Ngeload Product View
        $data['result_product'] = $this->Model_product->fetch_product_home(20,0);
		
		//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
        $this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/view_all",$data);
    }
	function sell(){
		// Load Default Setting Website
        $var = $this->Model_setting->setting();
	$this->template->set('title','Sell Gold - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
	
	  //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
	$this->breadcrumb->append_crumb('Sell Gold',base_url('product/sell'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload Product View
        $data['result_product'] = $this->Model_product->fetch_buy_price(5,0);
		//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
        $this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/buy_price",$data);
	}
	function order(){
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Harga Jual - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
	
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
	$this->breadcrumb->append_crumb('Order',base_url('product/order'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Load Product yang diminta
	$id_product = $this->uri->segment(3);
	$result = $this->Model_product->get_product($id_product);
    $data['name_product'] = $result['name_product'];
    $data['stock'] = $result['stock'];
    $data['sell_price'] = $result['sell_price'];
    $data['desc'] = $result['description_product'];
	$data['sort'] = $result['sort_order'];
	$data['image'] = $result['image_product'];
	
	//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	
	if($result == 0 || $result == false) redirect(base_url('product/view_all'));
	$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/order",$data);
    }
	function order_confirmation(){
	// Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','Order Confirmation - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
	
	// menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
	$this->breadcrumb->append_crumb('Order',base_url('product/order'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Load Product yang diminta
	$id_product = $this->uri->segment(3);
	$result_product = $this->Model_product->get_product($id_product);
    $data['name_product'] = $result_product['name_product'];
    $data['stock'] = $result_product['stock'];
    $data['sell_price'] = $result_product['sell_price'];
	$data['image'] = $result_product['image_product'];
	
	// Session
	$data['msg'] = $this->Model_member->getUpdData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['username'] = $this->Model_member->getLogData();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	
	if($data['loginstat'] == 1){
	// ambil data user kalo misalnya udah login
	$result = $this->Model_setting->get_session_member($data['session']['tgs_username_member']);
	$data['nama'] = $result['name'];
	$data['email'] = $result['email'];
	$data['no_hp'] = $result['no_hp'];
	$data['address'] = $result['address'];
	$data['no_rek'] = $result['account_number'];
	$data['an'] = $result['atas_nama'];
	$data['session'] = $this->Model_member->getMemberSession();
	}
	if($result_product == 0 || $result_product == false) redirect(base_url('product/view_all'));
	
	$this->load->library('form_validation');
	// set rules
	$config = array(
				array(
					'field' => 'qty',
					'label' => 'Quantity',
					'rules' => 'numeric|required|xss_clean',
				),
				array(
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required|xss_clean',
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'valid_email|required|xss_clean',
				),
				array(
					'field' => 'no_hp',
					'label' => 'Phone Number',
					'rules' => 'numeric|required|xss_clean',
				),
				array(
					'field' => 'address',
					'label' => 'Address',
					'rules' => 'required|xss_clean',
				),
				array(
					'field' => 'no_rek',
					'label' => 'Nomor Rekening',
					'rules' => 'numeric|required|xss_clean',
				),
				array(
					'field' => 'an',
					'label' => 'Atas Nama Rekening',
					'rules' => 'required|xss_clean',
				),
				array(
					'field' => 'shipping',
					'label' => 'Metode Shipping',
					'rules' => 'required|xss_clean',
				),
				array(
					'field' => 'date',
					'label' => 'Tanggal Dikirim',
					'rules' => 'xss_clean|required',
				),
			);
	$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
		$data['error'] = $this->session->flashdata('error');
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/order_confirmation",$data);
		}
		else{
			// save data
			$data['result'] = $this->Model_product->save_order();
			if($this->session->flashdata('error') != ""){
				$data['error'] = $this->session->flashdata('error');
				$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/order_confirmation",$data);
			}
			else{
			// order berhasil
				$data = array(
						'nama' => $this->session->userdata('nama'),
						'email' => $this->session->userdata('email'),
						'no_hp' => $this->session->userdata('no_hp'),
						'produk' => $this->session->userdata('produk'),
						'harga' => $this->session->userdata('harga'),
						'qty' => $this->session->userdata('qty'),
						'total' => $this->session->userdata('total'),
						'alamat' => $this->session->userdata('alamat'),
						'no_rek' => $this->session->userdata('no_rek'),
						'an' => $this->session->userdata('an'),
						'shipping' => $this->session->userdata('shipping'),
						'code_order' => $this->session->userdata('code_order'),
						'msg' =>  $this->Model_member->getUpdData(),
						'username' => $this->Model_member->getLogData(),
						'session' => $this->Model_member->getMemberSession(),
						'loginstat' => $this->Model_member->isValidSession($data['session']),
						'result_news'  => $this->Model_article->fetch_article_active(4,0),
						'bank' => $this->Model_product->rekening_bank(),
				);
				$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/order_finish",$data);
			}
		}
	}
	function confirmation(){
		// Load Default Setting Website
        $var = $this->Model_setting->setting();
		$this->template->set('title','Konfirmasi Pembayaran - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
		$this->breadcrumb->append_crumb('Konfirmasi Pembayaran',base_url(''));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['regis'] = $this->Model_member->getRegData();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('code','Order Code','required');
		if($this->form_validation->run() == FALSE)
        $this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/confirmation",$data);
		else{
			$result = $this->Model_product->confirmation_payment();
			$data['bank'] = $this->Model_product->rekening_bank();
			if($result == FALSE){
				$this->session->set_flashdata('order_confirm',TRUE);
				$data['result'] = $this->Model_product->confirmation_payment_nonmember();
				$data['type'] = 1;
			}
			else{
				$this->session->set_flashdata('order_confirm',TRUE);
				$data['result'] = $this->Model_product->confirmation_payment();
				$data['type'] = 2;
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules('bank','Bank Name','required');
			if($this->form_validation->run() == FALSE)
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/confirmation_payment",$data);
			else{
				$data['save'] = $this->Model_product->save_confirmation();
				$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/confirmation_finish",$data);
			}
		}
	}
	function confirmation_finish(){
		// Load Default Setting Website
        $var = $this->Model_setting->setting();
		$this->template->set('title','Konfirmasi Pembayaran - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
		$this->breadcrumb->append_crumb('Konfirmasi Pembayaran',base_url(''));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['regis'] = $this->Model_member->getRegData();
		
		$this->Model_product->save_confirmation();
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/confirmation_finish",$data);
	}
	function quick_buy(){
		// Load Default Setting Website
        $var = $this->Model_setting->setting();
		$this->template->set('title','Quick Buy - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
		$this->breadcrumb->append_crumb('Quick Buy',base_url('product/quick_buy'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['regis'] = $this->Model_member->getRegData();
		
		$data['product'] = $this->Model_product->fetch_product_home(20,0);
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/quick_buy",$data);
	}
	
	function sell_gold(){
	// Load Default Setting Website
        $var = $this->Model_setting->setting();
		$this->template->set('title','Sell Gold - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Home", base_url());
		$this->breadcrumb->append_crumb('Product',base_url('product/view_all'));
		$this->breadcrumb->append_crumb('Sell',base_url('product/quick_buy'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		//Session
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['regis'] = $this->Model_member->getRegData();
		
		$id = $this->uri->segment(3);
		$data['result'] = $this->Model_product->get_product_sell($id);
		$data['product'] = $this->Model_product->fetch_product_home(20,0);
		
		// Load Profile Function
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		
        if($result == FALSE) redirect(base_url('product/sell'));
        
		$this->load->library('form_validation');
		$this->form_validation->set_rules('qty','Qty','required|numeric');
        $this->form_validation->set_rules('shipping','Shipping Method','required');
        $this->form_validation->set_rules('date','Tanggal Dikirim / Diambil','required');
		if($this->form_validation->run() == FALSE)
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/sell",$data);
		else{
			$data['sell'] = $this->Model_product->sell_gold();
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/product/sell",$data);
		}
	}
}