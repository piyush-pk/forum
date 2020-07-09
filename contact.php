<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- External Css -->
    <link rel="stylesheet" href="style.css">
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

    <?php
    // echo $_SERVER['REQUEST_METHOD'];
    require("connection.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $msg = $_POST['msg'];
        $q = "INSERT INTO `contact` (`contact_name`, `contact_email`, `contact_mobile`, `contact_description`, `contact_created`) VALUES ('$name', '$email', '$mobile', '$msg', current_timestamp());";

        $result = mysqli_query($con, $q);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Hey '. $name .'</strong> Your Message Has Been Submitted Successfully, We Will Contact With You In 24 Hours, Thanks For Contacting Us.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        } else {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Hey '. $name .'</strong> Your Message Is Not Submitted Because Of Some We WIll Trying To Fix IT As Soon As Possible Make Sure Your Details Are Correct ! ! !.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }


        // echo "$name, $email, $mobile, $msg";
    }

    ?>





    <div class="container contact-form">
        <div class="contact-image">
            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
        </div>
        <form method="post">
            <h3>Drop Us a Message</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" required class="form-control" placeholder="Your Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" required class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="number" name="mobile" maxlength="15" required class="form-control" placeholder="Phone Number, Use Country Code E.g. +91 *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="Submit" class="btnContact" value="Send Message" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="msg" class="form-control" required placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>

    

    <!-- Content -->


    <!-- Footer -->
    <?php include("footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
<!------ Include the above in your HEAD tag ---------->