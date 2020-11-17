<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index_style.css">
    <title>PANCHAYAT</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
   

    <!-- Search Results -->
    <div class="container conn" style="min-height:500px">
    
        <h3>Search Results for <?php echo $_GET['search'];?></h3>
        <div class="results">
        <?php
        $noresult=true;
        $query=$_GET['search'];
         $sql="SELECT * FROM `threads` WHERE match (thread_title,thread_desc) against ('$query')";
         $result=mysqli_query($conn,$sql);
         while($row=mysqli_fetch_assoc($result)){
             $noresult=false;
             $title=$row['thread_title'];
             $desc=$row['thread_desc'];
             $thread_id=$row['thread_id'];
             $url="thread.php?threadid=". $thread_id ;
             echo '<h4><a href="' . $url . '">' . $title . '</a></h4>
             <p>' . $desc . '</p>';
          }

          if($noresult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">No Results Found</h1>
              <p class="lead"><b>Suggestions</b><ul>
              <li>Make Sure that all words are spelled correctly</li>
              <li>Try Different KeyWords</li>
              <li>Try more General KeyWords</li></ul></p>
            </div>
          </div>';
          }
    ?>
        </div>
    </div>

    


    <?php include 'partials/_footer2.php';?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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