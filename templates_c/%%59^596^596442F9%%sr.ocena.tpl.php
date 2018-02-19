<?php /* Smarty version 2.6.31, created on 2018-02-19 18:03:09
         compiled from quiz/sr.ocena.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_image', 'quiz/sr.ocena.tpl', 3, false),)), $this); ?>
<?php if (! is_array ( $this->_tpl_vars['v_ocena'] )): ?>
	<p><?php echo $this->_tpl_vars['v_ocena']; ?>
</p>
	<?php echo smarty_function_html_image(array('file' => 'Obrazki/shit.jpg'), $this);?>

<?php else: ?>
	<h3>Liczba uzyskanych punktów: <?php echo $this->_tpl_vars['v_suma']; ?>
</h3>
	<table>
		<tr>
			<th>Pytanie</th>
			<th>Odpowiedź</th>
			<th>Ocena</th>
			<?php $_from = $this->_tpl_vars['v_ocena']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['to']):
?>
				<tr>
					<td><?php echo $this->_tpl_vars['to']['pytanie']; ?>
</td>
					<td><?php echo $this->_tpl_vars['to']['odp_usera']; ?>
</td>
					<td><?php echo $this->_tpl_vars['to']['spr']; ?>
</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
	</table>
<?php endif; ?>

<br />

<h3>Aktualna lista najlepszych</h3>

<table>
	<tr>
		<th>Nick</th>
		<th>Egzamin</th>
		<th>Data złożenia egzaminu</th>
		<th>Czas trwania egzaminu</th>
		<?php $_from = $this->_tpl_vars['v_naj']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['naj']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['naj']['nick']; ?>
</td>
				<td><?php echo $this->_tpl_vars['naj']['id']; ?>
</td>
				<td><?php echo $this->_tpl_vars['naj']['data']; ?>
</td>
				<td><?php echo $this->_tpl_vars['naj']['czas']; ?>
</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
</table>

<br />

<a href="<?php echo $this->_tpl_vars['v_query_string_1']; ?>
">Wybierz ponownie interesującą Cię epokę</a>
<br />
<br />
<a href="<?php echo $this->_tpl_vars['v_query_string_2']; ?>
">Wyloguj się</a>