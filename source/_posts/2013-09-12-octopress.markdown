---
layout: post
title: "Octopress İle Blog Oluşturma"
date: 2013-06-23 01:04
comments: true
categories: Teknik
---

Octopress, Jekyll için hazırlanan, Github Pages’in arkasında da kullanılan bir statik blog framework’ü. En popüler engine olarak görülüyor. Octopress rails tabanlı olduğundan kullanımı diğer blog yazılımlarına göre çok farklı. Şimdi adım adım octopress kurulumu ve kullanımına geçelim. Sisteminizde Ruby kurulu olmalıdır.

İlk olarak Octopress deposunu klonlayalım.

{% codeblock Terminal lang:sh %}
$ git clone git://github.com/imathis/octopress.git octopress

$ cd octopress

$ bundle install
...
...
Your bundle is complete!

$ rake install

## Copying classic theme into ./source and ./sass
mkdir -p source
cp -r .themes/classic/source/. source
mkdir -p sass
cp -r .themes/classic/sass/. sass
mkdir -p source/_posts
mkdir -p public

{% endcodeblock %}

Blogumuz oluştu. Şimdi blog içerisindeki ayarlamaları yapalım. Bunun için octopress ayarlarının bulunduğu _config.yml dosyasında düzenlemeler yapmamız gerekiyor. Bu dosyadaki kesin düzenlenmesi gereken kısım aşağıdaki gibidir.

{% codeblock _config.yml lang:sh %}
url:  			# Blog adresiniz
title:  		# Blog Başlığı
subtitle: 		# Alt Başlık
author: 		# Blogger Adı
simple_search: 		# http://google.com/search
description:		# Blog Hakkında Bilgi

{% endcodeblock %}

Dosyanın alt taraflarında sosyal ağ bağlantılarınızla ilgili ayarlamalarınızı yapmanız mümkündür.

Şimdi ilk blog yazımızı oluşturalım.

{% codeblock Terminal lang:sh %}
$ rake new_post["hello-octopress"]
...
Creating new post: source/_posts/2013-06-23-hello-octopress.markdown

{% endcodeblock %}

_posts dizinimizin altında dosyamız oluştu. Şimdi dosyayı açıp blogunuzu markdown syntax uygun bir biçimde yazabilirsiniz.

{% codeblock Terminal lang:sh %}
$ rake generate

...
Building site: source -> public
Successfully generated site: source -> public

$ rake preview

Configuration from /home/betul/octopress/_config.yml
[2013-06-23 23:43:46] INFO  WEBrick 1.3.1
[2013-06-23 23:43:46] INFO  ruby 1.9.2 (2011-07-09) [i686-linux]
[2013-06-23 23:43:46] INFO  WEBrick::HTTPServer#start: pid=4168 port=4000
Auto-regenerating enabled: source -> public
[2013-06-23 23:43:46] regeneration: 94 files changed
>>> Change detected at 23:43:46 to: screen.scss
identical public/stylesheets/screen.css

Dear developers making use of FSSM in your projects,
FSSM is essentially dead at this point. Further development will
be taking place in the new shared guard/listen project. Please
let us know if you need help transitioning! ^_^b
- Travis Tilley

{% endcodeblock %}


En son kodumuz ile localhost:4000 adresinde bir server açtık. Bu adrese girdiğinizde blogunuzun güncel halini görebilirsiniz.

Blogumuzu oluşturduk şimdi deploy aşamasına geçelim. Ben github üzerinden gidicem fakat octopress sadece github değil heroku,rsync gibi hosting servisleri sağlayan sitelerede deploy edilebilir.

İlk olarak github da create new Github reposity diyerek kendi kullanıcı adımızla oluşturduğumuz yani username.github.io adında bir depo oluşturalım. Daha sonra yerelimizde bulunan octopress dizinine girip terminalde şu kodları yazalım :

{% codeblock Terminal lang:sh %}
$ rake setup_github_pages

Enter the read/write url for your repository: git@github.com:username/username.github.com.git


Added remote git@github.com:username/username.github.com.git as origin
Set origin as default remote
Master branch renamed to 'source' for committing your blog source files
Initialized empty Git repository in /home/username/source/octopress/_deploy/.git/
[master (root-commit) 2a4e9e7] Octopress init
1 files changed, 1 insertions(+), 0 deletions(-)
create mode 100644 index.html

---
## Now you can deploy to http://username.github.com with `rake deploy` ##

{% endcodeblock %}

Her yeni blog yazısı oluşturduğumuzda

{% codeblock Terminal lang:sh %}
$ rake generate

$ rake deploy
{% endcodeblock %}


username.github.io adresinizden blogunuzu görebilirsiniz.

##Ortaya Çıkabilecek Sorunlar 

Yerelime kurulum yaparken bazı sorunlarla karşılaştım. Siz de karşılaşmış olabilirsiniz.

<li> İlk olarak depoyu bundle ettiğimde aşağıdaki hatayı aldım. </li>

{% codeblock Terminal lang:sh %}
....
An error occurred while installing rdiscount (2.0.7.3), and Bundler cannot
continue.
Make sure that `gem install rdiscount -v '2.0.7.3'` succeeds before bundling.

{% endcodeblock %}

Bu rdiscount geminin versiyonuyla ilgili bir hatadır. Gemfile içerisinde bu gem’i bulup versiyon kısmını silip tekrar bundle ettiğimizde sorunumuz ortadan kalkar.

<li> Diğerini ise blog yazımı oluşturduktan sonra aldım. </li>

{% codeblock Terminal lang:sh %}
$ rake generate
...

Building site: source -> public
/var/lib/gems/1.9.1/gems/rdiscount-1.6.8/lib/rdiscount.rb:89:in `block in initialize': undefined method `footnotes=' for #<RDiscount:0xac76988 @text="", @autolink=true> (NoMethodError)

{% endcodeblock %}


Bu hata rdiscount yani markdown syntax’ı için kullanılan bir gem tarafından kaynaklanmaktadır. Markdown için rdiscount dışında maruku,kramdown gibi seçenekleri de kullanabiliriz. Şimdi _config.yml dosyasını açıp markdown kısmındaki rdiscount’u silmeniz gerekir ve yerine maruku yada kromdown dan birini yazın.


{% codeblock _config.yml lang:sh %}
...
markdown: kramdown
pygments: false # default python pygments have been replaced by pygments.rb
{% endcodeblock %}














