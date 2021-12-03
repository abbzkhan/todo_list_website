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
	<link href="<?php echo base_url().'assets/';?>css/style.css" rel="stylesheet" />
	<title>My Tod List</title>

</head>


<body class="login-page">


    <main>

      <div class="login-block">
        <img src="https://image.flaticon.com/icons/png/512/906/906334.png" alt="Scanfcode" style="height: 100px;">
        <h1>Login</h1>
        
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

        <form action="<?php echo base_url().'Welcome/';?>login" method="POST">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope ti-email"></i></span>
              <input type="email" name="email" class="form-control" placeholder="Your email address">
            </div>
          </div>
          
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">   
              <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>
          </div>

          <button class="btn btn-primary btn-block" type="submit">Login</button>

          <div class="login-links">
            <p class="text-center"><a class="txt-brand" href="<?php echo base_url().'Welcome/';?>register">Sign Up</a></p>
          </div>

        </form>
      </div>

      

    </main>
    </body>

</html>