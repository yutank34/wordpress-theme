<?php add_filter('wp_head', function () {
?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/accordion.js"></script>
<?php
});
?>
<?php
function get_accordion($category_name, $by_tags, $is_open)
{
	echo '<div class="accordion-container">';
	$tags = ['list'];
	if ($by_tags) {
		$tags = get_tags(array('orderby' => 'description', 'order' => 'desc'));
	} else {
		$tags = get_tags(array('slug' => 'list'));
	}
	$isFirst = $is_open;
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
				echo '<li class="list__link">';
				if ($tax_post->post_content == NULL) {
					echo '<p>' . $index++ . '.&nbsp;' . $tax_post->post_title . '</p>';
				} else {
					echo $index++ . '.&nbsp;<a href="' . get_permalink($tax_post->ID) . '" class="a--underline">' . $tax_post->post_title . '</a>';
				}
				echo '</li>';
			}
			echo '</ul>';
		}
	}
	echo '</div>';
}
?>


<!-- ここから画面描画 -->
<?php get_header(); ?>
<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">
					<h1 class="page-title wrap" itemprop="headline"><?php the_title(); ?></h1>
				</header>
				<div class="wrap">
					<div class="entry-content cf" itemprop="articleBody">
						<?php
						// the content (pretty self explanatory huh)
						the_content();
						?>
					</div>
					<div>
						<?php
						$tax_posts = get_posts(array(
							'post_type' => 'obog',
							'posts_per_page' => -1, // 表示させたい記事数
						));
						if ($tax_posts) : ?>
							<div class="wrap">
								<div>
									<h2>卒業生</h4>
								</div>
								<ul class="top-news--list__ul">
									<?php foreach ($tax_posts as $tax_post) : ?>
										<li class='list__link top-news--list__li'>
											<?php
											if ($tax_post->post_content == NULL) {
												echo '<p>○&nbsp;' . $tax_post->post_title . '</p>';
											} else {
												echo '○&nbsp;<a href="' . get_permalink($tax_post->ID) . '" class="a--underline">' . $tax_post->post_title . '</a>';
											}
											?>
										</li>
									<?php endforeach;
									wp_reset_postdata(); ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</article>
	<?php endwhile;
	endif; ?>
</main>
<?php get_footer(); ?>