<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_article extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function count_article_active(){
	$this->db->where('status_news',2);
        return $this->db->count_all_results('news');
    }
    function fetch_article_active($limit,$start){
	$this->db->where('news.status_news',2);
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
	function get_search_article($keyword)
	{
		$this->db->like('title_news', $keyword);
		$this->db->or_like('content_news', $keyword);
		return $this->db->get('news');
	}
	
	function ajax_search_result($word)
	{
		$q = $this->get_search_article($word);
		if($q->num_rows() > 0)
		{
		foreach($q->result() as $news)
		{
			$title = preg_replace('/[^a-z0-9]+/','-',strtolower($news->title_news));
			?>
			<a href="<?php echo base_url('news/read/'.$news->id_news.'/'.$title);?>">
			<?php echo "<div class=\"divorange\">".$news->title_news."</div>"?></a><br/><?php
		}
		}else{
			echo "No results found";
		}
	}
	
	function normal_search_result($word)
	{
		$q = $this->get_search_article($word);
		if($q->num_rows() > 0)
		{
			return $q->result();
		}else{
			return FALSE;
		}
	}
    function get_article($id){
    $this->db->join('administrator', 'administrator.id_administrator = news.id_creator');
    $this->db->where('id_news', $id);
    $query = $this->db->get('news');
    if($query == true)  return $query->row_array();
    else return false;
    }
	function count_comment_active(){
		$this->db->where('status_comment',2);
		$this->db->where('id_news',$this->uri->segment(3));
        return $this->db->count_all_results('comment');
    }
    function fetch_comment_active($limit,$start){	
	$this->db->where('status_comment',2);
	$this->db->where('id_news',$this->uri->segment(3));
	$this->db->order_by('date_comment','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('comment');
	if($query->num_rows()>0){
				foreach ($query->result() as $row){
					$data[] = $row;
				}
				return $data;
            }
	else{
            return FALSE;
            }
    }
	function add_comment(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$comment = $this->input->post('comment');
		$id = $this->uri->segment(3);
		$data = array(
					'name_comment' => $name,
					'email' => $email,
					'comment' => $comment,
					'date_comment' => date('Y-m-d h:i:s'),
					'status_comment' =>1,
					'id_news' => $id,
				);
		$this->db->insert('comment',$data);
	}
	function count_slideshow(){
		$this->db->where('status_slideshow',1);
        return $this->db->count_all_results('slideshow');
    }
	function fetch_slideshow(){	
	$this->db->where('status_slideshow',2);
	$this->db->order_by('sort_order','ASC');
	$query = $this->db->get('slideshow');
	if($query->num_rows()>0){
				foreach ($query->result() as $row){
					$data[] = $row;
				}
				return $data;
            }
	else{
            return FALSE;
            }
    }
}