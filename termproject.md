# Nepali Kitchen Website Technical Documentation

## Table of Contents
- [Introduction](#introduction)
- [Architecture](#architecture)
- [Business Logic](#business-logic)
- [Database Design](#database-design)
- [Special Features](#special-features)
- [Team's Contribution](#teams-contribution)

## Introduction

The Nepali Kitchen website is an online platform that allows users to explore various food categories, view the menu, and place orders for Nepali cuisine. This technical documentation provides an overview of the architecture, business logic, database design, and special features implemented in the system.

## Architecture

The website follows a client-server architecture:

- **Client-Side:** The front-end is built using HTML, CSS, and JavaScript. Bootstrap is used for responsive design, and jQuery is employed for dynamic interactions.
  
- **Server-Side:** PHP is used for server-side scripting. The server communicates with a MySQL database to fetch and store data. Apache is used as the web server.

## Business Logic

### User Authentication

The website implements user authentication for placing orders. Registered users can log in, while new users can create an account. Passwords are securely hashed before storage.

### Order Processing

The system allows users to browse food categories, view the menu, and add items to their cart. The order details are stored in the database, and users can proceed to checkout, providing delivery details.

## Database Design

### Tables

1. **food_category:** Stores information about food categories.
   - Columns: `id`, `title`, `image_name`, `active`, `featured`, `created_at`

2. **food_items:** Contains details of food items.
   - Columns: `momo_id`, `momo_name`, `momo_price`, `momo_description`, `momo_image`, `active`, `featured`, `created_at`

3. **order_details:** Records information about user orders.
   - Columns: `orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`

4. **orderitems:** Stores individual items within an order.
   - Columns: `orderItemId`, `orderId`, `momo_id`, `itemQuantity`

### Relationships

- `food_category.id` relates to `food_items.category_id`.
- `order_details.orderId` relates to `orderitems.orderId` and `orderitems.momo_id`.

## Special Features

### Cart Management

Users can add items to their cart, adjust quantities, and proceed to checkout. The cart contents are stored in the database and tied to the user's session.

### Responsive Design

The website is designed to be responsive, ensuring a seamless user experience across various devices and screen sizes.

### Password Security

User passwords are securely hashed using PHP's password_hash() function to enhance security.

---

This technical document provides a high-level overview of the Nepali Kitchen website's architecture, business logic, database design, and special features. For more detailed information, refer to the source code and relevant comments.

### Team's Contribution

- **Suman Khadka:** 
   - Led overall architecture design, and handled git pushes and merges.
   - Implemented the dynamic cart and order page.
   - Implemented the admin control system.

- **Niraj:**
    -	Contributed to the database configuration and integration.
    -	Worked on special deals and user rating management system.
    -	Implemented the contact form and the database and logic behind it.

- **Niranjan Gaire:**
    - Implemented the About Us page and handle the FAQ Page.
    -	Implemented the User Interface and bootstrap usage.


