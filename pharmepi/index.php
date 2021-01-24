<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
						</main>
				</div>

			</div>
			<h2>get_post_types</h2>
			<?php
				$post_types = get_post_types( '', 'names' ); 
				foreach ( $post_types as $post_type ) {
					echo '<p>' . $post_type . '</p>';
				}
			?>

			<h2>get_taxonomies</h2>
			<?php
				$taxonomies = get_taxonomies(); 
				foreach ( $taxonomies as $taxonomy ) {
					echo '<p>' . $taxonomy . '</p>';
				}
			?>

<?php get_footer(); ?>
