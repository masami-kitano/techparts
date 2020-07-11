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
                <a href="" class="two-column"></a>
                <a href="" class="two-column"></a>
            </div>
        </div>
        <div class="primary">
            <div class="inner">
                <div class="topics">
                    <div class="tp-title">Topics</div>
                    <div class="topics__wrap slick">
                        <div class="topics-item">
                            <div class="topics-item__img"></div>
                            <div class="topics-item__title">タイトル</div>
                        </div>
                        <div class="topics-item">
                            <div class="topics-item__img"></div>
                            <div class="topics-item__title">タイトル</div>
                        </div>
                        <div class="topics-item">
                            <div class="topics-item__img"></div>
                            <div class="topics-item__title">タイトル</div>
                        </div>
                    </div>
                </div>
                <div class="post">
                    <div class="tp-title">New Post</div>
                    <div class="post__wrap">
                        <div class="post-item">
                            <div class="post-item__img"></div>
                            <div class="post-item__content"></div>
                        </div>
                        <div class="post-item">
                            <div class="post-item__img"></div>
                            <div class="post-item__content"></div>
                        </div>
                        <div class="post-item">
                            <div class="post-item__img"></div>
                            <div class="post-item__content"></div>
                        </div>
                        <div class="post-item">
                            <div class="post-item__img"></div>
                            <div class="post-item__content"></div>
                        </div>
                        <div class="post-item">
                            <div class="post-item__img"></div>
                            <div class="post-item__content"></div>
                        </div>
                        <div class="post-item">
                            <div class="post-item__img"></div>
                            <div class="post-item__content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <div class="sidebar__wrap">
                    <div class="sidebar-item">
                        <div class="sidebar-item__title">About</div>
                        <div class="sidebar-item__content">
                            <p class="item-img"><img class="about" src="<?php bloginfo('template_directory'); ?>/assets/img/tp_about_logo.png" alt=""></p>
                            <p class="item-txt">
                                Tech Partsは、主にプログラミングなどIT技術に関する情報メディアです。<br>
                                皆さんの大きな成果の一部になれることを目指し、配信しています。
                            </p>
                        </div>
                    </div>
                </div>
                <div class="sidebar__wrap">
                    <div class="sidebar-item">
                        <div class="sidebar-item__title">Tags</div>
                        <div class="sidebar-item__content">
                            <p class="tag"><a href="">Ruby</a></p>
                            <p class="tag"><a href="">Ruby on Rails</a></p>
                            <p class="tag"><a href="">News</a></p>
                            <p class="tag"><a href="">UI</a></p>
                            <p class="tag"><a href="">WordPress</a></p>
                        </div>
                    </div>
                </div>
                <div class="sidebar__wrap">
                    <div class="sidebar-item">
                        <div class="sidebar-item__title">Categories</div>
                        <div class="sidebar-item__content">
                            <p class="category"><a href=""><span><img src="<?php bloginfo('template_directory'); ?>/assets/img/tp_ruby_logo.png" alt="" width="15"></span>Ruby on Rails</a></p>
                            <p class="category"><a href=""><span><img src="<?php bloginfo('template_directory'); ?>/assets/img/tp_wp_logo.png" alt="" width="15"></span>WordPress</a></p>
                            <p class="category"><a href=""><span><img src="<?php bloginfo('template_directory'); ?>/assets/img/tp_cording_logo.png" alt="" width="15"></span>Cording</a></p>
                            <p class="category"><a href=""><span><img src="<?php bloginfo('template_directory'); ?>/assets/img/tp_career_logo.png" alt="" width="15"></span>Career</a></p>
                            <p class="category"><a href=""><span><img src="<?php bloginfo('template_directory'); ?>/assets/img/tp_others_logo.png" alt="" width="15"></span>Others</a></p>
                        </div>
                    </div>
                </div>
                <div class="sidebar__wrap">
                    <div class="sidebar-item">
                        <div class="sidebar-item__title">Subscription</div>
                        <div class="sidebar-item__content">
                            <p class="item-img"><a href=""><img class="feedly" src="<?php bloginfo('template_directory'); ?>/assets/img/tp_feedly_button.png" alt=""></a></p>
                            <p class="item-txt">
                                    feedlyに登録すると記事の更新を受け取れます。Tech Partsの記事が役立つと感じていただけた方はぜひご購読お願いします。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
