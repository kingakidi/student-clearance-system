<?php 
    include "./control/db.php";
    include "./view/header.php";
    include "./view/navbar.php";

?>

    <section>
        <div class="container">

            <ol class="breadcrumb bg-primary">
                <li class="breadcrumb-item active text-white">Dashboard</li>
            </ol>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-3  ">
                <?php include "./view/sidebar.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="show-main" id="show-main">
                    <?php
                        if (isset($_GET['p'])) {
                            $p = $_GET['p'];
                           include "./view/".$p.".php";
                        }else{
                            // if ($_SESSION['usertype'] === 'student') {
                            //     include "./view/clearanceform.php";
                            // }else{
                            //     include "./view/clearancerecords.php";
                            // }
                        }
                    ?>
                </div>
            </div>
         </div>
        
    </div>



 

   <?php
        include "./view/footer.php";    

   ?>