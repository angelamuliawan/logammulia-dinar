<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_product extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	
    function add_product(){
        $name = $this->input->post('name_product');
        $stock = $this->input->post('stock');
        $desc = $this->input->post('desc');
        $base = $this->input->post('base_price');
            $data = array(
                        'name_product' => $name,
                        'description_product' => $desc,
                        'stock' => $stock,
                        'base_price' => $base,
                        'date_insert' => date("Y-m-d h:i:s"),
                    );
        $this->db->insert('product',$data);
    }
	
	
     function count_product(){
        return $this->db->count_all('product');
    }
	
	
    function fetch_product_home($limit,$start){
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
	function fetch_buy_price($limit,$start){
	$this->db->order_by('date_harga_beli','ASC');
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
	
	function count_cicilan($price, $time)
	{
		return $price/$time;
	}
	
    function fetch_logam_mulia(){
	$this->db->order_by('sort_order','ASC');
	$this->db->like('name_product','logam mulia');
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
	// total semua order termasuk order member dan nonmember juga termasuk cicilan atau bukan
	function total_order(){
		$a = $this->db->count_all('order');
		$b = $this->db->count_all('order_nonmember');
		$c = ($a+$b);
		return $c;
	}
	// total order member termasuk cicilan atau bukan
	function total_order_member(){
		return $this->db->count_all('order');
	}
	// total order non member
	function total_order_nonmember(){
		$this->db->where('id_data_transaksi', 1);
		$query = $this->db->get('data_transaksi');
		$result = $query->row_array();
		return $result['total_transaksi_nonmember'];
	}
	// total order member yang cicilan
	function total_order_cicilan(){
		$this->db->where('id_data_transaksi', 1);
		$query = $this->db->get('data_transaksi');
		$result = $query->row_array();
		return $result['total_transaksi_cicilan'];
	}
	// total order member yang cash
	function total_order_cash(){
		$this->db->where('id_data_transaksi', 1);
		$query = $this->db->get('data_transaksi');
		$result = $query->row_array();
		return $result['total_transaksi_member'];
	}
	function update_total_member(){
		$total = $this->Model_product->total_order_cash();
		$data = array(
					'total_transaksi_member' => $total+1,
				);
		$this->db->where('id_data_transaksi',1);
		$this->db->update('data_transaksi',$data);
	}
	function update_total_nonmember(){
		$total = $this->Model_product->total_order_nonmember();
		$data = array(
					'total_transaksi_nonmember' => $total+1,
				);
		$this->db->where('id_data_transaksi',1);
		$this->db->update('data_transaksi',$data);
	}
	function update_total_cicilan(){
		$total = $this->Model_product->total_order_cicilan();
		$data = array(
					'total_transaksi_cicilan' => $total+1,
				);
		$this->db->where('id_data_transaksi',1);
		$this->db->update('data_transaksi',$data);
	}
	// nambah record buat cicilan_detail
	function ambil_id_cicilan($bulan,$tgl){
		$username = $this->input->post('username');
		$result = $this->Model_setting->get_session_member($username);
		$this->db->where('id_user',$result['id_user']);
		$this->db->where('jangka_waktu',$bulan);
		$this->db->where('date_mulai_cicilan',$tgl);
		$query = $this->db->get('cicilan');
		return $query->row_array();
	}
	function ambil_id_order($tgl){
		//$tgl = date('Y-m-d h:i:s');
		$this->db->where('date_order',$tgl);
		$query = $this->db->get('order');
		$query2 = $query->row_array();
		return $query2['id_order'];
	}
	function tambah_cicilan($bulan,$date){
		$result = $this->Model_product->ambil_id_cicilan($bulan,$date);
		$now = strtotime("NOW", time());
		$id_cicilan = $result['id_cicilan'];
		for($i=0;$i<$bulan;$i++){
			$jatuhtempo = strtotime(+$i." months", $now);
			$tgl_jatuhtempo = date('Y-m-d', $jatuhtempo);
			$data = array(
					'id_cicilan' => $id_cicilan,
					'date_jatuh_tempo' => $tgl_jatuhtempo,
					'status_cicilan' => 1,
					'cannot_pay' => 0
				);
			$this->db->insert('cicilan_detail',$data);
		}
	}
	function save_order(){
		$this->load->model('frontpage/Model_member');
		$data['session'] = $this->Model_member->getMemberSession();
		$data['loginstat'] = $this->Model_member->isValidSession($data['session']);
		$username = $this->input->post('username');
		$harga_jual = $this->input->post('harga_jual');
		$qty = $this->input->post('qty');
		$total_price = ($harga_jual*$qty);
		$id = $this->uri->segment(3);
		$result = $this->Model_setting->get_session_member($username);
		$shipping = $this->input->post('shipping');
		if($shipping == 1) $metode_shipping = "COD Di Outlet";
		else $metode_shipping = "Delivery";
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$address = $this->input->post('address');
		$no_rek = $this->input->post('no_rek');
		$an = $this->input->post('an');
		$tgl = $this->input->post('date');
		$tgl2 = date("d-M-Y h:i:s",strtotime($tgl.date("h:i:s")));
		$cicilan = $this->input->post('cicilan');
		$tgl_skrg = strtotime("NOW", time());
		$date = strtotime("NOW", strtotime($tgl2));
		$jatuhtempo = strtotime("+1 days", $tgl_skrg);
		// validasi user beli tanpa login atau tidak
		// user order tanpa login
				if(empty($tgl) && $shipping == 2 && $cicilan == 1){
					$this->session->set_flashdata('error', '<b>Tanggal Dikirim Wajib Diisi</b><br />');
					redirect(base_url('product/order_confirmation/'.$this->uri->segment(3)));
				}
				if($shipping == 2 && $cicilan == 1 && $date < $jatuhtempo-1000){
					$this->session->set_flashdata('error', '<b>Minimal Pengiriman tanggal adalah H+1 setelah order</b><br />');
					redirect(base_url('product/order_confirmation/'.$this->uri->segment(3)));
				}
				$product = $this->Model_product->get_product($this->uri->segment(3));
				if($product['stock'] < $qty){
					$this->session->set_flashdata('error', '<b>Qty tidak tersedia sesuai jumlah Pesanan anda</b><br />');
					redirect(base_url('product/order_confirmation/'.$this->uri->segment(3)));
				}
		if($data['loginstat'] == 0){ 
			$total_row = ($this->Model_product->total_order_nonmember()+1);
			$code_order = "TGSNM".$total_row;
			$this->update_total_nonmember(); // update data transaksi yang nonmember
			$data = array(
					'id_product' => $id,
					'qty' => $qty,
					'name' => $nama,
					'email' => $email,
					'phone_number' => $no_hp,
					'address' => $address,
					'harga_pas_beli' => $harga_jual,
					'total_price' => $total_price,
					'account_number' => $no_rek,
					'atas_nama' => $an,
					'shipping' => $shipping,
					'date_order' => date('Y-m-d h:i:s'),
					'code_order' => $code_order,
					'status_order' => 1
					);
			$this->db->insert('order_nonmember',$data);
			// Taruh Function Kirim Email Detail
			
			// variable untuk ditampilkan di detail
			$result = $this->Model_product->get_product($id);
			$data = array(
						'nama' => $nama,
						'email' => $email,
						'no_hp' => $no_hp,
						'produk' => $result['name_product'],
						'harga' => $harga_jual,
						'qty' => $qty,
						'total' => $total_price,
						'alamat' => $address,
						'no_rek' => $no_rek,
						'an' => $an,
						'shipping' => $metode_shipping,
						'code_order' => $code_order,
					);
			$this->session->set_userdata($data);
		}
		// kalo user order dan sudah login (member)
		else{ 
		$result2 = $this->Model_product->get_product($id);
			$cicilan = $this->input->post('cicilan');
			$id_user = $result['id_user'];
			if($cicilan == 1){ 
				$total_row = ($this->Model_product->total_order_cash()+1);
				$this->Model_product->update_total_member();
				$code_order = "TGSCASH".$total_row;
			}
			else{ 
				$total_row = ($this->Model_product->total_order_cicilan()+1);
				$this->Model_product->update_total_cicilan();
				$code_order = "TGSCREDIT".$total_row;
			}
				$bulan = $this->input->post('bulan');
				if(empty($bulan) && $cicilan == 2){
					$this->session->set_flashdata('error', '<b>Anda Belum Memilih Jangka Waktu</b><br />');
					redirect(base_url('product/order_confirmation/'.$this->uri->segment(3)));
				}
			$data = array(
					'id_product' => $id,
					'id_user' =>$id_user,
					'date_order' => date('Y-m-d h:i:s'),
					'qty' => $qty,
					'total_price' => $total_price,
					'cicilan' => $cicilan,
					'shipping' => $shipping,
					'status_order' => 1,
					'code_order' => $code_order,
					'harga_pas_beli' => $harga_jual,
					);
			$this->db->insert('order',$data);
			
			$data = array(
						'nama' => $nama,
						'email' => $email,
						'no_hp' => $no_hp,
						'produk' => $result2['name_product'],
						'harga' => $harga_jual,
						'qty' => $qty,
						'total' => $total_price,
						'alamat' => $address,
						'no_rek' => $no_rek,
						'an' => $an,
						'shipping' => $metode_shipping,
						'code_order' => $code_order,
					);
			$this->session->set_userdata($data);
			if($cicilan == 2){
				$var = $this->Model_setting->setting();
				$result2 = $this->Model_product->get_product($id);
				$biaya_titip = $result2['gram']*$var['margin_default'];
				$biaya_titip2 = $result2['gram']*$var['margin_default']*$qty;
				$total_biaya = ($qty*($biaya_titip+$harga_jual+100000));
					$date = date('Y-m-d h:i:s');
					$data2 = array (
							'id_user' =>$id_user,
							'id_product' => $id,
							'jangka_waktu' => $bulan,
							'harga_pas_beli' => $harga_jual,
							'biaya_titip' => $biaya_titip2,
							'total_biaya' => $total_biaya,
							'status_transfer' => 1,
							'total_denda' => 0,
							'date_mulai_cicilan' => $date, 
							'id_order' => $this->ambil_id_order($date),
						);
					$this->db->insert('cicilan',$data2);
					$this->Model_product->tambah_cicilan($bulan,$date);
			}
		}
	}
	function confirmation_payment(){
	$code = $this->input->post('code');
	$this->db->join('product','product.id_product = order.id_product');
    $this->db->where('code_order', $code);
    $query = $this->db->get('order');
    if($query == true)  return $query->row_array();
    else return false;
    }
	function confirmation_payment_nonmember(){
	$code = $this->input->post('code');
	$this->db->join('product','product.id_product = order_nonmember.id_product');
    $this->db->where('code_order', $code);
    $query = $this->db->get('order_nonmember');
    if($query == true)  return $query->row_array();
    else return false;
    }
	function count_confirmation(){
		$code = $this->input->post('code');
		$this->db->where('code_order',$code);
		return $this->db->count_all_results('konfirmasi');
	}
	function rekening_bank(){
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
	
	function save_confirmation(){
		$code = $this->input->post('code');
		$bank = $this->input->post('bank');
		$data = array('code_order' => $code, 'date_konfirmasi' => date('Y-m-d h:i:s'), 'id_bank' => $bank);
		$this->db->insert('konfirmasi',$data);
		return 1;
	}
	function get_product_sell($id){
    $this->db->where('id_harga_beli', $id);
    $query = $this->db->get('harga_beli');
    if($query == true)  return $query->row_array();
    else return false;
    }
	function sell_gold(){
		$id = $this->uri->segment(3);
		$session = $this->Model_member->getMemberSession();
		$id_user = $session['tgs_id_member'];
		$qty = $this->input->post('qty');
		$harga_jual = $this->input->post('harga');
		$data = array(
			'id_product' => $id,
			'id_user' => $id_user,
			'qty' => $qty,
			'status_jual' =>1,
			'date_jual' =>date('Y-m-d h:i:s'),
			'harga_pas_jual' =>$harga_jual,
		);
		$this->db->insert('jual',$data);
		return TRUE;
	}
}