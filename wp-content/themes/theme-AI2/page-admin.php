<?php
/*
Template Name: Admin Page
*/

// Добавляем проверку авторизации
if (!is_user_logged_in()) {
    wp_redirect(home_url('/custom-login/'));
    exit;
}
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom-style.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed xxx" data-panel-auto-height-mode="height">

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
    <!-- Кнопка "Додати" и "Выйти" - адаптивная -->
    <div class="d-flex justify-content-between mb-3 ml-3 mt-2">
        <a href="<?php echo site_url('/add-post/'); ?>" class="btn btn-primary btn-lg px-4 py-2">Додати</a>
        <a href="<?php echo wp_logout_url(home_url('/custom-login/')); ?>" class="btn btn-danger btn-lg px-4 py-2">Выйти</a>
    </div>

    <div class="col-md-10 mx-auto"> <!-- Центрируем таблицу -->
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $current_user_id = get_current_user_id();
$posts = get_posts(array(
    'post_type'   => 'post',
    'numberposts' => -1,
    'author'      => $current_user_id
));

                        foreach ($posts as $post) :
                        ?>
                            <tr>
                                <td class="align-middle"><?php echo $post->ID; ?></td>
                                <td class="text-wrap align-middle"><?php echo get_the_title($post->ID); ?></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="<?php echo home_url('/update-post/?id=' . $post->ID); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo admin_url('admin-post.php?action=delete_custom_post&post_id=' . $post->ID); ?>" 
                                           class="btn btn-danger btn-sm ml-1"
                                           onclick="return confirm('Удалить этот пост?');">
                                           Delete
                                        </a>
                                        <a href="<?php echo get_permalink($post->ID); ?>" class="btn btn-info btn-sm ml-1">View</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

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
