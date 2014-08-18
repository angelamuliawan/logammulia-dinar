<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    // function manage user
    function count_user(){
        return $this->db->count_all('user');
    }
    function fetch_user($limit,$start){
	$this->db->order_by('date_register','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('user');
	if($query->num_rows()>0)
            {
            foreach ($query->result() as $row)
		{
		$data[] = $row;
		}
            return $data;
            }
	else
            {
            return FALSE;
            }
    }
    function activate_key(){
	$str = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$random_word = str_shuffle($str);
	$random = substr($random_word,0,100);
	return $random;
    }
    function add_user(){
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$email = $this->input->post('email');
	$name = $this->input->post('name');
	$address = $this->input->post('address');
	$gender = $this->input->post('gender');
	$account = $this->input->post('account');
	$an = $this->input->post('atas_nama');
	$status = $this->input->post('status');
	$no_hp = $this->input->post('no_hp');
	$data = array(
	  'username' => $username,
	  'password' => sha1($password),
	  'email' => $email,
	  'name' => $name,
	  'address' => $address,
	  'gender' => $gender,
	  'date_register' => date("Y-m-d h:i:s"),
	  'activate_key' => $this->Model_user->activate_key(),
	  'status_user' => $status,
	  'account_number' => $account,
	  'atas_nama' => $an,
	  'no_hp' => $no_hp,
	);
	$this->db->insert('user',$data);
    }
    function edit_user(){
	$id = $this->uri->segment(4);
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$email = $this->input->post('email');
	$name = $this->input->post('name');
	$address = $this->input->post('address');
	$gender = $this->input->post('gender');
	$account = $this->input->post('account');
	$an = $this->input->post('atas_nama');
	$status = $this->input->post('status');
	$no_hp = $this->input->post('no_hp');
	if($password != ""){
	    $data = array(
	      'username' => $username,
	      'password' => sha1($password),
	      'email' => $email,
	      'name' => $name,
	      'address' => $address,
	      'gender' => $gender,
	      'status_user' => $status,
	      'account_number' => $account,
	      'atas_nama' => $an,
	      'no_hp' => $no_hp,
	    );
	}
	else{
	    $data = array(
	      'username' => $username,
	      'email' => $email,
	      'name' => $name,
	      'address' => $address,
	      'gender' => $gender,
	      'status_user' => $status,
	      'account_number' => $account,
	      'atas_nama' => $an,
	      'no_hp' => $no_hp,
	    );
	}
	$this->db->where('id_user',$id);
	$this->db->update('user',$data);
    }
    function get_user($id){
    $this->db->where('id_user', $id);
    $query = $this->db->get('user');
    if($query == true)  return $query->row_array();
    else return false;
    }
    
    
    // function manage back office
    function count_backoffice(){
	$this->db->where('admin_permission',0);
	return $this->db->count_all_results('administrator');
    }
    function fetch_backoffice($limit,$start){
	$this->db->where('admin_permission',0);
	$this->db->order_by('date_register','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('administrator');
	if($query->num_rows()>0)
            {
            foreach ($query->result() as $row)
		{
		$data[] = $row;
		}
            return $data;
            }
	else
            {
            return FALSE;
            }
    }
    function add_backoffice(){
	$name = $this->input->post('name');
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$email = $this->input->post('email');
	$data = array(
	  'username' => $username,
	  'password' => md5($password),
	  'email' => $email,
	  'name' => $name,
	  'date_register' => date("Y-m-d h:i:s"),
	  'activate_key' => $this->Model_user->activate_key(),
	  'admin_permission' => 0,
	);
	$this->db->insert('administrator',$data);
    }
     function edit_backoffice(){
	$id = $this->uri->segment(4);
	$name = $this->input->post('name');
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$email = $this->input->post('email');
	if($password != ""){
	    $data = array(
	      'username' => $username,
	      'password' => md5($password),
	      'email' => $email,
		'name' => $name,
	    );
	}
	else{
	    $data = array(
	      'username' => $username,
	      'email' => $email,
		'name' => $name,
	    );
	}
	$this->db->where('id_administrator',$id);
	$this->db->update('administrator',$data);
    }
    function get_backoffice($id){
    $this->db->where('id_administrator', $id);
    $query = $this->db->get('administrator');
    if($query == true) return $query->row_array();
    else return false;
    }
    
    // function manage Admin
    function count_admin(){
	$this->db->where('admin_permission',1);
	$this->db->or_where('admin_permission',2);
	return $this->db->count_all_results('administrator');
    }
    function fetch_admin($limit,$start){
	$this->db->where('admin_permission',1);
	$this->db->or_where('admin_permission',2);
	$this->db->order_by('date_register','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('administrator');
	if($query->num_rows()>0)
            {
            foreach ($query->result() as $row)
		{
		$data[] = $row;
		}
            return $data;
            }
	else
            {
            return FALSE;
            }
    }
    function add_admin(){
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$email = $this->input->post('email');
	$permission = $this->input->post('permission');
	$name = $this->input->post('name');
	$data = array(
	  'username' => $username,
	  'password' => md5($password),
	  'email' => $email,
	  'date_register' => date("Y-m-d h:i:s"),
	  'activate_key' => $this->Model_user->activate_key(),
	  'admin_permission' => $permission,
	  'name' => $name,
	);
	$this->db->insert('administrator',$data);
    }
     function get_admin($id){
    $this->db->where('id_administrator', $id);
    $query = $this->db->get('administrator');
    if($query == true) return $query->row_array();
    else return false;
    }
    function edit_admin(){
	$id = $this->uri->segment(4);
	$name = $this->input->post('name');
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$email = $this->input->post('email');
	if($password != ""){
	    $data = array(
	      'username' => $username,
	      'password' => md5($password),
	      'email' => $email,
	      'name' => $name
	    );
	}
	else{
	    $data = array(
	      'username' => $username,
	      'email' => $email,
	      'name' => $name
	    );
	}
	$this->db->where('id_administrator',$id);
	$this->db->update('administrator',$data);
    }
}