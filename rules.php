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



    <div class="container m-5 p-2">
        <ul>
            <h2>
                <li>No Spam / Advertising / Self-promote in the forums</li>
            </h2>
            <p>These forums define spam as unsolicited advertisement for goods, services and/or other web sites, or posts with little, or completely unrelated content. Do not spam the forums with links to your site or product, or try to self-promote your website, business or forums etc.
                Spamming also includes sending private messages to a large number of different users.
                <br>
                <b>DO NOT ASK for email addresses or phone numbers</b>
                <br>
                Your account will be banned permanently and your posts will be deleted.</p>
            <br>
            <hr>
            <h2>
                <li>Do not post copyright-infringing material</li>
            </h2>
            <p>Providing or asking for information on how to illegally obtain copyrighted materials is forbidden.</p>
            <br>
            <hr>
            <h2>
                <li>Do not post “offensive” posts, links or images</li>
            </h2>
            <p>Any material which constitutes defamation, harassment, or abuse is strictly prohibited. Material that is sexually or otherwise obscene, racist, or otherwise overly discriminatory is not permitted on these forums. This includes user pictures. Use common sense while posting.
                This is a web site for accountancy professionals.</p>
            <br>
            <hr>
            <h2>
                <li>Do not cross post questions</li>
            </h2>
            <p>Please refrain from posting the same question in several forums. There is normally one forum which is most suitable in which to post your question.</p>
            <br>
            <hr>
            <h2>
                <li>Remain respectful of other members at all times</li>
            </h2>
            <p>All posts should be professional and courteous. You have every right to disagree with your fellow community members and explain your perspective.</p>
            <br>
            <hr>
            <!-- <h2><li></li></h2>
            <p></p> -->
        </ul>
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