---
layout: post
title: "Node.js - Promises"
date: 2016-01-28 17:27
comments: true
categories: Teknik
---

Promises, Node.js gibi asenkron çalışma mantığını kullanan programlamalar için önemli bir yöntemdir. <a href = "https://en.wikipedia.org/wiki/Pyramid_of_doom_(programming)">  Pyramid of Doom </a> olarak nitelendirilen iç içe geçmiş karmaşık ve uzun kodların daha düzenli ve daha sade hale gelmesini sağlar. Bu yöntem belki tek başına kullanılan asenkron bir fonksiyon için çok etkili değil ama birden fazla fonksiyon olma durumunda kullanılması gereken bir yöntemdir. 

Promises için birçok kütüphane bulunur. Bunlardan en çok bilineni <a href = "http://bluebirdjs.com/docs/getting-started.html"> Blubird </a> ve <a href = "https://github.com/kriskowal/q" > Q </a> kütüphanesidir. Node.js kullanan birçok framework de aslında promises yapısını kullanılan kütüphaneler eklidir. Mesela benim şu an kullandığım Sails.js veritabanı sorguları için promise yapısı olarak bluebird ile çalışabilmektedir.

Şimdi promise yapısı kullanmadan iç içe geçmiş küçük bir programlama yapalım. setTimeout olarak farklı milisaniyelerde çalışan 4 adet fonksiyon tanımlıyoruz. 

{% codeblock Pyramid of Doom lang:js %}
function testFunc1(name,callback) {
    setTimeout(function () {
        callback(null,name);
    }, 500);
}
 
function testFunc2(name,callback) {
    setTimeout(function () {
        callback(null,name)
    }, 100);
}
 
function testFunc3(name,callback) {
    setTimeout(function () {
        callback(null,name)
    }, 900);
}

function testFunc4(name,callback) {
    setTimeout(function () {
        callback(null,name)
    }, 3000);
}

testFunc1("Betül",function(err,result1){
    if(err){
        console.log(err);
    }
    else{
        console.log("testFunc1 sonucu : "+result1);
        testFunc2("Hande",function(err,result2){
            if(err){
                console.log(err);
            }
            else{
                console.log("testFunc2 sonucu : "+result2);
                testFunc3("Tuğba",function(err,result3){
                    if(err){
                        console.log(err);
                    }
                    else{
                        console.log("testFunc3 sonucu : "+result3);
                        testFunc4("Yasemin",function(err,result4){
                            if(err){
                                console.log(err);
                            }
                            else{
                                console.log("testFunc4 sonucu : "+result4);
                            }
                        });
                    }
                });
            }
        });
    }
});
{% endcodeblock %}

<img src = "/images/p1.png"/>

Bu şekilde 10 tane daha fonksiyon çalıştırdığınızı düşünün. Hepsi iç içe. Ne kadar kötü gözüküyor değil mi ? Ama promises ile çalıştığımız zaman bu problemi ortadan kaldırıyoruz.

Ben Q kütüphanesini kullandım. Siz isterseniz blubird kullanabilirsiniz. Çalışma mantıkları aynı ama söz dizimleri birbirine benzemiyor. Q kütüphanesini npm ile <a href = "https://www.npmjs.com/package/q"> burdan </a> yükleyebilirsiniz.

{% codeblock promise.js lang:js %}
var Q = require('q');

function testFunc1(name) {
	var deferred = Q.defer();
	setTimeout(function () {
	    deferred.resolve("test1 fonksiyonu : "+name);
	}, 500);

	return deferred.promise;
}

function testFunc2(name) {
    var deferred = Q.defer();
 
    setTimeout(function () {
        deferred.resolve("test2 fonksiyonu : "+ name);
    }, 100);
 
    return deferred.promise;
}
 
function testFunc3(name) {
 	var deferred = Q.defer();
 
    setTimeout(function () {
        deferred.resolve("test3 fonksiyonu : "+name);
    }, 900);
 
    return deferred.promise;
}

function testFunc4(name) {
 	var deferred = Q.defer();
 
    setTimeout(function () {
        deferred.resolve("test4 fonksiyonu : "+name);
    }, 300);
 
    return deferred.promise;
}

testFunc1("Betül")
    .then(function (result) {
        console.log(result);
        // testFunc2 fonksiyonunu çağırıyoruz
        return testFunc2("Hande");
    })
    .then(function (result) {
 
       console.log(result);

        // testFunc3 fonksiyonunu çağırıyoruz
        return testFunc3("Tuğba");
    })
    .then(function (result) {
        console.log(result);

        // testFunc4 fonksiyonunu çağırıyoruz
        return testFunc4("Yasemin");
    })
    .then(function (result) {
    	//testFunc4 fonksiyonunu sonucu
        console.log(result);
    })
    .catch(function (error) {
        console.log("Hata : "+error);
    });
{% endcodeblock %}

<code> deferred </code> ile promises nesnemizi tanımlıyoruz. <code> then </code> ve <code> catch </code> ile fonksiyon sonucunda oluşan nesnemizi döndürüyoruz. Promises yapısında callback kullanılmaz. Bunun yerine fonksiyon sonuçları senkron bir şekilde <code> then </code>, <code> catch </code> yapısına gider. Eğer fonksiyon sonucu bir hata oluşmuyorsa <code> then </code> fonksiyonuna, eğer bu fonksiyonlardan herhangi birinden hata alıyorsak ise <code> catch </code> fonksiyonuna gider. Böylece her bir fonksiyon için hata kontrolü yapmak yerine <code> catch </code> kullanarak hata kontrolünü tüm fonksiyonlar için tek bir satırda yapıyoruz. 

Şimdilik bu kadar. Promises ile ilgili araştırmalarım devam ediyor. Yeni şeyler öğrendikçe burayı da güncellemeye çalışacağım. 
