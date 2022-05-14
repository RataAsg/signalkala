<?php get_header(); ?>

<main>

    <section>
        <div>

            <!-- sidebar -->
            <?php get_sidebar(); ?>
            <!-- /sidebar -->

            <div>



                <?php get_template_part('loop'); ?>

                <?php get_template_part('pagination'); ?>


            </div>
            <!-- / c-page-content -->
        </div>
    </section>
</main>

<?php get_footer(); ?>