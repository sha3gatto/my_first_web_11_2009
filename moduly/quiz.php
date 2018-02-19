<?php
require('klasy/quiz.php');

switch($_REQUEST['v_akcja']) {
	case 'logowanie':
		$data = Session::getInstance();

		if (isset($data->spr_dane) && !is_array($data->spr_dane)) {
			$query_string_1 = htmlentities('index.php?v_modul=quiz&v_akcja=epoki');
			$query_string_2 = htmlentities('index.php?v_modul=ksiega&v_akcja=ksiega');
			$query_string_3 = htmlentities('index.php?v_modul=quiz&v_akcja=wylogowanie');
			
			$smarty->assign('v_head', 'quiz/h.zalog.tpl');
			$smarty->assign('v_nick', $data->spr_dane);
			$smarty->assign('v_query_string_1', $query_string_1);
			$smarty->assign('v_query_string_2', $query_string_2);
			$smarty->assign('v_query_string_3', $query_string_3);
			$smarty->assign('v_srodek', 'quiz/sr.zalog.tpl');
		} else {
			$query_string_1 = htmlentities('index.php?v_modul=quiz&v_akcja=podaj_login');
			$query_string_2 = htmlentities('index.php?v_modul=quiz&v_akcja=rejestracja');

			$smarty->assign('v_head', 'quiz/h.form.ogolny.tpl');
			$smarty->assign('v_query_string_1', $query_string_1);
			$smarty->assign('v_query_string_2', $query_string_2);
			$smarty->assign('v_srodek', 'quiz/sr.form.ogolny.tpl');
		}
	break;

	case 'podaj_login':
		$smarty->assign('v_head', 'quiz/h.form.login.tpl');
		$smarty->assign('v_srodek', 'quiz/sr.form.login.tpl');
	break;
	
	case 'spr_login':
		$data = Session::getInstance();
		
		$nick_log = (isset($_POST['nick'])) ? trim($_POST['nick']) : '';
		$pass_log = (isset($_POST['password'])) ? $_POST['password'] : '';
		
		header('Refresh: 5; URL=index.php?v_modul=quiz&v_akcja=logowanie');
		
		$dane_log = quiz::spr_loginu($nick_log, $pass_log);
		
		$data->spr_dane = $dane_log;
		
		$query_string = htmlentities('index.php?v_modul=quiz&v_akcja=logowanie');
		
		$smarty->assign('v_head', 'quiz/h.spr.loginu.tpl');
		$smarty->assign('v_dane_log', $dane_log);
		$smarty->assign('v_query_string', $query_string);
		$smarty->assign('v_srodek', 'quiz/sr.spr.loginu.tpl');
	break;

	case 'rejestracja':
		$smarty->assign('v_head', 'quiz/h.form.rejestr.tpl');
		$smarty->assign('v_srodek', 'quiz/sr.form.rejestr.tpl');
	break;
	
	case 'pobor_danych':
		$data = Session::getInstance();

		$nick = (isset($_POST['nick'])) ? trim($_POST['nick']) : '';
		$pass = (isset($_POST['password'])) ? $_POST['password'] : '';

		header('Refresh: 5; URL=index.php?v_modul=quiz&v_akcja=logowanie');

		$spr_dane = quiz::spr_danych($nick, $pass);

		$data->spr_dane = $spr_dane;
		
		$query_string = htmlentities('index.php?v_modul=quiz&v_akcja=logowanie');
		
		$smarty->assign('v_head', 'quiz/h.spr.danych.tpl');
		$smarty->assign('v_spr_dane', $spr_dane);
		$smarty->assign('v_query_string', $query_string);
		$smarty->assign('v_srodek', 'quiz/sr.spr.danych.tpl');
	break;

	case 'epoki':
		#v_modul=quiz&v_akcja=epoki&v_epoka_id=2
		$tab_epoki = quiz::epoki();

		$smarty->assign('v_head', 'quiz/h.id.epok.tpl');
		$smarty->assign('tab_epoki', $tab_epoki);
		$smarty->assign('v_srodek', 'quiz/sr.id.epok.tpl');
	break;

	case 'wsad_egzamin':
		$data = Session::getInstance();
		
		$nick_sess = $data->spr_dane;
		$v_epoka_id = (isset($_POST['v_epoka_id']) ? $_POST['v_epoka_id'] : 2);
		
		$last_id_egz = quiz::wsad_egzamin($nick_sess, $v_epoka_id);
		
		$data->last_id_egz = $last_id_egz;
		
		$query_string = htmlentities('index.php?v_modul=quiz&v_akcja=pytania');
				
		header('Refresh: 5; URL=index.php?v_modul=quiz&v_akcja=pytania');

		$smarty->assign('v_head', 'quiz/h.egzamin.tpl');
		$smarty->assign('v_last_id_egz', $last_id_egz);
		$smarty->assign('v_query_string', $query_string);
		$smarty->assign('v_srodek', 'quiz/sr.egzamin.tpl');
	break;

	case 'pytania':
		$data = Session::getInstance();
		
		$id_egz = $data->last_id_egz;
		
		$nazwa_epoki = quiz::pokaz_nazwe_epoki($id_egz);
		
		$content_epoki = quiz::pokaz_content_epoki($id_egz);

		$iv_ile_pytan = 5;
		$id_los_pytan = quiz::wylosuj_id_pytan($id_egz, $iv_ile_pytan);
				
		$naz_pytan = quiz::pytania($id_los_pytan);
		if ($naz_pytan === null) {
			header('Refresh: 3; URL=index.php?v_modul=quiz&v_akcja=epoki');
		}
		$query_string_1 = htmlentities('index.php?v_modul=quiz&v_akcja=epoki');
		$query_string_2 = htmlentities('index.php?v_modul=quiz&v_akcja=wylogowanie');
		
		$smarty->assign('v_head', 'quiz/h.g.karta.tpl');
		$smarty->assign('v_content_epoki', $content_epoki);
		$smarty->assign('v_nazwa_epoki', $nazwa_epoki);
		$smarty->assign('v_naz_pytan', $naz_pytan);
		$smarty->assign('v_query_string_1', $query_string_1);
		$smarty->assign('v_query_string_2', $query_string_2);
		$smarty->assign('v_srodek', 'quiz/sr.g.karta.tpl');
	break;

	case 'ocen':
		$data = Session::getInstance();
		
		$nick_sess = $data->spr_dane;

		//v_modul=quiz&v_akcja=ocen&a_odp[17]=b&a_odp[20]=a&a_odp[21]=d&a_odp[23]=b&a_odp[26]=c

		$a_odp = (!empty($_POST['a_odp']) && is_array($_POST['a_odp'])) ? $_POST['a_odp'] : '';
			
		$ocena = quiz::egzamin($a_odp);
		
		$suma = quiz::suma_pkt();
		
		$naj = quiz::najlepsi();

		$query_string_1 = htmlentities('index.php?v_modul=quiz&v_akcja=epoki');
		$query_string_2 = htmlentities('index.php?v_modul=quiz&v_akcja=wylogowanie');

		$smarty->assign('v_head', 'quiz/h.ocena.tpl');
		$smarty->assign('v_ocena', $ocena);
		$smarty->assign('v_suma', $suma);
		$smarty->assign('v_nick_sess', $nick_sess);
		$smarty->assign('v_naj', $naj);
		$smarty->assign('v_query_string_1', $query_string_1);
		$smarty->assign('v_query_string_2', $query_string_2);
		$smarty->assign('v_srodek', 'quiz/sr.ocena.tpl');
	break;
	
	case 'wylogowanie':
		$data = Session::getInstance();
		$data->destroy();
		header("Refresh: 5; URL=index.php?v_modul=home");
		
		$query_string = htmlentities('index.php?v_modul=home');
		
		$smarty->assign('v_head', 'quiz/h.wylogowanie.tpl');
		$smarty->assign('v_query_string', $query_string);
		#$smarty->compile_check = true;
		#$smarty->debugging = true;
		$smarty->assign('v_srodek', 'quiz/sr.wylogowanie.tpl');
	break;
	
	default:
		header("Location: index.php?v_modul=home");
		exit();
}
?>
