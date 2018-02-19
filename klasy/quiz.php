<?php

class quiz {
	
	public static function spr_danych($nick, $pass) {
		$errors = array();
		if (empty($nick)) {
			$errors[] = 'pole nick musi być wypełnione';
		}
		if (mb_strlen($nick, 'utf-8') > 10) {
			$errors[] = 'w pole nick można wpisać tylko 10 znaków';
		}
		if (mb_strlen($pass, 'utf-8') > 10) {
			$errors[] = 'w pole hasło można wpisać tylko 10 znaków';
		}
		if (empty($pass)) {
			$errors[] = 'pole hasło musi być wypełnione';
		}

		DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
		$sql = 'SELECT nick FROM user WHERE nick=?';
		$stmt = DB::conn()->Prepare($sql);
		$arr = array((string)$nick);
		$spr_nick = DB::conn()->GetOne($stmt, $arr);
		
		if (!empty($spr_nick)) {
			$errors[] = "użytkownik ".$spr_nick." jest już zarejestrowany";
		}
		
		if (empty($errors) && empty($spr_nick)) {
			$cicho_pass = sha1($pass); 
			
			DB::conn()->BeginTrans();
			DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
			$sql = 'INSERT INTO user (nick, password) VALUES (?, ?)';
			$stmt = DB::conn()->Prepare($sql);
			$arr = array((string)$nick, $cicho_pass);
			DB::conn()->Execute($stmt, $arr);
			$nickfil = DB::conn()->GetOne('SELECT nick from user where id=LAST_INSERT_ID()');
			DB::conn()->CommitTrans();
			return $nickfil;

		} elseif (count($errors) > 0) {
			return $errors;
		}
	}

	public static function spr_loginu($nick_log, $pass_log) {
				
		$errors = array();
		
		if (empty($nick_log)) {
			$errors[] = 'nie podano loginu';
		}
		if (empty($pass_log)) {
			$errors[] = 'nie podano hasła';
		}
		if (mb_strlen($nick_log, 'utf-8')>10) {
			$errors[] = 'login musi mieć 10 znaków';
		}
		if (mb_strlen($pass_log, 'utf-8')>10) {
			$errors[] = 'hasło musi mieć 10 znaków';
		}		
		
//SELECT nick, password FROM user WHERE nick=? OR password=?
		DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
		$sql = 'SELECT nick FROM user WHERE nick=?';
		$stmt = DB::conn()->Prepare($sql);
		$arr = array((string)$nick_log);
		$spr_nick_log = DB::conn()->GetOne($stmt, $arr);

		if (empty($spr_nick_log)) {
			$errors[] = 'nie dostarczono loginu';
		}
		$cicho_pass_log = sha1($pass_log);
		
		DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
		$sql = 'SELECT password FROM user WHERE password = ?';
		$stmt = DB::conn()->Prepare($sql);
		$arr = array($cicho_pass_log);
		$spr_pass_log =  DB::conn()->GetOne($stmt, $arr);
		
		if (empty($spr_pass_log)) {
			$errors[] = 'nie dostarczono hasła';
		}
		
		if (empty($errors)) {
			return $spr_nick_log;
		} elseif (count($errors) > 0) {		
			return $errors;
		}
	}

	public static function epoki() {
		return DB::conn()->GetAssoc('SELECT id, epoka FROM epoki ORDER BY epoka_poczatek',false,true);
	}
	
	public static function wsad_egzamin($nick_sess, $v_epoka_id) {
			DB::conn()->BeginTrans();
			DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
			$sql = 'INSERT INTO egzamin (epoka_id, user_id) VALUES (?, (select id from user where nick=?))';
			$stmt = DB::conn()->Prepare($sql);
			$arr = array($v_epoka_id, $nick_sess);
			DB::conn()->Execute($stmt, $arr);
			$last_id_egz = DB::conn()->GetOne('SELECT id from egzamin where id=LAST_INSERT_ID()');
			DB::conn()->CommitTrans();
			return $last_id_egz;
	}
	
	public static function pokaz_nazwe_epoki($id_egz) {
		DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
		$sql = 'SELECT epoka FROM epoki where id=(select epoka_id from egzamin where id=?)';
		$stmt = DB::conn()->Prepare($sql);
		$arr = array($id_egz);
		return DB::conn()->GetOne($stmt, $arr);
	}	
	
	public static function pokaz_content_epoki($id_egz) {
		DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
		$sql = 'SELECT epcon.id, epcon.link_do_obrazka, epcon.tytul_obrazka, epcon.autor_obrazka FROM egzamin AS egz INNER JOIN epoka_content AS epcon ON epcon.epoka_id=egz.epoka_id AND egz.id=?';
		$stmt = DB::conn()->Prepare($sql);
		$arr = array($id_egz);
		return DB::conn()->GetAssoc($stmt, $arr);
	}

