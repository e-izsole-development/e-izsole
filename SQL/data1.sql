USE `e-izsole`;

INSERT INTO dbo_users (`id`,`name`,`surname`,`country`,`city`,`adress`,`phone_number`,`mobile_operator`,`e_mail`,`username`,`password`,`user_type`,`currency`,`language`) VALUES
(1,'Vitalijs','Flinstouns','Latvija','Daugavpils','Energetiku 5 - 6','+37128650347',1,'worm333@inbox.lv','vita1ij','gfhjkm123','a',2,2),
(2,'Janis','Petrovs','Latvija','Riga','Zellu 5-56','+37128311093',1,'kimanx@inbox.lv','kimanx','qwerty','m',2,2),
(3,'Katerina','Maliseva','Lietuva','Visaginas','Pienas 65','+37128237862',2,'katerinkamardusevish@inbox.lv','kitkat','123','r',2,2),
(4,'Tatjana','Kastaneda','Igaunija','Tartu','ulica 4 - 5','+37239574374',1,'zev333@gmail.com','zev','zev123','r',2,2),
(5,'Vladislavs','Gruzis','Latvija','Liepaja','Rigas 66 - 6','+37256774374',2,'asd@foo.ba','qwe','asd','r',1,1),
(6,'Oskars','Pigulis','Lietuva','Vilnius','Miera 54-2','+37239574234',2,'foo@bar.com','jkdfh','qwef','r',1,2),
(7,'Edgars','Stucka','Latvija','Riga','Daugavpils 4-4','+37188476333',2,'booo@lin.lv','boogaga','dqwjh23','m',2,1),
(8,'Toms','Caks','Latvija','Riga','Elizabetes 31-3','+37123434688',1,'nemo@inbox.com','nemo','1q2w3e3r4','r',1,2),
(9,'Aleksandrs','Berzins','Igaunija','Tartu','Ziieduu 6-5','+37298978765',0,'kim@gagarin.lv','gagarin','w##w','r',1,2),
(10,'Oskars','Kivi','Latvija','Daugavpils','Smilsu 65 - 7','+37122345678',1,'ggg@gmail.com','fiba','oijqw','r',2,2),
(11,'Arnolds','Lacuks','Latvija','Ventspils','Marijas 4-5','+37121345876',1,'sudk@gmail.com','sudoku','q@w@q','r',2,2);

INSERT INTO dbo_categories(`id`,`title`,`language`) VALUES
(1,'jewerly',2),
(2,'phones',2),
(3,'cars',2),
(4,'electronics',2),
(5,'toys',2),
(6,'books',2),
(7,'clothes',2),
(8,'art',2);

INSERT INTO dbo_parameters(`id`,`category`,`title`,`language`) VALUES
(1,2,'Model',2),
(2,2,'Weight',2),
(3,2,'Has WiFi',2),
(4,2,'Has Bluetooth',2),
(5,2,'Color',2),
(6,6,'Author',2),
(7,6,'Title',2),
(8,6,'Pages',2),
(9,6,'Hard Cover',2);

INSERT INTO dbo_items (`id`,`seller_id`,`title`,`Auction`,`price`,`category`,`winner`) VALUES
(1,1,'War of the Worlds',1,3,6,0),
(2,2,'Roses are red, Violets are blue',0,1,6,0),
(3,3,'Story about 3 pigs',0,1,6,0),
(4,4,'Nokia 3310',0,9,2,0),
(5,5,'Nokia 5800',1,10,2,0);

INSERT INTO dbo_parameter_values (`id`,`parameter`,`value`,`item_id`,`language`) VALUES
(1,6,'Herbert Wells',1,2),
(2,7,'War of the worlds',1,2),
(3,8,'500',1,2),
(4,9,'yes',1,2),
(5,6,'Unknown',2,2),
(6,7,'Roses are red, Violets are blue',2,2),
(7,8,'200',2,2),
(8,9,'No',2,2),
(9,6,'People',3,2),
(10,7,'Story about 3 pigs',3,2),
(11,8,'10',3,2),
(12,9,'No',3,2),
(13,1,'Nokia 3310',4,2),
(14,2,'150g',4,2),
(15,3,'No',4,2),
(16,4,'No',4,2),
(17,5,'Red',4,2),
(18,1,'Nokia 5800',5,2),
(19,2,'160g',5,2),
(20,3,'Yes',5,2),
(21,4,'Yes',5,2),
(22,5,'black',5,2);


INSERT INTO dbo_item_description(`id`,`description`,`short_description`) VALUES
(1,'Its a fucking amazing book about alien mashiens on three feet!!!','Great fantastic book'),
(2,'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah book about blah blah blah blah blah.','boooooook'),
(3,'Brilliant tale for young children','Tale'),
(4,'phone without colors','Unbrokable'),
(5,'unfortunately broken','phone with colors))');