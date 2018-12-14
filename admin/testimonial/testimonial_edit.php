<html>
    <head>
        <link href="<?php echo get_template_directory_uri(); ?>/admin_style.css" rel="stylesheet" type="text/css">   
        <script src="<?php bloginfo('stylesheet_directory'); ?>/admin/slider/js/jscolor.js"></script>     
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
                $id = $_GET['id'];

                 $img = $_POST['site_logo_url'];
                $name = trim(stripslashes($_POST['txt_author']));
                $Designation = trim(stripslashes($_POST['Designation']));
                $Description_text = trim(stripslashes($_POST['Description_text']));
                $Category_text = trim(stripslashes($_POST['Category_text']));
                $status = trim(stripslashes($_POST['status']));
               /* $author = $_POST['txt_author'];
                $text = $_POST['txt_text'];*/

                $table_name = "wp_testimonial";

                $wpdb->update( $table_name, array(
                'name' => $name ,
                'description' => $Description_text,
                'designation' => $Designation,
                'image' => $img ,
                ),array( 'id' => $id  )               
                );
                //$wpdb->insert_id ;
                echo "<script>alert('Data is Updated...!');</script>";
                echo "<script type=text/javascript>";
                echo "location.href='admin.php?page=testimonial'";
                echo "</script>";
            }
        ?>
        <?php
            global $wpdb,$table_prefix;
            $id = $_GET['id'];                          
            $tbl_name = "wp_testimonial";    
            $sql = "select * from $tbl_name where id =".$id;
            $result = $wpdb->get_results($sql);
            //  echo "<pre>"; print_R($result); die;
            foreach ( $result as $print )   
            {
            ?>   

            <div class="wrap">
                <h2> 
                    <b> Edit Slider </b> 
                </h2>
                <div style="height: auto; width: 70%; border: 1px solid gray; background: white; padding-left: 10px; margin-top: 10px;" >       
                    <form enctype="multipart/form-data" action="" name="contact" method="post" onSubmit="return contact_us()">  
                        <table class="form-table" cellpadding="0" cellspacing="0" style="height: auto; width: auto;">       
                             <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('Name') ?></label> </th>
                            <td>
                                <input name="txt_author" type="text" id="txtLogoURL"  class="regular-text" value="<?php echo $print->name; ?>" >
                            </td>
                        </tr>
                          <tr valign="top">
                            <th scope="row"> <label for="Designation"><?php _e('Designation') ?></label> </th>
                            <td>
                                <input name="Designation" type="text" id="Designation"  class="regular-text" value="<?php echo $print->designation; ?>" >
                            </td>
                        </tr>
                           <tr valign="top">
                            <th scope="row"> <label for="txtLogoURL"><?php _e('Description') ?></label> </th>
                            <td>
                                <textarea name="Description_text" cols="37" rows="3"><?php echo $print->description; ?></textarea>
                            </td>
                        </tr>

                             <tr valign="top">
                                <th scope="row"> <label for="txtLogoURL"><?php _e('Image') ?></label> </th>
                                <td>
                                    <input type="text" class="regular-text" value="<?php echo $print->image; ?>" id="site_logo_url" name="site_logo_url">
                                    <br>
                                    <input id="upload_image_button" type="button" value="Upload" class="button" />
                                </td>
                            </tr>
                            
                            <?php }  
                        ?>
                        <tr>
                         
                            <td colspan="3" align="center"> <input type="submit"  name="submit"  class="button button-primary"  value="Update">     </td>
                        </tr>  
                    </table>    
                </form>
                    
                        
                          
            </div> 
        </div>  
    </body>
</html>
