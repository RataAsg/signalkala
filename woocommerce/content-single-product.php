<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'container m-auto flex flex-wrap justify-between gap-1', $product ); ?>>
	<div class="w-full lg:w-1/2 flex flex-col">
		<div class="product-detail w-full flex flex-col lg:flex-row lg:py-16">
			<?php if(get_field('general_name')):
				$genaralName = get_field('general_name');?>
				<span class="block lg:hidden product_generalname text-base fa-font-bold mb-3 lg:mb-0"><?php echo $genaralName;?></span>
			<?php endif;?>
			<?php
			/**z
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
			<div class="left-col w-1/2 h-full hidden lg:flex flex-col pl-3">
				<div class="left-col__title-container w-full flex flex-col py-3">
					<span class="product_title text-base fa-font-bold"><?php echo get_the_title();?></span>
					<?php if(get_field('general_name')):
						$genaralName = get_field('general_name');?>
						<span class="product_generalname text-base fa-font-bold"><?php echo $genaralName;?></span>
					<?php endif;?>
				</div>
				<?php if(have_rows('models')):?>
					<div class="left-col__models w-full flex flex-col py-3">
						<div class="w-full flex flex-row items-center gap-1">
							<?php while(have_rows('models')):the_row();
							$modelLogo = get_sub_field('image');
							$modelLink = get_sub_field('link');?>
							<a href="<?php echo $modelLink;?>" class="model-link p-2" alt="<?php echo $modelLogo['alt'];?>">
								<img src="<?php echo $modelLogo['url'];?>" class="object-contain object-center">
							</a>
							<span class="model-seprator"></span>
							<?php endwhile;?>
						</div>

					</div>
				<?php endif;?>
				<?php if(get_field('creator')):
				$creatorName = get_field('creator');?>
					<div class="left-col__creator w-full flex flex-row justify-between py-3">
						<span class="creator-title text-base">نام تولیدکننده:</span>
						<span class="creator-name text-sm fa-font-bold"><?php echo $creatorName;?></span>
					</div>
				<?php endif;?>
				<?php if(get_field('standard_packaging')):
				$standardPackaging = get_field('standard_packaging');?>
					<div class="left-col__standard_packaging w-full flex flex-row justify-between py-3">
						<span class="standard_packaging-title text-base">استاندارد بسته‌بندی:</span>
						<span class="standard_packaging-name text-sm fa-font-bold"><?php echo $standardPackaging;?></span>
					</div>
				<?php endif;?>
			</div>
			<div class="product-detail__bottom-border absolute bottom-0"></div>
		</div>
		<div class="relative product-content w-full flex flex-col py-6 gap-3">
			<span class="product-content_title fa-font-bold mb-3">ویژگی‌های کاربردی</span>
			<div class="product-content_content fa-font-medium text-base"><?php echo get_the_content();?></div>
			<div class="product-detail__bottom-border absolute bottom-0"></div>
		</div>
		<div class="relative left-col w-full h-full flex lg:hidden flex-col pl-3 py-6">
			<div class="left-col__title-container w-full flex flex-col pt-3">
				<span class="product_title text-base fa-font-bold"><?php echo get_the_title();?></span>
			</div>
			<?php if(have_rows('models')):?>
				<div class="left-col__models w-full flex flex-col pb-3">
					<div class="w-full flex flex-row items-center gap-1">
						<?php while(have_rows('models')):the_row();
							$modelLogo = get_sub_field('image');
							$modelLink = get_sub_field('link');?>
							<a href="<?php echo $modelLink;?>" class="model-link p-2" alt="<?php echo $modelLogo['alt'];?>">
								<img src="<?php echo $modelLogo['url'];?>" class="object-contain object-center">
							</a>
							<span class="model-seprator"></span>
						<?php endwhile;?>
					</div>
				</div>
			<?php endif;?>
			<?php if(get_field('creator')):
			$creatorName = get_field('creator');?>
				<div class="left-col__creator w-full flex flex-row py-3 gap-1">
					<span class="creator-title text-base">نام تولیدکننده:</span>
					<span class="creator-name text-sm fa-font-bold"><?php echo $creatorName;?></span>
				</div>
			<?php endif;?>
			<?php if(get_field('standard_packaging')):
			$standardPackaging = get_field('standard_packaging');?>
				<div class="left-col__standard_packaging w-full flex flex-row gap-1 py-3">
					<span class="standard_packaging-title text-base">استاندارد بسته‌بندی:</span>
					<span class="standard_packaging-name text-sm fa-font-bold"><?php echo $standardPackaging;?></span>
				</div>
			<?php endif;?>
			<div class="product-detail__bottom-border block lg:hidden absolute bottom-0"></div>
		</div>
	</div>
	<div class="relative flex flex-col gap-4 summary entry-summary py-6 lg:py-0">
		<div class="entry-summary__first-row w-full px-5 py-3 grid grid-cols-2 gap-y-2 gap-x-5">
			<div class="current-number w-full text-base flex flex-row justify-between items-center">
				<span>
					در حال سفارش
				</span>
				<span class="amount">
					0
				</span>
			</div>
			<div class="china-number w-full text-base flex flex-row justify-between items-center">
				<span>
					موجودی چین
				</span>
				<span class="amount">
					0
				</span>
			</div>
			<div class="store-number w-full text-base flex flex-row justify-between items-center">
				<span>
					انبار شرکت
				</span>
				<span class="amount">
					<?php if($product->get_stock_quantity()):echo $product->get_stock_quantity();?>
					<?php else:?>
						0
					<?php endif;?>
				</span>
			</div>
		</div>
		<div class="entry-summary__second-row w-full grid grid-cols-2 gap-2">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
		<?php if(have_rows('packaging_detail')):?>
			<div class="entry-summary__third-row px-6 py-5 flex flex-col">
				<span class="mb-3">بسته‌بندی</span>
				<?php while(have_rows('packaging_detail')):the_row();
				$quality = get_sub_field('quality');?>
					<div class="quality px-2 py-1 mb-1">
						<span><?php echo $quality;?></span>
					</div>
				<?php endwhile;?>
			</div>
		<?php endif;?>
		<div class="product-detail__bottom-border block lg:hidden absolute bottom-0"></div>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
