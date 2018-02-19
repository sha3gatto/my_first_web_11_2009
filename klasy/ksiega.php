<?php
class ksiega {

	public static function wyslanie_wiad($nick, $email, $wiad_wrap) {
		DB::conn()->setFetchMode(ADODB_FETCH_ASSOC);
		$sql = 'INSERT INTO ksiega (user_id, email, wiadomosc) VALUES ((SELECT id FROM user where nick=?), ?, ?)';
		$stmt = DB::conn()->Prepare($sql);
		$arr = array((string)$nick, (string)$email, (string)$wiad_wrap);
		return DB::conn()->Execute($stmt, $arr);
	}
	
	public static function odczyt_ksiegi() {
		 return DB::conn()->GetAll("SELECT u.nick, k.wiadomosc, k.data as data from ksiega AS k INNER JOIN user AS u ON k.user_id=u.id ORDER BY data DESC");
	}
}
?>
