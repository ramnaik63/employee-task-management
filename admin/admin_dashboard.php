<?php
session_start();
include('../includes/connection.php');
if (isset($_POST['create_task'])) {
    $query = "insert into tasks values(null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo "<script type='text/javascript'>
        alert('Task Created Succesfully');
        window.location.href = 'admin_dashboard.php';
        </script>
        ";
    } else {
        echo "<script type='text/javascript'>
        alert('Error Occured');
        window.location.href = 'admin_dashboard.php';
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
    <title>Admin Dashboard</title>
    <!-- Jquery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!-- Bootsrap files -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- CSS FILE -->
    <link rel="stylesheet" href="../css/styles.css">
    <script type="text/javascript">
        $(document).ready(function () {
            $("#create_task").click(function () {
                $("#right_sidebar").load("create_task.php");
            });
        });
        $(document).ready(function () {
            $("#manage_task").click(function () {
                $("#right_sidebar").load("manage_task.php");
            });
        });
        $(document).ready(function () {
            $("#view_leave").click(function () {
                $("#right_sidebar").load("view_leave.php");
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
                        <a href="admin_dashboard.php" type="button" id="logout_link">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a type="button" class="link" id="create_task">Create Tasks</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a type="button" class="link" id="manage_task">Manage Tasks</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a type="button" class="link" id="view_leave">Leave Applications</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a href="../logout.php" type="button" id="logout_link">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10" id="right_sidebar">
            <h4>Instructions for Admins.</h4>
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