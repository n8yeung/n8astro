<?php
    $contactus = array(); 
    $args = array( 'tag' => 'contactus', 'nopaging'=>true, 'posts_per_page'=> 4 );
    $contactus_query = new WP_Query( $args );
    
    if ( $contactus_query->have_posts() ) {
        while ( $contactus_query->have_posts() ) {
            $contactus_query->the_post();
                $temp = array();

                if(has_post_thumbnail()){
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                    $thumb_url = $thumb_url_array[0];
                }
                $temp['content'] = apply_filters( 'the_content', $post->post_content);
                $temp['excerpt'] = apply_filters( 'the_excerpt', $post->post_excerpt);
                $temp['image'] = $thumb_url;
                $temp['title'] = apply_filters( 'the_title', $post->post_title);
                $contactus[] = $temp;        
        }
    } 
    wp_reset_postdata();
?>

<?php if( count($contactus) > 0) { ?>
    <div class="container marketing contact-us">
        <div class="row row-center">
            <?php $i = 0; foreach($contactus as $contactus_item) { extract($contactus_item); ?>
            <div class="container mb-4">
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="container mb-4">
                <?php echo $content; ?>
            </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
