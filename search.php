<?php get_header();
$q = new WP_Query("s=$s&showposts=0");?>
<main>
<div class="map-title-container w-full flex justify-start items-center" data-scroll-section>
    <div class="relative flex flex-row items-start justify-start text-right map-title mr-2">
            <?php
            if ( apply_filters( 'wpml_is_rtl', Null) ) {
            echo sprintf( __( 'نمایش نتایج جستجو : ', 'signalkalaTheme' ), $q->found_posts ); echo get_search_query();
            } else {
            echo '';
            } ?>
    </div>
</div>
<div class="c-category-news">
    <!-- Category content start -->
    <section class="news-section my-8 md:my-14" data-scroll-section>
        <?php get_template_part('loop'); ?>
    </section>

    <!-- Category content end -->
</div>
</main>
<?php get_footer(); ?>
