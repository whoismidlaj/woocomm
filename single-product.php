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

            <div class="woo-product-single">
                <div class="woo-product-single-image">
                    <?php
                    global $product;

                    if (has_post_thumbnail($product->get_id())) {
                        echo get_the_post_thumbnail($product->get_id(), 'full'); // 'full' is the image size, you can change it to another registered image size.
                    } else {
                        echo wc_placeholder_img(); // Display a placeholder image if no product image is set.
                    }
                    ?>
                </div>
                
                <?php
                global $product;

                if ( is_a( $product, 'WC_Product' ) ) {
                    echo '<h1 class="product_title">' . get_the_title() . '</h1>';
                }
                ?>

                <!-- <a href="/cart"><i class="fa-sharp fa-regular fa-heart"></i></a> -->

                <?php
                global $product;

                if ( is_a( $product, 'WC_Product' ) ) {
                    // Display the Add to Cart button.
                    echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                        sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button woo-add-to-cart-single %s product_type_%s">%s</a>',
                            esc_url( $product->add_to_cart_url() ),
                            esc_attr( $product->get_id() ),
                            esc_attr( $product->get_sku() ),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            esc_attr( $product->get_type() ),
                            esc_html( $product->add_to_cart_text() )
                        ),
                        $product
                    );
                }
                ?>


            </div>

            

			<?php // wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
