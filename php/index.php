<?php

	include("_header.php");
	include("config.php");
	session_start();

	if(isset($_SESSION['name']))
		{
			header('Location: toplam_liste.php');
		}
	
?>


    
	<div class = "container">
	<div class = "span6">	


	<div class = "hero-unit" style ="position: relative;left: 2.5in;top:1.5in;height: 3in;background-color:#f3edd2" >
	<form action=""  method="post">
	<h3 style ="position: relative;left: 1.2in;top:-60px"> GİRİŞ YAP </h3><br>
	<div style ="position: relative;top: -0.5in;">
		<div class="control-group ">

		  <input type="text" name="name" placeholder="KULLANICI ADI" style ="width:3.2in;height:30px;"/><br/><br/>
		  <input type="password" name="password" placeholder="PAROLA" style ="width:3.2in;height:30px;"/><br/><br/>

		</div>
		<br/><br>

		<input type="submit" name="gonder2" value="GÖNDER" class = "btn  btn-primary" style ="width:2in;height:50px;position: relative;left: -0.4in;top:0px;"/>
		<input type="reset" name="reset" class = "btn  btn-danger"  style ="width:2in;height:50px;position: relative;left: 1.9in;top:-50px" value="RESET">
	</div>
	</form>
	</div>
	</div>
</div>    
    
<?php
if(isset($_POST['gonder2'])){
$login = mysql_query("SELECT * FROM users WHERE (name = '" . mysql_real_escape_string($_POST['name']) . "') and (password = '" . mysql_real_escape_string($_POST['password']) . "')");
	
	if (mysql_num_rows($login) == 1)
		{
			
			$_SESSION['name'] = $_POST['name'];
			
			header('Location: toplam_liste.php');
		}
	else 
		{
			
			echo "
			<div class = 'span7'>	
		
			<div class='alert alert-error' style = 'position:relative;top:-4in;left:5.1in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Kullanıcı Adı veya Parola Hatası !
			</div></div>";
		}
}
?>
    
    
    
