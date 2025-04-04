<?php
/**
 * Template Name: Blog Single
 */

// Включение буферизации вывода
ob_start();

// Обработка регистрации
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    if (username_exists($username)) {
        $error_message = 'Пользователь с таким именем уже зарегистрирован.';
    } else {
        $user_id = wp_create_user($username, $password);

        if (!is_wp_error($user_id)) {
            wp_update_user(array(
                'ID' => $user_id,
                'display_name' => $username,
            ));

            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);

            wp_redirect(home_url('/admin/'));
            exit();
        } else {
            $error_message = 'Ошибка при регистрации: ' . $user_id->get_error_message();
        }
    }
}

get_header();  // Подключаем шапку
?>

<main class="blog-post-single">
    <div class="container">
        <div class="row">
            <div class="col-md-8 blog-post-wrapper">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        // Заголовок поста
                        echo '<h1 class="post-title wow fadeInUp">' . get_the_title() . '</h1>';
                        ?>

                        <!-- Основное изображение -->
                       <!-- <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="post-featured-image">
                        <?php endif; ?> -->

                        <!-- Контент из редактора -->
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>

                        <!-- Дополнительные изображения -->
                        <div class="additional-images">
                            <?php
                            for ($i = 1; $i <= 4; $i++) {
                                $image_id = get_post_meta(get_the_ID(), 'additional_image_' . $i, true);
                                if ($image_id) {
                                    $image_url = wp_get_attachment_url($image_id);
                                    echo '<img src="' . esc_url($image_url) . '" alt="Additional Image ' . $i . '" class="additional-image">';
                                }
                            }
                            ?>
                        </div>

                        <div class="post-tags wow fadeInUp">
                            <?php
                            $tags = get_the_tags();
                            if ($tags) {
                                foreach ($tags as $tag) {
                                    echo '<a href="' . get_tag_link($tag->term_id) . '" class="post-tag">' . $tag->name . '</a>';
                                }
                            }
                            ?>
                        </div>

                        <div class="post-navigation wow fadeInUp">
                            <?php previous_post_link('%link', 'Prev Post'); ?>
                            <?php next_post_link('%link', 'Next Post'); ?>
                        </div>

                    <?php endwhile; endif; ?>
            </div>

            <!-- Sidebar section (Оставим как есть) -->
            <!-- <div class="col-md-4">
                <div class="sidebar-widget wow fadeInUp">
                    <h5 class="widget-title">Tags!</h5>
                    <div class="widget-content">
                        <?php
                        $tags = get_tags();
                        foreach ($tags as $tag) {
                            echo '<a href="' . get_tag_link($tag->term_id) . '" class="post-tag">' . $tag->name . '</a>';
                        }
                        ?>
                    </div>
                </div>

                <div class="sidebar-widget wow fadeInUp">
                    <h5 class="widget-title">Share</h5>
                    <div class="widget-content">
                        <nav class="social-links">
                            <a href="#!">Fb</a>
                            <a href="#!">Tw</a>
                            <a href="#!">In</a>
                            <a href="#!">Be</a>
                        </nav>
                    </div>
                </div>
                
                <div class="sidebar-widget wow fadeInUp">
                    <h5 class="widget-title">Gallery</h5>
                    <div class="widget-content">
                        <div class="gallery">
                            <?php
                            $images = get_post_gallery_images($post);
                            foreach ($images as $image) {
                                echo '<a href="' . $image . '" class="gallery-grid-item" data-fancybox="widget-gallery">';
                                echo '<img src="' . $image . '" alt="gallery item">';
                                echo '</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget wow fadeInUp">
                    <h5 class="widget-title">Categories</h5>
                    <div class="widget-content">
                        <ul class="category-list">
                            <?php
                            $categories = get_categories();
                            foreach ($categories as $category) {
                                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</main>

<?php
get_footer();

// Завершение буферизации вывода
ob_end_flush();
?>
