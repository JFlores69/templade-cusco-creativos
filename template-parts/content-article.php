<div class="post-image">
    <?php 
    // Comprueba si el post actual tiene una imagen destacada
    if (has_post_thumbnail()) : ?>
        <!-- Muestra la imagen destacada del post -->
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
    <?php endif; ?>
</div>

<div class="category">
    <?php
    // Obtiene las categorías del post actual
    $categories = get_the_category();
    // Si el post tiene al menos una categoría asignada
    if (!empty($categories)) {
        // Muestra el enlace a la primera categoría del post
        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
    }
    ?>
</div>

<div class="post-text">
    <!-- Muestra la fecha de publicación del post -->
    <span class="date"><?php echo get_the_date(); ?></span>
    <!-- Muestra el título del post -->
    <h1><?php the_title(); ?></h1>
</div>

<div class="post-text text-content">
    <div class="post-by">
        <!-- Muestra el nombre del autor del post con un enlace a su página de autor -->
        Post By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
    </div>
    <div class="text">
        <!-- Muestra el contenido completo del post -->
        <?php the_content(); ?>
        <div class="clearfix"></div>
    </div>
</div>

<div class="social-post">
    <!-- Iconos para compartir el post en redes sociales -->
    <a href="#"><i class="icon-facebook5"></i></a>
    <a href="#"><i class="icon-twitter4"></i></a>
    <a href="#"><i class="icon-google-plus"></i></a>
    <a href="#"><i class="icon-vimeo4"></i></a>
    <a href="#"><i class="icon-linkedin2"></i></a>
</div>
