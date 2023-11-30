

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
