<?php
/**
 * Template Name: Blog Page
 * 
 * Шаблон для страницы "Blog анонси постів".
 */

get_header(); // Подключаем шапку

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 10,
    'paged'          => $paged
);

$query = new WP_Query($args);
?>

<main class="blog-standard">
    <div class="container">
        <h1 class="oleez-page-title wow fadeInUp">Blog Standard</h1>
        <div class="row">
            <div class="col-md-8">
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <article class="blog-post wow fadeInUp">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="post-thumbnail">
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default.jpg" alt="Default image" class="post-thumbnail">
                                <?php endif; ?>
                            </a>
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                            <a href="<?php the_permalink(); ?>">
                                <h4 class="post-title"><?php the_title(); ?></h4>
                            </a>
                            <p class="post-excerpt"><?php the_excerpt(); ?></p>
                        </article>
                    <?php endwhile; ?>

                    <nav class="oleez-pagination wow fadeInUp">
                        <?php
                        echo paginate_links(array(
                            'total' => $query->max_num_pages,
                            'prev_text' => '&laquo; Предыдущая',
                            'next_text' => 'Следующая &raquo;',
                        ));
                        ?>
                    </nav>
                <?php else : ?>
                    <p>Записей не найдено.</p>
                <?php endif; wp_reset_postdata(); ?>
            </div>

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
