---
layout: post
title: "Matlab - Solution Methods for Systems of Linear Equations"
date: 2013-11-06 10:39
comments: true
categories: Teknik
---

<h3><a>GAUSS ELIMINATION YÖNTEMİ </a></h3>

Gauss yöntemini matlab yardımı ile gerçekleştirmek için aşağıdaki program kullanılabilir.

{% codeblock test.m lang:m %}
	% AX = B ise
	
	a = [1 -3  4 -5;2 4 6 8 ;4 3 2 1 ; 5 3 1 -3];  % ilk matrisimiz
	b = [-11  42 -11 -38]';  	% sonuç matrisimiz 

	a(:,length(a)+1)=b;   % Arttırılmış matrisimizi oluşturduk.
	[rows cols]=size(a);  % matrisimizin boyutlarımızı bulduk.

	for i=1:cols
		for j=i+1:rows
			tmp=a(i,:).*(-a(j,i)/a(i,i));
			a(j,:)=tmp+(a(j,:));
		end
	end
	
	for i=length(1:rows)-(1:rows)+1
		if(i<cols-1)
			a(i,cols)=a(i,cols)-(sum(a(i,i+1:cols-1)));
		end
		sonuc(i)=a(i,cols)/(a(i,i));
		a(1:i-1,i)=a(1:i-1,i).*sonuc(i);
	end

	
	disp('Sonuc = ');
	disp(sonuc)

{% endcodeblock %}

<h3><a>TERS MATRİS YÖNTEMİ  </a></h3>

Ters matris yöntemini matlab yardımı ile gerçekleştirmek için aşağıdaki program kullanılabilir.

{% codeblock Terminal lang:m %}
	clc
	clear

	% AX = B  => A.A^-1.X = B.A^-1  => I.X = B.A^-1 =>  X = B.A^-1

	A = [2,-3,2;1,1,-2;3,-2,-1];
	B = [-11,8,-1]';

	X = inv(A)*B  	% inv(A) matrisimizin tersini alır ve B ile çarptıktan sonra x değerlerimiz bulunur.
{% endcodeblock %}

<h3><aCRAMER YÖNTEMİ   </a></h3>

Cramer yöntemini matlab yardımı ile gerçekleştirmek için aşağıdaki program kullanılabilir.

{% codeblock Terminal lang:m %}
	clc
	clear

	A=[3,4,-5;-2,-5,7;-7,2,-3];
	B=[-47;56;15];

	A1 = A;
	A1(:,1) = B;
	A2 = A;
	A2(:,2) = B;
	A3 = A;
	A3(:,3) = B ;

	D=det(A);
	D1=det(A1);
	D2=det(A2);
	D3=det(A3);

	X(1)=D1/D;
	X(2)=D2/D;
	X(3)=D3/D   % sonuc %
{% endcodeblock %}

<h3><a>SECANT YÖNTEMİ    </a></h3>

Sekant yöntemini matlab yardımı ile gerçekleştirmek için aşağıdaki program kullanılabilir.

{% codeblock Terminal lang:m %}
	clc
	clear
	syms x;  	% x atamaları için
	i = 1;a = 1;  b = 2;
	err = 0.000001;
	f = inline(10 * exp(-x/2)*(cos(6*x)+sin(8*x)));  %fonksiyonu tanımlamak için inline kullanılır.
	c = (a*f(b) - b*f(a))/(f(b) - f(a));   %secant yöntem işlemi
	while abs(f(c)) > err
		a = b;
		b = c;
		c = (a*f(b) - b*f(a))/(f(b) - f(a));
		disp([a f(a) b f(b) c f(c)]);
		i = i + 1;
		if(i == 8)
			break;
		end
	end
	disp(['Kökümüz = ' num2str(c)]);
{% endcodeblock %}

