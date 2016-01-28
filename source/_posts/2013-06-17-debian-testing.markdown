---
layout: post
title: "Debian Testing Grafik Arayüzü Oluşturma"
date: 2012-03-02 22:15
comments: true
categories: Teknik 
---

Temel kurulumu başarılı bir şekilde tamamlamış olduğunuzu ve sistemi başlattığınızda aşağıdaki gibi bir görüntü elde ettiğinizi varsayıyorum.

<img src="/images/debian.gif"/>

Grafik arayüzüne geçilmesi için 3 komutun kullanılır.
{% codeblock Terminal lang:sh %}

$ apt-get install x-window-system  

$ apt-get install gdm 
{% endcodeblock %}
Bu komut ile Gnome Desktop Manager kurulacak. Gdm bizim oturum açmamız için kullanıcı adı ve şifre gireceğimiz güzel bir grafik karşılayıcıdır.
{% codeblock Terminal lang:sh %}
$ apt-get install gnome 
{% endcodeblock %}
Bu komut ile Gnome grafik ortamı ve beraberindeki uygulamaları kuracağız.

Eğer grafik ortamını KDE olmasını;
{% codeblock Terminal lang:sh %}
$ apt-get install kde 
{% endcodeblock %}
yada XFCE olmasını istiyorsanız :
{% codeblock Terminal lang:sh %}
$ apt-get install xfce4 
{% endcodeblock %}
komutlarını kullanabilirsiniz.

Kurulum işlemleri bittikten sonra <b> gdm </b> yazarak grafik ortamına geçebiliriz.

<h4> UYARI ! </h4> 

Eğer komutları yazdığınızda "Debian E:unable to locate package sorunu" şeklinde hatalar alıyorsanız çözüme
<a href = "http://mogutcan.github.com/902/Debian-E:-unable-to-locate-package-sorunu/"> buradan </a> ulaşabilirsiniz.

<h4> UYARI-2 ! </h4> 
Sistemde gedit,vim şeklinde editörleriniz bulunmuyorsa nano editörünü kullanarak işlerinizi halledebilirsiniz.

<h4> NOT : </h4>
Eğer yapılan değişikleri geri almak,kaldırmak istiyorsanız (örn:gnome grafik ortamını kaldıralım) ;
<code> $ apt-get remove gnome </code> kodu ile halledebilirsiniz.

