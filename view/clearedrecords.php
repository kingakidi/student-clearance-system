<table class="table table-bordered ">
    <tr>
        <th>S/N</th>
        <th>REG NO</th>
        <th>SECTION</th>
        <th>STATUS</th>
        <th> DATE </th>
    </tr>
    <?php 
        $clearedQuery = $conn->query("SELECT * FROM `tbl_clearance_cleared` WHERE status = 'cleared'"); 

        if (!$clearedQuery) {
            die(error(" UNABLE TO VERIFY LIST OF CLEARED STUDENT ").$conn->error); 

        }else{
            if (mysqli_num_rows($clearedQuery) > 0) {
                $sn = 1;
                while ($row = mysqli_fetch_assoc($clearedQuery)) {
                   extract($row);
                   $regno = strtoupper($regno);
                   $status = ucwords($status);
                   $clear_by = ucwords($clear_by);

                   echo "
                    <tr>
                        <td>$sn</td>
                        <td>$regno </td>
                        <td>$clear_by</td>
                        <td>$status</td>
                        <td> $date </td>
                    </tr>
                   ";
                   $sn++;
                }
            }else{
                echo "
                    <tr>
                        <td colspan=5'>NO CLEARED STUDENT ON THE SYSTEM</td>
                    </tr>
                
                ";
            }
        }
    ?>
</table>
