<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
    }
    /*
     *  == Meload Halaman Dashboard dan Login ==
     *  Terdiri dari 2 function :
     *      - index : untuk Admin Dashboard
     *      - login : untuk Login ke Halaman Admin Panel
    */
    function index(){
    // Load Default Setting
    $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Admin Panel Dashboard - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
    //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Dashboard','dashboard');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        $data = array(
                'login_admin' => $this->session->userdata('login_admin'),
                );
    //  meload article
    // Ngeload artikel
        $this->load->model("admin/Model_article");
        $this->load->model("admin/Model_transaction");
        $data['results'] = $this->Model_article->fetch_article(5,0); // fetch data using limit and pagination
		$data['total_rows'] = $this->Model_article->count_article(); // Make a variable (array) link so the view can call the variable
        $data['comment'] = $this->Model_article->fetch_comment(5,0); // fetch data using limit and pagination
		$data['total_comment'] = $this->Model_article->count_comment(); // Make a variable (array) link so the view can call the variable
        $data['results_consultation'] = $this->Model_transaction->fetch_consultation(5,0); // fetch data using limit and pagination
        /* Validasi User sudah Login atau belum */
        if($data['login_admin'] == FALSE){
          redirect(base_url().'adminpanel');
        }
        
        /*
         *  Meload View
         *  Yang dikiri meload theme adminnya
         *  Yang dikanan meload script untuk dipakai di variable contents di View File
         * */
        $this->template->load('theme/admintheme/index','theme/admintheme/template/main/dashboard',$data);
    }
    function login(){
        // Form Validation Buat Login
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>'); // Set Style Alert Warning
        
         // Load Default Setting
            $var = $this->Model_setting->setting();
            $title = $var['title_website'];
            $footer = $var['footer'];
             $this->template->set('title','Admin Panel - '.$title);
             $this->template->set('footer',$footer);
             $data = array(
                    'login_admin' => $this->session->userdata('login_admin'),
                    );
            /* Validasi User sudah Login atau belum */
            if($data['login_admin'] == TRUE){
                redirect(base_url().'adminpanel/dashboard');
            }
            
             // add breadcrumbs
            $this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
            $this->breadcrumb->append_crumb('Login','dashboard');
            $this->template->set('breadcrumbs',$this->breadcrumb->output());
            
            /*
            *  Meload View
            *  Yang dikiri meload theme adminnya
            *  Yang dikanan meload script untuk dipakai di variable contents di View File
            * */
            
        if($this->form_validation->run() == FALSE){
            $this->template->load('theme/admintheme/index','theme/admintheme/template/main/login',$data);
        }
        else{
            $username = $this->input->post('username');
	    $password = $this->input->post('password');
	    $admin_login = $this->Model_setting->admin_login($username, $password);
            if($admin_login == TRUE){
                $session_data = array  
		    (  
			'id_admin' => $admin_login['id_administrator'], // ngambil id admin dari database
                        'permission_admin' => $admin_login['admin_permission'],
			'login_admin' => TRUE,  // Set data login_admin = True
		    );
		    $this->session->set_userdata($session_data); // Menset session data
                    redirect(base_url()."adminpanel/dashboard"); // Mendirect ke halaman adminpanel
            }
            else{
                // Load Default Setting
                $this->template->load('theme/admintheme/index','theme/admintheme/template/main/login');
            }
        }
    }
}