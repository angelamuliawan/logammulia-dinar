<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('login_admin')){
            redirect(base_url().'adminpanel');
        }
        $this->load->model("admin/Model_article");
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>'); // Set Style Alert Warning
    }
    function index(){
	redirect(base_url().'adminpanel/article/manage_article');
    }
    function new_article(){  
        // Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Add New Article - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Article',base_url().'adminpanel/article/manage_article');
        $this->breadcrumb->append_crumb('Add New','new_article');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        $config = array(
                array(
                  'field' => 'title',
                  'label' => 'Title',
                  'rules' => 'required|xss_clean'
                ),
                array(
                  'field' => 'content',
                  'label' => 'Content',
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
            $this->template->load('theme/admintheme/index','theme/admintheme/template/main/article/new_article');
        }
        else{
            $this->Model_article->add_new(); // add new article
			 $data['url_redirect'] = base_url().'adminpanel/article/manage_article';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
        }
    }
    function manage_article(){
        // Load Default Setting
        $var = $this->Model_setting->setting();
		$title = $var['title_website'];
		$footer = $var['footer'];
        $this->template->set('title','Manage Article - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
         //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Article',base_url().'adminpanel/article/manage_article');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        // Ngeload artikel
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/article/manage_article'; // configurate link pagination
	$config['total_rows'] = $this->Model_article->count_article();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_article->fetch_article($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_article->count_article(); // Make a variable (array) link so the view can call the variable
        $this->template->load('theme/admintheme/index','theme/admintheme/template/main/article/manage_article',$data);
    }
    function edit_article(){
	// Load Default Setting
        $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
        $this->template->set('title','Edit Article - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
	
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Article',base_url().'adminpanel/article/manage_article');
        $this->breadcrumb->append_crumb('Edit Article','edit_article');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$config = array(
                array(
                  'field' => 'title',
                  'label' => 'Title',
                  'rules' => 'required|min_length[5]|xss_clean'
                ),
                array(
                  'field' => 'content',
                  'label' => 'Content',
                  'rules' => 'required'
                ),
            );
	$id_article = $this->uri->segment(4);
	$result = $this->Model_article->get_article($id_article);
	$data['title'] = $result['title_news'];
	$data['content'] = $result['content_news'];
	$data['status'] = $result['status_news'];
        $this->form_validation->set_rules($config);
	// validasi id_user dan ada tidaknya
	if($result == false || $id_article == 0){
	    redirect(base_url().'adminpanel/article/manage_article');
	}
	if($this->form_validation->run() == FALSE){
        /*
         *  Meload View
         *  Yang dikiri meload theme adminnya
         *  Yang dikanan meload script untuk dipakai di variable contents di View File
         * */
            $this->template->load('theme/admintheme/index','theme/admintheme/template/main/article/edit_article',$data);
        }
        else{
            $this->Model_article->edit_article(); // add new article
	    $data['url_redirect'] = base_url().'adminpanel/article/manage_article';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
        }
    }
    function delete_article(){ // delete permanent article
	$id = $this->uri->segment(4);
	$this->db->where('id_news',$id);
	$this->db->delete('news');
	redirect(base_url().'adminpanel/article/manage_article');
    }
	
	function manage_slideshow(){
    // Load Default Setting
    $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
    $this->template->set('title','Manage Slideshow - '.$title); // Memberi Judul Halaman Admin
    $this->template->set('footer',$footer); // Memberi Footer
        
    //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Article',base_url().'adminpanel/article/manage_article');
	$this->breadcrumb->append_crumb('Slideshow',base_url().'adminpanel/article/manage_slideshow');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
    // Ngeload Slideshow
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/article/manage_slideshow'; // configurate link pagination
	$config['total_rows'] = $this->Model_article->count_slideshow();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 5; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 5; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_article->fetch_slideshow($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_article->count_slideshow(); // Make a variable (array) link so the view can call the variable
    $this->template->load('theme/admintheme/index','theme/admintheme/template/main/article/manage_slideshow',$data);
    }
	function new_slideshow(){  
    // Load Default Setting
    $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
    $this->template->set('title','Add New Slideshow - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Slideshow',base_url().'adminpanel/article/manage_slideshow');
        $this->breadcrumb->append_crumb('Add New',base_url('adminpanel/article/new_slideshow'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        $config = array(
                array(
                  'field' => 'title',
                  'label' => 'Title',
                  'rules' => 'required|xss_clean'
                ),
               array(
                  'field' => 'url',
                  'label' => 'Link URL',
                  'rules' => 'required|xss_clean'
                ),
				array(
                  'field' => 'img',
                  'label' => 'Image Slideshow',
                  'rules' => 'required|xss_clean'
                ),
				array(
                  'field' => 'status',
                  'label' => 'Status',
                  'rules' => 'required|xss_clean'
                ),
				array(
                  'field' => 'sort',
                  'label' => 'Sort Order',
                  'rules' => 'required|xss_clean|numeric'
                ),
            );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
        
        /*
         *  Meload View
         *  Yang dikiri meload theme adminnya
         *  Yang dikanan meload script untuk dipakai di variable contents di View File
         * */
            $this->template->load('theme/admintheme/index','theme/admintheme/template/main/article/new_slideshow');
        }
        else{
            $this->Model_article->add_slideshow(); // add new slideshow
			 $data['url_redirect'] = base_url().'adminpanel/article/manage_slideshow';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
        }
    }
	function edit_slideshow(){
	// Load Default Setting
    $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
    $this->template->set('title','Edit Slideshow - '.$title); // Memberi Judul Halaman Admin
        $this->template->set('footer',$footer); // Memberi Footer
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Slideshow',base_url().'adminpanel/article/manage_slideshow');
        $this->breadcrumb->append_crumb('Edit Slideshow',base_url('adminpanel/article/new_slideshow'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
        $config = array(
                array(
                  'field' => 'title',
                  'label' => 'Title',
                  'rules' => 'required|xss_clean'
                ),
               array(
                  'field' => 'url',
                  'label' => 'Link URL',
                  'rules' => 'required|xss_clean'
                ),
				array(
                  'field' => 'img',
                  'label' => 'Image Slideshow',
                  'rules' => 'required|xss_clean'
                ),
				array(
                  'field' => 'status',
                  'label' => 'Status',
                  'rules' => 'required|xss_clean'
                ),
				array(
                  'field' => 'sort',
                  'label' => 'Sort Order',
                  'rules' => 'required|xss_clean|numeric'
                ),
            );
        $this->form_validation->set_rules($config);
		$id = $this->uri->segment(4);
        $result = $this->Model_article->get_slideshow($id);
		$data['title'] = $result['title_slideshow'];
		$data['url'] = $result['link_url'];
		$data['img'] = $result['image_slideshow'];
		$data['status'] = $result['status_slideshow'];
		$data['sort'] = $result['sort_order'];
		if($this->form_validation->run() == FALSE){
            $this->template->load('theme/admintheme/index','theme/admintheme/template/main/article/edit_slideshow',$data);
        }
        else{
            $this->Model_article->save_slideshow(); // save slideshow
			 $data['url_redirect'] = base_url().'adminpanel/article/manage_slideshow';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
        }
	}
	function delete_slideshow(){ // delete permanent slideshow
	$id = $this->uri->segment(4);
	$this->db->where('id_slideshow',$id);
	$this->db->delete('slideshow');
	redirect(base_url().'adminpanel/article/manage_slideshow');
    }
	function manage_comment(){
    // Load Default Setting
    $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
    $this->template->set('title','Manage Comment - '.$title); // Memberi Judul Halaman Admin
    $this->template->set('footer',$footer); // Memberi Footer
        
    //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Article',base_url().'adminpanel/article/manage_article');
	$this->breadcrumb->append_crumb('Comment',base_url().'adminpanel/article/manage_comment');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
	// Ngeload artikel
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/article/manage_comment'; // configurate link pagination
	$config['total_rows'] = $this->Model_article->count_comment();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_article->fetch_comment($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_article->count_comment(); // Make a variable (array) link so the view can call the variable
        $this->template->load('theme/admintheme/index','theme/admintheme/template/main/article/manage_comment',$data);
    }
	function edit_comment(){
	// Load Default Setting
    $var = $this->Model_setting->setting();
	$title = $var['title_website'];
	$footer = $var['footer'];
    $this->template->set('title','Edit Comment - '.$title); // Memberi Judul Halaman Admin
    $this->template->set('footer',$footer); // Memberi Footer
	
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Article',base_url().'adminpanel/article/manage_article');
	$this->breadcrumb->append_crumb('Comment',base_url().'adminpanel/article/manage_comment');
	$this->breadcrumb->append_crumb('Edit',base_url().'adminpanel/article/edit_comment');
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id = $this->uri->segment(4);
	$data['result'] = $this->Model_article->get_comment($id);
	if($id = "" || $data['result'] == FALSE) redirect(base_url('adminpanel/article/manage_comment'));
	$this->load->library('form_validation');
	$this->form_validation->set_rules('status','Sattus','required|xss_clean');
		if($this->form_validation->run() == FALSE)
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/article/edit_comment',$data);
		else{
			$this->Model_article->save_comment();
			redirect(base_url('adminpanel/article/edit_comment'));
		}
	}
}