<?php
    $slides = array(); 
    $args = array( 'tag' => 'slide', 'nopaging'=>true, 'posts_per_page'=>5 );
    $slider_query = new WP_Query( $args );

    if ( $slider_query->have_posts() ) {
        while ( $slider_query->have_posts() ) {
            $slider_query->the_post();
            if(has_post_thumbnail()){
                $temp = array();
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                $thumb_url = $thumb_url_array[0];
                $temp['excerpt'] = get_the_excerpt();
                $temp['image'] = $thumb_url;
                $temp['title'] = get_the_title();
                $slides[] = $temp;
            }
        }
    } 
    wp_reset_postdata();
?>

<?php if( is_front_page() && count($slides) > 0 ) { ?>
    <div id="carouselSpot" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $i=0; foreach($slides as $slide) { extract($slide); ?>
            <div class="carousel-item <?php if($i == 0) { ?>active<?php } ?>">
                <img  alt="<?php echo esc_attr($title); ?>" class="img-fluid" src="<?php echo $image ?>">
                <div class="container">
                    <div class="carousel-caption"><h3><?php echo $title; ?></h3><p><?php echo $excerpt; ?></p></div>
                </div>
            </div>
            <?php $i++; } ?>
        </div>

        <a class="carousel-control-prev" href="#carouselSpot" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselSpot" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
<?php } ?>
