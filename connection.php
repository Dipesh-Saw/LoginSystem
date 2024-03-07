<?php
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydb = "mydb";

    $conn = mysqli_connect($servername,$username,$password,$mydb);

    if($conn == false){
        die("Connection Failed".mysqli_connect_error());
    }
    else{
        echo "Connection Successful";
    }

    $email = $_POST['usermail'];
    $password = $_POST['passwd'];
    $contact = $_POST['pno'];

    // echo $email."<br>".$password. "<br>".$contact;

    $_SESSION['originalEmail'] = $email;
    $_SESSION['originalPassword'] = $password;
    $_SESSION['originalContact'] = $contact;

    $sql = "INSERT INTO logintb (`email`, `password`, `phone`) VALUES ('$email', '$password', '$contact')";

    $query = mysqli_query($conn,$sql);

    header("Location:/loginsystem/profile.html");



    $conn->close();
    ?>.