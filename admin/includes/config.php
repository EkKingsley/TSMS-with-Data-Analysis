<?php

DEFINE ('DB_USER', 'eccles');
DEFINE ('DB_PASSWORD', 'EKKINORA');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'tsms');

$conn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
 OR die('Could not connect to mysql: ' . mysqli_connect_error());

mysqli_set_charset($conn, 'utf8');

?>