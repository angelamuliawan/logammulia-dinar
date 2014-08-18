<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_transaction extends CI_Model{
	function __construct(){
        parent::__construct();
		$this->load->model('frontpage/Model_member');
    }
	function count_transaction_member(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$this->db->where('cicilan',1);
		$this->db->where('id_user',$result['id_user']);
		return $this->db->count_all_results('order');
	}
	function fetch_transaction_member($limit,$start){
	$session = $this->Model_member->getMemberSession();
	$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
	$this->db->join('user', 'user.id_user = order.id_user');
	$this->db->join('product', 'order.id_product = product.id_product');
	$this->db->where('cicilan',1);
	$this->db->where('order.id_user',$result['id_user']);
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
	function count_consultation(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$this->db->where('id_user',$result['id_user']);
		return $this->db->count_all_results('konsultasi');
	}
	function fetch_consultation($limit,$start){
	$session = $this->Model_member->getMemberSession();
	$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
	$this->db->where('id_user',$result['id_user']);
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
	// fungsi consultation
	function add_consultation(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$subject = $this->input->post('subject');
		$isi = $this->input->post('isi');
		$data = array(
					'subject' => $subject,
					'konsultasi' => $isi,
					'date_konsultasi' => date("Y-m-d h:i:s"),
					'status_konsultasi' => 1,
					'id_user' => $result['id_user'],
				);
		return $this->db->insert('konsultasi',$data);
	}
	function get_transaction($id){
		$this->db->where('id_konsultasi', $id);
		$query = $this->db->get('konsultasi');
		if($query == true)  return $query->row_array();
		else return false;
	}
	function get_transaction_reply($id){
		$this->db->join('administrator','administrator.id_administrator = jawab_konsultasi.id_backoffice');
		$this->db->where('id_konsultasi', $id);
		$query = $this->db->get('jawab_konsultasi');
		if($query == true)  return $query->row_array();
		else return false;
	}
	// fungsi cicilan
	function count_cicilan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$this->db->where('id_user',$result['id_user']);
		return $this->db->count_all_results('cicilan');
	}
	function fetch_cicilan($limit,$start){
	$session = $this->Model_member->getMemberSession();
	$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
	$this->db->join('user', 'user.id_user = order.id_user');
	$this->db->join('product', 'order.id_product = product.id_product');
	$this->db->join('cicilan', 'order.id_order = cicilan.id_order');
	$this->db->where('cicilan',2);
	$this->db->where('order.id_user',$result['id_user']);
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
	,cicilan_detail.date_jatuh_tempo,cicilan_detail.status_cicilan,cicilan_detail.date_terbayar,order.qty');
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
	// fungsi celengan
	function count_celengan_detail(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$this->db->join('celengan', 'celengan.id_celengan = celengan_detail.id_celengan');
		$this->db->where('celengan.id_user',$result['id_user']);
		return $this->db->count_all_results('celengan_detail');
	}
	function count_celengan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$this->db->where('id_user',$result['id_user']);
		return $this->db->count_all_results('celengan');
	}
	function count_celengan_emas(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$this->db->join('celengan', 'celengan.id_celengan = celengan_emas.id_celengan');
		$this->db->where('celengan.id_user',$result['id_user']);
		return $this->db->count_all_results('celengan_emas');
	}
	function fetch_celengan_detail($limit,$start){
	$session = $this->Model_member->getMemberSession();
	$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
	$this->db->join('celengan', 'celengan_detail.id_celengan = celengan.id_celengan');
	$this->db->where('celengan.id_user',$result['id_user']);
	$this->db->order_by('celengan_detail.date_celengan_detail','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('celengan_detail');
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
	function fetch_celengan_emas($limit,$start){
	$session = $this->Model_member->getMemberSession();
	$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
	$this->db->join('celengan', 'celengan_emas.id_celengan = celengan.id_celengan');
	$this->db->join('product', 'celengan_emas.id_product = product.id_product');
	$this->db->where('celengan.id_user',$result['id_user']);
	$this->db->order_by('celengan_emas.date_celengan_emas','DESC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('celengan_emas');
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
	function get_celengan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$id_user = $result['id_user'];
		$this->db->where('id_user',$id_user);
		$query = $this->db->get('celengan');
		if($query == TRUE) return $query->row_array();
		else return FALSE;
	}
	function activate_celengan($id_user){
		$data = array(
				'id_user' => $id_user,
				'date_celengan' => date('Y-m-d h:i:s'),
				'status_celengan' => 1
			);
		$this->db->insert('celengan',$data);
	}
	function topup_celengan($id_celengan){
		$nominal = $this->input->post('nominal');
		$data = array(
					'id_celengan' => $id_celengan,
					'balance' => $nominal,
					'date_celengan_detail' => date('Y-m-d h:i:s'),
					'status_celengan_detail' =>0,
				);
		$this->db->insert('celengan_detail',$data);
	}
	function cairkan_celengan($id_celengan){
		$saldo = $this->Model_transaction->get_celengan();
		$nominal = $this->input->post('nominal');
		$celengan = $this->get_celengan();
		$now = strtotime("NOW", time());
		$i = 1;
		$bataswaktu = strtotime("+1 months", strtotime($celengan['date_celengan']));
		if($now < $bataswaktu){
			return "waktu";
		}
		else if($saldo['total_balance']-$nominal < 200000){
			return "saldo";
		}
		else if($saldo['total_balance']-$nominal >= 200000){
			$this->session->unset_userdata('error');
			$data = array(
						'id_celengan' => $id_celengan,
						'balance' => 0-$nominal,
						'date_celengan_detail' => date('Y-m-d h:i:s'),
						'status_celengan_detail' =>3,
					);
			$this->db->insert('celengan_detail',$data);
			return "success";
		}
	}
	function get_gold(){
		$gold = $this->input->post('gold');
		$saldo = $this->Model_transaction->get_celengan();
		$this->db->where('id_celengan',$saldo['id_celengan']);
		$this->db->where('id_product',$gold);
		$query = $this->db->get('celengan_emas');
		if($query == true)  return $query->row_array();
		else return FALSE;
	}
	function count_gold(){
		$gold = $this->input->post('gold');
		$saldo = $this->Model_transaction->get_celengan();
		$this->db->where('id_celengan',$saldo['id_celengan']);
		$this->db->where('id_product',$gold);
		return $this->db->count_all_results('celengan_emas');
	}
	function generate_gold(){
		$saldo = $this->Model_transaction->get_celengan();
		$gold = $this->input->post('gold');
		$qty = $this->input->post('qty');
		$this->load->model('frontpage/Model_product');
		$product = $this->Model_product->get_product($gold);
		// logika saldo dikuran harga jual masih lebih besar tidak dari 200.000
		if($saldo['total_balance']-$product['sell_price']*$qty < 200000){
			$data = array(
						'error' => TRUE,
					);
			$this->session->set_userdata($data);
		}
		else{
			$this->session->unset_userdata('error');
				$data = array(
						'total_balance' => $saldo['total_balance']-($product['sell_price']*$qty),
					);
				$this->db->where('id_celengan',$saldo['id_celengan']);
				$this->db->update('celengan',$data);
				$data = array(
						'id_celengan' => $saldo['id_celengan'],
						'balance' => 0-($product['sell_price']*$qty),
						'date_celengan_detail' => date('Y-m-d h:i:s'),
						'status_celengan_detail' => 2,
						'qty' => $qty,
						'id_product' => $gold
					);
				$this->db->insert('celengan_detail',$data);
				// kalau belum pernah membeli emas yang sama
				if($this->Model_transaction->count_gold() == 0){
					$data = array(
							'id_celengan' => $saldo['id_celengan'],
							'id_product' => $gold,
							'harga_pas_beli' => $product['sell_price'],
							'qty' => $qty,
							'date_celengan_emas' => date('Y-m-d h:i:s'),
							'status_celengan_emas' => 1,
						);
					$this->db->insert('celengan_emas',$data);
				}
				// kalau sudah pernah membeli emas yang sama
				else{
					$getgold = $this->Model_transaction->get_gold();
					$data = array(
							'qty' => $getgold['qty']+$qty,
							'harga_pas_beli' => $product['sell_price'],
							'date_celengan_emas' => date('Y-m-d h:i:s'),
						);
					$this->db->where('id_celengan_emas',$getgold['id_celengan_emas']);
					$this->db->update('celengan_emas',$data);
				}
		}
	}
	function get_lm_beli(){
		$this->db->where('id_harga_beli',1);
		$query = $this->db->get('harga_beli');
		$query2 = $query->row_array();
		return $query2['harga_beli'];
	}
	function get_dinar_beli(){
		$this->db->where('id_harga_beli',2);
		$query = $this->db->get('harga_beli');
		$query2 = $query->row_array();
		return $query2['harga_beli'];
	}
	function get_dirham_beli(){
		$this->db->where('id_harga_beli',3);
		$query = $this->db->get('harga_beli');
		$query2 = $query->row_array();
		return $query2['harga_beli'];
	}
	function get_gold_celengan(){
		$session = $this->Model_member->getMemberSession();
		$this->db->join('celengan','celengan_emas.id_celengan = celengan.id_celengan');
		$this->db->join('user','user.id_user = celengan.id_user');
		$this->db->join('product','celengan_emas.id_product = product.id_product');
		$this->db->where('celengan.id_user',$session['tgs_id_member']);
		$query = $this->db->get('celengan_emas');
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
	function count_emas_di_celengan($id_product,$id_celengan){
		$this->db->where('id_celengan',$id_celengan);
		$this->db->where('id_product',$id_product);
		return $this->db->count_all_results('celengan_emas');
	}
	function get_celengan_emas($id_product,$id_celengan){
		$session = $this->Model_member->getMemberSession();
		$this->db->where('id_product',$id_product);
		$this->db->where('id_celengan',$id_celengan);
		$query = $this->db->get('celengan_emas');
		return $query->row_array();
	}
	function lepas(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->get_celengan();
		$id_celengan = $result['id_celengan'];
		$qty = $this->input->post('qty'); 
		$product = $this->input->post('product');
		if($product == 13) $balance = $this->get_dirham_beli();
		else if($product == 12) $balance = $this->get_dinar_beli();
		else $balance = $this->get_lm_beli();
		// logika cek ketersediaan
		$count = $this->count_emas_di_celengan($product,$id_celengan);
		if($count == 0){
			return "not_found";
		}
		else{
			$result = $this->get_celengan_emas($product,$id_celengan);
			if($result['qty']-$qty < 0){
				return "stock";
			}
			else if($result['qty']-$qty == 0){
				// insert record celengan detail karena nambah balance
				$data = array(
					'id_celengan' => $id_celengan,
					'id_product' => $product,
					'balance' => $balance*$qty,
					'qty' => $qty,
					'date_celengan_detail' => date('Y-m-d h:i:s'),
					'status_celengan_detail' =>7,
				);
				$this->db->insert('celengan_detail',$data);
				// update record celengan karena nambah balance
				$celengan = $this->get_celengan();
				$total_balance = $celengan['total_balance']+($balance*$qty);
				$data = array('total_balance' => $total_balance);
				$this->db->where('id_celengan',$id_celengan);
				$this->db->update('celengan',$data);
				// delete record di celengan emas karena stock habis
				$this->db->where('id_celengan',$id_celengan);
				$this->db->where('id_product',$product);
				$this->db->delete('celengan_emas');
				return "success";
			}
			else{
				// insert record celengan detail karena nambah balance
				$data = array(
					'id_celengan' => $id_celengan,
					'id_product' => $product,
					'balance' => $balance*$qty,
					'qty' => $qty,
					'date_celengan_detail' => date('Y-m-d h:i:s'),
					'status_celengan_detail' =>7,
				);
				$this->db->insert('celengan_detail',$data);
				// update record celengan karena nambah balance
				$celengan = $this->get_celengan();
				$total_balance = $celengan['total_balance']+($balance*$qty);
				$data = array('total_balance' => $total_balance);
				$this->db->where('id_celengan',$id_celengan);
				$this->db->update('celengan',$data);
				// update qty di record celengan emas 
				$result = $this->get_celengan_emas($product,$id_celengan);
				$data = array('qty'=>$result['qty']-$qty);
				$this->db->where('id_celengan',$id_celengan);
				$this->db->where('id_product',$product);
				$this->db->update('celengan_emas',$data);
				return "success";
			}
		}
	}
	// function simpan
	function count_simpan(){
		$this->load->model('frontpage/Model_member');
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$this->db->where('id_user',$result['id_user']);
		return $this->db->count_all_results('simpan');
	}
	function count_simpan_emas(){
		$this->load->model('frontpage/Model_member');
		$session = $this->Model_member->getMemberSession();
		$this->db->join('simpan','simpan_emas.id_simpan = simpan.id_simpan');
		$this->db->where('simpan.id_user',$session['tgs_id_member']);
		return $this->db->count_all_results('simpan_emas');
	}
	function count_simpan_detail(){
		$this->load->model('frontpage/Model_member');
		$session = $this->Model_member->getMemberSession();
		$this->db->join('simpan','simpan_detail.id_simpan = simpan.id_simpan');
		$this->db->where('simpan.id_user',$session['tgs_id_member']);
		return $this->db->count_all_results('simpan_detail');
	}
	function activate_simpan($id_user){
		$now = strtotime("NOW", time());
		$jatuhtempo = strtotime("24 months", $now);
		$tgl = date('Y-m-d', $jatuhtempo);
		$data = array(
				'id_user' => $id_user,
				'date_simpan' => date('Y-m-d h:i:s'),
				'date_akhir' => $tgl,
				'status_simpan' => 2
			);
		$this->db->insert('simpan',$data);
	}
	function fetch_simpan_detail($limit,$start){
	$this->load->model('frontpage/Model_member');
	$session = $this->Model_member->getMemberSession();
	$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
	$this->db->join('simpan', 'simpan_detail.id_simpan = simpan.id_simpan');
	$this->db->join('product', 'simpan_detail.id_product = product.id_product');
	$this->db->where('simpan.id_user',$result['id_user']);
	$this->db->order_by('simpan_detail.date_simpan_detail','DESC');
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
	function fetch_simpan_emas($limit,$start){
	$this->load->model('frontpage/Model_member');
	$session = $this->Model_member->getMemberSession();
	$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
	$this->db->join('simpan', 'simpan_emas.id_simpan = simpan.id_simpan');
	$this->db->join('product', 'simpan_emas.id_product = product.id_product');
	$this->db->where('simpan.id_user',$result['id_user']);
	$this->db->order_by('product.name_product','ASC');
	$this->db->limit($limit,$start);
	$query = $this->db->get('simpan_emas');
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
	function get_simpan(){
		$this->load->model('frontpage/Model_member');
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$id_user = $result['id_user'];
		$this->db->where('id_user',$id_user);
		$query = $this->db->get('simpan');
		if($query == TRUE) return $query->row_array();
		else return FALSE;
	}
	function save_simpan(){
		$id = $this->input->post('id_simpan');
		$qty = $this->input->post('qty');
		$product = $this->input->post('product');
		$data = array(
				'id_simpan' =>$id,
				'id_product' =>$product,
				'qty' =>$qty,
				'date_simpan_detail' => date('Y-m-d h:i:s'),
				'status_simpan_detail' => 1
				);
		$this->db->insert('simpan_detail',$data);
	}
	function count_jual(){
		$session = $this->Model_member->getMemberSession();
		$this->db->where('id_user',$session['tgs_id_member']);
		return $this->db->count_all_results('jual');
	}
	function fetch_jual($limit,$start){
		$session = $this->Model_member->getMemberSession();
		$this->db->join('harga_beli','harga_beli.id_harga_beli = jual.id_product');
		$this->db->where('id_user',$session['tgs_id_member']);
		$this->db->order_by('date_jual','DESC');
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
	function get_gold_simpan(){
		$session = $this->Model_member->getMemberSession();
		$this->db->join('simpan','simpan.id_simpan = simpan_emas.id_simpan');
		$this->db->join('product','simpan_emas.id_product = product.id_product');
		$this->db->where('simpan.id_user',$session['tgs_id_member']);
		$query = $this->db->get('simpan_emas');
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
	function count_emas_di_simpan($id_product,$id_simpan){
		$this->db->where('id_simpan',$id_simpan);
		$this->db->where('id_product',$id_product);
		return $this->db->count_all_results('simpan_emas');
	}
	function get_simpan_emas($id_product,$id_simpan){
		$session = $this->Model_member->getMemberSession();
		$this->db->where('id_product',$id_product);
		$this->db->where('id_simpan',$id_simpan);
		$query = $this->db->get('simpan_emas');
		return $query->row_array();
	}
	function ambil_simpan(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->get_simpan();
		$id_simpan = $result['id_simpan'];
		$qty = $this->input->post('qty'); 
		$product = $this->input->post('product');
		// logika cek ketersediaan
		$count = $this->count_emas_di_simpan($product,$id_simpan);
		if($count == 0){
			return "not_found";
		}
		else{
			$result = $this->get_simpan_emas($product,$id_simpan);
			if($result['qty']-$qty < 0){
				return "stock";
			}
			else if($result['qty']-$qty == 0){
				// insert record simpan detail karena nambah balance
				$data = array(
					'id_simpan' => $id_simpan,
					'id_product' => $product,
					'qty' => $qty,
					'date_simpan_detail' => date('Y-m-d h:i:s'),
					'status_simpan_detail' =>3,
				);
				$this->db->insert('simpan_detail',$data);
				return "success";
			}
			else{
				// insert record simpan detail karena nambah balance
				$data = array(
					'id_simpan' => $id_simpan,
					'id_product' => $product,
					'qty' => $qty,
					'date_simpan_detail' => date('Y-m-d h:i:s'),
					'status_simpan_detail' =>3,
				);
				$this->db->insert('simpan_detail',$data);
				return "success";
			}
		}
	}
	function count_gadai(){
		$session = $this->Model_member->getMemberSession();
		$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
		$this->db->where('id_user',$result['id_user']);
		return $this->db->count_all_results('gadai');
	}
	function fetch_gadai($limit,$start){
	$session = $this->Model_member->getMemberSession();
	$result = $this->Model_setting->get_session_member($session['tgs_username_member']);
	$this->db->where('id_user',$result['id_user']);
	$this->db->limit($limit,$start);
	$this->db->order_by('date_gadai','DESC');
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
	function get_order($id){
		$this->db->join('user','user.id_user = order.id_user');
		$this->db->where('id_order',$id);
		$query = $this->db->get('order');
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else{
			return FALSE;
		}
	}
	function print_cash($id){
		$id = $this->uri->segment(4);
		$result = $this->get_order($id);
		
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Faktur Pejualan');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('B2',$result['name']);
		$this->excel->getActiveSheet()->setCellValue('H2',$result['code_order']);
		$this->excel->getActiveSheet()->setCellValue('H3',date('d/m/Y',strtotime($result['date_order'])));
		$this->excel->getActiveSheet()->setCellValue('H4',"Jual-Beli (Beli)");
		
		$this->excel->getActiveSheet()->setCellValue('A6',1);
		$this->excel->getActiveSheet()->setCellValue('B6',$result['code_order']);
		$this->excel->getActiveSheet()->setCellValue('C6','-');
		$this->excel->getActiveSheet()->setCellValue('D6','Rp. '.number_format($result['harga_pas_beli']));
		$this->excel->getActiveSheet()->setCellValue('E6',$result['qty']);
		$this->excel->getActiveSheet()->setCellValue('F6','Rp. '.number_format($result['harga_pas_beli']*$result['qty']));
		
		$this->excel->getActiveSheet()->getStyle('A2:J2')->getFill()
		->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#ffcc00');
		$this->excel->getActiveSheet()->getStyle('A3:J3')->getFill()
		->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#ffcc00');
		$this->excel->getActiveSheet()->getStyle('A4:J4')->getFill()
		->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#ffcc00');
		$this->excel->getActiveSheet()->getStyle('A5:J5')->getFill()
		->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#ffcc00');

		$this->excel->getActiveSheet()->setCellValue('A1', 'Tamar Gold Shop');
		$this->excel->getActiveSheet()->setCellValue('A2','Kepada Yth: ');
		$this->excel->getActiveSheet()->setCellValue('G1', 'Faktur/Kwitansi');
		$this->excel->getActiveSheet()->setCellValue('G2', 'No Faktur: ');
		$this->excel->getActiveSheet()->setCellValue('G3', 'Tanggal: ');
		$this->excel->getActiveSheet()->setCellValue('G4', 'Program: ');
		
		$this->excel->getActiveSheet()->setCellValue('A5', 'No');
		$this->excel->getActiveSheet()->setCellValue('B5', 'Kode');
		$this->excel->getActiveSheet()->setCellValue('C5', 'Keterangan');
		$this->excel->getActiveSheet()->setCellValue('D5', 'Harga');
		$this->excel->getActiveSheet()->setCellValue('E5', 'Unit');
		$this->excel->getActiveSheet()->setCellValue('F5', 'Total');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20); //change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); //Bold
		$this->excel->getActiveSheet()->mergeCells('A1:F1'); 
		$this->excel->getActiveSheet()->mergeCells('G1:J1'); 
		$filename= date('Y-m-dh:i:s').'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
					 
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}