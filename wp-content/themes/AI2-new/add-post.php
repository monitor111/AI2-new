<?php
/*
Template Name: Add Post
*/
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Tabbed IFrames</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-YS1HBX+RfcmC0zyGknvpGLVqpeYr0dvDeBpOsIKrU9vUqSVpTLB4NEZqYZI+4+7G" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/css/OverlayScrollbars.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">



  
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>    
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <li class="nav-item">
            <a href="<?php echo site_url('/admin/') ?>" class="nav-link">
              <i class="fa-solid fa-signs-post"></i>
              <p>
                Posts
              </p>
            </a>           
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
    <!-- <div class="col-1 mt-2">
       <a href="<?php echo site_url('/add-post/'); ?>" class="btn btn-block btn-primary">Додати</a>
    </div> -->
<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="col-12" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Назва</label>
        <input type="text" id="post_title" name="post_title" class="form-control" placeholder="Назва поста" required>
    </div>

    <div class="form-group">
        <label for="post_content">Опис</label>
        <textarea id="post_content" name="post_content" class="form-control" placeholder="Опис поста"></textarea>
    </div>

    <div class="form-group">
        <label for="post_thumbnail">Головна картинка</label>
        <input type="file" id="post_thumbnail" name="post_thumbnail" class="form-control">
    </div>

    <div class="form-group">
        <label>Додаткові картинки (4 шт)</label>
        <input type="file" name="additional_image_1" class="form-control">
        <input type="file" name="additional_image_2" class="form-control">
        <input type="file" name="additional_image_3" class="form-control">
        <input type="file" name="additional_image_4" class="form-control">
    </div>

    <input type="hidden" name="action" value="add_custom_post">
    <button type="submit" class="btn btn-primary">Додати пост</button>
</form>



  </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->






<script src="<?php echo get_template_directory_uri(); ?>/admin/js/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- AdminLTE App -->
<script src="<?php echo get_template_directory_uri(); ?>/admin/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo get_template_directory_uri(); ?>/admin/js/demo.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>






</body>
</html>

