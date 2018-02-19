<?php /* Smarty version 2.6.31, created on 2018-02-18 23:35:25
         compiled from ksiega/sr.errors.tpl */ ?>
<p>Wystąpiły błędy</p>

<ol>
<?php $_from = $this->_tpl_vars['v_errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a_error']):
?>
<li>Wyjaśnienie błędu: <?php echo $this->_tpl_vars['a_error']; ?>
.</li>
<?php endforeach; endif; unset($_from); ?>
</ol>

<p>Za 5 sekund przeglądarka przekieruje Cię na główną stronę Księgi opinii.</p>