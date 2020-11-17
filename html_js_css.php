<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML/CSS/JS</title>
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

    <div class="conn">
    <div class="code-area">
        <textarea id="htmlCode" placeholder="HTML Code" oninput="showPreview()"></textarea>
        <textarea id="cssCode" placeholder="CSS Code" oninput="showPreview()"></textarea>
        <textarea id="jsCode" placeholder="JavaScript Code" oninput="showPreview()"></textarea>
    </div>
    <div class="preview-area">
        <iframe id="preview-window"></iframe>
    </div>
    </div>';}
    else{
        echo '<div class="jumbotron jumbotron-fluid my-5 mx-5">
        <div class="container">
          <h1 class="display-4">You Are Not Logged In</h1>
          <p class="lead">Please Login To Use This Online Editor.</p>
        </div>
      </div>';
    }
    ?>


    <script>
    function showPreview() {
        var htmlCode = document.getElementById("htmlCode").value;
        var cssCode = "";
        var jsCode = "" + document.getElementById("jsCode").value + "";
        var frame = document.getElementById("preview-window").contentWindow.document;
        frame.open();
        frame.write(htmlCode + cssCode + jsCode);
        frame.close();
    }
    </script>
<?php include 'partials/_footer2.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>