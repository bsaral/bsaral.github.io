---
layout: post
title: "HTML-PHP-MYSQL İle Form Tasarlamak"
date: 2011-12-22 22:38
comments: true
categories: Teknik 
---

Amacımız kullanıcı kaydı tutan bir web formu ve bu formdan bilgi alıcak bir php dosyası oluşturup , Php
dosyası içerisinde ki bilgileri veri tabanına aktarımını sağlayan tasarımı oluşturmaktır.İlk önce web formumuzu yapalım :
{% codeblock  lang:html %}
<html>
<head>
<META http-equiv=content-type content=text/html;charset=UTF-8>
<title>   PHP-MYSQL   </title>
</head>
<body>
<form action="form.php" method="post">
İSMİNİZ 
<input type="text" name="isim"/><br>
PAROLANIZ 
<input type="password" name="par"/><br>
MAİL ADRESİNİZ
<input type="text" name="mail"/><br>
			
<input type="submit" value="GONDER"/>
</form>

</body>
</html>
{% endcodeblock %}				
En basit haliyle kullanıcı için bir web formu oluşturduk. Daha sonra bu formdan bilgileri alıcak ve veri tabanına aktarımını sağlayacak
olan PHP dosyamızı oluşturalım :
{% codeblock  lang:php %}
<META http-equiv=content-type content=text/html;charset=UTF-8>

<?php

//mysql e bağlanma kısmı
$baglan=mysql_connect("localhost","KULLANICI ADINIZ","KULLANICI ŞİFRENİZ") 
or die ("veri tabanına bağlanamadı.");
if(!$baglan){
	die ("veritabanına bağlanılmadı.".mysql_error());
}

//kaydet adında veri tabanınızı oluşturur.
//(eğer kayıtlı veri tabanlarınızdan herhangi biri "kaydet" isminde değil ise).
$veri=mysql_query("create database if not exists kaydet",$baglan);
if ($veri){
	echo "veritabanı oluşturuldu.";}
else {
	echo "hata".mysql_error();}
	
	
//veri tabanı seçilir.
mysql_select_db("kaydet") or die ("hata2");

//kaydet adlı veritabanı içinde form adlı tablo varsa silinir.
mysql_query("drop table if exists form") or die ("hata3");
// ve yenisi oluşturulur.
mysql_query("create table form(
isim varchar(30),
parola char(100) primary key,
mail text(150))") or die ("hata4");

//htm dosyasından aldığı verileri POST metodu ile veri tabanına aktarır.
mysql_query("insert into form (isim,parola,mail) values 
('$_POST[isim]','$_POST[par]','$_POST[mail]')") 
or die ("hata5".mysql_error());




mysql_close($baglan);
	
?>
{% endcodeblock %}	
Eğer herşeyi doğru yapmışsanız kullanıcı form da bilgileri girdikten sonra ekrana "veri tabanı oluşturuldu" şeklinde bir yazı gelir.
ekranda herhangi bir "hata" şeklinde yazı alıyorsanız yukardaki "hata" yazan kod sırasının herhangi birinde yanlış demektir.

form.htm için:
<a href = "https://gist.github.com/1511957"> https://gist.github.com/1511957 </a>

form.php için :
<a href ="https://gist.github.com/1511960"> https://gist.github.com/1511960 </a>
