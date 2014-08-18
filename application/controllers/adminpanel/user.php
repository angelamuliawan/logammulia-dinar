<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('login_admin')){
            redirect(base_url().'adminpanel');
        }
        $this->load->model('admin/Model_user');
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>'); // Set Style Alert Warning
    
    }
    function index(){
        redirect(base_url().'adminpanel/user/manage_user');
    }
    // Function User
    function manage_user(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Manage User - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_user');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        // Ngeload artikel
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/user/manage_user'; // configurate link pagination
	$config['total_rows'] = $this->Model_user->count_user();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_user->fetch_user($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_user->count_user(); // Make a variable (array) link so the view can call the variable
        $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/manage_user',$data);
    }
    
    function add_user(){
        // Load Default Setting
            $var = $this->Model_setting->setting();
            $title = $var['title_website'];
            $footer = $var['footer'];
            $this->template->set('title','Add New User - '.$title); // Memberi Judul Halaman Admin
            $this->template->set('footer',$footer); // Memberi Footer
            
            //  menambahkan breadcrumbs
            $this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
            $this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_user');
            $this->breadcrumb->append_crumb('Add New User','new_article');
            $this->template->set('breadcrumbs',$this->breadcrumb->output());
        if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
            $config = array(
                    array(
                      'field' => 'username',
                      'label' => 'Username',
                      'rules' => 'required|xss_clean|min_length[4]|max_length[20]|alpha_numeric|is_unique[user.username]'
                    ),
                    array(
                      'field' => 'password',
                      'label' => 'Password',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'confirm',
                      'label' => 'Confirm Password',
                      'rules' => 'required|matches[password]'
                    ),
                    array(
                      'field' => 'email',
                      'label' => 'Email',
                      'rules' => 'required|valid_email|is_unique[user.email]'
                    ),
                    array(
                      'field' => 'name',
                      'label' => 'Name',
                      'rules' => 'xss_clean|required'
                    ),
                    array(
                      'field' => 'address',
                      'label' => 'Address',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'gender',
                      'label' => 'Gender',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'status',
                      'label' => 'Status User',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'account',
                      'label' => 'Account Number (Nomor Rekening)',
                      'rules' => 'numeric'
                    ),
                    array(
                      'field' => 'atas_nama',
                      'label' => 'Atas Nama',
                      'rules' => 'xss_clean'
                    ),
                    array(
                      'field' => 'no_hp',
                      'label' => 'Phone Number',
                      'rules' => 'numeric'
                    ),
                );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
            /*
             *  Meload View
             *  Yang dikiri meload theme adminnya
             *  Yang dikanan meload script untuk dipakai di variable contents di View File
             * */
                $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/add_user');
            }
            else{
                $this->Model_user->add_user(); // add new user
                $data['url_redirect'] = base_url().'adminpanel/user/manage_user';
                $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
            }
        }
        else{
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
    function edit_user(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Edit User - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_user');
        $this->breadcrumb->append_crumb('Edit User','new_article');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
            $config = array(
                    array(
                      'field' => 'username',
                      'label' => 'Username',
                      'rules' => 'required|xss_clean|min_length[4]|max_length[20]|alpha_numeric'
                    ),
                    array(
                      'field' => 'email',
                      'label' => 'Email',
                      'rules' => 'required|valid_email'
                    ),
                    array(
                      'field' => 'name',
                      'label' => 'Name',
                      'rules' => 'xss_clean|required'
                    ),
                    array(
                      'field' => 'address',
                      'label' => 'Address',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'gender',
                      'label' => 'Gender',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'status',
                      'label' => 'Status User',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'account',
                      'label' => 'Account Number (Nomor Rekening)',
                      'rules' => 'numeric'
                    ),
                    array(
                      'field' => 'atas_nama',
                      'label' => 'Atas Nama',
                      'rules' => 'xss_clean'
                    ),
                    array(
                      'field' => 'no_hp',
                      'label' => 'Phone Number',
                      'rules' => 'numeric'
                    ),
                );
            $id_user = $this->uri->segment(4);
            $result = $this->Model_user->get_user($id_user);
            $data['username'] = $result['username'];
            $data['name'] = $result['name'];
            $data['email'] = $result['email'];
            $data['address'] = $result['address'];
            $data['gender'] = $result['gender'];
            $data['status'] = $result['status_user'];
            $data['account'] = $result['account_number'];
            $data['an'] = $result['atas_nama'];
            $data['no_hp'] = $result['no_hp'];
            $this->form_validation->set_rules($config);
            // validasi id_user dan ada tidaknya
            if($result == false || $id_user == 0){
                redirect(base_url().'adminpanel/user/manage_user');
            }
            if($this->form_validation->run() == FALSE){
            /*
             *  Meload View
             *  Yang dikiri meload theme adminnya
             *  Yang dikanan meload script untuk dipakai di variable contents di View File
             * */
                $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/edit_user',$data);
            }
            else{
                $this->Model_user->edit_user(); // edit user
                $data['url_redirect'] = base_url().'adminpanel/user/manage_user';
                $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
            }
        }
        else{
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
    function delete_user(){
        if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
        $id = $this->uri->segment(4);
	$this->db->where('id_user',$id);
	$this->db->delete('user');
	redirect(base_url().'adminpanel/user/manage_user');
        }
        else{
            //  menambahkan breadcrumbs
            $this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
            $this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_user');
            $this->breadcrumb->append_crumb('Delete User',base_url().' ');
            $this->template->set('breadcrumbs',$this->breadcrumb->output());
            // Load Default Setting
            $var = $this->Model_setting->setting();
            $title = $var['title_website'];
            $footer = $var['footer'];
            $this->template->set('title','Delete User - '.$title); // Memberi Judul Halaman Admin
            $this->template->set('footer',$footer); // Memberi Footer
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
    
    function view_profile(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','View Profile - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_admin');
        $this->breadcrumb->append_crumb('View Profile',' ');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        $id_user = $this->uri->segment(4);
        $result = $this->Model_user->get_backoffice($id_user);
        $data['username'] = $result['username'];
        $data['email'] = $result['email'];
        $data['name'] = $result['name'];
        $data['permission'] = $result['admin_permission'];
        if($result == false || $id_user == 0){
	    redirect(base_url().'adminpanel/user/manage_backoffice');
	}
        $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/view_profile',$data);
    }
    // Function Back Office
    function manage_backoffice(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Manage Back Office - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_backoffice');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        // Ngeload artikel
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/user/manage_backoffice'; // configurate link pagination
	$config['total_rows'] = $this->Model_user->count_backoffice();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_user->fetch_backoffice($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_user->count_backoffice(); // Make a variable (array) link so the view can call the variable
        $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/manage_backoffice',$data);
    }
    function add_backoffice(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Add Back Office - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_backoffice');
	$this->breadcrumb->append_crumb('Add Back Office',base_url().'adminpanel/user/manage_backoffice');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
            $config = array(
                    array(
                      'field' => 'username',
                      'label' => 'Username',
                      'rules' => 'required|xss_clean|min_length[4]|max_length[20]|alpha_numeric|is_unique[administrator.username]'
                    ),
                    array(
                      'field' => 'name',
                      'label' => 'Name',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'password',
                      'label' => 'Password',
                      'rules' => 'required'
                    ),
                    array(
                      'field' => 'confirm',
                      'label' => 'Confirm Password',
                      'rules' => 'required|matches[password]'
                    ),
                    array(
                      'field' => 'email',
                      'label' => 'Email',
                      'rules' => 'required|valid_email|is_unique[user.email]'
                    ),
                );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
            /*
             *  Meload View
             *  Yang dikiri meload theme adminnya
             *  Yang dikanan meload script untuk dipakai di variable contents di View File
             * */
                $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/add_backoffice');
            }
            else{
                $this->Model_user->add_backoffice(); // add new backoffice
               $data['url_redirect'] = base_url().'adminpanel/user/manage_backoffice';
                $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
            }
        }
        else{
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
    function edit_backoffice(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Edit Back Office - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_backoffice');
        $this->breadcrumb->append_crumb('Edit Back Office','new_article');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        $config = array(
                array(
                  'field' => 'username',
                  'label' => 'Username',
                  'rules' => 'required|xss_clean|min_length[4]|max_length[20]|alpha_numeric'
                ),
                array(
                  'field' => 'email',
                  'label' => 'Email',
                  'rules' => 'required|valid_email'
                ),
                array(
                  'field' => 'name',
                  'label' => 'Name',
                  'rules' => 'required'
                ),
            );
        $id_user = $this->uri->segment(4);
	$result = $this->Model_user->get_backoffice($id_user);
        $data['username'] = $result['username'];
        $data['email'] = $result['email'];
        $data['name'] = $result['name'];
        $this->form_validation->set_rules($config);
        // validasi id_user dan ada tidaknya
	if($result == false || $id_user == 0){
	    redirect(base_url().'adminpanel/user/manage_backoffice');
	}
        if($this->form_validation->run() == FALSE){
        /*
         *  Meload View
         *  Yang dikiri meload theme adminnya
         *  Yang dikanan meload script untuk dipakai di variable contents di View File
         * */
            $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/edit_backoffice',$data);
        }
        else{
            $this->Model_user->edit_backoffice(); // edit backoffice
            $data['url_redirect'] = base_url().'adminpanel/user/manage_backoffice';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
        }
    }
    function delete_backoffice(){
        if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
        $id = $this->uri->segment(4);
	$this->db->where('id_administrator',$id);
	$this->db->delete('administrator');
	redirect(base_url().'adminpanel/user/manage_backoffice');
        }
        else{
            //  menambahkan breadcrumbs
            $this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
            $this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_user');
            $this->breadcrumb->append_crumb('Delete Backoffice',base_url().' ');
            $this->template->set('breadcrumbs',$this->breadcrumb->output());
            // Load Default Setting
            $var = $this->Model_setting->setting();
            $title = $var['title_website'];
            $footer = $var['footer'];
            $this->template->set('title','Delete Backoffice - '.$title); // Memberi Judul Halaman Admin
            $this->template->set('footer',$footer); // Memberi Footer
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
    
    // Function Admin
    function manage_admin(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Manage Admin - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_admin');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        // Ngeload artikel
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/user/manage_admin'; // configurate link pagination
	$config['total_rows'] = $this->Model_user->count_admin();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_user->fetch_admin($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_user->count_admin(); // Make a variable (array) link so the view can call the variable
        $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/manage_admin',$data);
    }
    function add_admin(){
    // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Add New Admin - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Admin',base_url().'adminpanel/user/manage_admin');
        $this->breadcrumb->append_crumb('Add New Admin',' ');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
        $config = array(
                array(
                  'field' => 'username',
                  'label' => 'Username',
                  'rules' => 'required|xss_clean|min_length[4]|max_length[20]|alpha_numeric|is_unique[administrator.username]'
                ),
                array(
                  'field' => 'password',
                  'label' => 'Password',
                  'rules' => 'required'
                ),
                array(
                  'field' => 'confirm',
                  'label' => 'Confirm Password',
                  'rules' => 'required|matches[password]'
                ),
                array(
                  'field' => 'email',
                  'label' => 'Email',
                  'rules' => 'required|valid_email|is_unique[user.email]'
                ),
                array(
                  'field' => 'name',
                  'label' => 'Name',
                  'rules' => 'required'
                ),
            );
        $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
            /*
             *  Meload View
             *  Yang dikiri meload theme adminnya
             *  Yang dikanan meload script untuk dipakai di variable contents di View File
             * */
                $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/add_admin');
            }
            else{
                $this->Model_user->add_admin(); // add new admin
                $data['url_redirect'] = base_url().'adminpanel/user/manage_admin';
                $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
            }
        }
        else{
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
    function edit_admin(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Edit Admin - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_admin');
        $this->breadcrumb->append_crumb('Edit Admin','new_article');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        $config = array(
                array(
                  'field' => 'username',
                  'label' => 'Username',
                  'rules' => 'required|xss_clean|min_length[4]|max_length[20]|alpha_numeric'
                ),
                array(
                  'field' => 'email',
                  'label' => 'Email',
                  'rules' => 'required|valid_email'
                ),
                array(
                  'field' => 'name',
                  'label' => 'Name',
                  'rules' => 'required'
                ),
            );
        $id_user = $this->uri->segment(4);
	$result = $this->Model_user->get_admin($id_user);
        $data['username'] = $result['username'];
        $data['email'] = $result['email'];
        $data['name'] = $result['name'];
        $this->form_validation->set_rules($config);
        // validasi id_user dan ada tidaknya
	if($result == false || $id_user == 0){
	    redirect(base_url().'adminpanel/user/manage_admin');
	}
        if($this->form_validation->run() == FALSE){
        /*
         *  Meload View
         *  Yang dikiri meload theme adminnya
         *  Yang dikanan meload script untuk dipakai di variable contents di View File
         * */
            $this->template->load('theme/admintheme/index','theme/admintheme/template/main/user/edit_admin',$data);
        }
        else{
            $this->Model_user->edit_admin(); // edit admin
            $url_redirect = base_url().'adminpanel/user/manage_admin';
            redirect($url_redirect);
        }
    }
    function delete_admin(){
        if($this->session->userdata('permission_admin') == 2){
        $id = $this->uri->segment(4);
	$this->db->where('id_administrator',$id);
	$this->db->delete('administrator');
	redirect(base_url().'adminpanel/user/manage_admin');
        }
        else{
            //  menambahkan breadcrumbs
            $this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
            $this->breadcrumb->append_crumb('User',base_url().'adminpanel/user/manage_user');
            $this->breadcrumb->append_crumb('Delete Admin',base_url().' ');
            $this->template->set('breadcrumbs',$this->breadcrumb->output());
            // Load Default Setting
            $var = $this->Model_setting->setting();
            $title = $var['title_website'];
            $footer = $var['footer'];
            $this->template->set('title','Delete Admin - '.$title); // Memberi Judul Halaman Admin
            $this->template->set('footer',$footer); // Memberi Footer
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/error_permission');
        }
    }
}