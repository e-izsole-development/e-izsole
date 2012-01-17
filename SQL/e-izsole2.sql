CREATE TABLE IF NOT EXISTS `dbo_currency` (
	`id` char(3) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

INSERT INTO dbo_currency(`id`) VALUES
('LVL'),
('LTL'),
('EUR'),
('USD'),
('GBP'),
('RUB');

