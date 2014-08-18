<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('login_admin')){
            redirect(base_url().'adminpanel');
        }
	$this->load->model('admin/Model_product');
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>'); // Set Style Alert Warning
    }
    function index(){
	redirect(base_url('admin_panel/product/manage_product'));
    }
    // fungsi produk
    function add_product(){
     // Load Default Setting
    $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
    $this->template->set('title','Add New Product - '.$title); // Memberi Judul Halaman Admin
    $this->template->set('footer',$footer); // Memberi Footer
        
    //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url('adminpanel'));
	$this->breadcrumb->append_crumb('product',base_url('adminpanel/product/manage_product'));
        $this->breadcrumb->append_crumb('Add New Product',' ');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	 if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
        $config = array(
                    array(
                      'field' => 'name_product',
                      'label' => 'Name Product',
                      'rules' => 'required|xss_clean|'
                    ),
                    array(
                      'field' => 'stock',
                      'label' => 'Stock',
                      'rules' => 'required|xss_clean|numeric'
                    ),
				array(
						  'field' => 'base_price',
						  'label' => 'Harga Dasar',
						  'rules' => 'required|xss_clean|numeric'
						),
				array(
						  'field' => 'desc',
						  'label' => 'Description',
						  'rules' => 'xss_clean'
						),
				array(
						  'field' => 'sort_order',
						  'label' => 'Sort Order',
						  'rules' => 'numeric|xss_clean'
						),
				array(
						  'field' => 'gram',
						  'label' => 'Berat (gram)',
						  'rules' => 'numeric|xss_clean'
						),
					);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
				/*
				 *  Meload View
				 *  Yang dikiri meload theme adminnya
				 *  Yang dikanan meload script untuk dipakai di variable contents di View File
				 * */
					$this->template->load('theme/admintheme/index','theme/admintheme/template/main/product/add_product');
				}
		else{
			// save data
			$this->Model_product->add_product();
			$data['url_redirect'] = base_url().'adminpanel/product/manage_product';
				$this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
		}
	}
	else{
		$this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
	}
    }
    function manage_product(){
	// Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Manage Product - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url('adminpanel'));
	$this->breadcrumb->append_crumb('Product',base_url('adminpanel/product/manage_product'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        // Ngeload produk
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/product/manage_product'; // configurate link pagination
	$config['total_rows'] = $this->Model_product->count_product();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_product->fetch_product($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_product->count_product(); // Make a variable (array) link so the view can call the variable
        $this->template->load('theme/admintheme/index','theme/admintheme/template/main/product/manage_product',$data);
    }
    function edit_product(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Edit Product - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url('adminpanel'));
	$this->breadcrumb->append_crumb('product',base_url('adminpanel/product/manage_product'));
        $this->breadcrumb->append_crumb('Edit Product',' ');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	$this->load->library('form_validation');
        $config = array(
                    array(
                      'field' => 'name_product',
                      'label' => 'Name Product',
                      'rules' => 'required|xss_clean|'
                    ),
                    array(
                      'field' => 'stock',
                      'label' => 'Stock',
                      'rules' => 'required|xss_clean|numeric'
                    ),
		    array(
                      'field' => 'base_price',
                      'label' => 'Harga Dasar',
                      'rules' => 'required|xss_clean|numeric'
                    ),
		    array(
                      'field' => 'desc',
                      'label' => 'Description',
                      'rules' => 'xss_clean'
                    ),
		    array(
                      'field' => 'sort_order',
                      'label' => 'Sort Order',
                      'rules' => 'numeric|xss_clean'
                    ),
			array(
                      'field' => 'gram',
                      'label' => 'Berat (gram)',
                      'rules' => 'numeric|xss_clean'
                    ),
                );
	$this->form_validation->set_rules($config);
	$id_product = $this->uri->segment(4);
	$result = $this->Model_product->get_product($id_product);
        $data['name_product'] = $result['name_product'];
        $data['stock'] = $result['stock'];
        $data['base_price'] = $result['base_price'];
        $data['desc'] = $result['description_product'];
		$data['gram'] = $result['gram'];
	$data['sort'] = $result['sort_order'];
	if($result == 0 || $result == false) redirect(base_url('adminpanel/product/manage_product'));
	if($this->form_validation->run() == FALSE){
            /*
             *  Meload View
             *  Yang dikiri meload theme adminnya
             *  Yang dikanan meload script untuk dipakai di variable contents di View File
             * */
                $this->template->load('theme/admintheme/index','theme/admintheme/template/main/product/edit_product',$data);
            }
	else{
	    // save data
	    $this->Model_product->edit_product();
	    $data['url_redirect'] = base_url().'adminpanel/product/manage_product';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
	}
    }
    function delete_product(){
	$id = $this->uri->segment(4);
	$this->db->where('id_product',$id);
	$this->db->delete('product');
	redirect(base_url('adminpanel/product/manage_product'));
    }
    function set_margin(){
	// Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Set Margin Product - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url('adminpanel'));
	$this->breadcrumb->append_crumb('Product',base_url('adminpanel/product/manage_product'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
	    // Ngeload
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url() . 'adminpanel/product/set_margin'; // configurate link pagination
	    $config['total_rows'] = $this->Model_product->count_product();// fetch total record in databae using load model_user and count_user function
	    $config['per_page'] = 10; // Total data in one page
	    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['full_tag_open'] = '<div class=\'pagination\'>';
	    $config['full_tag_close'] = '</div>';
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->Model_product->fetch_product_margin($config['per_page'],$page); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->Model_product->count_product(); // Make a variable (array) link so the view can call the variable
	    $this->template->load('theme/admintheme/index','theme/admintheme/template/main/product/set_margin',$data);
	}
	else{
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
    function edit_margin(){
	// Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Edit Margin Product - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url('adminpanel'));
	$this->breadcrumb->append_crumb('product',base_url('adminpanel/product/set_margin'));
        $this->breadcrumb->append_crumb('Edit Margin Product',' ');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
	    $this->load->library('form_validation');
	    $config = array(
			array(
			  'field' => 'margin',
			  'label' => 'Margin',
			  'rules' => 'required|xss_clean|numeric'
			)
		    );
	    $this->form_validation->set_rules($config);
	    $id_product = $this->uri->segment(4);
	    $result = $this->Model_product->get_product($id_product);
	    $data['name_product'] = $result['name_product'];
	    $data['base_price'] = $result['base_price'];
	    $data['margin'] = $result['margin'];
	    if($result == 0 || $result == false) redirect(base_url('adminpanel/product/set_margin'));
	    if($this->form_validation->run() == FALSE){
		/*
		 *  Meload View
		 *  Yang dikiri meload theme adminnya
		 *  Yang dikanan meload script untuk dipakai di variable contents di View File
		 * */
		    $this->template->load('theme/admintheme/index','theme/admintheme/template/main/product/edit_margin',$data);
		}
	    else{
		// save data
		$this->Model_product->edit_margin();
		$data['url_redirect'] = base_url().'adminpanel/product/set_margin';
		$this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
	    }
	}
	else{
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
	function set_harga_beli(){
	// Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Set Harga Beli - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url('adminpanel'));
	$this->breadcrumb->append_crumb('Harga Beli',base_url('adminpanel/product/manage_product'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
	    // Ngeload
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url() . 'adminpanel/product/set_margin'; // configurate link pagination
	    $config['total_rows'] = $this->Model_product->count_harga_beli();// fetch total record in databae using load model_user and count_user function
	    $config['per_page'] = 10; // Total data in one page
	    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['full_tag_open'] = '<div class=\'pagination\'>';
	    $config['full_tag_close'] = '</div>';
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->Model_product->fetch_harga_beli($config['per_page'],$page); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->Model_product->count_harga_beli(); // Make a variable (array) link so the view can call the variable
	    $this->template->load('theme/admintheme/index','theme/admintheme/template/main/product/set_harga_beli',$data);
	}
	else{
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
	function edit_harga_beli(){
		// Load Default Setting
        $var = $this->Model_setting->setting();
		$title = $var['title_website'];
		$footer = $var['footer'];
        $this->template->set('title','Edit Harga Beli - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url('adminpanel'));
		$this->breadcrumb->append_crumb('Harga Beli',base_url('adminpanel/product/set_harga_beli'));
		$this->breadcrumb->append_crumb('Edit Harga Beli',base_url('adminpanel/product/edit_harga_beli'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
	    $this->load->library('form_validation');
	    $config = array(
			array(
			  'field' => 'harga_beli',
			  'label' => 'Harga Beli',
			  'rules' => 'required|xss_clean|numeric'
			)
		    );
	    $this->form_validation->set_rules($config);
	    $id = $this->uri->segment(4);
	    $data['result'] = $this->Model_product->get_harga_beli($id);
	    if($result == 0 || $result == false) redirect(base_url('adminpanel/product/set_harga_beli'));
	    if($this->form_validation->run() == FALSE){
		    $this->template->load('theme/admintheme/index','theme/admintheme/template/main/product/edit_harga_beli',$data);
		}
	    else{
		// save data
		$this->Model_product->edit_margin();
		$data['url_redirect'] = base_url().'adminpanel/product/set_harga_beli';
		$this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
	    }
		}
	}
}