<table class="table table-bordered ">
    <tr>
        <th>S/N</th>
        <th>SECTION</th>
        <th>STATUS</th>
        <th>COMMENT</th>
        <th>DATE</th>
    </tr>
    <?php
     function error($var){
        return "<span class='text-danger'>  $var </span>";
    }

    function success($var){
        return "<span class='text-success'>  $var </span>";
    }
        function getRegNo($username){
            global $conn; 
            $regQuery = $conn->query("SELECT regno FROM tbl_clearance WHERE username = '$username'"); 
            if (!$regQuery) {
                die(error("UNABLE TO USER REGISTRAION NUMBER "));
            }else{
                $row = mysqli_fetch_assoc($regQuery);
                return $row['regno'];
            }

            # code...
        }
        // CHECK IF THE USER HAS SUBMIT CLEARANCE FORM 
        $sectionArray = array(
            'director' => "Director",
            'secretary' => "Institute Secretary",
            'examofficer' => "Exam Officer",
            'library' => "Library", 
            'security' => 'security'
        );
        $username = $_SESSION['username'];
        $clearanceCheck = $conn->query("SELECT * FROM tbl_clearance WHERE username = '$username'");
        if (!$clearanceCheck) {
            die(error("UNABLE TO VERIFY CLEARANCE STATUS ").$conn->error);
        }else if (mysqli_num_rows($clearanceCheck) < 1) {
            echo error("YOU HAVE NO PENDING CLEARNACE STATUS ");
        }else{
            
            // FOR EVERY SECTION LOAD IN TABLE DATA 
            $sn = 1;
            foreach ($sectionArray as $key => $value) {
                $db_regno = getRegNo($username);
                $sectionQuery = $conn->query("SELECT * FROM `tbl_clearance_cleared` WHERE clear_by ='$key' AND regno = '$db_regno'");
                if (!$sectionQuery) {
                    die(error("FAILED TO GET CLEAREANCE DETAILS ").$conn->error);
                }else{

                    // IF THE STATUS IS AVAILABLE PRINT IT ELSE PRINT IT WITH ITS STATUS ELSE PRINT IT WITH PENDING 
                    $row = mysqli_fetch_assoc($sectionQuery);
                    $status = $row['status'];
                    if ($status === "cleared") {
                      $msg = "<button class='btn btn-success'> Cleared </button>";
                    }else{
                         $status = ucwords($status);
                         $msg = "<button class='btn btn-warning'> $status </button>";
                    }
                    $date = $row['date'];
                    $by = ucwords($key); 
                    
                    if (mysqli_num_rows($sectionQuery) > 0) {
                       $comment = $row['comment'];
                      
                       echo "<tr>
                                <td>$sn</td>
                                <td>$value</td>
                                <td>$msg</td>
                                <td>$comment</td>
                                <td>$date</td>
                            </tr>";
                    }else{
                        echo "<tr>
                                <td>$sn</td>
                                <td>$value</td>
                                <td> <button class='btn btn-warning'> Pending </button></td>
                                <td> - </td>
                                <td> - </td>
                            </tr>";
                    }
                }
                $sn++;
                
            }
        }
        
                       
    ?>



</table>