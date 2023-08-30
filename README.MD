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

Open the terminal.

Run the server using PHP: `php -S localhost:8000`

Open your web browser and navigate to `http://localhost:8000/`

## Database Setup 

In MySQL workbench, create user "admin" and grant "DBA Role" in Administrative Roles. 

Run the mysql scripts included in the project directory.

The scripts in "rand.sql" create other necessary users and grant privileges to them. It is recommended to run each statement of "rand.sql" at a time.