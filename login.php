<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Online Vehicle Parking Management System</title>
  <?php include('./header.php'); ?>
  <?php include('./db_connect.php'); ?>
  <?php 
  session_start();
  if(isset($_SESSION['login_id']))
    header("location:index.php?page=home");
  ?>
</head>

<style>
 body {
  width: 100%;
  height: 100%;
  background-color: #f2f2f2; /* Light background color */
  background-image: url('park.jpg'); /* Background image URL */
  background-size: cover; /* Ensures the image covers the entire background */
  background-position: center center; /* Centers the image */
  background-attachment: fixed; /* Keeps the image fixed while scrolling */
}

main#main {
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background for the main content */
}

#login-left {
  position: absolute;
  left: 0;
  width: 60%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

#login-right {
  position: absolute;
  right: 0;
  width: 40%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

#login-right .card {
  margin: auto;
  z-index: 1;
  background-color:rgba(255, 255, 255, 0.3); /* Set to transparent background */
  border-radius: 8px; /* Optional: to give the card rounded corners */
  border: 1px solid rgba(255, 255, 255, 0.7); /* Optional: Add light border */
}

.form-control {
  background-color: rgba(255, 255, 255, 0.5); 
  color: #fff; /* White text */
  border: 1px solid rgba(255, 255, 255, 0.4); /* Light border */
}

.form-control:focus {
  background-color: rgba(255, 255, 255, 0.7); /* Slightly less transparent on focus */
  border-color: #007bff; /* Blue border color on focus */
  box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25); /* Optional focus effect */
}

div#login-right::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /* No overlay background, so leave it empty */
}


  

  /* Styling for the header title */
  .page-header {
    text-align: center;
    font-size: 2.5rem;
    font-weight: bold;
    color: #fff;
    margin-top: 20px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black background for title */
    border-radius: 8px; /* Optional: Rounded corners for the header */
    position: absolute;
    top: 20px;
    width: 100%;
  }
</style>

<body>

  <header class="page-header">
    Online Vehicle Parking Management System
  </header>

  <main id="main" class="bg-dark">
    <div id="login-left">
      <!-- Left side empty (background image will show here) -->
    </div>

    <div id="login-right">
      <div class="card">
        <div class="card-body">
          <form id="login-form">
            <div class="form-group">
              <label for="username" class="control-label text-white">Username</label>
              <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password" class="control-label text-white">Password</label>
              <input type="password" id="password" name="password" class="form-control">
            </div>
            <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
          </form>
        </div>
      </div>
    </div>

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

<script>
  $('#login-form').submit(function(e){
    e.preventDefault()
    $('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else if(resp == 2){
          location.href ='voting.php';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
        }
      }
    })
  })
</script>

</html>
