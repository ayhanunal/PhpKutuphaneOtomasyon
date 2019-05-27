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
  <title>Kullanici Sayfasi</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles_profile.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>

<body>
  <div id="topbar">
  <a  href="guvenli_cikis.php"  style="float: right;margin-right:30px;">Çıkış</a>
  </div>
  
  <div id="w">
    <div id="content" class="clearfix">
      <h1> Kullanici Sayfasi </h1>
      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#kitapara">Kitap Ara</a></li>
          <li><a href="#uzerimdekiler">Üzerimdekiler</a></li>
          <li><a href="#hakkimda">Şahsi Bilgilerim</a></li>
		  <li><a href="#iade">İadelerim</a></li>
		  <li><a href="#ceza">Ceza Bilgilerim</a></li>
		  <li><a href="#gelen_mesaj">Gelen Kutusu</a></li>
		  
        </ul>
      </nav>
      

	  
	  
	  
	  
	  
	  
	  

<!-- ara -->	  
<section id="kitapara">
	  
	  
	  
<div class="title_box" >
<div id="title"><b>Kitap Ara<b></div>
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
								<th>Sayi</th><th>Kitap Adi</th><th>Yazari</th><th>Sayfa Sayisi</th><th>Türü</th>
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
							//echo "<td><input name='del' type=\"radio\" value=\" $a \"></td>";
							echo "</tr>";
							$x++;
							}
						}
						?>
						</table>
						<!--input type="submit" value="Delete BookCase" name="DELBOOKCASE" /-->
						</form></center>
</div>




	  </section>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  



	  
<!-- uzerimdekiler-->	  
 <section id="uzerimdekiler" class="hidden">	  
