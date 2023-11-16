-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Lis 2023, 20:37
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `erpdatabase`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `address`, `email`, `login`) VALUES
(1, 'Jan', 'Koszalinski', 'Koszalińska 13', 'Jan@Koszalinski.pl', 'jasio'),
(4, 'Karolina', 'Michalska', 'Mahoniowa 3', 'karolcia@wp.pl', 'karolina'),
(5, 'Aleksander', 'Wiśniewski', 'Mahoniowa 33', 'alekswisnia@wp.pl', 'aleks');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employeeactions`
--

CREATE TABLE `employeeactions` (
  `ID` int(11) NOT NULL,
  `employee` varchar(100) DEFAULT NULL,
  `actiontype` varchar(30) DEFAULT NULL,
  `target` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `employeeactions`
--

INSERT INTO `employeeactions` (`ID`, `employee`, `actiontype`, `target`, `date`) VALUES
(2, 'admin', 'EditProduct', 'Banan', '2023-10-25 06:21:36'),
(3, 'andrzej', 'AddProduct', 'Kosiarka', '2023-10-25 06:22:12'),
(4, 'andrzej', 'EditCustomer', 'Jan Kowalski', '2023-10-25 06:22:25'),
(5, 'andrzej', 'DeleteProduct', 'Banan', '2023-10-25 06:22:35'),
(6, 'admin', 'AddEmployee', 'Mirosław Pracowity', '2023-10-27 08:58:08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Salary` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `employees`
--

INSERT INTO `employees` (`ID`, `FirstName`, `LastName`, `Position`, `Salary`) VALUES
(1, 'Jan', 'Wiśniowiecki', 'Menadżer Działu', 3500),
(2, 'Jarosław', 'Szary', 'Menadżer Działu', 5000),
(10, 'Mirosław', 'Pracowity', 'Doświadczony pracownik', 100);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Order_Date` date DEFAULT NULL,
  `Customer` varchar(50) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`ID`, `Order_Date`, `Customer`, `ProductID`, `Qty`) VALUES
(1, '2023-10-26', 'aleks', 6, 1),
(2, '2023-10-26', 'aleks', 9, 5),
(3, '2023-10-27', 'aleks', 6, 2),
(4, '2023-11-16', 'jasio', 6, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` float DEFAULT NULL,
  `available` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `available`) VALUES
(6, 'Ananas', 'Super smaczny ananas z tropikalnej wyspy.', 250, 499),
(9, 'Kosiarka', 'Super Kosi', 1800, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT 'klient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'andrzej', 'praca123', 'pracownik'),
(3, 'jasio', 'samolot', 'klient'),
(6, 'karolina', 'aaa', 'klient'),
(8, 'aleks', 'wisnia', 'klient');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `employeeactions`
--
ALTER TABLE `employeeactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `employeeactions`
--
ALTER TABLE `employeeactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
