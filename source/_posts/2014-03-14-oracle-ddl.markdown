---
layout: post
title: "ORACLE - DDL,DCL,DML Ve TCL İşlemleri"
date: 2014-03-14 11:50
comments: true
categories: Teknik
---

<h3><a>Data Definition Language (DDL) </a></h3>

Veritabanı yapısı ve şema tanımlamak için kullanılan komutlardır. Bunlardan bazıları;

<li> CREATE, veritabanında objeleri oluşturur. </li>
<li> DROP, objelerin veritabanından silinmesini sağlar. </li>
<li> ALTER, veritabanı nesnelerinin yapısını değiştirmek için kullanılır. </li>
<li> TRUNCATE, bir tablo içerisindeki tüm kayıtları silmek için kullanılır. </li>
<li> RENAME, veritabanı nesnesinin adını değiştirir. </li>
<li> COMMENT, veri sözlüğüne yorum ekler. </li><br>

<h3><a>Data Manipulation Language (DML) </a></h3>

Veritabanı objelerinin içerisindeki verileri yönetmeye yarayan komutlardır. Bunlardan bazıları;

<li>SELECT, veritabanından veri çekmek, listelemek, göstermek için kullanılır.</li>
<li>INSERT, tablo içerisine veri eklemek için kullanılır.</li>
<li>UPDATE, tablo içerisindeki verilerin güncellenmesinde kullanılır. ALTER komutundan farkı ise; ALTER tablonun yapısı ile ilgili güncelleme yaparken UPDATE ise veri içeriğinden güncelleme yapar.</li>
<li>DELETE, tablodaki kayıtları silmek için kullanılır. TRUNCATE komutundan en önemli farkı ise, DELETE komutu ile belli bir aralığı silebilirken, TRUNCATE ile tablonun tamamını silebiliyoruz. TRUNCATE komutu parçalı silme yapmaz ama DELETE, WHERE kullanıldığında parçalı silme yapabilir</li>
<li>MERGE - UPSERT, operasyonunun yapılması (insert etmek, eğer insert hata alırsa update etmek işlemi)</li>
<li>CALL, bir PL/SQL yada JAVA alt programı çağırmak için kullanılır.</li>
<li>LOCK TABLE, kontrol altında tutma işlemleri.</li><br>

<h3><a>Data Control Language (DCL)   </a></h3>

Veritabanında erişim izinlerinin verilmesi veya verilen izinlerin iptal edilmesini sağlayan,yetki tanımlama kontrol unsurlarını içeren komutlardır. Bunlardan bazıları;

<li>GRANT, kullanıcıya veritabanı üzerinde yetki tanımlamak için kullanılır. </li>
<li>REVOKE, yetkilerin iptal edilmesi için kullanılır. </li><br>

<h3><a>Transaction Control (TCL)</a></h3>

DML ile yapılan işlemlerin yönetilmesini ve kontrol edilmesini sağlayan komutlardır. Bunlardan bazıları;

<li>COMMIT, yapılanları kayıt eder.</li>
<li>SAVEPOINT, daha sonra rollback yapılmak üzere bir nokta belirler.</li>
<li>ROLLBACK, veritabanında son COMMIT’e kadar olan yere geri alır.</li>
<li>SET TRANSACTION, işlemlerin izolasyon seviyesini modifiye etmek veya mevcut işlemin özelliklerini değiştirmek için kullanılabilir.</li><br>