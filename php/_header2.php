<?php
   
  
  include("config.php");

  
  if (!isset($_SESSION['name']))
    {
      header('Location: index.php');
    }

 $sql = mysql_query ("SELECT * FROM iletisim  ");
 $count = mysql_num_rows(mysql_query("SELECT * FROM iletisim "));
 
?>


<!DOCTYPE html>
<meta CHARSEt=UTF-8>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" /> 
<script type="text/javascript" src="../ckeditor/ckeditor.js" > </script>
<script type="text/javascript" src="../ckfinder/ckfinder.js" > </script>
<title>Asilsan</title>

<div class="navbar  navbar-fixed-top">
	<div class="navbar-inner">
   	<div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <p class="brand" style = "position:absolute;left:1.6in;">ASİLSAN YÖNETİM PANELİ</p>
          <div class="nav-collapse collapse">
				<ul class="nav pull-right">
				<li><img  src="../img/admin1.png" style="position:relative;right:90px;"/></li>
     				<li><a href="#" style="color:white;position:relative;right:90px;top:5px;" ><?php echo $_SESSION['name']; ?></a> </li>
       			<li><a href="logout.php" style="position:relative;right:80px;top:3.5px;" >Çıkış</a></li>
  			 </ul>
			</div>
        </div>
      </div>
    </div>
    
    
<div class="container">
  <div class="span3" style="position:absolute;top:100px;left:100px;">
  <ul class="nav nav-list">
          <li class="nav-header" style="font-size:15px;">SAYFA YöNETİMİ</li><br>
          <li class="active"><a href="toplam_liste.php"><i class="icon-white icon-home"></i> Ana Sayfa</a></li><br>
          <li><a href="haber.php"><i class="icon-book"></i> Haber Sayfası</a></li><br>
          <li><a href="referans.php"><i class=" icon-folder-open"></i> Referans Sayfası</a></li><br>
          <li><a href="proje.php"><i class="icon-pencil"></i> Projeler Sayfası</a></li><br>
          
          <li class="nav-header" style="font-size:15px;">İLETİŞİM BİLGİLERİ</li><br>
          <li ><a href="gelen_kutusu.php"><i class=" icon-envelope"></i> Gelen Kutusu </a></li><br>
          <p style='position:absolute;top:2.9in;left:1.4in;background-color:red;width:15px;color:white;text-align:center'> <?php echo $count; ?></p> 
          <li><a href="#"><i class=" icon-briefcase"></i> İş Başvuruları</a></li><br>
          
          <li class="nav-header" style="font-size:15px;">HESAP BİLGİLERİ</li><br>
          <li  ><a href="hesap.php"><i class="icon-user"></i> Şifre Değiştir</a></li><br>
          <li><a href="logout.php"><i class="icon-off"></i> Oturumu Kapat</a></li><br>
          
          
  </ul>
 </div>
</div>    
    
    
    
<footer class="footer">
<div class="navbar ">
<div class="navbar-fixed-bottom">
	<div class="navbar-inner">
        <div class="container">
           <ul class="nav pull-right" >
           <div style = "position:absolute;top:10px;right:1.5in;width:4.5in;"><p style="color:white;">©2013 -<a href="http://www.linkedin.com/pub/bet%C3%BCl-saral/36/837/767" style="color:white;"> Betül SARAL </a></div>
          </ul>
          
        </div>
      </div>
    </div>
  </div>    
</footer>
