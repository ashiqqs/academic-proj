
CREATE DATABASE bloodbank


CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;