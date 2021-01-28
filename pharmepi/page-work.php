<?php add_filter('wp_head', function () {
?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/html/accordion/accordion.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/html/accordion/accordion.js"></script>
<?php
});
?>
<?php
				function get_accordion($category_name, $by_tags) {
					echo '<div class="accordion__container">';
					$tags = [ 'list' ];
					if ($by_tags) {
						$tags = get_tags(array('orderby' => 'name', 'order' => ''));
					} else {
						$tags = get_tags(array('slug' => 'list'));
					}
					$isFirst = true;
					foreach ( $tags as $tag ) {
						$tax_posts = get_posts( array(
							'post_type' => 'post',
							'posts_per_page' => -1, // 表示させたい記事数
							'category_name' => $category_name,
							'tax_query' => array(
								array(
								'taxonomy' => 'post_tag',
								'terms' => array( $tag->slug ),
								'field' => 'slug'
								)
							)
						));
						if( $tax_posts ) {
							$titleArgs = 'accordion__title js-accordion-title';
							$contentsArgs = 'accordion__content margin0';
							if ($isFirst) {
								$titleArgs = $titleArgs.' is-active';
								$contentsArgs = $contentsArgs.' is-open';
							}
							$isFirst = false;
						echo '<h4 class="'.$titleArgs.'">'.$tag->name.'</h4>';
						echo '<ul class="'.$contentsArgs.'">';
							foreach($tax_posts as $tax_post) {
								echo '<li><a href="'.get_permalink($tax_post->ID).'">'.get_the_title($tax_post->ID).'</a></li>';
							}
						echo '</ul>';
						}
					}
				echo '</div>';
				}
				?>


<!-- ここから画面描画 -->
<?php get_header(); ?>
<main id="main" class="m-all t-2of3 wrap cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="article-header">
				<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			</header>

			<section class="entry-content cf" itemprop="articleBody">
				<?php
				// the content (pretty self explanatory huh)
				the_content();
				?>
			</section>
			<section class="accordion">
				<h3>原著論文</h3>
        		<?php get_accordion('paper', true); ?>
			</section>
			<section class="accordion">
				<h3>学会発表</h3>
				<?php get_accordion('conference-presentation', true); ?>
			</section>
			<section class="accordion">
				<h3>その他講演</h3>
				<?php get_accordion('other-presentation', false); ?>
			</section>
			<section class="accordion">
				<h3>出版物</h3>
				<?php get_accordion('publication', false); ?>
      		</section>
		</article>
	<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>