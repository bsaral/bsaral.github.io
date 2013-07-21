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
	$sql_oku = mysql_query("SELECT *from referans where id='$id'");
	if($sql_oku){
		echo "
			<div class='hero-unit' style='position:absolute;top:130px;left:4.5in;width:auto;background-color:#f3edd2'>";
			while($oku = mysql_fetch_array($sql_oku)){
				echo "
				<form action=''  method='post' enctype='multipart/form-data'>
					<h3 style ='position: relative;left: 3in;top:-60px;font-weight:bold;'> REFERANS </h3><br>
					<div style ='position: relative;top: -0.5in;'>
						<div class='control-group '>
						  <input type='text' name='yer' placeholder='PROJENİN YAPILDIĞI ŞEHİR *' value=".$oku['yer']."  style ='width:3.2in;height:30px;'/>
						  <input type='text' name='proje' placeholder='PROJENİN İSMİ *' value=".$oku['proje']."  style ='width:3.2in;height:30px;margin-left:80px;'/><br/><br/>
						  <input type='text' name='firma' placeholder='FİRMA İSMİ *' value=".$oku['firma']."  style ='width:3.2in;height:30px;'/>
						  <input type='text' name='tarih' placeholder='TESLİM TARİHİ *' value=".$oku['tarih']."  style ='width:3.2in;height:30px;margin-left:80px;'/><br/><br/>
						  <b style='position: absolute;left: 3in;top:1.7in'/>RESİM<b>
						  
						  <input type='file' name='dosya' id='dosya'  style='position: absolute;left: 0in;top:40px'/>
						  <input type='submit' name ='guncelle' value='GÜNCELLE' class = 'btn  btn-primary' style ='width:2in;height:50px;position:absolute;left: -0.2in;top:1.8in;'/><br/><br/>

						</div>
						<br/><br>

						
						
					</div>
					</form>

				</div> ";
			}
		}
	}

	else{
		echo "
			<div class='hero-unit' style='position:absolute;top:130px;left:4.5in;width:auto;background-color:#f3edd2'>
				<form action=''  method='post' enctype='multipart/form-data'>
					<h3 style ='position: relative;left: 3in;top:-60px;font-weight:bold;'> REFERANS </h3><br>
					<div style ='position: relative;top: -0.5in;'>
						<div class='control-group '>
						  <input type='text' name='yer' placeholder='PROJENİN YAPILDIĞI ŞEHİR *' style ='width:3.2in;height:30px;'/>
						  <input type='text' name='proje' placeholder='PROJENİN İSMİ *' style ='width:3.2in;height:30px;margin-left:80px;'/><br/><br/>
						  <input type='text' name='firma' placeholder='FİRMA İSMİ *' style ='width:3.2in;height:30px;'/>
						  <input type='text' name='tarih' placeholder='TESLİM TARİHİ *' style ='width:3.2in;height:30px;margin-left:80px;'/><br/><br/>
						  <b style='position: absolute;left: 3in;top:1.7in'/>RESİM<b>
						  
						  <input type='file' name='dosya' id='dosya'  style='position: absolute;left: 0in;top:40px'/>
						  <input type='submit' name ='ekle' value='EKLE' class = 'btn  btn-primary' style ='width:2in;height:50px;position:absolute;left: -0.2in;top:1.8in;'/><br/><br/>

						</div>
						<br/><br>

						
						
					</div>
					</form>

				</div> ";
			}
?>

<?php
if(isset($_POST['ekle'])){
	
	$dosyayolu = $_FILES['dosya']['tmp_name']; 
	$yer = $_POST['yer'];
	$proje = $_POST['proje'];
	$firma = $_POST['firma'];
	$tarih = $_POST['tarih'];
	$resim = "../img/upload/" . $_FILES['dosya']['name']; 

	if ($resim != ""){
		
		$copied = copy($_FILES['dosya']['tmp_name'], $resim);
	}
	
		
	if($yer == "" || $proje == "" || $firma == ""|| $tarih == ""){
		echo "
			<div class = 'span8'>	
		
			<div class='alert alert-error' style = 'position:relative;top:-100px;left:2.7in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Lütfen Yıldızlı Alanları Boş Bırakmayınız !
			</div></div>";
	}
	
	else {
		$sorgu = mysql_query("insert into referans(yer,proje,firma,tarih,resim) values('$yer','$proje','$firma','$tarih','$resim')");
		if($sorgu) {

			header('Location: referans_liste.php');
		}
		
		
		 else{
			echo "
				<div class = 'span7'>	
			
				<div class='alert alert-error' style = 'position:relative;top:-100px;left:3in;font-size:20px;'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Referans Girişi Yapılamadı !
				</div></div>";
				
				
				
		 }
	}
}

if(isset($_POST['guncelle'])){
	
	$dosyayolu = $_FILES['dosya']['tmp_name']; 
	$yer = $_POST['yer'];
	$proje = $_POST['proje'];
	$firma = $_POST['firma'];
	$tarih = $_POST['tarih'];
	$resim = "../img/upload/" . $_FILES['dosya']['name']; 

	if ($resim != ""){
		
		$copied = copy($_FILES['dosya']['tmp_name'], $resim);
	}
	
		
	if($yer == "" || $proje == "" || $firma == ""|| $tarih == ""){
		echo "
			<div class = 'span8'>	
		
			<div class='alert alert-error' style = 'position:relative;top:-100px;left:2.7in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Lütfen Yıldızlı Alanları Boş Bırakmayınız !
			</div></div>";
	}
	
	else {
		$sorgu = mysql_query("UPDATE referans SET yer='$yer', proje='$proje', firma='$firma', tarih='$tarih', resim='$resim' WHERE id='$id'");
		if($sorgu) {

			header('Location: referans_liste.php');
		}
		
		
		 else{
			echo "
				<div class = 'span7'>	
			
				<div class='alert alert-error' style = 'position:relative;top:-100px;left:3in;font-size:20px;'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Referans Güncellenemedi !
				</div></div>";
				
				
				
		  	}
	 	}
	} 


?>