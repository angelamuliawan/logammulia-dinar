<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_transaction extends CI_Model{
	function __construct(){
        parent::__construct();
    }
	// fungsi transaction member yang bayar cash
	function count_transaction_member(){
		$this->db->where('cicilan',1);
		return $this->db->count_all_results('order');
	}
	function fetch_transaction_member($limit,$start){
    $this->db->join('product', 'product.id_product = order.id_product');
    $this->db->join('user', 'user.id_user = order.id_user');
	$this->db->where('cicilan',1);
	$this->db->order_by('order.date_order','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('order');
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
	function fetch_all_transaction_member(){
    $this->db->join('product', 'product.id_product = order.id_product');
    $this->db->join('user', 'user.id_user = order.id_user');
	$this->db->where('cicilan',1);
	$this->db->order_by('order.date_order','ASC');
	$query = $this->db->get('order');
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
	function fetch_all_transaction_nonmember(){
    $this->db->join('product', 'product.id_product = order_nonmember.id_product');
	$this->db->order_by('order_nonmember.date_order','ASC');
	$query = $this->db->get('order_nonmember');
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
	function fetch_all_sell(){
	$this->db->join('product', 'product.id_product = jual.id_product');
	$this->db->join('user', 'jual.id_user = user.id_user');
	$this->db->order_by('jual.date_jual','ASC');
	$query = $this->db->get('jual');
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
	function get_transaction_member($id){
		$this->db->join('product', 'product.id_product = order.id_product');
		$this->db->join('user', 'user.id_user = order.id_user');
		$this->db->where('id_order', $id);
		$this->db->where('cicilan',1);
		$query = $this->db->get('order');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function change_status(){
		$status = $this->input->post('status');
		$data = array(
					'status_order' => $status,
				);
		$this->db->where('id_order',$this->uri->segment(4));
		$this->db->update('order',$data);
	}
	// fungsi transaction non member yang bayar cash
	function count_transaction_nonmember(){
		return $this->db->count_all('order_nonmember');
	}
	function fetch_transaction_nonmember($limit,$start){
    $this->db->join('product', 'product.id_product = order_nonmember.id_product');
	$this->db->order_by('order_nonmember.date_order','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('order_nonmember');
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
	function get_transaction_nonmember($id){
		$this->db->join('product', 'product.id_product = order_nonmember.id_product');
		$this->db->where('id_order_nonmember', $id);
		$query = $this->db->get('order_nonmember');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function change_status_nonmember(){
		$status = $this->input->post('status');
		$data = array(
					'status_order' => $status,
				);
		$this->db->where('id_order_nonmember',$this->uri->segment(4));
		$this->db->update('order_nonmember',$data);
	}
	// fungsi transaction member yang bayar cicil
	function count_cicilan(){
		$this->db->where('cicilan',2);
		return $this->db->count_all_results('order');
	}
	function fetchAllCicilan(){
    $this->db->join('product', 'product.id_product = order.id_product');
    $this->db->join('user', 'user.id_user = order.id_user');
    $this->db->join('cicilan', 'cicilan.date_mulai_cicilan = order.date_order');
	$this->db->where('cicilan',2);
	$this->db->order_by('order.date_order','ASC');
	$query = $this->db->get('order');
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
	function fetch_cicilan($limit,$start){
    $this->db->join('product', 'product.id_product = order.id_product');
    $this->db->join('user', 'user.id_user = order.id_user');
    $this->db->join('cicilan', 'cicilan.date_mulai_cicilan = order.date_order');
	$this->db->where('cicilan',2);
	$this->db->order_by('order.date_order','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('order');
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
	function count_cicilan_detail(){
		$this->db->where('id_cicilan',$this->uri->segment(4));
		return $this->db->count_all_results('cicilan_detail');
	}
	function fetch_cicilan_detail(){
	$this->db->select('cicilan.id_user,cicilan.jangka_waktu,cicilan.harga_pas_beli,cicilan_detail.cannot_pay,cicilan.biaya_titip
	,cicilan_detail.date_jatuh_tempo,cicilan_detail.status_cicilan,cicilan_detail.date_terbayar,order.qty,cicilan_detail.id_cicilan_detail');
	$this->db->join('cicilan', 'cicilan.id_cicilan = cicilan_detail.id_cicilan');
	$this->db->join('order', 'order.id_order = cicilan.id_order');
	$this->db->where('cicilan.id_cicilan',$this->uri->segment(4));
	$this->db->order_by('cicilan_detail.date_jatuh_tempo','ASC');
	$query = $this->db->get('cicilan_detail');
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
	function get_cicilan($id){
		$this->db->join('product', 'product.id_product = order.id_product');
		$this->db->join('user', 'user.id_user = order.id_user');
		$query = $this->db->get('order');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function get_cicilan2($id){
		$this->db->join('order', 'cicilan.id_order = order.id_order');
		$this->db->join('product', 'product.id_product = order.id_product');
		$this->db->join('user', 'user.id_user = order.id_user');
		$query = $this->db->get('cicilan');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function get_cicilan_detail($id){
		$this->db->join('cicilan','cicilan_detail.id_cicilan = cicilan.id_cicilan');
		$this->db->join('product','cicilan.id_product = product.id_product');
		$this->db->join('user','cicilan.id_user = user.id_user');
		$this->db->where('id_cicilan_detail',$id);
		$query = $this->db->get('cicilan_detail');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function save_cicilan(){
		$status = $this->input->post('status');
		$data = array('status_cicilan' => $status,'date_terbayar' => date('Y-m-d'));
		$this->db->where('id_cicilan_detail',$this->uri->segment(4));
		$this->db->update('cicilan_detail',$data);
	}
	function edit_status_cicilan($data){
		$data = array('status_transfer' => $data['status']);
		$this->db->where('id_cicilan',$this->uri->segment(4));
		$this->db->update('cicilan',$data);
	}
	// fungsi konsultasi
	function count_consultation(){
		return $this->db->count_all('konsultasi');
	}
	function count_id_consultation($id){
		$this->db->where('id_konsultasi',$id);
		return $this->db->count_all_results('jawab_konsultasi');
	}
	function fetch_consultation($limit,$start){
	$this->db->join('user','user.id_user = konsultasi.id_user');
	$this->db->order_by('date_konsultasi','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('konsultasi');
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
	function mark_read_consultation($id){
		$data = array( 'status_konsultasi' => 2);
		$this->db->where('id_konsultasi',$id);
		$this->db->update('konsultasi', $data);
	}
	function mark_replied_consultation($id){
		$data = array( 'status_konsultasi' => 3);
		$this->db->where('id_konsultasi',$id);
		$this->db->update('konsultasi', $data);
	}
	function read_consultation($id){
		$this->Model_transaction->mark_read_consultation($id);
		$this->db->join('user', 'user.id_user = konsultasi.id_user');
		$this->db->where('id_konsultasi', $id);
		$query = $this->db->get('konsultasi');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function get_reply_consultation($id){
		$this->db->where('id_konsultasi', $id);
		$query = $this->db->get('jawab_konsultasi');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function reply_consultation($id){
		$this->Model_transaction->mark_replied_consultation($id);
		$reply = $this->input->post('reply');
		$row = $this->Model_transaction->count_id_consultation($id);
		if($row >= 1){
			$data = array( 'jawaban' => $reply, 'id_backoffice' => $this->session->userdata('id_admin'),'id_konsultasi' => $id,
						'date_jawaban_edit' => date('Y-m-d h:i:s'),);
			$this->db->where('id_konsultasi',$id);
			$this->db->update('jawab_konsultasi',$data);
			}
		else{
			
			$data = array( 'jawaban' => $reply, 'id_backoffice' => $this->session->userdata('id_admin'),'id_konsultasi' => $id,
						'date_jawaban' => date('Y-m-d h:i:s'),);
			$this->db->insert('jawab_konsultasi',$data);
		}
		echo $row;
	}
	// confirmation transfer
	function count_confirmation(){
		$this->db->join('order','order.code_order = konfirmasi.code_order');
		return $this->db->count_all_results('konfirmasi');
	}
	function fetch_confirmation($limit,$start){
	$this->db->join('order','order.code_order = konfirmasi.code_order');
	$this->db->join('rekening_bank','rekening_bank.id_rekening_bank = konfirmasi.id_bank');
	$this->db->order_by('date_konfirmasi','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('konfirmasi');
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
	function count_confirmation_nonmember(){
		$this->db->join('order_nonmember','order_nonmember.code_order = konfirmasi.code_order');
		return $this->db->count_all_results('konfirmasi');
	}
	function fetch_confirmation_nonmember($limit,$start){
	$this->db->join('order_nonmember','order_nonmember.code_order = konfirmasi.code_order');
	$this->db->join('rekening_bank','rekening_bank.id_rekening_bank = konfirmasi.id_bank');
	$this->db->order_by('date_konfirmasi','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('konfirmasi');
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
	// celengan
	function count_celengan(){
		return $this->db->count_all('celengan');
	}
	function count_celengan_detail(){
		$this->db->where('id_celengan',$this->uri->segment(4));
		return $this->db->count_all_results('celengan_detail');
	}
	function fetch_celengan($limit,$start){
	$this->db->join('user','user.id_user = celengan.id_user');
	$this->db->order_by('date_celengan','desc');
	$this->db->limit($limit,$start);
	$query = $this->db->get('celengan');
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
	function fetch_celengan_details($limit,$start){
	$this->db->where('id_celengan',$this->uri->segment(4));
	$this->db->order_by('date_celengan_detail','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('celengan_detail');
	if($query->num_rows()>0){
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
	function fetch_celengan_detail($limit,$start){
	$result = $this->fetch_celengan_details($limit,$start);
	
	$this->db->where('id_celengan',$this->uri->segment(4));
	$this->db->order_by('date_celengan_detail','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('celengan_detail');
	if($query->num_rows()>0){
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
	function get_celengan_detail($id){
		$this->db->join('celengan','celengan.id_celengan = celengan_detail.id_celengan');
		$this->db->where('id_celengan_detail', $id);
		$query = $this->db->get('celengan_detail');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function get_celengan_detail_emas($id){
		$this->db->join('celengan','celengan.id_celengan = celengan_detail.id_celengan');
		$this->db->join('product','product.id_product = celengan_detail.id_product');
		$this->db->where('id_celengan_detail', $id);
		$query = $this->db->get('celengan_detail');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function save_celengan_detail($id){
		$results = $this->Model_transaction->get_celengan_detail($id);
		$status = $this->input->post('status');
		$data = array('status_celengan_detail' => $status);
		$this->db->where('id_celengan_detail',$id);
		$this->db->update('celengan_detail',$data);
		
		if($results['status_celengan_detail'] == 0){
			if($status==1){
			$balance = $this->input->post('balance');
			$id_celengan = $this->input->post('id_celengan');
			$total_balance = $results['total_balance']+$balance;
			$data = array('total_balance' => $total_balance);
			$this->db->where('id_celengan',$id_celengan);
			$this->db->update('celengan',$data);
			}
		}
		else if($results['status_celengan_detail'] == 5){
			if($status==1){
			$balance = $this->input->post('balance');
			$id_celengan = $this->input->post('id_celengan');
			$total_balance = $results['total_balance']+$balance;
			$data = array('total_balance' => $total_balance);
			$this->db->where('id_celengan',$id_celengan);
			$this->db->update('celengan',$data);
			}
		}
		else if($results['status_celengan_detail'] == 1){
			if($status==0 || $status==5){
			$balance = $this->input->post('balance');
			$id_celengan = $this->input->post('id_celengan');
			$total_balance = $results['total_balance']-$balance;
			$data = array('total_balance' => $total_balance);
			$this->db->where('id_celengan',$id_celengan);
			$this->db->update('celengan',$data);
			}
		}
		else if($results['status_celengan_detail'] == 3){
			if($status==4){
				$balance = $this->input->post('balance');
				$id_celengan = $this->input->post('id_celengan');
				$total_balance = $results['total_balance']-abs($balance);
				$data = array('total_balance' => $total_balance);
				$this->db->where('id_celengan',$id_celengan);
				$this->db->update('celengan',$data);
			}
		}
		else if($results['status_celengan_detail'] == 4){
			if($status==3){
				$balance = $this->input->post('balance');
				$id_celengan = $this->input->post('id_celengan');
				$total_balance = $results['total_balance']+abs($balance);
				$data = array('total_balance' => $total_balance);
				$this->db->where('id_celengan',$id_celengan);
				$this->db->update('celengan',$data);
			}
		}
	}
    function get_celengan_emas($id){
        $this->db->join('user','celengan.id_user = user.id_user');
        $this->db->where('id_celengan',$id);
        $query = $this->db->get('celengan');
        if($query->num_rows()>0){
            return $query->row_array();
        }
        else{
            return false;
        }
    }
    function saveStatusCelengan($data,$id){
        $save = array('status_celengan' => $data['status']);
        $this->db->where('id_celengan',$id);
        $this->db->update('celengan',$save);
        return 1;
    }
	// simpan
	function count_simpan(){
		return $this->db->count_all('simpan');
	}
	function fetch_simpan($limit,$start){
	$this->db->join('user','user.id_user = simpan.id_user');
	$this->db->order_by('date_simpan','desc');
	$this->db->limit($limit,$start);
	$query = $this->db->get('simpan');
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
	function fetchAllSimpan(){
	$this->db->join('user','user.id_user = simpan.id_user');
	$this->db->order_by('date_simpan','asc');
	$query = $this->db->get('simpan');
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
	function get_simpan($id){
		$this->db->join('user','user.id_user = simpan.id_user');
		$this->db->where('id_simpan', $id);
		$query = $this->db->get('simpan');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function save_status_simpan(){
		$status = $this->input->post('status');
		$data = array(
					'status_simpan' => $status,
				);
		$this->db->where('id_simpan',$this->uri->segment(4));
		$this->db->update('simpan',$data);
	}
	function get_simpan_detail($id){
		$this->db->join('simpan','simpan.id_simpan = simpan_detail.id_simpan');
		$this->db->join('product','simpan_detail.id_product = product.id_product');
		$this->db->join('user','user.id_user = simpan.id_user');
		$this->db->where('id_simpan_detail', $id);
		$query = $this->db->get('simpan_detail');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function fetch_simpan_detail($limit,$start){
	$id = $this->uri->segment(4);
	$this->db->join('simpan','simpan.id_simpan = simpan_detail.id_simpan');
	$this->db->join('product','product.id_product = simpan_detail.id_product');
	$this->db->join('user','user.id_user = simpan.id_user');
	$this->db->where('simpan_detail.id_simpan',$id);
	$this->db->order_by('date_simpan_detail','desc');
	$this->db->limit($limit,$start);
	$query = $this->db->get('simpan_detail');
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
	function count_simpan_detail(){
		$this->db->where('id_simpan',$this->uri->segment(4));
		return $this->db->count_all_results('simpan_detail');
	}
	function count_simpan_emas(){
		$id = $this->uri->segment(4);
		$results = $this->Model_transaction->get_simpan_detail($id);
		$this->db->where('id_simpan',$results['id_simpan']);
		$this->db->where('id_product',$results['id_product']);
		return $this->db->count_all_results('simpan_emas');
	}
	function get_simpan_emas($id_simpan,$id_product){
		$this->db->where('id_simpan',$id_simpan);
		$this->db->where('id_product',$id_product);
		$query = $this->db->get('simpan_emas');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function save_simpan(){
		$id = $this->uri->segment(4);
		$results = $this->Model_transaction->get_simpan_detail($id);
		$results2 = $this->Model_transaction->get_simpan_emas($results['id_simpan'],$results['id_product']);
		$status = $this->input->post('status');
		$qty = $this->input->post('qty');
		$product = $this->input->post('product');
		$id_simpan = $this->input->post('id_simpan');
		$data = array('status_simpan_detail' => $status);
		$this->db->where('id_simpan_detail',$id);
		$this->db->update('simpan_detail',$data);
		
		if($results['status_simpan_detail'] == 1){
			if($this->Model_transaction->count_simpan_emas() == 0){
				if($status==2){
					$data = array('qty' => $results['qty'],'id_simpan' => $results['id_simpan'],'id_product' => $results['id_product']);
					$this->db->insert('simpan_emas',$data);
				}
			}
			else{
				if($status==2){
					$data = array('qty' => $results2['qty']+$qty);
					$this->db->where('id_simpan',$results['id_simpan']);
					$this->db->where('id_product',$results['id_product']);
					$this->db->update('simpan_emas',$data);
				}
			}
		}
		else if($results['status_simpan_detail'] == 2){
			$results2 = $this->Model_transaction->get_simpan_emas($results['id_simpan'],$results['id_product']);
			if($status==1){
				$data = array('qty' => $results2['qty']-$qty);
				$this->db->where('id_simpan',$results['id_simpan']);
				$this->db->where('id_product',$results['id_product']);
				$this->db->update('simpan_emas',$data);
			}
		}
		else if($results['status_simpan_detail']==3){
				if($status==4){
					// kalau setelah berkurang kurang dari 0
					if($results2['qty']-$qty==0){
						// delete record simpan emas
						$this->db->where('id_simpan',$id_simpan);
						$this->db->where('id_product',$product);
						$this->db->delete('simpan_emas');
					}
					else{
						// update qty simpan emas
						$data = array('qty'=>$results2['qty']-$qty);
						$this->db->where('id_simpan',$id_simpan);
						$this->db->where('id_product',$product);
						$this->db->update('simpan_emas',$data);
					}
				}
		}
		else if($results['status_simpan_detail']==4){
				if($status==3){
					if($results2==FALSE){
						// kalau belum ada recordnya atau qty = 0
						$data = array('id_product' => $product,'qty'=>$qty,'id_simpan'=>$results['id_simpan']);
						$this->db->insert('simpan_emas',$data);
					}
					else{
						// update qty simpan emas
						$data = array('qty'=>$results2['qty']+$qty);
						$this->db->where('id_simpan',$id_simpan);
						$this->db->where('id_product',$product);
						$this->db->update('simpan_emas',$data);
					}
				}
		}
	}
	function count_transaction_sell(){
		return $this->db->count_all('jual');
	}
	function fetch_transaction_sell($limit,$start){
    $this->db->join('harga_beli', 'harga_beli.id_harga_beli = jual.id_product');
    $this->db->join('user', 'user.id_user = jual.id_user');
	$this->db->order_by('jual.date_jual','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('jual');
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
	function get_sell($id){
		$this->db->join('harga_beli', 'harga_beli.id_harga_beli = jual.id_product');
		$this->db->join('user', 'user.id_user = jual.id_user');
		$this->db->where('id_jual', $id);
		$query = $this->db->get('jual');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function status_jual(){
		$id = $this->uri->segment(4);
		$status = $this->input->post('status');
		$data = array('status_jual'=>$status);
		$this->db->where('id_jual',$id);
		$this->db->update('jual',$data);
	}
	// gadai
	function getUserbyUsername($username){
		$this->db->where('username',$username);
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else{
			return FALSE;
		}
	}
	function count_gadai(){
		return $this->db->count_all('gadai');
	}
	function fetchAllGadai(){
	$this->db->join('user', 'user.id_user = gadai.id_user');
	$this->db->order_by('date_gadai','ASC');
	$query = $this->db->get('gadai');
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
	function fetch_gadai($limit,$start){
	$this->db->join('user', 'user.id_user = gadai.id_user');
	$this->db->order_by('date_gadai','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('gadai');
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
	function save_gadai(){
		$username = $this->input->post('username');
		$no_id = $this->input->post('no_id');
		$tanggal_sertifikat = $this->input->post('tanggal_sertifikat');
		$gram = $this->input->post('gram');
		$nilai_taksiran = $this->input->post('nilai_taksiran');
		$month = $this->input->post('month');
		$pinjaman = $this->input->post('pinjaman');
		$pinjam_waktu = $this->input->post('pinjam_waktu');
		
		$result = $this->getUserbyUsername($username);
			if($result==FALSE){
				// username salah
				return 2;
			}
			else{
				$data = array(
						'no_id_emas' => $no_id,
						'id_user' => $result['id_user'],
						'tanggal_sertifikat' => $tanggal_sertifikat,
						'gram_gadai' => $gram,
						'nilai_taksiran' => $nilai_taksiran,
						'jangka_waktu' => $month,
						'pinjaman' => $pinjaman,
						'cicilan_lunas' => 0,
						'status_gadai' => 1,
						'date_gadai' => date('Y-m-d h:i:s'),
						);
				$this->db->insert('gadai',$data);
				return 1;
			}
	}
	function biayaTitipGadai($id){
		$data = $this->getGadai($id);
		$date1 = new DateTime(date("Y-m-d",strtotime($data['date_gadai'])));
		$date2 = new DateTime(date("Y-m-d"));
		$diff = $date1->diff($date2);
		$total_month = (($diff->format('%y') * 12) + $diff->format('%m'));
		$data2 = $this->Model_setting->setting();
		$biaya_gadai = $data2['biaya_titip_gadai'];
		$total_biaya = $biaya_gadai*$total_month;
		return $total_biaya;
	}
	function edit_gadai($id){
		$no_id = $this->input->post('no_id');
		$gram = $this->input->post('gram');
		$nilai_taksiran = $this->input->post('nilai_taksiran');
		$month = $this->input->post('month');
		$pinjaman = $this->input->post('pinjaman');
		$pinjam_waktu = $this->input->post('pinjam_waktu');
		$status = $this->input->post('status');
		$cicilan = $this->input->post('cicilan');
				$data = array(
						'no_id_emas' => $no_id,
						'gram_gadai' => $gram,
						'nilai_taksiran' => $nilai_taksiran,
						'jangka_waktu' => $month,
						'pinjaman' => $pinjaman,
						'cicilan_lunas' => $cicilan,
						'status_gadai' => $status,
						);
				$this->db->where('id_gadai',$id);
				$this->db->update('gadai',$data);
		return 1;
	}
	function getGadai($id){
		$this->db->join('user','user.id_user = gadai.id_user');
		$this->db->where('id_gadai',$id);
		$query = $this->db->get('gadai');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else{
			return FALSE;
		}
	}
	function count_confirmation_member(){
		$this->db->where('cicilan',2);
		return $this->db->count_all_results('order');
	}
	function fetch_confirmation_member($limit,$start){
	$this->db->join('product', 'product.id_product = order.id_product');
    $this->db->join('user', 'user.id_user = order.id_user');
	$this->db->where('status_order',2);
	$this->db->or_where('status_order',3);
	$this->db->order_by('order.date_order','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('order');
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
	function countConfirmationNonmember(){
		return $this->db->count_all('order_nonmember');
	}
	function fetchConfirmationNonmember($limit,$start){
	$this->db->join('product', 'product.id_product = order_nonmember.id_product');
	$this->db->where('status_order',2);
	$this->db->or_where('status_order',3);
	$this->db->order_by('order_nonmember.date_order','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('order_nonmember');
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
}