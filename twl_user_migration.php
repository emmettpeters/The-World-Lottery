<?php

require_once "twl_login.php";
require_once "db_connect.php";

// $statement = "DROP TABLE IF EXISTS twl_users";

// $dbc->exec($statement);

$statement = "CREATE TABLE IF NOT EXISTS twl_users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username  VARCHAR(128),
    password VARCHAR(128),
    email VARCHAR(128),
    create_date DATE,
    on_email_list TINYINT,
    PRIMARY KEY (id),
    UNIQUE (username, email)
    );
";

$dbc->exec($statement);