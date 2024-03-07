<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once('db.php');
    if(isset($_POST['update']) && ($_POST['originalEmail']!='') && ($_POST['sno']!='') && ($_POST['password']!='') && ($_POST['phone']!=''))
    {
        $sno = $_POST['sno'];
        $originalEmail = $_POST['originalEmail'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $updateQ = "UPDATE `logintb` SET `email`='$originalEmail',`password`='$password',`phone`='$phone' WHERE sno=$sno";
        if(mysqli_query($conn,$updateQ))
        {
           echo 'data Updated'; 
        }
        else{
            echo 'data not Updated';
        }
    }
    $email = $_SESSION['email'];
    // echo $email;

    $sql = "SELECT * FROM logintb WHERE `email` = '$email'";
    $run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)>0)
    {
        $row = mysqli_fetch_assoc($run);
        $uid=$row['sno'];
        $emailID = $row['email'];
        $password = $row['password'];
        $contact = $row['phone'];
    }
?>
<nav class="navbar bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand text-light">
                <h3>
                    <?php echo "Welcome " . $_SESSION['email']; ?>
                </h3>
            </a>

        </div>
    </nav>

    <div class="container">

        <form action="" method="post">
            <input type="hidden" name="sno" value="<?=$uid?>">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="originalEmail" value="<?php echo $emailID; ?>">

                <!-- <div class="card"> -->

            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" name="password" value="<?php echo $password; ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" value="<?php echo $contact; ?>" class="form-control">
            </div>

            <button type="submit" name = "update" class="btn btn-primary">Update</button>
        </form>
    </div>

    

</body>

</html>