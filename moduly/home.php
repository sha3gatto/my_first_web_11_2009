<?php
if (!isset($_REQUEST['v_akcja'])) {
  $v_akcja = 'home';	
} else {
  $v_akcja = $_REQUEST['v_akcja'];		
}

switch($v_akcja) {
	case 'home':
		$smarty->assign('v_head', 'home/head.tpl');
		$smarty->assign('v_srodek','home/glowna.tpl');
	break;
	
	case 'about':
		$smarty->assign('v_head', 'about/head.tpl');
		$smarty->assign('v_srodek','about/glowna.tpl');
	break;

	default:
		header("Location: index.php?v_modul=home");
		exit();
}
?>
