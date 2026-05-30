<?php

$conn = mysqli_connect("localhost","root","","student1");

if(!$conn)
{
    die("Connection Failed");
}

echo "Database Connected";

?>
