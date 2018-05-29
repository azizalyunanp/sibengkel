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
		<a class="btn btn-success" onclick="$('#p_ruglab').printThis()"><i class="fa fa-print"></i> Print</a>
	</form> 



	<br><br>
	<div id="p_ruglab">
	<div class="center judul">
		DR. AKI <br>
		LAPORAN RUGI LABA <br>
		PER <?php echo date('M Y');?>
	</div>
	<br>

<table class="report table-hover">
	<tr>
		<td><h4>Penjualan</h4></td>
		<td></td>
		<td><strong class="isi">Rp <?php echo number_format($t_jual['total'],0,".",".") ;?></strong></td>
	</tr>	
	<tr>
		<td><h4>Persediaan Awal</h4></td>
		<td>Rp <?=number_format($pers_awal->debet,0,".",".");?></td>
		<td></td>
	</tr>
	<tr>
		<td><h4>Pembelian</h4></td>
		<td>Rp <?=number_format($t_beli->t_beli,0,".",".");?></td>
		<td></td>
	</tr>
	<tr>
		<td><h4>Persediaan Akhir</h4></td>
		<td>Rp ( <?=number_format($pers_akhir['saldo'],0,".",".")?> )</td>
		<td></td>
	</tr>
	<tr>
		<td><h4>Harga Pokok Penjualan</h4></td>
		<td></td>
		<td>
		<?php
			$hpp = ($pers_awal->debet + $t_beli->t_beli) - $pers_akhir['saldo'];
			echo '<strong class="isi">'.'Rp'.number_format($hpp,0,".",".").'</strong>';
		;?>
		</td>
	</tr>
	<?php 
		$total=0;
		foreach ($get_rugilaba as $g) {
		$total+= $g->akun;
		?>
	<tr>
		<td><h4><?php echo $g->nama_perkiraan;?></h4></td>
		<td>Rp <?php echo number_format($g->akun,0,".",".");?></td>
		<td></td>
	</tr>
	<?php } ?>
	<tr>
		<td><h4>Total Biaya</h4></td>
		<td></td>
		<td><strong class="isi">Rp <?php echo number_format($total,0,".","."); ?></strong></td>
	</tr>
	
	<tr>
		<td><h4>LABA BERSIH</h4></td>
		<td></td>
		<td><strong class="isi">Rp 
		<?php $hasil = $t_jual['total'] - ($hpp + $total); 
		echo number_format($hasil,0,".",".");
		?> </strong>
		</td>
	</tr>

	</table>
</div>
</div>
</div>
