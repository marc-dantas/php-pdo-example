# PHP PDO Example
- A simple example of a "system" using MySQL and the PHP OOP.

# Instructions for anyone wanting to test this example
- On MySQL (Workbench) create a **connection** and create a **database** called `primary`;
- Enter the command on the first line: <code>use &#96;primary&#96;;</code>
- Create a table called `users`
- In the table, create the following columns:
    - `userid int not null auto_increment primary key`
    - `userlogin varchar(64) not null`
    - `userpassword varchar(255) not null`
    - `userdate timestamp not null default current_timestamp()`
    <br>
- Start Apache (PHP Interpreter) and go to `index.php` (this is the test file, you can modify it)

WARNING: MySQL version is 8
