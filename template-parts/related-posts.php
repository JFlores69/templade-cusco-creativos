<?php
// Consulta personalizada para obtener 3 entradas relacionadas
$args = array(
    'posts_per_page' => 4, // Obtener un extra para poder excluir la entrada actual
    'post__not_in'   => array( get_the_ID() ), // Excluir la entrada actual
    'orderby'        => 'rand' // Orden aleatorio para diversidad
);

// Realiza la consulta
$related_posts = new WP_Query( $args );

if ( $related_posts->have_posts() ) : 
    $related_posts->the_post(); // Omite la primera entrada
    ?>
    <div class="related-items">
        <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
            <div class="related-item">
                <div class="related-image">
                    <!-- Imagen destacada -->
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                    <!-- Categoría -->
                    <span class="related-category">
                        <?php 
                        $category = get_the_category(); 
                        if ( ! empty( $category ) ) {
                            echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
                        }
                        ?>
                    </span>
                </div>
                <div class="related-text">
                    <!-- Fecha de publicación -->
                    <span class="related-date"><?php echo get_the_date(); ?></span>
                    <!-- Título -->
                    <span class="related-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </span>
                </div>
                <div class="related-author">
                    <!-- Autor -->
                    <?php esc_html_e( 'Post by ', 'your-text-domain' ); ?>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                        <?php the_author(); ?>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
