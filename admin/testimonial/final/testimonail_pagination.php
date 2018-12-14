<html>
    <head>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.min.js" type="text/javascript"></script> 
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
        <link href="<?php echo get_template_directory_uri(); ?>/admin/admin_style.css" rel="stylesheet" type="text/css">     
    </head>
    <body>
        <div class="container">       
            <div class="table-responsive" id="pagination_data">  
            </div>  
        </div>  

        <script>  
            $(document).ready(function(){  
                load_data();  
                function load_data(page)  
                {  
                    $.ajax({ 
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",     
                        method:"POST",  
                        data: {
                            'action':'pagination',
                            'page':page
                        }, 
                        success:function(data){  
                            $('#pagination_data').html(data);  
                        }  
                    })  
                }  
                $(document).on('click', '.pagination_link', function(){  
                    var page = $(this).attr("id"); 

                    load_data(page);  
                });  
            });  
        </script>   

    </body>
</html>