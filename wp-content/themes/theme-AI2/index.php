<?php get_header(); ?>

<?php
$args = array(
    'post_type' => 'post', // Указываем тип записей
    'posts_per_page' => 10, // Количество записей на главной
    'paged' => get_query_var('paged', 1) // Для пагинации
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <section class="card-section">
        <div class="card-container">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="Изображение товара">
                        <?php endif; ?>
                    </a>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="card-button custom-button">Перейти</a>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- Пагинация -->
    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total' => $query->max_num_pages, // Общее количество страниц
            'prev_text' => '&laquo; Предыдущая',
            'next_text' => 'Следующая &raquo;',
        ));
        ?>
    </div>

    <div class="pagination">
    <a href="#" class="prev">« Предыдущая</a>
    <span class="current">1</span>
    <a href="#" class="next">Следующая »</a>
</div>

<?php else : ?>
    <p>Записей не найдено.</p>
<?php endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
