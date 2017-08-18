<?php

require_once "twl_login.php";
require_once "db_connect.php";

// $statement = "DROP TABLE IF EXISTS twl_chat";

// $dbc->exec($statement);

$statement = "CREATE TABLE IF NOT EXISTS twl_chat (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    content VARCHAR(255),
    commentDate DATETIME,
    PRIMARY KEY (id)
    );
";

$dbc->exec($statement);