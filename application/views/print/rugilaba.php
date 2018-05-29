
<div class="row">
<div class="text-center judul">
		DR. AKI <br>
		LAPORAN RUGI LABA <br>
		PER <?php echo date('M Y');?>
	</div>
	<br>

<table class="report table-hover">
	<tr>
		<td>Penjualan</td>
		<td></td>
		<td><strong class="isi">Rp <?php echo number_format($t_jual->total,0,".",".") ;?></strong></td>
	</tr>	
	<?php 
		$total=0;
		foreach ($get_rugilaba as $g) {
		$total+= $g->akun;
		?>
	<tr>
		<td><?php echo $g->nama_perkiraan;?></td>
		<td>Rp <?php echo number_format($g->akun,0,".",".");?></td>
		<td></td>
	</tr>
	<?php } ?>
	<tr>
		<td>Total</td>
		<td></td>
		<td><strong class="isi">Rp <?php echo number_format($total,0,".","."); ?></strong></td>
	</tr>
	
	<tr>
		<td>Hasil</td>
		<td></td>
		<td><strong class="isi">Rp <?php $hasil = $t_jual->total - $total; echo number_format($hasil,0,".",".");?> </strong></td>
	</tr>

	</table>
</div>