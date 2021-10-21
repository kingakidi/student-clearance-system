<div class="container">
<?php 
         function error($var){
            return "<span class='text-danger'>  $var </span>";
        }
    
        function success($var){
            return "<span class='text-success'>  $var </span>";
        }
        function getRegNo($username)        {
            global $conn;
           $regQuery = $conn->query("SELECT * FROM tbl_clearance WHERE username='$username'");
           if (!$regQuery) {
               die("UNABLE TO GET VERIFY REGISTRATION NUMBER");
           }else{
               $row = mysqli_fetch_assoc($regQuery);
               return $row['regno'];
           }
        }
        // CHECK IF USER ALREADY SUBMITS CLEARANCE FORM 
        $lg_username = $_SESSION['username'];
        if (isset($_GET['delete']) && isset($_GET['username'])) {
            $d = $_GET['delete'];
            $u = $_GET['username'];
            $regno = getRegNo($u);
           
            // CHECK IF CLEARANCE HAS STARTED FOR THE STUDENT 
            $cCheckQuery = $conn->query("SELECT * FROM `tbl_clearance_cleared` WHERE regno = '$regno'");

            if (!$cCheckQuery) {
                die("UNABLE TO CLEARANCE STATUS REGISTRATION NUMBER");
            }else{
                if (mysqli_num_rows($cCheckQuery) > 0) {
                    echo error("YOUR CLEARANCE IS IN PROGRESS, CONTANCT ADMIN FOR SUPPORT ON ANY ISSUES");
                }else{
                    // // SEND DELETE QUERY TO DELETE SUBMITTED CLEARANCE 
                    $dCQuery = $conn->query("DELETE FROM tbl_clearance WHERE id=$d AND username = '$u'");
                    if (!$dCQuery) {
                        die(error("UNABLE TO DELETE CLEARANCE REQUEST"));
                    }else{
                        echo "REQUEST DELETED SUCCESSFULLY";
                        header("Location: dashboard.php");
                    }

                }
            }
            
        }

        $cCSQuery = $conn->query("SELECT * FROM `tbl_clearance` WHERE username = '$lg_username'");
        if (!$cCSQuery) {
            die(error(" UNABLE TO VERIFY CLEARANCE SUBMISSION STATUS "));
        }else{
            if (mysqli_num_rows($cCSQuery) > 0) {
                // BRING TABLE
                $row = mysqli_fetch_assoc($cCSQuery);
                extract($row);
                $username = strtoupper($username);
                $regno = strtoupper($regno);
                $surname = ucwords($surname);
                $firstname = ucwords($firstname);
                $othernames = ucwords($othernames);
                $gender = ucwords($gender);
                $status = ucwords($status);
                $date = ucwords($date);
                echo "<table class='table table-bordered'>
                <tr>
                    <th>USERNAME</th>
                    <td>$username</td>
                </tr>
                <tr>
                    <th>REGISTRATION NUMBER</th>
                    <td>$regno</td>
                </tr>
                <tr>
                    <th>SURNAME</th>
                    <td>$surname</td>
                </tr>
                <tr>
                    <th>FIRSTNAME</th>
                    <td>$firstname</td>
                </tr>
                <tr>
                    <th>OTHER NAME</th>
                    <td>$othernames</td>
                </tr>
                <tr>
                    <th>GENDER</th>
                    <td>$gender</td>
                </tr>
                <tr>
                    <th>STATUS</th>
                    <td>$status</td>
                </tr>
                <tr>
                    <th>DATE</th>
                    <td>$date</td>
                </tr>
            </table>
            <div class='form-group text-right'>
                <a href='?p=clearanceform&delete=$id&username=$lg_username' class='btn btn-danger'>DELETE CLEARANCE</a>
            </div>
            ";
                
            }else{
                // BRING FORM 
                echo '<form action="" class="clearance-form" id="clearance-form">
                    <div class="form-group">
                        <label for="regno">Enter Registration Number <sup><span class="text-danger">*</span></sup></label>
                        <input type="text" class="form-control" id="regno" placeholder="Enter Registration Number" >
                    </div>
                    <div class="form-group">
                        <label for="surname">Enter Surname <sup><span class="text-danger">*</span></sup></label>
                        <input type="text" class="form-control" id="surname" placeholder="Enter Surname" >
                    </div>
                    <div class="form-group">
                        <label for="firstname">Enter Firstname <sup><span class="text-danger">*</span></sup></label>
                        <input type="text" class="form-control" id="firstname" placeholder="Enter Firstname" >
                    </div>
                    <div class="form-group">
                        <label for="othername">Enter Othernames</label>
                        <input type="text" class="form-control" id="othernames" placeholder="Enter Othernames" >
                    </div>
                    <div class="form-group">
                        <label for="gender">Select Gender <sup><span class="text-danger">*</span></sup></label>
                        <select id="gender" class="form-control" >
                            <option value="" selected disabled> Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group text-center" id="show-status">
                
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-info" id="btn-clearance-form">Submit</button>
                    </div>
                </form>';
            }
        }

    ?>
    
</div>
