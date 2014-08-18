<?php
class Transaction extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login_admin')){
            redirect(base_url('adminpanel'));
        }
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>'); // Set Style Alert Warning
		$this->load->model('admin/Model_transaction');
		$this->load->model('admin/Model_email');
	}
	function member(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Transaction Member - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Transaction Member',base_url('adminpanel/transaction/member'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/member'; // configurate link pagination
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
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/transaction_member',$data);
	}
	function archive_transaction(){
		$id = $this->uri->segment(4);
		$this->db->where('id_order',$id);
		$this->db->delete('order');
		redirect(base_url('adminpanel/transaction/member/'));
	}
	function edit_status_member(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Edit Transaction - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Edit Transaction\'s status',base_url('adminpanel/transaction/edit_status_member'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id_transcation = $this->uri->segment(4);
	$result = $this->Model_transaction->get_transaction_member($id_transcation);
	$data['name'] =  $result['name'];
	$data['username'] =  $result['username'];
	$data['name_product'] =  $result['name_product'];
	$data['harga_beli'] =  $result['harga_pas_beli'];
	$data['qty'] =  $result['qty'];
	$data['total_price'] =  $result['total_price'];
	$data['date_order'] =  $result['date_order'];
	$data['status'] =  $result['status_order'];
    $data['result'] = $result;
	
	$this->form_validation->set_rules('status', 'Status Transaksi', 'required');
		if($this->form_validation->run() == FALSE){
		$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_status_member',$data);
		}
		else{
			$this->Model_transaction->change_status(); // change Status Transaksi
			// sent email ke user
			$id_transcation = $this->uri->segment(4);
			$this->Model_email->BackTransactionMember($id_transcation,$_POST,$data['status']);
			$data['url_redirect'] = base_url().'adminpanel/transaction/member';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
		}
	}
	function nonmember(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Transaction Non Member - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Transaction Non member',base_url('adminpanel/transaction/member'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/nonmember'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_transaction_nonmember();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_transaction_nonmember($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_transaction_nonmember(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/transaction_nonmember',$data);
	}
	function delete_transaction_nonmember(){
		$this->db->where('id_order_nonmember',$this->uri->segment(4));
		$this->db->delete('order_nonmember');
		redirect(base_url('adminpanel/transaction/nonmember'));
	}
	function edit_status_nonmember(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Edit Transaction - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/nonmember'));
	$this->breadcrumb->append_crumb('Edit Transaction\'s status',base_url('adminpanel/transaction/edit_status_member'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id_transcation = $this->uri->segment(4);
	$result = $this->Model_transaction->get_transaction_nonmember($id_transcation);
	$data['name'] =  $result['name'];
	$data['name_product'] =  $result['name_product'];
	$data['harga_beli'] =  $result['harga_pas_beli'];
	$data['qty'] =  $result['qty'];
	$data['total_price'] =  $result['total_price'];
	$data['date_order'] =  $result['date_order'];
	$data['tgl_dikirim'] =  $result['tanggal_dikirim'];
	$data['status'] =  $result['status_order'];
	$data['shipping'] = $result['shipping'];
	$data['an'] = $result['atas_nama'];
	$data['no_rek'] = $result['account_number'];
	$data['shipping'] = $result['shipping'];
	
	$this->form_validation->set_rules('status', 'Status Transaksi', 'required');
		if($this->form_validation->run() == FALSE){
		$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_status_nonmember',$data);
		}
		else{
			$this->Model_transaction->change_status_nonmember(); // change Status Transaksi
			$id_transaction = $this->uri->segment(4);
			// sent email ke user
			$this->Model_email->BackTransactionNonmember($id_transaction,$_POST,$data['status']);
			$data['url_redirect'] = base_url().'adminpanel/transaction/nonmember';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
		}
	}
	function cicilan(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Manage Cicilan - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Cicilan',base_url('adminpanel/transaction/cicilan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/cicilan'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_cicilan();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_cicilan($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_cicilan(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/cicilan',$data);
	}
	function view_cicilan(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','View Cicilan - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Cicilan',base_url('adminpanel/transaction/cicilan'));
	$this->breadcrumb->append_crumb('View',base_url('adminpanel/transaction/view_cicilan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id = $this->uri->segment(4);
	// Ngeload list transaksi
	$data['results'] = $this->Model_transaction->fetch_cicilan_detail(); // fetch data using limit and pagination
	$data['total_rows'] = $this->Model_transaction->count_cicilan_detail(); // Make a variable (array) link so the view can call the variable
	$results = $this->Model_transaction->get_cicilan($id);
	$data['harga_beli'] = $results['harga_pas_beli'];
	$data['gram'] = $results['gram'];
	$data['name'] = $results['name'];
	$data['produk'] = $results['name_product'];
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/view_cicilan',$data);
	}
	function edit_cicilan(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Edit Detail Cicilan - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Cicilan',base_url('adminpanel/transaction/cicilan'));
	$this->breadcrumb->append_crumb('Edit',base_url('adminpanel/transaction/edit_cicilan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id = $this->uri->segment(4);
	$data['results'] = $this->Model_transaction->get_cicilan_detail($id);
	$cicilan = $this->Model_transaction->get_cicilan_detail($id);
	$results = $this->Model_transaction->get_cicilan_detail($id);
	if(date("d-M-Y",strtotime($results['date_jatuh_tempo'])) == date("d-M-Y",strtotime($results['date_mulai_cicilan'])))
		$data['plus'] = TRUE;
	else 
		$data['plus'] = FALSE;
	$this->load->library('form_validation');
	$this->form_validation->set_rules('status','Status','required|xss_clean');
		if($this->form_validation->run() == FALSE)
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_cicilan_detail',$data);
		else{
			$id = $this->uri->segment(4);
			// sent email ke user
			$this->Model_email->BackCicilan($id,$_POST,$cicilan['status_cicilan']);
			$this->Model_transaction->save_cicilan();
			redirect(base_url('adminpanel/transaction/view_cicilan/'.$results['id_cicilan']));
		}
	}
	function edit_status_cicilan(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Edit Detail Cicilan - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Cicilan',base_url('adminpanel/transaction/cicilan'));
	$this->breadcrumb->append_crumb('Edit',base_url('adminpanel/transaction/edit_cicilan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id = $this->uri->segment(4);
	$data['results'] = $this->Model_transaction->get_cicilan2($id);
	
	$this->load->library('form_validation');
	$this->form_validation->set_rules('status','Status','required|xss_clean');
		if($this->form_validation->run() == FALSE)
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_status_cicilan',$data);
		else{
			$this->Model_transaction->edit_status_cicilan($_POST);
			redirect(base_url('adminpanel/transaction/cicilan'));
		}
	}
	function delete_cicilan(){
		$this->db->where('id_cicilan',$this->uri->segment(4));
		$this->db->delete('cicilan');
		$this->db->where('id_cicilan',$this->uri->segment(4));
		$this->db->delete('cicilan_detail');
		redirect(base_url('adminpanel/transaction/cicilan'));
	}	
	// fungsi konsultasi
	function consultation(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Consultation Member - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Consultation',base_url('adminpanel/transaction/consultation'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/consultation'; // configurate link pagination
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
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/consultation',$data);
	}
	function reply_consultation(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Consultation Member - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Consultation',base_url('adminpanel/transaction/consultation'));
	$this->breadcrumb->append_crumb('Read',base_url(''));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id = $this->uri->segment(4);
	$data['result'] = $this->Model_transaction->read_consultation($id);
	$data['result2'] = $this->Model_transaction->get_reply_consultation($id);
	$this->load->library('form_validation');
	$this->form_validation->set_rules('reply','Quick Reply','required|min_length[10]');
	if($this->form_validation->run() == FALSE)
		$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/read_consultation',$data);
	else{
		$this->Model_transaction->reply_consultation($id);
		redirect(base_url('adminpanel/transaction/consultation/'));
		}
	}
	// konfirmasi transfer
	function confirmation_transfer(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Kofirmasi Transfer - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Confirmation',base_url('adminpanel/transaction/confirmation_transfer'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/confirmation_transfer'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_confirmation();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_confirmation($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_confirmation(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/confirmation',$data);
	}
	function confirmation_transfer_nonmember(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Konfirmasi Transfer - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Confirmation',base_url('adminpanel/transaction/confirmation_transfer'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/confirmation_transfer_nonmember'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_confirmation_nonmember();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_confirmation_nonmember($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_confirmation_nonmember(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/confirmation_nonmember',$data);
	}
	// celengan
	function celengan_emas(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Celengan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Celengan Emas',base_url('adminpanel/transaction/celengan_emas'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/celengan_emas'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_celengan();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_celengan($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_celengan(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/celengan_emas',$data);
	}
    function edit_status_celengan(){
        // Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Edit Status Celengan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	
        //  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Celengan Emas',base_url('adminpanel/transaction/celengan_emas'));
    $this->breadcrumb->append_crumb('Edit Status Celengan Emas',base_url('adminpanel/transaction/celengan_emas'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id = $this->uri->segment(4);
    $data['results'] = $this->Model_transaction->get_celengan_emas($id);
        if($id == "" || $data['results'] == false){
            redirect(base_url('adminpanel/transaction/celengan_emas'));
        }
	
    $this->form_validation->set_rules('status','Status','required');
        if(!$this->form_validation->run()){
             $this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/status_celengan',$data);
        }
        else{
           $data['save'] = $this->Model_transaction->saveStatusCelengan($_POST,$id);
            redirect(base_url('adminpanel/transaction/edit_status_celengan'));
           $this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/status_celengan',$data);
        }
    }
	function view_celengan(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','View Celengan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Celengan Emas',base_url('adminpanel/transaction/celengan_emas'));
	$this->breadcrumb->append_crumb('View Detail',base_url('adminpanel/transaction/view_celengan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id = $this->uri->segment(4);
	if($id == "" || $this->Model_transaction->count_celengan_detail($id) == 0) redirect(base_url('adminpanel/celengan_emas'));
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/view_celengan/'.$id; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_celengan_detail();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 5; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(5))? $this->uri->segment(5) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_celengan_detail($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_celengan(); // Make a variable (array) link so the view can call the variable
	
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/view_celengan',$data);
	}
	function edit_celengan_detail(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Edit Celengan Detail - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	$id = $this->uri->segment(4);
	$data['results'] = $this->Model_transaction->get_celengan_detail($id);
	$results = $this->Model_transaction->get_celengan_detail($id);
	if($data['results'] == FALSE || $id == "")
		redirect(base_url('adminpanel/transaction/celengan_emas'));
		
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Celengan Emas',base_url('adminpanel/transaction/celengan_emas'));
	$this->breadcrumb->append_crumb('View Celengan',base_url('adminpanel/transaction/view_celengan/'.$results['id_celengan']));
	$this->breadcrumb->append_crumb('Edit Celengan Detail',base_url('adminpanel/transaction/edit_celengan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	
	$this->load->library('form_validation');
	$this->form_validation->set_rules('status','Status Transfer','required|xss_clean');
	if($this->form_validation->run()==FALSE)
		$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_celengan_detail',$data);
	else{
		$this->Model_transaction->save_celengan_detail($id);
		redirect(base_url('adminpanel/transaction/view_celengan/'.$results['id_celengan']));
		}
	}
	function celengan_detail(){
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$this->template->set('title','View Celengan Emas - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		
		$id = $this->uri->segment(4);
		$data['results'] = $this->Model_transaction->get_celengan_detail_emas($id);
		$results = $this->Model_transaction->get_celengan_detail_emas($id);
		if($id == "" || $data['results']==FALSE) redirect(base_url('adminpanel/transaction/celengan_emas'));
		
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
		$this->breadcrumb->append_crumb('Celengan Emas',base_url('adminpanel/transaction/celengan_emas'));
		$this->breadcrumb->append_crumb('View Celengan',base_url('adminpanel/transaction/view_celengan/'.$results['id_celengan']));
		$this->breadcrumb->append_crumb('View Detail',base_url('adminpanel/transaction/celengan_detail'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		
		$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/detail_celengan',$data);
	}
	// function simpan
	function simpan(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Program Simpan Pinjam - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Simpan',base_url('adminpanel/transaction/simpan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/simpan'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_simpan();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_simpan($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_simpan(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/simpan',$data);
	}
	function edit_status_simpan(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Edit Status Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Simpan',base_url('adminpanel/transaction/simpan'));
	$this->breadcrumb->append_crumb('Edit Status',base_url('adminpanel/transaction/simpan/edit_status_simpan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	$id = $this->uri->segment(4);
	$data['results'] = $this->Model_transaction->get_simpan($id);
	if($id == "" || $data['results'] == FALSE) redirect(base_url('adminpanel/transaction/simpan'));
	$this->load->library('form_validation');
	$this->form_validation->set_rules('status','Status','required|xss_clean');
		if($this->form_validation->run() == FALSE)
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_status_simpan',$data);
		else{
			$this->Model_transaction->save_status_simpan();
			redirect(base_url('adminpanel/transaction/simpan'));
		}
	}
	function view_simpan(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','View Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Simpan',base_url('adminpanel/transaction/simpan'));
	$this->breadcrumb->append_crumb('Edit Status',base_url('adminpanel/transaction/simpan/edit_status_simpan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	$id = $this->uri->segment(4);
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/view_simpan/'.$id; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_simpan_detail();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 5; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(5))? $this->uri->segment(5) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_simpan_detail($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_simpan_detail(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/simpan_detail',$data);
	}
	function edit_simpan(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Edit Simpan - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction',base_url('adminpanel/transaction/member'));
	$this->breadcrumb->append_crumb('Simpan',base_url('adminpanel/transaction/simpan'));
	$this->breadcrumb->append_crumb('Edit Status',base_url('adminpanel/transaction/simpan/edit_status_simpan'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	$id = $this->uri->segment(4);
	$data['results'] = $this->Model_transaction->get_simpan_detail($id);
	$results = $this->Model_transaction->get_simpan_detail($id);
	if($id == "" || $data['results'] == FALSE) redirect(base_url('adminpanel/transaction/simpan'));
	$this->load->library('form_validation');
	$this->form_validation->set_rules('status','Status','required|xss_clean');
		if($this->form_validation->run() == FALSE)
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_simpan',$data);
		else{
			$this->Model_transaction->save_simpan();
			redirect(base_url('adminpanel/transaction/view_simpan/'.$results['id_simpan']));
		}
	}
	function sell(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Transaction Sell - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction Sell',base_url('adminpanel/transaction/sell'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/sell'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_transaction_sell();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_transaction_sell($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_transaction_sell(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/sell',$data);
	}
	function edit_status_jual(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Transaction Sell - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction Sell',base_url('adminpanel/transaction/sell'));
	$this->breadcrumb->append_crumb('Edit Status Sell',base_url('adminpanel/transaction/edit_status_sell'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	$id = $this->uri->segment(4);
	$data['result'] = $this->Model_transaction->get_sell($id);
	if($id=="" || $data['result'] == FALSE) redirect(base_url('adminpanel/transaction/sell'));
	$this->form_validation->set_rules('status','Status','required');
		if($this->form_validation->run() == FALSE){
		$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_status_jual',$data);
		}
		else{
			$this->Model_transaction->status_jual(); // change Status Transaksi
			redirect(base_url('adminpanel/transaction/sell'));
		}
	}
	function delete_sell(){
		$id = $this->uri->segment(4);
		$this->db->where('id_jual',$id);
		$this->db->delete('jual');
		redirect(base_url('adminpanel/transaction/sell'));
	}
	function gadai(){
	// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Gadai - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
	$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
	$this->breadcrumb->append_crumb('Transaction Gadai',base_url('adminpanel/transaction/gadai'));
	$this->template->set('breadcrumbs',$this->breadcrumb->output());
	
	// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/gadai'; // configurate link pagination
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
	$data['total_rows'] = $this->Model_transaction->count_gadai(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/gadai',$data);
	}
	function add_gadai(){
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$this->template->set('title','Gadai - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Transaction Gadai',base_url('adminpanel/transaction/gadai'));
		$this->breadcrumb->append_crumb('Add',base_url('adminpanel/transaction/add_gadai'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$this->load->library('form_validation');
		$config = array(
					array(
						'field' => 'username',
						'label' => 'Username',
						'rules' => 'required|xss_clean'
					),
					array(
						'field' => 'nilai_taksiran',
						'label' => 'Nilai Taksiran',
						'rules' => 'required|xss_clean|numeric'
					),
					array(
						'field' => 'gram',
						'label' => 'gram',
						'rules' => 'required|xss_clean|numeric'
					),
					array(
						'field' => 'month',
						'label' => 'Jangka Waktu',
						'rules' => 'required|xss_clean'
					),
					array(
						'field' => 'pinjaman',
						'label' => 'Pinjaman',
						'rules' => 'required|xss_clean|numeric'
					),
					array(
						'field' => 'no_id',
						'label' => 'Nomor Id Emas',
						'rules' => 'required|xss_clean'
					),
					array(
						'field' => 'tanggal_sertifikat',
						'label' => 'Tanggal Sertifikat',
						'rules' => 'required|xss_clean'
					),
				);
		$this->form_validation->set_rules($config);
		if(!$this->form_validation->run()){
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/add_gadai',$data);
		}
		else{
			$data['save'] = $this->Model_transaction->save_gadai();
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/add_gadai',$data);
		}
	}
	function edit_status_gadai(){
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$this->template->set('title','Gadai - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		
		$id = $this->uri->segment(4);
		$data['result'] = $this->Model_transaction->getGadai($id);
		// mengambil jumlah biaya titip
		$data['biaya_titip'] = $this->Model_transaction->biayaTitipGadai($id);
		if($id=="" or $data['result'] == FALSE) redirect(base_url('adminpanel/transaction/gadai'));
		
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Transaction Gadai',base_url('adminpanel/transaction/gadai'));
		$this->breadcrumb->append_crumb('Edit',base_url('adminpanel/transaction/edit_gadai'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());
		
		$this->load->library('form_validation');
		$config = array(
					array(
						'field' => 'nilai_taksiran',
						'label' => 'Nilai Taksiran',
						'rules' => 'required|xss_clean|numeric'
					),
					array(
						'field' => 'gram',
						'label' => 'gram',
						'rules' => 'required|xss_clean|numeric'
					),
					array(
						'field' => 'month',
						'label' => 'Jangka Waktu',
						'rules' => 'required|xss_clean'
					),
					array(
						'field' => 'pinjaman',
						'label' => 'Pinjaman',
						'rules' => 'required|xss_clean|numeric'
					),
					array(
						'field' => 'no_id',
						'label' => 'Nomor Id Emas',
						'rules' => 'required|xss_clean'
					),
					array(
						'field' => 'cicilan',
						'label' => 'Cicilan yang Sudah Dilunasi',
						'rules' => 'required|xss_clean|numeric'
					),
				);
		$this->form_validation->set_rules($config);
		if(!$this->form_validation->run()){
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_gadai',$data);
		}
		else{
			$data['save'] = $this->Model_transaction->edit_gadai($id);
			$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_gadai',$data);
		}
	}
	function delete_gadai(){
		$id = $this->uri->segment(4);
		$this->db->where('id_gadai',$id);
		$this->db->delete('gadai');
		redirect(base_url('adminpanel/transaction/gadai'));
	}
	function delete_confirmation(){
		$id = $this->uri->segment(4);
		$this->db->where('id_konfirmasi',$id);
		$this->db->delete('konfirmasi');
		redirect(base_url('adminpanel/transaction/confirmation_transfer'));
	}
	
	// Admin Transaksi
	function confirmation_member(){
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$this->template->set('title','Confirmation Member Transaction - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Konfirmasi Transfer',base_url('adminpanel/transaction/confirmation_member'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());	
		
		// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/confirmation_member'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->count_confirmation_member();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetch_confirmation_member($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->count_confirmation_member(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/confirmation_backmember',$data);
	}
	function edit_confirmation_member(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Confirmation Member Transaction - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Konfirmasi Transfer',base_url('adminpanel/transaction/confirmation_member'));
		$this->breadcrumb->append_crumb('Transaksi Member',base_url('adminpanel/transaction/confirmation_member'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());	
	
	$id_transcation = $this->uri->segment(4);
	$result = $this->Model_transaction->get_transaction_member($id_transcation);
	$data['name'] =  $result['name'];
	$data['username'] =  $result['username'];
	$data['name_product'] =  $result['name_product'];
	$data['harga_beli'] =  $result['harga_pas_beli'];
	$data['qty'] =  $result['qty'];
	$data['total_price'] =  $result['total_price'];
	$data['date_order'] =  $result['date_order'];
	$data['status'] =  $result['status_order'];
	
	$this->form_validation->set_rules('status', 'Status Transaksi', 'required');
		if($this->form_validation->run() == FALSE){
		$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_confirmation_member',$data);
		}
		else{
			$this->Model_transaction->change_status(); // change Status Transaksi
			$data['url_redirect'] = base_url().'adminpanel/transaction/confirmation_member';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
		}	
	}
	function confirmation_nonmember(){
		// Load Default Setting
		$var = $this->Model_setting->setting();
		$data['title'] = $var['title_website'];
		$this->template->set('title','Confirmation Non Member Transaction - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
			
		//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Konfirmasi Transfer',base_url('adminpanel/transaction/confirmation_member'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());	
		
		// Ngeload list transaksi
	$this->load->library('pagination'); // load libraray pagination
	$config['base_url'] = base_url() . 'adminpanel/transaction/confirmation_nonmember'; // configurate link pagination
	$config['total_rows'] = $this->Model_transaction->countConfirmationNonmember();// fetch total record in databae using load model_user and count_user function
	$config['per_page'] = 10; // Total data in one page
	$config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	$choice = $config['total_rows']/$config['per_page'] = 10; // Total record divided by total data in one page
	$config['num_links'] = round($choice); // Rounding Choice Variable
	$config['full_tag_open'] = '<div class=\'pagination\'>';
	$config['full_tag_close'] = '</div>';
	$this->pagination->initialize($config); // intialize var config
	$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	$data['results'] = $this->Model_transaction->fetchConfirmationNonmember($config['per_page'],$page); // fetch data using limit and pagination
	$data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	$data['total_rows'] = $this->Model_transaction->countConfirmationNonmember(); // Make a variable (array) link so the view can call the variable
	$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/confirmation_backnonmember',$data);
	}
	function edit_confirmation_nonmember(){
		// Load Default Setting
	$var = $this->Model_setting->setting();
	$data['title'] = $var['title_website'];
	$this->template->set('title','Confirmation Member Transaction - '.$var['title_website']); // Memberi Judul Halaman Admin
	$this->template->set('footer',$var['footer']); // Memberi Footer
	    
	//  menambahkan breadcrumbs
		$this->breadcrumb->append_crumb("Admin Panel", base_url().'adminpanel');
		$this->breadcrumb->append_crumb('Konfirmasi Transfer',base_url('adminpanel/transaction/confirmation_nonmember'));
		$this->breadcrumb->append_crumb('Transaksi Non Member',base_url('adminpanel/transaction/confirmation_nonmember'));
		$this->template->set('breadcrumbs',$this->breadcrumb->output());	
	
	$id_transcation = $this->uri->segment(4);
	$data['result'] = $this->Model_transaction->get_transaction_nonmember($id_transcation);
	if($data['result']==false)redirect(base_url('adminpanel/transaction/confirmation_nonmember'));
	
	$this->form_validation->set_rules('status', 'Status Transaksi', 'required');
		if($this->form_validation->run() == FALSE){
		$this->template->load('theme/admintheme/index','theme/admintheme/template/main/transaction/edit_confirmation_nonmember',$data);
		}
		else{
			$this->Model_transaction->change_status_nonmember(); // change Status Transaksi
			$data['url_redirect'] = base_url().'adminpanel/transaction/confirmation_nonmember';
            $this->template->load('theme/admintheme/index','theme/admintheme/template/system/success_edit',$data);
		}	
	}
}
?>