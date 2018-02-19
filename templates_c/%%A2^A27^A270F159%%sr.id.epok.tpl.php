<?php /* Smarty version 2.6.31, created on 2018-02-19 15:09:16
         compiled from quiz/sr.id.epok.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'quiz/sr.id.epok.tpl', 10, false),)), $this); ?>
<p>Wyszukaj interesującą Cię epokę historyczną.</p><br />

<form action="index.php" method="post">

	<p><input type="hidden" name="v_modul" value="quiz" /></p>
	<p><input type="hidden" name="v_akcja" value="wsad_egzamin" /></p>

	<ol>
		<?php $_from = $this->_tpl_vars['tab_epoki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a_id'] => $this->_tpl_vars['a_epoka']):
?>
			<li><?php echo smarty_function_html_radios(array('name' => 'v_epoka_id','values' => $this->_tpl_vars['a_id'],'output' => $this->_tpl_vars['a_epoka']['epoka'],'separator' => '<br />'), $this);?>
</li>
		<?php endforeach; endif; unset($_from); ?>
	</ol>
	
<input type="submit" value="Zatwierdź wybór" />

</form>