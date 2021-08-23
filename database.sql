
CREATE TABLE usuaris (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom varchar(25) NOT NULL,
  cognom varchar(25) NOT NULL,
  email varchar(25) NOT NULL,
  contrasenya varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `receptes` (
  `idrecepta` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `titol` varchar(100) NOT NULL,
  `introduccio` varchar(1000) NOT NULL,
  `ingredients` varchar(1000) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `fitxer` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 

ALTER TABLE `receptes`
  ADD PRIMARY KEY (`idrecepta`,`iduser`),
  ADD KEY `iduser` (`iduser`);

ALTER TABLE `receptes`
  ADD CONSTRAINT `receptes_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuaris` (`id`);


