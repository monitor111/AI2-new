<?php
/*
Template Name: Update Post Template
*/

// Проверка прав доступа
if (!is_user_logged_in()) {
    wp_die('У вас нет прав для доступа к этой странице.');
}

$current_user = wp_get_current_user();
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$post = get_post($post_id);

if (!$post) {
    wp_die('Пост не найден.');
}

// Разрешаем доступ администратору или автору поста
if (!current_user_can('edit_posts') && ($post->post_author != $current_user->ID && !current_user_can('administrator'))) {
    wp_die('У вас нет прав для редактирования этого поста.');
}

// Получаем заголовок, контент и главную картинку
$title = get_the_title($post_id);
$content = $post->post_content;
$thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>    
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo site_url('/admin/') ?>" class="nav-link">
              <i class="fa-solid fa-signs-post"></i>
              <p>Posts</p>
            </a>           
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
    <form action="<?php echo admin_url('admin-post.php'); ?>" method="post" class="col-4" enctype="multipart/form-data">

        
        <!-- Заголовок и описание -->
        <div class="form-group">
            <label for="post_title">Назва</label>
            <input type="text" id="post_title" name="post_title" class="form-control" value="<?php echo esc_attr($title); ?>" required>
        </div>
        <div class="form-group">
            <label for="post_content">Опис</label>
            <textarea id="post_content" name="post_content" class="form-control"><?php echo esc_textarea($content); ?></textarea>
        </div>

        <!-- Главная картинка -->
        <div class="form-group">
            <!-- <label for="post_thumbnail">Головна картинка</label> -->
            <?php if ($thumbnail): ?>
                <img src="<?php echo esc_url($thumbnail); ?>" alt="Thumbnail" class="img-thumbnail mb-2" style="width: 150px; height: 120px;">
            <?php endif; ?>
            <input type="file" id="post_thumbnail" name="post_thumbnail" class="form-control">
        </div>

        <!-- Дополнительные картинки -->
        <div class="form-group">
            <label>Додаткові картинки (4 шт)</label>
            <?php
            $gallery = get_post_meta($post_id, 'additional_images', true) ?: [];
            for ($i = 0; $i < 4; $i++): 
                $img = $gallery[$i] ?? ''; // Получаем изображение из массива
            ?>
                <div class="mb-3">
                    <?php if ($img): ?>
                        <img src="<?php echo esc_url($img); ?>" class="img-thumbnail mb-2" style="width: 100px; height: auto;">
                    <?php endif; ?>
                    <input type="file" name="additional_image_<?php echo $i + 1; ?>" class="form-control">
                </div>
            <?php endfor; ?>
        </div>

        <!-- Скрытые поля -->
        <input type="hidden" name="action" value="update_custom_post">
        <input type="hidden" name="post_id" value="<?php echo esc_attr($post_id); ?>">

        <!-- Кнопка отправки -->
        <button type="submit" class="btn btn-primary">Оновити пост</button>
    </form>
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/admin/js/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script> $.widget.bridge('uibutton', $.ui.button) </script>
<script src="<?php echo get_template_directory_uri(); ?>/admin/js/adminlte.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/admin/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
