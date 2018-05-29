	public function lap_brg_masuk() {
	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'lap' 		=> $this->M_laporan->brg_masuk()->result(),
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Barang Keluar",
		'menu'		=> "active open",
		'd_notif'	=> $this->M_inventory->stok_limit()->num_rows()
		 );
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/lap_barang_masuk',$data);
		$this->load->view('template/footer');
		}else {
			$this->load->view('login');
		}
	}
	}

	public function filter_brg_masuk() {
		$status = $this->uri->segment(3);
		if($status=='filter_hari') {
			$this->load->view('modal/filter_brg_msk_hari');		
		}elseif($status=='filter_minggu') {
			$this->load->view('modal/filter_brg_msk_minggu');	
		} elseif($status=='filter_bulan') {
			$this->load->view('modal/filter_brg_msk_bln');	
		}
	}

	public function v_brg_masuk($data) {
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/lap_barang_masuk',$data);
		$this->load->view('template/footer');
	}

	public function lap_brg_masuk_hari() {

	$where = date('Y-m-d',strtotime($this->input->post('tanggal',TRUE)));
		$data = array(
		'lap' 		=> $this->M_laporan->get_brg_masuk_hari($where,'tbl_penjualan')->result(),
		'per' 		=> date('d M Y',strtotime($where)),
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Penjualan",
		'menu'		=> "active open",
		'd_notif'	=> $this->M_inventory->stok_limit()->num_rows()
		 );
		$this->v_brg_keluar($data);
	}
	public function lap_brg_masuk_minggu() {
		$where = array(
			'tgl_1' => date('Y-m-d',strtotime($this->input->post('tanggal_1',TRUE))),
			'tgl_2' => date('Y-m-d',strtotime($this->input->post('tanggal_2',TRUE))),
		);
		$data = array(
		'lap' 		=> $this->M_laporan->get_brg_masuk_minggu($where,'tbl_pembelian')->result(),
		'mng' 		=>  $where,
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Penjualan",
		'menu'		=> "active open",
		'd_notif'	=> $this->M_inventory->stok_limit()->num_rows()
		 );
		$this->v_brg_keluar($data);
	}

	public function lap_brg_masuk_bln() {
		$where = $this->input->post('bulan',TRUE);
		$thn		= $this->input->post('tahun',TRUE);
		$monthName 	= date("F", mktime(0, 0, 0, $where, 10));
		$data  = array(
		'lap' 		=> $this->M_laporan->get_brg_masuk_bulan($where,$thn,'tbl_pembelian')->result(),
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Penjualan",
		'menu'		=> "active open",
		'per'		=> $monthName,
		'd_notif'	=> $this->M_inventory->stok_limit()->num_rows()
		 );
		$this->v_brg_keluar($data);
	}
	public function v_kat_brg_msk() {
		$data = array(
			'kat' 	=> $this->M_laporan->v_all_kat()->result(),
			'nama'	=> $this->M_laporan->v_all_nama()->result(),
			'sub_1'	=> $this->M_laporan->v_all_sub_1()->result(),
			'sub_2'	=> $this->M_laporan->v_all_sub_2()->result(),
			'sub_3'	=> $this->M_laporan->v_all_sub_3()->result(),
		);
		$this->load->view('modal/v_kat_brg_msk',$data);
	}

	public function lap_kategori_brg_msk() {
		$kat 	= $this->input->post('kategori',TRUE);
		$data 	= array(
			'lap' => $this->M_laporan->filter_kat_msk($kat)->result(),
			'sidebar'	=> "Laporan",
			'sidebar2'	=> "Lap.Penjualan",
			'menu'		=> "active open",
			'd_notif'	=> $this->M_inventory->stok_limit()->num_rows()
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/lap_barang_masuk',$data);
		$this->load->view('template/footer');
	}	



	//modal

		function brg_masuk() {
		$this->db->select('tanggal,nama_brg,kategori,sub_1,sub_2,sub_3');
		$this->db->select_sum('jml_brg');
		$this->db->from('tbl_detail_pembelian');
		$this->db->join('tbl_barang','tbl_detail_pembelian.id_brg = tbl_barang.id');
		$this->db->join('tbl_pembelian','tbl_pembelian.no_beli = tbl_detail_pembelian.nonota');
		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
		$query = $this->db->get();
		return $query;
	}

	function get_brg_masuk_hari($where) {
		$this->db->select('tanggal,nama_brg,kategori,sub_1,sub_2,sub_3');
		$this->db->select_sum('jml_brg');
		$this->db->from('tbl_detail_pembelian');
		$this->db->join('tbl_barang','tbl_detail_pembelian.id_brg = tbl_barang.id');
		$this->db->join('tbl_pembelian','tbl_pembelian.no_beli = tbl_detail_pembelian.nonota');
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

	function get_brg_masuk_minggu($where) {
		$this->db->select('tanggal,nama_brg,kategori,sub_1,sub_2,sub_3');
		$this->db->select_sum('jml_brg');
		$this->db->from('tbl_detail_pembelian');
		$this->db->join('tbl_barang','tbl_detail_pembelian.id_brg = tbl_barang.id');
		$this->db->join('tbl_pembelian','tbl_pembelian.no_beli = tbl_detail_pembelian.nonota');
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

	function get_brg_masuk_bulan($where,$thn) {
		$this->db->select('tanggal,nama_brg,kategori,sub_1,sub_2,sub_3');
		$this->db->select_sum('jml_brg');
		$this->db->from('tbl_detail_pembelian');
		$this->db->join('tbl_barang','tbl_detail_pembelian.id_brg = tbl_barang.id');
		$this->db->join('tbl_pembelian','tbl_pembelian.no_beli = tbl_detail_pembelian.nonota');
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

 	function filter_kat_msk($kat) {
 		$this->db->select('tanggal,nama_brg,kategori,sub_1,sub_2,sub_3');
		$this->db->select_sum('jml_brg');
		$this->db->from('tbl_detail_pembelian');
		$this->db->join('tbl_barang','tbl_detail_pembelian.id_brg = tbl_barang.id');
		$this->db->join('tbl_pembelian','tbl_pembelian.no_beli = tbl_detail_pembelian.nonota');
 		$this->db->where('nama',$kat);
 		$this->db->or_where('kategori',$kat);
 		$this->db->or_where('sub_1',$kat);
 		$this->db->or_where('sub_2',$kat);
 		$this->db->or_where('sub_3',$kat);
 		$this->db->group_by('tanggal');
		$this->db->group_by('nama_brg');
		$this->db->group_by('kategori');
		$this->db->group_by('sub_1');
		$this->db->group_by('sub_2');
		$this->db->group_by('sub_3');
 		return $this->db->get();
 	}