<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- External Css -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>PIYUSHPK-Forum</title>
</head>

<body>
    <!-- Header -->
    <?php include("header.php"); ?>

    <!-- Modal -->
    <?php include('login.php') ?>
    <?php include('signup.php') ?>

    <!-- Database Connection -->
    <?php require("connection.php"); ?>

    <!-- Content -->
    <div class="container d-flex justify-content-center p-2 mt-3">
        <h1><?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "Welcome " . $_SESSION['username'];
            } else {
                echo 'Hey User';
            }
            ?>
        </h1>
    </div>

    <!-- Fetching User Threads -->
    <div class="container bg-dark text-light p-3" style="border-radius: 5px;">
        <h1 style="border-bottom: solid white;">Your Threads</h1>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $q = "SELECT * FROM `threads` WHERE user_id = " . $_SESSION['userid'];
            $result = mysqli_query($con, $q);
            $empty = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $empty = false;
                echo '        
                <div class="media mt-4 p-2" style="border-radius: 5px; border: solid white;">
                    <img src="img/user.jpg" width="64" class="mr-3" alt="Avatar">
                    <div class="media-body">
                        <h5 class="mt-0"><a href="threadQuestion.php?thread_id=' . $row['thread_id'] . '" >' . $row['thread_title'] . ' </a></h5>
                        <p>' . $row['thread_description'] . '</p>
                        <p style="border-top: solid white;"> Date: ' . $row['thread_created'] . '</p>
                    </div>
                </div>';
            }
            if ($empty) {
                echo '<div class="jumbotron jumbotron-fluid bg-dark text-light my-0" style="border-radius: 5px;">
                <div class="container">
                  <h1 class="display-4">No Threads Were Posted By You</h1>
                  <p class="lead">! Please Post Some Thing To See Here .</p>
                </div>
              </div>';
            }
        } else {
            echo '<h5>! Please Login To View Your Threads Or Profile .</h5>';
        }
        ?>
    </div>

    <!-- Fetch User Comments -->
    <div class="container bg-dark text-light p-3 mt-3" style="border-radius: 5px;">
        <h1 style="border-bottom: solid white;">Your Comments</h1>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $q = "SELECT * FROM `comments` WHERE user_id = " . $_SESSION['userid'];
            $result = mysqli_query($con, $q);
            $comments = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $comments = true;
                echo '        
                <div class="media mt-4 p-2" style="border-radius: 5px; border: solid white;">
                    <img src="img/user.jpg" width="64" class="mr-3" alt="Avatar">
                    <div class="media-body">
                        <p>' . $row['comment_description'] . '</p>
                        <p style="border-top: solid white;"> Date: ' . $row['comment_time'] . '</p>
                    </div>
                </div>';
            }
            if (!$comments) {
                echo '<div class="jumbotron jumbotron-fluid bg-dark text-light" style="border-radius: 5px;">
                <div class="container">
                  <h1 class="display-4">No Comments Were Posted By You</h1>
                  <p class="lead">! Please Comment Some Thing To See Here .</p>
                </div>
              </div>';
            }
        }else{
            echo '<h5>! Please Login To View Your Comments .</h5>';
        }
        ?>
    </div>

    <!-- Account Action -->
    <!-- <div class="container bg-dark text-light p-3 mt-3" style="border-radius: 5px;">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#change_pass">Change Password</button>
        <button type="button" class="btn btn-danger">Delete Account</button>
    </div> -->



    <!-- Footer -->
    <?php include("footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>