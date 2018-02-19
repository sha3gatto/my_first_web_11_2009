<p>W tym miejscu strony internetowej autor grzecznie, ale stanowczo uprasza liczne zastępy bliźnich o zamieszczanie konkretnych, zarówno dobrych, jak złych, opinii o tym serwisie webowym. W miarę możliwości postara się dostosować go do konkretnych życzeń.</p>

<div id="ksiega">
<form action="index.php" method="post">

<input type="hidden" name="v_modul" value="ksiega" />
<input type="hidden" name="v_akcja" value="wiadomosc" />

<ol>
	<li>
		<label for="nick">Nick</label> 
		<input type="text" readonly="readonly" name="nick" value="{$v_nick}" size="20" />
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

<p>Jeśli chcesz, możesz się <a href="{$v_query_string}">wylogować</a>.</p><br />

<h4>Opinie użytkowników:</h4>

<table>
	<tr>
		<th>Nick</th>
		<th>Wiadomość</th>
		<th>Data</th>
		{foreach from=$v_odczyt_wiad item=to}
			<tr>
				<td>{$to.nick}</td>
				<td width="400">{$to.wiadomosc}</td>
				<td>{$to.data}</td>
			</tr>
		{/foreach}
	</tr>
</table>
