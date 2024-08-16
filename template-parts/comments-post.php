<?php
// Evita el acceso directo al archivo
if (!defined('ABSPATH')) {
    exit; // Si no está definido 'ABSPATH', el código no se ejecuta, protegiendo el archivo.
}

// Si la entrada actual está protegida por contraseña y la contraseña no ha sido introducida, no mostrar nada
if (post_password_required()) {
    return; // Si el post está protegido con contraseña y el usuario no ha introducido la contraseña, no se muestra el contenido.
}
?>

<div id="comments" class="comments-area">
    <?php 
    // Verifica si hay comentarios para el post actual
    if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            // Obtiene el número de comentarios del post actual
            $comments_number = get_comments_number();
            
            // Si hay un solo comentario, muestra "One Comment"
            if ('1' === $comments_number) {
                printf(_x('One Comment', 'comments title', 'your-text-domain'));
            } else {
                // Si hay más de un comentario, muestra el número total de comentarios
                printf(
                    _nx(
                        '%1$s Comment', // Texto para un comentario
                        '%1$s Comments', // Texto para más de un comentario
                        $comments_number, // Número de comentarios
                        'comments title',
                        'your-text-domain'
                    ),
                    number_format_i18n($comments_number) // Formatea el número de comentarios según la localización
                );
            }
            ?>
        </h3>

        <div class="comments-list">
            <?php
            // Lista los comentarios del post actual
            wp_list_comments(array(
                'style'       => 'div', // Usa la etiqueta <div> para los comentarios en lugar de <li>
                'short_ping'  => true, // Muestra solo un breve pingback en los comentarios de este tipo
                'avatar_size' => 50, // Tamaño del avatar de los comentaristas
                'callback'    => 'mytheme_comment' // Usa una función personalizada para el diseño de los comentarios
            ));
            ?>
        </div><!-- .comments-list -->

        <?php
        // Comprueba si hay suficientes comentarios para paginación y si está habilitada la opción de paginar comentarios
        if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'your-text-domain'); ?></h2>
                <div class="nav-links">
                    <?php
                    // Muestra el enlace a comentarios anteriores si existen
                    if (get_previous_comments_link()) {
                        ?><div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'your-text-domain')); ?></div><?php
                    }
                    // Muestra el enlace a comentarios más recientes si existen
                    if (get_next_comments_link()) {
                        ?><div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'your-text-domain')); ?></div><?php
                    }
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->
        <?php endif; // Fin de la comprobación para la navegación de comentarios.
        ?>

    <?php else : // No hay comentarios aún ?>
        <h3 class="comments-title"><?php esc_html_e('Aún no hay comentarios', 'your-text-domain'); ?></h3>
    <?php endif; // Fin de la comprobación de comentarios existentes.
    ?>
</div><!-- #comments -->
