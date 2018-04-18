<?php
$DBASE = mysql_connect("127.0.0.1","billing", "billing") or die("Could not connect: " . mysql_error());
mysql_select_db("billing") or die("Could not select database");
mysql_query("SET NAMES utf8");
?>