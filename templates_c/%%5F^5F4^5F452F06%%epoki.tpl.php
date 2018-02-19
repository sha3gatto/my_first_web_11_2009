<?php /* Smarty version 2.6.19, created on 2009-10-13 16:50:12
         compiled from quiz/epoki.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'quiz/epoki.tpl', 13, false),)), $this); ?>
<p>Wybierz interesującą Cię epokę historyczną.</p><br />

<form action="index.php" method="get">

<table>

		<tr>
		<td><input type="hidden" name="v_modul" value="quiz" /></td>
		<td><input type="hidden" name="v_akcja" value="pokaz_pytania" /></td>
		</tr>
	<?php $_from = $this->_tpl_vars['tab_epoki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a_epoka']):
?>
		<tr>
		<td><?php echo smarty_function_html_radios(array('name' => 'v_epoka_id','values' => $this->_tpl_vars['a_epoka']['id'],'output' => $this->_tpl_vars['a_epoka']['epoka'],'separator' => '<br />'), $this);?>
</td>
		</tr>

	<?php endforeach; endif; unset($_from); ?>
	
</table>

<input type="submit" value="Zatwierdź wybór" />

</form>


