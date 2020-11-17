<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>PANCHAYAT</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories` WHERE categories_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $catname=$row['category_name'];
        $catdesc=$row['category_description'];
        $catlink=$row['cat_link'];
     }
    
    ?>
    <?php
    $showAlert= false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //insert thread into DB
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];
        $user_id=$_SESSION['user_id'];
        $sql="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$user_id', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Question has been Saved.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>

    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname;?> forum</h1>
            <p class="lead"><?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge.</p>
            <a class="btn btn-success btn-lg" href="<?php echo $catlink?>" role="button">Learn more</a>
        </div>
    </div>


    <?php
     if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
            <form action="' . $_SERVER["REQUEST_URI"] .'" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Keep It Short & crisp</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Problem Description</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';
    }
    else{
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <p class="lead">You Are Not Logged In. Please Login To be a part of this discussion</p></div>';
    }
    ?>

    


    <div class="container my-6" style="margin-bottom: 100px">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id=$_GET['catid'];
        $noResult=true;
        $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $noResult=false;
            $id=$row['thread_id'];
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $thread_time=$row['timestamp'];
            $thread_user_id=$row['thread_user_id'];
            $sql2="SELECT * FROM `users` WHERE `user_id` = '$thread_user_id'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
        
    
    
        echo '<div class="media my-3">
            <img src="img/user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
                <p class="font-weight-bold my-0">' . $row2['user_name']. ' ' . $thread_time. '</p>
                <h5 class="mt-0"><a href="thread.php?threadid=' . $id.'">' . $title.'</a></h5>
                ' . $desc.'
            </div>
        </div>';

    }
    // echo var_dump($noResult);
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No Questions</h1>
          <p class="lead"><b>Be the First Person to ask a Question</b></p>
        </div>
      </div>';
    }
    ?>

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