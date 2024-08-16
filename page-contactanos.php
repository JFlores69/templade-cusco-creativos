<?php
/*
Template Name: Contactanos
*/
get_header();
?>
    <Article>
        <section class="tada-container content-posts post post-full-width">
            <!-- CONTENT -->
            <div class="content col-xs-12">
                <article>
                    <?php
                    // Contenido principal de la página Sobre Nosotros
                    // Aquí puedes añadir el contenido directamente o utilizar get_template_part si prefieres dividir el contenido en partes.
                    ?>
                    <div class="post-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="post-text">
                        <h2>Contáctanos</h2>
                    </div>
                    <div class="post-text text-content">
                        <div class="text">
                            <p>
                                <?php the_content(); ?>
                            </p>
                        </div>
                    </div>

                    <!-- RELATED POSTS -->
                    <div class="related-posts">
                        <h2>Otros Artículos</h2>
                        <div class="related-item-container">
                            <?php
                            // Sección de posts relacionados
                            get_template_part('template-parts/related-posts');
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- COMMENTS -->
                    <div class="comments">
                        <?php
                        // Sección de comentarios
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                        ?>
                    </div>
                </article>
            </div>
        </section>
    </Article>

<?php
get_footer();
?>