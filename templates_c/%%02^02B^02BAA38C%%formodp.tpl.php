<?php /* Smarty version 2.6.26, created on 2009-10-04 15:41:33
         compiled from quiz/formodp.tpl */ ?>
<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>
<?php unset($this->_sections['odp']);
$this->_sections['odp']['name'] = 'odp';
$this->_sections['odp']['loop'] = is_array($_loop=$this->_tpl_vars['v_naz_odp']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['odp']['show'] = true;
$this->_sections['odp']['max'] = $this->_sections['odp']['loop'];
$this->_sections['odp']['step'] = 1;
$this->_sections['odp']['start'] = $this->_sections['odp']['step'] > 0 ? 0 : $this->_sections['odp']['loop']-1;
if ($this->_sections['odp']['show']) {
    $this->_sections['odp']['total'] = $this->_sections['odp']['loop'];
    if ($this->_sections['odp']['total'] == 0)
        $this->_sections['odp']['show'] = false;
} else
    $this->_sections['odp']['total'] = 0;
if ($this->_sections['odp']['show']):

            for ($this->_sections['odp']['index'] = $this->_sections['odp']['start'], $this->_sections['odp']['iteration'] = 1;
                 $this->_sections['odp']['iteration'] <= $this->_sections['odp']['total'];
                 $this->_sections['odp']['index'] += $this->_sections['odp']['step'], $this->_sections['odp']['iteration']++):
$this->_sections['odp']['rownum'] = $this->_sections['odp']['iteration'];
$this->_sections['odp']['index_prev'] = $this->_sections['odp']['index'] - $this->_sections['odp']['step'];
$this->_sections['odp']['index_next'] = $this->_sections['odp']['index'] + $this->_sections['odp']['step'];
$this->_sections['odp']['first']      = ($this->_sections['odp']['iteration'] == 1);
$this->_sections['odp']['last']       = ($this->_sections['odp']['iteration'] == $this->_sections['odp']['total']);
?>
	
	<p><?php echo $this->_tpl_vars['v_naz_odp'][$this->_sections['odp']['index']]; ?>
</p>
	
<?php endfor; endif; ?>