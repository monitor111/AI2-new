<?php
/*
Template Name: Custom Login
*/

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    // Аутентификация пользователя
    $user = wp_authenticate($username, $password);

    if (!is_wp_error($user)) {
        // Авторизуем пользователя
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);

        // Перенаправляем в админку
        wp_redirect(home_url('/admin/'));
        exit();
    } else {
        $login_error = 'Неверное имя пользователя или пароль.';
    }
}

get_header();
?>

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

<section class="registration-section">
    <form action="" method="POST" class="registration-form">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required placeholder="Введите имя пользователя">
        
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required placeholder="Введите пароль">
        
        <button type="submit" class="register-button">Войти</button>
    </form>
    <?php if (!empty($login_error)) echo "<p>$login_error</p>"; ?>
</section>

<?php get_footer(); ?>
