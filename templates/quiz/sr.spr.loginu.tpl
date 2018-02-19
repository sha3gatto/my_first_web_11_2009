{if is_array($v_dane_log)}

{foreach from=$v_dane_log item=a_error}
<p>Wyjaśnienie błędu: {$a_error}.</p>
{/foreach}
<br />
<br />

<p>Gdy Ci 5 sekund stoi, <a href="{$v_query_string}">dotknij tutaj</a>.</p>

{else}

<p>Użytkownik {$v_dane_log} został zalogowany do ścięcia.</p>

<p>Gdy Ci 5 sekund stoi przeglądarka, <a href="{$v_query_string}">dotknij tutaj</a>.</p>

{/if}
