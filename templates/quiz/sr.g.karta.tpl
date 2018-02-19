<table>
	<tr>
		{foreach from=$v_content_epoki item=a_dane_epoki}
			<td>
				<img src='Obrazki/{$a_dane_epoki.link_do_obrazka}' alt='{$a_dane_epoki.tytul_obrazka}' />
				<p>{$a_dane_epoki.tytul_obrazka}; <br /> twórca {$a_dane_epoki.autor_obrazka}</p>
			</td>
		{/foreach}
	</tr>
</table>


<h4>Pytania:</h4>

<form action="index.php" method="post">
	<input type="hidden" name="v_modul" value="quiz" />
	<input type="hidden" name="v_akcja" value="ocen" />
		<table>
		{foreach from=$v_naz_pytan item=co}
			<tr>
				<td>{$co.pytanie}
					<ul>
						<li><input type="radio" name='a_odp[{$co.id}]' value='a' />{$co.a}</li>
						<li><input type="radio" name='a_odp[{$co.id}]' value='b' />{$co.b}</li>
						<li><input type="radio" name='a_odp[{$co.id}]' value='c' />{$co.c}</li>
						<li><input type="radio" name='a_odp[{$co.id}]' value='d' />{$co.d}</li>
					</ul>
				</td>
			</tr>
		{/foreach}
	</table>
	<br />
	<input type="submit" value="Zatwierdź wybór" />
</form>
<br /><br />
<a href="{$v_query_string_1}">Wybierz ponownie interesującą Cię epokę</a>
<br />
<br />
<a href="{$v_query_string_2}">Wyloguj się</a>
