-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE  `users` (
  `id` SMALLINT UNSIGNED AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `date_naissance` DATE NOT NULL,
  `type` varchar(45) NOT NULL,
  `numero_telephone` INT NOT NULL,
  `login` varchar(45) NOT NULL,
  `mot_de_passe` varchar(45) NOT NULL,
  `adresse_mail` varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

INSERT INTO `app`.`users`(`nom`, `prenom`, `date_naissance`, `numero_telephone`,`type`, `login`, `mot_de_passe`, `adresse_mail`) VALUES
('philippe', 'guillaume', '1999-07-25' , '0619637985', 'admin', 'g.philippe', 'motdepasse','guillaume.philippe2000@gmail.com'),
('liu', 'lionel', '1999-01-01' , '0606060606', 'admin', 'l.liu', 'lionelisep','l.lionel0104@gmail.com'),
('parayre', 'benjamin', '1999-01-01' , '0707070707', 'admin', 'b.parayre', 'benji','parayre.benjamin1@gmail.com'),
('le garlantezec', 'thomas', '1999-01-01' , '0607070707', 'admin', 't.garlantezec','legarlantezec', 'thomas.legarlantezec@gmail.com'),
('fournet', 'benjamin', '1999-01-01' , '0606070707', 'admin', 'b.fournet','fournet99','benjamin.fournet99@gmail.com'),
('dupont', 'jean', '1990-01-01' , '0612345678', 'client', 'j.dupont', 'dupont90','m.dupont@gmail.com'),
('dupont', 'michel', '1970-01-01' , '0687654321', 'client', 'm.dupont', 'dupont90','j.dupont@gmail.com'),
('auguste', 'louis', '1970-01-01' , '0687654312', 'gestionnaire', 'l.auguste', 'leau','l.auguste@gmail.com'),
('eau', 'pierre', '1970-01-01' , '0612345687', 'gestionnaire', 'p.eau', 'pierre99','pierre.eau@gmail.com'),
('apple','google','1970-01-01' ,'0681234567','gestionnaire','g.apple','microsoft','g.apple@gmail.com');
