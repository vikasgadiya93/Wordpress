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
                $img = $_POST['site_logo_url'];
                $name = trim(stripslashes($_POST['txt_author']));
                $designation = trim(stripslashes($_POST['designation']));
                $Description_text = trim(stripslashes($_POST['Description_text']));
                $table_name = "wp_testimonial";

                $wpdb->insert( $table_name, array(
                'name' => $name ,
                'description' => $Description_text,
                'designation' => $designation,
                'image' => $img ,
            
                
                ) );
                echo ("<script> alert('Data Save...!');</script>");
                echo ("<script> location.href='admin.php?page=testimonial'</script>"); 
            }  
        ?>     
        <div class="wrap">
            <h2> 
                <b> Add Testimonial  </b> 
            </h2>
            <div style="height: 100%; width: 70%; border: 1px solid gray; background: white; padding-left: 10px; margin-top: 10px;" >       

                <form action="" method="post" id="frmSlider">
                    <input type="hidden" name="txt_hide"  >
                    <table class="form-table">
                         <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('Client Name') ?></label> </th>
                            <td>
                                <input name="txt_author" type="text" id="txtLogoURL"  class="regular-text">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"> <label for="designation"><?php _e('Designation') ?></label> </th>
                            <td>
                                <input name="designation" type="text" id="designation"  class="regular-text">
                            </td>
                        </tr>
                         <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('Description') ?></label> </th>
                            <td>
                                <textarea name="Description_text" cols="37" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('Image') ?></label> </th>
                            <td>
                                <input type="text" class="regular-text" value="" id="site_logo_url" name="site_logo_url">
                                <br>
                                <input id="upload_image_button" type="button" value="Upload" class="button" />
                            </td>
                        </tr>
                    </table>
                    <p class="submit">
                        <input type="submit" value="Save" class="button button-primary" id="submit" name="submit">
                        <?php if($_GET['action'] != 'edit'){ ?>
                            <input type="button" value="Cancel" class="button button-secondary" id="btnCancel" name="btnCancel" onclick="javascript: window.location.href='<?php echo admin_url('admin.php?page=testimonial'); ?>'">
                            <?php }else{ ?>
                            <input type="button" value="Cancel" class="button button-secondary" onclick="javascript: window.location.href='<?php echo admin_url('admin.php?page=testimonial'); ?>'" name="btnCancel">  
                            <?php } ?>
                    </p>                                                                                                          
                </form> 
            </div>
        </div> 
    </body>
</html>

