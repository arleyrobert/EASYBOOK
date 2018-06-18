create schema easybook;
use easybook;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT '0',
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(220) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `paginas` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `easybook`.`usuarios`
(`id`,
`nome`,
`email`,
`senha`,
`situacoe_id`,
`niveis_acesso_id`,
`created`,
`modified`)
VALUES
(1,
'Robert',
'arleyrobert@gmail.com',
'827ccb0eea8a706c4c34a16891f84e7b',
1,
1,
'2018-06-12 10:45:00',
NULL);

INSERT INTO `easybook`.`usuarios`
(`id`,
`nome`,
`email`,
`senha`,
`situacoe_id`,
`niveis_acesso_id`,
`created`,
`modified`)
VALUES
(2,
'Ufra',
'ufra@ufra.com',
'827ccb0eea8a706c4c34a16891f84e7b',
3,
3,
'2018-06-12 15:59:00',
NULL);