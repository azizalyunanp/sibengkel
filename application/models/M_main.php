<?php
class M_main extends CI_Model {

	function cek_modal() {
		return $this->db->get_where('tbl_jurnal_umum',array('nama_perkiraan' => 'Modal Owner'));
	}

	function cek_login($where) {
		return $this->db->get_where('tbl_admin',$where);
	}

	function tampil_beli($where) {
		return $this->db->get_where('tbl_pembelian',$where);
	}

	function tampil_jual($where) {
		return $this->db->get_where('tbl_penjualan',$where);
	}

	function save_ju($data) {
		$this->db->insert_batch('tbl_jurnal_umum',$data);
	}

	function get_ju($where) {
		return $this->db->get_where('tbl_jurnal_umum',$where);
	}

	function chart_jual() {
		$this->db->select('date_format(tanggal,"%m") as bulan ,sum(total) as total');
		$this->db->from('tbl_penjualan');
		$this->db->where('date_format(tanggal,"%Y")',date('Y'));
		$this->db->group_by('date_format(tanggal,"%m")');
		$query = $this->db->get();
		return $query;
	}
}