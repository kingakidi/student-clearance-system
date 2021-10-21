<!DOCTYPE html>
<html lang="en">
<?php 
        include "./control/db.php";
        if (isset($_SESSION["usertype"])) {
        //   $page = $_SESSION["usertype"].".php";
          header("Location: ./dashboard.php");
        }
          

    ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Adminstration Registration Page</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./css/admindashboard.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleform.css" />
    <link rel="stylesheet" href="./css/font-awesome/css/font-awesome.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <style>
    body {
        background-image: url("./images/senate.jpg");
    }
    </style>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-lg-4 bg-light rounded mt-5" id="registration-box">
            <h3 class="text-center mt-2 text-info py-1">Registration</h3>
            <form method="POST" action="" class="p-2" id="registration-form">
                <div class="form-group">
                    <input type="text" name="username" placeholder="username" id="username" required
                        class="form-control" />
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="password" id="password" required
                        class="form-control" />
                </div>

                <div class="form-group">
                    <select class="form-control" name="usertype" id="usertype">
                        <option value="" disabled selected>Select user</option>
                        <option value="examofficer">Exam Officer</option>
                        <option value="security">Security</option>
                        <option value="library">Library</option>
                        <option value="secretary">Institute Secretary</option>
                        <option value="director">Director</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div class="show-error text-center container p-2" id="show-error"></div>
                <button type="submit" name="register" class="btn btn-primary btn-block" id="register">
                    Register</button><br />
                <p class="text-center">
                    Already Registered?<a href="login.php" class="text-link" id="login-btn">
                        Login here</a>
                </p>
            </form>
        </div>
    </div>

    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/function.js"></script>
    <script src="./js/register.js"></script>
</body>

</html>