<?php
/*
Template Name: register
*/

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

get_header();
?>

<main class="contact-page">
    <div class="container">
        <h1 class="oleez-page-title wow fadeInUp">Реєстрація</h1>
        <div class="row">
            <div class="col-md-6 pl-lg-5 wow fadeInRight">
                <?php if (!empty($error_message)) : ?>
                    <p class="error-message"><?php echo $error_message; ?></p>
                <?php endif; ?>
                
                <form action="" method="POST" class="oleez-contact-form">
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
        </div>
    </div>
</main>

<?php
get_footer();
?>







