-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 10:21 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uteamdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE `tbllocation` (
  `LocationId` int(11) NOT NULL,
  `LocationName` text NOT NULL,
  `LocationCharges` text NOT NULL,
  `LocationImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmatch`
--

CREATE TABLE `tblmatch` (
  `MatchId` int(11) NOT NULL,
  `TeamHomeId` int(11) NOT NULL,
  `TeamAwayId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmatchdetail`
--

CREATE TABLE `tblmatchdetail` (
  `MatchDetailId` int(11) NOT NULL,
  `LocationId` int(11) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblplayerinteam`
--

CREATE TABLE `tblplayerinteam` (
  `PlayerInTeamId` int(11) NOT NULL,
  `TeamId` int(11) NOT NULL,
  `PlayerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblplayers`
--

CREATE TABLE `tblplayers` (
  `PlayerId` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` text NOT NULL,
  `Phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblplayers`
--

INSERT INTO `tblplayers` (`PlayerId`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES
(1, 'qwe', 'asd', 'rty', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `tblplayingcricket`
--

CREATE TABLE `tblplayingcricket` (
  `PlayingId` int(11) NOT NULL,
  `PlayerId` int(11) NOT NULL,
  `MatchId` int(11) NOT NULL,
  `IsCaptain` tinyint(1) NOT NULL,
  `IsWicketKeeper` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblteam`
--

CREATE TABLE `tblteam` (
  `TeamId` int(11) NOT NULL,
  `TeamName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`TeamId`, `TeamName`) VALUES
(1, 'Pakistan'),
(2, 'England');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `UserId` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` text NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `PhoneNo` text NOT NULL,
  `IsLoggedIn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`UserId`, `FirstName`, `LastName`, `Email`, `UserName`, `Password`, `PhoneNo`, `IsLoggedIn`) VALUES
(1, 'asd', 'qwe', 'qweqwwqe', 'qwea', 'qqw', '123123', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwmatch`
--
CREATE TABLE `vwmatch` (
`MatchId` int(11)
,`TeamHomeId` int(11)
,`TeamHome` text
,`TeamAwayId` int(11)
,`TeamAway` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwplayerinteam`
--
CREATE TABLE `vwplayerinteam` (
`PlayerInTeamId` int(11)
,`PlayerId` int(11)
,`FirstName` text
,`LastName` text
,`TeamName` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwplayingeleven`
--
CREATE TABLE `vwplayingeleven` (
`PlayingId` int(11)
,`IsCaptain` tinyint(1)
,`IsWicketKeeper` tinyint(1)
,`PlayerId` int(11)
,`FirstName` text
,`LastName` text
,`MatchId` int(11)
,`TeamAway` text
,`TeamHome` text
);

-- --------------------------------------------------------

--
-- Structure for view `vwmatch`
--
DROP TABLE IF EXISTS `vwmatch`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwmatch`  AS  select `a`.`MatchId` AS `MatchId`,`a`.`TeamHomeId` AS `TeamHomeId`,`b`.`TeamName` AS `TeamHome`,`a`.`TeamAwayId` AS `TeamAwayId`,`c`.`TeamName` AS `TeamAway` from ((`tblmatch` `a` left join `tblteam` `b` on((`a`.`TeamHomeId` = `b`.`TeamId`))) left join `tblteam` `c` on((`a`.`TeamAwayId` = `c`.`TeamId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwplayerinteam`
--
DROP TABLE IF EXISTS `vwplayerinteam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwplayerinteam`  AS  select `a`.`PlayerInTeamId` AS `PlayerInTeamId`,`a`.`PlayerId` AS `PlayerId`,`b`.`FirstName` AS `FirstName`,`b`.`LastName` AS `LastName`,`c`.`TeamName` AS `TeamName` from ((`tblplayerinteam` `a` left join `tblplayers` `b` on((`a`.`PlayerId` = `b`.`PlayerId`))) left join `tblteam` `c` on((`a`.`TeamId` = `c`.`TeamId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwplayingeleven`
--
DROP TABLE IF EXISTS `vwplayingeleven`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwplayingeleven`  AS  select `a`.`PlayingId` AS `PlayingId`,`a`.`IsCaptain` AS `IsCaptain`,`a`.`IsWicketKeeper` AS `IsWicketKeeper`,`b`.`PlayerId` AS `PlayerId`,`b`.`FirstName` AS `FirstName`,`b`.`LastName` AS `LastName`,`c`.`MatchId` AS `MatchId`,`d`.`TeamName` AS `TeamAway`,`e`.`TeamName` AS `TeamHome` from ((((`tblplayingcricket` `a` left join `tblplayers` `b` on((`a`.`PlayerId` = `b`.`PlayerId`))) left join `tblmatch` `c` on((`a`.`MatchId` = `c`.`MatchId`))) left join `tblteam` `d` on((`c`.`TeamAwayId` = `d`.`TeamId`))) left join `tblteam` `e` on((`c`.`TeamHomeId` = `e`.`TeamId`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`LocationId`);

--
-- Indexes for table `tblmatch`
--
ALTER TABLE `tblmatch`
  ADD PRIMARY KEY (`MatchId`);

--
-- Indexes for table `tblmatchdetail`
--
ALTER TABLE `tblmatchdetail`
  ADD PRIMARY KEY (`MatchDetailId`);

--
-- Indexes for table `tblplayerinteam`
--
ALTER TABLE `tblplayerinteam`
  ADD PRIMARY KEY (`PlayerInTeamId`);

--
-- Indexes for table `tblplayers`
--
ALTER TABLE `tblplayers`
  ADD PRIMARY KEY (`PlayerId`);

--
-- Indexes for table `tblplayingcricket`
--
ALTER TABLE `tblplayingcricket`
  ADD PRIMARY KEY (`PlayingId`);

--
-- Indexes for table `tblteam`
--
ALTER TABLE `tblteam`
  ADD PRIMARY KEY (`TeamId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `LocationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmatch`
--
ALTER TABLE `tblmatch`
  MODIFY `MatchId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmatchdetail`
--
ALTER TABLE `tblmatchdetail`
  MODIFY `MatchDetailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblplayerinteam`
--
ALTER TABLE `tblplayerinteam`
  MODIFY `PlayerInTeamId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblplayers`
--
ALTER TABLE `tblplayers`
  MODIFY `PlayerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblplayingcricket`
--
ALTER TABLE `tblplayingcricket`
  MODIFY `PlayingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblteam`
--
ALTER TABLE `tblteam`
  MODIFY `TeamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
