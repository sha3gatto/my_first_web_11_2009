<form action="index.php" method="post">
	<p>Żeby się zalogować, podaj nick i hasło:</p>
	<input type="hidden" name="v_modul" value="quiz" />
	<input type="hidden" name="v_akcja" value="spr_login" />
	<p>Nick: <input type="text" name="nick" maxlength="20" size="20" /></p>
	<p>Hasło: <input type="password" name="password" maxlength="20" size="20" /></p>
	<input type="submit" value="Zaloguj się"/>
</form>
