<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Students Clearance Form | Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./css/admindashboard.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styleform.css" />
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" /> -->

    <style>
    body {
        background-image: url("./images/iStock_871203832_800x400.jpg");
    }
    </style>
</head>

<body>
    <!--login form-->
    <?php 
      include "./control/db.php";
        if (isset($_SESSION["usertype"])) {
        //   $page = $_SESSION["usertype"].".php";
          header("Location: ./dashboard.php");
        }
          

    ?>


    <div class="row justify-content-center">
        <div class="col-lg-4 bg-light rounded mt-5" id="login-box">
            <h3 class="text-center mt-2 text-info py-1">Login</h3>
            <form method="POST" class="p-2" id="login-form">
                <div class="form-group">
                    <input type="text" placeholder="username" name="usernametxt" id="username" required
                        class="form-control" />
                </div>

                <div class="form-group">
                    <input type="password" placeholder="password" name="passwordtxt" id="password" required
                        class="form-control" />
                </div>
                <div class="container show-error text-center m-2" id="show-error"></div>
                <button type="submit" name="login" class="btn btn-primary btn-block mb-5" id="login">
                    Login</button><br />
                <p class="text-center">
                    New User?<a href="register.php" class="text-link" id="register-btn">
                        Register</a>
                </p>
            </form>
        </div>
    </div>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/function.js"></script>
    <script src="./js/login.js"></script>
  
    </script>
</body>

</html>