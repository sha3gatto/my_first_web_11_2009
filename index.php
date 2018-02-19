<?php
require_once('konfiguracja/smarty.inc.php');
require_once('klasy/db.php');
require_once('klasy/session.php');
require_once('klasy/na_rzym.php');

$date = new DateTime('now', new DateTimeZone('Europe/Warsaw'));

if (!isset($_REQUEST['v_modul'])) {
	$v_modul = 'home';	
} else {
	$v_modul = $_REQUEST['v_modul'];		
}

switch($v_modul) {
	case 'home':
		require_once('moduly/home.php');
	break;
	
	case 'quiz':
		require_once('moduly/quiz.php');
	break;

	case 'ksiega':
		require_once('moduly/ksiega.php');
	break;
	
	case 'about':
		require_once('moduly/home.php');
	break;
	default:
		header("Location: index.php?v_modul=home");
		exit();
}

$rok = convertToRoman(2009);
$smarty->assign('v_rok', $rok);
$smarty->display('index.tpl');
?>
