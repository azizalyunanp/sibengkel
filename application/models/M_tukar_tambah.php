<?php
	class M_tukar_tambah extends CI_Model
{
		
	function tampil_bekas() {
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->where('kategori','aki');
		$this->db->where('sub_1','bekas');
		return $this->db->get();
	}

	function tampil_brg_jual() {
		return $this->db->query("SELECT * FROM tbl_barang WHERE sub_1 <> 'bekas'");
	}

	function tampil_cart($where) {
		$this->db->select('*');
		$this->db->from('tbl_temp_tt');
		$this->db->join('tbl_barang','tbl_temp_tt.id=tbl_barang.id');
		$this->db->where('sess_id',$where);
		return $this->db->get();
	}

	function get_cart($id,$where) {
		$this->db->select('*');
		$this->db->from('tbl_temp_tt');
		$this->db->join('tbl_barang','tbl_temp_tt.id=tbl_barang.id');
		$this->db->where('sess_id',$where);
		$this->db->where('tbl_temp_tt.id',$id);
		return $this->db->get();
	}

	function getnonota_beli() {
		return $this->db->get('tbl_pembelian');
	}

	function getnonota_jual() {
		return $this->db->get('tbl_penjualan');
	}

	function notaterakhir_beli() {
		$this->db->select('max(no_beli) as no');
		$this->db->from('tbl_pembelian');
		return $this->db->get();
	}

	function notaterakhir_jual() {
		$this->db->select('max(nonota) as no');
		$this->db->from('tbl_penjualan');
		return $this->db->get();
	}

	function delbeli($where) {
		$this->db->delete('tbl_temp_tt',$where);
	}
	
	function cek_beli($where) { 
		return $this->db->get_where('tbl_temp_tt',$where);
	}

	function savebeli($data) {
		$this->db->insert_batch('tbl_detail_pembelian',$data);
	}

	function updatestock($stok,$id) {
		$this->db->set('stok','stok+'.$stok,FALSE);
		$this->db->where_in('id',$id);
		$this->db->update('tbl_barang');
	}

	function saveorder_beli($order) {
		$this->db->insert('tbl_pembelian',$order);
	}

	function cek_ju($where) {
		$this->db->select('*');
		$this->db->from('tbl_jurnal_umum');
		$this->db->where('tanggal',$where);
		$this->db->where('nama_perkiraan','Pembelian');
		$query = $this->db->get();
		return $query;
	}

	function delcart($where) {
		$this->db->delete('tbl_temp_tt',$where);
	}

	function get_garansi($where) {
		$this->db->select('garansi');
		$this->db->from('tbl_penjualan');
		$this->db->where('nonota',$where['nonota']);
		return $this->db->get();
	}
}