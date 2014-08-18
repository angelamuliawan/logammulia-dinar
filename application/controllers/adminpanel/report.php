<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->library('excel');
		$this->load->model('admin/Model_transaction');
    }
    /*
     *  == Meload Halaman Dashboard dan Login ==
     *  Terdiri dari 2 function :
     *      - index : untuk Admin Dashboard
     *      - login : untuk Login ke Halaman Admin Panel
    */
	function order_member(){
	$result= $this->Model_transaction->fetch_all_transaction_member();
	$sheet = $this->excel->getActiveSheet();
	$sheet->setCellValue('A1','Laporan Penjualan Member (Cash). Tanggal : '.date('d/M/Y H:i'));
	$sheet->mergeCells("A1:I1");
	$sheet->getColumnDimension('A')->setAutoSize(true);
	$sheet->getColumnDimension('B')->setAutoSize(true);
	$sheet->getColumnDimension('C')->setAutoSize(true);
	$sheet->getColumnDimension('D')->setAutoSize(true);
	$sheet->getColumnDimension('E')->setAutoSize(true);
	$sheet->getColumnDimension('F')->setAutoSize(true);
	$sheet->getColumnDimension('G')->setAutoSize(true);
	$sheet->getColumnDimension('H')->setAutoSize(true);
	$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->setCellValue('A2','No');
		$sheet->setCellValue('B2','Code Order');
		$sheet->setCellValue('C2','Nama Pembeli');
		$sheet->setCellValue('D2','Produk');
		$sheet->setCellValue('E2','Harga Beli');
		$sheet->setCellValue('F2','Qty');
		$sheet->setCellValue('G2','Total Harga');
		$sheet->setCellValue('H2','Tanggal Beli');
		$sheet->setCellValue('I2','Status');
	$i=1;$x=3;
	if($result!=0){
		foreach($result as $rows){
			$sheet->setCellValue('A'.$x,$i);
			$sheet->setCellValue('B'.$x,$rows->code_order);
			$sheet->setCellValue('C'.$x,$rows->name);
			$sheet->setCellValue('D'.$x,$rows->name_product);
			$sheet->setCellValue('E'.$x,number_format($rows->harga_pas_beli));
			$sheet->setCellValue('F'.$x,$rows->qty);
			$sheet->setCellValue('G'.$x,number_format($rows->total_price));
			$sheet->setCellValue('H'.$x,date("D, d M Y",strtotime($rows->date_order)));
			if($rows->status_order == 1) $status = "Unpaid";
			else if($rows->status_order == 2) $status = "Paid";
			else if($rows->status_order == 3) $status = "Paid (Confirmed)";
			else if($rows->status_order == 4) $status = "Sent";
			else if($rows->status_order == 5) $status = "Cancel";
			$sheet->setCellValue('I'.$x,$status);
			$x++;$i++;
		}
	}
	else{
		$sheet->setCellValue('A3','No Data Was Found');
		$sheet->mergeCells("A3:I3");
	}
	$writer = new PHPExcel_Writer_Excel5($this->excel);
	header('Content-type: application/vnd.ms-excel');
	$writer->save('php://output'); 
	}
	function order_nonmember(){
		$result= $this->Model_transaction->fetch_all_transaction_nonmember();
		$sheet = $this->excel->getActiveSheet();
		$sheet->setCellValue('A1','Laporan Penjualan Non Member (Cash). Tanggal : '.date('d/M/Y H:i'));
		$sheet->mergeCells("A1:I1");
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->getColumnDimension('J')->setAutoSize(true);
			$sheet->setCellValue('A2','No');
			$sheet->setCellValue('B2','Code Order');
			$sheet->setCellValue('C2','Nama Pembeli');
			$sheet->setCellValue('D2','Email');
			$sheet->setCellValue('E2','Produk');
			$sheet->setCellValue('F2','Harga Beli');
			$sheet->setCellValue('G2','Qty');
			$sheet->setCellValue('H2','Total Harga');
			$sheet->setCellValue('I2','Tanggal Beli');
			$sheet->setCellValue('J2','Status');
		$i=1;$x=3;
		if($result!=0){
			foreach($result as $rows){
				$sheet->setCellValue('A'.$x,$i);
				$sheet->setCellValue('B'.$x,$rows->code_order);
				$sheet->setCellValue('C'.$x,$rows->name);
				$sheet->setCellValue('D'.$x,$rows->email);
				$sheet->setCellValue('E'.$x,$rows->name_product);
				$sheet->setCellValue('F'.$x,number_format($rows->harga_pas_beli));
				$sheet->setCellValue('G'.$x,$rows->qty);
				$sheet->setCellValue('H'.$x,number_format($rows->total_price));
				$sheet->setCellValue('I'.$x,date("D, d M Y",strtotime($rows->date_order)));
				if($rows->status_order == 1) $status = "Unpaid";
				else if($rows->status_order == 2) $status = "Paid";
				else if($rows->status_order == 3) $status = "Paid (Confirmed)";
				else if($rows->status_order == 4) $status = "Sent";
				else if($rows->status_order == 5) $status = "Cancel";
				$sheet->setCellValue('J'.$x,$status);
				$x++;$i++;
			}
		}
		else{
			$sheet->setCellValue('A3','No Data Was Found');
			$sheet->mergeCells("A3:J3");
		}
		$writer = new PHPExcel_Writer_Excel5($this->excel);
		header('Content-type: application/vnd.ms-excel');
		$writer->save('php://output'); 
	}
	function sell(){
		$result= $this->Model_transaction->fetch_all_sell();
		$sheet = $this->excel->getActiveSheet();
		$sheet->setCellValue('A1','Laporan Jual Gold. Tanggal : '.date('d/M/Y H:i'));
		$sheet->mergeCells("A1:I1");
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
			$sheet->setCellValue('A2','No');
			$sheet->setCellValue('B2','Nama Penjual');
			$sheet->setCellValue('C2','Produk');
			$sheet->setCellValue('D2','Harga Jual');
			$sheet->setCellValue('E2','Qty');
			$sheet->setCellValue('F2','Total Harga');
			$sheet->setCellValue('G2','Tanggal Jual');
			$sheet->setCellValue('H2','Status');
		$i=1;$x=3;
		if($result!=0){
			foreach($result as $rows){
				$sheet->setCellValue('A'.$x,$i);
				$sheet->setCellValue('B'.$x,$rows->name);
				$sheet->setCellValue('C'.$x,$rows->name_product);
				$sheet->setCellValue('D'.$x,$rows->harga_pas_jual);
				$sheet->setCellValue('E'.$x,$rows->qty);
				$sheet->setCellValue('F'.$x,number_format(($rows->harga_pas_jual)*($rows->qty)));;
				$sheet->setCellValue('G'.$x,date("D, d M Y",strtotime($rows->date_jual)));
				if($rows->status_jual == 1) $status = "Ajukkan Jual";
				else if($rows->status_jual == 2) $status = "Terjual";
				$sheet->setCellValue('H'.$x,$status);
				$x++;$i++;
			}
		}
		else{
			$sheet->setCellValue('A3','No Data Was Found');
			$sheet->mergeCells("A3:H3");
		}
		$writer = new PHPExcel_Writer_Excel5($this->excel);
		header('Content-type: application/vnd.ms-excel');
		$writer->save('php://output'); 
	}
	function cicilan(){
		$result= $this->Model_transaction->fetchAllcicilan();
		$sheet = $this->excel->getActiveSheet();
		$sheet->setCellValue('A1','Laporan Cicilan Tamar Gold Shop. Tanggal : '.date('d/M/Y H:i'));
		$sheet->mergeCells("A1:G1");
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
			$sheet->setCellValue('A2','No');
			$sheet->setCellValue('B2','Nama Penyicil');
			$sheet->setCellValue('C2','Kode Cicilan');
			$sheet->setCellValue('D2','Total Harga');
			$sheet->setCellValue('E2','Jangka Waktu');
			$sheet->setCellValue('F2','Tanggal Mulai Cicil');
			$sheet->setCellValue('G2','Status');
		$i=1;$x=3;
		if($result!=0){
			foreach($result as $rows){
				$sheet->setCellValue('A'.$x,$i);
				$sheet->setCellValue('B'.$x,$rows->name);
				$sheet->setCellValue('C'.$x,$rows->code_order);
				$sheet->setCellValue('D'.$x,"Rp. ".number_format($rows->total_price));
				$sheet->setCellValue('E'.$x,$rows->jangka_waktu." Bulan");
				$sheet->setCellValue('F'.$x,date("D, d M Y",strtotime($rows->date_mulai_cicilan)));
				if($rows->status_transfer == 1) $status = "Belum Lunas";
				else if($rows->status_transfer == 2) $status = "Sudah Lunas";
				else if($rows->status_transfer == 3) $status = "Sudah Diambil";
				$sheet->setCellValue('G'.$x,$status);
				$x++;$i++;
			}
		}
		else{
			$sheet->setCellValue('A3','No Data Was Found');
			$sheet->mergeCells("A3:H3");
		}
		$writer = new PHPExcel_Writer_Excel5($this->excel);
		header('Content-type: application/vnd.ms-excel');
		$writer->save('php://output'); 
	}
	function simpan(){
		$result= $this->Model_transaction->fetchAllSimpan();
		$sheet = $this->excel->getActiveSheet();
		$sheet->setCellValue('A1','Laporan Simpan Tamar Gold Shop. Tanggal : '.date('d/M/Y H:i'));
		$sheet->mergeCells("A1:F1");
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
			$sheet->setCellValue('A2','No');
			$sheet->setCellValue('B2','Nama Pemilik');
			$sheet->setCellValue('C2','username');
			$sheet->setCellValue('D2','Tanggal Mulai Simpan');
			$sheet->setCellValue('E2','Tanggal Selesai');
			$sheet->setCellValue('F2','Status');
		$i=1;$x=3;
		if($result!=0){
			foreach($result as $rows){
				$sheet->setCellValue('A'.$x,$i);
				$sheet->setCellValue('B'.$x,$rows->name);
				$sheet->setCellValue('C'.$x,$rows->username);
				$sheet->setCellValue('D'.$x,date("D, d M Y",strtotime($rows->date_simpan)));
				$sheet->setCellValue('E'.$x,date("D, d M Y",strtotime($rows->date_simpan)));
				if($rows->status_simpan == 1) $status = "Aktif";
				else if($rows->status_simpan == 2) $status = "Belum Bayar";
				else if($rows->status_transfer == 0) $status = "Nonaktif";
				$sheet->setCellValue('F'.$x,$status);
				$x++;$i++;
			}
		}
		else{
			$sheet->setCellValue('A3','No Data Was Found');
			$sheet->mergeCells("A3:H3");
		}
		$writer = new PHPExcel_Writer_Excel5($this->excel);
		header('Content-type: application/vnd.ms-excel');
		$writer->save('php://output'); 
	}
	function gadai(){
		$result= $this->Model_transaction->fetchAllGadai();
		$sheet = $this->excel->getActiveSheet();
		$sheet->setCellValue('A1','Laporan Gadai Tamar Gold Shop. Tanggal : '.date('d/M/Y H:i'));
		$sheet->mergeCells("A1:M1");
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->getColumnDimension('J')->setAutoSize(true);
		$sheet->getColumnDimension('K')->setAutoSize(true);
		$sheet->getColumnDimension('L')->setAutoSize(true);
		$sheet->getColumnDimension('M')->setAutoSize(true);
			$sheet->setCellValue('A2','No');
			$sheet->setCellValue('B2','Nama Penggadai');
			$sheet->setCellValue('C2','username');
			$sheet->setCellValue('D2','Gram');
			$sheet->setCellValue('E2','Tanggal Mulai Gadai');
			$sheet->setCellValue('F2','Jangka Waktu');
			$sheet->setCellValue('G2','NO ID Emas');
			$sheet->setCellValue('H2','Nilai Taksiran');
			$sheet->setCellValue('I2','Pinjaman');
			$sheet->setCellValue('J2','Biaya Titip');
			$sheet->setCellValue('K2','Cicilan yang Sudah Dilunasi');
			$sheet->setCellValue('L2','Sisa Tagihan');
			$sheet->setCellValue('M2','Status');
		$i=1;$x=3;
		if($result!=0){
			foreach($result as $rows){
				$biaya_titip = $this->Model_transaction->biayaTitipGadai($rows->id_gadai);
				$sheet->setCellValue('A'.$x,$i);
				$sheet->setCellValue('B'.$x,$rows->name);
				$sheet->setCellValue('C'.$x,$rows->username);
				$sheet->setCellValue('D'.$x,$rows->gram_gadai);
				$sheet->setCellValue('E'.$x,date("D, d M Y",strtotime($rows->date_gadai)));
				$sheet->setCellValue('F'.$x,$rows->jangka_waktu." Bulan");
				$sheet->setCellValue('G'.$x,$rows->no_id_emas);
				$sheet->setCellValue('H'.$x,"Rp ".number_format($rows->nilai_taksiran));
				$sheet->setCellValue('I'.$x,"Rp ".number_format($rows->pinjaman));
				$sheet->setCellValue('J'.$x,"Rp ".number_format($biaya_titip));
				$sheet->setCellValue('K'.$x,"Rp ".number_format($rows->cicilan_lunas));
				$sheet->setCellValue('L'.$x,"Rp ".number_format(($rows->pinjaman+$biaya_titip)-($rows->cicilan_lunas)));
				if($rows->status_gadai == 1) $status = "Tergadaikan";
				else if($rows->status_simpan == 2) $status = "Ditebus";
				$sheet->setCellValue('M'.$x,$status);
				$x++;$i++;
			}
		}
		else{
			$sheet->setCellValue('A3','No Data Was Found');
			$sheet->mergeCells("A3:M3");
		}
		$writer = new PHPExcel_Writer_Excel5($this->excel);
		header('Content-type: application/vnd.ms-excel');
		$writer->save('php://output'); 
	}
 }