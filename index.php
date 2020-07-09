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

    <!-- Signup Checker -->
    <?php
    if (isset($_GET['alreadyExist'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Hey User!</strong> Your E-mail Address Is Already Registered, So Please Login Or Signup With Different E-mail.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else if (isset($_GET['signupSuccess'])) {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Welcome !</strong> You Have Successfully Registered, Now You Can Login .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else if (isset($_GET['signupFailed'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Hey User !</strong> An Occurs Because OF Some Problem, Make Sure You Have Filled Correct Details & Try Again After 2 Hours.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else if (isset($_GET['passMatch'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Hey User !</strong> Your Password & Confirm Password Is Not Same Please Try Again And Make Both Password Are Same.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else if (isset($_GET['loginPass'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Hey User !</strong> Your Password Is Wrong Please Try Again With Correct Password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }else if (isset($_GET['unregisteredUser'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Hey User !</strong> You Are Not A Registered User Kindly Signup First TO Login .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>

    <!-- Slider -->
    <?php include('slider.php'); ?>

    <!-- Content -->
    <div class="container text-center d-flex justify-content-center p-2 mt-3">
        <h1>Welcome To PIYUSHPK - Problem Solving Forum</h1>
    </div>

    <!-- <div style="border-radius: 5px; border: solid white;"></div> -->

    <div class="container-fluid row d-flex justify-content-center mx-auto p-3" id="fetchData">
        <?php
        require("connection.php");
        $q = "SELECT * FROM `category`;";
        $result = mysqli_query($con, $q);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="card m-3 d-flex justify-content-center " style="width: 35rem;">
                <img src="https://source.unsplash.com/500x300/?programming,' . $row["category_name"] . '" class="card-img-top" alt="' . $row["category_name"] . '">
                <div class="card-body">
                    <h5 class="card-title">' . $row["category_name"] . '</h5>
                    <p class="card-text">' . $row["category_description"] . '</p>
                    <a href="thread.php?catid=' . $row["category_id"] . '" class="btn btn-primary">View Threads</a>
                </div>
            </div>
            ';
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