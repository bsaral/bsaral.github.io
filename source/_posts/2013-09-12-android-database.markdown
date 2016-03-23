---
layout: post
title: "Android - Veritabanı Kullanımı"
date: 2013-09-12 01:35
comments: true
categories: Teknik
---

Android'e yeni başlayanlar için önemli ve uğraştırıcı olan bir konu veritabanıdır. Android uygulamalarında veritabanı olarak Oracle, Mysql, Sqlite gibi birçok seçenek vardır. Ama kurulum ve konfigürasyon bakımından en kolayı Sqlite olduğu için genellikle Android de bu tercih edilir.

Android de oluşturduğumuz ya da var olan veritabanları <b> /data/data/package_name/databases </b> dizini altında bulunur. Bu dizine erişebilmek için Eclipse 'de DDMS sekmesinden ya da açık değilse, Window-Show View-File Explorer 'ı seçmemiz gerekiyor. Daha sonra dizin altından veritabanımıza erişebiliriz. DDMS 'den sadece veritabanına erişimi sağlayabiliriz. Veritabanı içerisindeki tabloları,yapıları görmek için 
SQLiteManager kullanabiliriz. SQLiteManager, Firefox <a href = "https://addons.mozilla.org/en-US/firefox/addon/sqlite-manager/"> eklentisi </a> olarak kullanılır.

<img src = "http://i.imgur.com/zk5UezT.png" />

Şimdi oluşturduğumuz veritabanını önce push ederek dışarı aktaralım. Databasename.db adındaki dosyamızı push ettikten sonra Firefox'dan SQLiteManager'ı açarak veritabanımızı içeri aktaralım. Burda veritabanında yaptığımız her değişiklik .db dosyamıza kaydedilir. Yaptığımız değişiklikleri uygulamamızın içerisine aktarmak içinde tekrar DDMS sekmesinden dizinimizin altındaki veritabanımıza gelip, önceden dışarı aktardığımız ve üzerinde SQLiteManager ile çalıştığımız veritabanı dosyamızı pull ederek yaparız.
