<?php session_start(); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/coddiscuss/index.php">CodDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/coddiscuss/index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
          <?php
            $sql = "SELECT * FROM `categories` LIMIT 4";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo '<li class="dropdown-item">No categories found</li>';
            }else{
                while($row=mysqli_fetch_assoc($result)){
                    $catId=$row['category_id'];
                    $catTitle=$row['category_title'];
                    echo '<li><a class="dropdown-item" href="/coddiscuss/threadlist.php/?categoryId='.$catId.'&page=1">'.$catTitle.'</a></li>';
                }
            }
            ?>
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/coddiscuss/contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/coddiscuss/about.php">About Us</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="/coddiscuss/search.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <input type="hidden" name="page" value="1">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
      echo '<p class="text-light mb-0 mx-3">' . $_SESSION["username"] . '</p>'; 
      echo '<button class="btn btn-danger btn-sm" onclick="window.location.href=`/coddiscuss/logout.php`">Logout</button>
';
    } else {
      echo '<button class="btn btn-success btn-sm mx-3" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
      <button class="btn btn-success btn-sm mx-0" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>';
    }
    ?>
    <div class="modal fade text-light" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center">New User? Sign Up here</div>
            <form action="/coddiscuss/signup.php" method="post">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade text-light" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Log In</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center">Already a user? Log In here</div>
            <form action="/coddiscuss/login.php" method="post">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>