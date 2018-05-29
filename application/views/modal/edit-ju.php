<div class="modal-header">
	<a href="<?=base_url();?>akunting/jurnal_umum" class="close">&times;</a>
		Edit Jurnal Umum
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>akunting/update_ju">
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Cost</label>
				<div class="col-sm-9">
				<input type="hidden" name="id_1" value="<?=$id_1;?>">
				<input type="hidden" name="id_2" value="<?=$id_2;?>">
				<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="cost" />
				</div>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-success" name="add-admin"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>