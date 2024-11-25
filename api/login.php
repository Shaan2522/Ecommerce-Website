<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form was submitted
if (isset($_POST['login_admin'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a select statement to check the user's credentials
    $sql = "SELECT User_id FROM tbl_user WHERE username = ? AND password = ? AND designation = 1"; // Assuming designation 1 is for admin

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ss", $username, $password);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Store result
            $stmt->store_result();

            // Check if username exists, if yes then verify password
            if ($stmt->num_rows == 1) {
                // Bind result variables
                $stmt->bind_result($User_id);
                if ($stmt->fetch()) {
                    // Password is correct, so start a new session
                    session_start();
                    
                    // Store data in session variables
                    $_SESSION['loggedin'] = true;
                    $_SESSION['User_id'] = $User_id;
                    $_SESSION['username'] = $username;

                    // Redirect user to admin page
                    header("location: admin_dashboard.php");
                }
            } else {
                // Display an error message if username doesn't exist
                echo "No admin account found with that username.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}
elseif (isset($_POST['login_client'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a select statement to check the user's credentials
    $sql = "SELECT User_id FROM tbl_user WHERE username = ? AND password = ? AND designation = 2"; // Assuming designation 1 is for admin

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ss", $username, $password);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Store result
            $stmt->store_result();

            // Check if username exists, if yes then verify password
            if ($stmt->num_rows == 1) {
                // Bind result variables
                $stmt->bind_result($User_id);
                if ($stmt->fetch()) {
                    // Password is correct, so start a new session
                    session_start();
                    
                    // Store data in session variables
                    $_SESSION['loggedin'] = true;
                    $_SESSION['User_id'] = $User_id;
                    $_SESSION['username'] = $username;

                    // Redirect user to admin page
                    header("location: index.php");
                }
            } else {
                // Display an error message if username doesn't exist
                echo "No client account found with that username.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }

}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Management System </title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="admin/css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    
            <div class="container-fluid" style="margin-top:150px">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" action="login.php" method="post">
                                    <center><a class="navbar-brand ms-4" href="index.html">
                                        <h3>Invoice Management System</h3><br>
                                    </a></center>
                                    <div class="form-group">
                                        <label class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" name="username" class="form-control ps-0 form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password" class="form-control ps-0 form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <button type="submit" name="login_admin" class="btn btn-success btn-lg mx-auto mx-md-0 text-white">Login as Admin</button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" name="login_client" class="btn btn-warning btn-lg mx-auto mx-md-0 text-white">Login as Client</button>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/js/app-style-switcher.js"></script>
    <script src="admin/js/waves.js"></script>
    <script src="admin/js/sidebarmenu.js"></script>
    <script src="admin/js/custom.js"></script>
</body>

</html>