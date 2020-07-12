<?php get_header(); ?>
<section class="main">
    <div class="primary">
        <div class="inner">
            <div class="post">
            <?php if ( function_exists( 'bcn_display' ) ) : ?>
            <!-- breadcrumb -->
            <div class="breadcrumb">
            <?php bcn_display(); ?>
            </div>
            <!-- /breadcrumb -->
            <?php endif; ?>

            <?php
            if ( have_posts() ) :
            while ( have_posts() ) :
            the_post();
            ?>
            <article <?php post_class( array( 'post' ) ); ?>>
                <div class="post-header">
                    <?php
                    // カテゴリー１つ目の名前を表示
                    $category = get_the_category();
                    if ( $category[0] ) : ?>
                        <div class="post-label">
                            <a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>">
                                <?php echo $category[0]->cat_name; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <h1 class="post-title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="post-meta">
                        <time class="post-published" datetime="<?php the_time( 'c' ); ?>">公開日 <?php the_time( 'Y/n/j' ); ?></time>
                        <?php if ( get_the_modified_time( 'Y-m-d' ) !== get_the_time( 'Y-m-d' ) ) : ?>
                            <time class="post-updated" datetime="<?php the_modified_time( 'c' ); ?>">最終更新日 <?php the_modified_time( 'Y/n/j' ); ?></time>
                        <?php endif; ?>
                    </div>

                    <div class="post-img">
                        <?php
                        if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'large' );
                        }
                        ?>
                    </div>
                </div>

                <div class="post-body">
                    <?php
                    //本文の表示
                    the_content(); ?>
                    <?php
                    //改ページを有効にするための記述
                    wp_link_pages(
                    array(
                    'before' => '<nav class="post-links">',
                    'after' => '</nav>',
                    'link_before' => '',
                    'link_after' => '',
                    'next_or_number' => 'number',
                    'separator' => '',
                    )
                    );
                    ?>
                </div>
            </article>

            <?php
            endwhile;
            endif;
            ?>
        </div>
    </div>
    <?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>