# RSS feed reader

This project was developed at 2013 as a group of two : Reyhane Askari & Mohadese Bastan

# How to run the code

After downloading the code you should set up MySQL on your server. Add root user with password = "12345". Run the following commands:

	CREATE DATABASE register;
	USE register;
	create table users (name varchar(100), password int, PRIMARY KEY (name));
	create table articles (url varchar(100), adr varchar(100)t, PRIMARY KEY (adr));

	
You can then visit index.php to get started and register. Try http://ieeexplore.ieee.org/rss/TOC23.XML to see the results. 

# Technologies used

This website is an RSS feed reader that used AJAX, jQuery, PHP, Javascript and bootstrap. It is used to create feeds of IEEE papers. We use IEEE papers' RSS to feed our reader. The input is an XML file which is then parsed and paper's title, authors, publication date, volume and issue is extracted. Every one can register and have a profile. We save user's papers that is requested each time on server. These papers can be managed and removed from user's profile. If the user wants the reader to retrieve the paper again from IEEE's website can push the refresh button. 

To retrieve the paper's from IEEE's website, we need to implement a PHP cross domain Ajax proxy. Each request was first sent to the sever with an AJAX request, then in the PHP code we sent a request to IEEE's server and requested the paper. 

User's can also search in abstract or title of the papers in their profile using this feed reader. 

Here is some screen shots of our RSS feed reader: 

<p align="center">
  <img src="https://dl.dropboxusercontent.com/s/y90cvy1k0zlz58z/login.PNG?dl=0"/>
</p>
<p align="center">
  <img src="https://dl.dropboxusercontent.com/s/v45t9c9qnj8cgjg/RSSfeedreadermain.PNG?dl=0"/>
</p>

