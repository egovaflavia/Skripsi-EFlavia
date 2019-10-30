<?php
	session_start();
	include "koneksi.php";
?>

<link rel="stylesheet" type="text/css" href="style.css">

<?php
if(!empty($_SESSION["useradm"]) && !empty($_SESSION["passadm"])){
?>
<div class="container1">
  <div class="grid">
    <div class="dh3">
	  <ul id="menu">
		<li><a href="">Menu Pimpinan</a></li>
		<li><a href="<?php echo "?p=beranda"; ?>">Home</a></li>
		<li><a href="<?php echo "?p=laporanbulanan"; ?>">Laporan Bulanan</a></li>
		<li><a href="<?php echo "?p=laporantahunan"; ?>">Laporan Tahunan</a></li>
		<li><a href="<?php echo "?p=logout"; ?>">Logout</a></li>

	  </ul>
	</div>
	<div class="dh9">
	  <div id="isiadmin">	  
<?php
	if($_GET["p"] == "logout"){
		include "logout.php";
		
	}else if($_GET["p"] == "laporanbulanan"){
		include "laporanbulanan.php";
	}else if($_GET["p"] == "laporantahunan"){
		include "laporantahunan.php";
	}else if($_GET["p"] == "cetaktahunan"){
		include "cetaktahunan.php";
	}else if($_GET["p"] == "cetakbulanan"){
		include "cetakbulanan.php";
	}else if($_GET["p"] == "logout"){
		include "logout.php";
	}else{
		include "home.php";
	}
?>
 	  </div>
	</div>
  </div>
</div>
<?php
}else{
	include "login.php";
}
?>
