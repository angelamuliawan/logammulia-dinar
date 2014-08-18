<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_setting extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function setting(){
	$this->db->where('id_setting',1);
	$query = $this->db->get('setting');
	return $query->row_array();
    }
    function admin_login($username,$password){
	$this->db->select('*');
        $this->db->where('username', $username);  
        $this->db->where('password', md5($password));
        $query = $this->db->get('administrator', 1);
        if ($query->num_rows() == 1){
            return $query->row_array(); 
        }
	else{
	    return FALSE;
	}
    }
    function save_setting(){
	$title = $this->input->post('title');
	$rek = $this->input->post('no_rek');
	$desc = $this->input->post('desc');
	$fav = $this->input->post('favicon');
	$email = $this->input->post('email');
	$footer = $this->input->post('footer');
	$margin = $this->input->post('margin');
	$gadai = $this->input->post('gadai');
	$cicilan = $this->input->post('cicilan');
	$data = array(
	    'title_website' => $title,
	    'description_website' => $desc,
	    'fav_icon' => $fav,
	    'no_account' => $rek,
	    'email_website' => $email,
	    'footer' => $footer,
	    'margin_default' => $margin,
	    'biaya_titip_gadai' => $gadai,
		'administrasi_cicilan' => $cicilan
	);
	$this->db->where('id_setting',1);
	$this->db->update('setting',$data);
    }
	
	function get_session_admin($id){
	$this->db->where('id_administrator', $id);
	$query = $this->db->get('administrator');
	if($query == true)  return $query->row_array();
	else return false;
    }
	
	function get_session_member($username){
	$this->db->where('username', $username);
	$query = $this->db->get('user');
	if($query == true)  return $query->row_array();
	else return false;
    }
	function count_links(){
		return $this->db->count_all('links');
	}
	function fetch_links($limit,$start){
		$this->db->order_by('sort_order','ASC');
		$this->db->limit($limit,$start);
		$query = $this->db->get('links');
		if($query->num_rows()>0)
				{
				foreach ($query->result() as $row)
			{
			$data[] = $row;
			}
				return $data;
				}
		else{
				return FALSE;
			}
		}
	function fetch_links_active($limit,$start){
		$this->db->where('status_links',1);
		$this->db->order_by('sort_order','ASC');
		$this->db->limit($limit,$start);
		$query = $this->db->get('links');
		if($query->num_rows()>0)
				{
				foreach ($query->result() as $row)
			{
			$data[] = $row;
			}
				return $data;
				}
		else{
				return FALSE;
			}
	}
	function save_links(){
		$title = $this->input->post('title');
		$sort = $this->input->post('sort');
		$links = $this->input->post('links');
		$status = $this->input->post('status');
		$data = array(
				'title_links' => $title,
				'sort_order' => $sort,
				'links' => $links,
				'status_links' => $status
				);
		$this->db->insert('links',$data);
	}
	function get_links(){
		$id = $this->uri->segment(4);
		$this->db->where('id_links', $id);
		$query = $this->db->get('links');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function edit_links(){
		$title = $this->input->post('title');
		$sort = $this->input->post('sort');
		$links = $this->input->post('links');
		$status = $this->input->post('status');
		$data = array(
				'title_links' => $title,
				'sort_order' => $sort,
				'links' => $links,
				'status_links' => $status
				);
		$id = $this->uri->segment(4);
		$this->db->where('id_links', $id);
		$this->db->update('links',$data);
	}
}