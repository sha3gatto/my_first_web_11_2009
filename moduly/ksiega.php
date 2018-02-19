<?php
require('klasy/ksiega.php');

switch($_REQUEST['v_akcja']) {
	case 'ksiega':
		$data = Session::getInstance();

		if (isset($data->spr_dane) && !is_array($data->spr_dane)) {

			$odczyt_wiad = ksiega::odczyt_ksiegi();
			
			$query_string = htmlentities('index.php?v_modul=quiz&v_akcja=wylogowanie');

			$smarty->assign('v_head', 'ksiega/h.glowna.tpl');
			$smarty->assign('v_nick', $data->spr_dane);
			$smarty->assign('v_odczyt_wiad', $odczyt_wiad);
			$smarty->assign('v_query_string', $query_string);
			$smarty->assign('v_srodek','ksiega/sr.glowna.tpl');
		} else {
			header("Location: index.php?v_modul=quiz&v_akcja=logowanie");
			exit();
		}
	break;

	case 'wiadomosc':
		$nick = $_POST['nick'];
		
		$sanitize_e = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$validate_e = filter_var($sanitize_e, FILTER_VALIDATE_EMAIL);
		$email = (isset($_POST['email'])) ? $validate_e : '';

		$sanitize_w = filter_var($_POST['wiad'], FILTER_SANITIZE_STRING);
		$wiad = (isset($_POST['wiad'])) ? $sanitize_w : '';
		$wiad_wrap = wordwrap($wiad, 30, ' ', true);

		$errors = array();
			if (empty($wiad)) {
					$errors[] = 'wysłano pustą wiadomość';
			}
			if ($email == false) {
				$errors[] = 'podano nieprawidłowy e-mail';
			}
			if (!empty($errors)) {
				header("Refresh: 5; URL=index.php?v_modul=ksiega&v_akcja=ksiega");
				$smarty->assign('v_head', 'ksiega/h.errors.tpl');
				$smarty -> assign('v_errors', $errors);
				$smarty->assign('v_srodek','ksiega/sr.errors.tpl');
			} else {
				ksiega::wyslanie_wiad($nick, $email, $wiad_wrap);
				header("Location: index.php?v_modul=ksiega&v_akcja=ksiega");
				exit();
			}
	break;
	default:
		header("Location: index.php?v_modul=home");
		exit();
}
?>
