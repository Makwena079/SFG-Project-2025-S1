<?php

// $host = '3306';
// $user = 'tmtdgri3q0c3_campus';  // Your database username
// $password = 'tmtdgri3q0c3_campus';  // Your database password
// $dbname = 'tmtdgri3q0c3_campus';

// $conn = mysqli_connect($host, $user, $password, $dbname);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }


$host = 'localhost';
$user = 'root';  // Your database username
$password = '';  // Your database password
$dbname = 'campus_system';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
