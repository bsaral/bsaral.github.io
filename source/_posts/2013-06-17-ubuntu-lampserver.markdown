---
layout: post
title: "Ubuntuda LAMP Server Kurulumu"
date: 2011-12-20 22:38
comments: true
categories: Teknik
---

Linux ' ta yapılan web sitelerini yayınlamak amacıyla PHP+Apache+Mysql üçlüsü
gereklidir.Bunları sisteme ayrı ayrı kurmak mümkündür. Fakat Ubuntu ve diğer
birçok Linux dağıtımlarında bu iş için LAMP(Linux, Apache, Mysql, Php) paketi geliştirilmiştir.
Şimdi terminali açıp sırayla aşağıdaki kodları girelim :
{% codeblock Terminal lang:sh %}
$ sudo apt-get install tasksel
{% endcodeblock %}

{% codeblock Terminal lang:sh %}
$ sudo tasksel install lamp-server
{% endcodeblock %}
{% codeblock Terminal lang:sh %}
$ sudo apt-get install phpmyadmin
{% endcodeblock %}		
		
son kod yazıldıktan sonra phpmyadmin kurulumu gerçekleşmeye başlar.ilk olarak karşınıza [E-H]
seçeneği gelir E ye basarak devam edin. Daha sonra karşınıza iki seçeneğin çıktığı bi ekran
gelir burda Apache2 yi seçerek devam edin.son olarak sizden şifre girmenizi isteyecektir.şifre girebilir
ya da boş bırakıp ENTER a basarak devam edebilirsiniz.

{% codeblock Terminal lang:sh %}
$ sudo chmod 0777 /var/www/
{% endcodeblock %}		

Bu kodu da yazdıktan sonra var/www/ (yani burası localhostumuzun klasörüdür.) klasörünün içine
deneme.php adlı yeni bi belge açın ve aşağıdaki kodları girin :

{% codeblock var/www/deneme.php lang:php %}
<?php
	echo 	"merhaba";
?>
{% endcodeblock %}
	
Yazıp kaydettikten sonra web tarayıcınız da <code> http://localhost/deneme.php </code> yazın.Eğer sayfanız açılıyorsa
LAMP server başarıyla kurulmuş demektir.
