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
	<div class="slider">
		<figure class="slider__figure">
			<!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/slide.jpg" alt="" width="1024" height="500"> -->
			<img src="<?php echo get_template_directory_uri(); ?>/assets/slide.jpg" alt="" class="slider__figure--image">
			<div class="slider__figure--text-wrapper wrap">
				<h1 class="slider__figure--text">公衆衛生・疫学研究室</h1>
			</div>
		</figure>
	</div>
	<div id="inner-content" class="cf">
		<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
			<div class="box-container">
				<div class="wrap">
				<h3 class="box-container__header">薬と患者をとりまく社会に関する研究・教育活動の実施</h2>
					<ul class="inner-items">
						<li class="inner-items__item">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/icon_pc.png" class="inner-items__item--icon">
							<p class="inner-items__item--title">薬剤疫学研究</p>
							<p class="inner-items__item--discription">医薬品の適正使用や副作用リスクを評価する研究</p>
						</li>
						<li class="inner-items__item">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/icon_economy.png" class="inner-items__item--icon">
							<p class="inner-items__item--title">薬剤経済学研究</p>
							<p class="inner-items__item--discription">医療の費用対効果や患者QOLを取り扱う研究</p>
						</li>
						<li class="inner-items__item">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/icon_health.png" class="inner-items__item--icon">
							<p class="inner-items__item--title">ヘルスサービス研究</p>
							<p class="inner-items__item--discription">医療機関や地域で活躍する薬剤師の役割を考える研究</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="background-color--salmon box-container">
				<div class="wrap  box-container__text--discription">
					<p>公衆衛生・疫学研究室では、薬と患者をとりまく社会に関する研究を行っています。適切かつ効率的な薬物治療は薬と患者の関係だけでなく、それを取り巻く医療環境である社会全体を理解することが大切です。そのため、医薬品の適正使用や副作用リスクを評価する「薬剤疫学」、医療の費用対効果や患者QOLを取り扱う「薬剤経済学」、医療機関や地域で活躍する薬剤師の役割を考える「ヘルスサービス研究」を3つの柱として研究・教育活動を行ってます。薬物治療に関連した情報を「つくり」「つたえ」「つかう」ことは、薬剤師・薬学教育の中で重要になってきています。</p>
				</div>
			</div>
			<div class="box-container">
				<div class="wrap">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/labo-description.jpg" class="box-container__image--large">
				</div>
			</div>
			<div class="background-color--salmon box-container navi">
				<div class="wrap">
					<ul class="inner-items">
						<li class="inner-items__submenu">
							<a href="<?php echo home_url(); ?>/labo">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/about_labo.jpg" alt="" class="inner-items__submenu--image">
								<p class="inner-items__submenu--text">研究室の紹介</p>
							</a>
						</li>
						<li class="inner-items__submenu">
							<a href="<?php echo home_url(); ?>/researchs">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/stock-photo-book-in-library-with-open-textbook-education-learning-concept-1274296330.jpg" alt="" class="inner-items__submenu--image">
								<p class="inner-items__submenu--text">研究内容の紹介</p>
							</a>
						</li>
						<li class="inner-items__submenu">
							<a href="<?php echo home_url(); ?>/works">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/stock-photo-speaker-giving-a-talk-in-conference-hall-at-business-event-audience-at-the-conference-hall-1117902230.jpg" alt="" class="inner-items__submenu--image">
								<p class="inner-items__submenu--text">研究業績の紹介</p>
							</a>
						</li>
						<li class="inner-items__submenu">
							<a href="<?php echo home_url(); ?>/links">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/stock-photo-smart-city-and-iot-internet-of-things-concept-ict-information-communication-technology-1160793658.jpg" alt="" class="inner-items__submenu--image">
								<p class="inner-items__submenu--text">リンク</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</main>
	</div>
</div>
<?php get_footer(); ?>