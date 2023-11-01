<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

            <div class="hero-featured">
                
            </div>

			<div class="products-grid">
			<?php
			$args = array(
				'post_type' => 'product', // Specifies that we want to query WooCommerce products
				'posts_per_page' => 8, // Number of products to display
				'orderby' => 'date', // Order by date
				'order' => 'desc', // Sort in descending order (latest first)
			);

			$products = new WP_Query($args);

			if ($products->have_posts()) :
				while ($products->have_posts()) : $products->the_post();
					global $product;
					// Display product information as needed
					?>
					<div class="product">
						<?php
						echo woocommerce_get_product_thumbnail();
						echo '<div class="productCard-details">';
						echo '<h2>' . get_the_title() . '</h2>';
						echo '<span class="price">' . $product->get_price_html() . '</span>';
						echo '</div>';
						echo '<a class="btn addToCart" href="' . get_permalink() . '">Add to Cart</a>';
						
						// Additional product data can be displayed here
						?>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo 'No products found';
			endif;
			?>

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>