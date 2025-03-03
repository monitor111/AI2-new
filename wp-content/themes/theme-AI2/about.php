<?php
/*
Template Name: About
*/
get_header();
?>

        <!-- Параллакс -->
        <section class="parallax">
            <h2>Добро пожаловать</h2>
            <p>Мы предоставляем лучшие автомобили на рынке.</p>
        </section>

        <!-- Аккордион -->
        <section class="accordion-section">
            <h2>Почему выбирают нас?</h2>
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-button">Большой выбор автомобилей</button>
                    <div class="accordion-content">
                        <p>Мы предлагаем автомобили на любой вкус и бюджет.
                        Мы предлагаем автомобили на любой вкус и бюджет.
                    Мы предлагаем автомобили на любой вкус и бюджет.Мы предлагаем автомобили на любой вкус и бюджет.
                Мы предлагаем автомобили на любой вкус и бюджет.
            Мы предлагаем автомобили на любой вкус и бюджет.</p>
                        
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button">Гарантия качества</button>
                    <div class="accordion-content">
                        <p>Каждый автомобиль проходит тщательную проверку перед продажей.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button">Поддержка клиентов</button>
                    <div class="accordion-content">
                        <p>Наша команда всегда готова ответить на ваши вопросы.</p>
                        <p>Мы предлагаем автомобили на любой вкус и бюджет.</p>
                        <p>Мы предлагаем автомобили на любой вкус и бюджет.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Чередующиеся блоки -->
<section class="info-blocks">
    <div class="info-block">
        <img src="<?php echo get_template_directory_uri(); ?>/img/about/1.jpg" alt="Наша команда: професіонали в продажу автомобілів">
        <div class="info-text">
            <h3>Наша команда!</h3>
            <p>Професіонали, які завжди готові допомогти вам з вибором автомобіля.</p>
        </div>
    </div>
    <div class="info-block reverse">
        <div class="info-text">
            <h3>Наші офіси</h3>
            <p>Ми знаходимося в кількох містах, щоб бути ближче до наших клієнтів.</p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/about/2.jpg" alt="Наш офіс: мережа офісів з продажу автомобілів">
    </div>
</section>


        <!-- Дополнительный контент -->
        <section class="extra-content">
            <h2>Наши цілі</h2>
            <p>Ми — компанія, яка спеціалізується на продажу автомобілів з Європи. Наша мета — забезпечити нашим клієнтам найкращі умови для покупки автомобіля: широкий вибір, висока якість і конкурентні ціни. Ми працюємо з перевіреними постачальниками і надаємо гарантії на всі наші автомобілі. Ознайомтесь з нашим асортиментом та дізнайтесь більше про компанію, наші послуги та переваги.</p>
        </section>

        <?php get_footer(); ?>
