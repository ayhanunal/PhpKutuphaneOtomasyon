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
<style>
.button_rez {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width:150px;
  border-radius: 12px;
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Yetkili Sayfasi</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles_profile.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>

<body>
  <div id="topbar">
  <a  href="guvenli_cikis.php"  style="float: right;margin-right:30px;">Çıkış</a>
  </div>
  
  <div id="w">
    <div id="content" class="clearfix">
      <h1> Yetkili Sayfasi </h1>
      <nav id="profiletabs">
        <ul class="clearfix">
          
          <li><a href="#kullanicilar">Tüm Kullanicilar</a></li>
          <li><a href="#kitaplar">Tüm Kitaplar</a></li>
		  <li><a href="#kitap">Kitap</a></li>
		  <li><a href="#kullanici">Kullanici</a></li>
		  <li><a href="#rezervasyon">Rezervasyon</a></li>
		  
        </ul>
      </nav>
      




	  
<!-- sectionlar buraya-->	  

 


 
 <!-- tum kullanicilar -->
 <section id="kullanicilar" class="hidden">


	  
<div class="title_box" >
    <div id="title"><b> Tum Kullanicilar <b></div>
    <div id="content">
	
						 
						<center>
						<table class="hovertable">
						<tr><th> Sayi </th><th> Adi </th><th> Soyadi </th><th> Tc </th><th> Telefon Numarasi </th><th> Email </th></tr>

						<?php
						
						
						$y=1;
						$sorgu = mysqli_query($conn,  "select * from kullanici" );

						if (!$sorgu) {
							echo "Veritabani Baglanti Hatasi" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($sorgu)) {
							echo "Kullanici Yok";

						}
						else{
							while ($row = mysqli_fetch_assoc($sorgu)) {
							$c= $row["ad"];
							$d= $row["soyad"];
							$e= $row["tc"];
							$f= $row["tel"];
							$g= $row["email"];
								
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$y</td>";
							echo "<td>$c</td>";
							echo "<td>$d</td>";
							echo "<td>$e</td>";
							echo "<td>$f</td>";
							echo "<td>$g</td>";	
							echo "</tr>";
							
							$y++;
							}
						}
						?>
						</table></center>
			</div>
      </section>
	  
	  
	  
	  
	  

	  

 
<!-- tum kitaplar -->
 <section id="kitaplar" class="hidden">


	  
<div class="title_box" >
    <div id="title"><b> Tum Kitaplar <b></div>
    <div id="content">
	
						 
						<center>
						<table class="hovertable">
						<tr><th> Sayi </th><th> Kitap Adi </th><th> Yazari </th><th> Sayfa Sayisi </th><th> Turu </th></tr>

						<?php
						
						
						$x=1;
						$sorgu = mysqli_query($conn,  "select * from kitap" );

						if (!$sorgu) {
							echo "Veritabani Baglanti Hatasi" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($sorgu)) {
							echo "Kitap Yok";

						}
						else{
							while ($row = mysqli_fetch_assoc($sorgu)) {
							$c= $row["kitapAdi"];
							$d= $row["yazar"];
							$e= $row["sayfaSayisi"];
							$f= $row["tur"];
								
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$x</td>";
							echo "<td>$c</td>";
							echo "<td>$d</td>";
							echo "<td>$e</td>";
							echo "<td>$f</td>";	
							echo "</tr>";
							$x++;
							}
							
						}
						?>
						</table></center>
			</div>
      </section> 
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
<!-- kitap -->	  
<section id="kitap">
	  
	  
	  
<div class="title_box" >
<div id="title"><b>Kitap<b></div>
<div id="content">
						<center>
						<table width="50%" border="1" cellpadding="1" cellspacing="1" class="test">
						  <tr>
							<td>Kitap Adi</td>
							<td>Yazar Adi</td>
						  </tr>		  
						  <form method="post"  action="">
						  <tr>
							<td><input type="text" class="txtbox" value="" name="kitadi" /></td>
							<td><input type="text" class="txtbox" value="" name="yazadi" /></td>
							<td><input type="submit" value="Ara" name="kitara" /></td>
						  </tr>
						  </form>	
						</table>
						  

							  

						<form method="post"  action="">	  
						<table class="hovertable">
							<tr>
								<th>Sayi</th><th>Kitap Adi</th><th>Yazari</th><th>Sayfa Sayisi</th><th>Türü</th><th>Seçim</th>
							</tr>

						<?php
						$x=1;
						$kitabinnAdi="";
						$yazarinnAdi="";
						if(isset($_POST['kitara'])){
						$kitabinnAdi=$_POST['kitadi'];
						$yazarinnAdi=$_POST['yazadi'];}
						
						$parametre="";
						$sorgum="SELECT * FROM   kitap  WHERE  kitapAdi like '%$parametre%' ";
						if($kitabinnAdi!="" and $yazarinnAdi=="")
						{
							$parametre=$kitabinnAdi;
							$sorgum="SELECT * FROM   kitap  WHERE  kitapAdi like '%$parametre%' ";
						}
						if ($kitabinnAdi=="" and $yazarinnAdi!="")
						{
							$parametre=$yazarinnAdi;
							$sorgum="SELECT * FROM   kitap  WHERE  yazar like '%$parametre%' ";
						}
						if ($kitabinnAdi!="" and $yazarinnAdi!="")
						{
							$sorgum="SELECT * FROM   kitap  WHERE  kitapAdi like '%$kitabinnAdi%' and yazar like '%$yazarinnAdi%' ";
						}
	
						
						$result = mysqli_query($conn,$sorgum);
						if (!$result) {
							echo "bağlantı hatası" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($result)) {
							//echo "kayit yok";
						}
						else{
							while ($row = mysqli_fetch_assoc($result)) {
							$a= $row["kitapAdi"];
							$b= $row["yazar"];
							$c= $row["sayfaSayisi"];
							$d= $row["tur"];
							
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$x</td>";
							echo "<td>$a</td>";
							echo "<td>$b</td>";
							echo "<td>$c</td>";
							echo "<td>$d</td>";
							echo "<td><input name='del' type=\"radio\" value=\" $a \"></td>";
							echo "</tr>";
							$x++;
							}
						}
						?>
						</table>
						
						<input type="submit" value="Kitabi Sil" name="kitsil" />
						
					
						
							<?php
							
							if(isset($_POST['kitsil']))
							{
								/*$sql4="DELETE FROM bookcases WHERE user_email=\"$username\" AND bookcase=\"$bookcase\" ";
									echo $sql4;
									if (mysqli_query($conn, $sql4)) {} 
									else {echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);}		*/
								
								
								$silinecek=$_POST['del'];
								$silinecek=trim($silinecek);
								$sil_sorgum= "delete from kitap where kitapAdi=\"$silinecek\" ";
								if (mysqli_query($conn, $sil_sorgum)) {
									echo '<script language="javascript">';
									echo 'alert("Silme Başarılı Oldu")';
									echo '</script>';
								} 
								else {
									echo '<script language="javascript">';
									echo 'alert("Silme İşlemi Gerçekleştirilemedi")';
									echo '</script>';
									}
								
							}
							
							
							?>
							<br><br>
							<button type="button" onclick="kitap_ekle_sayfasi()"> Kitap Ekle </button>
	
						</form>
							
						</center>
</div>



</section>














<!-- kullanici -->	  
<section id="kullanici">
	  
	  
	  
<div class="title_box" >
<div id="title"><b>Kullanici<b></div>
<div id="content">
						<center>
						<table width="50%" border="1" cellpadding="1" cellspacing="1" class="test">
						  <tr>
							<td>Tc</td>
							<td>İsim</td>
						  </tr>		  
						  <form method="post"  action="">
						  <tr>
							<td><input type="text" class="txtbox" value="" name="tcno" /></td>
							<td><input type="text" class="txtbox" value="" name="kulismi" /></td>
							<td><input type="submit" value="Ara" name="kulara" /></td>
						  </tr>
						  </form>	
						</table>
						  

							  

						<form method="post"  action="">	  
						<table class="hovertable">
							<tr>
								<th>Sayi</th><th>İsim</th><th>Soyisim</th><th>Tc</th><th>Telefon</th><th>Email</th><th>Doğum Tarihi</th><th>Seçim</th><th>Mesaj Gönder</th>
							</tr>

						<?php
						$x=1;
						$tcnosu="";
						$kuladi="";
						if(isset($_POST['kulara'])){
						$tcnosu=$_POST['tcno'];
						$kuladi=$_POST['kulismi'];}
						
						$parametre1="";
						$sorgum="SELECT * FROM   kullanici  WHERE  ad like '%$parametre1%' ";
						if($tcnosu!="" and $kuladi=="")
						{
							$parametre1=$tcnosu;
							$sorgum="SELECT * FROM   kullanici  WHERE  tc like '%$parametre1%' ";
						}
						if ($tcnosu=="" and $kuladi!="")
						{
							$parametre1=$kuladi;
							$sorgum="SELECT * FROM   kullanici  WHERE  ad like '%$parametre1%' ";
						}
						if ($tcnosu!="" and $kuladi!="")
						{
							$sorgum="SELECT * FROM   kullanici  WHERE  tc like '%$tcnosu%' and ad like '%$kuladi%' ";
						}
	
						
						$result = mysqli_query($conn,$sorgum);
						if (!$result) {
							echo "bağlantı hatası" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($result)) {
							//echo "kayit yok";
						}
						else{
							while ($row = mysqli_fetch_assoc($result)) {
							$a= $row["ad"];
							$b= $row["soyad"];
							$c= $row["tc"];
							$d= $row["tel"];
							$e= $row["email"];
							$f= $row["dogumtarihi"];
							
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$x</td>";
							echo "<td>$a</td>";
							echo "<td>$b</td>";
							echo "<td>$c</td>";
							echo "<td>$d</td>";
							echo "<td>$e</td>";
							echo "<td>$f</td>";
							echo "<td><input name='del' type=\"radio\" value=\" $c \"></td>";
							echo "<td><input name='gon_mesaj' type=\"radio\" value=\" $c \"></td>";
							echo "</tr>";
							$x++;
							}
						}
						?>
						</table>
						
						<input type="submit" value="Kullanici Sil" name="kulsil" />
						
					
						
							<?php
							
							if(isset($_POST['kulsil']))
							{
								/*$sql4="DELETE FROM bookcases WHERE user_email=\"$username\" AND bookcase=\"$bookcase\" ";
									echo $sql4;
									if (mysqli_query($conn, $sql4)) {} 
									else {echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);}		*/
								
								
								$silinecek=$_POST['del'];
								$silinecek=trim($silinecek);
								$sil_sorgum= "delete from kullanici where tc=\"$silinecek\" ";
								if (mysqli_query($conn, $sil_sorgum)) {
									echo '<script language="javascript">';
									echo 'alert("Silme Başarılı Oldu")';
									echo '</script>';
								} 
								else {
									echo '<script language="javascript">';
									echo 'alert("Silme İşlemi Gerçekleştirilemedi")';
									echo '</script>';
									}
								
							}
							
							
							?>
							
							<br><br>
							<button type="button" onclick="kullanici_ekle_sayfasi()"> Kullanici Ekle </button>
							
							<br><br>
							<textarea name="mesaj_icerik" class="txtbox"rows="4" cols="50"></textarea></br></br>
							
							<input type="submit" value="Mesaj Gönder" name="mesaj_gonder" />
							<?php
							
							if(isset($_POST['mesaj_gonder']))
							{
								/*$sql4="DELETE FROM bookcases WHERE user_email=\"$username\" AND bookcase=\"$bookcase\" ";
									echo $sql4;
									if (mysqli_query($conn, $sql4)) {} 
									else {echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);}		*/
								
								
								$gonderilecek=$_POST['gon_mesaj'];
								$gonderilecek=trim($gonderilecek);
								$mesaj=$_POST['mesaj_icerik'];
								$mesaj=trim($mesaj);
								
								$sql = "update kullanici set mesaj='$mesaj' where tc='$gonderilecek' ";

								if (mysqli_query($conn, $sql)) {
									echo '<script language="javascript">';
									echo 'alert("Mesaj Gönderildi")';
									echo '</script>';
									} 
								else {
									echo '<script language="javascript">';
									echo 'alert("Mesaj Gönderilemedi")';
									echo '</script>';
									}
								
								
								
							}
							
							
							?>
							
							
							
	
						</form>
							
						</center>
</div>



</section>
 
 
 
 
 
 
 
 
 
 
 <!-- rezervasyon -->
 <section id="rezervasyon" class="hidden">


	  
<div class="title_box" >
    <div id="title"><b> Rezervasyon  <b></div>
    <div id="content">
					<button type="button" class="button_rez" onclick="kitap_ver()" > Kitap Ver </button> <br><br>
					<button type="button" class="button_rez" onclick="kitap_al()" > Kitap Al </button>
						 
						
			</div>
      </section>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

	  
	  
	  
	  
	  
	  

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
<!-- section sonu-->		  
	  
    </div>
  </div>
  
  
<script type="text/javascript">

function kitap_ekle_sayfasi()
		{
			window.open("kitap_ekle.php", "kitap ekle", "toolbar=no,location=no,directories=no, status=no, menubar=no, scrollbars=no, resizable=no,copyhistory=no, width=840, height=380, left=120, screenX=400, top=400, screenY=300") ;
		}
		
function kullanici_ekle_sayfasi()
		{
			window.open("kullanici_ekle.php", "kullanici ekle", "toolbar=no,location=no,directories=no, status=no, menubar=no, scrollbars=no, resizable=no,copyhistory=no, width=840, height=380, left=120, screenX=400, top=400, screenY=300") ;
		}
		
function kitap_ver()
		{
			window.open("kitap_ver.php", "kitap ver", "toolbar=no,location=no,directories=no, status=no, menubar=no, scrollbars=no, resizable=no,copyhistory=no, width=640, height=180, left=180, screenX=400, top=400, screenY=300") ;
		}


function kitap_al()
		{
			window.open("kitap_al.php", "kitap al", "toolbar=no,location=no,directories=no, status=no, menubar=no, scrollbars=no, resizable=no,copyhistory=no, width=640, height=180, left=180, screenX=400, top=400, screenY=300") ;
		}


$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>


</body>
</html>