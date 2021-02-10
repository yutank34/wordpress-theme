<?php add_filter('wp_head', function () {
?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/html/top/style.css">
<?php
});
?>

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
		<section class="slider">
        <figure>
            <img src="https://image.shutterstock.com/z/stock-photo-medicine-doctor-and-robotics-research-and-analysis-diagnose-checking-coronavirus-or-covid-1673968429.jpg" alt="" width="1024" height="500">
            <div>
                <h1>hoaaaaa</h1>
                <p>aaaaaaaaaaaaaaaaaaaaa</p>
            </div>
        </figure>
    </section>
	<section class="box-container">
            <h2>ボックスコンテナ</h2>
            <ul>
                <li>
                    <section class="box-description">
                        <header>タイトル</header>
                        <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    </section>
                </li>
                <li>
                    <section class="box-description">
                        <header>タイトル</header>
                        <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    </section>
                </li>
                <li>
                    <section class="box-description">
                        <header>タイトル</header>
                        <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    </section>
                </li>
            </ul>
        </section>
		</main>
	</div>

</div>
<?php get_footer(); ?>