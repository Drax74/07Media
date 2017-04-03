<?php

require_once 'app/bootstrap.php';

use App\Auth\Register;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  new Register($_POST);
}

?>

<?php include('template/header.php'); ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default registration-form">
          <div class="panel-heading text-center">
            <h3 class="panel-title">07 Media</h3>
            <h5>Registration form</h5>
          </div>
          <div class="panel-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['name'])) : ?>
                  <p class="warning">Missing name</p>
                <?php endif ?>
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['email'])) : ?>
                  <p class="warning">Missing email</p>
                <?php endif ?>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['password'])) : ?>
                  <p class="warning">Missing password</p>
                <?php endif ?>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
              <?php if(array_key_exists('existingEmail', $_SESSION)) : ?>
                <p class="warning">User with an email <?php echo $_SESSION['existingEmail'] ?> already exists</p>
              <?php endif ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('template/footer.php'); ?>
