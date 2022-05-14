<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
    <section class="single-product-container relative flex flex-col lg:gap-1 w-full lg:my-6">
        <div class="hidden lg:block breadcrumb-bg w-1/2 h-20 absolute top-0 right-0"></div>
        <?php
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action( 'woocommerce_before_main_content' );
        ?>

            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                <?php wc_get_template_part( 'content', 'single-product' ); ?>

            <?php endwhile; // end of the loop. ?>

        <?php
            /**
             * woocommerce_after_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
        ?>
    </section>
    <section class="relative product-details-table container m-auto flex flex-col gap-6">
        <span class="product-details-table_title fa-font-bold">مشخصات محصول</span>
        <form class="w-full">

        </form>
        <table class="w-full">
            <tr class="table_header fa-font-semibold text-lg hidden md:table-row">
                <th class="pr-20 text-right">نوع مشخصات</th>
                <th class="text-right">مشخصات محصول</th>
                <th class="pl-20 text-left">محصولات مشابه</th>
            </tr>
            <?php 
            $taxonomyArray = array(
                'producer'=>'تولیدکننده',
                'product_classification'=>'دسته‌بندی محصول',
                'rohs'=>'RoHS',
                'technology'=>'تکنولوژی',
                'mounting_style'=>'Mounting Style',
                'packing'=>'بسته‌بندی',
                'pole_of_the_transistor'=>'قطب ترانزیستور',
                'number_of_channels'=>'تعداد کانال',
                'vds'=>'Vds',
                'id'=>'Id',
                'rds_on'=>'Rds On',
                'vgs'=>'Vgs',
                'gate_charge'=>'شارژ دروازه',
                'min_operating_temperature'=>'حداقل دمای عملیاتی',
                'max_operating_temperature'=>'حداکثر دمای عملیاتی',
                'energy_loss'=>'اتلاف انرژی',
                'package_type'=>'نوع بسته‌بندی',
                'channel_mode'=>'حالت کانال',
                'brand'=>'برند',
                'configuration'=>'پیکربندی',
                'height'=>'ارتفاع',
                'length'=>'طول',
                'type_of_product'=>'نوع محصول',
                'company_packaging'=>'مقدار بسته‌‌بندی شرکت',
                'subcategory_categorization'=>'زیرشاخه دسته‌بندی',
                'transistor_type'=>'نوع ترانزیستور',
                'width'=>'عرض',
                'part_aliases'=>'Part # Aliases',
                'unit_width'=>'عرض یونیت'
            );
            foreach( $taxonomyArray as $tax => $taxName){
                $terms = get_the_terms( $post->ID , $tax); 
                foreach ( $terms as $term ) {?>
                    <tr class="h-12 text-base fa-font-medium">
                        <td class="text-left table-cell md:hidden"><input class="similar-product-checkbox" type="checkbox" id="<?php echo $tax;?>" name="<?php echo $tax;?>" value="<?php echo $term -> slug;?>"></td>
                        <td class="pr-4 md:pr-20 text-right"><?php echo $taxName;?></td>
                        <td class="text-right" style="direction:ltr;"><?php echo $term -> name;?></td>
                        <td class="pl-32 text-left hidden md:table-cell"><input class="similar-product-checkbox" type="checkbox" id="<?php echo $tax;?>" name="<?php echo $tax;?>" value="<?php echo $term -> slug;?>"></td>
                    </tr>
                <?php } 
            }?>
        </table>
    </section>
    <section class="container m-auto extended-btn-container">
            <div class="w-full py-6 flex flex-col sm:flex-row justify-between items-center px-10">
                <div class="result-container hidden md:flex justify-between items-center gap-1 px-3 py-2 text-xs">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="11" fill="#3AB838"/>
                        <path d="M7.14701 15.0824C7.37978 15.3665 7.66112 15.5943 7.97401 15.752C8.28691 15.9097 8.62487 15.9941 8.96744 16H9.01211C9.34785 16.0012 9.68046 15.9271 9.99065 15.782C10.3008 15.6368 10.5824 15.4234 10.819 15.1543L16.6011 8.62146C16.8561 8.33391 16.9996 7.94366 17 7.53657C17.0004 7.12947 16.8576 6.73888 16.6031 6.45072C16.3486 6.16256 16.0032 6.00043 15.6429 6C15.2826 5.99957 14.9369 6.16087 14.6818 6.44843L9.01482 12.862L7.34462 10.8373C7.09945 10.5406 6.76001 10.3661 6.40097 10.3522C6.04193 10.3383 5.69271 10.4861 5.43012 10.7631C5.16754 11.0402 5.01311 11.4237 5.0008 11.8293C4.98849 12.235 5.11931 12.6296 5.36448 12.9262L7.14701 15.0824Z" fill="white"/>
                    </svg>
                    <span>0</span>
                    <span>محصول مشابه یافت شد.</span>
                    <a href="/" class="text-xs fa-font-medium">نمایش</a>
                </div>
                <button id="extendedProductDetails" class="mb-6 sm:mb-0">بیشتر<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.76225 5.25L-0.000889319 1.2086e-07L9.52539 9.53674e-07L4.76225 5.25Z" fill="#41C363"/></svg></button>
                <a  class="show-result text-sm fa-font-semi-bold py-2 px-8">نمایش محصولات مشابه</a>
            </div>
    </section>
    <div id="resultShowMe">
        <?php 
        $showAjaxData = $_POST['myData'];
        echo $showAjaxData;
        ?>
    </div>
    <section class="relative related-products container m-auto flex flex-col gap-6 mb-10 lg:mb-24">
        <span class="related-products_title fa-font-bold">محصولات مشابه</span>
        <div class="relative w-full">
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 8,
            );
            $loop = new WP_Query( $args );?>
            <?php if($loop -> have_posts()):?>
                <div class="swiper-container related-products_slider fa-font-bold pl-16 lg:pl-0">
                    <div class="swiper-wrapper">
                        <?php while($loop -> have_posts()): $loop -> the_post();
                            global $product;?>
                            <a href="<?php echo get_the_permalink();?>" class="w-1/5 swiper-slide flex flex-col justify-between">
                                <div class="w-full h-16 lg:h-32 flex justify-center items-center mb-4">
                                    <?php echo woocommerce_get_product_thumbnail();?>
                                </div>
                                <span class="text-xs lg:text-sm text-black font-bold text-left"><?php echo get_the_title();?></span>
                                <?php if ( $price_html = $product->get_price_html() ) : ?>
                                    <span class="text-xs text-left">:As Low As</span>
                                    <span class="related-products_slider_price text-xs"><?php echo $price_html;?></span>
                                <?php endif;?>
                            </a>
                        <?php endwhile;?>
                    </div>
                </div>
            <?php endif;?>
            <?php wp_reset_query();?>
            <div class="swiper-button-next related-products_slider-button-next"></div>
            <div class="swiper-button-prev related-products_slider-button-prev"></div>
        </div>
    </section>
<?php
get_footer( 'shop' );?>
<?php
function get_ajax_posts() {
    // Query Arguments
    $args = array(
        'post_type' => array('products'),
        'post_status' => array('publish'),
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'producer',
                'field' => 'slug',
                'terms' => 'infineon'
            ),
            array(
                'taxonomy' => 'product_classification',
                'field' => 'slug',
                'terms' => 'mosfet'
            )
        ),
        'nopaging' => true,
        'order' => 'DESC',
        'orderby' => 'date',
    );

    // The Query
    $ajaxposts = get_posts( $args ); // changed to get_posts from wp_query, because `get_posts` returns an array

    echo json_encode( $ajaxposts );

    exit; // exit ajax call(or it will return useless information to the response)
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');?>
<script>
    jQuery('.show-result').click(function () {
				jQuery.ajax({
					url: '/assets/js/custom/similar-product-ajax.php',
					type: "POST",
					data: {myData:"test"},
					success: function( result ) {
						alert(result);
					}
				})
			});
   
</script>
<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
