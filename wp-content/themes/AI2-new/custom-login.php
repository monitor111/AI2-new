<?php

/*
Template Name: Custom Login
*/

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    // Аутентификация пользователя
    $creds = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => true,
    );
    $user = wp_signon($creds, false);

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

<main class="contact-page">
    <div class="container">
        <h1 class="oleez-page-title wow fadeInUp">Авторизація</h1>
        <div class="row">
            <div class="col-md-6 pl-lg-5 wow fadeInRight">               
                <form action="" method="POST" class="oleez-contact-form">
                    <div class="form-group">
                        <input type="text" class="oleez-input" id="username" name="username" required>
                        <label for="username">Ім'я</label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="oleez-input" id="password" name="password" required>
                        <label for="password">Пароль</label>
                    </div>
                    <button type="submit" class="btn btn-submit">Авторизація</button>
                </form>
                <?php if (!empty($login_error)) echo "<p class='error-message'>$login_error</p>"; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
