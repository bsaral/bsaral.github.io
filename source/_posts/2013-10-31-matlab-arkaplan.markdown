---
layout: post
title: "Matlab - Arkaplan Çıkarımı"
date: 2013-10-31 10:31
comments: true
categories: Teknik
---

Matlab kullanarak aşağıdaki resmin arkaplanını çıkartan bir uygulama yapalım.

<table>
<tr>
	<td>Resim-1<img src= "/images/r1.png"/></td>
	<td>Resim-2<img src="/images/r2.png"/></td>
</tr>
</table>

{% codeblock Terminal lang:sh %}
input = imread('kapi_biri.bmp');
im1 = rgb2gray(imread('kapi.bmp'));
im2 = rgb2gray(imread('kapi_biri.bmp'));

im3 = imsubtract(im1,im2);
im3 = bwareaopen(im3,500,8);
im3 = imfill(im3,'holes');
im3=uint8(im3);

im3(im3 == 255) = 1;
im33 = cat(3, im3, im3, im3);
im = input .* im33;
imshow(im);
{% endcodeblock %}

Program çıktımız :

<img src="/images/rson.png"/>
