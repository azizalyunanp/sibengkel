<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	function __construct() {
		parent::__construct();
			$this->load->model('M_inventory');
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	}

	public function index() {
		if($this->session->has_userdata('username')) {
		$data = array(
		'barang'	=> $this->M_inventory->tampil()->result(),
		'kategori'	=> $this->M_inventory->tampil_kategori()->result(),
		'sidebar' 	=> "Inventory",
		'menu'		=> "active",
		);
			$this->load->view('template/header');
			$this->load->view('template/sidebar',$data);
			$this->load->view('inventory',$data);
			$this->load->view('template/footer');
		} else {
			$this->load->view('login');
		}
	}
	
	public function view_data() { 
		$data = array(
			'barang' 	=> $this->M_inventory->tampil()->result(),
			'kategori'	=> $this->M_inventory->tampil_kategori()->result()
		);

		$this->load->view('v_inventory',$data);

	}


	public function add_data_ajax() { 
		$nama  		 = $this->input->post('nama',TRUE);
		$kat 		 = $this->input->post('kat',TRUE);
		$sub_1 		 = $this->input->post('sub_1',TRUE);
		$sub_2 		 = $this->input->post('sub_2',TRUE);
		$sub_3 		 = $this->input->post('sub_3',TRUE);
		$harga_beli  = $this->input->post('harga_b',TRUE);
		$harga_jual  = $this->input->post('harga_j',TRUE);
		$stok  		 = $this->input->post('stok',TRUE);
		
		$data = array(
		'nama' 		 => $nama,
		'kategori' 	 => $kat,
		'sub_1'		 => $sub_1,
		'sub_2'		 => $sub_2,
		'sub_3'		 => $sub_3,
		'harga_beli' => $harga_beli, 	
		'harga_jual' => $harga_jual,
		'stok' 		 => $stok
		);
		$this->M_inventory->tambah($data,'tbl_barang');

	}

	public function edit($id) {
		$where 	= array('id' => $id );
		$arr_brg = $this->M_inventory->edit($where,'tbl_barang')->row_array();
		$data = array(
			'brg' 		=>  $this->M_inventory->edit($where,'tbl_barang')->result(),
			'sidebar' 	=> "Inventory",
			'menu'		=> "active",
			'get_kat' 	=>  $this->M_inventory->x_kat($arr_brg['kategori'])->result(),
			'get_sub_1' 	=>  $this->M_inventory->x_sub_1($arr_brg['sub_1'])->result(),
			'get_sub_2' 	=>  $this->M_inventory->x_sub_2($arr_brg['sub_2'])->result(),
			'get_sub_3' 	=>  $this->M_inventory->x_sub_3($arr_brg['sub_3'])->result()
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('modal/edit-inventory',$data);
		$this->load->view('template/footer');
	}

	public function update_brg() {
		$data = array(
			'nama' 		=> $this->input->post('nama',TRUE),
			'kategori' 	=> $this->input->post('kategori',TRUE),
			'sub_1' 		=> $this->input->post('sub_1',TRUE),
			'sub_2' 		=> $this->input->post('sub_2',TRUE),
			'sub_3' 		=> $this->input->post('sub_3',TRUE),
			'harga_beli'=> $this->input->post('harga_beli',TRUE),
			'harga_jual'=> $this->input->post('harga_jual',TRUE),
			'stok' 		=> $this->input->post('stok',TRUE)
		);

		$this->db->where('id',$this->input->post('id',TRUE));
		$this->db->update('tbl_barang',$data);
		redirect('inventory');
	}

	public function delete($id) {
		$where = array('id' => $id );
		$this->M_inventory->delete($where,'tbl_barang');
		redirect('inventory');
	}

	public function cari_kat() {
		$kat 	= $this->input->post('kat',TRUE);
		$hsl   	= $this->M_inventory->cari_kat($kat,'tbl_sub_kategori');
		echo "<option></option>";
		foreach ($hsl as $h) {
			echo $sub_1= "<option>$h->sub_kategori</option>";
		}
		return $sub_1;

	}

	//SERVERSIDE BARANG UNTUK OWNER

	function ajax_barang() {
        $list = $this->M_inventory->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $barang) {
            $no++;
            $button = "<a class='btn btn-primary' href='inventory/edit/$barang->id'><i class='fa fa-pencil'></i> Edit</a>
		<button class='btn btn-danger' onClick='delinv($barang->id)'><i class='fa fa-trash'></i> Delete</button>";
            $row = array();
            $row[] = $no;
            $row[] = $barang->nama;
            $row[] = $barang->kategori;
            $row[] = $barang->sub_1;
            $row[] = $barang->sub_2;
            $row[] = $barang->sub_3;
            $row[] = $barang->harga_beli;
            $row[] = $barang->harga_jual;
            $row[] = $barang->stok;
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

    function ajax_barang_2() {
        $list = $this->M_inventory->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $barang) {
            $no++;
            $button = "<a class='btn btn-primary' href='inventory/edit/$barang->id'><i class='fa fa-pencil'></i> Edit</a>
		<button class='btn btn-danger' onClick='delinv($barang->id)'><i class='fa fa-trash'></i> Delete</button>";
            $row = array();
            $row[] = $no;
            $row[] = $barang->nama;
            $row[] = $barang->kategori;
            $row[] = $barang->sub_1;
            $row[] = $barang->sub_2;
            $row[] = $barang->sub_3;
            $row[] = $barang->harga_jual;
            $row[] = $barang->stok;
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

}

