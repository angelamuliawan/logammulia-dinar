<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_email extends CI_Model{
    function __construct(){
        parent::__construct();
    	$this->load->model('admin/Model_transaction');
		$this->load->library('email');
	}
	function BackTransactionMember($id_order,$data,$status_before){
		/* 
			variable id order untuk mengambil kode id_order dan var data untuk mengambil
			method post yang dilakukan update dari backoffice
		*/
		$member = $this->Model_transaction->get_transaction_member($id_order); // ambil data order member
		$setting = $this->Model_setting->setting();
		/* Status Transaksi Member */
		$options = array(
						'' => 'Change Status',
						1 => 'Unpaid',
						2 => 'Paid',
						4 => 'Dikirim / Diambil',
						5 => 'Cancel',
					);
		// configuration email type
		$config['mailtype'] = "html";
		$this->email->initialize($config);
		// Message
		$message = "Backoffice baru saja mengganti status order dari transaksi beli member yang dilakukan oleh username <b>".$member['username']."</b> atau yang memiliki nama asli ".$member['name']." yang memesan:<br /><br />
		<ul>
			<li>Nama Produk : ".$member['name_product']."</li>
			<li>QTY : ".$member['qty']."</li>
			<li>Total Harga : Rp ".number_format($member['total_price'])."</li>
		</ul><br />
		Back Office baru saja mengganti status '".$options[$status_before]."' menjadi '".$options[$data['status']]."' diharapkan untuk melakukan konfirmasi transaksi admin.
		";
		$this->email->from($setting['email_website'], 'Tamar Goldshop');
		$this->email->to($setting['email_website']); 
		$this->email->subject('[Notif Tamar] Transaksi Beli Member');
		$this->email->message($message);	
		$this->email->send();
	}
	function BackTransactionNonmember($id_order,$data,$status_before){
		/* 
			variable id order untuk mengambil kode id_order dan var data untuk mengambil
			method post yang dilakukan update dari backoffice
		*/
		$member = $this->Model_transaction->get_transaction_nonmember($id_order); // ambil data order member
		$setting = $this->Model_setting->setting();
		/* Status Transaksi Member */
		$options = array(
						'' => 'Change Status',
						1 => 'Unpaid',
						2 => 'Paid',
						4 => 'Dikirim / Diambil',
						5 => 'Cancel',
					);
		// configuration email type
		$config['mailtype'] = "html";
		$this->email->initialize($config);
		// Message
		$message = "Backoffice baru saja mengganti status order dari transaksi beli member yang dilakukan oleh ".$member['name']." yang memesan:<br /><br />
		<ul>
			<li>Nama Produk : ".$member['name_product']."</li>
			<li>QTY : ".$member['qty']."</li>
			<li>Total Harga : Rp ".number_format($member['total_price'])."</li>
		</ul><br />
		Back Office baru saja mengganti status '".$options[$status_before]."' menjadi '".$options[$data['status']]."' diharapkan untuk melakukan konfirmasi transaksi admin.
		";
		$this->email->from($setting['email_website'], 'Tamar Goldshop');
		$this->email->to($setting['email_website']); 
		$this->email->subject('[Notif Tamar] Transaksi Beli Member');
		$this->email->message($message);	
		$this->email->send();
	}
	function backCicilan($id,$data,$status_before){
		/* 
			variable id order untuk mengambil kode id_cicilan detail dan var data untuk mengambil
			method post yang dilakukan update dari backoffice
		*/
		$cicilan = $this->Model_transaction->get_cicilan_detail($id);
		$setting = $this->Model_setting->setting();
		$options = array(
				1 => 'Belum Transfer',
                2 => 'Sudah Transfer'
        );
		// configuration email type
		$config['mailtype'] = "html";
		$this->email->initialize($config);
		// Message
		$message = "Backoffice baru saja mengganti status pembayaran cicilan yang dilakukan oleh username <b>".$cicilan['username']."</b> atau yang memiliki nama asli ".$cicilan['name']." yang memesan:<br /><br />
		<ul>
			<li>Nama Produk : ".$cicilan['name_product']."</li>
			<li>Jangka Waktu : ".$cicilan['jangka_waktu']." Bulan</li>
			<li>Total Harga : Rp ".number_format($cicilan['total_biaya'])."</li>
		</ul><br />
		Back Office baru saja mengganti status '".$options[$status_before]."' menjadi '".$options[$data['status']]."'.
		Demikian Informasi dari Auto Notification Tamar Gold Shop.
		";
	}
}