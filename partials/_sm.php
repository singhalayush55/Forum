<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'partials/_dbconnect.php';
    $email=$_POST["email"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $existSql="SELECT * FROM `users` WHERE email='$email' ";
    $result=mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows>0){
        $showError="User already exists";
    }
    else{
        if(($password==$cpassword)){
          $sql="INSERT INTO `users` (`email`, `password`, `dt`) VALUES ('$email', '$password', current_timestamp())";
          $result=mysqli_query($conn,$sql);
          if($result){
            $showAlert=true;
          }
        }
        else{
          $showError="passwords do not match";
        }}

}
?>

<?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong> You have successfully signed up.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';  
         }
    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error</strong> '.$showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';  
         }?>
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">SignUp to Panchayats</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">SignUp</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
                </form>
    </div>
  </div>
</div>   