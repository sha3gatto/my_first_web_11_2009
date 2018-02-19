<!DOCTYPE html>
<html>
<head>
	<title>My first website - november 2009</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="css/styles.css" />
</head>

<body>
	<div id="header"></div>
	<ul id="menu">
		<li><a href="index.php?v_modul=home&amp;v_akcja=home" title="">Baza</a></li>
		<li><a href="index.php?v_modul=quiz&amp;v_akcja=logowanie" title="">Quiz</a></li>
		<li><a href="index.php?v_modul=ksiega&amp;v_akcja=ksiega" title="">Księga gości</a></li>
		<li><a href="index.php?v_modul=about&amp;v_akcja=about" title="">O stronie</a></li>
	</ul>
	<div id="content">
		<div class="post">
			<h1 class="title">{include file=$v_head}</h1>
			<div class="entry">
			{include file=$v_srodek}
			</div>
		</div>
		<div style="clear: both;">&nbsp;</div>
	</div>
	<div id='footer'>
		<p>Copyright &copy; {$v_rok}; by Aleks Bujko; last update: 17-11-2009</p>
	</div>
</body>
</html>
