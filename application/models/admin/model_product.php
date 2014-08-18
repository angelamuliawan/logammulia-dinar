<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_product extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function add_product(){
        $name = $this->input->post('name_product');
        $stock = $this->input->post('stock');
		$gram = $this->input->post('gram');
        $desc = $this->input->post('desc');
        $base = $this->input->post('base_price');
		$sort = $this->input->post('sort_order');
            $data = array(
                        'name_product' => $name,
                        'description_product' => $desc,
                        'stock' => $stock,
                        'base_price' => $base,
                        'date_insert' => date("Y-m-d h:i:s"),
						'sort_order' => $sort,
						'gram' => $gram
                    );
        $this->db->insert('product',$data);
    }
     function count_product(){
        return $this->db->count_all('product');
    }
    function fetch_product($limit,$start){
	$this->db->order_by('sort_order','ASC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('product');
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
    function get_product($id){
    $this->db->where('id_product', $id);
    $query = $this->db->get('product');
    if($query == true)  return $query->row_array();
    else return false;
    }
    function fetch_product_margin($limit,$start){
	$this->db->order_by('date_update_margin','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('product');
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
    function edit_product(){
	$id = $this->uri->segment(4);
	$product = $this->Model_product->get_product($id);
        $name = $this->input->post('name_product');
        $stock = $this->input->post('stock');
        $desc = $this->input->post('desc');
        $base = $this->input->post('base_price');
		$sort = $this->input->post('sort_order');
		$gram = $this->input->post('gram');
            $data = array(
                        'name_product' => $name,
                        'description_product' => $desc,
                        'stock' => $stock,
                        'base_price' => $base,
						'sell_price' => $base+$product['margin'],
                        'date_update' => date("Y-m-d h:i:s"),
						'sort_order' => $sort,
						'gram' => $gram
                    );
		$this->db->where('id_product',$id);
        $this->db->update('product',$data);
    }
    function edit_margin(){
	$id = $this->uri->segment(4);
        $margin = $this->input->post('margin');
	$base_price = $this->input->post('base_price');
	$sell = $margin+$base_price;
            $data = array(
                        'margin' => $margin,
			'sell_price' => $sell,
                        'date_update_margin' => date("Y-m-d h:i:s"),
                    );
	$this->db->where('id_product',$id);
        $this->db->update('product',$data);
    }
	function rekening_bank($a,$b){
		$this->db->limit($a,$b);
		$query = $this->db->get('rekening_bank');
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
	function count_bank(){
		return $this->db->count_all('rekening_bank');
	}
	function save_rekening(){
		$nama = $this->input->post('nama');
		$no_rek = $this->input->post('no_rek');
		$an = $this->input->post('atas_nama');
		$data = array(
					'nama_bank' => $nama,
					'nomor_rekening' => $no_rek,
					'atas_nama' => $an,
				);
		$this->db->insert('rekening_bank',$data);
	}
	function edit_rekening(){
		$id = $this->uri->segment(4);
		$nama = $this->input->post('nama');
		$no_rek = $this->input->post('no_rek');
		$an = $this->input->post('atas_nama');
		$data = array(
					'nama_bank' => $nama,
					'nomor_rekening' => $no_rek,
					'atas_nama' => $an,
				);
		$this->db->where('id_rekening_bank',$id);
		$this->db->update('rekening_bank',$data);
	}
	function get_bank($id){
    $this->db->where('id_rekening_bank', $id);
    $query = $this->db->get('rekening_bank');
    if($query == true)  return $query->row_array();
    else return false;
    }
	
	function count_harga_beli(){
		return $this->db->count_all('harga_beli');
	}
	function fetch_harga_beli($limit,$start){
	$this->db->order_by('date_harga_beli','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('harga_beli');
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
	function get_harga_beli($id){
    $this->db->where('id_harga_beli', $id);
    $query = $this->db->get('harga_beli');
    if($query == true)  return $query->row_array();
    else return false;
    }
}