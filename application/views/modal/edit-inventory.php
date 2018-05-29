<div class="page-content">
<div class="page-header">
	<h1>
	EDIT INVENTORY BARANG
	</h1>
</div><!-- /.page-header -->
<div class="row">
<div class="col-xs-12"><br>
<?php foreach ($brg as $b) { ?>
	<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>inventory/update_brg">
	<div class="modal-body">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label>
			<div class="col-sm-9">
				<input type="hidden" value="<?php echo $b->id;?>" name="id">
				<input type="text" id="form-field-1" placeholder="Layanan" class="col-xs-10 col-sm-8" name="nama" value="<?php echo $b->nama;?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kategori</label>
			<div class="col-sm-9">
				<select class="col-sm-3" id="d_kat" name="kategori">
					<option><?=$b->kategori;?></option>
					<?php foreach ($get_kat as $g) { ?>
					<option><?=$g->kategori;?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub 1</label>
			<div class="col-sm-9">
				<select class="col-sm-5" id="d_sub_1" name="sub_1">
					<option><?=$b->sub_1;?></option>
					<?php foreach ($get_sub_1 as $gs1) { ?>
					<option><?=$gs1->sub_1;?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub 2</label>
			<div class="col-sm-9">
				<select class="col-sm-5" id="d_sub_2" name="sub_2">
					<option><?=$b->sub_2;?></option>
					<?php foreach ($get_sub_2 as $gs2) { ?>
					<option><?=$gs2->sub_2;?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub 3</label>
			<div class="col-sm-9">
				<select class="col-sm-5" id="d_sub_3" name="sub_3">
					<option><?=$b->sub_3;?></option>
					<?php foreach ($get_sub_3 as $gs3) { ?>
					<option><?=$gs3->sub_3;?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Harga Beli</label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="Deskripsi" class="col-xs-10 col-sm-8" name="harga_beli" value="<?php echo $b->harga_beli;?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Harga Jual</label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="Deskripsi" class="col-xs-10 col-sm-8" name="harga_jual" value="<?php echo $b->harga_jual;?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Stok</label>
			<div class="col-sm-9">
				<input type="text" readonly="true" id="form-field-1" class="col-xs-10 col-sm-8" name="stok" value="<?php echo $b->stok;?>" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success" name="add-inventory"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
	</div>
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
<?php } ?>
</div>
</div>
</div>