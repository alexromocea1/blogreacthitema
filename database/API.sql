DROP DATABASE IF EXISTS API;

CREATE DATABASE API;

CREATE TABLE api.App_user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    level VARCHAR(7) NOT NULL
);

CREATE TABLE api.bars (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  lieu varchar(255) NOT NULL,
  price float NOT NULL,
  date_creation date NOT NULL,
  description varchar(10000) NOT NULL,
  user VARCHAR(50) NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  adress VARCHAR(50) NOT NULL,
  zip_code int(7) NOT NULL,
  max_person int(4) NOT NULL,
  image VARCHAR(100) NOT NULL,
);

CREATE TABLE api.boites_de_nuit (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  lieu varchar(255) NOT NULL,
  price float NOT NULL,
  date_creation date NOT NULL,
  description varchar(10000) NOT NULL,
  user VARCHAR(50) NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  adress VARCHAR(50) NOT NULL,
  zip_code int(7) NOT NULL,
  max_person int(4) NOT NULL,
  image VARCHAR(100) NOT NULL,
);

CREATE TABLE api.Location_salle (
	location_Id INT auto_increment NOT NULL,
	user_Id INT NOT NULL,
	bar_Id INT,
  bn_Id INT,
  price FLOAT  NOT NULL,
	location_Date DATETIME NOT NULL,
  person_nbr INT,
	CONSTRAINT Location_PK PRIMARY KEY (location_Id),
  CONSTRAINT Location_FK FOREIGN KEY (User_Id) REFERENCES App_user(id),
	CONSTRAINT Location_FK_1 FOREIGN KEY (bar_Id) REFERENCES bars(id),
  CONSTRAINT Location_FK_2 FOREIGN KEY (bn_Id) REFERENCES boites_de_nuit(id)
);

CREATE TABLE api.comments_bars (
  comment_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  comment_description varchar(2500) NOT NULL,
  reviews INT NOT NULL,
  user VARCHAR(50) NOT NULL,
  Bars_id INT NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  FOREIGN KEY (Bars_id) REFERENCES API.bars(id),
  date_creation date NOT NULL
);

CREATE TABLE api.comments_boites_de_nuit (
  comment_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  comment_description varchar(2500) NOT NULL,
  reviews INT NOT NULL,
  user VARCHAR(50) NOT NULL,
  boites_de_nuit_id INT NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  FOREIGN KEY (boites_de_nuit_id) REFERENCES API.boites_de_nuit(id),
  date_creation date NOT NULL
);


-- hachage du mot de passe : algorithme argon2
INSERT INTO App_user
VALUE ( NULL, 'admin', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw','admin' );

CREATE TABLE `calendar` (
`cdate` date NOT NULL,
PRIMARY KEY (`cdate`)
) ;

CREATE TABLE ints (i INTEGER);
INSERT INTO ints VALUES (0), (1), (2), (3), (4), (5), (6), (7), (8), (9);

INSERT INTO calendar (cdate)
SELECT cal.date as cdate
FROM (
SELECT '2005-01-01' + INTERVAL d.i*1000 + c.i* 100 + a.i * 10 + b.i DAY as date
FROM ints a JOIN ints b JOIN ints c JOIN ints d
ORDER BY d.i*1000 + c.i*100 + a.i*10 + b.i) cal
WHERE cal.date BETWEEN '2005-01-01' AND '2030-12-31' 
