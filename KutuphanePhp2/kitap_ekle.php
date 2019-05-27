<?php
	include 'veritabani.php';
?>

<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Kitap Ekleme</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles_profile.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>

<body>
	<div id="w">
		<div id="content" class="clearfix">
			<h1>Kitap Ekleme</h1>
			<center>
				<table width="50%" border="1" cellpadding="1" cellspacing="1" class="hovertable">					
					<form method="post" action="">
						<tr> <td><h3>Kitap Adi:</h3></td> <td><input type="text" class="txtbox" value="" name="kitadi" /></td> </tr>
						<tr> <td><h3>Yazar Adi:</h3></td> <td><input type="text" class="txtbox" value="" name="yazadi" /></td> </tr>
						<tr> <td><h3>Sayfa Sayisi:</h3></td> <td><input type="text" class="txtbox" value="" name="ssayi" /></td> </tr>
						<tr> <td><h3>Turu:</h3></td> <td><input type="text" class="txtbox" value="" name="sturu" /></td> </tr> 
						<tr> <td/> <td><input type="submit" value="Ekle" name="kitekle" /></td> </tr>
					</form>	
				</table>
			</center>
						<?php
								$kitabinAdi = "";
								$yazarinAdi = "";
								$sayfaSayisi = "";
								$kitabinTuru = "";
							if(isset($_POST['kitekle']))
							{
								$kitabinAdi = $_POST['kitadi'];
								$yazarinAdi = $_POST['yazadi'];
								$sayfaSayisi = $_POST['ssayi'];
								$kitabinTuru = $_POST['sturu'];
							}
							$sorgum = "";
							if ($kitabinAdi != "" and $yazarinAdi != "" and $sayfaSayisi != "" and $kitabinTuru != "") {
								if (strlen($kitabinAdi) <= 70 or strlen($yazarinAdi) <= 60 or strlen($kitabinTuru) <= 40) {
									$kitabinAdi = trim($kitabinAdi);
									$yazarinAdi = trim($yazarinAdi);
									$sayfaSayisi = trim($sayfaSayisi);
									$kitabinTuru = trim($kitabinTuru);
									$sorgum = "INSERT INTO kitap(kitapAdi, yazar, sayfaSayisi, tur) VALUES('$kitabinAdi','$yazarinAdi','$sayfaSayisi','$kitabinTuru')";
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