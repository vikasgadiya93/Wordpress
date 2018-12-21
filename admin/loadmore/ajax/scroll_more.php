<?php
parse_str($_POST['getresult'], $_POST);
    global $wpdb;
 
  if(isset($_POST)){
    $number = 1;
    $paged = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $offset = ($paged - 1) * $number;
    $args = array(
        'post_type' => 'post',
        'post_status'=>'publish',
        'posts_per_page' => $number ,
        'paged' => $paged,
        'offset' => $offset,  
   );             
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>       
                    
                        <div class="news_artical">
                            <?php
                                if (has_post_thumbnail() ) {
                                    the_post_thumbnail( ); 
                                } 
                            ?>    
                            <b><?php the_modified_time('j,M,Y') ?></b>  
                            <h4><?php 
                           
                             the_title(); ?></h4> 
                          
                     
                    </div>  
                    <?php endwhile; endif; ?>
            <?php  wp_reset_query();  ?> 
        
        
      <?php  
       
  }  
?>