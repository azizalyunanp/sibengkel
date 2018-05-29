<div class="page-content">
	<div class="page-header">
	<h1>
		Lap. Stok Opname
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<a href="<?php echo base_url();?>laporan/filter_brg_keluar/filter_hari" class="btn btn-primary" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Harian</a>
	<a href="<?php echo base_url();?>laporan/filter_brg_keluar/filter_minggu" class="btn btn-warning" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Mingguan</a>
	<a href="<?php echo base_url();?>laporan/filter_brg_keluar/filter_bulan" class="btn btn-success" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Bulanan</a>
	<!-- <a href="<?php echo base_url();?>laporan/v_kat_brg_klr" class="btn btn-danger" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Nama & Kategori</a> -->
	<div class="pull-right">
		<a class="btn btn-app btn-light btn-xs" onclick="$('#print_brg_kel').printThis();">
			<i class="ace-icon fa fa-print bigger-160"></i>
			Print
		</a>
	</div>

</div>
<!--MODAL FILTER-->
<div id="filter" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
	<div class="modal-content">
</div>
</div>
</div>
