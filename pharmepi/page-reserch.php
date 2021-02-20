<?php add_filter('wp_head', function () {
?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/html/tab/tab.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/html/tab/tab.js"></script>
<?php
});
?>

<?php get_header(); ?>
<main id="main" class="m-all t-2of3 wrap cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="article-header">
				<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			</header> <?php // end article header ?>

			<section class="entry-content cf" itemprop="articleBody">
				<?php
				// the content (pretty self explanatory huh)
				the_content();
				?>
			</section>
			<section>
				<div class="tab-wrapper">
					<div class="tab-panel">
						<!--タブ-->
						<ul class="tab-group">
							<?php
							$terms = get_terms('research_category', array(
								'parent' => 0, // 親カテゴリのみ抽出
								'orderby' => 'description'
								// 'parent' => $term_id で子タームを抽出できる
							));
							if (!empty($terms) && !is_wp_error($terms)) {
								$isFirst = true;
								foreach ($terms as $term) {
									$classParam = 'tab tab-width tab-' . $term->term_id;
									if ($isFirst) {
										$classParam = $classParam . ' is-active';
									}
									echo '<li class="' . $classParam . '">' . $term->name . '</li>';
									$isFirst = false;
								}
							}
							?>
						</ul>
					</div>
					<!--タブを切り替えて表示するコンテンツ-->
					<div class="panel-group">
						<?php
						$isFirst = true;
						foreach ($terms as $term) :
							$childTerms = get_terms('research_category', array('parent' => $term->term_id, 'hide_empty' => false, 'orderby' => 'description'));
							$panelArgs = 'panel tab-'.$term->term_id;
							if ($isFirst) {
								$panelArgs = $panelArgs.' is-show';
							}
							$isFirst = false
						?>
						<div class="<?php echo $panelArgs; ?>">
							<p><?php echo explode('|||', $term->description, 2)[1]; ?></p>
							<?php 
							foreach ($childTerms as $childTerm) :
								$tax_posts = get_posts( array(
									'post_type' => 'research',
									'posts_per_page' => -1, // 表示させたい記事数
									'tax_query' => array(
										array(
										'taxonomy' => 'research_category',
										'terms' => array( $childTerm->slug ),
										'field' => 'slug',
										'include_children' => true, //子タクソノミーを含める
										)
									)
								));
								if( $tax_posts ) :
							?>
							<p><?php echo $childTerm->name; ?></p>
							<ul class="margin0">
								<?php
								$index = 1;
								foreach($tax_posts as $tax_post):
								?>
									<li>
									<?php echo $index++.'. '; ?><a href="<?php echo get_permalink($tax_post->ID); ?>"><?php echo get_the_title($tax_post->ID); ?></a>
									</li>
								<?php endforeach; wp_reset_postdata(); ?>
							</ul>
							<?php endif; endforeach; ?>
						</div>
						<?php
						endforeach;
						?>
					</div>
				</div>
			</section>
			<section>
				<p>倫理審査委員会より情報公開が求められている研究についてはこちらで公開しております。</p>
				<button type=“button” onclick="location.href='<?php echo home_url(); ?>/%E7%A0%94%E7%A9%B6%E5%85%AC%E9%96%8B%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6'">ページリンク</button>
			</section>
		</article>
	<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>