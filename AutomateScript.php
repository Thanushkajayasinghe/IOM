<?php

$pgDbCon = pg_connect("host=127.0.0.1 dbname=iom user=postgres password=123456");
date_default_timezone_set("Asia/Colombo");

$sqlQuery = "Truncate table temp_table";
pg_query($pgDbCon, $sqlQuery);

$sqlQuery = "Truncate table table_token";
pg_query($pgDbCon, $sqlQuery);









