<?php

include 'veritabani.php';


if (!isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == false) {
    echo "<script>window.open('index.php','_self')</script>";
	exit;
} 

	
	$username=$_COOKIE['username'];
	

?>



<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Kitap Ver</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles_profile.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>

<body>
<br><br>
<div class="title_box" >
<div id="title"><b>Kitap Ver<b></div>
<div id="content">
						<center>
						<table width="50%" border="1" cellpadding="1" cellspacing="1" class="test">
						  <tr>
							<td>Kullanici Tc</td>
							<td>Kitap Adi</td>
							<td>Verilen Tarih</td>
						  </tr>		  
						  <form method="post"  action="">
						  <tr>
							<td><input type="text" class="txtbox" value="" name="kultc" maxlength="11" /></td>
							<td><input type="text" class="txtbox" value="" name="kitadi" /></td>
							<td><input type="date" class="txtbox" value="" name="tarih" /></td>
							<td><input type="submit" value="Kitap Ver" name="kitver" /></td>
						  </tr>
						  </form>	
						</table></center>
						
						<?php
							$tcnosu="";
							$kitapadi="";
							$tarih="";
							$kitap_id="";
							$kullanici_id="";
							if(isset($_POST['kitver'])){
							$tcnosu=$_POST['kultc'];
							$kitapadi=$_POST['kitadi'];
							$tarih=$_POST['tarih'];
							
							
							$tcnosu=trim($tcnosu);
							$kitapadi=trim($kitapadi);
							$tarih=trim($tarih);
							
							
							
							
							
							$sorgu1="select * from kullanici where tc='$tcnosu'";
							$result = mysqli_query($conn,$sorgu1);
							if (!$result) {
								echo "bağlantı hatası" . mysql_error();
								exit;
							}
							if (!mysqli_num_rows($result)) {
								//echo "kayit yok";
							}
							else{
								while ($row = mysqli_fetch_assoc($result)) {
							$kullanici_id= $row["id"];
							}}
								
							$sorgu2="select * from kitap where kitapAdi='$kitapadi'";
							$result2 = mysqli_query($conn,$sorgu2);
							if (!$result2) {
								echo "bağlantı hatası" . mysql_error();
								exit;
							}
							if (!mysqli_num_rows($result2)) {
								//echo "kayit yok";
							}
							else{
								while ($row = mysqli_fetch_assoc($result2)) {
							$kitap_id= $row["id"];
							}}
							
							$kitap_id=trim($kitap_id);
							$kullanici_id=trim($kullanici_id);
							
							
							
							$sql = "INSERT INTO alinankitap  (kullanici_id,kitap_id,alinan_tarih)VALUES ('$kullanici_id', '$kitap_id', '$tarih')";

							if (mysqli_query($conn, $sql)) {
									echo '<script language="javascript">';
									echo 'alert("Rezervasyon Yapildi")';
									echo '</script>';
								} 
							else {
									echo '<script language="javascript">';
									echo 'alert("Rezervasyon Yapilamadi")';
									echo '</script>';
							}
													
							
							}
							
							
							
						?>

</body>
</html>