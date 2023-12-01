

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
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;