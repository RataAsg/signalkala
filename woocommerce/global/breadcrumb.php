<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}?>

<section class="breadcrumb-container container m-auto mt-4 lg:mt-0 h-auto lg:h-20 flex flex-col justify-center">
    <?php 
        if ( ! empty( $breadcrumb ) ) {

        echo $wrap_before;

        foreach ( $breadcrumb as $key => $crumb ) {

            echo $before;

            if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
                echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
            } else {
                echo esc_html( $crumb[0] );
            }

            echo $after;

            if ( sizeof( $breadcrumb ) !== $key + 1 ) {
                echo $delimiter;
            }
        }

        echo $wrap_after;

    }?>
    <?php if(get_field('long_title')):
		$longTitle = get_field('long_title');?>
		<div class="text-white hidden lg:block lg:text-xl xxl:text-2xl z-10">
			<span><?php echo $longTitle;?></span>
		</div>
	<?php endif;?>
</section>

