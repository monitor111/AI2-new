<?php
/*
Template Name: single
*/
get_header();
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="post">
            <h2><?php the_title(); ?></h2> <!-- Название товара -->

            <div class="main-image-wrapper">
                <!-- Динамическое изображение товара -->
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="post-image" id="main-image">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="Изображение товара" class="post-image">
                <?php endif; ?>
            </div>

            <!-- Дополнительные изображения -->
<div class="gallery">
    <?php
    $additional_images = get_post_meta(get_the_ID(), 'additional_images', true) ?: [];

    if (!empty($additional_images) && is_array($additional_images)) {
        foreach ($additional_images as $image_url) {
            echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '" class="gallery-image">';
        }
    }
    ?>
</div>



            <!-- Описание товара -->
            <p class="post-description"><?php the_content(); ?></p>

            <a href="<?php echo home_url('/contacts'); ?>" class="buy-button">Наші контакти</a>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>