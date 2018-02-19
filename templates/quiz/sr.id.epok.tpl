<p>Wyszukaj interesującą Cię epokę historyczną.</p><br />

<form action="index.php" method="post">

	<p><input type="hidden" name="v_modul" value="quiz" /></p>
	<p><input type="hidden" name="v_akcja" value="wsad_egzamin" /></p>

	<ol>
		{foreach from=$tab_epoki key=a_id item=a_epoka}
			<li>{html_radios name="v_epoka_id" values=$a_id output=$a_epoka.epoka separator='<br />'}</li>
		{/foreach}
	</ol>
	
<input type="submit" value="Zatwierdź wybór" />

</form>
