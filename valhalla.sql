-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dic 07, 2015 alle 14:34
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `valhalla`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`IDItem` int(3) NOT NULL,
  `Icona` varchar(60) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `PF` int(10) DEFAULT NULL,
  `Armatura` int(10) DEFAULT NULL,
  `For` int(10) DEFAULT NULL,
  `Dex` int(10) DEFAULT NULL,
  `Agi` int(10) DEFAULT NULL,
  `Cos` int(10) DEFAULT NULL,
  `Car` int(10) DEFAULT NULL,
  `Int` int(10) DEFAULT NULL,
  `Tipo` int(2) DEFAULT NULL,
  `Livello` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dump dei dati per la tabella `item`
--

INSERT INTO `item` (`IDItem`, `Icona`, `Nome`, `PF`, `Armatura`, `For`, `Dex`, `Agi`, `Cos`, `Car`, `Int`, `Tipo`, `Livello`) VALUES
(2, 'pugnale', 'Pugnale', 0, 0, 5, 5, 5, 5, 0, 0, 1, 1),
(3, 'elmoferro', 'Elmo in ferro', 10, 20, 0, 5, 0, 10, 10, 0, 4, 5),
(4, 'elmopelle', 'Elmo in pelle', 100, 10, 0, 5, 5, 5, 5, 0, 4, 1),
(5, 'elmovichingo', 'Elmo vichingo', 150, 45, 5, 15, 15, 10, 15, 10, 4, 9),
(6, 'elmoteschio', 'Elmo del teschio', 200, 85, 15, 20, 15, 20, 20, 15, 4, 15),
(7, 'elmo', 'Elmo d''acciaio', 210, 120, 20, 25, 25, 25, 20, 20, 4, 21),
(8, 'elmovichingo', 'Elmo della furia', 300, 150, 35, 35, 45, 40, 40, 35, 4, 31),
(45, 'elmoferro', 'Elmo della distruzione', 300, 210, 45, 50, 55, 60, 55, 50, 4, 45),
(46, 'elmodivino', 'Elmo divino', 900, 350, 60, 65, 70, 70, 65, 60, 4, 60),
(48, 'elmo', 'Elmo di Munnin', 2000, 450, 80, 80, 80, 80, 80, 75, 4, 75),
(49, 'elmoodino', 'Elmo di Odino', 3500, 800, 90, 90, 90, 85, 90, 85, 4, 90),
(50, 'mazza', 'Mazza', 0, 0, 15, 15, 5, 5, 0, 0, 1, 5),
(51, 'pugnalecorto', 'Pugnale corto', 0, 0, 20, 17, 15, 5, 5, 0, 1, 9),
(52, 'sciabola2', 'Spada a uncino', 0, 0, 25, 20, 15, 10, 10, 5, 1, 15),
(53, 'spadacorta', 'Spada corta', 0, 0, 35, 35, 30, 15, 15, 10, 1, 21),
(54, 'spada', 'Spada larga', 0, 0, 55, 45, 40, 30, 22, 20, 1, 31),
(55, 'spadone', 'Spadone', 0, 0, 60, 55, 50, 45, 40, 38, 1, 45),
(56, 'spadalunga', 'Spada lunga', 0, 0, 70, 60, 65, 55, 49, 40, 1, 60),
(57, 'spadadivina', 'Spada divina', 0, 0, 85, 80, 80, 62, 59, 54, 1, 75),
(58, 'lamaodino', 'Lama di Odino', 0, 0, 95, 90, 95, 70, 60, 55, 1, 90),
(59, 'scudolegno', 'Scudo in legno ', 15, 20, 5, 5, 5, 5, 0, 0, 3, 1),
(60, 'scudo', 'Scudo mezzaluna', 100, 50, 8, 8, 15, 15, 0, 0, 3, 5),
(61, 'scudopietra', 'Scudo in pietra', 200, 100, 12, 12, 15, 20, 0, 0, 3, 21),
(62, 'scudoferro', 'Scudo in ferro', 400, 140, 20, 30, 30, 30, 0, 0, 3, 31),
(63, 'scudo', 'Scudo della distruzione', 350, 180, 25, 40, 45, 40, 0, 0, 3, 45),
(64, 'scudopietra', 'Scudo divino', 800, 220, 30, 45, 50, 50, 0, 0, 3, 60),
(65, 'scudoferro', 'Scudo di Munnin', 1500, 200, 31, 65, 55, 65, 0, 0, 3, 75),
(66, 'scudoodino', 'Scudo di Odino', 2000, 300, 35, 75, 80, 80, 0, 0, 3, 90),
(67, 'maglia', 'Maglia', 50, 10, 0, 0, 5, 5, 5, 0, 2, 1),
(68, 'maglia', 'Maglia del viandante', 100, 25, 0, 0, 10, 10, 5, 0, 2, 5),
(69, 'armaturarame', 'Corazza di rame', 150, 40, 0, 0, 20, 25, 13, 0, 2, 9),
(70, 'armaturaferro', 'Corazza in ferro', 350, 70, 0, 0, 30, 40, 30, 0, 2, 21),
(71, 'armaturarame', 'Corazza dell''invasore', 400, 170, 0, 0, 45, 50, 45, 0, 2, 31),
(72, 'armaturarame', 'Corazza della distruzione', 600, 230, 0, 0, 55, 60, 50, 0, 0, 45),
(73, 'armaturaferro', 'Corazza in acciaio', 1000, 210, 0, 0, 70, 75, 70, 0, 2, 60),
(74, 'armaturaodin', 'Corazza divina', 1500, 240, 0, 0, 85, 80, 80, 0, 2, 75),
(75, 'armaturaodin', 'Corazza di Odino', 3000, 300, 0, 0, 95, 95, 95, 0, 2, 90),
(76, 'anelloargento', 'Anello in argento', 15, 0, 0, 0, 0, 0, 5, 10, 5, 1),
(77, 'anellosmeraldo', 'Anello con smeraldo', 40, 0, 0, 0, 0, 0, 10, 15, 5, 5),
(78, 'anellozaffiri', 'Anello con zaffiri', 90, 0, 0, 0, 0, 0, 15, 20, 5, 9),
(79, 'anellorubino', 'Anello con rubino', 150, 0, 0, 0, 0, 0, 25, 35, 5, 21),
(80, 'anelloconchiglia', 'Anello della conchiglia', 230, 10, 0, 0, 0, 0, 35, 40, 5, 31),
(81, 'anellooro', 'Anello in oro', 400, 25, 0, 0, 0, 0, 45, 55, 5, 45),
(82, 'anelloesoterico', 'Anello esoterico', 650, 30, 0, 0, 0, 0, 55, 66, 5, 60),
(83, 'anelloargento', 'Anello divino', 1000, 45, 0, 0, 0, 0, 80, 85, 5, 75),
(84, 'anelloesoterico', 'Anello di Odino', 2000, 60, 0, 0, 0, 0, 90, 105, 5, 90);

