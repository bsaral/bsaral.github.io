<?php
	 
	session_start();
	include("_header2.php");
	include("config.php");

	
	if (!isset($_SESSION['name']))
		{
			header('Location: index.php');
		}
	$sql = mysql_query ("SELECT * FROM proje ORDER BY id DESC ");
	$count = mysql_query("SELECT count(*) FROM proje");
	$num = 0;
?>

<div  style="position:absolute;top:100px;left:5in;width:9in;font-size:18px;">
<table class="table table-bordered table-striped table-hover">
	<tr class="error">
		
		<th style ="background-color:#d9edf7"> PROJE İSMİ </th>
		<th style ="background-color:#d9edf7"> PROJE AÇIKLAMASI </th>
		<th style ="background-color:#d9edf7"> PROJE RESMİ </th>
		<th width="30" style="background-color:#d9edf7"> </th>
		<th width="30" style="background-color:#d9edf7"> </th>
	</tr>
	<?php 
	if($count != 0)
	{
    while($satir = mysql_fetch_array($sql))
	{
    echo "<tr >
		
		<td>".$satir['p_name']. "</td>
		<td>".$satir['content']. "</td>
		<td><img src=".$satir['resim']." style='width:100px;height:60px;'></td>
		<td><a href='delete.php?p_name=".$satir['p_name']."' class='btn btn-danger'>SİL</a></td>
		<td><a href='proje.php?id=".$satir['id']."' class='btn btn-info'>DÜZENLE</a></td>
	</tr>";
	}
	
	}else{
		echo "
			<div class = 'span7'>	
		
			<div class='alert alert-error' style = 'position:relative;top:-100px;left:2.7in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Hiç Kayıt Bulunmamaktadır !
			</div></div>";
	}
	?>
</table>
<br><br><br>
<a href='toplam_liste.php' style='margin-left:300px;margin-top:-80px;height:30px;'  class='btn  btn-warning' > TÜM LİSTELER</a>
<a href='proje.php' style='margin-left:500px;margin-top:-120px;height:30px;'  class='btn  btn-success' > PROJE EKLE</a><br><br><br>
</div>