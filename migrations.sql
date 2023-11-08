-- Adminer 4.8.1 MySQL 8.0.29 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
DROP DATABASE IF EXISTS `omega`;
CREATE DATABASE `omega` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `omega`;
CREATE USER 'omega'@'%' IDENTIFIED BY 'omega';
GRANT SELECT ON omega.* TO 'omega'@'%';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Remember_user`;
CREATE TABLE `Remember_user` (
  `username` varchar(20) NOT NULL,
  `token` varchar(256) NOT NULL,
  `hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `Transaction_details`;
CREATE TABLE `Transaction_details` (
  `Account-number` varchar(7) NOT NULL,
  `Amount` int NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Branch` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `User_data`;
CREATE TABLE `User_data` (
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(256) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `privilage` int NOT NULL DEFAULT '1',
  `balance` int NOT NULL DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `User_data` (`username`, `password`, `branch`, `privilage`, `balance`) VALUES
('ACC0001',	'$2y$09$YoRRmrHqg8vTithCns/T7.T7mF0xnpmkC/NDTms73DWl0a4VRHGd2',	'Branch2',	1,	500),
('ACC0002',	'$2y$09$RqQmEcOgS9Iyf0H0/qNV5.75mQcoeA4KwnwOaA.PNKwYgrLHCUD9K',	'Branch4',	1,	500),
('ACC0003',	'$2y$09$iNXQUmlbmfj8GbE0dItO3umHkJ2PsgZIgLnznG/dwmyv8VwAV2e2u',	'Branch3',	1,	500),
('ACC0004',	'$2y$09$a524lujYS8s3FgzOeNTtFuOSurdtjXqWdCa.MRd/4M8sSrTNVEUl6',	'Branch2',	1,	500),
('ACC0005',	'$2y$09$s.L5gal7GOvscHIugBXCy.aK9BZCR5nk6ke8KJmF1HWmWYlPTgZ32',	'Branch1',	1,	500),
('ACC0006',	'$2y$09$6veBIdhRFbIebO5XzmM9tekzCmgV4ywl4Jt38AfznjefqBltssQz.',	'Branch1',	1,	500),
('ACC0007',	'$2y$09$Kw3Nus80Aa2bWWGgXzKlQ.0DXfSloes7DDApm0FoDvIv.AHHoBFwa',	'Branch1',	1,	500),
('ACC0008',	'$2y$09$Ejkbnt10UCx8EbBSoCIHduqICmnFHYQBXTVznXygDTxV.R/XKRTrW',	'Branch3',	1,	500),
('ACC0009',	'$2y$09$Meh.RO8GcXhW.Ips4iUn0u/HVuN1HgSACiq.Z8yPA86G4dawfkQM.',	'Branch2',	1,	500),
('ACC0010',	'$2y$09$YT0GDoeWSf9hU2xcpGhy8eWyTEiVQNNJxL/VFbtKXdsJNS.P/cWHG',	'Branch4',	1,	500),
('ACC0011',	'$2y$09$0LW5GsFIVEsuKgvz/lvoAueF4XPum6wdLIH39DLdmU4gVvlG7bgE6',	'Branch4',	1,	500),
('ACC0012',	'$2y$09$UmwpoT0lF5shs5kKIGBf4OJUxGcm5H6eBLnbHHMi0jcdGUHFGVI7y',	'Branch4',	1,	500),
('ACC0013',	'$2y$09$DLgq9/93WVnECo16I804ludePFsKLn1SkQ4r.aK2j9EptvUpPGZLe',	'Branch2',	1,	500),
('ACC0014',	'$2y$09$w4abn8i.2/dKtslEwITRI.d0F7QCYs5/Tq8Rk/KVFkUhUQcSCq..6',	'Branch3',	1,	500),
('ACC0015',	'$2y$09$6sdVRiCyLTiVAIUqiZCbf.5VLlOTpuWAvhEptT2WbmN5zdfSzq6Ce',	'Branch4',	1,	500),
('ACC0016',	'$2y$09$73U9KAo6k6QuuIcwEuPrVuwhT0.Ub1oHMumvRUDxa7x.1CIF.kzYG',	'Branch3',	1,	500),
('ACC0017',	'$2y$09$VmRm23zqQfvS00AiV7FUbebNVLeP24fMBza4botgsXLgAp1tYJn.S',	'Branch3',	1,	500),
('ACC0018',	'$2y$09$ZoXyAoB/4/bTx/QwIG0ewuZHrMKbmy3SqYwlCP2pKr3jT0k1YVVoa',	'Branch3',	1,	500),
('ACC0019',	'$2y$09$dmTqAQt0Zf.FA8Zf6T0DfOq7oaS1on67KSdctxb8688Lba39mYa7W',	'Branch3',	1,	500),
('ACC0020',	'$2y$09$T0Yo4zcfu7hwNKDwMvNA2ur0y/4i4UpXuYqA22c7LECrxD2JFxduS',	'Branch3',	1,	500),
('ACC0021',	'$2y$09$63nggOqFjrpgruL3.1WK1uTLZW3gdwG6UEPMDmwFXI3BXhpYe7L8K',	'Branch1',	1,	500),
('ACC0022',	'$2y$09$pbq6h6ldR9Y1QmfxvIo.p.Lu1qVRCYvUw07aeV7xmChO9b5R0l2DS',	'Branch3',	1,	500),
('ACC0023',	'$2y$09$1q4zmBcHxsDLOfwfqydEE.OOYWYCGq1tmOhJxJZZ2qitDGFqC.n7G',	'Branch1',	1,	500),
('ACC0024',	'$2y$09$ZG9gGavLipahfUR/3XafBeDPiXWG6sDyDFaz7uXkrX1nzENYBMwWS',	'Branch4',	1,	500),
('ACC0025',	'$2y$09$vwA9z80ScUlS.ooFjzdIBuEQ2C5ryLlug4QlzW951SOayhnCJ1L7K',	'Branch4',	1,	500),
('ACC0026',	'$2y$09$If.iJ3Iag0WW63ut0l6ocueRW98t5AJv6OtDEm35PsbnnITacJ1sG',	'Branch3',	1,	500),
('ACC0027',	'$2y$09$8z2wo11ksw0MemPWaDxyrut2OiMYBe4YqvHC25fqx8FylalyCVwkS',	'Branch1',	1,	500),
('ACC0028',	'$2y$09$AEOKzBoVK7w28OORAHQ6T.T0pyWJyHXpmd44xK8MUfCXKPGsJWvEO',	'Branch4',	1,	500),
('ACC0029',	'$2y$09$aP48JH5I4.XEFTGNcXSgjOCG2yJi9/9GXFDLa0wTMOZeUITmHOJeK',	'Branch1',	1,	500),
('ACC0030',	'$2y$09$0zQDrffQ3VIUBsQ.Qi/feuzD2O8F3lyTxiM.0J9Aa0p/LyOx.OTOm',	'Branch2',	1,	500),
('ACC0031',	'$2y$09$84MowuPiyGvIe7/uHOg1vO11e6vnMSkXpE/VFqpnqZUea.rT9F42m',	'Branch2',	1,	500),
('ACC0032',	'$2y$09$kAqG/YbNe97a8loFny.yl.qMw8SZcekYcTQWCHsXy3nuV/Unup0f6',	'Branch2',	1,	500),
('ACC0033',	'$2y$09$KwLIbjVW5Qt9ygIlLNKkNOrSyped8II4iva.MzUUvMkBjynf46YYy',	'Branch1',	1,	500),
('ACC0034',	'$2y$09$YMlDgg6PYEutO0ASf3.2feh3d.vr7mme72zTYWg21363BjzUrCVE6',	'Branch1',	1,	500),
('ACC0035',	'$2y$09$mB9FiqhNJoHgYN32xVxwhuPIdOKYVWCTETNTuaKkvFSZEZcP3Izc.',	'Branch1',	1,	500),
('ACC0036',	'$2y$09$.Bc/VhrmE3zHm9/Z4noE3u6mDBcsudwuIZAZF.f/PJaWlvwwh9Bnm',	'Branch2',	1,	500),
('ACC0037',	'$2y$09$c1nsUjsDu8L9ziu4F2LWguqanuamfilyAq1Bz38sXlVa222wYjK4O',	'Branch2',	1,	500),
('ACC0038',	'$2y$09$AE5rNOGGuhOV5fh0EHel2uWDcFcmzaV/XKTpm8TnYo21D/58Jsshe',	'Branch4',	1,	500),
('ACC0039',	'$2y$09$4S/Mno/tGgFBzVbBCwUlsOAMg8fF6F.hOlG8FcVypyTZoNW63ZMn2',	'Branch2',	1,	500),
('ACC0040',	'$2y$09$BrjvuvzqLHTd/hCfO6v9S.zel9HuN400AHIKt6riLgMZ78utpfl4m',	'Branch1',	1,	500),
('ACC0041',	'$2y$09$uJBLvxI4WQ8o28c.ijAGS.TxVCYoVCXtYez1.7.EGm5hm2QY03Dha',	'Branch2',	1,	500),
('ACC0042',	'$2y$09$Wt81Xu6aV00VSc5VMvceaeW32VfXcBmrqtWThVoOZtfWGKjhv24iq',	'Branch3',	1,	500),
('ACC0043',	'$2y$09$ifH4JC05zLaIxoM7JNX/D.4y7idiN.MBdtba97m3CA2p42Cf4m3j6',	'Branch4',	1,	500),
('ACC0044',	'$2y$09$/nb91CEvg9dm7Eff7Fl/5eKcPWE8gYv8rtRH5HyTbC6kQfC.IOUpi',	'Branch4',	1,	500),
('ACC0045',	'$2y$09$pYfFXQ8Pr2ACOnTsz5jscuru0C0OxHj8ApT4fdJjG80mIrA9DKyWy',	'Branch3',	1,	500),
('ACC0046',	'$2y$09$S5PBH662meY8M9/FkWV9R.UJUik3A1jNcUPx2pIhCTr3VJwoAS0Yi',	'Branch2',	1,	500),
('ACC0047',	'$2y$09$KgGVG4j9aRYbpQIAztPl2ePc6rktlkWcHkVNy0X2DLOfXma1PTwhW',	'Branch4',	1,	500),
('ACC0048',	'$2y$09$OKEprtEbE7muBZ8UjcM5H.KFfHIttf4VRx7U05XIR6OAOhfY74B8q',	'Branch2',	1,	500),
('ACC0049',	'$2y$09$6q/gVSziMoGrA1QZxYxVluTdzygIAy31oBcNgzMhGS.2Y0ZkKYIHG',	'Branch1',	1,	500),
('ACC0050',	'$2y$09$sCzLUfEKT1vm3JuwTFqwm.7ZZ5iE9799F7Dp8Ut0HSywNPqPuB6n.',	'Branch3',	1,	500),
('Proff_1',	'$2y$09$pPuAdNhsoxB6QtbhZ13gcOJxUsyu.rHiKZ60Dv93g36jTI6DM6AsS',	'Branch1',	2,	0),
('Proff_2',	'$2y$09$PRBzo2mwiwBmjFYVdqqSlear/VQ7NOPuCthyMFEFcOkuuGthNWRAC',	'Branch2',	2,	0),
('Proff_3',	'$2y$09$F/j1XbtY8D6P4PIRSgIbru3DVrwVlf2dgnoBWqz6wqTpdxVowModG',	'Branch3',	2,	0),
('Proff_4',	'$2y$09$fkAibjrwYx17V9gq0Ey7KuRSD49Lup4sQePatj6NZVEkXXfYf2wZO',	'Branch4',	2,	0),
('CEO',	'$2y$09$qAnPPWXPiSbnwFqX4ZVPhOneBWye5qhREUu0EOx8tcx.kaOrKUDcC',	'CEO',	3,	0);

DROP TABLE IF EXISTS `User_session`;
CREATE TABLE `User_session` (
  `username` varchar(20) NOT NULL,
  `token` varchar(256) NOT NULL,
  `login_time` timestamp NOT NULL,
  `ip` varchar(16) NOT NULL,
  `agent` varchar(256) NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2022-07-24 07:06:55