---
layout: post
title: "Ubuntu da Kullanıcı Şifresinin Unutulması"
date: 2011-06-27 22:39
comments: true
categories: Teknik
---

Kullanıcı şifresi unutulduysa,ilk yapmanız gereken sisteminizi kurtarma modunda (Recovery Mode) yani GRUB menüsünün 2.seçeneğinden başlatmak olacaktır.sistem açıldığında karşınıza bir pencere çıkar.bu pencerenin en sonunda bulunan "root kullanıcısı olarak uçbirimi aç" seçeneğini tercih edin.altta uçbirim açılır.uçbirime ilk olarak

{% codeblock Terminal lang:sh %}
$ passwd KULLANICI_ADINIZ
{% endcodeblock %}

yazıp ENTER a basın.bu kodu yazdıktan sonra sizden yeni şifrenizi girmenizi isteyecektir.şifreyi girdikten sonra
{% codeblock Terminal lang:sh %}
$ reboot 
{% endcodeblock %}

yazıp ENTER a bastığınızda işleminiz tamamlanmış olur.
