{if is_array($v_spr_dane)}

<ol>
{foreach from=$v_spr_dane item=a_error}
<li>Wyjaśnienie błędu: {$a_error}.</li>
{/foreach}
</ol> 

<p>Dane nie zostały poprawnie zarejestrowane.</p>
<p>Gdy Ci 5 sekund stoi, <a href="{$v_query_string}">dotknij tutaj</a>.</p>

{else}

<p>Dane użytkownika {$v_spr_dane} właśnie zostały poprawnie zarejestrowane.</p>
<p>Gdy Ci 5 sekund stoi przeglądarka, <a href="{$v_query_string}">dotknij tutaj</a>.</p>

{/if}
