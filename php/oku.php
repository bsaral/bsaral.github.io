<?php
	 
	session_start();
	include("config.php");
	include("_header2.php");

	
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql_oku=mysql_query("select *from iletisim where id='$id'");
		if($sql_oku){
			echo"
			<div style='position:absolute;top:110px;left:5.5in;width:auto;width:9in;font-size:18px;'>";
			

			while($oku = mysql_fetch_array($sql_oku)){
				echo "
					<b> GÖNDEREN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>
					<input type='text' readonly = 'readonly' value=".$oku['isim']."><br><br>
					<b > E-MAİL ADRESİ &nbsp; <b>
					<input type='text' readonly = 'readonly' value=".$oku['mail']."><br><br>
					<b > TELEFON &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>
					<input type='text' readonly = 'readonly' value=".$oku['telefon']."><br><br>
					<b > KONU &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>
					<input type='text' readonly = 'readonly' value=".$oku['konu']."><br><br>
					<b > MESAJ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>
					<textarea rows='10' style='width:500px' readonly = 'readonly'>".$oku['mesaj']."</textarea><br><br><br>
					<div style='position:absolute;left:3in'>
					<a href='gelen_kutusu.php' class='btn btn-info'>GERİ DÖN</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href='delete.php?id=".$oku['id']."' class='btn btn-danger' style='width:55px;'>SİL</a></div>
					
					
				</div>";

			} 
		}
		else{
			echo "
				<div class = 'span7'>	
			
				<div class='alert alert-error' style = 'position:relative;top:100px;left:5in;font-size:20px;'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Kayıt Bulunamadı !
				</div></div>";
		}
	}
		
?>