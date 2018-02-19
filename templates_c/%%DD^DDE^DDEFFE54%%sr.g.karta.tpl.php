<?php /* Smarty version 2.6.31, created on 2018-02-18 22:53:37
         compiled from quiz/sr.g.karta.tpl */ ?>
<table>
	<tr>
		<?php $_from = $this->_tpl_vars['v_content_epoki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a_dane_epoki']):
?>
			<td>
				<img src='Obrazki/<?php echo $this->_tpl_vars['a_dane_epoki']['link_do_obrazka']; ?>
' alt='<?php echo $this->_tpl_vars['a_dane_epoki']['tytul_obrazka']; ?>
' />
				<p><?php echo $this->_tpl_vars['a_dane_epoki']['tytul_obrazka']; ?>
; <br /> twórca <?php echo $this->_tpl_vars['a_dane_epoki']['autor_obrazka']; ?>
</p>
			</td>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
</table>


<h4>Pytania:</h4>

<form action="index.php" method="post">
	<input type="hidden" name="v_modul" value="quiz" />
	<input type="hidden" name="v_akcja" value="ocen" />
		<table>
		<?php $_from = $this->_tpl_vars['v_naz_pytan']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['co']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['co']['pytanie']; ?>

					<ul>
						<li><input type="radio" name='a_odp[<?php echo $this->_tpl_vars['co']['id']; ?>
]' value='a' /><?php echo $this->_tpl_vars['co']['a']; ?>
</li>
						<li><input type="radio" name='a_odp[<?php echo $this->_tpl_vars['co']['id']; ?>
]' value='b' /><?php echo $this->_tpl_vars['co']['b']; ?>
</li>
						<li><input type="radio" name='a_odp[<?php echo $this->_tpl_vars['co']['id']; ?>
]' value='c' /><?php echo $this->_tpl_vars['co']['c']; ?>
</li>
						<li><input type="radio" name='a_odp[<?php echo $this->_tpl_vars['co']['id']; ?>
]' value='d' /><?php echo $this->_tpl_vars['co']['d']; ?>
</li>
					</ul>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
	<br />
	<input type="submit" value="Zatwierdź wybór" />
</form>
<br /><br />
<a href="<?php echo $this->_tpl_vars['v_query_string_1']; ?>
">Wybierz ponownie interesującą Cię epokę</a>
<br />
<br />
<a href="<?php echo $this->_tpl_vars['v_query_string_2']; ?>
">Wyloguj się</a>