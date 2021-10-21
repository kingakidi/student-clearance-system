
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand text-white d-flex ml-5" href="">Clearance Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav  ml-auto">

            <li class="nav-item "><a href="#" class="nav-link text-white" id="Changes">You are Logged In as :
                <?php 
                        echo  $_SESSION["username"] . " [ ". $_SESSION["usertype"] . " ]";
                 ?>
                    
                </a>
            </li>

        </ul>
    </div>
</nav>