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
	<div class="wrap">
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
<div id="content">
	<section class="slider">
		<figure>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/slide.jpg" alt="" width="1024" height="500">
			<div>
				<h1>公衆衛生・疫学研究室</h1>
			</div>
		</figure>
	</section>
	<div id="inner-content" class="cf">
		<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
			<section>
				<div class="wrap box-container">
					<h2>薬と患者をとりまく社会に関する研究・教育活動の実施</h2>
					<ul>
						<li class="box-description">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/icon_pc.png">
							<p class="box-title">薬剤疫学研究</p>
							<p>医薬品の適正使用や副作用リスクを評価する研究</p>
						</li>
						<li class="box-description">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/icon_economy.png">
							<p class="box-title">薬剤経済学研究</p>
							<p>医療の費用対効果や患者QOLを取り扱う研究</p>
						</li>
						<li class="box-description">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/icon_health.png">
							<p class="box-title">ヘルスサービス研究</p>
							<p>医療機関や地域で活躍する薬剤師の役割を考える研究</p>
						</li>
					</ul>
				</div>
			</section>
			<section class="back-color">
				<div class="wrap box-container discription">
					<p>公衆衛生・疫学研究室では、薬と患者をとりまく社会に関する研究を行っています。適切かつ効率的な薬物治療は薬と患者の関係だけでなく、それを取り巻く医療環境である社会全体を理解することが大切です。そのため、医薬品の適正使用や副作用リスクを評価する「薬剤疫学」、医療の費用対効果や患者QOLを取り扱う「薬剤経済学」、医療機関や地域で活躍する薬剤師の役割を考える「ヘルスサービス研究」を3つの柱として研究・教育活動を行ってます。薬物治療に関連した情報を「つくり」「つたえ」「つかう」ことは、薬剤師・薬学教育の中で重要になってきています。</p>
				</div>
			</section>
			<section>
				<div class="wrap box-container">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/labo-description.jpg">
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>