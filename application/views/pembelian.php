<div class="page-content">
	<div class="page-header">
		<h1>
		Pembelian Barang
		</h1>
	</div><!-- /.page-header -->


<div id="view_beli"></div>

</div>

<!--OPEN MODAL CARI BARANG-->
<div id="cr-brg_beli" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<a href="<?php echo base_url();?>pembelian" class="close">&times;</a>
		Cari Barang
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<div id="v_beli"></div>
		</div>
		</div>
	</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	</div>
</div>