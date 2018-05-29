<div class="page-content">
	<div class="page-header">
	<h1>
		Lap. Rugi Laba
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<form method="post" action="<?php echo base_url();?>akunting/filter_lap_rugi_laba">
		<div class="col-xs-3">
			<select class="form-control" name="bulan">
				<option value="*">Pilih Bulan</option>
				<option value="01">Januari</option>
				<option value="02">Februari</option>
				<option value="03">Maret</option>
				<option value="04">April</option>
				<option value="05">Mei</option>
				<option value="06">Juni</option>
				<option value="07">Juli</option>
				<option value="08">Agustus</option>
				<option value="09">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
			</select>
		</div>

		<div class="col-xs-3">
			<select class="form-control" name="tahun">
				<option>Pilih Tahun</option>
				<?php for ($i=2017; $i < 2025 ; $i++) { 
					# code...
				?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php } ?>
			</select>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

		<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Filter</button>
		<a class="btn btn-success" href="<?php echo base_url();?>akunting/rugilaba_print"><i class="fa fa-print"></i> Print</a>
	</form> 
</div>
</div>





