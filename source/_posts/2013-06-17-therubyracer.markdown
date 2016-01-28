---
layout: post
title: "Rails Therubyracer gem kurulum problemi"
date: 2012-12-18 22:37
comments: true
categories: Teknik 
---

Deponuzda gemfile içerisinde therubyracer gem kurulumunda eğer aşağıdaki gibi bir kurulum hatası alıyorsanız ;
{% codeblock Terminal lang:sh %}
Gem::Installer::ExtensionBuildError: ERROR: Failed to build gem native extension.

		/usr/bin/ruby1.9.1 extconf.rb 
*** extconf.rb failed ***
Could not create Makefile due to some reason, probably lack of
necessary libraries and/or headers.  Check the mkmf.log file for more
details.  You may need configuration options.

Provided configuration options:
	--with-opt-dir
	--without-opt-dir
	--with-opt-include
	--without-opt-include=${opt-dir}/include
	--with-opt-lib
	--without-opt-lib=${opt-dir}/lib
	--with-make-prog
	--without-make-prog
	--srcdir=.
	--curdir
	--ruby=/usr/bin/ruby1.9.1
extconf.rb:15:in <main>: undefined method include_path for Libv8:Module (NoMethodError)


Gem files will remain installed in /home/uzem/.bundler/tmp/8120/gems/therubyracer-0.10.1 for inspection.
Results logged to /home/uzem/.bundler/tmp/8120/gems/therubyracer-0.10.1/ext/v8/gem_make.out

An error occurred while installing therubyracer (0.10.1), and Bundler cannot continue.
Make sure that gem install therubyracer -v '0.10.1'succeeds before bundling.
{% endcodeblock %}
aşağıdaki kodlar bu sorunu ortadan kaldırır.


{% codeblock Terminal lang:sh %}
$ sudo gem uninstall libv8
{% endcodeblock %}

çıktı aşağıdaki gibiyse 3 'e basıp devam ediniz ;

	Select gem to uninstall:
	 1. libv8-3.3.10.4-x86-linux
	 2. libv8-3.11.8.4
	 3. All versions
	 > 3 

en son olarak da 
{% codeblock Terminal lang:sh %}
$ sudo gem install therubyracer
{% endcodeblock %}
{% codeblock Terminal lang:sh %}
$ bundle install
{% endcodeblock %}
sorunumuz çözüldü.