<div class="title_box" >
    <div id="title"><b> Üzerimdekiler <b></div>
    <div id="content">
	
						 
						<center>
						<table class="hovertable">
						<tr><th> Sayi </th><th> Kitap Adı </th><th> Yazarı </th><th> Sayfa Sayısı </th><th> Türü </th><th> Alınan Tarih </th></tr>

						<?php
						
						$x=1;
						
						$sorgu = mysqli_query($conn,  "select k.kitapAdi,k.yazar,k.sayfaSayisi,k.tur,ak.alinan_tarih from alinankitap ak, kitap k 
						where ak.kullanici_id=(select kul.id from kullanici kul where tc='$username') and 
						ak.kitap_id=k.id and ak.verilen_tarih is null" );

						if (!$sorgu) {
							echo "Veritabani Baglanti Hatasi" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($sorgu)) {
							echo "Üzerinde Kitap Yok";

						}
						else{
							while ($row = mysqli_fetch_assoc($sorgu)) {
							$c= $row["kitapAdi"];
							$d= $row["yazar"];
							$e= $row["sayfaSayisi"];
							$f= $row["tur"];
							$g= $row["alinan_tarih"];
								
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$x</td>";
							echo "<td>$c</td>";
							echo "<td>$d</td>";
							echo "<td>$e</td>";
							echo "<td>$f</td>";
							echo "<td>$g</td>";	
							echo "</tr>";
							$x++;
							}
						}
						?>
						</table></center>
			</div>
      </section>
	  
	  
	  
	  
	  



<!-- iadelerim-->	  
 <section id="iade" class="hidden">	  
<div class="title_box" >
    <div id="title"><b> İadelerim <b></div>
    <div id="content">
	
						 
						<center>
						<table class="hovertable">
						<tr><th> Sayi </th><th> Kitap Adı </th><th> Yazarı </th><th> Sayfa Sayısı </th><th> Türü </th><th> Alınan Tarih </th><th> İade Tarihi </th></tr>

						<?php
						
						$y=1;
						
						$sorgu = mysqli_query($conn,  "select k.kitapAdi,k.yazar,k.sayfaSayisi,k.tur,ak.alinan_tarih,ak.verilen_tarih from alinankitap ak, kitap k 
						where ak.kullanici_id=(select kul.id from kullanici kul where tc='$username') and 
						ak.kitap_id=k.id and ak.verilen_tarih is not null" );

						if (!$sorgu) {
							echo "Veritabani Baglanti Hatasi" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($sorgu)) {
							echo "İade Verilen Kitap Yok";

						}
						else{
							while ($row = mysqli_fetch_assoc($sorgu)) {
							$c= $row["kitapAdi"];
							$d= $row["yazar"];
							$e= $row["sayfaSayisi"];
							$f= $row["tur"];
							$g= $row["alinan_tarih"];
							$h= $row["verilen_tarih"];
								
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$y</td>";
							echo "<td>$c</td>";
							echo "<td>$d</td>";
							echo "<td>$e</td>";
							echo "<td>$f</td>";
							echo "<td>$g</td>";	
							echo "<td>$h</td>";	
							echo "</tr>";
							$y++;
							}
						}
						?>
						</table></center>
			</div>
      </section>
	  
	  
	  
	  
	  
	  
 
      

       <!-- hakkimda -->
      <section id="hakkimda" class="hidden">
        <p>Hakkımda</p>
        <?php
			
			/*
			$q1 = mysqli_query($conn, "SELECT ad FROM kullanici  WHERE tc=\"$username\" "  ) ;
    		$count1=mysqli_fetch_row($q1) ;
			$count1=$count1[0];
			
			$q1 = mysqli_query($conn, "SELECT soyad FROM kullanici  WHERE tc=\"$username\" " ) ;
    		$count2=mysqli_fetch_row($q1) ;
			$count2=$count1[0];
			
			$q1 = mysqli_query($conn, "SELECT tel FROM kullanici  WHERE tc=\"$username\" "  ) ;
    		$count3=mysqli_fetch_row($q1) ;
			$count3=$count1[0];
			
			$q1 = mysqli_query($conn, "SELECT email FROM kullanici  WHERE tc=\"$username\" "  ) ;
    		$count4=mysqli_fetch_row($q1) ;
			$count4=$count1[0];
			
			$q1 = mysqli_query($conn, "SELECT dogumtarihi FROM kullanici  WHERE tc=\"$username\" "  ) ;
    		$count5=mysqli_fetch_row($q1) ;
			$count5=$count1[0];
			
			$q1 = mysqli_query($conn, "SELECT adres FROM kullanici  WHERE tc=\"$username\" "  ) ;
    		$count6=mysqli_fetch_row($q1) ;
			$count6=$count1[0];
			
			*/
			$q1 = mysqli_query($conn, "SELECT * FROM kullanici  WHERE tc=\"$username\" "  ) ;
			$sonuc=mysqli_fetch_assoc($q1) ;
			$count1=$sonuc['ad'];
			$count2=$sonuc['soyad'];
			$count3=$sonuc['tel'];
			$count4=$sonuc['email'];
			$count5=$sonuc['dogumtarihi'];
			$count6=$sonuc['adres'];
			

		?>
		
		
        <p class="setting"><span>Tc : </span><?php echo $username; ?></p>
        
        <p class="setting"><span>Ad : </span> <?php echo $count1 ?></p>
        
        <p class="setting"><span>Soyad : </span> <?php echo $count2 ?></p>
		
        <p class="setting"><span>Telefon Numarası  : </span> <?php echo $count3 ?></p>

		<p class="setting"><span>Email Adresi : </span> <?php echo $count4 ?></p>
		
		<p class="setting"><span>Doğum Tarihi : </span> <?php echo $count5 ?></p>
		
		<p class="setting"><span>Adres : </span> <?php echo $count6 ?></p>
        
      </section>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
 <!-- ceza-->	  
 <section id="ceza" class="hidden">	  
<div class="title_box" >
    <div id="title"><b> Ceza Bilgilerim <b></div>
    <div id="content">
	
						 
						<center>
						<table class="hovertable">
						<tr><th> Geçen Gün Sayisi </th><th> Ceza </th></tr>

						<?php
						
						$kullanici_id_2="";
						$vertarih= "";
						$altarih= "";
							
						$sorgu = mysqli_query($conn,  "select * from kullanici where tc='$username'" );

						if (!$sorgu) {
							echo "Veritabani Baglanti Hatasi" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($sorgu)) {
							echo "Kullanici Hatasi ";

						}
						else{
							while ($row = mysqli_fetch_assoc($sorgu)) {
							$kullanici_id_2= $row["id"];
						
							}
						}
						$kullanici_id_2=trim($kullanici_id_2);
						$sorgu2 = mysqli_query($conn,  "select * from alinankitap where kullanici_id='$kullanici_id_2'" );
						if (!$sorgu2) {
							echo "Veritabani Baglanti Hatasi" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($sorgu2)) {
							echo "Kullanicinin Aldigi Kitap Yok ";

						}
						else{
							$ceza=0;
							$top_gun=0;
							while ($row = mysqli_fetch_assoc($sorgu2)) {
							$vertarih= $row["verilen_tarih"];
							$altarih= $row["alinan_tarih"];
							
							$vertarih= trim($vertarih);
							$altarih= trim($altarih);
							
							if($vertarih!=""){
							
							$tarih1= new DateTime($vertarih);
							$tarih2= new DateTime($altarih);
							$interval= $tarih1->diff($tarih2);
							$aradaki_gun=$interval->days;}
							
							else{
								$aradaki_gun=0;
							}
							
							if($aradaki_gun>20)
							{
								$top_gun+=($aradaki_gun-20);
								$ceza+=($aradaki_gun-20)*0.25;
								
								
							}
							
						
							}
							
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$top_gun</td>";
							echo "<td>$ceza";
							echo " TL";
							echo "</td>";
							echo "</tr>";
						}
						
												
						
						
						?>
						</table></center>
			</div>
      </section>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
<!-- gelen kutusu-->	  
 <section id="gelen_mesaj" class="hidden">	  
<div class="title_box" >
    <div id="title"><b> Gelen Kutusu <b></div>
    <div id="content">
	
						 
						<center>
						<table class="hovertable">
						<tr><th> Mesaj </th></tr>

						<?php
						
						
						$sorgu = mysqli_query($conn,  "select * from kullanici where tc='$username' " );

						if (!$sorgu) {
							echo "Veritabani Baglanti Hatasi" . mysql_error();
							exit;
						}
						if (!mysqli_num_rows($sorgu)) {
							echo "Kullanici Bulunamadi";

						}
						else{
							while ($row = mysqli_fetch_assoc($sorgu)) {
							$mesaj= $row["mesaj"];
							$mesaj=trim($mesaj);
							if($mesaj=="")
							{
								$yazdirilacak="Gelen Mesaj Yok";
							}
							else
							{
								$yazdirilacak=$mesaj;
							}
							
							
								
							echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
							echo "<td>$yazdirilacak</td>";				
							echo "</tr>";
							}
						}
						?>
						</table></center>
			</div>
      </section>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
    </div>
  </div>
  
  
<script type="text/javascript">
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