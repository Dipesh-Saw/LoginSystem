<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn == false) {
    die("Connection Failed" . mysqli_connect_error());
}

$email = $_POST['usermail'];
$password = $_POST['passwd'];

$sql = "SELECT * FROM logintb WHERE email = '$email' AND password = '$password'";

// echo $sql;
// echo"<br>";

$row = array();
$check = mysqli_query($conn, $sql);

// $numrow = mysqli_num_rows($check);

// store values of $check
$row = mysqli_fetch_assoc($check);


if ($row['email'] == $email && $row['password'] == $password) {
    $_SESSION['email'] = $row['email'];

    header("Location:/loginsystem2/profile.php");
} else {
    header("Location:/loginsystem2/404.html");
}

?>