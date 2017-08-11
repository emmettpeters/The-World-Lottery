<?php

require_once "twl_login.php";
require_once "db_connect.php";

$statement = "CREATE TABLE IF NOT EXISTS twl_users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(128),
    password VARCHAR(128),
    email VARCHAR(128),
    create_date DATE,
    create_time TIME,
    on_email_list TINYINT,
    remember_username TINYINT,
    PRIMARY KEY (id)
    );
";	

$dbc->exec($statement);