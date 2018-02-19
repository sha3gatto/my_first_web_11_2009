<?php /* Smarty version 2.6.31, created on 2018-02-19 13:35:09
         compiled from index.tpl */ ?>
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
			<h1 class="title"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['v_head'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></h1>
			<div class="entry">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['v_srodek'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
		</div>
		<div style="clear: both;">&nbsp;</div>
	</div>
	<div id='footer'>
		<p>Copyright &copy; <?php echo $this->_tpl_vars['v_rok']; ?>
; by Aleks Bujko; last update: 17-11-2009</p>
	</div>
</body>
</html>