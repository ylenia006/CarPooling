-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 11, 2024 alle 10:25
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_pooling`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `automobile`
--

CREATE TABLE `automobile` (
  `targa` varchar(10) NOT NULL,
  `casa_produttrice` varchar(100) DEFAULT NULL,
  `modello` varchar(100) DEFAULT NULL,
  `numero_posti` int(11) DEFAULT NULL,
  `colore` varchar(50) DEFAULT NULL,
  `anno_immatricolazione` int(11) DEFAULT NULL,
  `chilometri` decimal(10,2) DEFAULT NULL,
  `carburante` varchar(50) DEFAULT NULL,
  `cilindrata` int(11) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `automobile`
--

INSERT INTO `automobile` (`targa`, `casa_produttrice`, `modello`, `numero_posti`, `colore`, `anno_immatricolazione`, `chilometri`, `carburante`, `cilindrata`, `id_utente`) VALUES
('90', 'pololo', 'rr', 43, 'blu', 345, 76.00, '46', 534, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `id` int(11) NOT NULL,
  `cap` varchar(10) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `passa_da`
--

CREATE TABLE `passa_da` (
  `id_viaggio` int(11) NOT NULL,
  `id_citta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id` int(11) NOT NULL,
  `accettata` tinyint(1) DEFAULT NULL,
  `id_viaggio` int(11) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id` int(11) NOT NULL,
  `giudizio` text DEFAULT NULL,
  `voto` int(11) DEFAULT NULL,
  `id_utente_scrittore` int(11) DEFAULT NULL,
  `id_utente_ricevente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`id`, `giudizio`, `voto`, `id_utente_scrittore`, `id_utente_ricevente`) VALUES
(1, 'bello', 1, 9, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cognome` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(100) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `luogo_nascita` varchar(100) DEFAULT NULL,
  `numero_patente` varchar(20) DEFAULT NULL,
  `numero_documento_identita` varchar(20) DEFAULT NULL,
  `data_scadenza_patente` date DEFAULT NULL,
  `numero_telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fotografia` blob DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `indirizzo`, `data_nascita`, `luogo_nascita`, `numero_patente`, `numero_documento_identita`, `data_scadenza_patente`, `numero_telefono`, `email`, `fotografia`, `password`) VALUES
(1, 'df', 'ferugf', 'gfeufgw', '2024-04-13', 'wu', 'wu', 'wu', '2024-04-13', 'wu', 'fe@ss.bbb', 0x646f776e6c6f61642e6a7067, '7b774effe4a349c6dd82'),
(2, 'trt', 'rttrt', 'rtrt', '2024-04-13', 'tr', 'trtr', 'trtr', '2024-04-25', '5454', 'gf@y.it', 0x6d61636368696e61626c752e6a7067, 'e4da3b7fbbce2345d777'),
(3, 'ewe', 'ee', 'ee', '2024-04-06', 'ee', 'e', 'e', '2024-05-08', '5', 'd@ii.k', 0x6d61636368696e61626c752e6a7067, 'f1290186a5d0b1ceab27'),
(4, 'dsd', 'dsds', 'sdds', '2024-04-20', 'sds', 'dsds', 'dsd', '2024-04-23', '333', 'sddd@u.iu', 0x7061726f6c652d6f6f2e6a7067, 'a608a24ed70d4c1103ee'),
(5, 'dsd', 'dsds', 'sdds', '2024-04-20', 'sds', 'dsds', 'dsd', '2024-04-23', '333', 'sddd@u.iu', 0x7061726f6c652d6f6f2e6a7067, '550a141f12de6341fba6'),
(6, 'ewewe', 'ewew', 'ewew', '2024-04-18', 'ewe', 'ewew', 'ewew', '2024-04-07', '33', 'asdsd@gg.uy', 0x7061726f6c652d6f6f2e6a7067, '15de21c670ae7c3f6f3f'),
(7, 'dede', 'dede', 'dede', '2024-04-18', 'dede', 'dede', 'dede', '2024-04-02', '545454', 'fgg@hh.lh', 0x7061726f6c652d6f6f2e6a7067, 'b59c67bf196a4758191e'),
(8, 'sss', 'ss', 'sss', '2024-04-18', 'www', 'ww', 'www', '2024-04-04', '23232', 'aaa@dd.ld', 0x7061726f6c652d6f6f2e6a7067, 'bcbe3365e6ac95ea2c03'),
(9, 'annapaola', 'amoruso', 'casa', '2024-05-04', 'baroi', '5', '3', '2024-04-16', '4444', 'anna@kk.iu', 0x646f776e6c6f61642e6a7067, 'e807f1fcf82d132f9bb0');

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggio`
--

CREATE TABLE `viaggio` (
  `id` int(11) NOT NULL,
  `data_inizio` date DEFAULT NULL,
  `data_fine` date DEFAULT NULL,
  `numero_soste` int(11) DEFAULT NULL,
  `aperto` tinyint(1) DEFAULT NULL,
  `prezzo_passeggero` decimal(10,2) DEFAULT NULL,
  `animali` int(11) DEFAULT NULL,
  `bagaglio` int(11) DEFAULT NULL,
  `fumatori` tinyint(1) DEFAULT NULL,
  `numero_posti_disponibili` int(11) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL,
  `partenza` varchar(100) DEFAULT NULL,
  `arrivo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `viaggio`
--

INSERT INTO `viaggio` (`id`, `data_inizio`, `data_fine`, `numero_soste`, `aperto`, `prezzo_passeggero`, `animali`, `bagaglio`, `fumatori`, `numero_posti_disponibili`, `id_utente`, `partenza`, `arrivo`) VALUES
(1, '2024-04-17', '2024-04-26', 4, 1, 3.00, 1, 1, 0, 4, 9, 'bari', 'milano');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `automobile`
--
ALTER TABLE `automobile`
  ADD PRIMARY KEY (`targa`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `passa_da`
--
ALTER TABLE `passa_da`
  ADD PRIMARY KEY (`id_viaggio`,`id_citta`),
  ADD KEY `id_citta` (`id_citta`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_viaggio` (`id_viaggio`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente_scrittore` (`id_utente_scrittore`),
  ADD KEY `id_utente_ricevente` (`id_utente_ricevente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `viaggio`
--
ALTER TABLE `viaggio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente` (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `citta`
--
ALTER TABLE `citta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `viaggio`
--
ALTER TABLE `viaggio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `automobile`
--
ALTER TABLE `automobile`
  ADD CONSTRAINT `Automobile_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`);

--
-- Limiti per la tabella `passa_da`
--
ALTER TABLE `passa_da`
  ADD CONSTRAINT `Passa_Da_ibfk_1` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggio` (`id`),
  ADD CONSTRAINT `Passa_Da_ibfk_2` FOREIGN KEY (`id_citta`) REFERENCES `citta` (`id`);

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `Prenotazione_ibfk_1` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggio` (`id`),
  ADD CONSTRAINT `Prenotazione_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`);

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `Recensione_ibfk_1` FOREIGN KEY (`id_utente_scrittore`) REFERENCES `utente` (`id`),
  ADD CONSTRAINT `Recensione_ibfk_2` FOREIGN KEY (`id_utente_ricevente`) REFERENCES `utente` (`id`);

--
-- Limiti per la tabella `viaggio`
--
ALTER TABLE `viaggio`
  ADD CONSTRAINT `Viaggio_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