	public static function wylosuj_id_pytan($id_egz, $iv_ile_pytan) {
//wyciagnij wszystkie pytania z określonego egzaminu (np. 101)
		DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
		$sql = 'SELECT pyt.id FROM egzamin AS egz JOIN pytania AS pyt ON pyt.epoka_id=egz.epoka_id AND egz.id=?';
		$stmt = DB::conn()->Prepare($sql);
		$arr = array($id_egz);
		$arr_query =  DB::conn()->GetCol($stmt, $arr);
		
		if (!empty($arr_query)) {
			shuffle($arr_query);

			$arr_id_los = array();
			for($i = 0; $i < $iv_ile_pytan; $i++) {
				$arr_id_los[$arr_query[$i]] = $arr_query[$i];
			}
			return $arr_id_los;
		} else {
			return null;
		}
	}
	
	public static function pytania($id_los_pytan) {
		$wypelniacz = array();
		$tab = array();

		#unset($id_los_pytan);
		if (isset($id_los_pytan)) {
			foreach ($id_los_pytan as $id_los) {
				$wypelniacz[] = 'id=?';
				$tab[] = sprintf("%u", $id_los);
			}
			DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
			$sql = 'SELECT * FROM pytania WHERE '.implode(' or ', $wypelniacz);
			$stmt = DB::conn()->Prepare($sql);
			$tab_pyt = DB::conn()->GetAll($stmt, $tab);
	        return $tab_pyt;
		} else {
			return null;
		}
	}
	
	public static function egzamin($a_odp) {
		
		$errors = '';
		
		if (empty($a_odp)) {
			$errors = "Just enjoy this shit.";
		}

//wystarczy tylko jedno zapytanie		
//SELECT MAX(id) FROM egzamin
		if (empty($errors)) {
			//Sprawdza, czy id egzaminu już istnieje w tabeli odp_user
			$v_egzamin_id = DB::conn()->GetOne("SELECT MAX(id) FROM egzamin"); //62
			$odp_user_egz_id = DB::conn()->GetOne("SELECT MAX(egzamin_id) FROM odp_user"); //61

			//Gdyby id egzaminu było tożsame ze swoim odpowiednikiem w tabeli odp_user, to operacja by się już nie wykonała - id egzaminu będzie ustanowione raz.
			if ($v_egzamin_id !== $odp_user_egz_id) {
				$tab = array();
				foreach ($a_odp as $pyt_id=>$odp) {
					$tab[] = sprintf("($v_egzamin_id, %u, '%s')", $pyt_id, $odp);
				}
				DB::conn()->Execute("INSERT INTO odp_user (egzamin_id, pytanie_id, odp_usera) VALUES ".implode(',', $tab));
			}
			$ocena = DB::conn()->GetAssoc("SELECT pyt.pytanie, odp.odp_usera, (CASE WHEN odp.odp_usera = pyt.prawda THEN 'dobrze' ELSE 'źle' END) AS spr FROM odp_user AS odp JOIN pytania AS pyt ON odp.pytanie_id=pyt.id AND egzamin_id='".$v_egzamin_id."'");
			return $ocena;
		} elseif (count($errors) > 0) {
			return $errors;
		}
	}

/*
SELECT count('spr') AS suma, (CASE WHEN W.odp_gracza = P.wynik THEN 1 ELSE 0 END) AS spr
FROM do_oceny AS W JOIN pytanie AS P
ON W.pytanie_id=P.id
AND W.odp_gracza=P.wynik
AND egzamin_id=(SELECT MAX(id) FROM egzamin) group by W.odp_gracza, P.wynik;
*/
	public static function suma_pkt() {
		$v_egzamin_id = DB::conn()->GetOne("SELECT MAX(id) FROM egzamin");
		$suma = DB::conn()->GetOne("SELECT count('spr') AS suma, (CASE WHEN odp.odp_usera = pyt.prawda THEN 1 ELSE 0 END) AS spr FROM odp_user AS odp JOIN pytania AS pyt ON odp.pytanie_id=pyt.id AND odp.odp_usera=pyt.prawda AND egzamin_id='".$v_egzamin_id."'");
		return $suma;
	}

	public static function najlepsi() {
		$naj = DB::conn()->GetAll("SELECT nick, egz.id, (CASE WHEN ou.odp_usera= pyt.prawda THEN 'All correct' END) AS 'check', egz.data as data, TIMEDIFF(ou.data, egz.data) as czas FROM user AS u INNER JOIN egzamin AS egz ON u.id=egz.user_id INNER JOIN odp_user AS ou ON ou.egzamin_id=egz.id INNER JOIN pytania AS pyt ON ou.pytanie_id=pyt.id AND ou.odp_usera=pyt.prawda GROUP BY nick, egzamin_id HAVING COUNT(pytanie_id)=5 ORDER BY egz.data DESC LIMIT 7");
		return $naj;
	}
} //koniec klasy
?>
