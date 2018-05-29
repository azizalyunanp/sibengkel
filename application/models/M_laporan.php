<?php
class M_laporan extends CI_Model {

	function tampil_jual() {
		$this->db->select('*');
		$this->db->from('tbl_penjualan');
		$this->db->join('tbl_pelanggan','tbl_pelanggan.no=tbl_penjualan.kode_pel');
		$this->db->order_by('nonota','DESC');
		$query = $this->db->get();
		return $query;
	}

	function tampil_beli() {
		$this->db->select('*');
		$this->db->from('tbl_pembelian');
		$this->db->order_by('no_beli','DESC');
		$query = $this->db->get();
		return $query;
	}

	function get_nota($where) {
		$this->db->select('*');
		$this->db->from('tbl_penjualan');
		$this->db->join('tbl_detail_penjualan','tbl_penjualan.nonota=tbl_detail_penjualan.nonota');
		$this->db->join('tbl_barang','tbl_detail_penjualan.id_brg = tbl_barang.id');
		$this->db->where('tbl_penjualan.nonota',$where['nonota']);
		$query = $this->db->get();
		return $query;
	}

	function get_nota_beli($where) {
		$this->db->select('*');
		$this->db->from('tbl_pembelian');
		$this->db->join('tbl_detail_pembelian','tbl_pembelian.no_beli=tbl_detail_pembelian.nonota');
		$this->db->join('tbl_barang','tbl_detail_pembelian.id_brg = tbl_barang.id');
		$this->db->where('tbl_pembelian.no_beli',$where['nonota']);
		$query = $this->db->get();
		return $query;
	}

	function get_pelanggan($where) {
		$this->db->select('*');
		$this->db->from('tbl_penjualan');
		$this->db->join('tbl_pelanggan','tbl_penjualan.kode_pel=tbl_pelanggan.no');
		$this->db->where('tbl_penjualan.kode_pel',$where['pel']);
		$query = $this->db->get();
		return $query;
	}

	function get_total_jual($where) {
		$this->db->select('total,diskon');
		$this->db->from('tbl_penjualan');
		$this->db->where('nonota',$where['nonota']);
		$query = $this->db->get();
		return $query;
	}

	function get_total_beli($where) {
		$this->db->select('total');
		$this->db->from('tbl_pembelian');
		$this->db->where('no_beli',$where['nonota']);
		$query = $this->db->get();
		return $query;
	}

	function filter_jual_harian($where) {
		$this->db->select('*');
		$this->db->from('tbl_penjualan');
		$this->db->join('tbl_pelanggan','tbl_penjualan.kode_pel=tbl_pelanggan.no');
		$this->db->where('tanggal',$where);
		$query = $this->db->get();
		return $query;
	}

	function filter_beli_harian($where) {
		$this->db->select('*');
		$this->db->from('tbl_pembelian');
		$this->db->where('tanggal',$where);
		$query = $this->db->get();
		return $query;
	}

	function filter_jual_mingguan($where) {
		$this->db->select('*');
		$this->db->from('tbl_penjualan');
		$this->db->join('tbl_pelanggan','tbl_penjualan.kode_pel=tbl_pelanggan.no');
		$this->db->where('tanggal >=',$where['tgl_1']);
		$this->db->where('tanggal <',$where['tgl_2']);
		$query = $this->db->get();
		return $query;
	}

	function filter_beli_mingguan($where) {
		$this->db->select('*');
		$this->db->from('tbl_pembelian');
		$this->db->where('tanggal >=',$where['tgl_1']);
		$this->db->where('tanggal <',$where['tgl_2']);
		$query = $this->db->get();
		return $query;
	}

	function filter_jual_bulanan($where,$thn) {
		$this->db->select('*');
		$this->db->from('tbl_penjualan');
		$this->db->join('tbl_pelanggan','tbl_penjualan.kode_pel=tbl_pelanggan.no');
		$this->db->where('date_format(tanggal,"%m")',$where);
		$this->db->where('date_format(tanggal,"%Y")',$thn);
		$query = $this->db->get();
		return $query;
	}

	function filter_beli_bulanan($where,$thn) {
		$this->db->select('*');
		$this->db->from('tbl_pembelian');
		$this->db->where('date_format(tanggal,"%m")',$where);
		$this->db->where('date_format(tanggal,"%Y")',$thn);
		$query = $this->db->get();
		return $query;
	}

