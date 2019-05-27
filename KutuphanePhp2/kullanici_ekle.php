<?php
	include 'veritabani.php';
?>

<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Kullanici Ekleme</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles_profile.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>

<body>
	<div id="w">
		<div id="content" class="clearfix">
			<h1>Kullanici Ekleme</h1>
			<center>
				<table width="50%" border="1" cellpadding="1" cellspacing="1" class="hovertable">					
					<form method="post" action="">
						<tr> <td><h3>Adi:</h3></td> <td><input type="text" class="txtbox" value="" name="kulad" /></td> </tr>
						<tr> <td><h3>Soyadi:</h3></td> <td><input type="text" class="txtbox" value="" name="kulsoy" /></td> </tr>
						<tr> <td><h3>Tc Numarasi:</h3></td> <td><input type="text" class="txtbox" value="" name="kultcn" /></td> </tr>
						<tr> <td><h3>Telefon:</h3></td> <td><input type="text" class="txtbox" value="" name="kultel" /></td> </tr> 
						<tr> <td><h3>E-mail:</h3></td> <td><input type="email" class="txtbox" value="" name="kulmail" /></td> </tr>
						<tr> <td><h3>Dogum Tarihi:</h3></td> <td><input type="date" class="txtbox" value="" name="kuldt" /></td> </tr>
						<tr> <td><h3>Adresi:</h3></td> <td><input type="text" class="txtbox" value="" name="kuladr" /></td> </tr>
						<tr> <td><h3>Sifresi:</h3></td> <td><input type="text" class="txtbox" value="" name="kulsifre" /></td> </tr>
						<tr> <td/> <td><input type="submit" value="Ekle" name="kulekle" /></td> </tr>
					</form>	
				</table>
			</center>
						<?php
								$kullaniciAdi = "";
								$kullaniciSoyadi = "";
								$kullaniciTc = "";
								$kullaniciTel = "";
								$kullaniciMail = "";
								$kullaniciDogum = "";
								$kullaniciAdres = "";
								$kullaniciSifre = "";
							if(isset($_POST['kulekle']))
							{
								$kullaniciAdi = $_POST['kulad'];
								$kullaniciSoyadi = $_POST['kulsoy'];
								$kullaniciTc = $_POST['kultcn'];
								$kullaniciTel = $_POST['kultel'];
								$kullaniciMail = $_POST['kulmail'];
								$kullaniciDogum = $_POST['kuldt'];
								$kullaniciAdres = $_POST['kuladr'];
								$kullaniciSifre = $_POST['kulsifre'];
							}
							$sorgum = "";
							if ($kullaniciAdi != "" and $kullaniciSoyadi != "" and $kullaniciTc != "" and $kullaniciTel != "" and $kullaniciMail != "" and
							$kullaniciDogum != "" and $kullaniciAdres != "" and $kullaniciSifre != "") {
								if (strlen($kullaniciAdi) <= 30 or strlen($kullaniciSoyadi) <= 30 or strlen($kullaniciTc) <= 11 or strlen(kullaniciTel) <= 11
								or strlen($kullaniciMail) <= 40 or strlen($kullaniciAdres) <= 100 or strlen($kullaniciSifre) <= 40) {
									$kullaniciAdi = trim($kullaniciAdi);
									$kullaniciSoyadi = trim($kullaniciSoyadi);
									$kullaniciTc = trim($kullaniciTc);
									$kullaniciTel = trim($kullaniciTel);
									$kullaniciMail = trim($kullaniciMail);
									$kullaniciDogum = trim($kullaniciDogum);
									$kullaniciAdres = trim($kullaniciAdres);
									$kullaniciSifre = trim($kullaniciSifre);
									$sorgum = "INSERT INTO kullanici(ad, soyad, tc, tel, email, dogumtarihi, adres, sifre) 
									VALUES('$kullaniciAdi','$kullaniciSoyadi','$kullaniciTc','$kullaniciTel', '$kullaniciMail', '$kullaniciDogum', '$kullaniciAdres', '$kullaniciSifre')";
									$onay = mysqli_query($conn,$sorgum);
									if ($onay)
									{
										echo '<script language="javascript">';
										echo 'alert("Ekleme Yapıldı")';
										echo '</script>';
									}
									else
									{
										echo '<script language="javascript">';
										echo 'alert("Ekleme Yapilamadi")';
										echo '</script>';
									}
								}						
							}
						?>
		</div>
	</div>
</body>

</html>