<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->model('M_penjualan');
		$this->load->model('M_inventory');
		$this->load->model('M_laporan');
		$this->load->model('M_pembelian');
	}

	public function index() {
		if($this->session->has_userdata('username')) {

		$data = array(
		'nonota' 	=> $this->getnonota(),
		'brg' 		=> $this->M_penjualan->tampil_brg()->result(),
		'sidebar'	=> "Penjualan",
		'menu'		=> "active",
		 );
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('penjualan',$data);
		$this->load->view('template/footer');

	} else {
		$this->load->view('login');
	}
	}

	public function view_cart() {

		$data = array(
			'cart' => $this->cart->contents(),
			'pelanggan' => $this->M_penjualan->tampil_pelanggan()->result()
		);
		$this->load->view('v_cart',$data);
	}

	public function getnonota() {
		$cek 	= $this->M_penjualan->getnonota()->num_rows();

		//GET LAST NONOTA
		$last 	= $this->M_penjualan->notaterakhir()->row();

		if($cek==0) {
			$nomor 	= '1000';
		} else {
			$nomor 	= $last->no + 1;
		}	
		return $nomor;	
	}

	public function search_brg() { 
		$data = array(
			'barang' 	=> $this->M_inventory->tampil()->result(),
			'kategori'	=> $this->M_inventory->tampil_kategori()->result()
		);

		$this->load->view('v_cr_brg',$data);
	}

	function ajax_barang() {
        $list = $this->M_inventory->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $barang) {
            $no++;
           	$id_brg = "<input type='hidden' id='cr_kd_brg_$barang->id' value='$barang->id'>";
           	$nm_brg = "<input style='border: 0' maxlength='30' readonly='true' type='text' id='cr_nama_brg_$barang->id' value='$barang->nama'>";
           	$harga 	= "<input style='border: 0' readonly='true' id='cr_hrg_brg_$barang->id' value=$barang->harga_jual size='5'>";
           	$banyak = "<input type='number' class='form-control' style='width: auto;' name='qty' id='cr_qty_$barang->id'>";
            $button = "<button type='button' class='btn btn-success' onclick='add_cart($barang->id)'><i class='fa fa-plus'></i> Tambah</button>";
            $row = array();
            $row[] = $no . $id_brg;
            $row[] = $nm_brg;
            $row[] = $barang->kategori;
            $row[] = $barang->sub_1;
            $row[] = $barang->sub_2;
            $row[] = $barang->sub_3;
            $row[] = $harga;
            $row[] = $barang->stok;
            $row[] = $banyak;
            $row[] = $button;
            $data[] = $row;
        }
 
        $output = array(
            "draw" 				=> $_POST['draw'],
            "recordsTotal" 		=> $this->M_inventory->count_all(),
            "recordsFiltered" 	=> $this->M_inventory->count_filtered(),
            "data" 				=> $data,
        );
        //output to json format
        echo json_encode($output);
    }


	public function add_cart() {
		$data = array(
		'id' 		=> $this->input->post('kd_brg',TRUE),
		'name' 		=> $this->input->post('nama',TRUE),
		'qty' 		=> $this->input->post('qty',TRUE),
		'price' 	=> str_replace(".", "", $this->input->post('harga',TRUE))
		);
	$this->cart->insert($data);
	}

	public function del_cart($id) {
	$data = array(
		'rowid' => $id,
		'qty' 	=> 0 
	);
		$this->cart->update($data);
		redirect('penjualan');
	}

	public function savecart() {
		//SAVE DETAIL ORDER
		$tampil 	= $this->cart->contents();
		foreach ($tampil as $items) {
		$data[] = array(
			'nonota' 	=> $this->getnonota(),
			'id_brg' 	=> $items['id'],
			'nama_brg'	=> $items['name'],
			'jml_brg'	=> $items['qty'],
			'harga_brg' => $items['price']
		);	
		}
		$this->M_penjualan->savecart($data,'tbl_detail_penjualan');
		//UPDATE INVENTORY STOCK 
		$this->updatestok();

		// SAVE ORDER TO DATABASE 
		$order = array(
		'nonota' 	=> $this->getnonota(),
		'kode_pel'	=> $this->input->post('nama_pelanggan',TRUE),
		// 'diskon' 	=> $this->input->post('diskon',TRUE),
		'total'	 	=> str_replace('.','',$this->input->post('total',TRUE)),
		'waktu'	 	=> date('Y-m-d H:i:s'),
		'tanggal'	=> date('Y-m-d'),
		'garansi'	=> $this->input->post('garansi',TRUE)
		);

		$this->M_penjualan->saveorder($order,'tbl_penjualan');
		$this->add_so();
		//SAVE JURNAL UMUM
		$this->save_ju();
		$this->print_nota();


		//DELETE CART
		foreach ($tampil as $items) {	
		$cart[] = array(
			'rowid' => $items['rowid'],
			'qty' 	=> 0 
		);
		}
		$this->cart->update($cart);

		// echo "<meta http-equiv='refresh' content='1;URL=index'>";
	}

	public function simpan_pelanggan() {
		$data = array(
		'nama' 	 => $this->input->post('nama_pelanggan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp'  => $this->input->post('no_hp',TRUE)
		);
		$this->M_penjualan->savepelanggan($data,'tbl_pelanggan');
	}

	public function updatestok() {
	$tampil = $this->cart->contents();
	foreach ($tampil as $items) {
		$stok 	= $items['qty'];
		$id 	= $items['id'];
		$this->M_penjualan->updatestock($stok,$id,'tbl_barang');
	}
}

	public function success() {
		$this->load->view('notification/success');
		echo "<meta http-equiv='refresh' content='2,URL=index'>";
	}

	public function updatebeli() {
		$data = array(
		'rowid' => $this->input->post('id',TRUE),
		'qty' 	=> $this->input->post('editval',TRUE) 
		);
		$this->cart->update($data);
	}

	public function del_pers_akhir() {
		$this->M_penjualan->del_pers_akhir();
	}

	public function save_ju() {
		//hapus PERSEDIAAN AKHIR jika sudah terinput
		$this->del_pers_akhir();

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


	public function add_so() {
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


	public function print_nota() {
		$where = array(
			'nonota' 	=> $this->getnonota() - 1,
			'pel'		=> $this->input->post('nama_pelanggan',TRUE)
		);
		$data = array(
			'nonota' 	=> $where['nonota'],
			'status'	=> 'Nota Penjualan',
			'nota' 		=> $this->M_laporan->get_nota($where,'tbl_penjualan')->result(),
			'tgl' 		=> $this->M_laporan->get_nota($where,'tbl_penjualan')->row(),
			'pelanggan'	=> $this->M_laporan->get_pelanggan($where,'tbl_pelanggan')->row(),
			// 'total' 	=> $this->M_laporan->get_total_jual($where,'tbl_detail_penjualan')->row(),
			'url'  		=> 'penjualan'
		);
		$this->load->view('p_invoice_2',$data);
		
	}

}