<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
    <?php 
    if (is_front_page()) {
        bloginfo('name'); // Главная страница
    } elseif (is_page()) {
        the_title(); // Для всех страниц, будет выводиться заголовок страницы
    } elseif (is_single()) {
        the_title(); // Для записей (постов), выводим заголовок записи
    } else {
        bloginfo('name'); // Для всех остальных типов контента
    }
    ?>
</title>

    <!-- Мета-описание -->
    <meta name="description" content="Продаж автомобілів з Європи в Україні. Великий вибір вживаних автомобілів з Німеччини, Польщі та інших країн.">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:description" content="Продаж автомобілів з Європи в Україні. Знайдіть ідеальний автомобіль прямо зараз!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo home_url(); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/logo.png"> <!-- Путь к логотипу -->

    <!-- Twitter Card мета-теги -->
    <meta property="og:title" content="<?php echo is_single() ? the_title('', '', false) : bloginfo('name'); ?>">
    <meta property="og:description" content="<?php echo is_single() ? get_the_excerpt() : 'Продаж автомобілів з Європи в Україні. Знайдіть ідеальний автомобіль прямо зараз!'; ?>">
    <meta property="og:url" content="<?php echo is_single() ? get_permalink() : home_url(); ?>">
    <meta property="og:image" content="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/images/logo.png'; ?>">

    <!-- Канонический URL -->
    <link rel="canonical" href="<?php echo home_url(); ?>">

    <!-- Подключение стилей -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

    <!-- Подключение WordPress-хуков -->
    <?php wp_head(); ?>
</head>
<body>
    <div class="container">
        <header>
    <h1>
    <?php 
    if (is_front_page()) {
        bloginfo('name'); // Главная страница
    } elseif (is_page()) {
        the_title(); // Для страниц, выводим заголовок страницы
    } elseif (is_single()) {
        the_title(); // Для записей (постов), выводим заголовок записи
    } else {
        bloginfo('name'); // Для всех остальных типов контента
    }
    ?>
    </h1>

    <form class="search-form mb-4" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="text" name="s" class="search-input" placeholder="Пошук..." required>
        <button type="submit" class="search-button">Знайти</button>
    </form>

    <nav class="navbar">
        <ul class="navbar-list">
            <li><a href="<?php echo home_url('/home'); ?>">Головна!</a></li>
            <li><a href="<?php echo home_url('/about'); ?>">Про нас!</a></li>
            <li><a href="<?php echo home_url('/contacts'); ?>">Контакти</a></li>
            <li><a href="<?php echo home_url('/products'); ?>">Товари</a></li>
        </ul>

        <!-- Кнопки личного кабинета, регистрации и авторизации справа -->
        <ul class="navbar-list navbar-right">
            <?php if (is_user_logged_in()) : ?>
                <li><a href="<?php echo home_url('/admin/'); ?>" class="navbar-button">Личный кабинет</a></li>
                <li><a href="<?php echo wp_logout_url(home_url('/custom-login/')); ?>" class="navbar-button">Выйти</a></li>
            <?php else : ?>
                <li><a href="<?php echo home_url('/custom-login/'); ?>" class="navbar-button">Авторизация</a></li>
                <li><a href="<?php echo home_url('/register'); ?>" class="navbar-button">Регистрация</a></li>
            <?php endif; ?>
        </ul>

        <div class="menu-toggle" id="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>

    </div>
</body>
</html>
