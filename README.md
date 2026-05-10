# HR Data Management System - Technical Test

Hello! Thank you for taking the time to review my technical test submission for the IT Programmer position at Seatrium.

This repository contains a web-based HR Data Management application built using **PHP (Laravel 8)** and **PostgreSQL**. I have designed the application to fulfill all the core requirements outlined in the test brief, with a focus on clean code, data integrity, and a practical user experience.

## System Features

* **Employee Management:** Complete CRUD functionality to manage employee records. As requested, the system uses UUIDs as the primary key for enhanced security.
* **Department Management:** Standard CRUD operations to manage departments, correctly related to the Employee table using Foreign Keys.
* **Attendance Import & Preview:** * Users can import attendance data using an Excel file (`.xlsx` or `.xls`).
    * **Practical UX Approach:** Instead of forcing HR staff to manually copy-paste long UUIDs into an Excel sheet, I implemented a workflow where users can simply select the employee from a dropdown in the UI. The Excel file then only needs to contain two simple columns: `Time In` and `Time Out`.
    * The system includes a live preview page that formats and validates the dates (DD/MM/YY HH:MM) before firmly committing the data to the database.

## Tech Stack

* **PHP:** 7 (following requirements)
* **Framework:** Laravel 8 (PHP)
* **Database:** PostgreSQL
* **Frontend:** Bootstrap 5 (for a clean, responsive, and professional UI)
* **Excel Handling:** Maatwebsite Excel

## Local Setup Instructions

Follow these steps to run the project on your local machine:

### 1. Clone the repository
```bash
git clone [https://github.com/Dhaoed/Technical-Test-Muhammad-Dhaoed.git]
cd Technical-Test-Muhammad-Dhaoed
```

### 2. Install dependencies
```bash
composer install
```

### 3. Configure the Environment
```bash
Copy the .env.example file to create your own .env file, then update the PostgreSQL database credentials.
```
Make sure to set the database variables:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Generate Application Key
``` bash
php artisan key:generate
```

### 5. Set Up the Database
I have included the exported database file for your convenience. Please import the database, seatrium_technical_test_db.sql file into your PostgreSQL database.
(_BUT_, you can also run php artisan migrate to generate the empty tables).

### 6. Run the Application
``` bash
php artisan serve
```
You can now access the application at http://127.0.0.1:8000 server.

## 7. Attendance Import File Example
To test the attendance import feature, you can find the Excel file(.xlx/.xlsx) in excel folder inside the public folder.
``` bash
public/excel/
```

Thank you for the opportunity. I look forward for any feedback!
Sincerely yours

Muhammad Dhaoed Arrazaq - Author

for more information : mdhaoed@gmail.com
