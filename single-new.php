<?php /* Template Name: single-news signalkala */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
$headImg = get_the_post_thumbnail_url();
$headTitle = get_the_title();
$date = jdate('Y/m/j');
?>
<main>
    <section class="single-news_section w-full " data-scroll-section>
        <img class="single-news_section_headimg w-full my-12 object-cover object-center" src="<?php echo $headImg;?>">
        <div class="container m-auto w-full grid grid-cols-12 col-gap-2">
            <div class="col-start-2 md:col-start-3 xxl:col-start-4 col-span-10 md:col-span-8 xxl:col-span-6 h-full">
                <div class="flex justify-between items-center w-full my-10">
                    <h2 class="text-xl text-text-500 font-bold"><?php echo $headTitle;?></h2>
                    <h4 class="text-xs text-secondary-700 ml-2"><?php echo $date;?></h4>
                </div>
                <div class="justify-center items-center w-full pb-8 border-b border-text-500">
                    <?php the_content();?>
                </div>
                <div class="navigation flex justify-between items-center text-text-700 text-base font-bold my-8">
                    <?php previous_post_link('%link', __( '<span class="meta-nav flex justify-center items-center"><svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="15.658" height="15.814" viewBox="0 0 15.658 15.814">
  <path id="Path_44" data-name="Path 44" d="M-112.034,343.843l-1.319,1.416,5.941,5.523h-11.776v1.934h11.781l-5.946,5.525,1.319,1.416,8.5-7.906Z" transform="translate(119.188 -343.844)" fill="#6d6e70"/>
</svg> خبر بعدی
</span>  ' ) ); ?>
                    <?php next_post_link('%link', __( '<span class="meta-nav flex justify-center items-center">خبر قبلی<svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="15.658" height="15.814" viewBox="0 0 15.658 15.814">
  <path id="Path_47" data-name="Path 47" d="M-112.034,343.843l-1.319,1.416,5.941,5.523h-11.776v1.934h11.781l-5.946,5.525,1.319,1.416,8.5-7.906Z" transform="translate(-103.53 359.658) rotate(180)" fill="#6d6e70"/>
</svg>
</span>  ' ) ); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>