<?php
/**
 * Template Name: Portfolio Page
 * 
 * Шаблон для страницы "Portfolio".
 */

get_header();  // Подключаем шапку
?>

    <main class="portfolio-grid-page">
        <div class="container">
            <h1 class="oleez-page-title">Standard List</h1>

            <div class="row">
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_9@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_8@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_7@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_6@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_5@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_4@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_3@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_2@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
                <div class="col-md-4 portfolio-card wow fadeInUp">
                    <div class="project-thumbnail-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Standard_list_blog/Standard_1@2x.jpg" alt="portffolio" class="project-thumbnail">
                    </div>
                    <h5 class="project-name">Simple Design</h5>
                    <p class="project-category">Branding</p>
                </div>
            </div>
        </div>
    </main>
    
    <?php get_footer() ?>