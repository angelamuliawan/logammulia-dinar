<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_member extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	//------- Untuk manipulasi db user
	
	public function updateMemberStatus($username, $n)
	{
		//0 = nonaktif, 1=aktif
		$this->db->set('status_user', $n);
		$this->db->where('username', $username);
		$this->db->update('user');
	}
	
	public function insertMember($m)
	{
		$this->db->set('username', $m['username']);
		$this->db->set('password', $this->generatePassword($m['password']));
		$this->db->set('email', $m['email']);
		$this->db->set('name', $m['nama']);
		$this->db->set('address', $m['alamat']);
		$this->db->set('gender', $m['gender']);
		$this->db->set('date_register', date('Y-m-d H:i:s'));
		$this->db->set('status_user', 0);
		$this->db->set('account_number',$m['norek']);
		$this->db->set('atas_nama',$m['namarek']);
		$this->db->set('no_hp',$m['phone']);
		$this->db->set('activate_key', $this->getActivationCode($m['username']));
		$this->db->insert('user');
	}
	
	public function updateMember($m)
	{
		$this->db->set('email', $m['email']);
		//$this->db->set('name', $m['nama']);
		$this->db->set('address', $m['alamat']);
		//$this->db->set('gender', $m['jk']);
		$this->db->set('account_number',$m['norek']);
		$this->db->set('atas_nama',$m['namarek']);
		$this->db->set('no_hp',$m['phone']);
		$this->db->set('name',$m['name']);
		$this->db->where('username', $m['username']);
		$this->db->update('user');
	}
	
	//------------------------------------------
	
	//------- Untuk membuat, memanggil, dan mengecek Session Member
	public function setMemberSession($id)
	{
		$this->db->select(array('id_user','username'));
		$sql = $this->db->get('user')->result();
		$main_id='';
		foreach($sql as $mem)
		{
			if($mem->username == $id)
			{
				$main_id = $mem->id_user;
				break;
			}
		}
		
		$data = array('tgs_id_member'=>$main_id,'tgs_username_member'=>$id, 'tgs_key_member'=>sha1($id));
		$this->session->set_userdata($data);
	}
	
	public function unsetMemberSession()
	{
		$data = array('tgs_username_member'=>'', 'tgs_key_member'=>'');
		$this->session->unset_userdata($data);
	}
	
	public function getMemberSession()
	{ 
                if($this->session->all_userdata()!=NULL)
		return $this->session->all_userdata();
                else
                return false;
	}
	
	public function isValidSession($session)
	{
		$stat=0;
		if(!isset($session['tgs_username_member']) || !isset($session['tgs_key_member']))
		{
			$stat=0;
		}else{
		
		if(sha1($session['tgs_username_member']) == $session['tgs_key_member']){$stat=1;} 
		
		}
		return $stat;
	}
	//---------------------------------------------------------------------------------------
	
	//----- Untuk mengirim dan mengeset pesan error login & username [spy user gk ketik ulang] dan regis
	public function getLogData()
	{
		$id = $this->session->flashdata('log_id');
		return $id;
	}
	
	public function setLogData($id)
	{
		$this->session->set_flashdata('log_id',$id);
	}
	
	public function getRegData()
	{
		$data = $this->session->flashdata('reg_data');
		return $data;
	}
	
	public function setRegData($array)
	{
		$this->session->set_flashdata('reg_data', $array);
	}
	
	public function getUpdData()
	{
		$data = array('key'=>$this->session->flashdata('update_key'), 'msg'=>$this->session->flashdata('update_msg'));
		return $data;
	}
	
	public function setUpdData($key, $msg)
	{
		$this->session->set_flashdata('update_key', $key);
		$this->session->set_flashdata('update_msg', $msg);
	}
	//--------------------------------------------------------
    
	function getMemberData()
	{
		return $this->db->get('user')->result();
	}
	
	function getMemberDataBy($username)
	{
		return $this->db->get_where('user', array('username'=>$username))->row();
	}
	
	function checkUsername($id)
	{
		$stat = TRUE;
		$this->db->select('username');
		$sql = $this->db->get('user');
		foreach($sql->result() as $u)
		{
			if($u->username === $id)
			{
				$stat = FALSE; break;
			}
		}
		return $stat;
	}
	
	function getActivationCode($username)
	{
		$random = 'act_code'; //Salting code
		return sha1($username.$random);
	}
	
	function checkActivationCode($username, $code)
	{
		$stat = 0;
		if($code == $this->getActivationCode($username))
		{
			$stat=1;
		}
		return $stat;
	}
	
	function isValidLogin($id, $pass)
	{
		$sql = $this->getMemberData();
		$fg = false;
		foreach($sql as $mem)
		{
			if($mem->username == $id && $mem->password == $this->generatePassword($pass))
			{
				$fg = true;
				break;
			}
		}
		return $fg;
	}
	
	function isActive($username)
	{
		$stat=TRUE;
		$sql = $this->getMemberData();
		foreach($sql as $mem)
		{
			if($mem->username == $username)
			{
				if($mem->status_user == 0)
				{
					$stat=FALSE;
				}
				break;
			}
		}
		return $stat;
	}
	
	//----Password
	public function forgotPassword($email)
	{
		$sql = $this->getMemberData();
		foreach($sql as $mem)
		{
			if($mem->email == $email)
			{
				$username = $mem->username;
				$actcode = $this->getActivationCode($username);
				$link = base_url("member/member/changePass/".$username."/".$actcode);
				$this->load->library('email');
				$this->email->from('contact@tamartest.zz.mu', 'Admin Tamar Gold Shop');
				$this->email->to($email);
				$this->email->subject('Forgot Password Request');
				$this->email->message('Anda telah mengajukan fitur Forgot Password.
					   Kode Aktivasi : '.$actcode.'
					   Link Aktivasi : '.$link);
				$this->email->send();
				break;
			}
		}
	}
	
	public function updatePass($username, $pass)
	{
		$pass_enc = $this->generatePassword($pass);
		$this->db->set('password',$pass_enc);
		$this->db->where('username',$username);
		$this->db->update('user');
	}
	
	public function checkPassword($username, $pass)
	{
		$this->db->select('username','password');
		$this->db->where(array ('username'=>$username, 'password'=>$this->generatePassword($pass)));
		if($this->db->count_all_results('user') > 0)
		{
			return TRUE;
		}else{ return FALSE; }
	}
	
	function generatePassword($pass)
	{
		return sha1($pass);
	}
	
	//Mail
	function sendActivationMail($username, $email)
	{
		$this->load->library('email');
		$this->email->from('contact@tamartest.zz.mu', 'Admin Tamar Gold Shop');
		$this->email->to($email);
		$this->email->subject('Account Activation');
		$this->email->message('Terima kasih telah melakukan registrasi pada website Tamar Gold Shop.
					   Kode Aktivasi : '.($this->getActivationCode($username)).'
					   Link Aktivasi : '.base_url('member/activate/'.$username.'/'.$this->getActivationCode($username)));
		$this->email->send();
	}
	
	function sendForgotPassMail($username, $email)
	{
		$this->load->library('email');
		$this->email->from('contact@tamartest.zz.mu', 'Admin Tamar Gold Shop');
		$this->email->to($email);
		$this->email->subject('Forgot Password');
		$this->email->message('Silahkan membuka link berikut untuk membuat password baru untuk akun anda.
					   Kode Aktivasi : '.($this->getActivationCode($username)).'
					   Link Aktivasi : '.base_url('member/newpass/'.$username.'/'.$this->getActivationCode($username)));
		$this->email->send();
	}
	
	function getUsernameByEmail($email)
	{
		$this->db->where('email', $email);
		$q = $this->db->get('user')->row();
		return $q->username;
	}
	
	//Avatar atau profile picture
	public function generateAvatarName($username) //biar gk ada nama jpg yg tabrakan
	{
		return $username.'-'.rand(1000,9999);
	}
	
	public function updateUserImage($username, $path)
	{
		$fullpath = base_url('asset/images/avatars').'/'.$path;
		$this->db->set('image_user', $fullpath);
		$this->db->where('username', $username);
		$this->db->update('user');
	}
}