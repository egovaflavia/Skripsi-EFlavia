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
<h1><img src="../icon/logoo.png" alt="" width="37" height="38" border="0"/> LOSMEN TINTIN BUNGUS TELUK KABUNG</h1>
Jalan Raya Padang-Painan Km. 21 Kelurahan Teluk Kabung Utara Kecamatan Bungus Teluk Kabung Kota Padang<br>
Telp : +62 XXX-XXX-XXX / +62 XXX-XXXX-XXX<br>
Email : XXXXXXXXXXXX@gmail.com
<h3 align="left">Laporan Bulan <?php echo $_GET['bln'] ?> Tahun <?php echo $_GET['thn'] ?></h3>	
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
	$sql = "select sum(c.jumlahpenumpang*d.hargapulau) as ttl,a.tgltransfer,b.idbooking,e.namalengkap,alamat,nohp,d.namapulau,hargapulau,c.jumlahpenumpang from konfirmasibayar a, booking b,bookingdetail c, pulau d,anggota e where a.idbooking=b.idbooking and a.idbooking=c.idbooking and c.idpulau=d.idpulau and b.idanggota=e.idanggota and MONTH(a.tgltransfer)=$_GET[bln] and YEAR(a.tgltransfer)=$_GET[thn] group by b.idanggota ";
	}
	$sqlo = mysql_query($sql);

	$hasil  = mysql_num_rows($sqlo);
	

	echo "<table border='0'>";
	echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>Nama Pembooking</th>";
		echo "<th>Tanggal Transfer</th>";
		echo "<th>Subtotal Booking</th>";
	echo "</tr>";
	$no = 1;
	$ttl = 0;	
	while($ro = mysql_fetch_array($sqlo)){
		 $sqlod = mysql_query("select * from booking where idbooking='$ro[idbooking]'");
		 $rod = mysql_fetch_array($sqlod);
		 $sqla = mysql_query("select * from anggota where idanggota='$rod[idanggota]'");
		 $ra = mysql_fetch_array($sqla);
		 $sqlpr = mysql_query("select * from pulau where idpulau='$ro[idpulau]'");
		 $rpr = mysql_fetch_array($sqlpr);
		 $sqlbyr = mysql_query("select * from konfirmasibayar where idbooking='$ro[idbooking]'");
		 $rbyr = mysql_fetch_array($sqlbyr);
		 if($rbyr["idbooking"]==$ro["idbooking"]){
		 	$buktibyr = "Sudah Dikonfirmasi<br>
		 	<a href='?p=konfirmasiview&ido=$ro[idbooking]'>Lihat Konfirmasi</a>";
		 }else{
		 	$buktibyr = "Belum Dikonfirmasi";
		}

		echo "<tr style='text-align:center'>";
			echo "<td align='center'>$no</td>";
			echo "<td>$ro[namalengkap]</td>";
			echo "<td>$ro[tgltransfer]</td>";
			echo "<td>IDR $ro[ttl]</td>";
			$ttl += $ro['ttl'];
		echo "</tr>";
		$no++;
	}
	echo "<tr>";
		echo "<td align='center' colspan='3'>Total</td>";
		echo "<td align='center'>IDR $ttl</td>";
	echo "</tr>";
	echo "</table>";
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
