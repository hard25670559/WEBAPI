-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.23-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Account_Data`
--

DROP TABLE IF EXISTS `Account_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Account_Data` (
  `Account_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '帳號編號',
  `Account_UserIdNum` varchar(10) NOT NULL COMMENT '帳號擁有者編號',
  `Account_UserName` varchar(45) NOT NULL COMMENT '帳戶擁有者名稱',
  `Account_Number` varchar(45) NOT NULL COMMENT '帳號',
  `Account_Password` varchar(45) NOT NULL COMMENT '帳號密碼',
  `Account_Create` datetime NOT NULL COMMENT '帳號建立日期',
  `Account_Update` datetime DEFAULT NULL COMMENT '帳號修改日期',
  `Account_Status` varchar(5) NOT NULL DEFAULT '0' COMMENT '帳戶狀態(''1''停用、''0''使用中)',
  PRIMARY KEY (`Account_id`,`Account_UserIdNum`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='帳號資料';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Account_Data`
--

LOCK TABLES `Account_Data` WRITE;
/*!40000 ALTER TABLE `Account_Data` DISABLE KEYS */;
INSERT INTO `Account_Data` VALUES (5,'','test','test','test','0000-00-00 00:00:00','2016-07-20 13:15:43','0'),(6,'','123','123','123','0000-00-00 00:00:00','2016-07-20 12:17:12','0'),(7,'','123','boss','boss','2016-07-20 15:16:42','2016-07-20 15:28:49','1');
/*!40000 ALTER TABLE `Account_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BanIP`
--

DROP TABLE IF EXISTS `BanIP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BanIP` (
  `BanIp_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '封鎖IP編號',
  `BanIP_Ip` varchar(45) NOT NULL COMMENT '封鎖IP位址',
  `BanIP_BanTime` datetime NOT NULL COMMENT '封鎖IP時間',
  `BanIP_OpenTime` datetime NOT NULL COMMENT '解所IP時間',
  `BanIP_Times` int(11) NOT NULL DEFAULT '0' COMMENT '封鎖IP次數',
  `BanIP_status` int(11) NOT NULL DEFAULT '0' COMMENT '是否被鎖(0=未:1= 已鎖)',
  PRIMARY KEY (`BanIp_Id`,`BanIP_Ip`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='封鎖IP';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BanIP`
--

LOCK TABLES `BanIP` WRITE;
/*!40000 ALTER TABLE `BanIP` DISABLE KEYS */;
/*!40000 ALTER TABLE `BanIP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Client_Data`
--

DROP TABLE IF EXISTS `Client_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client_Data` (
  `Client_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公司編號',
  `Client_Name` varchar(45) NOT NULL COMMENT '公司名稱',
  `Client_EIN` int(11) NOT NULL COMMENT '公司統編',
  `Client_Add` varchar(45) NOT NULL COMMENT '公司住址',
  `Client_Tel` int(11) NOT NULL COMMENT '公司電話',
  `Client_Bank` varchar(45) NOT NULL COMMENT '公司銀行',
  `Client_Bankaccount` varchar(45) NOT NULL COMMENT '公司銀行帳戶',
  `Client_BankAccountStatus` varchar(45) NOT NULL COMMENT '公司銀行帳戶狀態',
  `Client_Account` varchar(45) NOT NULL COMMENT '公司帳號',
  `Client_Password` varchar(45) NOT NULL COMMENT '公司密碼',
  `Client_Create` datetime NOT NULL COMMENT '公司資料建立日期',
  `Client_Update` datetime NOT NULL COMMENT '公司資料修改日期',
  PRIMARY KEY (`Client_Id`,`Client_EIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客戶資料';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Client_Data`
--

LOCK TABLES `Client_Data` WRITE;
/*!40000 ALTER TABLE `Client_Data` DISABLE KEYS */;
/*!40000 ALTER TABLE `Client_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Daily_data`
--

DROP TABLE IF EXISTS `Daily_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Daily_data` (
  `Daily_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日報表編號',
  `Daily_DriverId` int(11) NOT NULL COMMENT '日報表所屬司機編號',
  `Daily_OrderId` int(11) NOT NULL COMMENT '日報表所屬訂單編號',
  `Daily_DriverCarId` varchar(45) CHARACTER SET latin1 NOT NULL COMMENT '日報表所屬車號',
  `Daily_Oil` int(11) DEFAULT NULL COMMENT '加油量',
  `Daily_Mileage` int(11) NOT NULL COMMENT '里程數',
  `Daily_ViolationAdd` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT '違規地點',
  `Daily_ViolationCause` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT '違規原因',
  `Daily_Collection` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT '代收項目',
  `Daily_CollectionStatus` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT '代收金額',
  PRIMARY KEY (`Daily_Id`,`Daily_DriverId`,`Daily_OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日報表資料';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Daily_data`
--

LOCK TABLES `Daily_data` WRITE;
/*!40000 ALTER TABLE `Daily_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `Daily_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Driver_Data`
--

DROP TABLE IF EXISTS `Driver_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Driver_Data` (
  `Driver_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '司機編號',
  `Driver_Name` varchar(10) NOT NULL COMMENT '司機名稱',
  `Driver_Idnum` varchar(15) NOT NULL COMMENT '司機身分證',
  `Driver_Born` date NOT NULL COMMENT '司機出生年月日',
  `Driver_Add` varchar(45) NOT NULL COMMENT '司機地址\n',
  `Driver_Cel` int(11) NOT NULL COMMENT '司機手機號碼',
  `Driver_Account` varchar(50) NOT NULL COMMENT '司機帳號',
  `Driver_Password` varchar(45) NOT NULL COMMENT '司機密碼',
  `Driver_Create` datetime NOT NULL COMMENT '司機資料建立日期',
  `Driver_Update` datetime NOT NULL COMMENT '司機資料修改日期',
  `Driver_Status` varchar(5) NOT NULL COMMENT '司機狀態(在職、離職、留職停薪)',
  PRIMARY KEY (`Driver_Id`,`Driver_Idnum`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='司機資料';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Driver_Data`
--

LOCK TABLES `Driver_Data` WRITE;
/*!40000 ALTER TABLE `Driver_Data` DISABLE KEYS */;
INSERT INTO `Driver_Data` VALUES (1,'aaa','','0000-00-00','',0,'aaa','aaa','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(2,'bbb','','0000-00-00','',0,'bbb','bbb','0000-00-00 00:00:00','2016-07-18 13:44:10',''),(3,'ccc','','0000-00-00','',0,'ccc','ccc','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(4,'ddd','','0000-00-00','',0,'ddd','ddd','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(5,'eee','','0000-00-00','',0,'eee','eee','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(8,'','','0000-00-00','',0,'123','456','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(9,'','','0000-00-00','',0,'1237','4567','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(10,'','','0000-00-00','',0,'12376','45676','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(11,'','','0000-00-00','',0,'123769','456769','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(12,'','','0000-00-00','',0,'zss','szs','0000-00-00 00:00:00','0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `Driver_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GPS_Point`
--

DROP TABLE IF EXISTS `GPS_Point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GPS_Point` (
  `GPS_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Driver_Id` int(11) NOT NULL,
  `sluice` int(11) NOT NULL DEFAULT '0',
  `x` double NOT NULL,
  `Y` double NOT NULL,
  PRIMARY KEY (`GPS_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GPS_Point`
--

LOCK TABLES `GPS_Point` WRITE;
/*!40000 ALTER TABLE `GPS_Point` DISABLE KEYS */;
INSERT INTO `GPS_Point` VALUES (0,0,0,0,0);
/*!40000 ALTER TABLE `GPS_Point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Monthly_Data`
--

DROP TABLE IF EXISTS `Monthly_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Monthly_Data` (
  `Monthly_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '月報表編號',
  `Monthly_PaymentId` int(11) NOT NULL COMMENT '請款單編號',
  `Monthly_ClientId` int(11) NOT NULL COMMENT '客戶編號',
  `Monthly_ClientName` varchar(45) NOT NULL COMMENT '客戶名稱',
  `Monthly_PayStatus` varchar(45) NOT NULL COMMENT '付款狀態',
  `Monthly_PayDate` datetime NOT NULL COMMENT '付款日期',
  `Monthly_PayMoney` int(11) NOT NULL COMMENT '付款金額',
  PRIMARY KEY (`Monthly_Id`,`Monthly_PaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='月報表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Monthly_Data`
--

LOCK TABLES `Monthly_Data` WRITE;
/*!40000 ALTER TABLE `Monthly_Data` DISABLE KEYS */;
/*!40000 ALTER TABLE `Monthly_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Office_Data`
--

DROP TABLE IF EXISTS `Office_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Office_Data` (
  `Office_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '行政人員編號',
  `Office_Department` varchar(45) NOT NULL COMMENT '所屬行政部門',
  `Office_Name` varchar(45) NOT NULL COMMENT '行政人員名稱',
  `Office_Idnum` varchar(45) NOT NULL COMMENT '行政人員身分證',
  `Office_Born` date NOT NULL COMMENT '行政人員出生年月日',
  `Office_Add` varchar(45) NOT NULL COMMENT '行政人員住址',
  `Office_Cel` int(11) NOT NULL COMMENT '行政人員手機',
  `Office_Account` varchar(45) NOT NULL COMMENT '行政人員帳號',
  `Office_Password` varchar(45) NOT NULL COMMENT '行政人員密碼',
  `Office_Create` datetime NOT NULL COMMENT '行政人員資料建立日期',
  `Office_Update` datetime NOT NULL COMMENT '行政人員資料修改日期',
  `Office_Status` varchar(5) NOT NULL COMMENT '行政人員狀態(在職、離職、留職停薪)',
  PRIMARY KEY (`Office_Id`,`Office_Idnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行政人員資料';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Office_Data`
--

LOCK TABLES `Office_Data` WRITE;
/*!40000 ALTER TABLE `Office_Data` DISABLE KEYS */;
/*!40000 ALTER TABLE `Office_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrderDetails_data`
--

DROP TABLE IF EXISTS `OrderDetails_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OrderDetails_data` (
  `OrderDetails_OrderId` int(11) NOT NULL COMMENT '訂單詳細資料所屬訂單編號',
  `OrderDetails_PlateNumber` int(11) NOT NULL COMMENT '板號',
  `OrderDetails_DriverId` int(11) NOT NULL COMMENT '訂單詳細資料所屬司機編號',
  `OrderDetails_DeliveryDate` date NOT NULL COMMENT '訂單派送日期',
  `OrderDetails_ActualDate` date NOT NULL COMMENT '訂單實際送達日期',
  `OrderDetails_Start` varchar(45) NOT NULL COMMENT '訂單起始地點',
  `OrderDetails_End` varchar(45) NOT NULL COMMENT '訂單送達地點',
  `OrderDetails_ContainerSort` varchar(45) NOT NULL COMMENT '貨櫃類別',
  `OrderDetails_CargoName` varchar(45) NOT NULL COMMENT '商品名稱',
  `OrderDetails_CargoQuantity` varchar(45) NOT NULL COMMENT '商品數量',
  `OrderDetails_ReceivablesItems` varchar(45) DEFAULT NULL COMMENT '收款項目',
  `OrderDetails_ReceivablesMoney` int(11) DEFAULT NULL COMMENT '收款金額',
  `OrderDetails_images` varchar(45) DEFAULT NULL COMMENT '訂單照片',
  `OrderDetails_Create` datetime NOT NULL COMMENT '資料建立日期',
  `OrderDetails_Update` datetime NOT NULL COMMENT '資料修改日期',
  PRIMARY KEY (`OrderDetails_OrderId`,`OrderDetails_DriverId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單詳細資料';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrderDetails_data`
--

LOCK TABLES `OrderDetails_data` WRITE;
/*!40000 ALTER TABLE `OrderDetails_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `OrderDetails_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Order_Data`
--

DROP TABLE IF EXISTS `Order_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Order_Data` (
  `Order_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '訂單編號',
  `Order_ClientId` int(11) NOT NULL COMMENT '訂單所屬客戶編號',
  `Order_CreateDate` datetime NOT NULL COMMENT '訂單建立日期',
  `Order_Vessel` varchar(45) NOT NULL COMMENT '訂單所屬船名',
  `Order_ShipTimes` datetime NOT NULL COMMENT '訂單所屬船次',
  `Order_ContainerNum` varchar(45) NOT NULL COMMENT '訂單貨櫃編號',
  `Order_Status` varchar(45) NOT NULL COMMENT '訂單狀態(已接受、待處理、送貨中、結案)',
  PRIMARY KEY (`Order_Id`,`Order_ClientId`,`Order_CreateDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單資料';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Order_Data`
--

LOCK TABLES `Order_Data` WRITE;
/*!40000 ALTER TABLE `Order_Data` DISABLE KEYS */;
/*!40000 ALTER TABLE `Order_Data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Payment_Data`
--

DROP TABLE IF EXISTS `Payment_Data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Payment_Data` (
  `Payment_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '請款單編號',
  `Payment_ClientId` int(11) NOT NULL COMMENT '請款單所屬客戶編號',
  `Payment_ClientName` varchar(45) NOT NULL COMMENT '請款單所屬客戶名稱',
  `Payment_ClientAdd` varchar(45) NOT NULL COMMENT '請款單所屬客戶住址',
  `Payment_ClientTel` int(11) NOT NULL COMMENT '請款單所屬客戶電話',
  `Payment_OrderId` varchar(45) NOT NULL COMMENT '訂單編號',
  `Payment_OrderDate` date NOT NULL COMMENT '訂單日期',
  `Payment_Expense` varchar(45) NOT NULL COMMENT '訂單費用',
  `Payment_Create` datetime NOT NULL COMMENT '請款單建立日期',
  `Payment_Update` datetime NOT NULL COMMENT '請款單修改日期',
  `Payment_Status` varchar(45) NOT NULL COMMENT '請款單狀態(已核帳、已銷帳、待確認、待銷帳)',
  PRIMARY KEY (`Payment_Id`,`Payment_ClientId`,`Payment_Create`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='請款單';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Payment_Data`
--

LOCK TABLES `Payment_Data` WRITE;
/*!40000 ALTER TABLE `Payment_Data` DISABLE KEYS */;
/*!40000 ALTER TABLE `Payment_Data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-25  9:57:20
