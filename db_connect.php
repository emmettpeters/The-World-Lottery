<?php

$dbc = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME  , DB_USERNAME  , DB_PASSWORD);

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
