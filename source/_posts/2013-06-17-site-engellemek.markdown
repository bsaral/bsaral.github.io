---
layout: post
title: "Site Engellemek Ve Engellemeleri Kaldırmak"
date: 2011-06-09 22:15
comments: true
categories: Teknik
---

###<a id="site-engelleme"> SİTE ENGELLEME </a> 

engellemek istediğimiz site <code>omu.edu.tr</code> olsun.

{% codeblock Terminal lang:sh %}

$ sudo gedit /etc/hosts 
{% endcodeblock %}
komutunu yazarak hosts dosyamızı açıyoruz.

açılan dosyaya sitenin IP adresini ve kendisini aşağıdaki gibi ekliyoruz.

       
    0.0.0.0 *.omu.edu.tr        



bu şekilde düzenlediğimizde omu'nun IP adresi <code>0.0.0.0 </code> olmadığından bağlantı hatası verecek yani siteye giriş engellenmiş olunacaktır.eğer sitenin engellenmesini kaldırıp tekrar eski haline döndürmek
istiyorsanız hosts dosyasında yazdığınız sitenin IP adresini ve kendisini silmeniz yeterlidir.

<img src="/images/2.png"/>



###<a id="engel-kaldir"> ENGELLENEN SİTEYE GİRİŞ </a> 

DNS değişikliği yapılmadan yasaklanmış siteler arasından sadece seçtiğiniz sitelere girmek için bu yöntem uygulanır.

ilk önce sitenin IP adresi öğrenilir.(örn: yasaklı sitemiz <code> omu.edu.tr</code> olsun.)

{% codeblock Terminal lang:sh %}

$ ping -c 1 www.omu.edu.tr 
{% endcodeblock %}
komutunu yazdığımızda siteye 1 adet ping göndermiş oluruz.

<img src="/images/3.png"/>

sonra hosts dosyası açılır.
{% codeblock Terminal lang:sh %}
$ sudo gedit /etc/hosts 
{% endcodeblock %}
ve IP adresleri eklenir.

           
    193.140.28.7 *.omu.edu.tr

kaydedip çıktıktan sonra yasaklı sitemize ulaşabilir duruma gelmiş oluruz.
