<?php

session_start();

echo' <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum">Panchayat</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql= "SELECT category_name, categories_id FROM `categories`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threadlist.php?catid=' . $row['categories_id'] . '">' . $row['category_name'] . '</a>';
        }
    echo '</div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Editors
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="python.php">Python</a>
        <a class="dropdown-item" href="c.php">C/C++</a>
        <a class="dropdown-item" href="html_js_css.php">Html/Css/Js</a>
        <a class="dropdown-item" href="java.php">Java</a>
        <a class="dropdown-item" href="php_code.php">Php</a>
        </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="contact.php " tabindex="-1" >Contact </a>
    </li>
  </ul>
  <div class="row mx2">';
  if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    <p class="text-light my-0 mx-2">Welcome, ' . $_SESSION['user_name'] . '</p>
    <a href="partials/_logout.php" class="btn btn-outline-success mx-2 ml-2">LogOut</a>
    </form>';
  }
  else{
  echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <button class="btn btn-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
  <button class="btn btn-success mx-2" data-toggle="modal" data-target="#signupModal">SignUp</button>
  ';}
  echo '
  </div>
  </div>
  </nav>';
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=='true'){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You have successfully created an account.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=='false'){
  if(isset($_GET['error'])&& $_GET['error']=='Email already in use'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Email already exists.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
else{
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Passwords Dont match.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}

if(isset($_GET['loginsuccess'])&& $_GET['loginsuccess']=='false'){
  if(isset($_GET['error'])&& $_GET['error']=='Invalid Credentials'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong>Invalid Credentials.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}}


?>