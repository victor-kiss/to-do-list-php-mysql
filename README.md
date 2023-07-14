## To-do list PHP + MySQL

<p>a simple to-do list using pdo and mysql, i hope you like it!</p>

## Getting Started

<p>Let's create the database, frist install <a href="https://www.mysql.com/">MySQl</a>,<a href="https://www.php.net/">php</a> and <a href="https://www.mysql.com/products/workbench/">MySQL Workbench</a> if not installed yet.<p>

<p>After create new user, create a new connection and a new database for project. If you don't know this steeps see:<a href="https://dev.mysql.com/doc/workbench/en/">MySQL Workbench Documentation<a> !</p>

<span>SQL for create table:</span>

```
CREATE TABLE tasks (
    `taskID` INT AUTO_INCREMENT,
    `task` VARCHAR(255)  NOT NULL UNIQUE,
    `task_name` VARCHAR(100) NOT NULL  UNIQUE,
    PRIMARY KEY (`taskID`)
)
```

<p>Now, insert your database data (username, password and database name) in <b>db-connect.php</b> and magic! Your to-do list is running!<p>
