

-- food categories

CREATE TABLE `food_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `categoryDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `food_category` (`id`, `title`, `image_name`, `featured`, `active`, `categoryDesc`) VALUES
(1, 'Pizza', 'test.jpg', 'Yes', 'Yes', 'Pizza is a savory dish of Italian origin, consisting of a usual'),
(2, 'Burger', 'test.jpg', 'Yes', 'Yes','Pizza is a savory dish of Italian origin, consisting of a usual'),
(3, 'Wraps', 'test.jpg', 'Yes', 'Yes','Pizza is a savory dish of Italian origin, consisting of a usual'),
(4, 'Pasta', 'test.jpg', 'Yes', 'Yes','Pizza is a savory dish of Italian origin, consisting of a usual'),
(5, 'Sandwich', 'test.jpg', 'Yes', 'Yes','Pizza is a savory dish of Italian origin, consisting of a usual');

-- food items

CREATE TABLE `food_items` (
  `momo_id` int(10) UNSIGNED NOT NULL,
  `momo_name` varchar(100) NOT NULL,
  `momo_description` text NOT NULL,
  `momo_price` decimal(10,2) NOT NULL,
  `momo_image` varchar(255) NOT NULL,
  `momo_category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `food_items` ( `momo_id`,  `momo_name`, `momo_description`,  `momo_price`,  `momo_image`,  `momo_category_id`, `featured`, `active`) VALUES
(4, 'chicken momo', 'mommomo khau jyan banau', '4.00', 'test.jpg', 5, 'Yes', 'Yes'),
(5, 'chicken momo', 'Best Firewood Pizza in Town.', '9.00', 'test.jpg', 4, 'No', 'Yes'),
(9, 'Chicken momo', 'Crispy flour tortilla loadedng.', '5.00', 'Food-Name-3461.jpg', 1, 'Yes', 'Yes'),
(10, 'Cheeseburger', 'A cheeseburger y.', '4.00', 'Food-Name-433.jpeg', 2, 'Yes', 'Yes'),
(11, 'Grilled Cheese Sandwich', 'Assembled by cre sliceseese melts.', '3.00', 'Food-Name-3631.jpg', 3, 'Yes', 'Yes');

ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `food_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `food_items`
    ADD PRIMARY KEY (`momo_id`);

ALTER TABLE `food_items`
    MODIFY `momo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-- Users

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1111111111, '1', 'admin', '2021-04-11 11:40:58');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- order_details

CREATE TABLE `order_details` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderId`);

ALTER TABLE `order_details`
  MODIFY `orderid` int(21) UNSIGNED NOT NULL AUTO_INCREMENT;

-- View Cart
CREATE TABLE `viewcart` (
  `id` int(11) NOT NULL,
  `momo_id` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Order Items
CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `momo_id` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Tables
CREATE TABLE `tables` (
  `table_id` int(10) UNSIGNED NOT NULL,
  `table_number` int(10) NOT NULL,
  `table_type` varchar(50) NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Reservations
CREATE TABLE `reservations` (
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `table_id` int(10) UNSIGNED NOT NULL,
  `reservation_date` date NOT NULL,
  `comments` text,
  `number_of_guests` int(5) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
