<?php
/*
Template Name: index
*/
?>
<?php get_header(); ?>
<section class="main">
        <div class="main-category">
            <div class="tp-title">Main Category</div>
            <div class="main-category__wrap">
				<a href="" class="three-column"></a>
                <a href="" class="three-column"></a>
                <a href="" class="three-column"></a>
            </div>
        </div>
        <div class="primary">
            <div class="inner">
                <div class="topics">
                    <div class="tp-title">Topics</div>
                    <div class="topics__wrap slick">
						<?php $the_query = new WP_Query(topics_posts());
						if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="topics-item">
									<div class="topics-item__img">
										<?php
											if (has_post_thumbnail() ) {
												the_post_thumbnail('large');
											} else {
												echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="TechPartsデフォルト画像">';
											}
										?>
									</div>
									<div class="topics-item__title">
										<?php the_title(); ?>
									</div>
								</a>
							<?php endwhile; ?>
						<?php endif; 
						wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="post">
					<div class="tp-title">New Post</div>
					<?php
					//記事があればpost_wrapブロック以下を表示
					if (have_posts() ) : ?>
                    <div class="post__wrap">
						<?php
						//記事数ぶんループ
						while ( have_posts() ) :
						the_post(); ?>
						<a href="<?php the_permalink(); //記事のリンクを表示 ?>" class="post-item">
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
									echo '<div class="post-item-cat"><span class="cat-folder-icon"><i class="far fa-folder"></i></span>' . $category[0]->cat_name . '</div><!-- /post-item-cat -->';
								}
								?>
								</div>
								<h2 class="post-item-title"><?php the_title(); ?></h2>
								<div class="post-item-excerpt">
									<?php the_excerpt(); //抜粋を表示 ?>
								</div><!-- /post-item-excerpt -->
								<div class="post-item__content__meta">
									<time class="post-item-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time><!-- /post-item-published -->
								</div>
							</div>
						</a><!-- /post-item -->
						<?php endwhile; ?>
					</div>
					<?php endif; ?>

					<?php if (paginate_links() ) : //ページが1ページ以上あれば以下を表示 ?>
					<!-- pagenation -->
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
					</div><!-- /pagenation -->
					<?php endif; ?>
					
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </section>
<?php get_footer(); ?>
