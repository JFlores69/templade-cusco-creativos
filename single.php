<?php
get_header();
?>
<<section class="tada-container content-posts post post-full-width">
    <!-- CONTENT -->
    <div class="content col-xs-12">
        <article>
            <?php
            get_template_part('template-parts/content', 'article');
            ?>

            <!-- RELATED POSTS -->
            <div class="related-posts">
                <h2>Otros Articulos</h2>
                <div class="related-item-container">
                    <?php
                    get_template_part('template-parts/related-posts');
                    ?>
                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- COMMENTS -->
            <div class="comments">
                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
            </div>
        </article>


    </div>
    </section>

    <?php
    get_footer();
    ?>