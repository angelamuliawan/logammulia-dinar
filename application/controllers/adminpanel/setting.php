<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller{
    function __construct(){
        parent::__construct();
	if(!$this->session->userdata('login_admin')){
            redirect(base_url('adminpanel'));
        }
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>'); // Set Style Alert Warning
    }
    function index(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$data['footer'] = $var['footer'];
	$data['desc'] = $var['description_website'];
	$data['rek'] = $var['no_account'];
	$data['favicon'] = $var['fav_icon'];
	$data['email'] = $var['email_website'];
	$data['margin'] = $var['margin_default']; // biaya titip cicilan
	$data['titip_gadai'] = $var['biaya_titip_gadai'];
	$data['cicilan'] = $var['administrasi_cicilan'];
	$this->template->set('title','Setting - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Configuration','dashboard');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	 if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
	$config = array(
		    array(
			'field' => 'title',
			'label' => 'Title Website',  
			'rules' => 'required|xss_clean',
		    ),
		    array(
			'field' => 'no_rek',
			'label' => 'Rekening Bank',  
			'rules' => 'required|numeric|xss_clean',
		    ),
		    array(
			'field' => 'desc',
			'label' => 'Description Website',  
			'rules' => 'xss_clean',
		    ),
		    array(
			'field' => 'favicon',
			'label' => 'Favicon',  
			'rules' => 'xss_clean',
		    ),
		    array(
			'field' => 'email',
			'label' => 'Email Default Website',  
			'rules' => 'required|valid_email|xss_clean',
		    ),
		    array(
			'field' => 'footer',
			'label' => 'Footer',  
			'rules' => 'required|xss_clean',
		    ),
		    array(
			'field' => 'margin',
			'label' => 'Biaya Titip Cicilan',  
			'rules' => 'required|xss_clean|numeric',
		    ),
		    array(
			'field' => 'gadai',
			'label' => 'Biaya Titip Gadai',  
			'rules' => 'required|xss_clean|numeric',
		    ),
			array(
			'field' => 'cicilan',
			'label' => 'Biaya Administrasi Cicilan',  
			'rules' => 'required|xss_clean|numeric',
		    ),
		);
	$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/configuration',$data);
		}
		else{
			$this->Model_setting->save_setting(); // save data
			$data['url_redirect'] = base_url().'adminpanel/setting';
			$this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_add',$data);
		}
	}
	else{
		$this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
	}
    }
	function bank(){
		$this->load->model('admin/Model_product');
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$data['footer'] = $var['footer'];
		$this->template->set('title','Manage Bank - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Configuration',base_url('adminpanel/setting'));
		$this->breadcrumb->append_crumb('Manage Bank',base_url('adminpanel/setting/bank'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// Ngeload data
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'adminpanel/setting/bank'; // configurate link pagination
		$config['total_rows'] = $this->Model_product->count_bank();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['bank'] = $this->Model_product->rekening_bank($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->Model_product->count_bank(); // Make a variable (array) link so the view can call the variable
			if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/manage_bank',$data);
		}
		else{
		$this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
		}
	}
	function add_bank(){
		$this->load->model('admin/Model_product');
		$this->load->library('form_validation');
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$data['footer'] = $var['footer'];
		$this->template->set('title','Add Bank - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Configuration',base_url('adminpanel/setting'));
		$this->breadcrumb->append_crumb('Bank',base_url('adminpanel/setting/bank'));
		$this->breadcrumb->append_crumb('Add',base_url('adminpanel/setting/add_bank'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		$config = array(
		    array(
			'field' => 'nama',
			'label' => 'Nama Bank',  
			'rules' => 'required|xss_clean',
		    ),
		    array(
			'field' => 'no_rek',
			'label' => 'Nomor Rekening',  
			'rules' => 'required|xss_clean|numeric',
		    ),
		    array(
			'field' => 'atas_nama',
			'label' => 'Atas Nama',  
			'rules' => 'required|xss_clean',
		    ),
		);
		$this->form_validation->set_rules($config);
		if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
			if($this->form_validation->run() == FALSE){
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/add_bank',$data);
			}
			else{
				$this->Model_product->save_rekening(); // save data
				redirect(base_url('adminpanel/setting/bank'));
			}
		}
		else{
		$this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
		}
	}
	function edit_bank(){
		$this->load->model('admin/Model_product');
		$this->load->library('form_validation');
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$data['footer'] = $var['footer'];
		$this->template->set('title','Edit Bank - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Configuration',base_url('adminpanel/setting'));
		$this->breadcrumb->append_crumb('Bank',base_url('adminpanel/setting/bank'));
		$this->breadcrumb->append_crumb('Edit',base_url('adminpanel/setting/edit_bank'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		$config = array(
		    array(
			'field' => 'nama',
			'label' => 'Nama Bank',  
			'rules' => 'required|xss_clean',
		    ),
		    array(
			'field' => 'no_rek',
			'label' => 'Nomor Rekening',  
			'rules' => 'required|xss_clean|numeric',
		    ),
		    array(
			'field' => 'atas_nama',
			'label' => 'Atas Nama',  
			'rules' => 'required|xss_clean',
		    ),
		);
		$this->form_validation->set_rules($config);
		$id = $this->uri->segment(4);
		$data['result'] = $this->Model_product->get_bank($id);
		if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
			if($this->form_validation->run() == FALSE){
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/edit_bank',$data);
			}
			else{
				$this->Model_product->edit_rekening(); // save data
				redirect(base_url('adminpanel/setting/bank'));
			}
		}
		else{
		$this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
		}
	}
	function delete_bank(){
		$id = $this->uri->segment(4);
		$this->db->where('id_rekening_bank',$id);
		$this->db->delete('rekening_bank');
		redirect(base_url('adminpanel/setting/bank'));
	}
    function links(){
	// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$data['footer'] = $var['footer'];
		$this->template->set('title','Manage Links - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Configuration',base_url('adminpanel/setting'));
		$this->breadcrumb->append_crumb('Manage Links',base_url('adminpanel/setting/links'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		// Ngeload data
		$this->load->library('pagination'); // load libraray pagination
		$config['base_url'] = base_url() . 'adminpanel/setting/bank'; // configurate link pagination
		$config['total_rows'] = $this->Model_setting->count_links();// fetch total record in databae using load model_user and count_user function
		$config['per_page'] = 10; // Total data in one page
		$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
		$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
		$config['num_links'] = round($choice); // Rounding Choice Variable
		$this->pagination->initialize($config); // intialize var config
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		$data['bank'] = $this->Model_setting->fetch_links($config['per_page'],$page); // fetch data using limit and pagination
		$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		$data['total_rows'] = $this->Model_setting->count_links(); // Make a variable (array) link so the view can call the variable
			if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
				$this->template->load('theme/admintheme/index','theme/admintheme/template/main/manage_links',$data);
			}
			else{
				$this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
			}
	}
	function add_links(){
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$data['footer'] = $var['footer'];
		$this->template->set('title','Add Links - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Configuration',base_url('adminpanel/setting'));
		$this->breadcrumb->append_crumb('Manage Links',base_url('adminpanel/setting/links'));
		$this->breadcrumb->append_crumb('Add',base_url('adminpanel/setting/add_links'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$this->load->library('form_validation');
		$config = array(
					array(
						'field' => 'title',
						'label' => 'Title Links',
						'rules' => 'required'
					),
					array(
						'field' => 'links',
						'label' => 'Links',
						'rules' => 'required'
					),
					array(
						'field' => 'sort',
						'label' => 'Sort Order',
						'rules' => 'required|numeric'
					),
					array(
						'field' => 'status',
						'label' => 'status Links',
						'rules' => 'required'
					),
				);
		$this->form_validation->set_rules($config);
		if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
			if($this->form_validation->run()==FALSE){
				$this->template->load('theme/admintheme/index','theme/admintheme/template/main/add_links',$data);
			}
			else{
				//save links
				$this->Model_setting->save_links();
				redirect(base_url('adminpanel/setting/links'));
			}
		}
		else{
				$this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
			}
	}
	function edit_links(){
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$data['footer'] = $var['footer'];
		$this->template->set('title','Edit Links - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Configuration',base_url('adminpanel/setting'));
		$this->breadcrumb->append_crumb('Manage Links',base_url('adminpanel/setting/links'));
		$this->breadcrumb->append_crumb('Edit',base_url('adminpanel/setting/add_links'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$this->load->library('form_validation');
		$config = array(
					array(
						'field' => 'title',
						'label' => 'Title Links',
						'rules' => 'required'
					),
					array(
						'field' => 'links',
						'label' => 'Links',
						'rules' => 'required'
					),
					array(
						'field' => 'sort',
						'label' => 'Sort Order',
						'rules' => 'required|numeric'
					),
					array(
						'field' => 'status',
						'label' => 'status Links',
						'rules' => 'required'
					),
				);
		$this->form_validation->set_rules($config);
		$data['links'] = $this->Model_setting->get_links();
		if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
			if($this->form_validation->run()==FALSE){
				$this->template->load('theme/admintheme/index','theme/admintheme/template/main/edit_links',$data);
			}
			else{
				//save links
				$this->Model_setting->edit_links();
				redirect(base_url('adminpanel/setting/links'));
			}
		}
		else{
				$this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
			}
	}
	function logout(){  
        $data = array(
	    'login_admin' => FALSE,
            'id_admin' => 0,
        );
        $this->session->sess_destroy();
        $this->session->unset_userdata($data);
        redirect(base_url().'adminpanel');
    }
}