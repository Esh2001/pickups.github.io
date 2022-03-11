SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `reservation_information` (
  `ID` int(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phonenumber` varchar(12) NOT NULL,
  `date` varchar(20) NOT NULL,
  `venu` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `reservation_information`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `reservation_information`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;