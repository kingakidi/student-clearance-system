<div class="list-group list-group-flush" id="navbarNavDropdown">
    <a href="#" class="list-group-item active">
        <i class="fas fa-tachometer-alt"></i>Dashboard
    </a>
    <?php
        if ($_SESSION['usertype'] === 'student') {
            echo '<a href="?p=clearanceform" class="list-group-item list-group-item-action sidebar-action" id="clearanceform">
            <i class="fab fa-wpforms"></i>
                Clearance Form
        </a>
        <a href="?p=clearancestatus" class="list-group-item list-group-item-action sidebar-action" id="clearancestatus">
            <i class="far fa-clipboard"></i>
            Clearance Status
        </a>';
        }else{
            echo '<a href="?p=clearancerecords" class="list-group-item list-group-item-action sidebar-action" id="clearancerecords">
            <i class="far fa-clipboard"></i>
            Clearance Records
        </a>
        <a href="?p=eventform" class="list-group-item list-group-item-action sidebar-action" id="eventform">
            <i class="far fa-clipboard"></i>
            Generate Event Form 
        </a>
        <a href="?p=clearedrecords" class="list-group-item list-group-item-action sidebar-action" id="clearedrecords">
            <i class="far fa-clipboard"></i>
            Cleared Records
        </a>';
        }

    ?>
    
    
    <a href="logout.php" class="list-group-item list-group-item-action">
        <i class="fas fa-sign-out-alt"></i>
            LogOut 
    </a>
</div>