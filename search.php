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
        <h1>
            <?php if (isset($_POST['search'])) {
                echo "Search For '" . $_POST['search'] . "'";
            }else{
                echo "Please Search Something For Get Results .";
            }
            ?>
        </h1>
    </div>

    <div class="container bg-dark text-light p-3 my-3" style="border-radius: 5px;">
        <?php
        if (isset($_POST['search'])) {
            echo "<h1> Threads That Contains '" . $_POST['search'] . "' </h1>";
            $q = "SELECT * FROM `threads` where thread_description LIKE '%" . $_POST['search'] . "%'";
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
                        <h5 class="" style="border-top: solid white;">Submission Date:  ' . $row['thread_created'] . ' </h5>
                    </div>
                </div>';
            }
            if ($empty) {
                echo "<h5>No Threads Found That Contains '" . $_POST['search'] . "' </h5>";
            }
        }
        ?>
    </div>

    <div class="container bg-dark text-light p-3 my-3" style="border-radius: 5px;">
        <?php
        if (isset($_POST['search'])) {
            echo "<h1> Comments That Contains '" . $_POST['search'] . "' </h1>";
            $q = "SELECT * FROM `comments` where comment_description LIKE '%" . $_POST['search'] . "%'";
            $result = mysqli_query($con, $q);
            $found = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $found = true;
                echo '<div class="media m-4 p-2" style="border-radius: 5px; border: solid white;">
                <img src="img/user.jpg" width="64" class="mr-3" alt="Avatar">
                <div class="media-body">
                <P>' . $row["comment_description"] . '</p>
                <h5 class="mt-0" style="border-top: solid white;" >Submission Date: ' . $row["comment_time"] . '</h5>
                </div>
              </div>';
            }
            if (!$found) {
                echo "<h5>No Comments Found That Contains '" . $_POST['search'] . "' </h5>";
            }
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