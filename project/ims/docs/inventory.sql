--Step-1: Create database
CREATE DATABASE inventory

--Step-2: Click inventory database and run below scripts
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(15) NOT NULL,
  `purchase_price` decimal(10,0) NOT NULL,
  `sales_price` decimal(10,0) NOT NULL,
  `stock_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;


INSERT INTO `products` (`id`, `name`, `code`, `purchase_price`, `sales_price`, `stock_qty`) VALUES
(2, 'Mouse', 'M123', '150', '500', 50),
(3, 'Laptop', 'L-1234', '35000', '45000', 8),
(6, 'Computer', 'C-1234', '35000', '45000', 22);

