<?php
// Protege contra acceso directo a este archivo
if (!defined('ABSPATH')) {
    exit;
}

// No carga los comentarios si la publicación está protegida por contraseña y aún no se ha ingresado la contraseña
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            echo esc_html($comments_number) . ' ' . _n('Comment', 'Comments', $comments_number, 'your-text-domain');
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>

        <?php
        // Navegación de comentarios
        the_comments_navigation(array(
            'prev_text' => esc_html__('Older Comments', 'your-text-domain'),
            'next_text' => esc_html__('Newer Comments', 'your-text-domain'),
        ));
        ?>

    <?php endif; // check for have_comments(). ?>

    <?php
    // Si los comentarios están cerrados y hay comentarios, mostrar un mensaje
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'your-text-domain'); ?></p>
    <?php endif; ?>

    <?php
    // Formulario de comentarios
    comment_form(array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
    ));
    ?>

</div><!-- .comments-area -->
