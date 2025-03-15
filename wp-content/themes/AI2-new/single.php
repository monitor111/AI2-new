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
                    while (have_posts()) : the_post(); ?>
                        <h1 class="post-title wow fadeInUp"><?php the_title(); ?></h1>
                        <div class="post-header wow fadeInUp">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="post-featured-image">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Blog_single/Blog_single@2x.jpg" alt="blog post" class="post-featured-image">
                            <?php endif; ?>
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                        </div>
                        <div class="post-content wow fadeInUp">
                            <?php the_content(); ?>
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
                        <div class="comment-section wow fadeInUp">
                            <h5 class="section-title">Зареєструватись щоб додати свою новину</h5>
                            <?php if (!empty($error_message)) : ?>
                                <p class="error-message"><?php echo $error_message; ?></p>
                            <?php endif; ?>
                            <form action="<?php echo get_permalink(); ?>" method="POST" class="oleez-contact-form">
                                <div class="form-group">
                                    <input type="text" class="oleez-input" id="username" name="username" required>
                                    <label for="username">Ім'я</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="oleez-input" id="password" name="password" required>
                                    <label for="password">Пароль</label>
                                </div>
                                <button type="submit" class="btn btn-submit">Реєстрація</button>
                            </form>
                        </div>
                    <?php endwhile; endif; ?>
            </div>

            <div class="col-md-4">
    <div class="sidebar-widget wow fadeInUp">
        <h5 class="widget-title">Tags</h5>
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
</div>
            
        </div>
    </div>
</main>

<?php
get_footer();

// Завершение буферизации вывода
ob_end_flush();
?>