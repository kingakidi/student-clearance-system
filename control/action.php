<?php
    include "./function.php";
    // REGISTRATION 
    if (isset($_POST['register'])) {
            extract($_POST);
            
            //    CLEAN THE DATA, 
            $username = clean($username);
            $password = password_hash(cleanPassword($password), PASSWORD_DEFAULT);
            $usertype = clean($usertype);
           if (!empty($username) AND !empty($password) AND (!empty($usertype))) {
               //    CHECK FOR DATA AVAILABIITY IN DB 
                    $cUQuery = $conn->query("SELECT * FROM register WHERE username = '$username'");

                    if (!$cUQuery) {
                        die(error("FAILED TO VERIFY USERNAME ".$conn->error));
                    }else{
                        if (mysqli_num_rows($cUQuery) > 0 ) {
                            echo error("USERNAME ALREADY EXIST");
                        }else{
                                //    IF NO INSERT IT INTO THE DB 
                                $rQuery = $conn->query("INSERT INTO `register`( `username`, `password`, `category`) 
                                VALUES ('$username', '$password', '$usertype')");

                                if (!$rQuery) {
                                    die("UNABLE TO REGISTER USER AT THE MOMENT ".$conn->error);
                                }else{
                                    echo success("Registered Successfully ");
                                }
                        }
                    }
           }else{
               echo error("ALL FIELDS REQUIRED ");
           }

    }
    // LOGIN 
   if (isset($_POST['login'])) {
        //   CLEAN THE INPUTS 
        extract($_POST);
        $u = clean($username); 
        $p = cleanPassword($password);
        // CHECK IF USER EXIST 
        if (!empty($u) AND !empty($p)) {
            $cUQuery = $conn->query("SELECT * FROM register WHERE username = '$username' LIMIT 1");
        if (!$cUQuery) {
            die(" UNABLE TO VERIFY USER DETAILS ".$conn->error);
        }else{
            if (mysqli_num_rows($cUQuery) < 1) {
            echo error("USERNAME DOES'NT EXIT");
            }else{
                // COMPARE THE PASSWORD
                $row = mysqli_fetch_assoc($cUQuery);
                $db_password = $row['password'];
                $db_username = $row['username'];
                $db_usertype = $row['category'];

                

                if (password_verify($p, $db_password)) {
                    $_SESSION["username"]= $db_username;
                    $_SESSION["usertype"]= $db_usertype;
                    echo success("Successfully Login");
                }else{
                    echo error("Invalid Password");
                }

            }
        }
    }else{
        echo error("ALL FIELDS REQUIRED ");
    }
    
    
    // CREATE SESSION IF YES 
    // LOGIN 
   }

   // LOAD PAGE 
   if (isset($_POST["loadPage"])) {
       $page = $_POST['loadPage'];
        echo "<?php include $page.php ?>";

   }

   // CLEARANCE FORM 
   if (isset($_POST['regClearanceForm'])) {
      extract($_POST);
    //   echo "$surname $firstname $othernames $gender $regno";
        // CLEAN AND CHECK FOR EMTPY 
        $regno = clean($regno);
        $surname = clean($surname); 
        $firstname = clean($firstname);
        $othernames = clean($othernames);
        $gender = clean($gender);
        $username = $_SESSION['username'];
        if (!empty($regno) AND !empty($surname) AND !empty($firstname) AND !empty($gender) ) {
            // CHECK IF REG NO EXIST IN tbl_clearance
            $cRegQuery = $conn->query("SELECT * FROM tbl_clearance WHERE regno = '$regno' OR username= '$username'"); 
            if (!$cRegQuery) {
                die("UNABLE TO VERIFY REGISTRAION NUMBER ".$conn->error);
            }else{
                if (mysqli_num_rows($cRegQuery) > 0) {
                    echo error("Registraion Number Or User has already registered!");
                }else{
                    // SEND THE DATA TO DATABASE 
                    $iClearanceQuery = $conn->query("INSERT INTO `tbl_clearance`(`regno`, username, `surname`, `firstname`, `othernames`, `gender`) VALUES ('$regno', '$username', '$surname', '$firstname', '$othernames', '$gender')");
                    if (!$iClearanceQuery) {
                        die(error("Registrtion Failed Contact Admin for Support").$conn->error);
                    }else{
                        echo success("Clearance Request Submitted Successfully");
                    }
                }
            }
        }else{
            echo error("ALL (*) FIELD(S) REQUIRED");
        }
   }

    //    EVENT FORM 
   if (isset($_POST["regEvent"])) {
       extract($_POST);
        $usertype = $_SESSION['usertype'];
        $username = $_SESSION['username'];
        $regno = clean($regno);
        $fullname = clean($fullname);
        $title = clean($title);
        $message = clean($message);
        $action = clean($action);
       if (!empty($regno) AND !empty($fullname) && !empty($title) AND !empty($message) AND !empty($action)) {
           // CHECK IF THE SAME EVENT HAS ALREADY EXIST FOR THE SAID REGNO FROM THE SAME BY CATEGORY 
        $checkEventQuery = $conn->query("SELECT * FROM tbl_event WHERE regno = '$regno' AND submit_by ='$usertype' AND title='$title'");
        if (!$checkEventQuery) {
            die(error(" UNABLE TO CHECK EVENT AVAILABILITY "));
        }else if (mysqli_num_rows($checkEventQuery) > 0) {
            echo error("EVENT ALREADY EXIST FOR THE SAME STUDENT");
        }else{
            // ADD EVENT TO THE DB 
            $addEventQuery = $conn->query("INSERT INTO `tbl_event`( `admin_username`, `regno`, `fullname`, `title`, `message`, `submit_by`, `action`) VALUES ('$username', '$regno', '$fullname', '$title', '$message', '$usertype', '$action')");
            if (!$addEventQuery) {
                die(error("UNABLE TO ADD EVENT AT THE MOMENT ").$conn->error);
            }else{
                echo success("EVENT ADDED SUCCESSFULLY");
            }
        }
       }else{
           echo error("ALL FIELDS REQUIRED");
       }
        
   }

   if (isset($_POST['clearanceRequest'])) {
        extract($_POST);
        $regno = clean($regno);
        
        $regQuery = $conn->query("SELECT * FROM `tbl_clearance` WHERE regno='$regno'");
        if (!$regQuery) {
            die(error("UNABLE TO VERIFY STUDENT DETAILS "));
        }else{
            $row = mysqli_fetch_assoc($regQuery);
            extract($row);
           
            $fullname = "$surname $firstname $othernames";
            $fullname = ucwords(clean($fullname));
            $usertype = $_SESSION['usertype'];
            
            // SEND FOR STUDENT EVENT WITH LOGIN ADMIN SECTION 
            $eventQuery = $conn->query("SELECT * FROM tbl_event WHERE regno = '$regno' AND submit_by = '$usertype'"); 
            
            $regno = strtoupper($regno);
            
            echo "<div class='container text-right'><button class='btn btn-warning' id='close-popup'>Close</button></div>
            <form id='clearance-form'>
            
            <div class='form-group'>
                <label for='regno'>Registration Number</label>
                <input type='text' class='form-control' id='regno' value='$regno' disabled>
            </div>
            <div class='form-group'>
                <label for='fullname'>Fullname</label>";
                ?>
                <input type='text' class='form-control' value='<?php echo $fullname; ?>' disabled>
                <?php 
                echo "
            </div>
            <div class='form-group'>
                <label for='gender'>Gender</label>
                <input type='text' class='form-control' value='$gender' disabled>
            </div>
            <div class='form-group'>
                <label for='status'>Status</label>
                <input type='text' class='form-control' value='$status' disabled>
            </div>
            <div class='form-group'>
                <label for='date'>Date</label>
                <input type='text' class='form-control' value='$date' disabled>
            </div>";

            if (!$eventQuery) {
                die(error("UNABLE TO VERIFY STUDENT EVENTS "));
            }else{
                echo '<div class="p-3" style="background-color: #e3e3e3;">';
                if (mysqli_num_rows($eventQuery) > 0 ) {
                   
                    
                    
                    while ($row = mysqli_fetch_assoc($eventQuery)) {
                        
                        $title = ucwords($row['title']);
                        $message = $row['message'];

                       echo "<p class='text-info'>$title </p>";
                       echo "<p> $message </p> <hr>";

                    }
                    
                }else{
                    echo "NO EVENT LOG FOR $regno";

                }
                echo "</div>";
            }
            echo '
                <div class="form-group">
                    <label for="status"> Select Clearance Option </label>
                    <select name="status" id="status" class="status form-control"">
                        <option value="" selected disabled >Select Clearance Option</option>
                        <option value="pending">Pending</option>
                        <option value="cleared">Cleared</option>
                        <option value="uncleared">Uncleared</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comment">Enter Clearance Comment</label>
                    <textarea name="comment" id="comment" cols="30" rows="5" class="form-control" placeholder="Enter Status Comment"></textarea>
                </div>
                <div class="container show-status text-center" id="show-status"></div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-info" id="btn-clearance-sbt"> Submit </button>
                </div>
                    ';
           
        echo "</form>";
        }
   }
   
        //    CLEARING REQUEST 
    if (isset($_POST['clearing'])) {
        extract($_POST);
        $status = clean($status);
        $regno = clean($regno);
        $commnet = clean($comment);
        $by = $_SESSION['usertype'];
       
        if (!empty($regno) AND !empty($commnet) AND !empty($status) AND !empty($by)) {
            // CHECK FOR EXISTENCE OF THIS STUDENT 
            $cCQuery = $conn->query("SELECT * FROM `tbl_clearance_cleared` WHERE regno = '$regno' AND clear_by = '$by'");
            if (!$cCQuery) {
                die("UNABLE TO VERIFY CLEARNCE STATUS ".$conn->error);
            }else{
                // CHECK IF CLEARANCE ALREADY EXIST 
                if (mysqli_num_rows($cCQuery) > 0) {
                    
                    // CHECK IF IT THE SAME STATUS 
                    $row = mysqli_fetch_assoc($cCQuery);
                    $db_status = $row['status'];
                    if ($db_status === $status) {
                        echo error("STUDENT HAS SAME PENDING CLEARANCE STATUS");
                    }else{
                        // UPDATE THE USER 
                        $cUQuery = $conn->query("UPDATE `tbl_clearance_cleared` SET `status`= '$status', comment='$comment', `date`= now()  WHERE regno = '$regno' AND clear_by = '$by'");
                        if (!$cUQuery) {
                            die(error("UNABLE TO UPDATE CLEARANCE STATUS ".$conn->error));
                        }else{
                            $regno = strtoupper($regno);
                            echo success("$regno Updated Successfully");
                        }
                    }
                }else{
                    $iSCQuery = $conn->query("INSERT INTO `tbl_clearance_cleared`( `regno`, `clear_by`, comment, `status`) VALUES ('$regno', '$by', '$comment', '$status')");
                    if (!$iSCQuery) {
                        die(error("CLEARANCE SUBMITION FAILED "));
                    }else{
                        echo success("Clearance Submitted Successfully");
                    }
                }
            }
        }else{
            echo error("ALL FIELDS REQUIRED");
        }
        // CHECK FOR EMPTY, AND CHECK IF ALREADY CLEARED BY THE SECTION 
    }
?>



