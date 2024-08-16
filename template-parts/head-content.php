    <!-- *****************************************************************
    ** Preloader *********************************************************
    ****************************************************************** 

	<div id="preloader-container">
    	<div id="preloader-wrap">
    		<div id="preloader"></div>
    	</div>
    </div>-->


    <!-- *****************************************************************
    ** Header ************************************************************ 
    ****************************************************************** -->

    <header class="tada-container">


        <!-- LOGO -->
        <div class="logo-container">
            <a href="https://marketingdigitalcuzco.com/">
                <?php

                if (function_exists('the_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id);
                }
                ?>

                <img src="<?php echo $logo[0] ?>" alt="logo"></a>
        </div>


        <!-- MENU DESKTOP -->
        <nav class="menu-desktop menu-sticky">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => '',
                        'items_wrap' => '<ul id="%1$s" class="tada-menu">%3$s</ul>',
                        'echo' => true,
                    )
                );
            } else {
                echo 'No hay menú asignado a la ubicación "Primary".';
            }
            ?>
        </nav>


        <!-- MENU MOBILE -->
        <div class="menu-responsive-container">
            <div class="open-menu-responsive">|||</div>
            <div class="close-menu-responsive">|</div>
            <div class="menu-responsive">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'container' => '',
                            'items_wrap' => '<ul id="%1$s" class="tada-menu">%3$s</ul>',
                            'echo' => true,
                        )
                    );
                } else {
                    echo 'No hay menú asignado a la ubicación "Primary".';
                }
                ?>
            </div>
        </div> <!-- # menu responsive container -->
    <!-- SLIDER -->
    <!--<div class="tada-slider">
        <ul id="tada-slider">
            <li>
                <img src="http://localhost/wordpress/wp-content/uploads/2024/08/silder-home-01.png">
                <div class="pattern"></div>
                <div class="tada-text-container">
                    <h2>EXPERIENCIAS ÚNICAS</h2>
                    <h3>CONECTANDO <span class="main-color">INSPIRACIÓN</span> Y CREATIVIDAD</h3>
                    <span class="button"><a href="#">DESCUBRE MÁS</a></span>
                </div>
            </li>
            <li>
                <img src="http://localhost/wordpress/wp-content/uploads/2024/08/silder-home-02.png">
                <div class="pattern"></div>
                <div class="tada-text-container">
                    <h2>DISEÑO INNOVADOR</h2>
                    <h3>CREAMOS <span class="main-color">SOLUCIONES</span> VISUALES</h3>
                    <span class="button"><a href="#">NUESTRA VISIÓN</a></span>
                </div>
            </li>
            <li>
                <img src="http://localhost/wordpress/wp-content/uploads/2024/08/silder-home-03.png">
                <div class="pattern"></div>
                <div class="tada-text-container">
                    <h2>ARTES VISUALES</h2>
                    <h3>INSPIRA <span class="main-color">Y CAPTIVA</span></h3>
                    <span class="button"><a href="#">EXPLORA</a></span>
                </div>
            </li>
            <li>
                <img src="http://localhost/wordpress/wp-content/uploads/2024/08/silder-home-04.png">
                <div class="pattern"></div>
                <div class="tada-text-container">
                    <h2>IMPACTO DIGITAL</h2>
                    <h3>TRANSFORMAMOS <span class="main-color">IDEAS</span> EN REALIDAD</h3>
                    <span class="button"><a href="#">VER MÁS</a></span>
                </div>
            </li>
        </ul>

    </div> -->




    </header><!-- #HEADER -->