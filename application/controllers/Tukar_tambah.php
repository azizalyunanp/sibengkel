<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tukar_tambah extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->model('M_tukar_tambah');
		$this->load->model('M_inventory');
		$this->load->model('M_penjualan');
		$this->load->model('M_pembelian');
		$this->load->model('M_laporan');
	}

	public function index() {

		if($this->session->has_userdata('username')) {
		$where = array(
		'sess_id' => session_id()
		 );
		$data = array(
		'brg' 		=> $this->M_tukar_tambah->tampil_bekas()->result(),
		'sidebar'	=> "Tukar_tambah",
		'kategori'	=> $this->M_inventory->tampil_kategori()->result(),
		'menu'		=> "active",
		);

		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('tukar_tambah',$data);
		$this->load->view('template/footer');

	} else {
		$this->load->view('login');
	}
	}

	public function view_beli() {
		$data = array(
			'cart' 		=> $this->M_tukar_tambah->tampil_cart(session_id(),'tbl_temp_tt')->result(),
			'total' 	=> $this->get_total(), //ambil total untuk pembelian TT dari penjual ke pembeli 
			'cart_j' 	=> $this->cart->contents(),
			'pelanggan' => $this->M_penjualan->tampil_pelanggan()->result(),
			'all_total' => $this->cart->total() - $this->get_total() //total jumlah barang yang dibeli dikurang barang yang akan dijual oleh penjual
		);
		$this->load->view('v_tukar_tambah',$data);
	}

	public function getnonota_beli() {
		$cek 	= $this->M_tukar_tambah->getnonota_beli()->num_rows();

		//GET LAST NONOTA
		$last 	= $this->M_tukar_tambah->notaterakhir_beli()->row();

		if($cek==0) {
			$nomor 	= '1000';
		} else {
			$nomor 	= $last->no + 1;
		}	
		return $nomor;	
	}

	public function getnonota_jual() {
		$cek 	= $this->M_tukar_tambah->getnonota_jual()->num_rows();

		//GET LAST NONOTA
		$last 	= $this->M_tukar_tambah->notaterakhir_jual()->row();

		if($cek==0) {
			$nomor 	= '1000';
		} else {
			$nomor 	= $last->no + 1;
		}	
		return $nomor;	
	}

	public function get_total() {
		$this->db->select_sum('subtotal');
		$this->db->from('tbl_temp_tt');
		$this->db->where('sess_id',session_id());
		$query = $this->db->get();
		return $query->row()->subtotal;
	}

	public function search_brg() { 
		$data = array(
			'barang' 	=> $this->M_tukar_tambah->tampil_bekas()->result()
		);

		$this->load->view('v_cr_brg_tt',$data);
	}

	public function search_brg_jual() { 
		$data = array(
			'barang' 	=> $this->M_tukar_tambah->tampil_brg_jual()->result()
		);

		$this->load->view('v_cr_brg_jual_tt',$data);
	}

	public function add_so_beli($where) {
		//INPUT STOK MASUK 
		$beli 	= $this->M_pembelian->tampil_tt($where)->result();
		foreach ($beli as $b) {
		$data[] = array(
			'id_brg' 	 => $b->id,
			'nama_brg'	 => $b->name,
			'beli' 	 	 => $b->qty,
			'tanggal'	 => date('Y-m-d')
		);
		}
		$this->db->insert_batch('tbl_so',$data);
	}

	public function add_so_jual() {
		$tampil 	= $this->cart->contents();
		foreach ($tampil as $items) {
		$data[] = array(
			'id_brg' 	=> $items['id'],
			'nama_brg'	=> $items['name'],
			'jual'		=> $items['qty'],
			'tanggal'	=> date('Y-m-d')
		);	
		}
		$this->db->insert_batch('tbl_so',$data);
	}

	public function add_beli() {
		//CEK BARANG SUDAH DI ORDER ATAU BELUM berdasarkan KODE BARANG
		$where = array(
		'id'		=> $this->input->post('kd_brg',TRUE),
		'sess_id'	=> session_id()
		);

		$data = array(
			'id'		=> $this->input->post('kd_brg',TRUE),
			'qty' 		=> $this->input->post('qty',TRUE),
			'price' 	=> str_replace(".", "", $this->input->post('harga',TRUE)),
			'name' 		=> $this->input->post('nama',TRUE),
			'subtotal'	=> $this->input->post('qty',TRUE) * str_replace(".", "", $this->input->post('harga',TRUE)),
			'sess_id' 	=> session_id()
			);

		$cek  = $this->M_tukar_tambah->get_cart($where['id'],$where['sess_id'],'tbl_temp_tt')->num_rows(); //cari data di tabel temporary ketika tukartambah

		//jika kosong 
		if($cek==0) {	

		$this->db->insert('tbl_temp_tt',$data);
		
		} else { // jika ada 

		$this->db->set('qty','qty+'.$data['qty'],FALSE);
		$this->db->set('subtotal','price*qty',FALSE);
		$this->db->where('id',$data['id']);
		$this->db->update('tbl_temp_tt');
		}
	}

	public function add_jual() {
		$data = array(
		'id' 		=> $this->input->post('kd_brg',TRUE),
		'name' 		=> $this->input->post('nama',TRUE),
		'qty' 		=> $this->input->post('qty',TRUE),
		'price' 	=> str_replace(".", "", $this->input->post('harga',TRUE))
		);
	$this->cart->insert($data);
	}

	public function del_beli($id) {
		$where = array(
			'no' 		=> $id
		);

		$this->M_tukar_tambah->delbeli($where,'tbl_temp_tt');
		redirect('tukar_tambah');
	}

	public function savebeli() {
		$where = array(
		'sess_id'	=> session_id()
		);
		$cek 	= $this->M_tukar_tambah->cek_beli($where,'tbl_temp_tt')->num_rows();

		if($cek>0) { 
		$beli 	= $this->M_tukar_tambah->tampil_cart(session_id(),'tbl_temp_tt')->result();

		//SAVE DETAIL pembelian
		foreach ($beli as $b) {
		$data[] = array(
			'nonota' 	 => $this->getnonota_beli(),
			'id_brg' 	 => $b->id,
			'nama_brg'	 => $b->name,
			'jml_brg' 	 => $b->qty,
			'harga_brg'	 => $b->price
		);
		
		}
		$this->M_tukar_tambah->savebeli($data,'tbl_detail_pembelian');
		$this->add_so_beli($where);

		// SAVE ORDER TO DATABASE 
		$order = array(
		'no_beli' 	 => $this->getnonota_beli(),
		'total'	 	 => $this->get_total(),
		'waktu'		 => date('Y-m-d H:i:s'),
		'tanggal'	 => date('Y-m-d'),
		'keterangan' => 'tukar tambah'
		);

		$this->M_tukar_tambah->saveorder_beli($order,'tbl_pembelian');
		$this->save_ju_beli();
		$this->updatestok_beli();
		$this->delallbeli();
	}
	else {
		$data = array(
			'content' => 'Anda belum melakukan pembelian',
			'url' 	  => 'tukar_tambah'
		);

		$this->load->view('notification/error',$data);
	}
	}

	public function delallbeli() {
		$where = array(
		'sess_id' => session_id() 
		);
		$this->M_tukar_tambah->delcart($where,'tbl_temp_tt');
	}

	public function updatebeli() {
		$data = array(
		'id' 		=> $this->input->post('id',TRUE),
		'qty'		=> str_replace('.','',$this->input->post('editval',TRUE)),
		'column' 	=> $this->input->post('column',TRUE)
		);

		$this->db->set($data['column'],$data['qty']);
		$this->db->set('subtotal','qty*price',FALSE);
		$this->db->where('sess_id',session_id());
		$this->db->where('no',$data['id']);
		$this->db->update('tbl_temp_tt');
	}

	public function updatestok_beli() { //UPDATE STOK PEMBELIAN

	$where = array(
	'sess_id' => session_id()
	);
	$tampil = $this->M_tukar_tambah->tampil_cart(session_id(),'tbl_temp_tt')->result();

	foreach ($tampil as $t) {
		$stok 	= $t->qty;
		$id 	= $t->id;
		$this->M_tukar_tambah->updatestock($stok,$id,'tbl_barang');
	}
	}

	public function updatestok_jual() {
	$tampil = $this->cart->contents();
	foreach ($tampil as $items) {
		$stok 	= $items['qty'];
		$id 	= $items['id'];
		$this->M_penjualan->updatestock($stok,$id,'tbl_barang');
	}
}

	public function save_ju_beli() {
		//SIMPAN JURNAL UMUM SEBAGAI PEMBELIAN BARANG
		$where	= date('Y-m-d');
		$cek 	= $this->M_pembelian->cek_ju($where,'tbl_jurnal_umum')->num_rows();
		if($cek==0) { 
		$ju 	= array(
			'tanggal' 		=>	date('Y-m-d'),
			'nama_perkiraan'=> 	'Pembelian',
			'debet' 		=>	$this->get_total(),
			'kredit'		=>	0,
			'keterangan'	=> 'Tunai'
		);
		$this->db->insert('tbl_jurnal_umum',$ju);

		$ju = array(
			'tanggal' 		=>	date('Y-m-d'),
			'nama_perkiraan'=> 	'Kas',
			'kredit' 		=>	$this->get_total(),
			'debet'			=>	0,
			'keterangan' 	=> 	'Pembelian'
		 );
		$this->db->insert('tbl_jurnal_umum',$ju);
	} else {
		//UPDATE FOR KAS KREDIT
		$where = array(
			'keterangan' 	=> 'Pembelian',
			'nama_perkiraan'=> 'Kas'
		);
		$this->db->set('kredit','kredit+'.$this->get_total(),FALSE);
		$this->db->where($where);
		$this->db->update('tbl_jurnal_umum');

		//UPDATE FOR PEMBELIAN DEBET
		$this->db->set('debet','debet+'.$this->get_total(),FALSE);
		$this->db->where('nama_perkiraan','Pembelian');
		$this->db->where('keterangan','Tunai'); 
		$this->db->update('tbl_jurnal_umum');
	}
}

	public function save_ju_jual() {

	//SIMPAN JURNAL  UMUM SEBAGAI PENJUALAN BARANG
		$where	= date('Y-m-d');
		$cek 	= $this->M_penjualan->cek_ju($where,'tbl_jurnal_umum')->num_rows();
		if($cek==0) { 
		$ju 	= array(
			'tanggal' 		=>	date('Y-m-d'),
			'nama_perkiraan'=> 	'Kas',
			'debet' 		=>	str_replace('.','',$this->input->post('total',TRUE)),
			'kredit'		=>	0,
			'keterangan' 	=> 	'Penjualan'
		);
		$this->db->insert('tbl_jurnal_umum',$ju);

		$ju = array(
			'tanggal' 		=>	date('Y-m-d'),
			'nama_perkiraan'=> 	'Penjualan',
			'kredit' 		=>	str_replace('.','',$this->input->post('total',TRUE)),
			'debet'			=>	0,
		 );
		$this->db->insert('tbl_jurnal_umum',$ju);
	} else {
		//UPDATE FOR KAS DEBET
		$where = array(
			'keterangan' 	=> 'Penjualan',
			'nama_perkiraan'=> 'Kas'
		);
		$this->db->set('debet','debet+'.str_replace('.','',$this->input->post('total',TRUE)),FALSE);
		$this->db->where($where);
		$this->db->update('tbl_jurnal_umum');

		//UPDATE FOR PENJUALAN KREDIT
		$this->db->set('kredit','kredit+'.str_replace('.','',$this->input->post('total',TRUE)),FALSE);
		$this->db->where('nama_perkiraan','Penjualan');
		$this->db->update('tbl_jurnal_umum');
	}

	}

	public function del_pers_akhir() {
		$this->M_penjualan->del_pers_akhir();
	}


	public function save_TT() {
		$this->del_pers_akhir(); // delete persediaan akhir bulan
		
		
		//SAVE DETAIL ORDER
		$tampil 	= $this->cart->contents();
		foreach ($tampil as $items) {
		$data[] = array(
			'nonota' 	=> $this->getnonota_jual(),
			'id_brg' 	=> $items['id'],
			'nama_brg'	=> $items['name'],
			'jml_brg'	=> $items['qty'],
			'harga_brg' => $items['price']
		);	
		}
		$this->add_so_jual();
		$this->M_penjualan->savecart($data,'tbl_detail_penjualan');
		// SAVE ORDER TO DATABASE 
		$order = array(
		'nonota' 	=> $this->getnonota_jual(),
		'kode_pel'	=> $this->input->post('nama_pelanggan',TRUE),
		// 'diskon' 	=> $this->input->post('diskon',TRUE),
		'total'	 	=> str_replace('.','',$this->input->post('total',TRUE)),
		'waktu'	 	=> date('Y-m-d H:i:s'),
		'tanggal'	=> date('Y-m-d'),
		'garansi'	=> $this->input->post('garansi',TRUE)
		);
		$this->M_penjualan->saveorder($order,'tbl_penjualan');
		$this->updatestok_jual();
		$this->save_ju_jual(); //SAVE JURNAL UMUM
		$this->print_nota(); // PRINT NOTA
		$this->savebeli(); // SAVE BELI
		//DELETE CART
		foreach ($tampil as $items) {	
		$cart[] = array(
			'rowid' => $items['rowid'],
			'qty' 	=> 0 
		);
		}
		$this->cart->update($cart);

		echo "<meta http-equiv='refresh' content='1;URL=index'>";
	}

	public function del_cart($id) {
	$data = array(
		'rowid' => $id,
		'qty' 	=> 0 
	);
		$this->cart->update($data);
		redirect('tukar_tambah');
	}

	public function print_nota() {
		$where = array(
			'nonota' 	=> $this->getnonota_jual() - 1,
			'pel'		=> $this->input->post('nama_pelanggan',TRUE)
		);
		$data = array(
			'nonota' 	=> $where['nonota'],
			'status'	=> 'Nota Penjualan (Tukar Tambah)',
			'tt'		=> $this->get_total(),
			'tambah'	=> $this->cart->total() - $this->get_total(),
			'nota' 		=> $this->M_laporan->get_nota($where)->result(),
			'garansi' 	=> $this->M_tukar_tambah->get_garansi($where)->row_array(),
			'bekas'		=> $this->M_tukar_tambah->tampil_cart(session_id())->result(),
			'tgl' 		=> $this->M_laporan->get_nota($where,'tbl_penjualan')->row(),
			'pelanggan'	=> $this->M_laporan->get_pelanggan($where,'tbl_pelanggan')->row(),
			'total' 	=> $this->M_laporan->get_total_jual($where,'tbl_detail_penjualan')->row(),
			'url'  		=> 'penjualan'
		);
		$this->load->view('p_invoice_tt_2',$data);
	}

}