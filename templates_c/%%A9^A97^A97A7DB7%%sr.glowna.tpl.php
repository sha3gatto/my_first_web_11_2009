<?php /* Smarty version 2.6.31, created on 2018-02-18 23:35:30
         compiled from ksiega/sr.glowna.tpl */ ?>
<p>W tym miejscu strony internetowej autor grzecznie, ale stanowczo uprasza liczne zastępy bliźnich o zamieszczanie konkretnych, zarówno dobrych, jak złych, opinii o tym serwisie webowym. W miarę możliwości postara się dostosować go do konkretnych życzeń.</p>

<div id="ksiega">
<form action="index.php" method="post">

<input type="hidden" name="v_modul" value="ksiega" />
<input type="hidden" name="v_akcja" value="wiadomosc" />

<ol>
	<li>
		<label for="nick">Nick</label> 
		<input type="text" readonly="readonly" name="nick" value="<?php echo $this->_tpl_vars['v_nick']; ?>
" size="20" />
	</li>
	<li>
		<label for="email">E-mail</label> 
		<input type="text" name="email" size="20" title="nie zostanie upubliczniony" />
	</li>

	<li>
		<label for="wiad">Wiadomość</label> 
		<textarea name="wiad" cols="23" rows="10" title="Wyraź swoje zdanie o stronie."></textarea>
	</li>

	<li>
		<input type="submit" value="Zatwierdź"/>
	</li>
</ol>

</form>
</div>
<br />

<p>Jeśli chcesz, możesz się <a href="<?php echo $this->_tpl_vars['v_query_string']; ?>
">wylogować</a>.</p><br />

<h4>Opinie użytkowników:</h4>

<table>
	<tr>
		<th>Nick</th>
		<th>Wiadomość</th>
		<th>Data</th>
		<?php $_from = $this->_tpl_vars['v_odczyt_wiad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['to']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['to']['nick']; ?>
</td>
				<td width="400"><?php echo $this->_tpl_vars['to']['wiadomosc']; ?>
</td>
				<td><?php echo $this->_tpl_vars['to']['data']; ?>
</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
</table>