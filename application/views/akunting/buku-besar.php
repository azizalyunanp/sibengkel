<div class="page-content">
	<div class="page-header">

	<h1>
		Posting Buku Besar
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<div class="col-xs-4">
		<form method="post" action="<?php echo base_url();?>akunting/get_bukubesar">
			<select class="form-control" name="akun" onchange="this.form.submit()">
				<option value="*">Nama akun -- ></option>
				<?php
				foreach ($ref as $r) {
				?>
				<option value="<?php echo $r->nama_perkiraan;?>"><?php echo $r->nama_perkiraan;?></option>
				<?php } ?>
			</select>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		</form>
		</div>
<?php echo br(4);?>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No.</th>
					<th class="center">Tanggal</th>
					<th class="center">Keterangan</th>
					<th class="center">Nama Perkiraan</th>
					<th class="center">Debet</th>
					<th class="center">Kredit</th>
					<th class="center">Saldo Debet</th>
					<th class="center">Saldo Kredit</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no  		= 1;
			$tgl 		= '';
			$ket 		= '';
			$s_debet 	= 0;
			$s_kredit 	= 0;
			foreach ($ju as $j ) {
				$s_debet  += $j->debet 	- $j->kredit;
				$s_kredit += $j->kredit - $j->debet;
				$last 	  = array($s_kredit);
			?>
				<td class="center"><?php echo $no++ ;?></td>
				<td class="center">
				<?php if($tgl != $j->tanggal) {
					$tgl = $j->tanggal;
					echo date('d F Y',strtotime($j->tanggal));
				} else {
					echo "";
				}  ?>
				</td>
				<td class="center">
				<?php if($ket != $j->keterangan) {
					$ket = $j->keterangan;
					echo $j->keterangan;
				} else {
					echo "";
				}  ?>					
				</td>
				<td><?php 
				if($j->debet==0) { 
				echo nbs(10).$j->nama_perkiraan; 
				} else {
				echo $j->nama_perkiraan; 
				} ?>
				</td>
				<td class="center">Rp <?php echo number_format($j->debet,0,".","."); ?></td>
				<td class="center">Rp <?php echo number_format($j->kredit,0,".","."); ?></td>
				<td class="center"><?php if(@$set_saldo->debet==0) { echo "-"; } else { echo number_format($s_debet,0,".","."); } ;?></td>
				<td class="center"><?php if(@$set_saldo->kredit==0) { echo "-"; } else { echo number_format($s_kredit,0,".","."); } ;?></td>
			</tr>
			<?php  } ?>

			</tbody>
		</table>
		<?php //$hsl = $last[count($last)-1]; echo $hsl;  ?>
</div>
</div>
</div>

