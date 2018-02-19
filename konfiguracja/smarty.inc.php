<?php
require('Smarty/libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->cache_dir = 'cache';
//$smarty->config_dir = '/web/www.domain.com/smarty/configs';
?>
