-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 29 jan. 2023 à 22:33
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ejercicio_final`
--

-- --------------------------------------------------------

--
-- Structure de la table `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `motivo_cita` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `citas`
--

INSERT INTO `citas` (`idCita`, `idUser`, `fecha_cita`, `motivo_cita`) VALUES
(4, 113, '2023-01-25', 'Cita vieja'),
(5, 113, '2023-02-03', 'Otra cita'),
(6, 113, '2023-02-28', 'Cita para revisar'),
(7, 113, '2023-03-01', 'Cita en marzo'),
(10, 113, '2023-01-30', 'Cita para usuario'),
(11, 103, '2023-02-16', 'Cita con contenido'),
(18, 103, '2023-03-09', 'Cita nueva');

-- --------------------------------------------------------

--
-- Structure de la table `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `texto` longtext NOT NULL,
  `fecha` date NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `imagen`, `texto`, `fecha`, `idUser`) VALUES
(3, '&#039;Streamers del sueño&#039', 'noticia1.jpg', '¿Le tranquiliza velar el sueño de un desconocido? ¿Le divertiría despertarlo con un ruido estridente o, mejor, con un calambrazo de corriente alterna? En 2022 hay gente que contesta “Sí a todo”, y complacen sus bajos instintos con los streamers del sueño: gente que duerme con una cámara frente a su cama que trasmite en directo su sueño para una audiencia que mira y ...no calla.\r\nEs el sueño de todo mortal: ganar dinero hasta durmiendo. En sus inicios los streamers del sueño lo consiguieron. Se metían en la cama, encendían su estación de streaming —el móvil con un trípode bien posicionado— y se grababan a sí mismos durmiendo durante varias horas. Los que les velaban el sueño, muchos confinados en sus habitaciones por la pandemia, contaban que el espectáculo del dormir ajeno les tranquilizaba, les ayudaba a aliviar el insomnio y a disfrutar de una compañía apacible. No ganaban mucho dinero, pero al despertar podían leer los miles de mensajes que les dejaban sus seguidores. Si lograban el patrocinio de una marca de colchones o de almohadas, el negocio empezaba a remontar. Así era en 2020 cuando floreció esta práctica, pero en 2022, el año de la realidad, hay que monetizar a tope la transmisión, y para conseguirlo hay que dejarse despertar cuantas veces pague la audiencia, y del modo más molesto, ruidoso y extravagante posible. “Cuanto más caos, mejor. La audiencia ama el caos”, resume Jakey Boehm.\r\n\r\nFuente: &#039;https://elpais.com/tecnologia/2023-01-06/streamers-del-sueno-unos-ganan-dinero-durmiendo-otros-pagan-por-despertar-a-desconocidos.html&#039;', '2023-01-15', 103),
(14, 'Título de noticia', 'noticia1.jpg', '¿Le tranquiliza velar el sueño de un desconocido? ¿Le divertiría despertarlo con un ruido estridente o, mejor, con un calambrazo de corriente alterna? En 2022 hay gente que contesta “Sí a todo”, y complacen sus bajos instintos con los streamers del sueño: gente que duerme con una cámara frente a su cama que trasmite en directo su sueño para una audiencia que mira y ...no calla.\r\nEs el sueño de todo mortal: ganar dinero hasta durmiendo. En sus inicios los streamers del sueño lo consiguieron. Se metían en la cama, encendían su estación de streaming —el móvil con un trípode bien posicionado— y se grababan a sí mismos durmiendo durante varias horas. Los que les velaban el sueño, muchos confinados en sus habitaciones por la pandemia, contaban que el espectáculo del dormir ajeno les tranquilizaba, les ayudaba a aliviar el insomnio y a disfrutar de una compañía apacible. No ganaban mucho dinero, pero al despertar podían leer los miles de mensajes que les dejaban sus seguidores. Si lograban el patrocinio de una marca de colchones o de almohadas, el negocio empezaba a remontar. Así era en 2020 cuando floreció esta práctica, pero en 2022, el año de la realidad, hay que monetizar a tope la transmisión, y para conseguirlo hay que dejarse despertar cuantas veces pague la audiencia, y del modo más molesto, ruidoso y extravagante posible. “Cuanto más caos, mejor. La audiencia ama el caos”, resume Jakey Boehm.\r\n\r\nFuente: &#039;https://elpais.com/tecnologia/2023-01-06/streamers-del-sueno-unos-ganan-dinero-durmiendo-otros-pagan-por-despertar-a-desconocidos.html&#039;', '2023-01-11', 103),
(18, 'Noticia nueva', 'noticia4.jpg', 'Innovación tecnológica empresarial\r\nLa industria tecnológica enfrenta múltiples desafíos globales, como señala Steve Koenig, vicepresidente de investigación de la CTA, la asociación que organiza el CES: de los problemas en las cadenas de suministro a los relacionados con la demanda de semiconductores, la inflación y la escasez de mano de obra. Los tiempos difíciles y de recesión económica “suelen traer consigo grandes innovaciones”: “Se avecina una poderosa ola de cambio tecnológico”.\r\nDel metaverso a la web 3\r\nKoenig insiste en que “el metav', '2023-01-15', 103),
(22, 'Elon Musk rompe un récord Guinness al perder millones', 'noticia2.webp', 'Lo que perdió Elon Musk en los últimos 13 meses es todo un récord, literalmente.\r\n\r\nEl multimillonario es ahora es la persona con la mayor pérdida de riqueza personal de la historia, según el sitio de los responsables del Libro Guinness de los Récords.\r\n\r\nDe noviembre de 2021 a diciembre de 2022, el estadounidense de origen sudafricano vio una reducción de su fortuna de casi US$165.000 millones.\r\n\r\nLas cifras se basan en datos de la revista Forbes, pero desde Guinness dijeron que otras fuentes sugieren que las pérdidas de Musk podrían haber sido mayores.\r\n\r\nFuente: https://www.bbc.com/mundo/noticias-64244473', '2023-01-21', 103);

-- --------------------------------------------------------

--
-- Structure de la table `users_data`
--

CREATE TABLE `users_data` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fNac` date NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `sexo` enum('','hombre','mujer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_data`
--

INSERT INTO `users_data` (`idUser`, `nombre`, `apellidos`, `email`, `telefono`, `fNac`, `direccion`, `sexo`) VALUES
(103, 'Guille', 'Armuelles', 'gd@mail.com', '658947854', '1990-05-02', 'casa', 'hombre'),
(113, 'Guillermo', 'Armuelles', 'correo@mail.com', '123', '2000-08-06', 'edificio', ''),
(115, 'Usuaria1', 'Usuaria3', 'usuaria@mail.com', '896', '2023-06-30', 'campo', ''),
(116, 'usuario', 'usuario', 'user@user.com', '7845', '2005-08-07', 'avenida', 'mujer');

-- --------------------------------------------------------

--
-- Structure de la table `users_login`
--

CREATE TABLE `users_login` (
  `idLogin` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_login`
--

INSERT INTO `users_login` (`idLogin`, `idUser`, `usuario`, `password`, `rol`) VALUES
(53, 103, 'guille1', '$2y$10$LNxjSdRVRJPaLLzhW9IWXuMpIkrDTvTc9wHsJRJUcrOnQ02HOVObG', 'admin'),
(63, 113, 'gui', '$2y$10$KkRb7G70/rs2Vk/ORReQguuskrCsN3ZiMq7a7ebWtzSQCOPumjyuG', 'user'),
(65, 115, 'usuaria', '$2y$10$a05awY7JbCzS9RvG.oJeLu.1nJhhIyBQx71NolmcK/CeG.lVR2pKW', 'user'),
(66, 116, 'usuario', '$2y$10$uRm48Sgi32ETrffl3zP6kuoDMPdynCrOM6OgUFK369eIHSWdtX0ca', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`),
  ADD UNIQUE KEY `titulo` (`titulo`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email_u` (`email`);

--
-- Index pour la table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `idUser` (`idUser`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT pour la table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_login`
--
ALTER TABLE `users_login`
  ADD CONSTRAINT `users_login_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
