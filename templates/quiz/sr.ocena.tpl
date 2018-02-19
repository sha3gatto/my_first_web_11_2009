{if ! is_array($v_ocena)}
	<p>{$v_ocena}</p>
	{html_image file='Obrazki/shit.jpg'}
{else}
	<h3>Liczba uzyskanych punktów: {$v_suma}</h3>
	<table>
		<tr>
			<th>Pytanie</th>
			<th>Odpowiedź</th>
			<th>Ocena</th>
			{foreach from=$v_ocena item=to}
				<tr>
					<td>{$to.pytanie}</td>
					<td>{$to.odp_usera}</td>
					<td>{$to.spr}</td>
				</tr>
			{/foreach}
		</tr>
	</table>
{/if}

<br />

<h3>Aktualna lista najlepszych</h3>

<table>
	<tr>
		<th>Nick</th>
		<th>Egzamin</th>
		<th>Data złożenia egzaminu</th>
		<th>Czas trwania egzaminu</th>
		{foreach from=$v_naj item=naj}
			<tr>
				<td>{$naj.nick}</td>
				<td>{$naj.id}</td>
				<td>{$naj.data}</td>
				<td>{$naj.czas}</td>
			</tr>
		{/foreach}
	</tr>
</table>

<br />

<a href="{$v_query_string_1}">Wybierz ponownie interesującą Cię epokę</a>
<br />
<br />
<a href="{$v_query_string_2}">Wyloguj się</a>
