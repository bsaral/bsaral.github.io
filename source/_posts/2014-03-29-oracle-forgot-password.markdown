---
layout: post
title: "ORACLE- SYSTEM Hesabının Parolasını Değiştirmek"
date: 2014-03-29 11:55
comments: true
categories: Teknik
---

Oracle XE, SYSTEM/SYS parolasını unuttuysanız veya değiştirmek istiyorsanız aşağıdaki adımları takip edebilirsiniz. 

<li> Oracle kurulumunda sisteminize, veritabanını komutlarla çalıştırabileceğiniz sistem menüsü programları eklenir. Bunlardan “Start Database” olanını çalıştırın.</li>
<img src = "/images/s1.png"/>

<li>Açılan ekrana <code> sqlplus "/ as sysdba"  </code> komutunu girin. Bu komut OS kimlik ataması yaparak Oracle’a yetkili giriş için izin verir ve sistem kullanıcıları üzerinde çalışmamıza olanak sağlar.</li><br>

<img src = "/images/s2.png"/>

<li>Son olarak aşağıdaki komutları da girip veritabanını yeniden başlattığımızda SYSTEM hesap parolası değişmiş olur.</li><br>

{% codeblock SQL lang:sql %}
SQL> show user

USER is "SYS"

SQL> passw system
Changing password for system
New password:
Retype new password:
Password changed

SQL> quit
{% endcodeblock %}