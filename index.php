<?php
  session_start();
  include "koneksi.php";
  $sqla = mysql_query("select * from anggota where username='$_SESSION[userag]'");
  $ra = mysql_fetch_array($sqla);
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Istana Karpet Dan Perabot</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--link type="text/css" rel="stylesheet" media="all" href="css/chat.css" /-->
<!--link type="text/css" rel="stylesheet" media="all" href="css/screen.css" /-->
</head>

<body>
<div id="main_container">
<div class="container1">
  <div class="grid">
    <div class="dh4"><b><span style="color:#3A3A3A; font-size:18px;"><b><img src="icon/crown.png" alt="" width="15" height="17" longdesc="icon/crown.png" /></b> Istana Karpet Dan Perabot</span></b></div>
	<div class="dh8" align="right">
	<?php include "menumember.php";?>
	
	</div>
  </div>
</div>
<div class="container2">
  <ul id="menu">
  <?php
    $sqlk = mysql_query("select * from kategori order by namakat asc");
	echo "<li><a href='?idk=0'>HOME</a></li>";
	while($rk = mysql_fetch_array($sqlk)){
	  echo "<li><a href='?idk=$rk[idkat]'>$rk[namakat]</a></li>";
	}
  ?>
  </ul>
</div>
<div class="container4">
  <div class="grid">
  <?php
  if($_GET["p"] == "produkdetail"){
    include "produkdetail.php";
  }else if($_GET["p"] == "register"){
    include "register.php";
  }else if($_GET["p"] == "login"){
    include "login.php";
  }else if($_GET["p"] == "logout"){
    include "logout.php";
  }else if($_GET["p"] == "keranjang"){
    include "keranjang.php";
  }else if($_GET["p"] == "keranjangedit"){
    include "keranjangedit.php";
  }else if($_GET["p"] == "keranjangdel"){
    include "keranjangdel.php";
  }else if($_GET["p"] == "keranjangbelanja"){
    include "keranjangbelanja.php";
  }else if($_GET["p"] == "selesaibelanja"){
    include "selesaibelanja.php";
  }else if($_GET["p"] == "selesaibelanjaaksi"){
    include "selesaibelanjaaksi.php";
  }else if($_GET["p"] == "konfirmasi"){
    include "konfirmasi.php";
  }else if($_GET["p"] == "order"){
    include "order.php";
  }else if($_GET["p"] == "chat"){
    include "chat.php";
  }else if($_GET["p"] == "orderdetail"){
    include "orderdetail.php";
  }else if($_GET["p"] == "peraturan"){
    include "peraturan.php";
  }else if($_GET["p"] == "chatbatua"){
    include "chatbatua.php";
  }else if($_GET["p"] == "pengembalian"){
    include "pengembalian.php";
  }else if($_GET["p"] == "komentar"){
    include "komentar.php";
  }else if($_GET["p"] == "postkomentar"){
    include "postkomentar.php";
  }else if($_GET["p"] == "newkomentar"){
    include "newkomentar.php";
	}else if($_GET["p"] == "komentar"){
    include "komentar.php";
  }else{ 
    include "produkterbaru.php";
    include "produk.php";
  }
  ?>
  </div>
</div>
<div class="container5">
  <?php include "footer.php"; ?>
</div>

	<!--script type="text/javascript" src="js/jquery.js"></script-->
	<!--script type="text/javascript" src="js/chat.js"></script-->
</body>
</html>