-- --------------------------------------------------------

--
-- Struttura della tabella `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(3) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `vista` varchar(40) NOT NULL,
  `categoria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `menu`
--

INSERT INTO `menu` (`id`, `nome`, `vista`, `categoria`) VALUES
(0, 'riepilogo', 'Riepilogo', 1),
(1, 'messaggi', 'Messaggi', 1),
(2, 'sfidapage', 'Sfida', 1),
(3, 'mercato', 'Mercato', 1),
(4, 'missionepage', 'Missione', 1),
(5, 'classifica', 'Classifica', 1),
(6, 'veggente', 'Veggente', 1),
(7, 'allenamentopage', 'Allenamento', 1),
(8, 'tempiopage', 'Tempio', 1),
(9, 'nuovomesspage', 'Nuovo', 2),
(10, 'messaggi', 'Ricevuti', 2),
(11, 'messaggiinviati', 'Inviati', 2),
(12, 'logout', 'Logout', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `messaggi`
--

CREATE TABLE IF NOT EXISTS `messaggi` (
`IDMessaggio` int(11) NOT NULL,
  `Oggetto` varchar(15) NOT NULL,
  `TimeStamp` varchar(20) NOT NULL,
  `Contenuto` varchar(1000) NOT NULL,
  `Mittente` varchar(20) NOT NULL,
  `Destinatario` varchar(20) NOT NULL,
  `Nuovo` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `messaggi`
--

INSERT INTO `messaggi` (`IDMessaggio`, `Oggetto`, `TimeStamp`, `Contenuto`, `Mittente`, `Destinatario`, `Nuovo`) VALUES
(1, 'Prova', '22:27 02/12/2015', 'ciao!', 'Barabba', 'Davide', 0),
(2, 'Prova2', '22:27 02/12/2015', 'Heyla!', 'Aknologia', 'Davide', 0),
(3, 'ciao', '00:30 03/12/2015', 'aoao', 'Barabba', 'Davide', 0),
(4, 'Ciao!!', '15:21 03/12/2015', 'we', 'Arlem', 'Davide', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `messaggiclan`
--

CREATE TABLE IF NOT EXISTS `messaggiclan` (
`IDMessaggio` int(30) NOT NULL,
  `IDClan` int(1) NOT NULL,
  `Mittente` varchar(30) NOT NULL,
  `Oggetto` varchar(60) NOT NULL,
  `Contenuto` varchar(1000) NOT NULL,
  `Orario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `messaggiclan`
--

INSERT INTO `messaggiclan` (`IDMessaggio`, `IDClan`, `Mittente`, `Oggetto`, `Contenuto`, `Orario`) VALUES
(1, 2, 'Davide', 'Prova', 'ciao', '2015-12-05 11:52:20'),
(2, 2, 'Davide', 'Prova', '	we', '2015-12-05 11:54:57'),
(3, 2, 'Davide', 'prooo', 'aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	aaaa	', '2015-12-05 11:55:07'),
(4, 4, 'Alhea', 'Prova', 'ciao!	', '2015-12-05 12:07:48'),
(5, 2, 'Davide', '', '	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa	aaaaaaaaaaaaaaaaaaaaaaaa', '2015-12-05 14:12:46'),
(6, 2, 'Davide', '', '	', '2015-12-05 14:35:32');

-- --------------------------------------------------------

--
-- Struttura della tabella `missioni`
--

CREATE TABLE IF NOT EXISTS `missioni` (
`IDMissione` int(30) NOT NULL,
  `Giocatore` varchar(30) NOT NULL,
  `LivNemico` int(2) NOT NULL,
  `StartTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Tesoro` int(30) NOT NULL,
  `Danni` int(50) NOT NULL,
  `LivItem` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dump dei dati per la tabella `missioni`
--

INSERT INTO `missioni` (`IDMissione`, `Giocatore`, `LivNemico`, `StartTime`, `Tesoro`, `Danni`, `LivItem`) VALUES
(29, 'Barabba', 15, '2015-12-03 13:10:32', 8715, 1230, 0),
(32, 'Acqua', 1, '2015-12-03 14:09:12', 376, 21, 0),
(34, 'Alleh', 20, '2015-12-03 14:10:43', 15400, 2720, 0),
(35, 'Angelo', 35, '2015-12-03 14:11:35', 26390, 5635, 0),
(36, 'Arlem', 45, '2015-12-03 14:13:11', 24975, 1485, 0),
(38, 'Davide', 85, '2015-12-07 13:13:52', 67745, 2720, 93);

-- --------------------------------------------------------

--
-- Struttura della tabella `nemici`
--

CREATE TABLE IF NOT EXISTS `nemici` (
  `IDNemico` int(3) NOT NULL,
  `Icona` varchar(30) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Vita` int(10) NOT NULL,
  `Armatura` int(10) NOT NULL,
  `Forza` int(10) NOT NULL,
  `Destrezza` int(10) NOT NULL,
  `Agilita` int(10) NOT NULL,
  `Costituzione` int(10) NOT NULL,
  `Carisma` int(10) NOT NULL,
  `Intelligenza` int(10) NOT NULL,
  `Livello` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `nemici`
--

INSERT INTO `nemici` (`IDNemico`, `Icona`, `Nome`, `Vita`, `Armatura`, `Forza`, `Destrezza`, `Agilita`, `Costituzione`, `Carisma`, `Intelligenza`, `Livello`) VALUES
(0, 'cinghiale', 'Cinghiale', 10, 0, 4, 4, 4, 10, 0, 3, 1),
(1, 'demone', 'Demone', 2300, 150, 120, 130, 140, 115, 99, 135, 20),
(3, 'evaso', 'Evaso', 248, 30, 40, 50, 55, 31, 65, 51, 8),
(4, 'guerriero', 'Guerriero', 126, 30, 30, 25, 11, 14, 22, 25, 9),
(5, 'lince', 'Lince', 40, 30, 15, 15, 25, 10, 5, 8, 4),
(6, 'lupo', 'Lupo', 72, 15, 14, 12, 18, 24, 5, 5, 3),
(7, 'orso', 'Orso bruno', 120, 25, 25, 15, 10, 24, 5, 5, 5),
(8, 'ratto', 'Ratto', 20, 5, 5, 10, 15, 5, 1, 10, 2),
(9, 'vichingo', 'Vichingo', 126, 60, 30, 20, 15, 21, 33, 21, 6),
(10, 'vichingo2', 'Vichingo', 250, 70, 35, 25, 20, 25, 25, 20, 10),
(11, 'vichingo3', 'Vichingo', 780, 95, 51, 40, 35, 52, 30, 21, 15),
(12, 'bestia', 'Bestia', 105, 40, 15, 15, 15, 15, 10, 9, 7),
(13, 'scheletro2', 'Scheletro', 7965, 350, 200, 210, 190, 177, 160, 160, 45),
(14, 'bestia2', 'Mostro delle paludi', 14950, 400, 280, 250, 200, 230, 200, 178, 65),
(15, 'strega', 'Strega', 25500, 450, 330, 320, 300, 300, 380, 350, 85),
(35, 'scheletro', 'Scheletro', 5950, 250, 150, 140, 140, 170, 110, 100, 35);

-- --------------------------------------------------------

--
-- Struttura della tabella `sellitem`
--

CREATE TABLE IF NOT EXISTS `sellitem` (
`IDVendita` int(30) NOT NULL,
  `IDItem` int(30) NOT NULL,
  `Venditore` varchar(30) NOT NULL,
  `Oro` int(15) NOT NULL,
  `Smeraldi` int(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `sellitem`
--

INSERT INTO `sellitem` (`IDVendita`, `IDItem`, `Venditore`, `Oro`, `Smeraldi`) VALUES
(3, 5, 'Luigi', 200, 1),
(5, 4, 'Davide', 1000, 10),
(6, 5, 'Attila', 20000, 25);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Livello` int(2) NOT NULL,
  `Oro` int(12) NOT NULL,
  `Smeraldi` int(12) NOT NULL,
  `Vittorie` int(12) NOT NULL,
  `Sconfitte` int(12) NOT NULL,
  `Guadagno` int(12) NOT NULL,
  `Missioni` int(12) NOT NULL,
  `Clan` int(1) NOT NULL,
  `Sesso` int(1) NOT NULL,
  `Reputazione` int(30) NOT NULL,
  `Vita` int(15) NOT NULL,
  `Armatura` int(10) NOT NULL,
  `Forza` int(3) NOT NULL,
  `Destrezza` int(3) NOT NULL,
  `Agilita` int(3) NOT NULL,
  `Costituzione` int(3) NOT NULL,
  `Carisma` int(3) NOT NULL,
  `Intelligenza` int(3) NOT NULL,
  `VitaMod` int(30) NOT NULL,
  `ArmaturaMod` int(30) NOT NULL,
  `ForzaMod` int(30) NOT NULL,
  `DestrezzaMod` int(30) NOT NULL,
  `AgilitaMod` int(30) NOT NULL,
  `CostituzioneMod` int(30) NOT NULL,
  `CarismaMod` int(30) NOT NULL,
  `IntelligenzaMod` int(30) NOT NULL,
  `predetto` int(1) DEFAULT NULL,
  `Esito` int(1) DEFAULT NULL,
  `Sfide` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`Username`, `Password`, `Livello`, `Oro`, `Smeraldi`, `Vittorie`, `Sconfitte`, `Guadagno`, `Missioni`, `Clan`, `Sesso`, `Reputazione`, `Vita`, `Armatura`, `Forza`, `Destrezza`, `Agilita`, `Costituzione`, `Carisma`, `Intelligenza`, `VitaMod`, `ArmaturaMod`, `ForzaMod`, `DestrezzaMod`, `AgilitaMod`, `CostituzioneMod`, `CarismaMod`, `IntelligenzaMod`, `predetto`, `Esito`, `Sfide`) VALUES
('Acqua', 'aaa', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 105, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Aknologia', '1', 97, 10410012, 402, 12, 21, 3121625, 1, 1, 0, 1096, 0, 0, 20, 380, 390, 440, 340, 400, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 3),
('Alhea', 'ciao', 11, 386, 398, 0, 0, 0, 0, 4, 1, 0, 0, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Alhyn', 'cacao', 1, 386, 398, 0, 0, 0, 0, 4, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Alleh', 'ciao', 25, 386, 398, 0, 0, 0, 0, 4, 1, 0, 105, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Altar', 'mama', 1, 386, 398, 0, 0, 0, 0, 4, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Amber', 'ciao', 1, 386, 398, 0, 0, 0, 0, 4, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Angelo', 'Password', 35, 57, 398, 0, 4, 0, 0, 3, 0, 0, 105, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Arlem', 'cacao', 45, 386, 398, 0, 0, 0, 0, 2, 1, 0, 325, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Arth', 'kama', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Attila', 'aaaa', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Barabba', 'barabba', 15, 285422, 398, 1, 17, 285990, 3, 1, 0, 9, 520, 0, 48, 61, 60, 55, 41, 46, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 9),
('Beken', 'cacao', 1, 386, 398, 0, 0, 0, 0, 3, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Brienne', 'cacao', 15, 336, 398, 0, 1, 0, 0, 1, 1, 0, 75, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('ciao', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Davide', 'studenti', 99, 6470722, 2157, 91, 19, 74022581, 52, 2, 0, 19619, 39690, 0, 413, 409, 408, 410, 409, 411, -1000, 45, 25, 25, 15, 15, 15, 10, 1, 1, 0),
('Denorus', 'ciao', 65, 447432, 398, 0, 0, 0, 0, 1, 0, 0, 5165, 0, 90, 111, 78, 98, 80, 78, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 0),
('Derkn', 'ciao', 1, 386, 398, 0, 0, 0, 0, 2, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Giacomo', 'ciao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Hellen', 'ciao', 1, 386, 398, 0, 0, 0, 0, 3, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Hennin', 'ciao', 1, 652, 0, 0, 0, 320, 1, 2, 1, 0, 110, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 0),
('Illhenn', 'ciao', 1, 432, 0, 0, 0, 0, 0, 1, 1, 0, 10, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Illion', '', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Kolosh', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Lancaster', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Luigi', 'prova', 12, 5442, 398, 1, 19, 0, 0, 1, 0, 119, 144, 0, 22, 12, 10, 12, 11, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Magnerak', 'ciao', 1, 386, 398, 0, 0, 0, 0, 3, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Malle', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Manen', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Manta', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Mark', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Marthen', 'cacaot', 1, 386, 398, 0, 0, 0, 0, 2, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Matteo', 'prova', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Mekr', 'akooa', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Mikk', 'ciao', 1, -114, 398, 0, 0, 0, 0, 3, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Milk', 'cacao', 1, 451, 398, 1, 0, 0, 0, 4, 0, 10, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Minti', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Minusn', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Missi', '201', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Ninfea', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Nomen', '11111', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Nontren', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Prokerjm', 'ciao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('prova', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('ProvaProva', 'ciao', 1, 637, 0, 0, 0, 245, 0, 3, 0, 0, 10, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Sigm', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Stech', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Strategy', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Stretten', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Tarth', '111', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Tent', 'prova', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Tentativo', 'ciao', 1, 500, 0, 0, 0, 0, 0, 2, 0, 0, 110, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Test', 'oppp', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Trecy', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 1, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('Tyrion', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
('umano', 'ciao', 1, 116, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0),
('Zank', 'ciao', 2, 3549, 0, 0, 0, 3357, 10, 3, 0, 0, 20, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 0),
('Zennengar', 'prova', 1, 392, 0, 0, 0, 0, 0, 4, 0, 0, 10, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Zerath', 'cacao', 1, 386, 398, 0, 0, 0, 0, 1, 0, 0, 5, 0, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `useritem`
--

CREATE TABLE IF NOT EXISTS `useritem` (
`IDUserItem` int(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Item` int(30) NOT NULL,
  `Indossato` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `useritem`
--

INSERT INTO `useritem` (`IDUserItem`, `Username`, `Item`, `Indossato`) VALUES
(1, 'Davide', 2, 0),
(3, 'Davide', 5, 1),
(4, 'Davide', 83, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`IDItem`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaggi`
--
ALTER TABLE `messaggi`
 ADD PRIMARY KEY (`IDMessaggio`), ADD KEY `Mittente` (`Mittente`), ADD KEY `Destinatario` (`Destinatario`);

--
-- Indexes for table `messaggiclan`
--
ALTER TABLE `messaggiclan`
 ADD PRIMARY KEY (`IDMessaggio`), ADD KEY `Mittente` (`Mittente`);

--
-- Indexes for table `missioni`
--
ALTER TABLE `missioni`
 ADD PRIMARY KEY (`IDMissione`), ADD KEY `Giocatore` (`Giocatore`);

--
-- Indexes for table `nemici`
--
ALTER TABLE `nemici`
 ADD PRIMARY KEY (`IDNemico`);

--
-- Indexes for table `sellitem`
--
ALTER TABLE `sellitem`
 ADD PRIMARY KEY (`IDVendita`), ADD KEY `IDItem` (`IDItem`), ADD KEY `Venditore` (`Venditore`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`Username`), ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `useritem`
--
ALTER TABLE `useritem`
 ADD PRIMARY KEY (`IDUserItem`), ADD KEY `Username` (`Username`), ADD KEY `Item` (`Item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `IDItem` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `messaggi`
--
ALTER TABLE `messaggi`
MODIFY `IDMessaggio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messaggiclan`
--
ALTER TABLE `messaggiclan`
MODIFY `IDMessaggio` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `missioni`
--
ALTER TABLE `missioni`
MODIFY `IDMissione` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `sellitem`
--
ALTER TABLE `sellitem`
MODIFY `IDVendita` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `useritem`
--
ALTER TABLE `useritem`
MODIFY `IDUserItem` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `messaggi`
--
ALTER TABLE `messaggi`
ADD CONSTRAINT `messaggi_ibfk_1` FOREIGN KEY (`Mittente`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `messaggi_ibfk_2` FOREIGN KEY (`Destinatario`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limiti per la tabella `messaggiclan`
--
ALTER TABLE `messaggiclan`
ADD CONSTRAINT `messaggiclan_ibfk_1` FOREIGN KEY (`Mittente`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limiti per la tabella `missioni`
--
ALTER TABLE `missioni`
ADD CONSTRAINT `missioni_ibfk_1` FOREIGN KEY (`Giocatore`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limiti per la tabella `sellitem`
--
ALTER TABLE `sellitem`
ADD CONSTRAINT `sellitem_ibfk_1` FOREIGN KEY (`IDItem`) REFERENCES `item` (`IDItem`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `sellitem_ibfk_2` FOREIGN KEY (`Venditore`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limiti per la tabella `useritem`
--
ALTER TABLE `useritem`
ADD CONSTRAINT `useritem_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `useritem_ibfk_2` FOREIGN KEY (`Item`) REFERENCES `item` (`IDItem`) ON DELETE CASCADE ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventi
--
CREATE DEFINER=`root`@`localhost` EVENT `resetveggente` ON SCHEDULE EVERY 1 DAY STARTS '2015-11-28 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE user SET predetto=0$$

CREATE DEFINER=`root`@`localhost` EVENT `resetsfide` ON SCHEDULE EVERY 1 DAY STARTS '2015-11-28 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE user SET sfide=0$$

CREATE DEFINER=`root`@`localhost` EVENT `ricaricavita` ON SCHEDULE EVERY 1 HOUR STARTS '2015-11-30 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE user SET vita=vita+((((costituzione*livello)-vita)*10)/100)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
