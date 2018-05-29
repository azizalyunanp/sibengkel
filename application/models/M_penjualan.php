<?php
class M_penjualan extends CI_Model {

	function del_pers_akhir() {
		$this->db
		->where('date_format(tanggal,"%m")',date('m'))
        ->where('date_format(tanggal,"%Y")',date('Y'))
		->where('nama_perkiraan','Persediaan Barang')
		->where('keterangan','Akhir');
		$this->db->delete('tbl_jurnal_umum');

		$this->db
		->where('date_format(tanggal,"%m")',date('m'))
        ->where('date_format(tanggal,"%Y")',date('Y'))
		->where('nama_perkiraan','Beban Persediaan');
		$this->db->delete('tbl_jurnal_umum');
	}


	function tampil_brg() {
		return $this->db->get('tbl_barang');
	}

	function savecart($data) {
		$this->db->insert_batch('tbl_detail_penjualan',$data);
	}

	function saveorder($order) {
		$this->db->insert('tbl_penjualan',$order);
	}

	function getnonota() {
		return $this->db->get('tbl_penjualan');
	}

	function notaterakhir() {
		$this->db->select('max(nonota) as no');
		$this->db->from('tbl_penjualan');
		return $this->db->get();
	}

	function getstock($where) {
		$this->db->where_in($where);
		return $this->db->get('tbl_barang');
	}

	function updatestock($stok,$id) {
		$this->db->set('stok','stok-'.$stok,FALSE);
		$this->db->where_in('id',$id);
		$this->db->update('tbl_barang');
	}

	function savepelanggan($data) {
		$this->db->insert('tbl_pelanggan',$data);
	}

	function tampil_pelanggan() {
		return $this->db->get('tbl_pelanggan');
	}

	function cek_ju($where) {
		$this->db->select('*');
		$this->db->from('tbl_jurnal_umum');
		$this->db->where('tanggal',$where);
		$this->db->where('nama_perkiraan','Penjualan');
		$query = $this->db->get();
		return $query;
	}

}