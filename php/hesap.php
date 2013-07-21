<?php
	 
	session_start();
	include("_header2.php");
	include("config.php");	

	
	if (!isset($_SESSION['name']))
		{
			header('Location: index.php');
		}
?>

<div class="hero-unit" style="position:absolute;top:120px;left:6in;width:auto;background-color:#f3edd2">
<form action=""  method="post">
	<h3 style ="position: relative;left: 1in;top:-60px"> PAROLA DEĞİŞTiR </h3><br>
	<div style ="position: relative;top: -0.5in;">
		<div class="control-group ">

		  <input type="text" name="old" placeholder="ESKİ PAROLA" style ="width:3.5in;height:30px;"/><br/><br/>
		  <input type="password" name="new" placeholder="YENİ PAROLA" style ="width:3.5in;height:30px;"/><br/><br/>
		  <input type="password" name="newa" placeholder="YENİ PAROLA(*TEKRAR)" style ="width:3.5in;height:30px;"/><br/><br/>

		</div>
		<br/><br>

		<input type="submit" name ="gonder" value="DEĞİŞTİR" class = "btn  btn-primary" style ="width:2in;height:50px;position:absolute;left: 0.8in;top:2.5in;"/>
		
	</div>
	</form>

</div>

<?php

if(isset($_POST['gonder'])){
	$name = mysql_real_escape_string($_SESSION['name']);
	$new = mysql_real_escape_string($_POST['new']);
	$newa =mysql_real_escape_string($_POST['newa']);
	$old = mysql_real_escape_string($_POST['old']);
	$result=mysql_query ("SELECT name FROM users WHERE name='$name'"); 

	if(!$result){
		echo "<h1>hata var</h1>";
		}
		
	else {
		$sql = mysql_query ("SELECT password FROM users WHERE name='$name'");
		$print = mysql_fetch_assoc($sql) ;
		
		if($old != $print['password']) {
			echo "
			<div class = 'span7'>	
		
			<div class='alert alert-error' style = 'position:relative;top:50px;left:5.5in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Eski Parola Yanlış Girildi !
			</div></div>";
			
			
			}
		
		else if($_POST['new']!=$_POST['newa']){
			echo "
			<div class = 'span7'>	
		
			<div class='alert alert-error' style = 'position:relative;top:50px;left:5.5in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !</strong>&nbsp;&nbsp;&nbsp;Parola Eşleşme Hatası Var !
			</div></div>";
			
			}
			
		else if($_POST['new']== "" ){
			echo "
			<div class = 'span7'>	
		
			<div class='alert alert-error' style = 'position:relative;top:50px;left:5.5in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !</strong>&nbsp;&nbsp;&nbsp;Parola Kısmını Boş Bırakmayın !
			</div></div>";
			
			}
			
		else{
			$sql=mysql_query("UPDATE users SET password='$new' where name='$name'") ; 
			if($sql) {
				echo "
				<div class = 'span7'>	
		
				<div class='alert alert-success' style = 'position:relative;top:50px;left:5.5in;font-size:20px;'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Dikkat !</strong>&nbsp;&nbsp;&nbsp;Parolanız Başarıyla Güncellenmiştir !
				</div></div>";
			
			}
			}
	}
}
?>