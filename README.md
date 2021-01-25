# wordpress-theme
## カスタム投稿の追加
1. function.phpでカスタム投稿タイプの追加(register_post_type)
2. function.phpでタクソノミーの追加と投稿タイプの紐付け(register_taxonomy)
3.## カスタム投稿の取得
```php
$terms = get_terms('details');
							if (!empty($terms) && !is_wp_error($terms)) {
								$isFirst = true;
								foreach ($terms as $term) {
									$classParam = 'tab tab-' . $term->term_id;
									if ($isFirst) {
										$classParam = $classParam . ' is-active';
									}
									echo '<li class="' . $classParam . '">' . $term->name . '</li>';
									$isFirst = false;
								}
}

foreach ($terms as $term) {
  $tax_posts = get_posts( array(
	  'post_type' => 'research-details',
		'posts_per_page' => -1, // 表示させたい記事数
		'tax_query' => array(
		  array(
				'taxonomy' => 'details',
				'terms' => array( $term->slug ),
				'field' => 'slug',
				'include_children' => true, //子タクソノミーを含める
			)
    )
	));
}
```
