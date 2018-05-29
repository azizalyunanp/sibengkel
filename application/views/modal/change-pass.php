<?php 
foreach ($adm as $a) {
?>
<div class="modal-header">
				<a href="admin" class="close">&times;</a>
		Tambah Admin
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>admin/changepass">
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>
				<div class="col-sm-9">
				<input type="hidden" name="id" value="<?php echo $a->id;?>">
				<input type="password" id="form-field-1" class="col-xs-10 col-sm-8" name="password" />
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