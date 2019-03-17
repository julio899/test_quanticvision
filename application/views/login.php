<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Test Skill Julio Vinachi in QuanticVision 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url();?>assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="off-canvas-sidebar" cz-shortcut-listen="true">
      
        
        <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white collapsing" id="navigation-example" style="height: 85px;">
  <div class="container">
    <div class="navbar-wrapper">
      
        
      
      <a class="navbar-brand" href="#">Página de identificación</a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="true" aria-label="Toggle navigation" data-target="#navigation-example">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>

      <div class="collapse navbar-collapse justify-content-end">
        
          
            <ul class="navbar-nav">
    
    
    <li class="nav-item  active ">
        <a href="<?php echo base_url();?>login" class="nav-link">
            <i class="material-icons">fingerprint</i>
            Login
        </a>
    </li>

    
</ul>

          
        

        
      </div>
  </div>
</nav>
<!-- End Navbar -->

        


        <div class="wrapper wrapper-full-page">
          
            
















<div class="page-header login-page header-filter" filter-color="black" style="background-image: url('images/bg.jpeg'); background-size: cover; background-position: top center;">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="container">
    <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
      <form class="form" action="login/authenticate" method="post">
        <div class="card card-login">
          <div class="card-header card-header-info text-center">
            <img src="<?php echo base_url(); ?>images/logo.png">            
          </div>
          <div class="card-body ">

                  <form>
                  <div class="row">
                    <div class="col" style="padding-bottom: 1em;">
                      <input type="text" name="appUserField" autocomplete="off" class="form-control" placeholder="User">
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col">
                      <input type="password" name="appPasswordField" autocomplete="off" class="form-control" placeholder="Password">
                    </div>
                  </div>
                </form>

    

          </div>
          <div class="card-footer justify-content-center">


          <button type="submit" id="btn" class="btn btn-info btn-lg animated">Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <footer class="footer">
    <div class="container">
        <nav class="float-left">
          <ul>
              <li>
                  <a href="#">Apacionado y Creativo</a>
              </li>
              
              
              
          </ul>
        </nav>
        <div class="copyright float-right" style="cursor: pointer;">Made with <i class="material-icons">favorite</i> by <label>Julio Vinachi</label> © 2019</div>
    </div>
</footer>

</div>

          
</div>
       



<style>
.copyright>label{
  font-size: 1.3em;
}
.copyright>label:hover{
  text-decoration: underline; 
  cursor: pointer;
}

button.btn.btn-info.btn-lg
{
    width: 92%;
    opacity: 0.5;
}
button.btn.btn-info.btn-lg:hover{
    color: #ffffffb1;
    width: 92%;
    background: linear-gradient(60deg,#181721c4,#000000);
    opacity: 1;
}

</style>


</body>

</html>