<?php /* Smarty version 2.6.19, created on 2009-10-13 16:56:26
         compiled from quiz/g_karta.tpl */ ?>
	
	<?php $_from = $this->_tpl_vars['obrazek']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a_dane_obrazka']):
?>
		<div>
		<h3><?php echo $this->_tpl_vars['a_dane_obrazka']['epoka']; ?>
</h3>
		<p><img src='Obrazki/<?php echo $this->_tpl_vars['a_dane_obrazka']['link_do_obrazka']; ?>
'></p>
		<p><?php echo $this->_tpl_vars['a_dane_obrazka']['tytul_obrazka']; ?>
 <?php echo $this->_tpl_vars['a_dane_obrazka']['autor_obrazka']; ?>
</p>
		</div>
	
	<?php endforeach; endif; unset($_from); ?>


<h4>Pytania:</h4><br />

<form action="index.php" method="get">

<table border=1>

<tr>
<td><input type="hidden" name="v_modul" value="quiz" /></td>
<td><input type="hidden" name="v_akcja" value="ocen" /></td>
<td><input type="hidden" name="epoka_id" value="<?php echo $this->_tpl_vars['v_naz_pytan'][0][0]['epoka_id']; ?>
" /></td>
</tr>

<?php $_from = $this->_tpl_vars['v_naz_pytan']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['co']):
?>
	
<tr><td><h4><?php echo $this->_tpl_vars['co'][0]['pytanie']; ?>
</h4></td></tr>
	
<tr><td><input type="radio" name="a_odpowiedzi[<?php echo $this->_tpl_vars['co'][0]['id']; ?>
]" value="a" /><?php echo $this->_tpl_vars['co'][0]['a']; ?>
</td></tr>
<tr><td><input type="radio" name="a_odpowiedzi[<?php echo $this->_tpl_vars['co'][0]['id']; ?>
]" value="b" /><?php echo $this->_tpl_vars['co'][0]['b']; ?>
</td></tr>
<tr><td><input type="radio" name="a_odpowiedzi[<?php echo $this->_tpl_vars['co'][0]['id']; ?>
]" value="c" /><?php echo $this->_tpl_vars['co'][0]['c']; ?>
</td></tr>
<tr><td><input type="radio" name="a_odpowiedzi[<?php echo $this->_tpl_vars['co'][0]['id']; ?>
]" value="d" /><?php echo $this->_tpl_vars['co'][0]['d']; ?>
</td></tr>
	
 
<?php endforeach; endif; unset($_from); ?>

</table>

<br />

<input type="submit" value="Zatwierdź wybór" />
</form>