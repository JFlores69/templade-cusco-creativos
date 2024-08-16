<?php
get_header();
?>
<section class="tada-container content-posts blog-1-column">
    <!-- CONTENT -->
    <div class="content col-xs-12">
        <?php
        // Carga el contenido de las entradas desde template-parts/post-home.php
        get_template_part('template-parts/post', 'home');
        ?>
    </div>




    <div class="clearfix"></div>


    </div><!-- #CONTENT -->

    <article class="content px-3 py-5 p-md-5">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>
    </article>
</section>


<?php
get_footer();
?>