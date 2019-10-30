<style type="text/css">
	table{
	width:100%;
	}
	th{
		text-align:center;
		padding:10px;
		background-color:#9D0000;
		color:#FFFFFF;
		font-family:Arial;
		font-size:14px;
	}
	td{
		padding:10px;
		background-color:#F2F2F2;
		font-size:14px;		
	}
</style>
<body onLoad="window.print()">
<div id="formadd">
<fieldset>
	<center>
	    <tr>
    <td width="82%"><div align="center"><strong>TOKO ISTANA KARPET DAN PERABOT </strong></div></td>
  </tr>
  <tr>
    <td><div align="center" class="style1">"Tintin Homestay, Jophira Tintin" <br>Accomodation, Island Tour, Mentawai Tour, Minangkabau Tour</div></br></td>
  </tr>
  
  <tr>
    <td><div align="center">Jalan Raya Padang Aro- Sungai Penuh, Timbulun , Sangir , Solok Selatan, Sumatera Barat </div></td>
  </tr>
		<h3 align="left">Laporan Tahun <?php echo $_GET['thn'] ?></h3>		
	</center>
	
<?php
	include "../koneksi.php";
	
	if(isset($_GET['thn'])){
	$sql = "select sum(c.jumlahbeli*d.hargaproduk) as ttl, MONTH(a.tgltransfer) as bln, a.tgltransfer, b.idorder, e.namalengkap, alamat, nohp, d.namaproduk, hargaproduk, c.jumlahbeli from konfirmasibayar a, orders b, orderdetail c, produk d, anggota e where a.idorder=b.idorder and a.idorder=c.idorder and c.idproduk=d.idproduk and b.idanggota=e.idanggota and YEAR(a.tgltransfer)=$_GET[thn] group by MONTH(a.tgltransfer)";
	}
	$sqlo = mysql_query($sql);
	
	$hasil  = mysql_num_rows($sqlo);
	
	if($hasil > 0){
	echo "<table border='0'>";
	echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>Bulan Order</th>";
		echo "<th>Subtotal</th>";
	echo "</tr>";
	$no = 1;	
	$ttl = 0;
	while($ro = mysql_fetch_array($sqlo)){
		$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$jlh_bln=count($bulan);
		for($c=1; $c<$jlh_bln; $c+=1){
			if($c == $ro['bln']){
				$bal=$bulan[$c];
			}
		};


		echo "<tr>";
			echo "<td align='center'>$no</td>";
			echo "<td>$bal</td>";
			echo "<td>$ro[ttl]</td>";
			$ttl += $ro['ttl'];
		echo "</tr>";
		$no++;
	}
	echo "<tr>";
		echo "<td align='center' colspan='2'>Total</td>";
		echo "<td align='center'>$ttl</td>";
	echo "</tr>";
	echo "</table>";
	}
?>
</fieldset>
</div>
</body>

