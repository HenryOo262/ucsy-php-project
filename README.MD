# UCSY PHP Project

This is the PHP project for the semester-based 'Teacher Evaulation Form' of my university. It was written for the fourth semester PHP class project. The project is janky and bloated due to being written in pure PHP and minimal Javascript without utilizing modern frontend technologies, frameworks, AJAX, etc. Hey at least it works. 

## Installation

To get started, follow these steps:

Clone the repository: `git clone https://github.com/HenryOo262/ucsy-php-project`

## Configuration

Before running the application, you need to set up some environment variables:

Create a config.php file in the root directory of the project.

Inside the configuration file, add the following environment variables:

* define('DB_HOST', 'localhost:3306');

* define('DB_NAME', 'databaseName');

Replace databaseName with the name of your database.

## Usage

Install PHP 8.0 or above.

Open the terminal and reach to the project root folder.

Run the server using PHP: `php -S localhost:8000`

Open your web browser and navigate to `http://localhost:8000/`

Created accounts - 

Admins: 

username: admin  password: ucsy2023 <br>
username: admin2 password: ucsy2024 <br>

Students: 

username: 21370  password: hello   <br>
username: 41650  password: hellomm <br> 
username: henry  password: hellohi <br>

## Database Setup 

In MySQL workbench, create user "admin" and grant "DBA Role" in Administrative Roles. 

If additional "DBA users" are to be added, please make sure to create their own accounts in "user table" in the database. That means, each 
"DBA user" must have an "admin account" in the database with the same name and password as it has on the database server.

The two non-DBA users are "student" and "validator" which have limited accesses.

Run the mysql scripts included in the project directory.

The scripts in "grant.sql" create necessary users and grant privileges to them.