# 🚗 Car Rental System

## 📖 Project Overview

The **Car Rental System** is a web-based vehicle booking application that allows users to browse available cars, view rental details, and book vehicles online with ease. The system is developed using **PHP**, **MySQL**, **HTML**, **CSS**, and **Bootstrap** to provide a smooth and user-friendly experience for both customers and administrators.

Customers can explore different cars, check rental prices, and make reservations, while administrators can manage vehicles, bookings, and customer information through a dedicated dashboard. The project aims to simplify the car rental process and provide an efficient vehicle management solution.

---

# ✨ Features

* 🚗 Browse Available Cars
* 🔍 Search and Filter Vehicles
* 📅 Online Car Booking
* 👤 User Registration & Login
* 🔐 Secure Authentication System
* 💰 Rental Price Management
* 📋 Booking Management
* 🖥️ Admin Dashboard
* ⚡ Fast and Responsive Interface
* 📱 Mobile-Friendly Design

---

# 🛠️ Technologies Used

* PHP
* MySQL
* HTML5
* CSS3
* Bootstrap 5
* JavaScript

---

# 📂 Project Structure

```text
car-rental-system/

├── index.php
├── about.php
├── contact.php
├── cars.php
├── booking.php
├── login.php
├── register.php
├── dashboard.php
├── admin/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── database/
│   └── car_rental.sql
│
├── config.php
├── logout.php
├── README.md
└── .gitignore
```

---

# 🚀 Installation Steps

## 1. Clone the Repository

```bash
git clone https://github.com/borna19/car-rental-system.git

cd car-rental-system
```

---

## 2. Create a Local Server Environment

Use any of the following:

```text
XAMPP
Laragon
WAMP
```

Move the project folder into:

### XAMPP

```text
htdocs/
```

### Laragon

```text
www/
```

---

## 3. Create Database

Open phpMyAdmin and create a database:

```sql
car_rental_db
```

Import the SQL file:

```text
database/car_rental.sql
```

---

## 4. Configure Database Connection

Update your database credentials inside:

```php
config.php
```

Example:

```php
<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "car_rental_db";

$conn = mysqli_connect($host, $user, $password, $database);

?>
```

---

## 5. Run the Application

```bash
http://localhost/car-rental-system
```

---

# ⚙️ Working Process

1. Launch the application in a web browser.
2. Users browse available rental cars.
3. Customers register or log in to their account.
4. The system displays car details and rental prices.
5. Users select a vehicle and submit a booking request.
6. Booking information is stored in the database.
7. Administrators manage cars and bookings through the dashboard.
8. The rental process is completed successfully.

---

# 🚘 Available Functionalities

* Car Listing Management
* Vehicle Details View
* Car Booking System
* User Authentication
* Booking Records Management
* Admin Dashboard
* Customer Management
* Responsive User Interface

---

# 🎯 Applications

* Car Rental Companies
* Travel Agencies
* Vehicle Booking Services
* Fleet Management Systems
* Transportation Businesses
* Educational PHP Projects

---

# 🚀 Future Enhancements

* Online Payment Gateway Integration
* Google Maps Integration
* Vehicle Availability Tracking
* Email Notifications
* Invoice Generation
* Mobile Application Support
* AI-Based Vehicle Recommendations

---

# 📸 Screenshots

Add screenshots of your application here.

```text
screenshots/

home-page.png
car-list.png
booking-page.png
admin-dashboard.png
```

---

# 📋 Requirements

* PHP 8.0+
* MySQL
* Apache Server
* XAMPP / Laragon
* Modern Web Browser

---

# 👨‍💻 Author

**Developed by:**
**Barnali Bhowmik**

---

# 📄 License

This project is created for educational and learning purposes. Feel free to modify and improve it as needed.

---

## ⭐ Support

If you found this project helpful, please give it a ⭐ on GitHub. Your support motivates me to create more PHP and Web Development projects.
