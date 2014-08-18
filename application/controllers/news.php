<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('frontpage/Model_article');
		$this->load->model('frontpage/Model_member');
    }
    function index(){
        redirect(base_url('news/view_all'));
    }
	function searchNews($word) //ajax search function
	{
		$this->Model_article->ajax_search_result($word);
	}
    function view_all(){
    // Load Default Setting Website
    $var = $this->Model_setting->setting();
	$this->template->set('title','News - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('News',base_url());
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
        
    // Ngeload artikel
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url('news/view_all/'); // configurate link pagination
	$config['total_rows'] = $this->Model_article->count_article_active();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 5; // Total data in one page
	$config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 5; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_article->fetch_article_active($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_article->count_article_active(); // Make a variable (array) link so the view can call the variable
	
	//session
	
		$data['msg'] = $this->Model_member->getUpdData();
		$data['username'] = $this->Model_member->getLogData();
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
        $this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/news/view_all",$data);
    }
    function read(){
	$id_article = $this->uri->segment(3);
	$result = $this->Model_article->get_article($id_article);
	$data['title'] = $result['title_news'];
	$data['content'] = $result['content_news'];
	$data['status'] = $result['status_news'];
	$data['writer'] = $result['name'];
	$data['date_insert'] = $result['date_insert'];
	$data['image'] = $result['image_news'];
	$title = preg_replace('/[^a-z0-9]+/','-',strtolower($data['title']));
	if($result == FALSE || $data['status'] == 1) redirect(base_url('news/view_all'));
	
	
	// Load Default Setting Website
        $var = $this->Model_setting->setting();
	$this->template->set('title',$data['title'].' - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	$this->template->set('meta_desc',$var['description_website']); // memberi meta description
	$this->template->set('favicon',$var['fav_icon']); // memberi meta description
	$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
        
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Home", base_url());
	$this->breadcrumb->append_crumb('News',base_url('news/view_all'));
	$this->breadcrumb->append_crumb('Read News',base_url('read'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$data['msg'] = $this->Model_member->getUpdData();
	$data['username'] = $this->Model_member->getLogData();
	$data['session'] = $this->Model_member->getMemberSession();
	$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
	
	$this->load->library('form_validation');
	$config = array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required|min_length[5]',
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|valid_email',
				),
				array(
					'field' => 'comment',
					'label' => 'Comment',
					'rules' => 'required|min_length[10]|xss_clean',
				),
			);
	$this->form_validation->set_rules($config);
	// Ngeload Comment
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url('news/read/'.$id_article.'/'.$title.'/'); // configurate link pagination
	$config['total_rows'] = $this->Model_article->count_comment_active();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 5; // Total data in one page
	$config['uri_segment'] = 5; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 5; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(5))? $this->uri->segment(5) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['news'] = $this->Model_article->fetch_comment_active($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_article->count_comment_active(); // Make a variable (array) link so the view can call the variable
		if($this->form_validation->run() == FALSE)
			$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/news/read",$data);
		else{
			$this->session->set_flashdata('comment',TRUE);
			$this->Model_article->add_comment();
			redirect(base_url('news/read/'.$id_article.'/'.$title.'/'));
		}
	}
}