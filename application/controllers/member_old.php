<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller
{
	function __construct()
	{
	 	parent::__construct();
		
		//load models
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
			redirect(base_url());
		}
		else if($newpass != $conpass)
		{
			$this->Model_member->setUpdData('error_regis','Password konfirmasi tidak cocok');
			$this->Model_member->setRegData($data);
			redirect(base_url());
		}
		else if($this->form_validation->run() === FALSE)
		{
			$this->Model_member->setUpdData('error_regis',validation_errors());
			$this->Model_member->setRegData($data);
			redirect(base_url());
		}
		else if($this->checkUsername($username) === FALSE)
		{
			$this->Model_member->setUpdData('error_regis',"Username tidak tersedia");
			$this->Model_member->setRegData($data);
			redirect(base_url());
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
			redirect(base_url());
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