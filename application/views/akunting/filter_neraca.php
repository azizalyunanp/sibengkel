<div class="page-content">
	<div class="page-header">
	<h1>
		Neraca
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<form method="post" action="<?php echo base_url();?>akunting/filter_neraca">
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
				<?php for ($i=2016; $i < 2025 ; $i++) { 
					# code...
				?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php } ?>
			</select>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

		<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Filter</button>
		<a class="btn btn-success" href="#" onclick="$('#p_neraca').printThis()"><i class="fa fa-print"></i> Print</a>
	</form> 



	<br><br>
	<div id="p_neraca">
	<div class="center judul" >
		DR. AKI <br>
		NERACA <br>
		PER <?php echo $per;?>
	</div>
	<br>
	<div class="col-md-6">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Aktiva</th>
				<th>Saldo</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
		<!--AKTIVA TETAP-->
			<tr>
				<td><strong>Aktiva Lancar</strong></td>
				<td></td>
				<td></td>
			</tr>
			<?php 
			$t_al =0;
			foreach ($akt_lancar as $al) {
				$t_al+=$al->saldo; 
			?>
			<tr>
				<td><?=$al->nama_perkiraan;?></td>
				<td>Rp <?=number_format($al->saldo,0,".",".");?></td>
				<td></td>
			<?php 
			} ?>
			</tr>

		<!--AKTIVA LANCAR-->
			<tr>
				<td><strong>Total Aktiva Lancar</strong></td>
				<td></td>
				<td>Rp <?=number_format($t_al,0,".",".");?></td>
			</tr>

			<tr>
				<td><strong>Aktiva Tetap</strong></td>
				<td></td>
				<td></td>
			</tr>
			<?php 
			$t_at = 0;
			foreach ($akt_tetap as $at) {
				$t_at+= $at->saldo;
			?>
			<tr>
				<?php
				if($at->nama_perkiraan=='Inventaris') { ?>
					<td><?=$at->nama_perkiraan;?></td>
					<td>Rp <?=number_format($at->saldo,0,".",".");?></td>
					<td></td>
				
				<tr>
					<td>Akum.Peny.Inventaris</td>
					<td>Rp (<?=number_format($akm_inv->kredit,0,".",".");?>)</td>
					<td></td>
				<?php } elseif($at->nama_perkiraan=='Kendaraan') { ?>

				<td><?=$at->nama_perkiraan;?></td>
					<td>Rp <?=number_format($at->saldo,0,".",".");?></td>
					<td></td>
				</tr>
				<tr>
					<td>Akum.Peny.Kendaraan</td>
					<td>Rp (<?=number_format($akm_kend->kredit,0,".",".");?>)</td>
					<td></td>
			<?php } } ?>
			</tr>
			</tr>

			<tr>
				<td><strong>Total Aktiva Tetap</strong></td>
				<td></td>
				<td>Rp 
				<?php
					$t_at_2 = $t_at - ($akm_inv->kredit + $akm_kend->kredit);
					echo number_format($t_at_2,0,".",".");
				?>
				</td>
			</tr>

			<tr>
				<td><strong>Total Aktiva</strong></td>
				<td></td>
				<td>Rp 
				<?php
					echo number_format($t_at_2 + $t_al,0,".",".");
				?>
				</td>
			</tr>

		</tbody>
	</table>
	</div>

	<div class="col-md-6">
	<!--PASIVA-->
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Pasiva</th>
				<th>Saldo</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
		<!--AKTIVA TETAP-->
			<tr>
				<td><strong>Pasiva</strong></td>
				<td></td>
				<td></td>
			</tr>
			<?php 
			$t_pa =0;
			foreach ($pasiva as $p) {
			$t_pa += $p->saldo; 
			?>
			<tr>
				<td><?=$p->nama_perkiraan;?></td>
				<td>Rp 
				<?php
					echo number_format($p->saldo,0,".",".");
				?></td>
				<td></td>
			<?php 
			} ?>
			</tr>

		<!--AKTIVA LANCAR-->
			<tr>
				<td><strong>Total Pasiva</strong></td>
				<td></td>
				<td>Rp <?=number_format($t_pa,0,".",".");?></td>
			</tr>

			<tr>
				<td><strong>Modal</strong></td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>Modal Owner</td>
				<td>Rp <?=number_format($g_modal['kredit'],0,".",".");?></td>
				<td></td>
			</tr>

			<tr>
				<td>Laba Bersih</td>
				<td>Rp <?=number_format($laba_bersih,0,".",".");?></td>
				<td></td>
			</tr>

			<tr>
				<td>Prive</td>
				<td>Rp <?=number_format($prive['saldo'],0,".",".");?></td>
				<td></td>
			</tr>

			<tr>
				<td><strong>Total Modal</strong></td>
				<td></td>
				<td>Rp 
				<?php
					$t_modal = $g_modal['kredit'] + ($laba_bersih - $prive['saldo']);
					echo number_format($t_modal,0,".",".");
				?>
				</td>
			</tr>

			<tr>
				<td><strong>Total Pasiva</strong></td>
				<td></td>
				<td>Rp 
				<?php
					echo number_format($t_modal + $t_pa ,0,".",".");
				?>
				</td>
			</tr>

		</tbody>
	</table>
</div>
</div>
</div>


