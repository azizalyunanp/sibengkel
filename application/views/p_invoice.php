<html>
<head>

<style media="print">

@page {
  size: auto;
  margin : 5px;
}

table {
   font-family:"SansSerif";
   width: 100%;
}

td, th  {
   text-align: center;
   font-size: 10px;
   padding : 5px;
}

ul {
	list-style-type:none;
}
li {
	font-family:"SansSerif";
	padding: 4px;
   font-size: 10px;
}

.detail {
	padding-top: 5px;
   -webkit-column-count: 2; /* Chrome, Safari, Opera */
   -moz-column-count: 2; /* Firefox */
   column-count: 2;
}
</style>
<script type="text/javascript">
	window.print();
</script>
</head>
<body>
<div class="detail">
	<ul>
		<li><strong>Outlet</strong></li>
		<li>dr.AKI</li>
		<li>SPESIALIS AKI MOBIL & MOTOR</li>
		<li>Outlet - 102 </li>
		<li>Phone: 0822 100 30000 </li>
	</ul>

	<ul>
		<li><strong>Customer</strong></li>
		<li><?php echo $pelanggan->nama;?></li>
		<li><?php echo $pelanggan->alamat;?></li>
		<li><?php echo $pelanggan->no_hp;?></li>
	</ul>
</div>
<br>
<table>
		<tr>
			<th>#</th>
			<th>Nama Barang</th>
			<th>Jml Barang</th>
			<th>Harga</th>
		</tr>
		<tr>
			<?php 
			$no = 1 ;
			foreach ($nota as $n) {
			?>
			<td><?php echo $no++ ;?></td>

			<td>
				<?php echo $n->nama_brg . '('. $n->sub_1 . ',' . $n->sub_2 . ',' . $n->sub_3 . ')' ;?>
			</td>
			<td>
				<?php echo $n->jml_brg;?>
			</td>
			<td>
				Rp <?php echo number_format($n->harga_brg,0,".",".") ;?>
			</td>
		</tr>
			<?php } ?>

</table>

<div align="right">
	<h5>Total <?php  echo number_format($this->cart->total(),0,".",".");
			?>
	</h5>
</body>
