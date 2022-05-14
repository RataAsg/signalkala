<?php /* Template Name: tag signalkala */ ?>
<?php get_header(); ?>

<main class="c-single-news w-full container m-auto relative flex flex-col py-6">
    <section class="flex items-center pt-24 my-4 w-full">
        <span class="title-span"></span>
        <h2 class="text-xl text-text-700 font-semibold">
            <?php _e( 'دسته‌بندی : ', 'signalkalaTheme' ); echo single_tag_title('', false); ?></h2>
    </section>
    <section class="container m-auto grid grid-cols-4 grid-rows-1 py-10">
        <!-- Tag content start -->
        <div class="w-full col-span-3 pl-10">
            <?php if (have_posts()) : while (have_posts()) : the_post();
$headImg = get_the_post_thumbnail_url();
$date = get_the_date();
$cmNumber = get_comments_number();
?>
            <a href="<?php the_permalink();?>" class="flex flex-col">
                <div class="flex items-center w-full">
                    <h4 class="text-xs text-text-500 ml-1">تاریخ انتشار:</h4>
                    <h4 class="text-xs text-secondary-700 ml-2"><?php echo $date;?></h4>
                    <h4 class="text-xs text-text-500 ml-1">نظرات:</h4>
                    <h4 class="text-xs text-secondary-700 "><?php echo $cmNumber;?> نظر</h4>
                </div>
                <div class="flex flex-col w-full border-b border-text-200">
                    <img src="<?php echo $headImg;?>" class="w-full h-64 my-6">
                    <div class="text-text-500 text-sm text-justify w-full"><?php the_content();?></div>
                    <div class="c-single-news__tags flex w-full my-10">
                        <!-- get tags for post  get_the_tag_list( $before, $sep, $after, $id ) , example: get_the_tag_list('<p>Tags: ',', ','</p>') -->
                        <?php
echo get_the_tag_list();
?>
                    </div>
                </div>
            </a>

            <?php endwhile; ?>
            <?php endif; ?>
            <?php get_template_part('pagination'); ?>
        </div>
        <!-- Tag content end -->
        <!-- Sidebar start -->
        <div class="w-full col-span-1">
            <?php get_sidebar(); ?>
        </div>
        <!-- Sidebar end -->
    </section>

</main>


<?php get_footer(); ?>