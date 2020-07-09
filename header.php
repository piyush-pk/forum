<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">PIYUSHPK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/" >Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" href="thread.php">Thread</a> -->
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-secondary" href="/thread.php?catid=1">Python</a>
                    <a class="dropdown-item text-secondary" href="/thread.php?catid=2">Java</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item text-secondary" href="/thread.php?catid=3">JavaScript</a>
                    <a class="dropdown-item text-secondary" href="/thread.php?catid=4">PHP</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php" tabindex="1" aria-disabled="false">Contact Us</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="search.php">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '<div class="dropdown mx-2 ">
            <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              '. $_SESSION['username'] .'
            </button>
            <div class="dropdown-menu my-1" aria-labelledby="dropdownMenuButton">
                <a role="button" class="btn btn-outline-danger dropdown-item" href="profile.php">My Account</a>
              <a role="button" class="btn btn-outline-danger dropdown-item" href="_logout.php">Logout</a>
            </div>
          </div>
          </div>
        </nav>';
        }else{
        echo '      <button type="button" class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#loginModal">Login</button>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#signupModal">Sign Up</button>
                </div>
            </nav>';
}
