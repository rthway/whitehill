<?php get_header(); ?>

<!-- start wpo-blog-single-section -->
<section class="wpo-blog-single-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 offset-lg-1">
                <div class="wpo-blog-content">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div <?php post_class('post format-standard-image'); ?>>

                            <!-- Featured Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="entry-media">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Meta Info -->
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fi flaticon-user"></i> By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></li>
                                    <li><i class="fi flaticon-comment-white-oval-bubble"></i> <?php comments_number('No Comments', '1 Comment', '% Comments'); ?></li>
                                    <li><i class="fi flaticon-calendar"></i> <?php echo get_the_date('d M Y'); ?></li>
                                </ul>
                            </div>

                            <!-- Title -->
                            <h2><?php the_title(); ?></h2>

                            <!-- Content -->
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>

               

                            <!-- Tags and Share -->
                            <div class="tag-share-s2 clearfix">
                                <div class="tag">
                                    <span>Share: </span>
                                    <ul>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">facebook</a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank">twitter</a></li>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank">linkedin</a></li>
                                        <li><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" target="_blank">pinterest</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Comments -->
                            <div class="post-comments">
                                <?php comments_template(); ?>
                            </div>

                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end wpo-blog-single-section -->

<?php get_footer(); ?>
