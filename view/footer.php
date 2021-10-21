    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap-material-design.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/morris.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/function.js"></script>
    <script src="./myjs/dashboard.js"></script>
    
    <?php
                        if (isset($_GET['p'])) {
                            $p = $_GET['p'];
                           echo "<script src='./myjs/$p.js'></script>";
                        }
                        
                    ?>
</body>

</html>