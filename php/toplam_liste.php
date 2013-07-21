<?php
	 
	session_start();
	include("_header2.php");
	include("config.php");

	
	if (!isset($_SESSION['name']))
		{
			header('Location: index.php');
		}

	$sql = mysql_query ("SELECT * FROM news ORDER BY id DESC LIMIT 0,4 ");
	$count = mysql_query("SELECT count(*) FROM news");

	$sql2 = mysql_query ("SELECT * FROM referans ORDER BY id DESC LIMIT 0,4 ");
	$count2 = mysql_query("SELECT count(*) FROM referans");

	$sql3 = mysql_query ("SELECT * FROM proje ORDER BY id DESC LIMIT 0,4 ");
	$count3 = mysql_query("SELECT count(*) FROM proje");

	$num = 0;
?>



<div  style="position:absolute;top:100px;left:5in;width:9in;font-size:18px;">

	<!-- HABERLER TABLOSU -->

<table class="table table-bordered table-striped table-hover"  cellpadding="3">
	
	<thead>
	<B ><tr ><th colspan="7" style ="text-align:center;background-color:#d9edf7"> HABERLER TABLOSU</th></tr></B>
	
		
	<tr class="error">
		
		<th width="200" style ="background-color:#f3edd2"> HABER BAŞLIĞI </th>
		<th style ="background-color:#f3edd2"> HABER </th>
		<th style ="background-color:#f3edd2"> RESİM </th>
		<th width="30" style="background-color:#f3edd2"> </th>
		<th  width="30" style="background-color:#f3edd2"> </th>
	</tr>
</thead>
	<?php 
	if($count != 0)
	{
    while($satir = mysql_fetch_array($sql))
	{
    echo "<tr >
    	
		<td >".$satir['title']. "</td>
		<td >".$satir['haber']. "</td>
		<td ><img src=".$satir['image']." style='width:100px;height:60px;'></td>
		<td><a href='delete.php?title=".$satir['title']."' class='btn btn-danger' > SİL</a></td>
		<td><a href='haber.php?id=".$satir['id']."' class='btn btn-info'>DÜZENLE</a></td>
	</tr>";
	}
	
	}else{
		echo "
			<div class = 'span7'>	
		
			<div class='alert alert-error' style = 'position:relative;top:-100px;left:2.7in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Haberler Tablosunda Hiç Kayıt Bulunmamaktadır !
			</div></div>";
	}
	?>
</table><br><br><br>
<a href='haber_liste.php' style='margin-left:350px;margin-top:-80px;height:30px;'  class='btn  btn-success' > TÜM HABER LİSTELERİ</a><br><br><br>

			<!-- REFERANS TABLOSU -->

<table class="table table-bordered table-striped table-hover">
	
	<thead>
	<B ><tr > <th colspan="8" style ="text-align:center;background-color:#d9edf7"> REFERANSLAR TABLOSU</th></tr></B>
	<tr class="error">
		
		<th style ="background-color:#f3edd2"> YER </th>
		<th style ="background-color:#f3edd2"> PROJE </th>
		<th style ="background-color:#f3edd2"> FİRMA </th>
		<th style ="background-color:#f3edd2"> TESLİM </th>
		<th style ="background-color:#f3edd2"> RESİM </th>
		<th  width="30" style="background-color:#f3edd2"> </th>
		<th width="30" style="background-color:#f3edd2"> </th>

	</tr>
	<?php 
	if($count != 0)
	{
    while($satir = mysql_fetch_array($sql2))
	{
    echo "<tr >
    	
		<td>".$satir['yer']. "</td>
		<td>".$satir['proje']. "</td>
		<td>".$satir['firma']. "</td>
		<td>".$satir['tarih']. "</td>
		<td><img src=".$satir['resim']." style='width:100px;height:60px;'></td>
		<td><a href='delete.php?proje=".$satir['proje']."' class='btn btn-danger'>SİL</a></td>
		<td><a href='referans.php?id=".$satir['id']."' class='btn btn-info'>DÜZENLE</a></td>
	</tr>";
	}
	
	}
	else{
		echo "
			<div class = 'span7'>	
		
			<div class='alert alert-error' style = 'position:relative;top:-100px;left:2.7in;font-size:20px;'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong>Dikkat !   </strong>&nbsp;&nbsp;&nbsp;Referans Tablosunda Hiç Kayıt Bulunmamaktadır !
			</div></div>";
	}
	
	?>
</table><br><br><br>
<a href='referans_liste.php' style='margin-left:350px;margin-top:-80px;height:30px;'  class='btn  btn-success' > TÜM REFERANS LİSTELERİ</a><br><br><br>

		<!-- PROJELER TABLOSU -->

<table class="table table-bordered table-striped table-hover">
	
	<thead>
	<B ><tr > <th colspan="7" style ="text-align:center;background-color:#d9edf7"> PROJELER TABLOSU</th></tr></B>
	<tr class="error">
		
		<th style ="background-color:#f3edd2"> PROJE İSMİ </th>
		<th style ="background-color:#f3edd2"> PROJE AÇIKLAMASI </th>
		<th style ="background-color:#f3edd2"> PROJE RESMİ </th>
		<th width="30" style="background-color:#f3edd2"> </th>
		<th width="30" style="background-color:#f3edd2"> </th>
	</tr>
	<?php 
	if($count != 0)
	{
    while($satir = mysql_fetch_array($sql3))
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
<a href='proje_liste.php' style='margin-left:370px;margin-top:-80px;height:30px;'  class='btn  btn-success' > TÜM PROJE LİSTELERİ</a><br><br><br>
</div>