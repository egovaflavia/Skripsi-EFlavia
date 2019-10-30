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
	<?php
	$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$jlh_bln=count($bulan);
	for($c=1; $c<$jlh_bln; $c+=1){
		if($c == $_GET['bln']){
			$bal=$bulan[$c];
		}
	};
	?>

<?php
	include "../koneksi.php";

	if(isset($_GET['bln']) && isset($_GET['thn']) ){
	$sql = "SELECT * FROM booking AS a,anggota AS b,pulau AS c,bookingdetail AS d,paket AS e WHERE a.idanggota=b.idanggota AND a.idbooking=d.idbooking AND c.idpulau=d.idpulau AND e.idpaket=c.idpaket AND MONTH(a.tglberangkat)=$_GET[bln] and YEAR(a.tglberangkat)=$_GET[thn]";
	}
	$sqlo = mysql_query($sql);

	$hasil  = mysql_num_rows($sqlo);
	

	echo "<table border='0'>";
	echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>Nama Tamu</th>";
		echo "<th>Alamat</th>";
		echo "<th>Pulau</th>";
		echo "<th>Paket</th>";
		echo "<th>Harga</th>";
	echo "</tr>";
	$no = 1;
	$ttl = 0;	
	while($ro = mysql_fetch_array($sqlo)){
		 

		echo "<tr style='text-align:center'>";
			echo "<td align='center'>$no</td>";
			echo "<td>$ro[namalengkap] $ro[jumlahpenumpang] (Orang)</td>";
			echo "<td>$ro[alamat]</td>";
			echo "<td>$ro[namapulau]</td>";
			echo "<td>$ro[namapaket]</td>";
			echo "<td>IDR $ro[hargapulau]</td>";
		echo "</tr>";
		$no++;
	}

	echo "</table>";
?>
<p>&nbsp;</p>

<tr>
	<td><div align ="right">Padang,.................</div></td>
	<td><div align ="right">Pimpinan</div></td>
</tr>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<tr>
	<td><div align="right">(Azrul Velly)</div></td>
</tr>
</fieldset>
</div>
</body>
