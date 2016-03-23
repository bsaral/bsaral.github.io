---
layout: post
title: "Node.js - Streams"
date: 2016-03-23 15:13
comments: true
categories: Teknik
---

Streams, kaynaktan sürekli veri okuyan ve hedef veriye kolayca aktarım yapılan nesnelerdir. Node.js 4 farklı streams çeşidi kullanır. Ben bunların üçünden bahsedeceğim.

<li> <b> Readable Stream </b>, kaynaktan veriyi okuyan akıştır </li>
<li> <b> Writable Stream </b>, hedefe veriyi gönderen akıştır </li>
<li> <b> Duplex Stream </b>, hem okuma hemde yazma işlemi yapan akıştır. </li>
<br>
Basit bir Node uygulamasında kullandığımız http server da request aslında bizim için readable stream, response writable stream ve fs modülü ise dublex stream olarak kullanılabilmektedir.

Streams nesnelerini kullanırken EventEmitter yapısını da kullanarak farklı zamanlarda oluşan olayları rahat bir şekilde takip edebiliriz. Bu yapıda kullanılan bazı eventler aşağıdaki gibidir.

<li> <b> data</b>, veri okunurken bu event tetiklenir.</li>
<li> <b> end </b>, kaynaktan okunacak data kalmadığında bu kısma düşer. </li>
<li> <b> error </b>, veriyi okuma veya yazmada herhangi bir problem olursa bu kısma düşer. </li>
<br>

Şimdi birkaç örnek üzerinden konuyu açıklayalım. İlk önce readable stream örneğine bakalım.

{% codeblock app.js lang:js %}
	var fs = require('fs');
	var readableStream = fs.createReadStream('file.txt');

	var data = '';

	readableStream.on('data', function(chunk) {
	    data+=chunk;
	});

	readableStream.on('end', function() {
	    console.log(data);
	});

{% endcodeblock %}

file.txt adında bir dosyamız var ve fs.createReadStream yaparak bu dosyayı stream olarak okumamızı sağlıyoruz. readableStream.on diyerek EventEmitter yapısındaki fonksiyonları çağırıyoruz. Kaynaktan okuma yaparken yukarıda bahsettiğim gibi data event yapısına düşer. readableStream'den gelen her bir parçayı dataya ekliyoruz. Okunacak veri bittiğinde ise end event yapısına gidiyor ve datayı bastırıyor.


Pipe yapısını inceleyelim.

{% codeblock app.js lang:js %}
	var fs = require('fs');
	var readableStream = fs.createReadStream('file1.txt');
	var writableStream = fs.createWriteStream('file2.txt');

	readableStream.pipe(writableStream);

{% endcodeblock %}

Pipe yapısı streams okumak ve yazmak için kullanılabilecek en iyi yöntemdir. Çünkü akışı size bırakmaz kontrolü kendindedir. Datayı okuma veya yazma hızını yönetme işini kendi yapar. Bu örnekte file1.txt içerisindeki veriyi pipe yaparak yani bir boru hattı oluşturup veriyi bu yapı içerisinden file2.txt aktardığını hayal edebilirsiniz. Pipe ile zincirleme bir yapısı kurarak birden fazla streams nesnesini kullanabilirsiniz.


{% codeblock app.js lang:js %}
	var fs = require('fs');
	var zlib = require('zlib');

	fs.createReadStream('input.txt.gz')
	  .pipe(zlib.createGunzip())
	  .pipe(fs.createWriteStream('output.txt'));

{% endcodeblock %}

Bu örnekte ilk önce input.txt.gz adında okunabilir bir streams yapısı oluşturuyoruz. zlib.createGunzip() ile unzip işlemi yaparak içeriği okunup output.txt'e yazılabilir bir stream oluşturup veriyi aktarıyoruz.

Şimdi basit bir streams yazma örneği yapalım. Gerekli açıklamaları kod içerisinde yaptım.

{% codeblock app.js lang:js %}
	var fs = require("fs");
	var data = 'test123';

	//streams yazmak için output.txt adında dosya oluşturuyoruz
	var writerStream = fs.createWriteStream('output.txt');

	// streams yazmak için write fonksiyonu kullanılır. datayı UTF8 cinsinsen txt dosyamıza yazıyoruz.
	writerStream.write(data,'UTF8');

	// streams yazma işlemini bitiriyoruz
	writerStream.end();

	// herhangi bir problem sonucu bu kısma düşer
	writerStream.on('error', function(err){
	   console.log(err.stack);
	});


{% endcodeblock %}

Streams konusu özetle şimdilik bu kadar. Bu konuda araştırma yaptıkça buraya da aktaracağım.  