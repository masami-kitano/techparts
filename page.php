<?php get_header(); ?>
<section class="main">
    <div class="primary">
        <div class="inner">
            <div class="page">

                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>

                <div class="page">
                    <div class="page-header">
                        <h2>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </div>
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php
                    endwhile;
                else:
                ?>

                <p>ページはありません！</p>

                <?php
                endif;
                ?>

            </div>
        </div>
    </div>
    <?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>
