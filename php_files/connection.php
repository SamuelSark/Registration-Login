<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "comp440_project";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
