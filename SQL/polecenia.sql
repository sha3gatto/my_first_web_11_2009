mysql -u root -p
CREATE USER 'usernick'@'localhost' IDENTIFIED BY 'pass';
GRANT ALL ON *.* TO 'usernick'@'localhost';
CREATE DATABASE quiz;
mysql -u usernick -p quiz

SHOW VARIABLES WHERE Variable_name LIKE 'character\_set\_%' OR Variable_name LIKE 'collation%';

SELECT CONCAT('ALTER TABLE', TABLE_NAME,'CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;') AS mySQL FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA= "quiz" AND TABLE_TYPE="BASE TABLE";

sudo vim /etc/mysql/my.cnf
	[client]
	default-character-set = utf8mb4

	[mysql]
	default-character-set = utf8mb4

	[mysqld]
	character-set-client-handshake = FALSE
	character-set-server = utf8mb4
	collation-server = utf8mb4_unicode_ci

sudo service mysql restart














INSERT INTO epoki (epoka, epoka_poczatek) values ('Królestwo Polskie po kongresie wiedeńskim', 1815);

UPDATE epoki SET epoka='Królestwo Polskie po kongresie wiedeńskim' WHERE id=1;


