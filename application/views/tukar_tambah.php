<div class="page-content">
<div id="view_tt"></div>
</div>
<!--OPEN MODAL CARI BARANG-->
<div id="cr-brg" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<a href="<?php echo base_url();?>tukar_tambah" class="close">&times;</a>
		Cari Barang
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<div id="v_beli_tt"></div>
		</div>
		</div>
	</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	</div>
</div>


<div id="cr-brg_2" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<a href="<?php echo base_url();?>tukar_tambah" class="close">&times;</a>
		Cari Barang
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<div id="v_jual_tt"></div>
		</div>
		</div>
	</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	</div>
</div>