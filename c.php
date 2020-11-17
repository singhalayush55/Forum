<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C/C++</title>
    <link rel="stylesheet" href="css/html_js.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>

    <?php
     if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
         echo '
         <iframe src="https://techiedelight.com/compiler/?~" width="100%" height="800px" scrolling="yes" seamless="seamless"></iframe>';}
    else{
            echo '<div class="jumbotron jumbotron-fluid my-5 mx-5">
            <div class="container">
              <h1 class="display-4">You Are Not Logged In</h1>
              <p class="lead">Please Login To Use This Online Editor.</p>
            </div>
          </div>';
        }
        ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

<?php include 'partials/_footer2.php';?>
</body>

</html>