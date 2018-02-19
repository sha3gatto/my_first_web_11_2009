<form action="index.php" method="post">
	<p>Żeby się zarejestrować, podaj nick i hasło:</p>
	<input type="hidden" name="v_modul" value="quiz" />
	<input type="hidden" name="v_akcja" value="pobor_danych" />
	<p><label for="nick">Nick:</label>
	<input type="text" name="nick" size="20" maxlength="20" /></p>
	<p><label for="password">Hasło:</label>
	<input type="password" name="password" size="20" maxlength="20" /></p>
	<input type="submit" value="Zarejestruj się"/>
</form>
