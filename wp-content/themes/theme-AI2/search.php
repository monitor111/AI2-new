<?php
// Подключаем шапку сайта
get_header(); 
?>

<section class="search-results">
    <div class="container">
        <h1>Результаты поиска по запросу: "<?php echo get_search_query(); ?>"</h1>

        <?php
        // Выводим посты и страницы, если они есть
        if ( have_posts() ) : ?>
            <div class="card-container">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="Изображение товара">
                            <?php endif; ?>
                        </a>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="card-button custom-button">Подробнее</a>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php 
            // Пагинация для страниц
            the_posts_pagination( array(
                'prev_text' => __('« Назад'),
                'next_text' => __('Вперед »'),
            ) );
            ?>
        <?php else : ?>
            <p>К сожалению, ничего не найдено по вашему запросу.</p>
        <?php endif; ?>
    </div>
</section>

<?php
// Подключаем подвал сайта
get_footer(); 
?>

