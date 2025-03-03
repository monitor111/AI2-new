<?php
/*
Template Name: contacts
*/
get_header();
?>

        <!-- Основной контент -->
        <section class="extra-content">
            <h2>Как с нами связаться?</h2>
            <p>Вы можете связаться с нами любым удобным способом. Мы всегда готовы помочь!</p>
        </section>

        <!-- Контактные карты -->
        <div class="card-container">
            <div class="card">
                <a href="tel:+380638078898" class="phone-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/img/contacts/phone-solid.svg" alt="Телефон">
                </a>
                <h2>Наш телефон</h2>
                <p>+380638078898</p>
                <a href="tel:+380638078898" class="card-button">Позвонить</a>
            </div>
            <div class="card">
                <a href="mailto:lugovoy111wowa@gmail.com" class="phone-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/img/contacts/envelope-regular.svg" alt="Email">
                </a>
                <h2>Email</h2>
                <p>lugovoy111wowa@gmail.com</p>
                <a href="mailto:lugovoy111wowa@gmail.com" class="card-button">Написать</a>
            </div>
            <div class="card">
                <a href="https://www.google.com/maps" target="_blank" class="phone-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/img/contacts/location-dot-solid.svg" alt="Телефон">
                </a>
                <h2>Наш адрес</h2>
                <p>г. Київ, ул. Примерная, д. 1</p>
                <a href="https://www.google.com/maps" target="_blank" class="card-button">Показать на карте</a>
            </div>
        </div>

        <?php get_footer(); ?>
