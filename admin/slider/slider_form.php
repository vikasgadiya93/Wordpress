<html>
    <head>
        <link href="<?php echo get_template_directory_uri(); ?>/admin_style.css" rel="stylesheet" type="text/css">
    </head>
    <script language="JavaScript">
        jQuery(document).ready(function() {
            jQuery('#upload_image_button').click(function() {
                var original_send_to_editor = window.send_to_editor;
                formfield = jQuery('#site_logo_url').attr('name');
                tb_show('', 'media-upload.php?type=image&TB_iframe=true');

                window.send_to_editor = function(html_val) {

                    if(jQuery(html_val).attr('src')) {
                        imgurl = jQuery(html_val).attr('src');
                    }
                    else {
                        imgurl = jQuery(html_val).attr('href');
                    }

                    jQuery('#site_logo_url').val(imgurl);
                    tb_remove();
                    window.send_to_editor = original_send_to_editor;
                }
                return false;
            });        

        });
    </script>  
    </head>
    <body>
        <?php 
            if(isset($_POST['submit'])) 
            { 
                global $wpdb;
                $image = $_POST['site_logo_url'];
                $text = $_POST['Caption'];
                $text2 = $_POST['Caption2'];
                $url = $_POST['url'];
              
                $table_name = "wp_slider";
                $wpdb->insert( $table_name, array(
                'image' => $image  ,
                'Caption' => $text ,
                'Caption2' => $text2 ,
                'url' => $url,
                ) );
                echo ("<script> alert('Data Save...!');</script>");
                echo ("<script> location.href='admin.php?page=slider'</script>"); 
            }  
        ?>     
        <div class="wrap">
            <h2> 
                <b> Add sldier  </b> 
            </h2>
            <div style="height: auto; width: 70%; border: 1px solid gray; background: white; padding-left: 10px; margin-top: 10px;" >       

                <form action="" method="post" id="frmSlider">
                    <input type="hidden" name="txt_hide"  >
                    <table class="form-table">

                        <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('Image') ?></label> </th>
                            <td>
                                <input type="text" class="regular-text" value="" id="site_logo_url" name="site_logo_url">
                                <input id="upload_image_button" type="button" value="Upload" class="button" />
                            </td>
                        </tr>

                       <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('Caption') ?></label> </th>
                            <td>
                                <textarea name="Caption" cols="37" rows="3"></textarea>
                            </td>
                        </tr>
                         <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('Descripation') ?></label> </th>
                            <td>
                                <textarea name="Caption2" cols="37" rows="3"></textarea>
                            </td>
                       </tr>
                            <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('url') ?></label> </th>
                            <td>
                                <textarea name="url" cols="37" rows="3"></textarea>
                            </td>
                        </tr>    
                    </table>
                    <p class="submit">
                        <input type="submit" value="Save" class="button button-primary" id="submit" name="submit">
                        <?php if($_GET['action'] != 'edit'){ ?>
                            <input type="button" value="Cancel" class="button button-secondary" id="btnCancel" name="btnCancel" onclick="javascript: window.location.href='<?php echo admin_url('admin.php?page=slider'); ?>'">
                            <?php }else{ ?>
                            <input type="button" value="Cancel" class="button button-secondary" onclick="javascript: window.location.href='<?php echo admin_url('admin.php?page=slider'); ?>'" name="btnCancel">  
                            <?php } ?>
                    </p>                                                                                                          
                </form> 
            </div>
        </div> 
    </body>                                                                                                                                                                                      
</html>