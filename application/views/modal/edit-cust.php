<?php
foreach ($pel as $a) {
?>
<div class="modal-header">
				<a href="<?=base_url();?>pelanggan" class="close">&times;</a>
		Edit Pelanggan
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>pelanggan/update">
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama</label>
				<div class="col-sm-9">
				<input type="hidden" name="id" value="<?php echo $a->no;?>">
				<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="nama" value="<?php echo $a->nama; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat</label>
				<div class="col-sm-9">
				<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="alamat" value="<?php echo $a->alamat;?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">No HP</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="no_hp" value="<?php echo $a->no_hp;?>" />
				</div>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-success" name="add-admin"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
<?php } ?>
	</div>
</div>
</div>