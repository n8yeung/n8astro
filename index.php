<?php get_header(); ?>
<?php 
if (is_page() && !is_home() && !is_front_page()) :
    while (have_posts()) : the_post() 
?>
    <div class="hero">
        <div class="hero-inner">
            <div class="hero-item">
                <?php if (has_post_thumbnail() ) : ?>
                    <img class="img-fluid" src="<?php the_post_thumbnail(); ?>" />
                    <div class="container">
                        <div class="hero-caption">
                            <h1><?php the_title() ?></h1>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container marketing">
        <div class="row">
            <?php the_content(); ?>
        </div>
    </div>
<?php
    endwhile;
endif;
?>

<?php
$blog_class = ''; 
if (is_home()) {
    $blog_class = 'blog-container';
}
?>
<?php if (is_home() && !is_front_page() || is_single()) { ?>
    <div class="hero">
        <div class="hero-inner">
            <div class="hero-item">
            <?php if (has_post_thumbnail() ) : ?>
                <img class="img-fluid" src="<?php the_post_thumbnail(); ?>" />
                <div class="container">
                    <div class="hero-caption">
                        <h1 class="blog-title"><?php bloginfo('name'); ?></h1>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
<?php } ?>
<div <?php $blog_class ? 'class="'. $blog_class . '"' : '' ?>>
    <?php if (is_home() && !is_front_page() || is_single()) { ?>
        <div class="blog-header">
            <h1 class="blog-title"><?php bloginfo('name'); ?></h1>
        </div>
    <?php } ?>

    <!-- Homepage -->
    <?php get_template_part('parts/slider'); ?>

    <div class="row">

        <div class="container">
            <?php
            if (is_front_page()) {
                get_template_part('parts/marketing');
            } else if (is_home() && have_posts() || is_single()) {
                while (have_posts()) : the_post();
            ?>
                    <?php if(!has_tag('slide') && !has_tag('marketing') ) { ?>
                        <div class="blog-post">
                            <h2 class="blog-post-title"><?php the_title(); ?></h2>
                            <p class="blog-post-meta"><?php the_date(); ?> by <?php the_author(); ?></p>

                            <?php if(is_single()) {
                                    the_content();
                                }
                                else {
                                    the_excerpt();
                                    ?>
                                    <a class="link" href="<?php the_permalink() ?>">Read More</a> 
                            <?php } ?>
                            
                        </div><!-- /.blog-post -->
                    <?php } ?>
            <?php
                endwhile;
            }
            ?>


        </div> <!-- /.blog-main-->
        </div>
        <?php get_footer(); ?>