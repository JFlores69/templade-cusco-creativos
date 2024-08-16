<?php
// Asegurar que se maneje correctamente la paginación en la primera página y las siguientes
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

// Argumentos para la consulta que limita a 6 posts
$args = array(
    'posts_per_page' => 6,
    'paged'          => $paged,
    'post_status'    => 'publish'
);

// La consulta personalizada
$the_query = new WP_Query($args);

if ($the_query->have_posts()) : 
    while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <article>
            <div class="post-image">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
                <?php endif; ?>
                <div class="category">
                    <?php 
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="post-text">
                <span class="date"><?php echo get_the_date(); ?></span>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="text">
                    <?php echo wp_trim_words(get_the_content(), 30, '...'); ?>
                    <a href="<?php the_permalink(); ?>"><i class="icon-arrow-right2"></i></a>
                </p>
            </div>
            <div class="post-info">
                <div class="post-by">Post By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></div>
                <div class="extra-info">
                    <span class="comments"><?php comments_number('0', '1', '%'); ?> <i class="icon-bubble2"></i></span>
                </div>
                <div class="clearfix"></div>
            </div>
        </article>
    <?php endwhile; ?>
    
    <?php 
    wp_reset_postdata();
else : ?>
    <p><?php _e('Lo sentimos, no hay mensajes que coincidan con sus criterios.'); ?></p>
<?php endif; ?>
