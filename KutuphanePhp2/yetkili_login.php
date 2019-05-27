
<?php 
	include 'veritabani.php';

	
	
	
	
	if (mysqli_connect_errno()){
		echo "baglantı hatası: " . mysqli_connect_error();
	}

	
	if(isset($_POST['login'])){
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	$MD5pass=  md5($pass);
	$sel_user = "select * from yetkili where tc='$email' AND sifre='$pass'";
	$run_user = mysqli_query($conn, $sel_user);
	$check_user = mysqli_num_rows($run_user);
	if($check_user>0){
		setcookie("loggedin", 1, time()+3600); 
		setcookie("username", $email, time()+3600); 
		echo "<script>window.open('yetkili_sayfa.php','_self')</script>";
	}
	else {
		echo "<script>alert('Tc yada Sifre Yanlis')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*	
	ob_start();
	session_start();
	 
	$kadi = $_POST['email'];
	$sifre = $_POST['pass'];
	 
	$result = mysqli_query($conn,"select * from yetkili where tc='".$kadi."' and sifre='".$sifre."' ");
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 
	if(mysqli_num_rows($result)==1)  {
		$_SESSION["login"] = "true";
		$_SESSION["user"] = $kadi;
		$_SESSION["pass"] = $sifre;
		header("Location:yetkili_sayfa.php");
	}
	else {
		if($kadi=="" or $sifre=="") {
			echo "<script type='text/javascript'>alert('Lutfen kullanici adi ya da sifreyi bos birakmayiniz.');</script>";
			echo "<center><a href=javascript:history.back(-1)>Geri Don</a></center>";
		}
		else {
			echo "<script type='text/javascript'>alert('Kullanici Adi/Sifre Yanlis.');</script>";
			echo "<center><a href=javascript:history.back(-1)>Geri Don</a></center>";
		}
	}
	 
	ob_end_flush();
		
	*/
	
		
		
    ?>
	
	









