---
layout: post
title: "Matlab - İki Resim Arasında Fark Bulma"
date: 2013-11-01 10:36
comments: true
categories: Teknik
---

İki resim arasındaki farkı Matlab yardımı ile bulalım.

<table>
<tr>
	<td>Resim-1<img src= "/images/m1.png"/></td>
	<td>Resim-2<img src="/images/m2.png"/></td>
</tr>
</table>

{% codeblock Terminal lang:sh %}
im1 = rgb2gray(imread('fark1.bmp'));
im2 = rgb2gray(imread('fark2.bmp'));

fark = imabsdiff(im1,im2);
bw = bwareaopen(fark,55);
bw = imfill(bw,'holes');
SE = strel('square',1);
bw2 = imerode(bw,SE);
fark = regionprops(bw2, 'all');
c = [fark.Centroid];

imshow('fark2.bmp');
title(['Toplam fark : ',num2str(length(fark))]);
hold on;
x = c(1:2:end);
y = c(2:2:end);
plot(x,y,'yo','MarkerSize',20,'LineWidth',4);
{% endcodeblock %}

Program çıktımız :

<img src="/images/mson.png"/>