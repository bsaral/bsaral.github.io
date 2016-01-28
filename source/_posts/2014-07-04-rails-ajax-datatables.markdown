---
layout: post
title: "Rails - Ajax Datatables"
date: 2014-07-04 11:58
comments: true
categories: Teknik
---

Datatables, JavaScript ve jQuery ile yapılan sıralama,sayfalama yada arama işlemlerini düz bir html tablosu üzerinde kullanılmasını sağlar. Daha iyi bir kullanıcı arayüzü vardır ve kullanıcıya birçok seçenek sunar. Bu yazıda Rails’e nasıl entegre edileceği gösterilmektedir.

İlk olarak Gemfile içerisine aşağıdaki gemlerin yüklenip bundle edilmesi gerekmektedir.

{% codeblock Gemfile lang:rb %}
group :assets do
  gem 'jquery-datatables-rails', github: 'rweng/jquery-datatables-rails'
  gem 'jquery-ui-rails'
end

gem 'kaminari'
{% endcodeblock %}

Ben sayfalama işlemi için kaminari gemini kullandım. Bu işlem için benzer gemlerde kullanılabilir. Ama datatables ayarlaması yapılırken birkaç yerin değiştirilmesi gerekir.

Sistemi bundle ettikten sonra layouts içerisinde application.html.erb dosyasınıza yada datatables hangi view sayfasında oluşacaksa o sayfanının içerisinde gerekli kütüphaneleri eklemeliyiz.

{% codeblock index.html.slim lang:rb %}
= stylesheet_link_tag '//cdn.datatables.net/1.10.0/css/jquery.dataTables.css'
= javascript_include_tag "//code.jquery.com/jquery-1.10.2.min.js"
= javascript_include_tag "//cdn.datatables.net/1.10.0/js/jquery.dataTables.js
{% endcodeblock %}

Şimdi tablomuzun olduğu sayfa içerisine gidelim ve gerekli düzenlemeleri yapalım.

{% codeblock index.html.slim lang:rb %}
table#attendant_list data-source=(admin_attendants_url(format: "json"))
  thead
    tr
      th Ad
      th Soyad
      th TC
      th IBAN
      th Telefon
      th Ünvan
      th İşlemler

/datatables ayarlamaları

javascript:
  $(document).ready(function() {
    $('#attendant_list').dataTable({
      language: { 'url': 'http://cdn.datatables.net/plug-ins/28e7751dbec/i18n/Turkish.json' },
      "bPaginate": true,
      "bProcessing": true,
      "bServerSide": true,
      "ajax": $('#attendant_list').data('source'),
    });
  });
{% endcodeblock %}

app dizini altında datatables adında bir dizin oluşturalım ve ajax server side işlemlerini için gerçekleştirdiğimiz yapılandırmaları <code> attendants_datatable.rb </code>  içerisine yerleştirelim. Burada önemli olan kısım parametrelerdir. Rails sürümünde dolayı internette çoğu yerde parametreler farklı isimlerde geçmektedir. Parametre isimlerinizi rails uygulaması çalışırken loglardan takip ederek bulabilirsiniz. Örnek olarak benim uygulamamdaki parametreler;

<img src = "/images/k1.png"/>

Eski parametreler ise ;

<img src = "/images/k2.png"/>

Bunları karşılaştıracak olursak;

<li> params[:iDisplayLength] = params[:length] </li>
<li> params[:iDisplayStart] = params[:start] </li>
<li> params[:iSortCol_0] = params[:column] </li>
<li> params[:sSortDir_0] = params[:dir] </li>
<li> params[:sSearch] = params[:search][:value] </li><br>

Sonuç olarak dosyamızın içeriği şu şekilde oluyor:


{% codeblock attendants_datatable.rb lang:rb %}
# encoding: UTF-8
class AttendantsDatatable
  delegate :params, :h, :link_to, :number_to_currency, to: :@view

  def initialize(view)
    @view = view
  end

  def as_json(options = {})
    {
      sEcho: params[:sEcho].to_i,
      iTotalRecords: Attendant.count,
      iTotalDisplayRecords: attendants.total_count, #kaminari gemine göre düzenlendi.
      aaData: data
    }
  end

private

  def data
    attendants.map do |attendant|
      [
        h(attendant.first_name),
        h(attendant.last_name),
        h(attendant.title_name),
        link_to("Görüntüle", attendant) + " | "+link_to("Düzenle", "#") + " | " +link_to("Sil", attendant, method: :delete)
      ]
    end
  end

  def attendants
    @attendants ||= fetch_attendants
  end

  def fetch_attendants
    attendants = Attendant.order("#{sort_column} #{sort_direction}").page(page).per(per_page)
    if params[:search].present?
      attendants = attendants.where("first_name like :s or last_name like :s ", s: "%#{params[:search][:value]}%")
    end
    attendants
  end

  def page
    params[:start].to_i/per_page + 1
  end

  def per_page
    params[:length].to_i > 0 ? params[:length].to_i : 10
  end

  def sort_column
    columns = %w[first_name last_name]
    columns[params[:column].to_i]
  end

  def sort_direction
    params[:dir] == "desc" ? "desc" : "asc"
  end
end
{% endcodeblock %}

Son olarak Controller’da json kısmına küçük bir eklenti yapıyoruz.

{% codeblock attendants_controller.rb lang:rb %}
def index
    respond_to do |format|
      format.html
      format.json {render json: AttendantsDatatable.new(view_context) }
    end
end
{% endcodeblock %}