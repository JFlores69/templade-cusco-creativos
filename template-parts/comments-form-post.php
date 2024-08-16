<?php
// Evita el acceso directo al archivo
if (!defined('ABSPATH')) {
    exit; // Si no está definido 'ABSPATH', el código no se ejecuta, protegiendo el archivo.
}

// Obtiene la información del comentarista actual (si está disponible)
$commenter = wp_get_current_commenter();

// Verifica si se requiere el nombre y el correo electrónico para dejar un comentario
$req = get_option('require_name_email');

// Si se requiere, se añade el atributo aria-required='true' a los campos obligatorios
$aria_req = ($req ? " aria-required='true'" : '');

// Función para generar el formulario de comentarios
comment_form(array(
    // Configura el título del formulario antes del contenido
    'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',

    // Configura el título del formulario después del contenido
    'title_reply_after'    => '</h3>',

    // Texto que se muestra como título del formulario de comentarios
    'title_reply'          => 'Dejar un comentario',

    // Texto del botón de enviar comentario
    'label_submit'         => 'Send Comment',

    // Notas antes del campo de comentario (en este caso, vacío)
    'comment_notes_before' => '',

    // Notas después del campo de comentario (en este caso, vacío)
    'comment_notes_after'  => '',

    // Campos del formulario, incluyendo el nombre y el correo electrónico
    'fields'               => array(
        // Campo para el nombre del autor del comentario
        'author' => '<p class="comment-form-author"><label for="author">' . __('Your Name', 'your-text-domain') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
        
        // Campo para el correo electrónico del autor del comentario
        'email'  => '<p class="comment-form-email"><label for="email">' . __('Your Email', 'your-text-domain') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
            '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
    ),

    // Campo para el contenido del comentario
    'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x('Your Message', 'noun', 'your-text-domain') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

    // Deshabilita el checkbox de cookies (configuración opcional)
    'cookies'              => false,
));
?>
