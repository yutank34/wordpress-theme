<?php add_filter('wp_head', function () {
?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/html/accordion/accordion.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/html/accordion/accordion.js"></script>
<?php
});
?>

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
        		<div class="accordion__container">
				<?php
				$tags = get_tags(array('orderby' => 'name', 'order' => ''));
				$isFirst = true;
				foreach ( $tags as $tag ): ?>
					<?php
					$tax_posts = get_posts( array(
						'post_type' => 'post',
						'posts_per_page' => -1, // 表示させたい記事数
						'tax_query' => array(
							array(
							'taxonomy' => 'post_tag',
							'terms' => array( $tag->name ),
							'field' => 'slug'
							)
						)
					));
					if( $tax_posts ) :	
						$titleArgs = 'accordion__title js-accordion-title';
						$contentsArgs = 'accordion__content margin0';
						if ($isFirst) {
							$titleArgs = $titleArgs.' is-active';
							$contentsArgs = $contentsArgs.' is-open';
						}
						$isFirst = false
				?>
					<h4 class="<?php echo $titleArgs; ?>"><?php echo $tag->name ?></h4>
					<ul class="<?php echo $contentsArgs; ?>">
						<?php foreach($tax_posts as $tax_post): ?>
							<li>
								<a href="<?php echo get_permalink($tax_post->ID); ?>"><?php echo get_the_title($tax_post->ID); ?></a>
							</li>
						<?php endforeach; wp_reset_postdata(); ?>
					</ul>
				<?php
				endif;
				endforeach;
				?>
        		</div><!-- accordion__container -->
      		</section><!-- /.accordion -->
		</article>
	<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>