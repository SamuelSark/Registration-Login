<?php

$dbhost = "localhost";
$dbuser = "comp440";
$dbpass = "pass1234";
$dbname = "comp440_project";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
