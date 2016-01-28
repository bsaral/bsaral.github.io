---
layout: post
title: "Rails 3 Production Mod"
date: 2013-03-15 22:36
comments: true
categories: 
---

Merhabalar,


Rails ile yaptığınız uygulamayı production modda çalıştırmanız gerekebilir. Bunun için aşağıdaki işlemleri yapmalısınız.
İlk önce veritabanımızı production moduna almamız gerekir.Terminale gidip;

{% codeblock Terminal lang:sh %}
$ RAILS_ENV=production rake db:create 
{% endcodeblock %}
{% codeblock Terminal lang:sh %}

$ RAILS_ENV=production rake db:migrate 
{% endcodeblock %}

Eğer seed dosyanız da varsa;

{% codeblock Terminal lang:sh %}
$ RAILS_ENV=production rake db:seed 
{% endcodeblock %}
Şimdi rails server' ımızı çalıştıralım. 2 şekilde de server'ı production modunda çalıştırabiliriz.

{% codeblock Terminal lang:sh %}
$ RAILS_ENV=production rails server 
{% endcodeblock %}
ya da  
{% codeblock Terminal lang:sh %}

$ rails server -e production 
{% endcodeblock %}
rails server çalıştıktan sonra <a href = "http://localhost:3000"> yerelinizde </a>  açtığınız zaman 404 hatası alıyorsanız :


{% codeblock Terminal lang:sh %}


$ bundle exec rake assets:precompile 
{% endcodeblock %}

{% codeblock config/environments/production.rb lang:ruby %}	
config.serve_static_assets = true 
{% endcodeblock %}
Ve böylece uygulamanızı production modda çalıştırmış olursunuz.
