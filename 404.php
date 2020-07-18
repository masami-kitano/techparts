<?php get_header(); ?>

<section class="main">
	<div class="primary">
		<div class="inner">
			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">404</h1>
				</header>
				<p class="not-found-txt">ページが見つかりません。</p>
				<div class="return-top">
					<a href="<?php echo home_url( '/', 'https' ); ?>">トップへ戻る</a>
				</div>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer(); ?>