	function brg_keluar() {
		$this->db->select('tanggal,nama_brg,kategori,sub_1,sub_2,sub_3');
		$this->db->select_sum('jml_brg');
		$this->db->from('tbl_detail_penjualan');
		$this->db->join('tbl_barang','tbl_detail_penjualan.id_brg = tbl_barang.id');
		$this->db->join('tbl_penjualan','tbl_penjualan.nonota = tbl_detail_penjualan.nonota');
		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
		$query = $this->db->get();
		return $query;
	}


	function get_brg_keluar_hari($where) {
		$this->db->select('tbl_so.tanggal,nama_brg,sum(jual) as jual, sum(beli) as beli, sum(beli-jual) as sisa,tbl_barang.kategori,tbl_barang.sub_1,tbl_barang.sub_2,tbl_barang.sub_3');
		$this->db->from('tbl_so');
		$this->db->join('tbl_barang','tbl_so.id_brg = tbl_barang.id');
		$this->db->where('tanggal',$where);
		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
		$query = $this->db->get();
		return $query;
	}

	function get_brg_keluar_hari_kat($where,$filter) {
		$this->db->select('tbl_so.tanggal,nama_brg,sum(jual) as jual, sum(beli) as beli, sum(beli-jual) as sisa,tbl_barang.kategori,tbl_barang.sub_1,tbl_barang.sub_2,tbl_barang.sub_3');
		$this->db->from('tbl_so');
		$this->db->join('tbl_barang','tbl_so.id_brg = tbl_barang.id');
		$this->db->where('tanggal',$where);
		$this->db->where($filter['column'],$filter['filter']);
		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
		$query = $this->db->get();
		return $query;
	}


	function get_brg_keluar_minggu($where) {
		$this->db->select('tanggal,nama_brg,sum(jual) as jual, sum(beli) as beli, sum(beli-jual) as sisa,tbl_barang.kategori,tbl_barang.sub_1,tbl_barang.sub_2,tbl_barang.sub_3');
		$this->db->from('tbl_so');
		$this->db->join('tbl_barang','tbl_so.id_brg = tbl_barang.id');
		$this->db->where('tanggal>=',$where['tgl_1']);
		$this->db->where('tanggal<',$where['tgl_2']);
		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
		$query = $this->db->get();
		return $query;
	}

	function get_brg_keluar_minggu_kat($where,$filter) {
		$this->db->select('tanggal,nama_brg,sum(jual) as jual, sum(beli) as beli, sum(beli-jual) as sisa,tbl_barang.kategori,tbl_barang.sub_1,tbl_barang.sub_2,tbl_barang.sub_3');
		$this->db->from('tbl_so');
		$this->db->join('tbl_barang','tbl_so.id_brg = tbl_barang.id');
		$this->db->where('tanggal>=',$where['tgl_1']);
		$this->db->where('tanggal<',$where['tgl_2']);
		$this->db->where($filter['column'],$filter['filter']);
		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
		$query = $this->db->get();
		return $query;
	}

	function get_brg_keluar_bulan($where,$thn) {
		$this->db->select('tanggal,nama_brg,sum(jual) as jual, sum(beli) as beli, sum(beli-jual) as sisa,tbl_barang.kategori,tbl_barang.sub_1,tbl_barang.sub_2,tbl_barang.sub_3');
		$this->db->from('tbl_so');
		$this->db->join('tbl_barang','tbl_so.id_brg = tbl_barang.id');
		$this->db->where('date_format(tanggal,"%m")',$where);
		$this->db->where('date_format(tanggal,"%Y")',$thn);
		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
		$query = $this->db->get();
		return $query;
	}

	function get_brg_keluar_bln_kat($where,$thn,$filter) {
		$this->db->select('tanggal,nama_brg,sum(jual) as jual, sum(beli) as beli, sum(beli-jual) as sisa,tbl_barang.kategori,tbl_barang.sub_1,tbl_barang.sub_2,tbl_barang.sub_3');
		$this->db->from('tbl_so');
		$this->db->join('tbl_barang','tbl_so.id_brg = tbl_barang.id');
		$this->db->where($filter['column'],$filter['filter']);
		$this->db->where('date_format(tanggal,"%m")',$where);
		$this->db->where('date_format(tanggal,"%Y")',$thn);
		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
		$query = $this->db->get();
		return $query;
	}

	function get_t_all_jual() {
		$this->db->select_sum('total');
		$this->db->from('tbl_penjualan');
		return $this->db->get();
 	}	


}