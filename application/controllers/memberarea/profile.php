<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct(){
        parent::__construct();
        // Load Model
		$this->load->model('frontpage/Model_member');
		$this->load->model('frontpage/Model_product');
		$this->load->model('frontpage/Model_article');
    }
	
	function update_avatar()
	{
		$username = $this->input->post('txtUsername');
		$filename = $this->Model_member->generateAvatarName($username);
		$config['file_name'] = $filename;
		$config['upload_path'] = './asset/images/avatars/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '200'; //200 KB
		
		$this->load->library('upload', $config);
		if( $this->upload->do_upload() === FALSE)
		{
			$this->Model_member->setUpdData('avatar_error', $this->upload->display_errors());
			redirect(base_url('memberarea/profile/avatar'));
		}else{
			$img = $this->upload->data();
			$this->Model_member->updateUserImage($username, $img['file_name']); 
			$this->Model_member->setUpdData('avatar_info', 'Avatar berhasil diupdate');
			redirect(base_url('memberarea/profile/avatar'));
		}
	}
	
	function avatar()
	{
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Profile - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
                //  menambahkan breadcrumbs
                $this->breadcrumb->append_crumb("Home", base_url());
                $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
				$this->breadcrumb->append_crumb('Change Avatar',base_url('memberarea/avatar'));
                $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		$data['result_product'] = $this->Model_product->fetch_product_home(5,0);
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		$data['result_logam_mulia'] = $this->Model_product->fetch_logam_mulia();		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		
		// Load Profile Function
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		if($result == FALSE) redirect(base_url());
		$data['username'] = $result['username'];
		$data['image_user'] = $result['image_user'];
        $data['email'] = $result['email'];
        $data['address'] = $result['address'];
		$data['no_rek'] = $result['account_number'];
		$data['an'] = $result['atas_nama'];
		$data['no_hp'] = $result['no_hp'];
		$data['date_regis'] = $result['date_register'];
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/member/edit_avatar",$data);
	}
	
	function update_password()
	{
		$username = $this->input->post('txtUsername');
		$oldpass = $this->input->post('txtOldPass');
		$newpass = $this->input->post('txtNewPass');
		$conpass = $this->input->post('txtConPass');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtOldPass','Password lama','required');
		$this->form_validation->set_rules('txtNewPass','Password baru','required|min_length[6]');
		$this->form_validation->set_rules('txtConPass','Konfirmasi password','required|matches[txtNewPass]');
		$this->form_validation->set_message('required','Field %s wajib diisi');
		$this->form_validation->set_message('min_length','Field %s harus memiliki minimal 6 karakter');
		$this->form_validation->set_message('matches','Konfirmasi password tidak sama dengan password baru');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->Model_member->setUpdData('pass_error',validation_errors());
			redirect(base_url('memberarea/profile/password'));
		}else if($this->Model_member->checkPassword($username, $oldpass) === FALSE)
		{
			$this->Model_member->setUpdData('pass_error','Password lama salah. Coba lagi');
			redirect(base_url('memberarea/profile/password'));
		}else{
			$this->Model_member->updatePass($username, $newpass);
			$this->Model_member->setUpdData('pass_info','Password berhasil diupdate');
			redirect(base_url('memberarea/profile/password'));
		}
	}
	
	function password()
	{
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Profile - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
                //  menambahkan breadcrumbs
                $this->breadcrumb->append_crumb("Home", base_url());
                $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
				$this->breadcrumb->append_crumb('Change Password',base_url('memberarea/password'));
                $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		$data['result_product'] = $this->Model_product->fetch_product_home(5,0);
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		$data['result_logam_mulia'] = $this->Model_product->fetch_logam_mulia();		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		
		// Load Profile Function
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		if($result == FALSE) redirect(base_url());
		$data['username'] = $result['username'];
		$data['image_user'] = $result['image_user'];
        $data['email'] = $result['email'];
        $data['address'] = $result['address'];
		$data['no_rek'] = $result['account_number'];
		$data['an'] = $result['atas_nama'];
		$data['no_hp'] = $result['no_hp'];
		$data['date_regis'] = $result['date_register'];
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/member/edit_password",$data);
	}
	
	function update()
	{
		$username = $this->input->post('txtUsername');
		$email = $this->input->post('txtEmail');
		$alamat = $this->input->post('txtAlamat');
		$norek = $this->input->post('txtNoRek');
		$namarek = $this->input->post('txtNamaRek');
		$phone = $this->input->post('txtPhone');
		$name = $this->input->post('txtName');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtEmail','Email','required|email');
		$this->form_validation->set_rules('txtName','Name','required');
		$this->form_validation->set_rules('txtAlamat','Alamat','required');
		$this->form_validation->set_rules('txtNoRek','Nomor Rekening','required|numeric');
		$this->form_validation->set_rules('txtNamaRek','Atas Nama','required');
		$this->form_validation->set_rules('txtPhone','Phone','required|numeric');
		$this->form_validation->set_message('required','Field %s wajib diisi');
		$this->form_validation->set_message('email','Field %s tidak valid (format email : nama@domain.com)');
		$this->form_validation->set_message('numeric','Field %s hanya boleh diisi angka');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->Model_member->setUpdData('update_error', validation_errors());
			redirect(base_url('memberarea/profile/edit'));
		}else{
			$data = array(
			'username'=>$username, 'name'=>$name, 'email'=>$email, 'alamat'=>$alamat,'norek'=>$norek, 'namarek'=>$namarek, 'phone'=>$phone
			);
			$this->Model_member->updateMember($data);
			$this->Model_member->setUpdData('update_info', 'Profile berhasil diupdate');
			redirect(base_url('memberarea/profile/edit'));
		}
	}
	
    function index(){
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Profile - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
                //  menambahkan breadcrumbs
                $this->breadcrumb->append_crumb("Home", base_url());
                $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
                $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		$data['result_product'] = $this->Model_product->fetch_product_home(5,0);
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		$data['result_logam_mulia'] = $this->Model_product->fetch_logam_mulia();		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		
		// Load Profile Function
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		if($result == FALSE) redirect(base_url());
		$data['username'] = $result['username'];
		$data['image_user'] = $result['image_user'];
        $data['email'] = $result['email'];
        $data['address'] = $result['address'];
		$data['no_rek'] = $result['account_number'];
		$data['an'] = $result['atas_nama'];
		$data['no_hp'] = $result['no_hp'];
		$data['date_regis'] = $result['date_register'];
		$data['name'] = $result['name'];
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/member/profile",$data);
    }
	
	function edit()
	{
		$var = $this->Model_setting->setting();
		
		// Menentukan Variable
		$this->template->set('title','Profile - '.$var['title_website']); // Memberi Judul Halaman Admin
		$this->template->set('footer',$var['footer']); // Memberi Footer
		$this->template->set('meta_desc',$var['description_website']); // memberi meta description
		$this->template->set('favicon',$var['fav_icon']); // memberi meta description
		
                //  menambahkan breadcrumbs
                $this->breadcrumb->append_crumb("Home", base_url());
                $this->breadcrumb->append_crumb('Membearea',base_url('memberarea'));
				$this->breadcrumb->append_crumb('Edit Profile',base_url('memberarea/edit'));
                $this->template->set('breadcrumbs',$this->breadcrumb->output());
        
		// load default function
		$data['result_product'] = $this->Model_product->fetch_product_home(5,0);
		$data['result_news'] = $this->Model_article->fetch_article_active(4,0);
		$data['result_logam_mulia'] = $this->Model_product->fetch_logam_mulia();		
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$data['msg'] = $this->Model_member->getUpdData();
		$data['regis'] = $this->Model_member->getRegData();
		
		// Load Profile Function
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$data['username'] = $result['username'];
		$data['image_user'] = $result['image_user'];
        $data['email'] = $result['email'];
        $data['address'] = $result['address'];
		$data['no_rek'] = $result['account_number'];
		$data['an'] = $result['atas_nama'];
		$data['no_hp'] = $result['no_hp'];
		$data['date_regis'] = $result['date_register'];
		$data['name'] = $result['name'];
		$this->template->load("theme/".$var['default_theme']."/index","theme/".$var['default_theme']."/template/member/edit_profile",$data);
	}
}