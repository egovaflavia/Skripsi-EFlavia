<?php
	session_start();
	include "koneksi.php";
?>

<link rel="stylesheet" type="text/css" href="style.css">
<!--link type="text/css" rel="stylesheet" media="all" href="css/chat.css" /-->
<!--link type="text/css" rel="stylesheet" media="all" href="css/screen.css" /-->

<?php
if(!empty($_SESSION["useradm"]) && !empty($_SESSION["passadm"])){
?>
<div class="container1">
  <div class="grid">
    <div class="dh3">
	  <ul id="menu">
		<li><a href="">Menu Administrator</a></li>
		<li><a href="<?php echo "?p=beranda"; ?>">Home</a></li>
		<li><a href="<?php echo "?p=kategoriview"; ?>">Kategori</a></li>
		<li><a href="<?php echo "?p=brandview"; ?>">Brand</a></li>
		<li><a href="<?php echo "?p=produkview"; ?>">Produk</a></li>
		<li><a href="<?php echo "?p=order"; ?>">Order</a></li>
		<li><a href="<?php echo "?p=anggotaview"; ?>">Anggota</a></li>
		<li><a href="<?php echo "?p=chatbatua"; ?>">Chat Anggota</a></li>
		<li><a href="<?php echo "?p=logout"; ?>">Logout</a></li>
		
	  </ul>
	</div>
	<div class="dh9">
	  <div id="isiadmin">	  
<?php
	if($_GET["p"] == "logout"){
		include "logout.php";
	}else if($_GET["p"] == "kategoriview"){
		include "kategoriview.php";
	}else if($_GET["p"] == "kategoriadd"){
		include "kategoriadd.php";
	}else if($_GET["p"] == "kategoriedit"){
		include "kategoriedit.php";
	}else if($_GET["p"] == "kategoridel"){
		include "kategoridel.php";
	}else if($_GET["p"] == "brandview"){
		include "brandview.php";
	}else if($_GET["p"] == "brandadd"){
		include "brandadd.php";
	}else if($_GET["p"] == "brandedit"){
		include "brandedit.php";
	}else if($_GET["p"] == "branddel"){
		include "branddel.php";
	}else if($_GET["p"] == "produkview"){
		include "produkview.php";
	}else if($_GET["p"] == "produkadd"){
		include "produkadd.php";
	}else if($_GET["p"] == "produkedit"){
		include "produkedit.php";
	}else if($_GET["p"] == "produkdel"){
		include "produkdel.php";
	}else if($_GET["p"] == "order"){
		include "order.php";
	}else if($_GET["p"] == "orderdetail"){
		include "orderdetail.php";
	}else if($_GET["p"] == "orderdetailstatus"){
		include "orderdetailstatus.php";
	}else if($_GET["p"] == "anggotaview"){
		include "anggotaview.php";
	}else if($_GET["p"] == "chatbatua"){
		include "chatbatua.php";
	}else if($_GET["p"] == "konfirmasiview"){
		include "konfirmasiview.php";
	}else{
		include "home.php";
	}
?>
 	  </div>
	</div>
  </div>
  <!--script type="text/javascript" src="js/jquery.js"></script-->
<!--script type="text/javascript" src="js/chat.js"></script-->
</div>
<?php
}else{
	include "login.php";
}
?>
