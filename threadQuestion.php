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

    <!-- Form Submission PHP Code -->
    <?php
    $tid = $_GET['thread_id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // $thread_results = false;
        $description = $_POST['description'];
        $tq = "INSERT INTO `comments` (`thread_id`, `user_id`, `comment_description`, `comment_time`) VALUES ($tid, ".$_SESSION['userid'].", '$description', current_timestamp());";

        // echo $tq;

        $tresult = mysqli_query($con, $tq);
        if ($tresult) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hey User !</strong> Has Been Submitted Successfully Wait For Some Time You Will Get Solution .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Hey User !</strong>Your Comment Has Not Submitted Successfully Becaouse Of Some Error Please Check Your Description is Correct ! .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>';
        }
    }
    ?>

    <!-- Content -->
    <div class="container d-flex justify-content-center p-2 mt-3">
        <h1>Threads</h1>
    </div>

    <!-- Thread Fetching PHP Code -->
    <div class="container">
        <?php
        if (isset($_GET['thread_id'])) {
            $id = $_GET['thread_id'];
            $q = "SELECT * FROM `threads` where thread_id=$id;";
            $result = mysqli_query($con, $q);
            while ($row = mysqli_fetch_assoc($result)) {

                echo '<div class="container">
                            <div class="jumbotron bg-dark text-white">
                                <h1 class="display-4">' . $row["thread_title"] . '</h1>
                                <p class="lead">' . $row["thread_description"] . '</p>
                                <hr class="my-0 bg-light">
                            </div>
                        </div>';
            }
        } else {
            echo '<div class="card">
                <div class="card-header">
                  Threads
                </div>
                <div class="card-body">
                  <h5 class="card-title">No Threads Are Selected</h5>
                  <p class="card-text">Please Select A Thread Go To Home Page, Than Select Threads From Category.</p>
                  <a href="/" class="btn btn-primary">Go To Home Page</a>
                </div>
              </div>';
        }

        ?>
    </div>

    <!-- Comments Fetching PHP Code -->
    <div class="container bg-dark text-light p-3" style="border-radius: 5px;">
        <?php
        if (isset($_GET['thread_id'])) {
            // echo "Thread_id Got";
            $dq = "SELECT * FROM `comments` where thread_id = $id";
            $dresult = mysqli_query($con, $dq);
            while ($drow = mysqli_fetch_assoc($dresult)) {
                $utq = 'SELECT * FROM `users` WHERE user_id=' . $drow["user_id"];
                $utresult = mysqli_query($con, $utq);
                $utrow = mysqli_fetch_assoc($utresult);
                echo '<div class="media m-4 p-2" style="border-radius: 5px; border: solid white;">
                <img src="img/user.jpg" width="64" class="mr-3" alt="Avatar">
                <div class="media-body">
                <P>' . $drow["comment_description"] . '</p>
                <h5 class="mt-0" style="border-top: solid white;" >By ' . $utrow["user_name"] . ' At ' . $drow["comment_time"] . '</h5>
                </div>
              </div>';
            }
        }
        // ' . $drow["comment_description"] . '
        ?>
    </div>

    <!-- Form -->
    <div class="container mt-3" style="border-radius: 5px;">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<div class="container bg-dark text-light p-5 mt-4" style="border-radius: 5px;">
            <h1 style="border-bottom: solid white;">Post A Comment</h1>
            <form action="' . $_SERVER["REQUEST_URI"] . '" method="POST">
                <div class="form-group">
                    <label for="Comment_Description">Comment Description</label>
                    <textarea class="form-control" id="comment_description" name="description" placeholder="Explain Your Query . . ." rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
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