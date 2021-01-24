<?php add_filter( 'wp_head', function() {
    ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/html/tab/tab.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/html/tab/tab.js"></script>
    <?php
} );
?>

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
				<section>
					<div class="tab-panel">
						<!--タブ-->
						<ul class="tab-group">
							<li class="tab tab-A is-active">Tab-A</li>
							<li class="tab tab-B">Tab-B</li>
							<li class="tab tab-C">Tab-C</li>
						</ul>

						<!--タブを切り替えて表示するコンテンツ-->
						<div class="panel-group">
							<div class="panel tab-A is-show">Content-A</div>
							<div class="panel tab-B">Content-B</div>
							<div class="panel tab-C">Content-C</div>
						</div>
					</div>
				</section>
				<?php // end article section 
				?>
			</article>
</main>
<?php get_footer(); ?>