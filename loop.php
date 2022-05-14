<?php /* Template Name: loop signalkala */ ?>

<div class="loop-category">
     <?php if (have_posts()): while (have_posts()) : the_post();?>
    <!-- article -->
    <!-- use this syntax when we wanna show posts in archive -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="w-full">
        <a href="<?php the_permalink();?>">
        </a>
    </article>
    <?php endwhile;?>
    <!-- /article -->
    <?php else: ?>
    <!-- article -->
    <article class="grid grid-cols-12 col-gap-2 w-full"data-scroll-section>
        <div class="map-site-calculater col-span-10 col-start-2 lg:grid grid-cols-8">
            <span class="w-full lg:col-span-8" >
                <h2><?php _e( 'برای جستجوی شما نتیجه ای یافت نشد.', 'signalkalaTheme' ); ?></h2>
            </span>
        </div>
    </article>
    <!-- /article -->
    <?php endif; ?>
</div>