<?php
    $marketing_spots = array(); 
    $args = array( 'tag' => 'marketing', 'nopaging'=>true, 'posts_per_page'=> 4 );
    $marketing_query = new WP_Query( $args );

    if ( $marketing_query->have_posts() ) {
        while ( $marketing_query->have_posts() ) {
            $marketing_query->the_post();
            if(has_post_thumbnail()){
                $temp = array();
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                $thumb_url = $thumb_url_array[0];
                $temp['content'] = get_the_content();
                $temp['excerpt'] = get_the_excerpt();
                $temp['image'] = $thumb_url;
                $temp['title'] = get_the_title();
                $marketing_spots[] = $temp;
            }
        }
    } 
    wp_reset_postdata();
?>

<?php if( count($marketing_spots) > 0) { ?>
    <div class="container marketing">
        <div class="row row-center">
            <?php $i = 0; foreach($marketing_spots as $marketing_spot) { extract($marketing_spot); ?>
            <div class="col-lg-4 mb-5">
                <img class="img-thumbnail rounded mb-3" alt="<?php echo esc_attr($title); ?>" src="<?php echo $image?>" width="300" height="300" />
                <h2><?php echo $title; ?></h2>
                <div class="card-content"><?php echo $content; ?>
            </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>