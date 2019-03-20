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
  <!-- datatable   -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
  <script type="text/javascript">var base_url="<?php echo base_url();?>";</script>
</head>

<body class="">
  <div class="wrapper ">
    <?php $this->load->view('html/sidebar'); ?> 

    <div class="main-panel">

      <?php $this->load->view('html/navbar'); ?> 
      <div class="content">
        <div class="container-fluid">          
          <?php $this->load->view('pages/'.$page); ?> 
        </div>
      </div>
      <?php $this->load->view('html/footer'); ?> 
    </div>
  </div>
      <?php //$this->load->view('html/plugin'); ?>
      <?php $this->load->view('component/modal_update_user'); ?>
      <?php $this->load->view('component/modal_register_user'); ?>
      <?php $this->load->view('html/resources_js'); ?>

</body>

</html>
