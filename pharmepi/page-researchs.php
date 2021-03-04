<?php add_filter('wp_head', function () { ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/tab.js"></script>
<?php }); ?>

<?php get_header(); ?>
<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">
					<h1 class="page-title wrap" itemprop="headline"><?php the_title(); ?></h1>
				</header> <?php // end article header 
							?>
				<div class="wrap">
					<section class="entry-content cf" itemprop="articleBody">
						<?php
						// the content (pretty self explanatory huh)
						the_content();
						?>
					</section>
					<section class="tab-section">
						<div class="tab-container">
							<!--タブ-->
							<ul class="tab-container__tab-group">
								<?php
								$terms = get_terms('research_category', array(
									'parent' => 0, // 親カテゴリのみ抽出
									'orderby' => 'description'
									// 'parent' => $term_id で子タームを抽出できる
								));
								if (!empty($terms) && !is_wp_error($terms)) {
									$research = "pharmacoepide-miology";
									if (isset($_GET['type'])) {
										$research = $_GET['type'];
									}
									foreach ($terms as $term) {
										$classParam = 'tab-container__tab tab-' . $term->term_id;
										if ($research == $term->slug) {
											$classParam = $classParam . ' is-active';
										}
										echo '<li class="' . $classParam . '">' . $term->name . '</li>';
										$isFirst = false;
									}
								}
								?>
							</ul>
							<!--タブを切り替えて表示するコンテンツ-->
							<div class="tab-container__panel-group">
								<?php
								$research = "pharmacoepide-miology";
								if (isset($_GET['type'])) {
									$research = $_GET['type'];
								}
								foreach ($terms as $term) :
									$childTerms = get_terms('research_category', array('parent' => $term->term_id, 'hide_empty' => false, 'orderby' => 'description'));
									$panelArgs = 'tab-container__panel tab-' . $term->term_id;
									if ($research == $term->slug) {
										$panelArgs = $panelArgs . ' is-show';
									}
									$isFirst = false
								?>
									<div class="<?php echo $panelArgs; ?>">
										<p><?php echo wpautop(explode('|||', $term->description, 2)[1]); ?></p>
										<?php
										foreach ($childTerms as $childTerm) :
											$tax_posts = get_posts(array(
												'post_type' => 'research',
												'posts_per_page' => -1, // 表示させたい記事数
												'tax_query' => array(
													array(
														'taxonomy' => 'research_category',
														'terms' => array($childTerm->slug),
														'field' => 'slug',
														'include_children' => true, //子タクソノミーを含める
													)
												)
											));
											if ($tax_posts) :
												$lastWord = end(explode("-", $childTerm->slug));
												$itemAttribute = "tab-container__panel--items";
												$headerAttribute = "tab-container__panel--items-header";
												if ($lastWord == "done") {
													$headerAttribute = $headerAttribute . '-weak';
													$itemAttribute = $itemAttribute . '-weak';
												}
										?>
												<ul class="<?php echo $itemAttribute; ?>">
													<p class="<?php echo $headerAttribute; ?>"><?php echo $childTerm->name; ?></p>
													<?php
													$index = 1;
													foreach ($tax_posts as $tax_post) :
													?>
														<li class="list__link">
															<?php
															if ($tax_post->post_content == NULL) {
																echo '<p>' . $index++ . '.&nbsp;' . $tax_post->post_title . '</p>';
															} else {
																echo $index++ . '.&nbsp;<a href="' . get_permalink($tax_post->ID) . '" class="a--underline">' . $tax_post->post_title . '</a>';
															}
															?>
														</li>
													<?php endforeach;
													wp_reset_postdata(); ?>
												</ul>
										<?php endif;
										endforeach; ?>
									</div>
								<?php
								endforeach;
								?>
							</div>
						</div>
					</section>
					<section class="entry-content">
						<p>倫理審査委員会より情報公開が求められている研究についてはこちらで公開しております。</p>
						<button type=“button” onclick="location.href='<?php echo home_url(); ?>/%E7%A0%94%E7%A9%B6%E5%85%AC%E9%96%8B%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6'" class="main-btn">患者情報等を用いた研究について</button>
					</section>
				</div>
			</article>
	<?php endwhile;
	endif; ?>
</main>
<?php get_footer(); ?>