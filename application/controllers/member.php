<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller
{
	function __construct()
	{
	 	parent::__construct();
		
		//load models
		$this->load->model('frontpage/Model_product');
		$this->load->model('frontpage/Model_article');
		$this->load->model('frontpage/Model_member');
		$this->load->library('form_validation');
		$this->load->model('Model_captcha');
	}
	
	
	//Dipanggil dengan ajax
	public function getCaptcha()
	{
		$caps = $this->Model_captcha->createCaptcha();
		$this->Model_captcha->setCaptchaCode($caps['word']);
		echo $caps['image'];
	}
	
	
	

	public function register()
	{
		//get data
		$nama = $this->input->post('txtNama');
		$email = $this->input->post('txtEmail');
		$username = $this->input->post('txtUsername');
		$newpass = $this->input->post('txtNewPass');
		$conpass = $this->input->post('txtConPass');
		$alamat = $this->input->post('txtAlamat');
		$gender = $this->input->post('txtGender');
		$phone = $this->input->post('txtPhone');
		$namarek = $this->input->post('txtNamaRek');
		$norek = $this->input->post('txtNoRek');
		$cap = $this->input->post('txtCaptcha');
		
		//set rules
		$this->form_validation->set_rules('txtNama','Nama','required');
		$this->form_validation->set_rules('txtEmail','Email','required|email');
		$this->form_validation->set_rules('txtUsername','Username','required');
		$this->form_validation->set_rules('txtNewPass','Password baru','required');
		$this->form_validation->set_rules('txtConPass','Konfirmasi password','required');
		$this->form_validation->set_rules('txtAlamat','Alamat','required');
		$this->form_validation->set_rules('txtGender','Gender','required');
		$this->form_validation->set_rules('txtPhone','No.Phone','required|numeric');
		$this->form_validation->set_rules('txtNamaRek','Nama Rekening','required');
		$this->form_validation->set_rules('txtNoRek','Nomor Rekening','required|numeric');
		$this->form_validation->set_rules('txtCaptcha','Kode Captcha','required');
		$this->form_validation->set_rules('txtAgree','Agreement','required');
		$this->form_validation->set_message('required','Field %s wajib diisi');
		$this->form_validation->set_message('email','Email tidak valid');
		$this->form_validation->set_message('numeric','Field %s harus numeric');
		
		//repopulate data for form
		$data = array(
		'username'=>$username,'nama'=>$nama,'alamat'=>$alamat,'email'=>$email,'phone'=>$phone,'namarek'=>$namarek,
		'norek'=>$norek, 'gender'=>$gender, 'password'=>$newpass
		);
		
		if($this->Model_captcha->checkCaptcha($cap) === FALSE)
		{
			$this->Model_member->setUpdData('error_regis',"Wrong captcha code or session is expired");
			$this->Model_member->setRegData($data);
			redirect(base_url('register/member'));
		}
		else if($newpass != $conpass)
		{
			$this->Model_member->setUpdData('error_regis','Password konfirmasi tidak cocok');
			$this->Model_member->setRegData($data);
			redirect(base_url('register/member'));
		}
		else if($this->form_validation->run() === FALSE)
		{
			$this->Model_member->setUpdData('error_regis',validation_errors());
			$this->Model_member->setRegData($data);
			redirect(base_url('register/member'));
		}
		else if($this->checkUsername($username) === FALSE)
		{
			$this->Model_member->setUpdData('error_regis',"Username tidak tersedia");
			$this->Model_member->setRegData($data);
			redirect(base_url('register/member'));
		}
		else{
			$this->Model_member->insertMember($data);
			$this->Model_member->sendActivationMail($username, $email);
			$this->Model_member->setUpdData('info','Registrasi berhasil. Cek email anda untuk aktivasi akun');
			redirect(base_url());
		}
	}
	
	public function checkUsername($username)
	{
		return $this->Model_member->checkUsername($username);
	}
	
	public function isAvailable($username)
	{
		$b = $this->checkUsername($username);
		if($b === TRUE)
		{
			echo "1";
		}else{
			echo "0";
		}
	}
	
	//Aktivasi akun
	public function activate($username, $key)
	{
		if($this->Model_member->getActivationCode($username) == $key)
		{
			$this->Model_member->updateMemberStatus($username, 1);
			$this->Model_member->setUpdData('info','Akun berhasil diaktivasi. Silahkan login.');
			redirect(base_url());
		}else{
			redirect(base_url());
		}
	}
	
	//Forgot Pass + new pass
	public function forgotpass()
	{
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Forgot Password - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
                //  menambahkan breadcrumbs
                $this->breadcrumb->append_crumb("Home", base_url());
                $this->breadcrumb->append_crumb('Forgot Password',base_url());
				
                $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		//$data['result_product'] = $this->Model_product->fetch_product_home(5,0);
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		//$data['result_logam_mulia'] = $this->Model_product->fetch_logam_mulia();		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		$data['username'] = $this->Model_member->getLogData();
		
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/member/forgot_password",$data);

	}
	
	public function checkmail()
	{
		$email = $this->input->post('txtEmail');
		$username = $this->Model_member->getUsernameByEmail($email);
		if($username=="")
		{
			$this->Model_member->setUpdData('error_forgotpass','Email tidak valid atau tidak terdaftar pada sistem kami');
			redirect(base_url('member/forgotpass'));
		}else{
			$this->Model_member->sendForgotPassMail($username, $email);
			$this->Model_member->setUpdData('info_forgotpass','Email berisi link untuk mengubah password telah dikirim.<br/>Silahkan cek email anda');
			redirect(base_url('member/forgotpass'));
		}
	}
	
	public function newpass($username, $key)
	{
		if($this->Model_member->getActivationCode($username) != $key)
		{
			redirect(base_url());
		}else{
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','New Password - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
                //  menambahkan breadcrumbs
                $this->breadcrumb->append_crumb("Home", base_url());
                $this->breadcrumb->append_crumb('New Password',base_url());
				
                $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		//$data['result_product'] = $this->Model_product->fetch_product_home(5,0);
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		//$data['result_logam_mulia'] = $this->Model_product->fetch_logam_mulia();		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		$data['username'] = $username;
		$data['key'] = $key;
		if($data['loginstat']==1){ redirect(base_url()); }
		
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/member/new_password",$data);
		}
	}
	
	public function updatePass()
	{
		//get variable
		$newpass = $this->input->post('txtNewPass');
		$conpass = $this->input->post('txtConPass');
		$username = $this->input->post('txtUsername');
		$key = $this->input->post('txtKey');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtNewPass','Password baru','required');
		$this->form_validation->set_rules('txtConPass','Konfirmasi password','required|matches[txtNewPass]');
		$this->form_validation->set_message('required','Field %s wajib diisi');
		if($this->form_validation->run() === FALSE)
		{
			$this->Model_member->setUpdData('error_newpass',validation_errors());
			redirect(base_url('member/newpass/'.$username.'/'.$key));
		}else{
			$this->Model_member->updatePass($username, $newpass);
			$this->Model_member->setUpdData('info','Password berhasil diganti. Silahkan coba login');
			redirect(base_url());
		}
		
	}
	
	public function login()
	{
		//get data
		$id = $this->input->post('username');
		$pass = $this->input->post('password');
		
		//set rules
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_message('required','Field %s harus diisi');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->Model_member->setUpdData('error_login',validation_errors());
			$this->Model_member->setLogData($id);
			redirect(base_url());
		}
		else if($this->Model_member->isActive($id) === FALSE)
		{
			$this->Model_member->setUpdData('error_login','Akun anda belum diaktivasi');
			$this->Model_member->setLogData($id);
			redirect(base_url());
		}
		else if($this->Model_member->isValidLogin($id, $pass)){
			$this->Model_member->setMemberSession($id);
			redirect(base_url('memberarea/profile'));
		}else{
			$this->Model_member->setUpdData('error_login','Username/password salah');
			$this->Model_member->setLogData($id);
			redirect(base_url());
		}
	}
	
	public function logout()
	{
		$this->Model_member->unsetMemberSession();
		redirect(base_url());
	}
}