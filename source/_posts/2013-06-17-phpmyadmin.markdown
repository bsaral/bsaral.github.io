---
layout: post
title: "Phpmyadmin 404 hatası"
date: 2012-12-28 22:39
comments: true
categories: Teknik 
---

Yerelinizde (http://localhost/phpmyadmin) phpmyadmin'i çalıştırdığınız da aşağıdaki gibi bir hata alıyorsarsanız ;


<code> The requested URL /phpmyadmin was not found on this server. </code>

şu kodları terminalde çalıştırarak bu problemi halledebilirsiniz.

{% codeblock Terminal lang:sh %}

$ sudo dpkg-reconfigure -plow phpmyadmin 

$ sudo ln -s /etc/phpmyadmin/apache.conf /etc/apache2/conf.d/phpmyadmin.conf

$ sudo /etc/init.d/apache2 reload
{% endcodeblock %}
