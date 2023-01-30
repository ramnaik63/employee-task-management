<?php
session_start();
if (isset($_SESSION['email'])) {
    include('includes/connection.php');
    if (isset($_POST['submit_leave'])) {
        $query = "insert into leaves values(null,$_SESSION[uid],'$_POST[subject]','$_POST[message]' , 'No Action' )";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            echo "<script type='text/javascript'>
        alert('Leave applied Succesfully');
        window.location.href = 'user_dashboard.php';
        </script>
        ";
        } else {
            echo "<script type='text/javascript'>
        alert('Error...');
        window.location.href = 'user_dashboard.php';
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
        <title>User Dashboard</title>
        <!-- Jquery file -->
        <script src="includes/jquery_latest.js"></script>
        <!-- Bootsrap files -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- CSS FILE -->
        <link rel="stylesheet" href="css/styles.css">
        <script type="text/javascript">
            $(document).ready(function () {
                $("#manage_task").click(function () {
                    $("#right_sidebar").load("task.php");
                });
            });
            $(document).ready(function () {
                $("#apply_leave").click(function () {
                    $("#right_sidebar").load("leaveForm.php");
                });
            });
            $(document).ready(function () {
                $("#leave_status").click(function () {
                    $("#right_sidebar").load("leave_status.php");
                });
            });
        </script>
    </head>

    <body>
        <div class="row" id="header">
            <div class="col-md-12">
                <div class="col-md-4" style="display:inline-block;">
                    <h3>Task Management System</h3>
                </div>
                <div class="col-md-6" style="display:inline-block;text-align:right">
                    <b>Email: </b>
                    <?php echo $_SESSION['email']; ?>
                    <span style="margin-left: 25px;"> <b>Name:</b><?php echo $_SESSION['name']; ?> </span>
                </div>
            </div>
        </div>
        <!-- header ends here -->
        <div class="row">
            <div class="col-md-2" id="left_sidebar">
                <table class="table">
                    <tr>
                        <td style="text-align:center;">
                            <a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a id="manage_task" type="button" class="link">Update Tasks</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a type="button" class="link" id='apply_leave'>Leave Application</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a id="leave_status" type="button" class="link">Leave Status </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="logout.php" type="button" id="logout_link">Logout</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-10" id="right_sidebar">
                <h4>Instructions for Employees.</h4>
                <ul style="line-height:3em;font-size:1.2em;">
                    <li>All the employees should mark their attendance daily</li>
                    <li>Everyone must complete the tasks assigned to them</li>
                    <li>Kindly maintain decorum of the office.</li>
                    <li>Keep office and your area neat and clean.</li>
                </ul>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    header('Location:user_login.php');
}