<?php
/**
 * Template Name: Portfolio Page
 * 
 * Шаблон для страницы "Portfolio".
 */

get_header();  // Подключаем шапку

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 10,
    'paged'          => $paged
);

$query = new WP_Query($args);
?>

<main class="portfolio-grid-page">
    <div class="container">
        <h1 class="oleez-page-title">Standard List</h1>
        <div class="row">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-md-4 portfolio-card wow fadeInUp">
                        <a href="<?php the_permalink(); ?>">
                            <div class="project-thumbnail-wrapper">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="project-thumbnail">
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default.jpg" alt="Default image" class="project-thumbnail">
                                <?php endif; ?>
                            </div>
                        </a>

                        <a href="<?php the_permalink(); ?>">
                            <h4 class="project-name"><?php the_title(); ?></h4>
                        </a>

                        <p class="project-category"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>

                        <!-- <span class="price" style="font-weight: bold; color: #28a745;">$199</span> -->
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Записей не найдено.</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <!-- Пагинация -->
        <div class="pagination-container">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'prev_text' => '&laquo; Назад',
                'next_text' => 'Вперед &raquo;',
            ));
            ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>
