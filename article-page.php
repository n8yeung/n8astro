<?php /* Template Name: Article Page */ ?>

<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php while (have_posts() ) : 
    the_post(); ?>
    <div class="hero">
        <div class="hero-inner">
            <div class="hero-item">
            <?php if (has_post_thumbnail() ) : ?>
                <img class="img-fluid" src="<?php the_post_thumbnail(); ?>" />
                <div class="container">
                    <div class="hero-caption">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container marketing">
        <div class="col-lg-12 mb-5">
            <div class="left-aligned-content"><?php the_content(); ?></div>
        </div>
    </div> 
    <?php endwhile; ?>
</article>
    <?php get_footer(); ?>