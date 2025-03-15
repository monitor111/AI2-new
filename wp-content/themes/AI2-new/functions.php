
<?php
function ai2_new_enqueue_styles() {
    wp_enqueue_style('ai2-new-style', get_stylesheet_uri());
    wp_enqueue_style('ai2-custom-style', get_template_directory_uri() . '/assets/vendors/animate.css/animate.min.css');
    wp_enqueue_style('ai2-slick', get_template_directory_uri() . '/assets/vendors/slick-carousel/slick.css');
    wp_enqueue_style('ai2-slick-theme', get_template_directory_uri() . '/assets/vendors/slick-carousel/slick-theme.css');
}
add_action('wp_enqueue_scripts', 'ai2_new_enqueue_styles');



// Регистрация меню
function theme_ai_register_menus() {
    register_nav_menus(array(
        'header-menu' => 'Меню в шапке',
    ));
}
add_action('init', 'theme_ai_register_menus');












// Регистрация меню
// function theme_ai_register_menus() {
//     register_nav_menus(array(
//         'header-menu' => 'Меню в шапке',
//     ));
// }
// add_action('init', 'theme_ai_register_menus');

// Поддержка миниатюр для записей и страниц
add_theme_support('post-thumbnails');

// Установка размера миниатюры, если нужно
set_post_thumbnail_size(150, 120, true); // Можно указать свои размеры

// Фильтр для поиска по страницам и записям
function search_filter($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array('post', 'page')); // Добавляем 'page' для поиска по страницам
    }
    return $query;
}
add_filter('pre_get_posts', 'search_filter');



// Устанавливаем количество постов на странице
function set_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query()) {
        // Задайте нужное количество постов на странице
        $query->set('posts_per_page', 6); // Например, 6 постов на страницу
    }
}
add_action('pre_get_posts', 'set_posts_per_page');










// Добавление поста , и подключения админки.
function enqueue_adminlte_assets() {
    if (is_page_template('page-admin.php')) {
        wp_enqueue_style('adminlte-css', get_template_directory_uri() . '/admin/css/adminlte.min.css');
        wp_enqueue_style('adminlte-fontawesome', get_template_directory_uri() . '/admin/css/all.min.css');
        wp_enqueue_script('adminlte-js', get_template_directory_uri() . '/admin/js/adminlte.min.js', array('jquery'), null, true);
        wp_enqueue_script('adminlte-bootstrap', get_template_directory_uri() . '/admin/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_adminlte_assets');

function custom_enqueue_styles_scripts() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/custom-style.css');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles_scripts');

function my_custom_footer() {
    echo '<p>Дополнительная информация о компании</p>';
}
remove_action('wp_footer', 'some_footer_function');
add_action('wp_footer', 'my_custom_footer');



function add_custom_post() {
    if (!isset($_POST['post_title'])) {
        wp_die('Ошибка: нет заголовка.');
    }

    $post_data = array(
        'post_title'   => sanitize_text_field($_POST['post_title']),
        'post_content' => sanitize_textarea_field($_POST['post_content']),
        'post_status'  => 'publish',
        'post_type'    => 'post',
    );

    $post_id = wp_insert_post($post_data);

    if ($post_id) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';

        if (!empty($_FILES['post_thumbnail']['name'])) {
            $thumbnail_id = media_handle_upload('post_thumbnail', $post_id);
            if (!is_wp_error($thumbnail_id)) {
                set_post_thumbnail($post_id, $thumbnail_id);
            }
        }

        $uploaded_images = [];
        for ($i = 1; $i <= 4; $i++) {
            $key = 'additional_image_' . $i;
            if (!empty($_FILES[$key]['name'])) {
                $image_id = media_handle_upload($key, $post_id);
                if (!is_wp_error($image_id)) {
                    $uploaded_images[] = wp_get_attachment_url($image_id);
                }
            }
        }

        if (!empty($uploaded_images)) {
            update_post_meta($post_id, 'additional_images', $uploaded_images);
        }

        wp_redirect(home_url('/admin/'));
        exit;
    } else {
        wp_die('Ошибка при добавлении поста.');
    }
}

add_action('admin_post_add_custom_post', 'add_custom_post');
add_action('admin_post_nopriv_add_custom_post', 'add_custom_post');













// Хук 4 - обновление поста
function update_custom_post() {
    if (!isset($_POST['post_id']) || !is_numeric($_POST['post_id'])) {
        wp_die('Ошибка: неверный идентификатор поста.');
    }

    $post_id = intval($_POST['post_id']);

    if (!is_user_logged_in()) {
    wp_die('У вас нет прав для доступа к этой странице.');
}


    // Обновляем заголовок и описание
    $post_data = array(
        'ID'           => $post_id,
        'post_title'   => sanitize_text_field($_POST['post_title']),
        'post_content' => sanitize_textarea_field($_POST['post_content']),
    );
    wp_update_post($post_data);

    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    // Обновление главного изображения
    if (!empty($_FILES['post_thumbnail']['name'])) {
        $thumbnail_id = media_handle_upload('post_thumbnail', $post_id);
        if (!is_wp_error($thumbnail_id)) {
            set_post_thumbnail($post_id, $thumbnail_id);
        }
    }

    // Обновление дополнительных изображений
    $gallery = get_post_meta($post_id, 'additional_images', true) ?: []; // Получаем текущие изображения

    for ($i = 1; $i <= 4; $i++) {
        $key = 'additional_image_' . $i;
        if (!empty($_FILES[$key]['name'])) {
            $image_id = media_handle_upload($key, $post_id);
            if (!is_wp_error($image_id)) {
                $gallery[$i - 1] = wp_get_attachment_url($image_id); // Обновляем измененное изображение
            }
        }
    }

    update_post_meta($post_id, 'additional_images', $gallery);

    wp_redirect(home_url('/admin/'));
    exit;
}

add_action('admin_post_update_custom_post', 'update_custom_post');
add_action('admin_post_nopriv_update_custom_post', 'update_custom_post');








// Хук 5 - удаление поста
function delete_custom_post() {
    if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
        wp_die('Ошибка: неверный идентификатор поста.');
    }

    $post_id = intval($_GET['post_id']);

    // Удаляем пост и его изображения
    $gallery = get_post_meta($post_id, 'additional_images', true);
    if (!empty($gallery) && is_array($gallery)) {
        foreach ($gallery as $image_url) {
            $attachment_id = attachment_url_to_postid($image_url);
            if ($attachment_id) {
                wp_delete_attachment($attachment_id, true);
            }
        }
    }

    wp_delete_post($post_id, true);

    wp_redirect(home_url('/admin/'));
    exit;
}

add_action('admin_post_delete_custom_post', 'delete_custom_post');





// Авторизация
add_action('init', 'redirect_login_page');
function redirect_login_page() {
    $login_page = home_url('/custom-login/');
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}

add_filter('authenticate', 'custom_login_authenticate', 101, 3);
function custom_login_authenticate($user, $username, $password) {
    if ($username == '' || $password == '') return $user;

    $user = get_user_by('login', $username);

    if (!$user || !wp_check_password($password, $user->user_pass, $user->ID)) {
        $user = null;
    }

    return $user;
}

// Проверка авторизации при доступе к /admin/
add_action('template_redirect', 'check_if_user_logged_in');
function check_if_user_logged_in() {
    if (is_page('admin') && !is_user_logged_in()) {
        wp_redirect(home_url('/custom-login/'));
        exit();
    }
}

// Отключаем панель администратора для пользователей
add_filter('show_admin_bar', '__return_false');




?>

