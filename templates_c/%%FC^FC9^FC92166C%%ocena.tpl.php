<?php /* Smarty version 2.6.26, created on 2009-10-11 15:07:40
         compiled from quiz/ocena.tpl */ ?>


<table border=1>

<tr>
<td><h5>Pytanie</h5></td><td><h5>Odpowiedź</h5></td><td><h5>Ocena</h5></td>
<tr>


	<?php $_from = $this->_tpl_vars['v_ocena']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['to']):
?>
		<tr>
		<td><?php echo $this->_tpl_vars['to']['pytanie']; ?>
</td><td><?php echo $this->_tpl_vars['to']['odp']; ?>
</td><td><?php echo $this->_tpl_vars['to']['spr']; ?>
</td>
		
		</tr>

	<?php endforeach; endif; unset($_from); ?>
	
</table>

<a href="index.php?v_modul=delsess&v_akcja=epoki">Wyloguj się albo wybierz inną epokę</a>