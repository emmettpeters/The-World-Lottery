<?php

require_once "twl_login.php";
require_once "db_connect.php";

// $statement = "DROP TABLE IF EXISTS twl_lotteries";

// $dbc->exec($statement);

$statement = "CREATE TABLE IF NOT EXISTS twl_lotteries (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title  VARCHAR(128),
    description VARCHAR(128),
    initialValue DECIMAL,
    currentValue DECIMAL,
    startDate DATETIME,
    endDate DATETIME,
    image VARCHAR(255),
    PRIMARY KEY (id),
    UNIQUE (username, email)
    );
";

$dbc->exec($statement);