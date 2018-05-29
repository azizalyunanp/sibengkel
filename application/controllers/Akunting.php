<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akunting extends CI_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_akunting');
		$this->load->model('M_inventory');
	}

	public function ref() {
		if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/warning',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'reference' => $this->M_akunting->tampil_ref()->result(),
		'sidebar'	=> "Akunting",
		'sidebar2'	=> "Reference",
		'menu'		=> "active open",
		 );
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('akunting/reference',$data);
		$this->load->view('template/footer');
	}else {
		$this->load->view('login');
	}
	}
}

	public function jurnal_umum() {

	if(!$this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'ju' 			=> $this->M_akunting->tampil_ju()->result(),
		'ref' 			=> $this->M_akunting->tampil_ref()->result(),
		'sidebar'		=> "Akunting",
		'sidebar2'		=> "Jurnal Umum",
		'menu'			=> "active open",
		'total_debet'	=> $this->M_akunting->get_total_d()->row(),
		'total_kredit'	=> $this->M_akunting->get_total_k()->row(),
		 );
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('akunting/jurnal-umum',$data);
		$this->load->view('template/footer');
	}else {
		$this->load->view('login');
	}
	}
}
	
	public function get_akun() {
		$get = $this->input->post('akun',TRUE);
		$this->db->select('*');
		$this->db->from('tbl_ref');
		$this->db->where('id',$get);
		$query = $this->db->get();
		return $query;
	}


 	public function tambah_ju() {
 		$trans 	= $this->get_akun()->row()->no_ref;
 		if($trans==102) { // PIUTANG PEGAWAI 

 		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Piutang Pegawai',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		 );
		$this->db->insert('tbl_jurnal_umum',$data);

 		} elseif($trans==105) { //SEWA Dibayar Di muka

 		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Sewa dibayar di muka',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		 );

		$this->db->insert('tbl_jurnal_umum',$data);

 		} elseif($trans==106) { //Perlengkapan Toko

 		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Perlengkapan Toko',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
 		
 		$this->db->insert('tbl_jurnal_umum',$data);

 		} 
 		elseif($trans==106) { //Peralatan Toko

 		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Peralatan Toko',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
 		
 		$this->db->insert('tbl_jurnal_umum',$data);

 		} elseif($trans==201) { //HUTANG DAGANG

 		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Persediaan Barang',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Hutang Dagang',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

	}elseif($trans==202) { //HUTANG BANK 
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Hutang Bank',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

	}elseif($trans==302) { // PRIVE OWNER
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Prive Owner',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

	}elseif($trans==501) { //BIAYA PEMBELIAN
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Biaya Pembelian',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

	}elseif($trans==503) { //GAJI PEGAWAI
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Biaya Gaji',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

	}elseif($trans==504){ //REKENING AIR 
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Biaya Rek Air',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

	}elseif ($trans==507) { // REKENING LISTRIK 
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Biaya Listrik & Telepon',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

	}elseif ($trans==508) { // Biaya lain-lain
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Biaya lain-lain',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);
		}

		elseif ($trans==505) { // Biaya Penyusutan Peralatan Toko
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Biaya Peny.Inventaris',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Akum.Peny.Inventaris',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);
		}

		elseif ($trans==506) { // Biaya Penyusutan Kendaraan
		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Biaya Peny.Kendaraan',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Akum.Peny.Kendaraan',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);
		}

		elseif ($this->input->post('akun',TRUE) == 'b_hutang_dagang') {
			$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Hutang Dagang',
			'debet' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal' 		=>	date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	str_replace('.','',$this->input->post('biaya',TRUE)),
			'debet'			=>	0,
			'keterangan' 	=> 	$this->input->post('keterangan',TRUE)
		);
		$this->db->insert('tbl_jurnal_umum',$data);
		}
		redirect('akunting/jurnal_umum');
	}


	public function update_ju() {
		$this->db->set($this->input->post('column',TRUE),str_replace(".","",$this->input->post('editval',TRUE)));
		$this->db->where('no', $this->input->post('id',TRUE));
		$this->db->update('tbl_jurnal_umum');
	}

	public function buku_besar() {

	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'ju' 			=> $this->M_akunting->tampil_ju()->result(),
		'ref' 			=> $this->M_akunting->get_ref_bukbes()->result(),
		'sidebar'		=> "Akunting",
		'sidebar2'		=> "Buku Besar",
		'menu'			=> "active open",
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('akunting/buku-besar',$data);
		$this->load->view('template/footer');
	}else {
		$this->load->view('login');
	}
	}
}

	public function get_bukubesar() {
		$akun = $this->input->post('akun',TRUE);
		$data = array(
		'ju' 			=> $this->M_akunting->get_bukubesar($akun,'tbl_jurnal_umum')->result(),
		'ref' 			=> $this->M_akunting->get_ref_bukbes()->result(),
		'sidebar'		=> "Akunting",
		'sidebar2'		=> "Buku Besar",
		'menu'			=> "active open",
		'set_saldo' 	=> 	$this->get_top_bukbes(),
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('akunting/buku-besar',$data);
		$this->load->view('template/footer');;
	}


	public function get_top_bukbes() {
		$this->db->select('debet,kredit');
		$this->db->from('tbl_jurnal_umum');
		$this->db->where('nama_perkiraan',$this->input->post('akun',TRUE));
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function lap_rugi_laba() {

	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$now  = date('m');
		$data = array(
		'bulan' 		=> $now,
		'sidebar'		=> "Akunting",
		'sidebar2'		=> "Laporan Rugi Laba",
		'menu'			=> "active open",
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('akunting/filter_lap_rugi_laba',$data);
		$this->load->view('template/footer');
	}else {
		$this->load->view('login');
	}
	}
}	
	
	public function filter_lap_rugi_laba() {
		$bln = $this->input->post('bulan',TRUE);
		$thn = $this->input->post('tahun',TRUE);

		$g_persediaan 	= $this->M_akunting->g_persediaan($bln,$thn)->num_rows();
		$pers_awal		= $this->M_akunting->c_pers_awal($bln,$thn,'tbl_jurnal_umum')->num_rows();
		if($g_persediaan==$pers_awal OR $pers_awal==0) { //mencari apakah sudah melakukan stok persediaan akhir
			$data = array(
				'content' => 'Isi Persediaan Awal / Akhir terlebih dahulu',
				'url'	  => 'akunting/lap_rugi_laba')
			;
			$this->load->view('notification/error',$data);

		} else {
		$data = array(
		't_jual' 		=> $this->M_akunting->get_total_jual_fil($bln,$thn,'tbl_jurnal_umum')->row_array(),
		'pers_awal'		=> $this->M_akunting->c_pers_awal($bln,$thn,'tbl_jurnal_umum')->row(),
		't_beli'		=> $this->M_akunting->t_beli($bln,$thn,'tbl_jurnal_umum')->row(),
		'pers_akhir'	=> $this->M_akunting->g_pers_akhir($bln,$thn)->row_array(),
		'get_rugilaba'	=> $this->M_akunting->get_all_rugilaba_fil($bln,$thn,'tbl_jurnal_umum')->result(),
		'sidebar'		=> "Akunting",
		'sidebar2'		=> "Laporan Rugi Laba",
		'menu'			=> "active open",
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('akunting/lap_rugi_laba',$data);
		$this->load->view('template/footer');
	}
}
	public function get_nama_bln($bln) { 
	$monthNum = $bln;
 	$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
 	return $monthName;
	
	}

	public function pers_akhir() {
		$bln 	= date('m',strtotime($this->input->post('tanggal',TRUE)));
		$thn	= date('Y',strtotime($this->input->post('tanggal',TRUE)));
		$tgl 	= date('Y-m-d',strtotime($this->input->post('tanggal',TRUE)));

		$c_pers_akhir 	= $this->M_akunting->c_pers_akhir($bln,$thn,'tbl_jurnal_umum')->num_rows();
		$pers_awal 		= $this->M_akunting->get_persediaan($tgl,date('Y'))->row_array();

		if($c_pers_akhir==0) {

		$data = array(
			'tanggal' 			=> date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'	=> 'Beban Persediaan',
			'debet'				=> $pers_awal['debet'] - $this->get_pers_akhir($bln,$thn),
			'kredit'			=> 0
			);
		$this->db->insert('tbl_jurnal_umum',$data);
		
		$data = array(
			'tanggal' 			=> date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan'	=> 'Persediaan Barang',
			'debet'				=> 0,
			'kredit'			=> $pers_awal['debet'] - $this->get_pers_akhir($bln,$thn),
			'keterangan'		=> 'Akhir'
			);
		$this->db->insert('tbl_jurnal_umum',$data);

		$this->load->view('notification/success');
		echo '<meta http-equiv="refresh" content="2;URL=lap_rugi_laba">';
	} else {
		$d = $pers_awal['debet'] - $this->get_pers_akhir($bln,$thn);

		$this->db->set('debet',$d,FALSE);
		$this->db->where('nama_perkiraan','Beban Persediaan');
		$this->db->update('tbl_jurnal_umum');

		$this->db->set('kredit',$d,FALSE);
		$this->db->where('nama_perkiraan','Persediaan Barang');
		$this->db->where('keterangan','Akhir');
		$this->db->update('tbl_jurnal_umum');

		$this->load->view('notification/success');
		echo '<meta http-equiv="refresh" content="2;URL=lap_rugi_laba">';
		// $data = array(
		// 	'content' 	=> 'Persediaan Akhir sudah diinput',
		// 	'url'		=> 'akunting/lap_rugi_laba' 
		// 	);
		// $this->load->view('notification/error',$data);
	}
	}

	public function get_pers_akhir($bln,$thn) {
		$pers_awal		= $this->M_akunting->c_pers_awal($bln,$thn,'tbl_jurnal_umum')->row_array();
		$t_beli			= $this->M_akunting->t_beli($bln,$thn,'tbl_jurnal_umum')->row_array();
		$t_jual 		= $this->M_akunting->get_total_jual_fil($bln,$thn)->row_array();

		$pers_akhir 	= $t_jual['total'] - ($pers_awal['debet'] + $t_beli['t_beli']);

		return $pers_akhir;
	}

	public function neraca() {

	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'sidebar'		=> "Akunting",
		'sidebar2'		=> "Jurnal Umum",
		'menu'			=> "active open",
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('akunting/neraca',$data);
		$this->load->view('template/footer');
	}else {
		$this->load->view('login');
	}
	}
}

	public function save_modal() {
		$data = array(
			'tanggal'		 => date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan' => 'Kas',
			'debet'			 => $this->input->post('kas',TRUE),
			'kredit'		 => 0
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal'		 => date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan' => 'Inventaris',
			'debet'			 => $this->input->post('inventaris',TRUE),
			'kredit'		 => 0
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal'		 => date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan' => 'Persediaan Barang',
			'debet'			 => $this->input->post('persediaan',TRUE),
			'kredit'		 => 0
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal'		 => date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan' => 'Perlengkapan',
			'debet'			 => $this->input->post('perlengkapan',TRUE),
			'kredit'		 => 0
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal'		 => date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan' => 'Kendaraan',
			'debet'			 => $this->input->post('kendaraan',TRUE),
			'kredit'		 => 0
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$data = array(
			'tanggal'		 => date('Y-m-d',strtotime($this->input->post('tanggal',TRUE))),
			'nama_perkiraan' => 'Modal Owner',
			'debet'			 => 0,
			'kredit'		 => str_replace('.','',$this->input->post('total',TRUE))
		);
		$this->db->insert('tbl_jurnal_umum',$data);

		$this->load->view('notification/success');
		echo "<meta http-equiv='refresh' content='2;URL=neraca'>";
	}

	public function filter_neraca() {
		$bln = $this->input->post('bulan',TRUE);
		$thn = $this->input->post('tahun',TRUE);

		$g_neraca_prev = $this->M_akunting->g_neraca_prev($bln,$thn)->num_rows();
		$g_neraca_now  = $this->M_akunting->g_akt_lancar($bln,$thn,'tbl_jurnal_umum')->num_rows();

		if($g_neraca_now==0 AND $g_neraca_prev==0) {
			$data = array(
				'content'	=> 'Input Persediaan Akhir terlebih dahulu',
				'url'		=> 'akunting/neraca' 
			);
			$this->load->view('notification/error',$data);
		}

		if($g_neraca_now>0) {
			$this->tampil_neraca($bln,$thn);
		}

		elseif($g_neraca_prev>0) {

			$bln = $this->input->post('bulan',TRUE) - 1;
			$thn = $this->input->post('tahun',TRUE);

			$this->save_n_saldo($bln,$thn);
		}
	}

	public function tampil_neraca($bln,$thn) {
		$data = array(
		'sidebar'		=> "Akunting",
		'sidebar2'		=> "Reference",
		'menu'			=> "active open",
		'per'				=> $this->get_nama_bln($bln).' '.$thn,
		'akt_lancar'	=> $this->M_akunting->g_akt_lancar($bln,$thn,'tbl_jurnal_umum')->result(),
		'akt_tetap' 	=> $this->M_akunting->g_akt_tetap($bln,$thn,'tbl_jurnal_umum')->result(),
		'akm_inv'		=> $this->M_akunting->g_akm_inv($bln,$thn,'tbl_jurnal_umum')->row(),
		'akm_kend'		=> $this->M_akunting->g_akm_kend($bln,$thn,'tbl_jurnal_umum')->row(),
		'pasiva'			=> $this->M_akunting->g_pasiva($bln,$thn,'tbl_jurnal_umum')->result(),
		'g_modal'		=> $this->M_akunting->g_modal($bln,$thn,'tbl_jurnal_umum')->row_array(),
		'laba_bersih' 	=> $this->c_laba_bersih($bln,$thn),
		'prive'			=> $this->M_akunting->g_prive($bln,$thn,'tbl_jurnal_umum')->row_array()
		 );
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('akunting/filter_neraca',$data);
		$this->load->view('template/footer');

	}

	public function c_laba_bersih($bln,$thn) {
		$t_jual 			= $this->M_akunting->get_total_jual_fil($bln,$thn,'tbl_jurnal_umum')->row_array();
		$pers_awal		= $this->M_akunting->c_pers_awal($bln,$thn,'tbl_persediaan')->row_array();
		$t_beli			= $this->M_akunting->t_beli($bln,$thn,'tbl_jurnal_umum')->row_array();
		$pers_akhir		= $this->M_akunting->g_pers_akhir($bln,$thn)->row_array();
		$get_rugilaba	= $this->M_akunting->get_all_rugilaba_fil($bln,$thn,'tbl_jurnal_umum')->result();

		$t_beban = 0;

		foreach ($get_rugilaba as $g) {
			$t_beban += $g->akun;
		}

		$laba_bersih = $t_jual['total'] - ($pers_awal['debet'] + $t_beli['t_beli'] - $pers_akhir['saldo'] + $t_beban);
		return $laba_bersih;
	}

	public function save_n_saldo($bln,$thn) {
		$akt_lancar 	= $this->M_akunting->g_akt_lancar($bln,$thn,'tbl_jurnal_umum')->result();
		$akt_tetap 		= $this->M_akunting->g_akt_tetap($bln,$thn,'tbl_jurnal_umum')->result();
		$akm_inv 		= $this->M_akunting->g_akm_inv($bln,$thn,'tbl_jurnal_umum');
		$akm_kend		= $this->M_akunting->g_akm_kend($bln,$thn,'tbl_jurnal_umum');
		$pasiva			= $this->M_akunting->g_pasiva($bln,$thn,'tbl_jurnal_umum');
		$g_modal		= $this->M_akunting->g_modal($bln,$thn,'tbl_jurnal_umum')->row_array();
		$laba_bersih 	= $this->c_laba_bersih($bln,$thn);
		$prive			= $this->M_akunting->g_prive($bln,$thn,'tbl_jurnal_umum')->row_array();

		$t_bulan = $bln+1;
		foreach ($akt_lancar as $ak) { //input auto aktiva lancar
			$data[] = array(
				'tanggal' 		=> $thn.'-'.$t_bulan.'-01',
				'nama_perkiraan'=> $ak->nama_perkiraan,
				'debet'			=> $ak->saldo,
				'kredit'		=> 0
		);
		}
		$this->db->insert_batch('tbl_jurnal_umum',$data);

		foreach ($akt_tetap as $at) { //input auto aktiva tetap
			$s_at[] = array(
				'tanggal' 		=> $thn.'-'.$t_bulan.'-01',
				'nama_perkiraan'=> $at->nama_perkiraan,
				'debet'			=> $at->saldo,
				'kredit'		=> 0
			);
		}
		$this->db->insert_batch('tbl_jurnal_umum',$s_at);
		
		if($akm_inv->num_rows() > 0) {
		$ai = $akm_inv->row_array();
		$s_av = array( //input auto akumulasi inventory
			'tanggal' 		=> $thn.'-'.$t_bulan.'-01',
			'nama_perkiraan'=> 'Akum.Peny.Inventaris',
			'debet'			=> 0,
			'kredit'		=> $ai['kredit']
			);
		$this->db->insert('tbl_jurnal_umum',$s_av);
		}

		if($akm_kend->num_rows() > 0) {
		$ak = $akm_kend->row_array();
		$s_akm = array( //input auto akumulasi kendaraan
			'tanggal' 		=> $thn.'-'.$t_bulan.'-01',
			'nama_perkiraan'=> 'Akum.Peny.Kendaraan',
			'debet'			=> 0,
			'kredit'		=> $ak['kredit']
			);
		$this->db->insert('tbl_jurnal_umum',$s_akm);
	}

		if($pasiva->num_rows() >0 ) { 
		foreach ($pasiva->result() as $p) { //pasiva
			$s_pa[] = array(
				'tanggal' 		=> $thn.'-'.$t_bulan.'-01',
				'nama_perkiraan'=> $p->nama_perkiraan,
				'debet'			=> 0,
				'kredit'		=> $p->saldo
			);
		}
		$this->db->insert_batch('tbl_jurnal_umum',$s_pa);
		}

		$s_modal = array( //input auto modal
			'tanggal' 		=> $thn.'-'.$t_bulan.'-01',
			'nama_perkiraan'=> 'Modal Owner',
			'debet'			=> 0,
			'kredit'		=> $g_modal['kredit'] + $laba_bersih - $prive['saldo']
		);
		$this->db->insert('tbl_jurnal_umum',$s_modal);
		$this->tampil_neraca($t_bulan,$thn);
	}

	function hapus_ju($id) {
		$this->db->where('no',$id);
		$this->db->delete('tbl_jurnal_umum');
		redirect('akunting/jurnal_umum');
	}

}