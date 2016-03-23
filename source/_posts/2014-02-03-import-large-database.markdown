---
layout: post
title: "MySQL - Büyük Boyutlu Veritabanlarını İçe Aktarma Problemi"
date: 2014-02-03 11:45
comments: true
categories: Teknik
---

PhpMyAdmin aracılığı ile büyük boyutlu veritabanlarını import ederken 
<br>

<code> Muhtemelen çok büyük dosya göndermeyi denediniz. Lütfen bu sınıra çözüm yolu bulmak için belgeden yararlanın. </code>

şeklinde bir hata alabiliriz. Bu hatanın çözüm yolu şöyledir : İlk olarak <code> /php5/apache/php.ini </code> dosyasını açalım. Bu dosya içerisinde bazı değişiklikler yapmamız gerekiyor. Bunlar :

<li> post_max_size = 750M </li>
<li> upload_max_filesize = 750M </li>
<li> max_execution_time = 5000 </li>
<li> max_input_time = 5000 </li>
<li> memory_limit = 1000M </li><br>

Karşılık gelen değerleri değiştirdikten sonra Windows da Wamp , Ubuntu da ise <code> sudo /etc/init.d/apache2 restart </code>  diyerek servisleri yeniden başlattığınız da sorununuzun çözüldüğünü görebilirsiniz.