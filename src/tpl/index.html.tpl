<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ page.title }}</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{ site.url }}css/syntax.css">
    <link rel="stylesheet" href="{{ site.url }}css/main.css">
  </head>
  <body>
  	<div class="container">
  		<div class="site">
  			<div class="header">
  				<h1 class="title"><a href="/">{{ site.name }}</a></h1>
  				{% for p in pages %}
  					<a class="extra" href="{{ p.url }}">{{ p.title }}</a>
  				{% end %}
  			</div>

  			{{ content }}

  			<div class="footer">
  				<div class="contact">
  					<p>
  						Your Name<br />
  						What You Are<br />
  						your@email.com
  					</p>
  				</div>
  				<div class="contact">
  					<p>
  						<a href="http://github.com/yourusername/">github.com/yourusername</a><br />
  						<a href="http://twitter.com/yourusername/">twitter.com/yourusername</a><br />
  					</p>
  				</div>
  			</div>
  		</div>
  	</div> 
  </body>
</html>