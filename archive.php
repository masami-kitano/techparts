<?php get_header(); ?>
<section class="main">
	<div class="primary">
        <div class="inner">
			<!-- breadcrumb -->
			<div class="breadcrumb">
				<?php bcn_display(); ?>
			</div>
			<!-- /breadcrumb -->
			<div class="post">
				<div class="archive-header m_description">
					<div class="archive-header__lead">
						<?php current_archive() ?>
					</div>
					<h1 class="archive-header__title m_category"><?php the_archive_title(); //一覧ページ名を表示 ?></h1>
					<div class="archive-header__description">
						<p><?php the_archive_description(); ?></p>
					</div>
				</div>

				<?php if (have_posts() ) : ?>
					<div class="post__wrap m_horizontal">
						<?php
						//記事数ぶんループ
						while ( have_posts() ) :
						the_post();
						?>
						<a href="<?php the_permalink(); ?>" class="post-item">
							<div class="post-item__img">
								<?php
								if (has_post_thumbnail() ) {
								// アイキャッチ画像が設定されてれば大サイズで表示
								the_post_thumbnail('large');
								} else {
								// なければnoimage画像をデフォルトで表示
								echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="TechPartsデフォルト画像">';
								}
								?>
							</div>

							<div class="post-item__content">
								<div class="post-item__content__meta category-<?php echo get_category_slug() ?>">
									<?php
									// カテゴリー１つ目の名前を表示
									$category = get_the_category();
									if ($category[0] ) {
									echo '<div class="post-item-cat">' . $category[0]->cat_name . '</div><!-- /post-item-cat -->';
									}
									?>
									<!-- 公開日時を動的に表示する -->
									<time class="post-item-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time><!-- /post-item-published -->
									</div><!-- /post-item-meta -->
									<h2 class="post-item-title"><?php the_title(); //タイトルを表示 ?></h2><!-- /post-item-title -->
									<div class="post-item-excerpt">
									<?php the_excerpt(); //抜粋を表示 ?>
									</div><!-- /post-item-excerpt -->
								</div>
							</a>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<?php if (paginate_links() ) : //ページが1ページ以上あれば以下を表示 ?>
					<div class="pagenation">
						<?php
						echo
						paginate_links(
						array(
						'end_size' => 0,
						'mid_size' => 1,
						'prev_next' => true,
						'prev_text' => '<i class="fas fa-angle-left"></i>',
						'next_text' => '<i class="fas fa-angle-right"></i>',
						)
						);
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>
