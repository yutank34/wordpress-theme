<?php get_header(); ?>
<main id="main" class="m-all t-2of3 wrap cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">

					<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

				</header> <?php // end article header 
							?>

				<section class="entry-content cf" itemprop="articleBody">
					<?php
					// the content (pretty self explanatory huh)
					the_content();
					?>
				</section>
				<section>
					<h2>get_post_types</h2>
					<?php
					$post_types = get_post_types('', 'names');
					foreach ($post_types as $post_type) {
						echo '<p>' . $post_type . '</p>';
					}
					?>

					<h2>get_taxonomies</h2>
					<?php
					$taxonomies = get_taxonomies();
					foreach ($taxonomies as $taxonomy) {
						echo '<p>' . $taxonomy . '</p>';
					}
					?>

					<h2>get_terms</h2>
					<?php
					$terms = get_terms('details');
					if (!empty($terms) && !is_wp_error($terms)) {
						echo '<ul>';
						foreach ($terms as $term) {
							echo '<li>' . $term->name . '</li>';
						}
						echo '</ul>';
					}
					?>
					<?php comments_template(); ?>
			<?php endwhile;
	endif; ?>
				</section>
				<?php // end article section 
				?>
			</article>
</main>
<?php get_footer(); ?>