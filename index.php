<?php /* Template Name: home-page signalkala */ ?>
<?php get_header();?>
<main role="main">
    <?php if(have_rows('slider')):?>
        <section class="relative slider-container w-full overflow-hidden">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/slidebgstatic.png" class="home-head-slider_backgroung-image w-full h-full absolute object-cover object-center top-0 right-0" width="100%" height="100%" alt="<?php echo $backgroundImage['alt'];?>" title="<?php echo $backgroundImage['title'];?>">
            <div class="slider-container_layer w-full h-full absolute top-0 right-0"></div>
            <div class="relative container m-auto flex flex-col justify-start">
                <div class="c-search w-full flex lg:hidden justify-between items-center h-12 my-12">
                    <input class="w-3/4 h-full bg-transparent px-5 py-3" placeholder="محصول مورد نظر خود را جستجو کنید">
                    <button class="w-10 h-full cursor-pointer flex justify-center items-center">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7082 0.925781C16.4081 0.925781 21.0443 5.56206 21.0443 11.2619C21.0443 13.951 20.0123 16.4037 18.3236 18.2444L21.6466 21.5605C21.9576 21.8715 21.9586 22.3746 21.6477 22.6856C21.4927 22.8427 21.2878 22.9202 21.084 22.9202C20.8813 22.9202 20.6775 22.8427 20.5215 22.6877L17.1583 19.334C15.3892 20.7508 13.146 21.599 10.7082 21.599C5.00843 21.599 0.371094 16.9617 0.371094 11.2619C0.371094 5.56206 5.00843 0.925781 10.7082 0.925781ZM10.7082 2.51791C5.88622 2.51791 1.96322 6.43985 1.96322 11.2619C1.96322 16.0839 5.88622 20.0069 10.7082 20.0069C15.5292 20.0069 19.4522 16.0839 19.4522 11.2619C19.4522 6.43985 15.5292 2.51791 10.7082 2.51791Z" fill="white"/>
                        </svg>
                    </button>
               </div>
                <div class="home-head-slider swiper-container w-full lg:w-5/12">
                    <div class="swiper-wrapper">
                        <?php while(have_rows('slider')):the_row();
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $button = get_sub_field('button');?>
                            <div class="swiper-slide w-full bg-transparent">
                                <?php if($title || $description || $button):?>
                                    <div class="home-head-slider_content h-full">
                                        <div class="w-full h-full flex flex-col justify-start lg:justify-center items-start lg:pb-16">
                                            <?php if($title):?>
                                            <h2 class="text-2xl text-white mb-3 fa-font-bold">
                                                <?php echo $title;?>
                                            </h2>
                                            <?php endif;?>
                                            <?php if($description):?>
                                            <div class="home-head-slider_content_description text-sm text-white my-2">
                                                <?php echo $description;?>
                                            </div>
                                            <?php endif;?>
                                            <?php if($button['title']):?>
                                            <a href="<?php echo $button['link'];?>" class="home-head-slider_content_btn p-2 text-center text-base text-white fa-font-semi-bold self-end mb-2">
                                                <?php echo $button['title'];?>
                                            </a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                        <?php endwhile;?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    <?php endif;?>
    <?php if('slogan'):
        $slogan = get_field('slogan')?>
        <section class="home-slogan-container flex justify-center items-center w-full h-full py-4 text-black text-sm sm:text-base md:text-lg fa-font-medium">
            <span><?php echo $slogan;?></span>
        </section>
    <?php endif;?>
    <?php 
        $orderby = 'name';
        $order = 'asc';
        $hide_empty = false ;
        $cat_args = array(
            'orderby'    => $orderby,
            'order'      => $order,
            'hide_empty' => $hide_empty,
        );
        $product_categories = get_terms( 'product_cat', $cat_args );
    ?>
    <?php if( !empty($product_categories) ){?>
        <section class="home_category-section w-full py-2 lg:py-8 my-2 lg:my-10">
            <div class="container m-auto flex flex-col gap-4">
                <div class="w-full flex flex-col md:flex-row justify-between md:items-center">
                    <span class="text-black text-xl xl:text-2xl mb-4 md:mb-0 fa-font-bold">دسته بندی های محبوب</span>
                    <a href="/" class="hidden md:flex items-center gap-1 text-base text-black p-2 pr-0 sm:pr-2">
                        <span>نمایش همه دسته بندی ها</span>
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 9L1 5L5 1" fill="black"/>
                            <path d="M5 9L1 5L5 1" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                <div class="relative w-full">
                    <div class="home-category-slider swiper-container w-full">
                        <div class="swiper-wrapper">
                            <?php foreach ($product_categories as $category) { ?>
                                <?php $catID = $category->term_id;
                                $thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true );
                                $image = wp_get_attachment_image_src($thumbnail_id, 'product_cat' );
                                ?>
                                <?php if($category):?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo get_term_link($category);?>" class="flex flex-col items-center gap-6 text-base text-black p-2 pr-0 sm:pr-2">
                                            <div class="w-16 xs:w-20 sm:w-24 lg:w-32 h-16 xs:h-20 sm:h-24 lg:h-32">
                                                <img src="<?php echo $image[0]; ?>" alt="<?php echo $category->name; ?>" class="w-full h-full object-contain object-center">
                                            </div>
                                            <span><?php echo $category->name;?></span>
                                        </a>
                                    </div>
                                <?php endif;?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-button-next home-category-button-next"></div>
                    <div class="swiper-button-prev home-category-button-prev"></div>
                </div>
            </div>
        </section>
    <?php } 
    wp_reset_query();?>
    <?php
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
    );
    $loop = new WP_Query( $args );?>
    <?php if($loop -> have_posts()):?>
        <section class="home_bestseller-section w-full py-2 lg:py-8">
            <div class="container m-auto flex flex-row sm:flex-col gap-2">
                <div class="w-full flex flex-col sm:flex-row justify-center sm:justify-between items-center">
                    <span class="text-black text-lg lg:text-2xl fa-font-bold">پرفروش‌ترین محصولات</span>
                    <a href="/" class="flex items-center gap-1 text-sm lg:text-base text-black p-2 pr-0 sm:pr-2">
                        <span>نمایش همه محصولات</span>
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 9L1 5L5 1" fill="black"/>
                            <path d="M5 9L1 5L5 1" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                <div class="relative w-full">
                    <div class="hidden lg:block bestseller-products swiper-container fa-font-bold">
                        <div class="swiper-wrapper py-16 md:py-10">
                            <?php while($loop -> have_posts()): $loop -> the_post();
                            global $product;?>
                            <a href="<?php echo get_the_permalink();?>" class="swiper-slide flex flex-col justify-between">
                                <div class="w-full h-32 flex justify-center items-center">
                                    <?php echo woocommerce_get_product_thumbnail();?>
                                </div>
                                <span class="text-sm text-black font-bold text-left"><?php echo get_the_title();?></span>
                                <?php if ( $price_html = $product->get_price_html() ) : ?>
                                    <span class="text-xs text-left">:As Low As</span>
                                    <span class="bestseller-products_price text-xs"><?php echo $price_html;?></span>
                                <?php endif;?>
                            </a>
                            <?php endwhile;?>
                        </div>
                        <div class="swiper-pagination hidden md:block"></div>
                    </div>
                    <div class="block lg:hidden bestseller-products-mobile swiper-container fa-font-bold pl-16 lg:pl-0">
                        <div class="swiper-wrapper py-4">
                            <?php while($loop -> have_posts()): $loop -> the_post();
                            global $product;?>
                            <a href="<?php echo get_the_permalink();?>" class="swiper-slide flex flex-col justify-between">
                                <div class="w-full h-16 flex justify-center items-center">
                                    <?php echo woocommerce_get_product_thumbnail();?>
                                </div>
                                <span class="text-sm text-black font-bold text-left"><?php echo get_the_title();?></span>
                                <?php if ( $price_html = $product->get_price_html() ) : ?>
                                    <span class="text-xs text-left">:As Low As</span>
                                    <span class="bestseller-products_price text-xs"><?php echo $price_html;?></span>
                                <?php endif;?>
                            </a>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <div class="swiper-button-next bestseller-products-button-next hidden lg:flex"></div>
                    <div class="swiper-button-prev bestseller-products-button-prev hidden lg:flex"></div>
                </div>
            </div>
        </section>
    <?php endif;
    wp_reset_query();?>
    <section class="price-detector w-4/5 xxxl:w-3/5 m-auto flex flex-col items-center py-12">
        <span class="price-detector_title fa-font-medium text-2xl mb-6">قیمت محصول موردنظرتان را از ما استعلام کنید</span>
        <div class="w-full price-detector_container py-4 px-8">
            <span class="fa-font-semi-bold text-sm">
            قطعات موردنظر خود را وارد نموده و در انتها بر روی دکمه ارسال درخواست کلیک نمایید.
            </span>
            <table class="price-detector_table w-full mt-5">
                <tr class="price-detector_table-header fa-font-medium text-sm">
                    <th class="py-2 w-12"></th>
                    <th class="py-2"><div>شماره قطعه</div></th>
                    <th class="py-2"><div>تعداد</div></th>
                    <th class="py-2"><div>برند</div></th>
                    <th class="py-2"><div>قیمت هدف</div></th>
                    <th class="py-2"><div>واحد</div></th>
                    <th class="py-2"><div>توضیحات</div></th>
                    <th class="py-2"><div>دیتاشیت</div></th>
                    <th class="py-2 w-12"></th>
                </tr>
                <tr class="w-full text-base" id="detect1">
                    <td class="relative"><div class="w-full flex justify-center items-center absolute p-2 top-0 right-0 fa-font-bold">1</div></td>
                    <td class="relative"><div class="flex justify-center items-center absolute p-2 top-0 right-0"><input type="text" id="lname" name="lname"></div></td>
                    <td class="relative"><div class="flex justify-center items-center absolute p-2 top-0 right-0"><input type="text" id="lname" name="lname"></div></td>
                    <td class="relative"><div class="flex justify-center items-center absolute p-2 top-0 right-0"><input type="text" id="lname" name="lname"></div></td>
                    <td class="relative"><div class="flex justify-center items-center absolute p-2 top-0 right-0"><input type="text" id="lname" name="lname"></div></td>
                    <td class="relative"><div class="flex justify-center items-center absolute p-2 top-0 right-0"><input type="text" id="lname" name="lname"></div></td>
                    <td class="relative"><div class="flex justify-center items-center absolute p-2 top-0 right-0"><input type="text" id="lname" name="lname"></div></td>
                    <td class="relative"><div class="file-upload w-20 h-10 flex justify-center items-center absolute p-2 top-0"><input type="file" id="lname" name="lname"></div></td>
                    <td class="relative">
                        <div class="absolute delete-icon">
                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.971 1.2161H7.67779V0.887718C7.67779 0.398272 7.28445 0 6.80094 0H5.05629C4.57268 0 4.17929 0.398272 4.17929 0.887769V1.21615H0.886092C0.39751 1.21615 0 1.61031 0 2.09472V2.67524C0 3.03933 0.224507 3.35232 0.543389 3.48545C0.644417 5.49804 1.2291 15.2285 1.25541 15.6658C1.26669 15.8535 1.42222 16 1.61031 16H10.2469C10.435 16 10.5905 15.8535 10.6018 15.6658C10.6281 15.2286 11.2127 5.49804 11.3138 3.48545C11.6327 3.35232 11.8572 3.03933 11.8572 2.67524V2.09467C11.8572 1.61026 11.4597 1.2161 10.971 1.2161ZM4.8904 0.887769C4.8904 0.790347 4.96481 0.711109 5.05629 0.711109H6.80094C6.89237 0.711109 6.96673 0.790347 6.96673 0.887769V1.21615H4.89045V0.887769H4.8904ZM0.711007 2.09467C0.711007 2.00233 0.789534 1.92721 0.885991 1.92721H10.971C11.0674 1.92721 11.146 2.00228 11.146 2.09467V2.67519C11.146 2.76758 11.0674 2.84276 10.971 2.84276H0.886042C0.789585 2.84276 0.711058 2.76764 0.711058 2.67519V2.09467H0.711007ZM9.91189 15.2888H1.94503C1.84065 13.5493 1.36198 5.55305 1.25882 3.55387H10.5981C10.4949 5.55305 10.0163 13.5493 9.91189 15.2888Z" fill="#8C8C8C"/>
                                <path d="M5.92782 4.83154C5.73145 4.83154 5.57227 4.99073 5.57227 5.1871V14.1323C5.57227 14.3287 5.73145 14.4878 5.92782 14.4878C6.12419 14.4878 6.28337 14.3287 6.28337 14.1323V5.1871C6.28337 4.99073 6.12419 4.83154 5.92782 4.83154Z" fill="#8C8C8C"/>
                                <path d="M3.52504 5.18324C3.51478 4.98718 3.34691 4.83596 3.15145 4.84673C2.95539 4.85694 2.80469 5.0242 2.81495 5.22032L3.28133 14.1513C3.29124 14.3411 3.44819 14.4883 3.63608 14.4883C3.64232 14.4883 3.64862 14.4881 3.65492 14.4878C3.85098 14.4776 4.00169 14.3103 3.99143 14.1142L3.52504 5.18324Z" fill="#8C8C8C"/>
                                <path d="M8.7058 4.84679C8.50776 4.83546 8.34248 4.98718 8.33222 5.18329L7.86573 14.1143C7.85547 14.3104 8.00617 14.4776 8.20224 14.4878C8.20858 14.4882 8.21483 14.4884 8.22108 14.4884C8.40891 14.4884 8.56592 14.3412 8.57582 14.1513L9.04231 5.22037C9.05257 5.02426 8.90192 4.857 8.7058 4.84679Z" fill="#8C8C8C"/>
                            </svg>
                        </div>
                    </td>
                </tr>
            </table>
            <button class="add-new-row flex justify-between items-center gap-1 mt-4">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="#05AB6B"/>
                    <path d="M7 3.64014V10.6401" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.5 7H3.5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="fa-font-medium text-xs">افزودن قطعه جدید</span>
            </button>
        </div>
        <button class="price-detector_submit-btn fa-font-medium text-base py-2 px-10 self-end mt-3" type="submit" value="Submit">ارسال درخواست</button>
    </section>
    <?php 
    $latestBlog = new WP_Query(array(
        'posts_per_page' => 6,
        'order'   => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
    ));?>
    <?php if ($latestBlog->have_posts()): ?>
        <section class="latest-blog w-full py-2 lg:py-8">
            <div class="relative container m-auto flex flex-row sm:flex-col gap-4">
                <div class="w-auto sm:w-full flex flex-col sm:flex-row justify-center sm:justify-between sm:items-center">
                    <span class="text-black text-lg lg:text-2xl fa-font-bold">مقالات</span>
                    <a href="/" class="flex items-center gap-1 text-sm lg:text-base text-black p-2 pr-0 sm:pr-2">
                        <span>نمایش همه مقالات</span>
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 9L1 5L5 1" fill="black"/>
                            <path d="M5 9L1 5L5 1" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                <div class="relative w-full">
                    <div class="w-full swiper-container latest-blog-slider pl-16 lg:pl-0">
                        <div class="swiper-wrapper">
                            <?php while ($latestBlog->have_posts()) : $latestBlog->the_post();?>
                                <article id="post-<?php the_ID(); ?>" class="swiper-slide latest-blog-container flex flex-col">
                                    <div class="latest-blog_image w-full h-20 sm:h-24 lg:h-32 xxxxl:h-40 overflow-hidden">
                                        <img src="<?php echo get_the_post_thumbnail_url();?>" class="w-full h-full object-center object-cover">
                                    </div>
                                    <div class="flex flex-col latest-blog_container justify-end">
                                        <div class="latest-blog_title text-sm sm:text-base lg:text-xl my-3">
                                            <?php echo get_the_title();?>
                                        </div>
                                        <span class="latest-blog_date text-sm my-1">
                                            <?php the_date();?>
                                        </span>
                                        <div class="latest-blog_content text-sm lg:text-base my-3">
                                            <?php echo get_the_excerpt();?>
                                        </div>
                                        <a href="<?php echo get_the_permalink();?>" class="latest-blog_link flex items-center gap-1 text-base text-black p-2 pr-0 sm:pr-2">
                                            <span>بیشتر</span>
                                            <svg  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 511.955 511.955" style="enable-background:new 0 0 511.955 511.955;" xml:space="preserve">
                                                <g>
                                                    <path d="M511.813,254.103c-0.96-5.227-5.653-8.853-10.88-8.853H36.293l195.2-195.093c4.053-4.267,3.947-10.987-0.213-15.04
                                                        c-4.16-3.947-10.667-3.947-14.827,0L3.12,248.45c-4.16,4.16-4.16,10.88,0,15.04l213.333,213.333
                                                        c4.267,4.053,10.987,3.947,15.04-0.213c3.947-4.16,3.947-10.667,0-14.827l-195.2-195.2h464.96
                                                        C507.76,266.583,512.88,260.717,511.813,254.103z"/>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            <?php endwhile;?>
                        </div>
                        <!-- <div class="swiper-pagination hidden md:block"></div> -->
                    </div>
                    <div class="swiper-button-next latest-blog-button-next hidden lg:flex"></div>
                    <div class="swiper-button-prev latest-blog-button-prev hidden lg:flex"></div>
                </div>
            </div>
        </section>
    <?php endif;
    wp_reset_query();?>
</main>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".bestseller-products", {
        slidesPerView: 1,
        slidesPerGroup: 1,
        grid: {
          rows: 2,
        },
        spaceBetween: 30,
        pagination: {
          el: ".bestseller-products .swiper-pagination",
          clickable: true,
        },
        navigation: {
            nextEl: '.bestseller-products-button-next',
            prevEl: '.bestseller-products-button-prev',
        },
        breakpoints:{
            640: {
                slidesPerView: 2,
                slidesPerGroup: 2,
                grid: {
                    rows: 2,
                },
            },
            768: {
                slidesPerView: 3,
                slidesPerGroup: 3,
                grid: {
                    rows: 2,
                },
            },
            1024: {
                slidesPerView: 4,
                slidesPerGroup: 4,
                grid: {
                    rows: 2,
                },
            },
            1440: {
                slidesPerView: 5,
                slidesPerGroup: 5,
                grid: {
                    rows: 2,
                },
            },
            1640: {
                slidesPerView: 6,
                slidesPerGroup: 6,
                grid: {
                    rows: 2,
                },
		}
        }
        
    });
</script>
<?php get_footer(); ?>