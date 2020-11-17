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
    $id=$_GET['threadid'];
    $per_page=4;
    $record=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `comments` WHERE thread_id=$id"));
    $pagi=ceil($record/$per_page);
    echo $pagi;
    $start=0;


    if(isset($_GET['start'])){
        $start=$_GET['start'];
        $start--;
        $start=$start*$per_page;
    }
    ?>








    <?php
    // $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
        $thread_user_id=$row['thread_user_id'];
        $sql3="SELECT * FROM `users` WHERE `user_id` = '$thread_user_id'";
            $result3=mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($result3);
     }
    
    ?>





    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead"><?php echo $desc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge.</p>
            <p>Posted by: <b><?php echo $row3['user_name'] ?></b></p>
        </div>
    </div>





    <div class="container my-3" style="margin-bottom:100px">
        <h1 class="py-2">Discussions</h1>
        <?php
        $id=$_GET['threadid'];
        $sql="SELECT * FROM `comments` WHERE thread_id=$id limit $start,$per_page";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['comment_id'];
            $content=$row['comment_content'];
            $comment_time=$row['comment_time'];
            $comment_by=$row['comment_by'];
            $sql2="SELECT * FROM `users` WHERE `user_id` = '$comment_by'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
        
    
    
        echo '<div class="media my-3">
            <img src="img/user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
                <p class="font-weight-bold my-0">' . $row2['user_name']. ' ' . $comment_time. '</p>
                ' . $content.'
            </div>
        </div>';}
    ?>
        
            <ul class="pagination pagination-sm">
                <?php for($i=1;$i<=$pagi;$i++){
                echo '<li class="page-item"><a class="page-link" href="?start='.$i.'">' . $i .'</a></li>';}?>
            </ul>   
    </div>
    <?php include 'partials/_footer.php';?>


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