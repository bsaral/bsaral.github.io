<?php
	 
	session_start();
	include("config.php");

	
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql_sil=mysql_query("delete from iletisim where id='$id'");
		if($sql_sil){
			header('Location: gelen_kutusu.php');
		}
	}

	if(isset($_GET['title'])){
		$title=$_GET['title'];
		$haber_sil=mysql_query("delete from news where title='$title'");
		if($haber_sil){
			header('Location: toplam_liste.php');
		}
		
	}

	if(isset($_GET['proje'])){
		$proje=$_GET['proje'];
		$referans_sil=mysql_query("delete from referans where proje='$proje'");
		if($referans_sil){
			header('Location: toplam_liste.php');
		}
		
	}

	if(isset($_GET['p_name'])){
		$p_name=$_GET['p_name'];
		$proje_sil=mysql_query("delete from proje where p_name='$p_name'");
		if($proje_sil){
			header('Location: toplam_liste.php');
		}
		
	}
		
?>