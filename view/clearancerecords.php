<style>
.popup-page {
    position: fixed;
    z-index: 20;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.25);
    display: none;
}

.popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 80%;
    padding: 15px;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    height: 80%;
    overflow-y: auto;
    border-radius: 5px;
}
</style>
<table class="table table-bordered table-responsive">
    <tr>
        <th>S/N</th>
        <th>Registration Number</th>
        <th>Surname</th>
        <th>Firstname</th>
        <th>Othername</th>
        <th>Gender</th>
        <th>Comment</th>
        <th>Action</th>
       
    </tr>
    <?php 
        // GET ALL CLEARANCE
        $aCQuery = $conn->query("SELECT * FROM `tbl_clearance`");
        if (!$aCQuery) {
            die("UNABLE TO GET CLEARANCE ".$conn->error); 
        }else{
            $sn = 0;
            while ($row = mysqli_fetch_assoc($aCQuery)) {
                $sn++;
                $usertype = $_SESSION['usertype'];
                $check_regno = $row['regno'];
                $id = $row['id'];
                $regno = strtoupper($row['regno']);
                $surname = ucwords($row['surname']);
                $firstname = ucwords($row['firstname']);
                $othername = ucwords($row['othernames']);
                $gender = ucwords($row['gender']);
               
                $status = ucwords($row['status']);
                $time = $row['date'];

                // CHECK IF USERNAME IS NOT IN CLEARED TABLE 
                    $uNotInQuery = $conn->query("SELECT * FROM `tbl_clearance_cleared` WHERE regno ='$check_regno' AND clear_by='$usertype'");
                    $uNIRow = mysqli_fetch_assoc($uNotInQuery);
                    if (!$uNotInQuery) {
                        die(error(" UNABLE TO CHECK REGISTRATION NUMBER ".$conn->error));
                    }else if(mysqli_num_rows($uNotInQuery) < 1){
                        echo "<tr>
                                <td>$sn</td>
                                <td>$regno</td>
                                <td>$surname</td>
                                <td>$firstname</td>
                                <td>$othername</td>
                                <td>$gender</td>
                                <td></td>
                                <td><a href='' class='btn btn-success action' id='$regno'>Action</a></td> 
                            <tr>";
                  
                      
                    }else if(mysqli_num_rows($uNotInQuery) > 0){
                        // CHECK IF IT'S CLEARED 
                        $comment = $uNIRow['comment'];
                        if ($uNIRow['status'] != 'cleared') {
                            
                            // PRINT THE DATA OUT 
                            echo "<tr>
                                <td>$sn</td>
                                <td>$regno</td>
                                <td>$surname</td>
                                <td>$firstname</td>
                                <td>$othername</td>
                                <td>$gender</td>
                                <td>$comment</td>
                                <td><a href='' class='btn btn-success action' id='$regno'>Action</a></td> 
                            <tr>";
                          
                        }
                    }
                // CHECK IF IS NOT CLEARED IN THE TABLE 
               
            }
        }


    ?>
</table>
<div class="popup-page" id="popup-page">
            
    <p class="popup-content" id="popup-content">
        
            
    </p>
  
  </div>

