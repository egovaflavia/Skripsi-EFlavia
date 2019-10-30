<style type="text/css">
	table{
	width:100%;
	}
	th{
		text-align:center;
		padding:10px;
		background-color:#006600;
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
<h1><img src="../icon/logoo.png" width="37" height="38" alt=""/> LOSMEN TINTIN BUNGUS TELUK KABUNG</h1>
Jalan Raya Padang-Painan Km. 21 Kelurahan Teluk Kabung Utara Kecamatan Bungus Teluk Kabung Kota Padang<br>
Telp : +62 XXX-XXX-XXX / +62 XXX-XXXX-XXX<br>
Email : XXXXXXXXXXXX@gmail.com
<h3 align="left">Laporan Tahun <?php echo $_GET['thn'] ?></h3>
	
<?php
	include "../koneksi.php";
	
	if(isset($_GET['thn'])){
	$sql = "select sum(c.jumlahpenumpang*d.hargapulau) as ttl,MONTH(a.tgltransfer) as bln, a.tgltransfer,b.idbooking,e.namalengkap,alamat,nohp,d.namapulau,hargapulau,c.jumlahpenumpang from konfirmasibayar a, booking b,bookingdetail c, pulau d,anggota e where a.idbooking=b.idbooking and a.idbooking=c.idbooking and c.idpulau=d.idpulau and b.idanggota=e.idanggota and YEAR(a.tgltransfer)=$_GET[thn] group by MONTH(a.tgltransfer) ";
	}
	$sqlo = mysql_query($sql);
	
	$hasil  = mysql_num_rows($sqlo);
	
	if($hasil > 0){
	echo "<table border='0'>";
	echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>Bulan Booking</th>";
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


		echo "<tr style='text-align:center'>";
			echo "<td align='center'>$no</td>";
			echo "<td>$bal</td>";
			echo "<td>IDR $ro[ttl]</td>";
			$ttl += $ro['ttl'];
		echo "</tr>";
		$no++;
	}
	echo "<tr>";
		echo "<td align='center' colspan='2'>Total</td>";
		echo "<td align='center'>IDR $ttl</td>";
	echo "</tr>";
	echo "</table>";
	}
?>
<p>&nbsp;</p>

 <tr>
    <td><div align ="right">Padang,.................</div></td>
    <td><div align="right">Pimpinan</div></td>
  </tr>
    <p>&nbsp;</p>
	 <p>&nbsp;</p>
   <tr>
    <td><div align="right">(Azrul Velly)</div></td>
  </tr>
</fieldset>
</div>
</body>

