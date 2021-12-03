<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<link rel="icon" href="<?php echo base_url().'assets/user/';?>img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" >-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url().'assets/';?>/css/style.css" rel="stylesheet" />
	<title>Share Your Card</title>

  

</head>


<body class="login-page">


    <main>

      <div class="login-block">
        <img src="https://image.flaticon.com/icons/png/512/906/906334.png" alt="Scanfcode" style="height: 100px;">
        <h1>Sign up</h1>
        
        <div class="col-md-12" id="alert">
            <?php if($this->session->flashdata('success')):?>
           <div class="alert alert-success">
                <?= $this->session->flashdata("success");?> 
           </div> 
           <?php endif; ?>
            <?php if($this->session->flashdata('error')):?>
           <div class="alert alert-danger">
                <?= $this->session->flashdata("error");?> 
           </div> 
           <?php endif; ?>
        </div>

        <form action="<?php echo base_url().'Welcome/';?>add_user" method="POST">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user ti-user"></i></span>
              <input type="text" class="form-control" name="name" placeholder="Your name">
            </div>
          </div>
          
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope ti-email"></i></span>
              <input type="text" class="form-control" name="email" placeholder="Your email address">
            </div>
          </div>
          
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
          </div>
            
            <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
              <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password">
            </div>
          </div>
          
          <button class="btn btn-primary btn-block" type="submit">Sign up</button>

          <!--<div class="login-footer">-->
          <!--  <h6>Or register with</h6>-->
          <!--  <ul class="social-icons">-->
          <!--    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>-->
          <!--    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>-->
          <!--    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>-->
          <!--  </ul>-->
          <!--</div>-->
          <div class="login-links">
            <p class="text-center">Already have an account? <a class="txt-brand" href="<?php echo base_url().'Welcome/';?>index">Login</a></p>
          </div>

        </form>
      </div>

      

    </main>
    
        <script>
        var password = document.getElementById("password")
          , confirm_password = document.getElementById("confirm_password");
        
        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }
        
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    
    </body>

</html>