<?php

session_start();
include('includes/connection.php');
if (isset($_POST['userLogin'])) {
    $query = "select email, password,name,uid from users where email = '$_POST[email]' AND password = '$_POST[password]'";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_num_rows($query_run)) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['uid'] = $row['uid'];
        }

        echo "<script type='text/javascript'>
        window.location.href = 'user_dashboard.php';
        </script>
        ";
    } else {
        echo "<script type='text/javascript'>
        alert('Error...Please enter correct details');
        window.location.href = 'user_login.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETMS | USER LOGIN</title>
    <!-- Jquery file -->
    <script src="includes/jquery_latest.js"></script>
    <!-- Bootsrap files -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- CSS FILE -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="login_home_page">
            <center>
                <h3>User Login</h3>
            </center>
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <center>
                    <div class="form-group"><input type="submit" name="userLogin" value="Login" class="btn btn-warning">
                    </div>
                </center>
            </form>
            <center> <a href="index.php" class="btn btn-danger">Go to Home</a></center>
        </div>
    </div>
</body>

</html>