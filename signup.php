<?php
if ($loggedin) {
    echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' . $username . '</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="partials_front/_logout.php">Logout</a>
                    </div>
                  </li>
                  <li class="text-center image-size-small position-relative">
                    <a href="viewProfile.php"><img src="img/person-' . $userId . '.jpg" class="rounded-circle" onError="this.src = \'images/profilePic.jpg\'" style="width:40px; height:40px"></a>
                  </li>';
} else {
    echo '<li>
                    <button type="button" class="btn btn-success mx-2" data-toggle="modal" data-target="#loginModal">Login</button>
                 </li>
                 <li>
                    <button type="button" class="btn btn-success mx-2" data-toggle="modal" data-target="#signupModal">SignUp</button>
                 </li>';
}
?>


<?php
include 'partials_front/_loginModal.php';
include 'partials_front/_signupModal.php';

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You can now login.
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
          </div>';
}
if (isset($_GET['error']) && $_GET['signupsuccess'] == "false") {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> ' . $_GET['error'] . '
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
          </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
          </div>';
}
if (isset($_GET['login']) && $_GET['login'] == "false") {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Invalid Credentials
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
          </div>';
}
?>