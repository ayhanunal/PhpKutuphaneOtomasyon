<?php  

	/*$conn = mysqli_connect('localhost', 'root', '123456', 'kutuphanedb'); 
	if (!$conn) {	
		echo "Bağlantı Hatası";
		
	}
	*/
	
	
	$host="localhost";
	$db="kutuphanedb";
	$user="root";
	$pass="123456";
	$conn=mysqli_connect($host,$user,$pass,$db);
	
	if (!$conn) {	 
		die("Bağlantı Hatası: " . mysqli_connect_error());
		
	}
?>