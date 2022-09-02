<?php

$dbhost = "localhost";
$dbuser = "fend_user";
$dbpass = "1234";
$dbname = "testdb";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
