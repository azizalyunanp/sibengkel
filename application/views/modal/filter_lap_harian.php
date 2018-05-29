<div class="modal-header">
				<a href="<?php echo base_url();?>laporan/lap_penjualan" class="close">&times;</a>
		Filter harian
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>laporan/filter_jual_harian">
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Set Tanggal</label>
				<div class="col-sm-9">
				<input type="text" class="col-xs-10 col-sm-8" name="tanggal" data-field="date" data-format="dd-mm-yyyy">
				</div>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-success" name="add-inventory"><i class="fa fa-search"></i> Filter</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/DateTimePicker.js"></script>
<script type="text/javascript">
	$('#dtBox').DateTimePicker();
</script>