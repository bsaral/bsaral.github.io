---
layout: post
title: "Rails de Sqlite3 Veritabanını Mysql'e Aktarmak"
date: 2013-01-11 22:16
comments: true
categories: Teknik
---

Veritabanını Sqlite 3 ile sağladığınız bir rails projesinde , her ne kadar ilerlemiş olursanız olun her zaman mysql'e çevirme
şansınız vardır.İlk olarak ;

{% codeblock database.yml lang:yml %}

	development:
	  adapter: mysql2
	  encoding: utf8
	  reconnect: false
	  database: databasename_development
	  pool: 5
	  username: root
	  password: ["parola"]
	  socket: /var/run/mysqld/mysqld.sock

	test:
	  adapter: mysql2
	  encoding: utf8
	  reconnect: false
	  database: databasename_test
	  pool: 5
	  username: root
	  password: ["parola"]
	  socket: /var/run/mysqld/mysqld.sock

	production:
	  adapter: mysql2
	  encoding: utf8
	  reconnect: false
	  database: databasename_production
	  pool: 5
	  username: root
	  password: ["parola"]
	  socket: /var/run/mysqld/mysqld.sock
	  
{% endcodeblock %}
şimdi bu kodları terminale girmemiz gerekiyor.
{% codeblock Terminal lang:sh %}
$ bundle exec rake db:create

$ bundle exec rake db:schema:dump
{% endcodeblock %}

bu koddan sonra aşağıdaki gibi bir hata alıyorsanız ;

{% codeblock Terminal lang:sh %}
rake aborted!

Please install the mysql2 adapter: gem install activerecord-mysql2-adapter
   (mysql2 is not part of the bundle. 
Add it to Gemfile.)
{% endcodeblock %}

Bu hata için;
{% codeblock Terminal lang:sh %}
$ sudo gem install activerecord-mysql2-adapter
{% endcodeblock %}

{% codeblock Gemfile lang:ruby %}
gem "activerecord-mysql2-adapter"
{% endcodeblock %}
{% codeblock Terminal lang:sh %}
$ bundle 

$ bundle exec rake db:load

{% endcodeblock %}

Ve hata alırız:
{% codeblock Terminal lang:sh %}
	rake aborted!
	Don't know how to build task 'db:load'
	(See full trace by running task with --trace)
	
{% endcodeblock %}


{% codeblock Gemfile lang:ruby %}

gem 'yaml_db' 
{% endcodeblock %}

{% codeblock Terminal lang:sh %}
$ bundle 

$ bundle exec rake db:load

$ bundle exec rake db:migrate
{% endcodeblock %}
Ve veritabanlarımızı mysql'e aktarmış olduk.Eğer sisteminiz de phpmyadmin varsa, aktarmış olduğumuz tabloları orda takip edebilirsiniz.

>

<h4>UYARI : </h4> Eğer rails server çalıştırdığınız da 
{% codeblock Terminal lang:sh %}
mysql undefined method `accept' for nil:NilClass
{% endcodeblock %}
hatasını alıyorsanız Gemfile içerisinde <code> gem "activerecord-mysql2-adapter" </code> silmeniz gerekiyor.Ayrıca
<code> gem  "mysql2", ">= 0.3.11" </code> Gemfile içerisinde bulunması gerekir.Bu işlemleri yaptıktan sonra veritabanınızda bulunan
tüm tabloları silin ve yeniden oluşturun yani :

{% codeblock Terminal lang:sh %}
$ rake db:migrate
{% endcodeblock %}
ve seed dosyanız dolu ise;
{% codeblock Terminal lang:sh %}
$ rake db:seed

{% endcodeblock %}
Kolay gelsin.
