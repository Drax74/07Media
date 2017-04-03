<?php

require_once 'app/bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['user'];

?>

<?php include('template/header.php'); ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default registration-form">
          <div class="panel-body">
            <p>Welcome <?php echo $user->getName(); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('template/footer.php'); ?>
