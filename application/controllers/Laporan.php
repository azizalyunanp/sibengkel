<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Laporan extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
		$this->load->model('M_laporan');
		$this->load->model('M_inventory');
		$this->load->library('excel');
	}

	//OPEN LAPORAN PENJUALAN AND ALL FILTER
	public function lap_penjualan() {
	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'lap' 		=> $this->M_laporan->tampil_jual()->result(),
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Penjualan",
		'menu'		=> "active open",
		'per' 		=> "",
		 );
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/lap_penjualan',$data);
		$this->load->view('template/footer');
		}else {
			$this->load->view('login');
		}
	}
	}

	public function lap_pembelian() {
	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'lap' 		=> $this->M_laporan->tampil_beli()->result(),
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Pembelian",
		'menu'		=> "active open",
		'per' 		=> "",
		 );
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/lap_pembelian',$data);
		$this->load->view('template/footer');
		}else {
			$this->load->view('login');
		}
	}
	}

	public function print_nota() {
		$where = array(
			'nonota' 	=> $this->uri->segment(3) ,
			'pel'		=> $this->uri->segment(5)
		);
		$data = array(
			'status'	=> 'Nota Penjualan',
			'nota' 		=> $this->M_laporan->get_nota($where,'tbl_penjualan')->result(),
			'tgl' 		=> $this->M_laporan->get_nota($where,'tbl_penjualan')->row(),
			'pelanggan'	=> $this->M_laporan->get_pelanggan($where,'tbl_pelanggan')->row(),
			'total' 	=> $this->M_laporan->get_total_jual($where,'tbl_detail_penjualan')->row(),
			'sidebar'	=> "Laporan",
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/invoice',$data);
		$this->load->view('template/footer');
	}

	public function print_nota_beli() {
		$where = array(
			'nonota' 	=> $this->uri->segment(3) ,
		);
		$data = array(
			'status'	=> 'Nota Pembelian',
			'nota' 		=> $this->M_laporan->get_nota_beli($where,'tbl_penjualan')->result(),
			'tgl' 		=> $this->M_laporan->get_nota_beli($where,'tbl_penjualan')->row(),
			'total' 	=> $this->M_laporan->get_total_beli($where,'tbl_detail_penjualan')->row(),
			'sidebar'	=> "Laporan",
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/invoice_beli',$data);
		$this->load->view('template/footer');
	}

	public function filter_jual() {
		$status = $this->uri->segment(3);
		if($status=='filter_hari') {
			$this->load->view('modal/filter_lap_harian');		
		}elseif($status=='filter_minggu') {
			$this->load->view('modal/filter_lap_mingguan');	
		} elseif($status=='filter_bulan') {
			$this->load->view('modal/filter_lap_bulanan');	
		}
	}

	public function view_filter($data) {
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/lap_penjualan',$data);
		$this->load->view('template/footer');
	}

	public function filter_beli() {
		$status = $this->uri->segment(3);
		if($status=='filter_hari') {
			$this->load->view('modal/filter_beli_harian');		
		}elseif($status=='filter_minggu') {
			$this->load->view('modal/filter_beli_mingguan');	
		} elseif($status=='filter_bulan') {
			$this->load->view('modal/filter_beli_bulanan');	
		}
	}

	public function view_filter_beli($data) {
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/lap_pembelian',$data);
		$this->load->view('template/footer');
	}

	public function filter_jual_harian() {
		$where = date('Y-m-d',strtotime($this->input->post('tanggal',TRUE)));
		$data = array(
		'lap' 		=> $this->M_laporan->filter_jual_harian($where,'tbl_penjualan')->result(),
		'per' 		=> date('d M Y',strtotime($where)),
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Penjualan",
		'menu'		=> "active open", 
		);
	   $this->view_filter($data);

	}

	public function filter_beli_harian() {
		$where = date('Y-m-d',strtotime($this->input->post('tanggal',TRUE)));
		$data = array(
		'lap' 		=> $this->M_laporan->filter_beli_harian($where,'tbl_penjualan')->result(),
		'per' 		=> date('d M Y',strtotime($where)),
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Pembelian",
		'menu'		=> "active open",
		);
		$this->view_filter_beli($data);
	}

	public function filter_jual_mingguan() {
		$where = array(
			'tgl_1' => date('Y-m-d',strtotime($this->input->post('tanggal_1',TRUE))),
			'tgl_2' => date('Y-m-d',strtotime($this->input->post('tanggal_2',TRUE))),
		);

		$data = array(
		'lap' 		=>  $this->M_laporan->filter_jual_mingguan($where,'tbl_penjualan')->result(),
		'mng' 		=>  $where,
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Penjualan",
		'menu'		=> "active open",
		);
		$this->view_filter($data);
	}

	public function filter_beli_mingguan() {
		$where = array(
			'tgl_1' => date('Y-m-d',strtotime($this->input->post('tanggal_1',TRUE))),
			'tgl_2' => date('Y-m-d',strtotime($this->input->post('tanggal_2',TRUE))),
		);

		$data = array(
		'lap' 		=>  $this->M_laporan->filter_beli_mingguan($where,'tbl_pembelian')->result(),
		'mng' 		=>  $where,
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Pembelian",
		'menu'		=> "active open",
		);
		$this->view_filter_beli($data);
	}

	public function filter_jual_bulanan() {
		$where 		= $this->input->post('bulan',TRUE);
		$thn			= $this->input->post('tahun',TRUE);
 		$monthName 	= date("F", mktime(0, 0, 0, $where, 10));
		$data = array(
		'lap' 		=> $this->M_laporan->filter_jual_bulanan($where,$thn,'tbl_penjualan')->result(),
		'per' 		=> $monthName . ' '.$thn,
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Penjualan",
		'menu'		=> "active open", 
		 );	
	}

	public function filter_beli_bulanan() {
		$where 		= $this->input->post('bulan',TRUE);
		$thn			= $this->input->post('tahun',TRUE);
 		$monthName 	= date("F", mktime(0, 0, 0, $where, 10));
		$data = array(
		'lap' 		=> $this->M_laporan->filter_beli_bulanan($where,$thn,'tbl_pembelian')->result(),
		'per' 		=> $monthName . ' '. $thn,
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Pembelian",
		'menu'		=> "active open",
		 );
		$this->view_filter_beli($data);
	}
	//CLOSE LAPORAN PENJUALAN AND ALL FILTER


	//OPEN LAPORAN BARANG KELUAR & MASUK
	public function lap_brg_keluar() {
	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Barang Keluar",
		'menu'		=> "active open",
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/v_lap_barang_keluar');
		$this->load->view('template/footer');
		}else {
			$this->load->view('login');
		}
	}
	}




	public function filter_brg_keluar() {
		$status = $this->uri->segment(3);
		if($status=='filter_hari') {
			$this->load->view('modal/filter_brg_kel_hari');		
		}elseif($status=='filter_minggu') {
			$this->load->view('modal/filter_brg_kel_minggu');	
		} elseif($status=='filter_bulan') {
			$this->load->view('modal/filter_brg_kel_bln');	
		}
	}



	public function v_brg_keluar($data) {
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/lap_barang_keluar',$data);
		$this->load->view('template/footer');
	}


	function setting_excel($data) { //SETTING EXCEL UNTUK LAPORAN STOCK OPNAME
		$heading 		= $data['judul'];
		$heading2 		= array('No','Tanggal','Nama Barang','Kategori','Sub 1','Sub 2','Sub 3','Stok Masuk','Stok Keluar','Stok Akhir');
		$this->excel->setActiveSheetIndex(0);
	   $this->excel->getActiveSheet()->setTitle($data['title']);
	   $rowNumberH 	= 2;
	   $no 				= 1;
		$colH 			= 'A';
		$row 				= 3;
		$this->excel->getActiveSheet()->setCellValue('A1',$heading);
	    	foreach($heading2 as $h2){ //SETTING HEADER
	        $this->excel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h2);
	        $colH++;    
	    	}

	   $tot_beli = 0;
	   $tot_jual = 0;
	   $tot_sisa = 0;
   	foreach ($data['lap'] as $l) {
	   	$this->excel->getActiveSheet()->setCellValue('A'.$row,$no);
	      $this->excel->getActiveSheet()->setCellValue('B'.$row,$l->tanggal);
	      $this->excel->getActiveSheet()->setCellValue('C'.$row,$l->nama_brg);
	      $this->excel->getActiveSheet()->setCellValue('D'.$row,$l->kategori);
	      $this->excel->getActiveSheet()->setCellValue('E'.$row,$l->sub_1);
	      $this->excel->getActiveSheet()->setCellValue('F'.$row,$l->sub_2);
	      $this->excel->getActiveSheet()->setCellValue('G'.$row,$l->sub_3);
	      $this->excel->getActiveSheet()->setCellValue('H'.$row,$l->beli);
	      $this->excel->getActiveSheet()->setCellValue('I'.$row,$l->jual);
	      $this->excel->getActiveSheet()->setCellValue('J'.$row,$l->sisa);
	      $row++;
	      $no++;
	      $tot_beli += $l->beli;
	      $tot_jual += $l->jual;
	      $tot_sisa += $l->sisa;
   	}

   	//GET LAST VALUE FOR ROW EXCEL
   	$c = count($data['lap']) + 4 ;
   	$this->excel->getActiveSheet()->setCellValue('A'.$c,'TOTAL');
   	$this->excel->getActiveSheet()->setCellValue('H'.$c,$tot_beli);
   	$this->excel->getActiveSheet()->setCellValue('I'.$c,$tot_jual);
   	$this->excel->getActiveSheet()->setCellValue('J'.$c,$tot_sisa);
	}

	public function lap_brg_keluar_hari() { // LAPORAN STOCK OPNAME BERDASARKAN HARI
		$where 			= date('Y-m-d',strtotime($this->input->post('tanggal',TRUE)));
		$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where",
			'lap' 	=> $this->M_laporan->get_brg_keluar_hari($where)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
	   $this->setting_excel($data); //PRINT EXCEL
	   $filename = "LAP STOCK OPNAME_$where.xls"; //save our workbook as this file name
	   header('Content-Type: application/vnd.ms-excel'); //mime type
	   header('Content-Disposition: attachment;filename="'.$filename.'"'); 
	   header('Cache-Control: max-age=0'); //no cache
	   $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	   $objWriter->save('php://output');
	}

	
	public function lap_brg_keluar_minggu() {
	$where = array(
		'tgl_1' => date('Y-m-d',strtotime($this->input->post('tanggal_1',TRUE))),
		'tgl_2' => date('Y-m-d',strtotime($this->input->post('tanggal_2',TRUE))),
	);
	$data = array(
		'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where[tgl_1] - $where[tgl_2]",
		'lap' 	=> $this->M_laporan->get_brg_keluar_minggu($where)->result(),
		'title'	=> "Lap.Stok Minggu" 
	);
   $this->setting_excel($data); //PRINT EXCEL
   $filename="LAP STOCK OPNAME.xls"; //save our workbook as this file name
   header('Content-Type: application/vnd.ms-excel'); //mime type
   header('Content-Disposition: attachment;filename="'.$filename.'"'); 
   header('Cache-Control: max-age=0'); //no cache
   $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
   $objWriter->save('php://output');
	}


	public function lap_brg_keluar_bln() {
		$where 		= $this->input->post('bulan',TRUE);
		$thn			= $this->input->post('tahun',TRUE);
		$monthName 	= date("F", mktime(0, 0, 0, $where, 10));
		$data 		= array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL BULAN $monthName $thn",
			'lap' 	=>  $this->M_laporan->get_brg_keluar_bulan($where,$thn)->result(),
			'title'	=> "Lap.Stok Bulan" 
		);
   	$this->setting_excel($data); //PRINT EXCEL
	   $filename="LAP STOCK OPNAME BULAN.xls"; //save our workbook as this file name
	   header('Content-Type: application/vnd.ms-excel'); //mime type
	   header('Content-Disposition: attachment;filename="'.$filename.'"'); 
	   header('Cache-Control: max-age=0'); //no cache
	   $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	   $objWriter->save('php://output');
	}

	
	public function v_kat_brg_klr() {
		$data = array(
			'kat' 	=> $this->M_laporan->v_all_kat()->result(),
			'nama'	=> $this->M_laporan->v_all_nama()->result(),
			'sub_1'	=> $this->M_laporan->v_all_sub_1()->result(),
			'sub_2'	=> $this->M_laporan->v_all_sub_2()->result(),
			'sub_3'	=> $this->M_laporan->v_all_sub_3()->result(),
		);
		$this->load->view('modal/v_kat_brg_klr',$data);
	}

}