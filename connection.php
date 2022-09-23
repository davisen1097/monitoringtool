<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "davisenwebsitemonitoringtool";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
