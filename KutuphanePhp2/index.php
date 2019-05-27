
	
	


<html >
  <head>
    <meta charset="UTF-8">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
	</head>

  
  
  
  <body>

    <div class="logmod">
  <div class="logmod__wrapper">

    <div class="logmod__container">
      <ul class="logmod__tabs">
        <li data-tabtar="lgm-2"><a href="#">Kullanici Girişi</a></li>
		<li data-tabtar="lgm-1"><a href="#">Yetkili Girişi</a></li>
      </ul>
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
        <div class="logmod__heading">
          <span class="logmod__heading-subtitle">Yetkili Giriş Yapmak İçin <strong>Tc ve Şifre Giriniz</strong></span>
        </div>
        <div class="logmod__form">
		
		
		
          <form accept-charset="utf-8"  class="simform" method="post" action="yetkili_login.php"  >
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Tc Kimlik Numaraniz *</label>
                <input name="email" class="string optional" maxlength="11" id="user-email" placeholder="TC" type="text" size="50" />
              </div>
            </div>
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-pw">Yetkili Sifreniz *</label>
                <input name="pass" class="string optional" maxlength="255" id="user-pw" placeholder="Sifre" type="password" size="50" />
                						<span class="hide-password">Göster</span>
              </div>
            </div>
            <div class="simform__actions">
              <input name="login" class="sumbit" name="commit" type="submit" value="Giriş Yap" />
              <span class="simform__actions-sidetext"></span>
            </div> 
          </form>
		  
		  
		  
		  
		  
		  
        </div> 
      </div>
	  
	  
      <div class="logmod__tab lgm-2">
        <div class="logmod__heading">
          <span class="logmod__heading-subtitle">Kullanıcı Girişi Yapmak İçin <strong>Tc ve Şifre Giriniz</strong></span>
        </div> 
        <div class="logmod__form">
		
		
		
		
          <form accept-charset="utf-8"  class="simform" method="post" action="kullanici_login.php"  >
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Tc Kimlik Numaraniz *</label>
                <input name="email" class="string optional" maxlength="11" id="user-email" placeholder="TC" type="text" size="50" />
              </div>
            </div>
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-pw">Kullanici Sifreniz *</label>
                <input name="pass" class="string optional" maxlength="255" id="user-pw" placeholder="Sifre" type="password" size="50" />
                						<span class="hide-password">Göster</span>
              </div>
            </div>
            <div class="simform__actions">
              <input name="login" class="sumbit" name="commit" type="submit" value="Giriş Yap" />
              <span class="simform__actions-sidetext"></span>
            </div> 
          </form>
		  


		  
		  
        </div> 
            </div>
      </div>
    </div>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>






