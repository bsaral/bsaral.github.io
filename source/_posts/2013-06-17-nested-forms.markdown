---
layout: post
title: "Rails 3 de Nested Form Nasıl Oluşturulur ?"
date: 2013-02-11 22:16
comments: true
categories: Teknik
---


Aşağıdakilerin adım adım uygulanması gerekir.


{% codeblock Gemfile lang:sh %}


gem "nested_form" 
{% endcodeblock %}



{% codeblock Terminal lang:sh %}

$ bundle install

$ rails g nested_form:install
{% endcodeblock %}	
Bu koddan sonra <code> public/javascripts/nested_form.js </code>  oluşması gerekiyor.Biz bu js belgesini <code> app/assets/javascripts/ </code> altına kopyalayalım. Daha sonra;


{% codeblock controllers/projects_controller.rb  lang:ruby %}

def new
	@project=Project.new
	@project.tasks.build
end
{% endcodeblock %}


{% codeblock model/project.rb  lang:ruby %}

class Project < ActiveRecord::Base

	has_many :tasks, :dependent => :destroy
	attr_accessible :tasks_attributes,:name, :description
	accepts_nested_attributes_for :tasks, :allow_destroy => true

end
	
{% endcodeblock %}


{% codeblock model/task.rb  lang:ruby %}

class Task < ActiveRecord::Base
	belongs_to :project
end
	
{% endcodeblock %}

{% codeblock views/projects/_form.html.erb  lang:ruby %}

<%= nested_form_for @project do |f| %>

	<%= f.label :name %>
	<%= f.text_field(:name) %><br />
	<%= f.label :description %>
	<%= f.text_field(:description) %><br />
	
	<h3> Tasks</h3>
	
	<%= f.fields_for :tasks do |task| %>
		<%= task.label :name %><br />
		<%= task.text_field :name %><br />
		<%= task.link_to_remove "Remove this task" %>
	<% end %>
	<%= f.link_to_add "Add a task", :tasks %>
	<%= f.submit %>
<% end %>
{% endcodeblock %}
