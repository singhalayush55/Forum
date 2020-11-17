





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contact.css">
    <title>PANCHAYAT</title>
  </head>
  <body>
  <?php include 'partials/_dbconnect.php';?>
  <?php include 'partials/_header.php';?>

  <div id="succ"></div>

  <?php
    $showAlert= false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //insert thread into comment DB
        $name=$_POST['txtName'];
        $email=$_POST['txtEmail'];
        $phone=$_POST['txtPhone'];
        $desc=$_POST['txtMsg'];
        $sql="INSERT INTO `contactus` (`name`, `email`, `phone`, `prb_desc`) VALUES ('$name', '$email', '$phone', '$desc');";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Response has been Posted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>

    <div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form action="contact.php" method="post" onsubmit="return formSubmit()" id="fbox">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *"  required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="txtEmail" class="form-control" placeholder="Your Email *"  required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="txtPhone" class="form-control" placeholder="Your Phone Number *"  required>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="cnnn">
                            <input type="submit" name="btnSubmit" class="btn btn-danger" value="Send Message" />
                        </div>
            </form>
</div>
   
    <?php include 'partials/_footer2.php';?> 
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
      function formSubmit(){
        $.ajax({
          type:'POST',
          url:'contact.php',
          data:$('fbox').serialize(),
          success:function(response){
            $('#succ').html(response);

          }
        });
        var form=document.getElementById('fbox').reset();
        return false;
      }
    </script>
  </body>
</html>