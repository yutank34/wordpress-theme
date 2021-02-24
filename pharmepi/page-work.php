<?php add_filter('wp_head', function () {
?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/html/accordion/accordion.js"></script>
<?php
});
?>
<?php
function get_accordion($category_name, $by_tags)
{
	echo '<div class="accordion-container">';
	$tags = ['list'];
	if ($by_tags) {
		$tags = get_tags(array('orderby' => 'name', 'order' => ''));
	} else {
		$tags = get_tags(array('slug' => 'list'));
	}
	$isFirst = true;
	foreach ($tags as $tag) {
		$tax_posts = get_posts(array(
			'post_type' => 'post',
			'posts_per_page' => -1, // 表示させたい記事数
			'category_name' => $category_name,
			'tax_query' => array(
				array(
					'taxonomy' => 'post_tag',
					'terms' => array($tag->slug),
					'field' => 'slug'
				)
			)
		));
		if ($tax_posts) {
			$titleArgs = 'accordion-container__title js-accordion-title';
			$contentsArgs = 'accordion-container__content';
			if ($isFirst) {
				$titleArgs = $titleArgs . ' is-active';
				$contentsArgs = $contentsArgs . ' is-open';
			}
			$isFirst = false;
			echo '<h4 class="' . $titleArgs . '">' . $tag->name . '</h4>';
			echo '<ul class="' . $contentsArgs . '">';
			$index = 1;
			foreach ($tax_posts as $tax_post) {
				echo '<li class="list__link">' . $index . '. ' . '<a href="' . get_permalink($tax_post->ID) . '" class="a--underline">' . get_the_title($tax_post->ID) . '</a></li>';
				$index++;
			}
			echo '</ul>';
		}
	}
	echo '</div>';
}
?>


<!-- ここから画面描画 -->
<?php get_header(); ?>
<main id="main" class="m-all t-2of3 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">
					<h1 class="page-title wrap" itemprop="headline"><?php the_title(); ?></h1>
				</header>
				<div class="wrap">
					<section class="entry-content cf" itemprop="articleBody">
						<?php
						// the content (pretty self explanatory huh)
						the_content();
						?>
					</section>
					<section class="accordion-wrapper">
						<h2>原著論文</h2>
						<?php get_accordion('paper', true); ?>
					</section>
					<section class="accordion-wrapper">
						<h2>学会発表</h2>
						<?php get_accordion('conference-presentation', true); ?>
					</section>
					<section class="accordion-wrapper">
						<h2>その他講演</h2>
						<?php get_accordion('other-presentation', false); ?>
					</section>
					<section class="accordion-wrapper">
						<h2>出版物</h2>
						<?php get_accordion('publication', false); ?>
					</section>
				</div>
			</article>
	<?php endwhile;
	endif; ?>
</main>
<?php get_footer(); ?>