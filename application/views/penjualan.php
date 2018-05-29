<div class="page-content">
	<div class="page-header">
		<h1>
		Penjualan Barang
		</h1>
	</div><!-- /.page-header -->
<div class="row">
<div id="view_cart"></div>
</div>
</div>
<!--OPEN MODAL ADD PELANGGAN-->
<div id="add-pel" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>penjualan" class="close">&times;</a>
		Tambah Pelanggan
		</div>
		<form class="form-horizontal" method="post" role="form" action="#">
		<div class="modal-body">
			<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Pelanggan </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="nama_pelanggan" id="nama_pelanggan" required="true" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="alamat" id="alamat" required="true" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No HP </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="no_hp" id="no_hp" required="true" />
	</div>
	</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-success" id="savecust"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>

<!--OPEN MODAL CARI BARANG-->
<div id="cr-brg" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<a href="<?php echo base_url();?>penjualan" class="close">&times;</a>
		Cari Barang
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<div id="v_jual"></div>
		</div>
		</div>
	</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	</div>
</div>