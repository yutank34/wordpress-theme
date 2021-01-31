<?php get_header(); ?>
	<?php
		$tax_posts = get_posts(array(
			'post_type' => 'news',
			'posts_per_page' => -1, // 表示させたい記事数
		));
		if ($tax_posts) : ?>
			<div>
				<ul class="margin0">
					<?php foreach ($tax_posts as $tax_post) : ?>
						<li>
							<a href="<?php echo get_permalink($tax_post->ID); ?>"><?php echo get_the_title($tax_post->ID); ?></a>
						</li>
					<?php endforeach;
					wp_reset_postdata(); ?>
				</ul>
			</div>
	<?php endif; ?>
</div>

<div id="content">

	<div id="inner-content" class="wrap cf">

		<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
		</main>
	</div>

</div>
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

<?php get_footer(); ?>