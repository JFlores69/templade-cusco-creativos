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

</section>


<?php
get_footer();
?>