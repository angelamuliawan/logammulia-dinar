<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_article extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function add_new(){
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $status = $this->input->post('status');
            $data = array(
                        'title_news' => $title,
                        'content_news' => $content,
                        'status_news' => $status,
                        'id_creator' => $this->session->userdata('id_admin'),
                        'date_insert' => date("Y-m-d h:i:s"),
                    );
        $this->db->insert('news',$data);
    }
    function count_article(){
        return $this->db->count_all('news');
    }
    function fetch_article($limit,$start){
        $this->db->join('administrator', 'administrator.id_administrator = news.id_creator');
	$this->db->order_by('news.date_insert','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('news');
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
    function get_article($id){
    $this->db->where('id_news', $id);
    $query = $this->db->get('news');
    if($query == true)  return $query->row_array();
    else return false;
    }
    function edit_article(){
        $id = $this->uri->segment(4);
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $status = $this->input->post('status');
        $data = array(
            'title_news' => $title,
            'content_news' => $content,
            'status_news' => $status,
	    'date_update' => date("Y-m-d h:i:s"),
            );
        $this->db->where('id_news',$id);
        $this->db->update('news',$data);
    }
	function count_slideshow(){
        return $this->db->count_all('slideshow');
    }
    function fetch_slideshow($limit,$start){
	$this->db->order_by('sort_order','ASC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('slideshow');
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
	function add_slideshow(){
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $img = $this->input->post('img');
        $status = $this->input->post('status');
        $sort = $this->input->post('sort');
            $data = array(
                        'title_slideshow' => $title,
                        'link_url' => $url,
                        'image_slideshow' => $img,
                        'status_slideshow' => $status,
                        'sort_order' => $sort,
                        'date_slideshow' => date("Y-m-d h:i:s"),
                    );
        $this->db->insert('slideshow',$data);
    }
	function get_slideshow($id){
    $this->db->where('id_slideshow', $id);
    $query = $this->db->get('slideshow');
    if($query == true)  return $query->row_array();
    else return false;
    }
	function save_slideshow(){
		$id = $this->uri->segment(4);
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $img = $this->input->post('img');
        $status = $this->input->post('status');
        $sort = $this->input->post('sort');
            $data = array(
                        'title_slideshow' => $title,
                        'link_url' => $url,
                        'image_slideshow' => $img,
                        'status_slideshow' => $status,
                        'sort_order' => $sort,
                    );
		$this->db->where('id_slideshow',$id);
        $this->db->update('slideshow',$data);
    }
	function count_comment(){
        return $this->db->count_all('comment');
    }
    function fetch_comment($limit,$start){
	$this->db->order_by('comment.date_comment','DESC');
        $this->db->join('news', 'news.id_news = comment.id_news');
	$this->db->limit($limit,$start);
	$query = $this->db->get('comment');
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
	function get_comment($id){
    $this->db->where('id_comment', $id);
    $query = $this->db->get('comment');
    if($query == true)  return $query->row_array();
    else return false;
    }
	function save_comment(){
		$comment = $this->input->post('comment');
		$status =  $this->input->post('status');
		$data = array('comment' => $comment,'status_comment' => $status);
		$this->db->where('id_comment',$this->uri->segment(4));
		$this->db->update('comment',$data);
	}
}