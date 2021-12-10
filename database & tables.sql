


1.
CREATE USER 'saeeda'@'localhost' IDENTIFIED BY 'yHglz5fse2KyxhK';
REVOKE ALL PRIVILEGES ON  *.* FROM 'saeeda'@'localhost'; 
REVOKE GRANT OPTION ON  *.* FROM 'saeeda'@'localhost'; 
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE ON  *.* TO 'saeeda'@'localhost';

*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-

2.
CREATE DATABASE IF NOT EXISTS `seu_saeed_874413` CHARACTER SET utf8 COLLATE utf8_general_ci;

*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-

3.

--
-- Database: `seu_saeed_874413`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `seu_saeed_874413`.`employee` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(20) DEFAULT NULL,
  `employee_name_en` varchar(100) NOT NULL,
  `employee_name_ar` varchar(100) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `nationality` int(11) NOT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `create_by` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `seu_saeed_874413`.`employee` (`id`, `employee_no`, `employee_name_en`, `employee_name_ar`, `employee_id`, `birth_date`, `nationality`, `mobile_no`, `active`, `create_by`, `create_at`) VALUES
(16, '123456', 'Saeed Ali Saeed', 'سعيد علي سعيد', 1234567890, '1980-10-01', 35, 511223344, 1, 1, '2021-12-10 16:22:00'),
(17, '123457', 'Mohammed Ahmed', 'محمد احمد', 1234567880, '1975-01-01', 37, 577998841, 1, 1, '2021-12-10 16:23:00'),
(18, '123458', 'Khalid Ibrahim', 'خالد ابراهيم', 1234567870, '1990-01-01', 40, 599887741, 1, 1, '2021-12-10 16:24:00'),
(19, '1234561', 'Zhang Chen', 'جانف تشين', 1234567810, '1988-05-06', 38, 577898874, 0, 1, '2021-12-10 16:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_nationality`
--

CREATE TABLE `seu_saeed_874413`.`employee_nationality` (
  `id` int(11) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `create_by` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_nationality`
--

INSERT INTO `seu_saeed_874413`.`employee_nationality` (`id`, `nationality`, `active`, `create_by`, `create_at`) VALUES
(35, 'Saudi', 1, 1, '2021-12-10 16:09:00'),
(36, 'Hindi', 0, 1, '2021-12-10 16:09:00'),
(37, 'Egyptian', 1, 1, '2021-12-10 16:14:00'),
(38, 'Chinese', 1, 1, '2021-12-10 16:14:00'),
(39, 'Indian', 1, 1, '2021-12-10 16:14:00'),
(40, 'Iraqi', 1, 1, '2021-12-10 16:14:00'),
(41, 'German', 0, 1, '2021-12-10 16:14:00'),
(42, 'Austrian', 1, 1, '2021-12-10 16:14:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `seu_saeed_874413`. `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_nationality`
--
ALTER TABLE `seu_saeed_874413`. `employee_nationality`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `seu_saeed_874413`. `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee_nationality`
--
ALTER TABLE `seu_saeed_874413`. `employee_nationality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

