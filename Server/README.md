<h1>Movie Suggestions - Server setup</h1>

## 1) Required software

 - Install [PHP 7.4 (or higher)](https://www.php.net/manual/en/install.php),
 make sure it works in the console <code>php -v</code> should respond with the current version of the PHP
 - Install [MySQL 8.0 (or higher)](https://www.mysql.com/downloads/)
 - Install PHP dependencies <code>sudo apt install
 php-mbstring php-zip php-gd php-json php-curl</code>
 - Install [Composer](https://getcomposer.org/download/)


## 2) Config files

 - create a copy of ".env.example" named ".env" <code>cp .env.example .env</code>
 - edit the following options within the ".env" file:
<br><code>DB_DATABASE=</code><i>the desired name of the database, create the same one in MySQL</i>
and your MySQL credentials, username and password, respectively
<br><code>DB_USERNAME=<br>DB_PASSWORD=</code>
 - locate your <code>php.ini</code> file and edit it with elevated privileges and
 uncomment the following lines
 <br>
 <code>;extension=mbstring</code>-><code>extension=mbstring</code>
 <br>
 <code>;extension=pdo_mysql</code>-><code>extension=pdo_mysql</code>
 
<hr>
*** Make sure to save these changes.
Upon any edition to this file the server needs to be restarted to take effect. ***
<hr>

## 3) Install requirements via the Composer

- Within the command line, navigate to the 
[Server folder](https://github.com/mayonez89/MovieSuggestions/blob/main/Server)
 - Run command: <code>composer install</code> - this will install all the requirements

## 4) Migrate the database

 - Within the command line, navigate to the 
[Server folder](https://github.com/mayonez89/MovieSuggestions/blob/main/Server)
 - Run command: <code>php artisan migrate:fresh</code> - this sets up the database schema without example data
 - Navigate to root of the project and locate `data_only.sql` inside `Database` folder.
 - To populate the database login to mysql
 - run `use whatever_is_your_db`
 - run `source data_only.sql`
- alternate solution: `mysql -u [username] -p [db_name] < Database/data_only.sql`
## 5) Run the server

- Within the command line, navigate to the 
[Server folder](https://github.com/mayonez89/MovieSuggestions/blob/main/Server)
 - Run command: <code>php artisan serve</code>
