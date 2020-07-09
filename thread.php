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

<body class="justify-content-center">
    <!-- Header -->
    <?php include("header.php"); ?>

    <!-- Database Connection -->
    <?php require("connection.php"); ?>

    <!-- Modal -->
    <?php include('login.php') ?>
    <?php include('signup.php') ?>



    <!-- Content -->
    <div class="container d-flex justify-content-center p-2 mt-3">
        <h1>Threads</h1>
    </div>

    <!-- Form Submission -->
    <?php
    $sid = $_GET['catid'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // $thread_results = false;
        $title = $_POST['title'];
        $description = $_POST['description'];
        $sq = "INSERT INTO `threads` (`category_id`, `user_id`, `thread_title`, `thread_description`, `thread_created`) VALUES ('$sid', ".$_SESSION['userid'].", '$title', '$description', current_timestamp());";

        $sresult = mysqli_query($con, $sq);
        if ($sresult) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> ' . $title . ' !</strong> Has Been Submitted Successfully Wait For Some Time You Will Get Solution .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> ' . $title . ' !</strong> Has Not Submitted Successfully Becaouse Of Some Error Please Check Your Title & Description is Correct ! .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>';
        }
    }
    $id = $_GET['catid'];
    $q = "SELECT * FROM `category` where category_id =$id;";
    $result = mysqli_query($con, $q);
    if (isset($_GET['catid'])) {

        $row = mysqli_fetch_assoc($result);
        $uq = 'SELECT * FROM `users` WHERE user_id=' . $row["user_id"];
        $uresult = mysqli_query($con, $uq);
        // if($uresult){
        //     echo "1";
        // }else{
        //     echo "0";
        // }
        $urow = mysqli_fetch_assoc($uresult);
        echo '<div class="container">
                    <div class="jumbotron bg-dark text-white">
                        <h1 class="display-4">' . $row["category_name"] . '</h1>
                        <p class="lead">' . $row["category_description"] . '</p>
                        <hr class="my-0 bg-light">
                        <p class="lead font-weight-bold">By ' . $urow["user_name"] . '</p>
                    </div>
                </div>';
    }
    ?>


    <!-- Fetching Thread PHP Code -->
    <div class="container p-5 bg-dark text-light" style="border-radius: 5px;">
        <h2>Browse Threads</h2>
        <?php

        $thread_results = false;
        $tq = "SELECT * FROM `threads` where category_id = $id";
        $tresult = mysqli_query($con, $tq);
        if (isset($_GET['catid'])) {
            while ($trow = mysqli_fetch_assoc($tresult)) {
                $thread_results = true;
                $utq = 'SELECT * FROM `users` WHERE user_id=' . $trow["user_id"];
                $utresult = mysqli_query($con, $utq);
                $utrow = mysqli_fetch_assoc($utresult);
                echo '        
                <div class="media mt-4 p-2" style="border-radius: 5px; border: solid white;">
                    <img src="img/user.jpg" width="64" class="mr-3" alt="Avatar">
                    <div class="media-body">
                        
                        <h5 class="mt-0"><a href="threadQuestion.php?thread_id=' . $trow['thread_id'] . '" >' . $trow['thread_title'] . ' </a></h5>
                        <p>' . $trow['thread_description'] . '</p>
                        <h5 class="" style="border-top: solid white;"> By ' . $utrow["user_name"] . ' At ' . $trow['thread_created'] . ' </h5>
                    </div>
                </div>';
            }
            if (!$thread_results) {
                echo '<div class="jumbotron jumbotron-fluid bg-dark">
                <div class="container">
                  <h1 class="display-4">No Threads Found .</h1>
                  <p class="lead">Be The First Person To Ask Question .</p>
                </div>
              </div>';
            }
        }

        ?>

    </div>

    <!-- Form -->
    <div class="container mt-3">
        
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<div class="container bg-dark text-light p-5 mt-4" style="border-radius: 5px;">
            <h1 style="border-bottom: solid white;">Start A New Discussion</h1>
            <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
                <div class="form-group">
                    <label for="Thread_Title">Thread Title</label>
                    <input type="text" class="form-control" name="title" id="thread_title" placeholder="Enter Your Thread Title" aria-describedby="thread_title">
                    <small id="threadTitle" class="form-text text-muted">We Will Review Your Query So Please Do Not Use Abusing Words & Be Respective.</small>
                </div>
                <div class="form-group">
                    <label for="Thread_Description">Thread Description</label>
                    <textarea class="form-control" id="thread_description" name="description" placeholder="Explain Your Query . . ." rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Thread</button>
            </form>
        </div>';
        } else {
            echo '<div class="jumbotron jumbotron-fluid bg-dark text-light" style="border-radius: 5px;">
                <div class="container">
                  <h1 class="display-4">Please Login To Comment .</h1>
                  <p class="lead">! For Some Security Reasons You Have To Login For Comment .</p>
                </div>
              </div>';
        }
        ?>

    </div>




    <!-- Footer -->
    <?php include("footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>