<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<form class="cart flex flex-wrap col-span-2" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<div class="w-1/2 flex flex-col pl-2 pt-5 pr-6 pb-6">
			<span style="color:#484747;">تعداد</span>
			<?php
			do_action( 'woocommerce_before_add_to_cart_quantity' );

			woocommerce_quantity_input(
				array(
					'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
					'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
					'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				)
			);

			do_action( 'woocommerce_after_add_to_cart_quantity' );
			?>
			<div class="w-full p-3 flex flex-col gap-1" style="background-color:#D3EBFD;">
				<div class="w-full flex flex-row justify-between items-center">
					<span>حداقل سفارش:</span>
					<span class="amount">1</span>
				</div>
				<div class="w-full flex flex-row justify-between items-center">
					<span>مضرب:</span>
					<span class="amount">1</span>
				</div>
			</div>
		</div>
		<div class="price-conatiner w-1/2 pr-2 pt-3 pl-3 pb-3">
			<div class="price-conatiner_content w-full h-full p-4 flex flex-col items-center">
				<div class="w-full flex flex-col gap-2">
					<span style="color:#484747;">مجموع</span>
					<div class="w-2/3 flex flex-row justify-between items-center self-end">
						<p class="price"></p>
						<span>تومان</span>
					</div>
				</div>
				<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
			</div>
		</div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
