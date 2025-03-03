<?php
/*
Template Name: register
*/

// Обработка формы регистрации
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    // Проверяем, существует ли пользователь с таким именем
    if (username_exists($username)) {
        echo '<p>Пользователь с таким именем уже зарегистрирован.</p>';
    } else {
        // Создаём нового пользователя
        $user_id = wp_create_user($username, $password);

        if (!is_wp_error($user_id)) {
            // Устанавливаем отображаемое имя пользователя
            wp_update_user(array(
                'ID' => $user_id,
                'display_name' => $username,
            ));

            // Авторизуем пользователя
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);

            // Перенаправляем в админку
            wp_redirect(home_url('/admin/'));
            exit();
        } else {
            echo '<p>Ошибка при регистрации: ' . $user_id->get_error_message() . '</p>';
        }
    }
}

// Теперь можно выводить заголовок и остальную часть страницы
get_header();
?>

<section class="registration-section">
    <?php
    // Отображаем сообщение об ошибке, если оно есть
    if (isset($error_message)) {
        echo '<p class="error-message">' . $error_message . '</p>';
    }
    ?>
    <form action="" method="POST" class="registration-form">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required placeholder="Введите пароль">
        
        <button type="submit" class="register-button">Зарегистрироваться</button>
    </form>
</section>

<?php
get_footer();
?>

