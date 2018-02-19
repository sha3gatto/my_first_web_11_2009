<?php /* Smarty version 2.6.31, created on 2018-02-19 14:52:54
         compiled from quiz/sr.spr.loginu.tpl */ ?>
<?php if (is_array ( $this->_tpl_vars['v_dane_log'] )): ?>

<?php $_from = $this->_tpl_vars['v_dane_log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a_error']):
?>
<p>Wyjaśnienie błędu: <?php echo $this->_tpl_vars['a_error']; ?>
.</p>
<?php endforeach; endif; unset($_from); ?>
<br />
<br />

<p>Gdy Ci 5 sekund stoi, <a href="<?php echo $this->_tpl_vars['v_query_string']; ?>
">dotknij tutaj</a>.</p>

<?php else: ?>

<p>Użytkownik <?php echo $this->_tpl_vars['v_dane_log']; ?>
 został zalogowany do ścięcia.</p>

<p>Gdy Ci 5 sekund stoi przeglądarka, <a href="<?php echo $this->_tpl_vars['v_query_string']; ?>
">dotknij tutaj</a>.</p>

<?php endif; ?>