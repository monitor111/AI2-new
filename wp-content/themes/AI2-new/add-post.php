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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/css/adminlte.min.css">

<script src="https://cdn.ckeditor.com/4.20.1/standard-all/ckeditor.js"></script>




<?php
// Подключаем необходимые скрипты и стили для редактора WordPress
function load_wp_editor_assets() {
    wp_enqueue_script('wp-tinymce');
    wp_enqueue_script('editor');
    wp_enqueue_style('editor-buttons');
}
add_action('wp_enqueue_scripts', 'load_wp_editor_assets');
?>

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
     <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="col-12" enctype="multipart/form-data">
    <?php wp_nonce_field('add_post_nonce'); ?> <!-- Добавляем nonce -->
    
    <div class="form-group">
        <label for="post_title">Назва</label>
        <input type="text" id="post_title" name="post_title" class="form-control" placeholder="Назва поста" required>
    </div>

    <div class="form-group">
        <label for="editor">Контент</label>
        <textarea name="post_content" id="editor" class="form-control"></textarea>
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

 


<!-- <form action="" method="post">
    <div class="form-group">
        <label for="post_title">Заголовок поста</label>
        <input type="text" id="post_title" name="post_title" class="form-control" placeholder="Введите заголовок">
    </div>

    <div class="form-group">
        <label for="editor">Контент</label>
        <textarea name="content" id="editor" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Опубликовать</button>
</form> -->





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




<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


<!-- Подключаем jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>





<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))  // Инициализация редактора на textarea с id "editor"
        .catch(error => {
            console.error(error);
        });
</script>










</body>
</html>

