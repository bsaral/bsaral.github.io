<?php
	 
	session_start();
	include("_header2.php");
	include("config.php");

	
	if (!isset($_SESSION['name']))
		{
			header('Location: index.php');
		}
?>

<?php

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql_oku = mysql_query("SELECT *from proje where id='$id'");
	if($sql_oku){
		echo"
			<div class='hero-unit' style='position:absolute;top:130px;left:4.5in;width:auto;background-color:#f3edd2'>";
			while($oku = mysql_fetch_array($sql_oku)){
			echo "
				<form action=''  method='post' enctype='multipart/form-data'>
				<h3 style ='position: relative;left: 3in;top:-60px;font-weight:bold;'> PROJELER </h3><br>
				<div style ='position: relative;top: -0.5in;'>
					<div class='control-group '>
					  <b>PROJE<b><br><br>
					  <input type='text' name='p_name' placeholder='PROJE İSMİ' value=".$oku['p_name']." style ='width:3.2in;height:30px;'/><br/><br/>
					  <b >PROJE AÇIKLAMASI<b><br><br>
					  <textarea  name='content' class='ckeditor' value=".$oku['content']."></textarea><br/><br/>
					  <b style='position: absolute;left: 5in;top:0px'/>RESİM<b>
					  
					  <input type='file' name='dosya' id='dosya' value=".$oku['resim']."  style='position: absolute;left: 0in;top:60px'/>
					  

					</div>
					<br/><br>

					<input type='submit' name ='guncelle' value='GÜNCELLE' class = 'btn  btn-primary' style ='width:2in;height:50px;position:absolute;right: -0.3in;top:6in;'/><br/><br/>
					
				</div>
				</form>

			</div>";
		}
	}
}

else{
	echo"
		<div class='hero-unit' style='position:absolute;top:130px;left:4.5in;width:auto;background-color:#f3edd2'>
		<form action=''  method='post' enctype='multipart/form-data'>
				<h3 style ='position: relative;left: 3in;top:-60px;font-weight:bold;'> PROJELER </h3><br>
				<div style ='position: relative;top: -0.5in;'>
					<div class='control-group '>
					  <b>PROJE<b><br><br>
					  <input type='text' name='p_name' placeholder='PROJE İSMİ' style ='width:3.2in;height:30px;'/><br/><br/>
					  <b >PROJE AÇIKLAMASI<b><br><br>
					  <textarea  name='content' class='ckeditor'></textarea><br/><br/>
					  <b style='position: absolute;left: 5in;top:0px'/>RESİM<b>
					  
					  <input type='file' name='dosya' id='dosya' style='position: absolute;left: 0in;top:60px'/>
					  

					</div>
					<br/><br>

					<input type='submit' name ='ekle' value='EKLE' class = 'btn  btn-primary' style ='width:2in;height:50px;position:absolute;right: -0.3in;top:6in;'/><br/><br/>
					
				</div>
				</form>

			</div>";
		}

?>

<?php
if(isset($_POST['ekle'])){
	
	$dosyayolu = $_FILES['dosya']['tmp_name']; 
	$p_name = $_POST['p_name'];
	$content = $_POST['content'];
	$resim = "../img/upload/" . $_FILES['dosya']['name']; 

	if ($resim != ""){
		
		$copied = copy($_FILES['dosya']['tmp_name'], $resim);
	}
	
		
	if($p_name == "" || $content == "" ){
		echo "
			<div class = 'span8'>	
		
			<div class='alert alert-error' style = 'position:relative;top:70px;left:1in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Lütfen Yıldızlı Alanları Boş Bırakmayınız !
			</div></div>";
	}
	
	else {
		$sorgu = mysql_query("INSERT into proje(p_name,content,resim) values('$p_name','$content','$resim')");
		if($sorgu) {

			header('Location: proje_liste.php');
		}
		
		
		 else{
			echo "
				<div class = 'span7'>	
			
				<div class='alert alert-error' style = 'position:relative;top:-100px;left:3in;font-size:20px;'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Proje Girişi Yapılamadı !
				</div></div>";
				
				
				
		 }
	}
}

if(isset($_POST['guncelle'])){
	
	$dosyayolu = $_FILES['dosya']['tmp_name']; 
	$p_name = $_POST['p_name'];
	$content = $_POST['content'];
	$resim = "../img/upload/" . $_FILES['dosya']['name']; 

	if ($resim != ""){
		
		$copied = copy($_FILES['dosya']['tmp_name'], $resim);
	}
	
		
	if($p_name == "" || $content == "" ){
		echo "
			<div class = 'span8'>	
		
			<div class='alert alert-error' style = 'position:relative;top:70px;left:1in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Lütfen Yıldızlı Alanları Boş Bırakmayınız !
			</div></div>";
	}
	
	else {
		$sorgu = mysql_query("UPDATE proje SET p_name='$p_name', content='$content', resim='$resim' WHERE id='$id'");
		if($sorgu) {

			header('Location: proje_liste.php');
		}
		
		
		 else{
			echo "
				<div class = 'span7'>	
			
				<div class='alert alert-error' style = 'position:relative;top:-100px;left:3in;font-size:20px;'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Proje Güncellenemedi !
				</div></div>";
				
				
				
		 }
	}
}

?>