<?php
    /**
    Template Name: loadonmorescroll
    */
    get_header(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div class=" wrapper">
    <div class="container">
        <div class="row">
            <div id="result_para">	   
                <?php 
                    $args = array(
                    'post_type' => 'post',
                    'post_status'=>'publish',
                    'posts_per_page' => 3 ,
                    'paged' => $paged,
                    );  
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                        ?> 
                        <div class="col-sm-12 wow fadeInUp">
                            <div class="news_artical">
                                <?php

                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( ); 
                                    } 
                                ?>    
                                <b><?php the_modified_time('j,M,Y') ?></b>  
                                <h4><?php   the_title(); ?></h4> 
                            </div>  
                        </div>  
                        <?php endwhile; endif; ?>
                <?php wp_reset_query();  ?> 
            </div>
        </div>
        <div id="loader_message"></div>
        <input type="hidden" id="result_no" value="1" >   
        <input type="button" id="load" value="Load More Results" class=".btn-sm">
        <input type="button" id="no_load" value="No More Results is there" class=".btn-sm" style="display: none;">
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    var track_page = 1;
    $("#load").click(function(){    
    track_page++;
    var val = document.getElementById("result_no").value;

    $.ajax({
    type: 'post',
    url: "<?php  echo admin_url('admin-ajax.php'); ?>",
    data: {
    'action':'scroll_more',
    'page':track_page,

    },

    success: function (response) {
    //  alert(response);
    $('#result_para').append(response);
    //   var content = document.getElementById("result_para");
    //  content.innerHTML = content.innerHTML+response;
    //   document.getElementById("result_no").value = Number(val)+1;
    if($.trim(response).length == 0){
    $('#load').hide();
    $('#no_load').show();
    //  $('.nomore').show();
    } 

    }

    }); 
    });
    }); 

  /*  $(document).ready(function(){
        var track_page = 1;  
        $(window).scroll(function(){

            if ($(window).scrollTop() == $(document).height() - $(window).height() && lastID != 0){
                track_page++;
                var val = document.getElementById("result_no").value;

                var lastID = $('.load-more').attr('lastID');
                $.ajax({
                    type:'POST',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",  
                    data: {
                        'action':'scroll_more',
                        'page':track_page,        
                    },
                    beforeSend:function(html){
                        $('.load-more').show();
                    },
                    success:function(html){
                        var dd = html;
                        $('.load-more').remove();
                        //  var liData = '<div class="col-sm-12 new-rows"></div>';
                        //  $(liData).appendTo('#result_para').fadeIn();
                        //  jQuery('.new-rows').html(dd, 500);
                      $('#result_para').append(html).fadeIn(500);
                        if($.trim(html).length == 0){
                            $("#loader_message").html('<button data-atr="nodata" class="btn btn-default" type="button">No more records.</button>').show();
                        } else {
                            $("#loader_message").html('<button class="btn btn-default" type="button">Loading please wait...</button>').show();
                        }
                    }
                });
            }
        });
    });   */ 
</Script>                                 
 <?php
//get_sidebar();
get_footer();
