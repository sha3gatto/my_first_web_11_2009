<?php /* Smarty version 2.6.31, created on 2018-02-19 18:13:46
         compiled from quiz/sr.spr.danych.tpl */ ?>
<?php if (is_array ( $this->_tpl_vars['v_spr_dane'] )): ?>

<ol>
<?php $_from = $this->_tpl_vars['v_spr_dane']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a_error']):
?>
<li>Wyjaśnienie błędu: <?php echo $this->_tpl_vars['a_error']; ?>
.</li>
<?php endforeach; endif; unset($_from); ?>
</ol> 

<p>Dane nie zostały poprawnie zarejestrowane.</p>
<p>Gdy Ci 5 sekund stoi, <a href="<?php echo $this->_tpl_vars['v_query_string']; ?>
">dotknij tutaj</a>.</p>

<?php else: ?>

<p>Dane użytkownika <?php echo $this->_tpl_vars['v_spr_dane']; ?>
 właśnie zostały poprawnie zarejestrowane.</p>
<p>Gdy Ci 5 sekund stoi przeglądarka, <a href="<?php echo $this->_tpl_vars['v_query_string']; ?>
">dotknij tutaj</a>.</p>

<?php endif; ?>