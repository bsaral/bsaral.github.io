---
layout: post
title: "Grub Ayarlarının Değiştirilmesi"
date: 2011-07-29 22:39
comments: true
categories: Teknik
---

<li><a href="#GRUB"> GRUB Nedir?</a></li>
<li><a href="#WİN-UBUNTU"> Windows-Ubuntu Kurulu Bilgisayarlarda Ayarlar</a></li>
<li><a href="#WİN-PARDUS"> Windows-Pardus Kurulu Bilgisayarlarda Ayarlar</a></li>

###<a id="GRUB"> 1- GRUB Nedir? </a>

GRUB, bir bilgisayarda yüklü bulunan bir ya da birden fazla işletim sisteminin ön yükleme görevini yerine getiren bir ön yükleme yazılımıdır.Daha açık bir ifadeyle, bilgisayarı her açtığınızda karşınıza gelen işletim sistemi seçme ekranı GRUB'un ta kendisidir.

<img src="/images/grub.png"/>

###<a id="WİN-UBUNTU"> 2- Windows-Ubuntu Kurulu Bilgisayarlarda Ayarlar </a>

Eğer ki Windows ile birlikte Ubuntuyu kurmuşsanız;

Bilgisayar açılırken sunulan seçenekte Windows’un veya Ubuntu’nun ilk sırada yer almasını istiyorsanız aşağıda yazılan kodlar size yardımcı olucaktır.

İlk önce terminalimizi açıyoruz ve kodumuzu yazıyoruz.
{% codeblock Terminal lang:sh %}
$ sudo gedit /etc/default/grub 
{% endcodeblock %}
Gelen bilgilerden default değerini değiştirmeniz yeterli olacaktır.default değeri size 0 olarak görünüyor olabilir.

<img src="/images/10.png"/>

siz istediğiniz gibi değiştirebilirsiniz.eğer windowsu o sırada yapmak istiyorsanız ve GRUB ekranında (0 dan başlayarak) 3.sırada ise default değerini 3 yazmanız yeterli olur.

###<a id="WİN-PARDUS"> 3- Windows-Pardus Kurulu Bilgisayarlarda Ayarlar </a>

Eğer ki Windows ile birlikte Ubuntuyu kurmuşsanız;

Alt+F2 yaparak komut çalıştırı açın ve şu kodu yazın:
{% codeblock Terminal lang:sh %}
$ kdesu kwrite /boot/grub/grub.conf  
{% endcodeblock %}
Ubuntu da yaptığımız gibi açılan pencerede ki default değerini istediğiniz gibi değiştirmeniz yeterli olur.
Bilgisayarı yeniden başlattığınızda yaptığnız işlemleri görebilirsiniz.
