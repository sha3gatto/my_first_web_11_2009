<?php
require_once('adodb5/adodb.inc.php');

class DB {
	private static $o_db;

	private function __construct() {}

	public static function conn() {
		if (self::$o_db==null) {
			self::$o_db=ADONewConnection('mysqli');
			//self::$o_db->debug=true;
			self::$o_db->Connect('localhost','usernick','pass','quiz');
			if (!self::$o_db->IsConnected()) {
				echo 'Brak polaczenia z baza';
				exit();
			}
		}
		return self::$o_db;
	}
}
?>
