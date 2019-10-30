<?php
	include "koneksi.php";
	echo "<h3 align='left'>Selamat Datang di Halaman Administrator</h3>";
	
	//Kategori
	$sqlkat = mysql_query("select * from kategori");
	$rowkat = mysql_num_rows($sqlkat);
	echo "<div class='dh2' align='center'>
	<div id='view'><fieldset>
	<a href='?p=kategoriview'>Kategori<h2>$rowkat</h2></a>
	</fieldset></div>
	</div>";
	//Brand
	$sqlbrn = mysql_query("select * from brand");
	$rowbrn = mysql_num_rows($sqlbrn);
	echo "<div class='dh2' align='center'>
	<div id='view'><fieldset>
	<a href='?p=brandview'>Brand <h2>$rowbrn</h2></a>
	</fieldset></div>
	</div>";	
		
	/*$sqljas = mysql_query("select * from jasakirim");
	$rowjas = mysql_num_rows($sqljas);
	echo "<div class='dh2' align='center'>
	<div id='view'><fieldset>
	<a href='?p=jasakirimview'>Jasa Kirim <h2>$rowjas</h2></a>
	</fieldset></div>
	</div>";	*/
	
	//Produk
	$sqlp = mysql_query("select * from produk");
	$rowp = mysql_num_rows($sqlp);
	echo "<div class='dh2' align='center'>
	<div id='view'><fieldset>
	<a href='?p=produkview'>Produk <h2>$rowp</h2></a>
	</fieldset></div>
	</div>";

	//Produk
	$sqlo = mysql_query("select * from orders");
	$rowo = mysql_num_rows($sqlo);
	echo "<div class='dh2' align='center'>
	<div id='view'><fieldset>
	<a href='?p=order'>Pesanan <h2>$rowo</h2></a>
	</fieldset></div>
	</div>";	
	
	//Anggota
	$sqla = mysql_query("select * from anggota");
	$rowa = mysql_num_rows($sqla);
	echo "<div class='dh2' align='center'>
	<div id='view'><fieldset>
	<a href='?p=anggotaview'>Anggota <h2>$rowa</h2></a>
	</fieldset></div>
	</div>";	
		
	
?>