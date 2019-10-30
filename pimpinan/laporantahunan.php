<div id="formadd">
<fieldset>
	<h2>Laporan Tahunan<h2>
	<form method='get'>						 
		<label>Pilih Tahun</label><br>
		<input type="hidden" name="p" value="laporantahunan">
		<select name='thn' style="width: 20%">
			<option value="" disabled="" selected> Pilih Tahun </option>
			<?php
			$now=date('Y');
			for ($a=2012;$a<=$now;$a++)
			{
			     if($a == $_GET['thn']){
			     	echo "<option value='$a' selected>$a</option>";
			     }else{
			     	echo "<option value='$a'>$a</option>";
			     }
			} ?>
		</select><br>
		<input type='submit' value='Cari' style="width: 20%"></td>			
	</form>
<?php
	include "koneksi.php";
	
	if(isset($_GET['thn'])){
	$sql = "select sum(c.jumlahbeli*d.hargaproduk) as ttl, MONTH(a.tgltransfer) as bln, a.tgltransfer, b.idorder, e.namalengkap, alamat, nohp, d.namaproduk, hargaproduk, c.jumlahbeli from konfirmasibayar a, orders b, orderdetail c, produk d, anggota e where a.idorder=b.idorder and a.idorder=c.idorder and c.idproduk=d.idproduk and b.idanggota=e.idanggota and YEAR(a.tgltransfer)=$_GET[thn] group by MONTH(a.tgltransfer)";
	}
	$sqlo = mysql_query($sql);
	
	$hasil  = mysql_num_rows($sqlo);
	
	if($hasil > 0){

	echo "<form method='get'  action='cetaktahunan.php' target='_blank'>						 
		<input type='hidden' name='thn' value='$_GET[thn]'>
		<input type='submit' value='Cetak' style='width: 20%'></td>			
	</form>";

	echo "<table border='0'>";
	echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>Bulan</th>";
		echo "<th>Subtotal</th>";
	echo "</tr>";
	$no = 1;	
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
			echo "<td align='center'>$bal</td>";
			echo "<td align='center'>$ro[ttl]</td>";
			$ttl += $ro[ttl];
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

