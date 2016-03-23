---
layout: post
title: "Node.js - Async"
date: 2016-01-28 12:14
comments: true
categories: Teknik
---

Async, asenkron işlemler için kullanılan bir javascript kütüphanesidir. Bu kütüphanede önemli olan asenkron işlemlerinin yönetimini kolaylaştıracak control flow fonksiyonlarıdır. Async ile işlem yapabilmek için önce npm ile <a href = "https://www.npmjs.com/package/async"> modülü </a> yüklemek gerekir.

İlk olarak async.parallel fonksiyonuna bakalım. Bu kullanım, fonksiyonların birbirlerini bekletmeden çalışmasını sağlar. Yani 3 fonksiyonunuzda aynı anda çalışmaya başlar ve işlem bittiğinde size sonuç döner. Aşağıda örnek kullanımı bulunmaktadır.

{% codeblock async2.js lang:js %}
	var async = require('async')
	var fs = require('fs');
	var date = new Date();
	console.log(date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());

	async.parallel({ 
        one: function(callback){
           for(var j=0; j<= 3000000000; j++){
                if(j === 3000000000){
                    callback(null,"one")
                }
            }
        },
        two: function(callback){
            for(var k=0; k<= 6000000000; k++){
                if(k === 6000000000){
                    callback(null,"two")
                }
            }
        },
        three: function(callback){
            for(var i=0; i<= 100; i++){
                if(i === 100){
                    callback(null,"three")
                }
            }
        },
    },
    function(err, results) {
        var date = new Date();
        console.log(date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());
        console.log(results);
    });
{% endcodeblock %}

Fonksiyonun ne kadar süre çalıştığını göstermek için zamanı da ekledim. Sonuç aşağıdaki gibidir 

<img src = "/images/async1.png"/>

İkinci olarak ise async.series fonksiyonuna bakalım. Bu kullanımda ise fonksiyonlar sıraya dizilir ve birbirlerini bekleyip callback döndürürler. Örnek olarak aşağıdaki gibidir.

{% codeblock async2.js lang:js %}
	var async = require('async')
	var fs = require('fs');
	var date = new Date();
	console.log(date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());
	async.series({ 
        one: function(callback){
           for(var j=0; j<= 3000000000; j++){
                if(j === 3000000000){
                    callback(null,"one")
                }
            }
        },
        two: function(callback){
            for(var k=0; k<= 6000000000; k++){
                if(k === 6000000000){
                    callback(null,"two")
                }
            }
        },
        three: function(callback){
            for(var i=0; i<= 100; i++){
                if(i === 100){
                    callback(null,"three")
                }
            }
        },
    },
    function(err, results) {
        var date = new Date();
        console.log(date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());
        console.log(results);
    });
{% endcodeblock %}

Sonuç aşağıdaki gibidir.

<img src = "/images/async2.png"/>

Son olarak async.waterfall modeline bakalım. Bu kullanım yönteminde ise fonksiyonlar sırasıyla çalışır ve bir fonksiyonun çalışması kendinden önce gelen fonksiyonun döndürdüğü sonuç ile sağlanır.

{% codeblock async2.js lang:js %}
	var async = require('async')
	var fs = require('fs');
	var date = new Date();
	console.log(date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());

	async.waterfall([
	    function(callback){
	        for(var j=0; j<= 3000000000; j++){
	            if(j === 3000000000){
	                callback(null,"bitti1")
	            }
	        }
	    },
	    function(val1,callback){
	        callback(null,"bitti2")
	    },
	    function(val2,callback){
	        callback(null,"bitti3")
	    },
	], function (err, result) {
	    var date = new Date();
	    console.log(date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());
	    console.log(result);  
	}); 
{% endcodeblock %}

Sonucumuz :

<img src = "/images/async3.png"/>
